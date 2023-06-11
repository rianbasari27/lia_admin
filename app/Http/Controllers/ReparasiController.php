<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use App\Models\ReparasiDetail;
use App\Models\ReparasiHeader;
use App\Models\TransaksiMasuk;
use Illuminate\Support\Facades\DB;

class ReparasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $data;
    public $subtitle;
    
    public function index(Request $request)
    {
        
        $title = "Reparasi";
        $jenis_barang = JenisBarang::all();
        
        $query = ReparasiHeader::query();
        $query->select(
                'reparasi_header.kode_reparasi'
                ,'reparasi_header.tanggal'
                ,'reparasi_header.total'
                ,'reparasi_header.status_pembayaran'
                ,'c.nama_customer'
                ,DB::raw("GROUP_CONCAT(jb.nama_barang) as nama_barang")
                )
        ->join('customer as c', 'reparasi_header.nama_customer_id', '=', 'c.id')
        ->join('reparasi_detail as rd', 'reparasi_header.kode_reparasi', '=', 'rd.kode_reparasi')
        ->join('jenis_barang as jb', 'rd.nama_barang_id','=','jb.id');

        if( $request->kode_reparasi ) {
            $query->where('reparasi_header.kode_reparasi', 'like', '%' . $request->kode_reparasi. '%');
        }
        
        if( $request->tanggal_mulai && $request->tanggal_sampai ) {
            $query->whereBetween('reparasi_header.tanggal', [$request->tanggal_mulai, $request->tanggal_sampai]);
        }

        if( $request->nama_customer ) {
            $query->where('c.nama_customer', 'like', '%' . $request->nama_customer. '%');
        }

        if( $request->status_pembayaran ) {
            $query->where('reparasi_header.status_pembayaran', 'like', $request->status_pembayaran);
        }

        if( $request->nama_barang ) {
            $query->whereIn('nama_barang_id', $request->nama_barang);
        }

        $this->data = $query->groupBy('reparasi_header.kode_reparasi'
        ,'reparasi_header.tanggal'
        ,'reparasi_header.total'
        ,'reparasi_header.status_pembayaran'
        ,'c.nama_customer')
        ->orderByDesc('reparasi_header.updated_at')
        ->paginate(10);

        return view('reparasi.index')->with([
            'title' => $title,
            'jenis_barang' => $jenis_barang,
            // 'barang' => $barang,
            'data' => $this->data,
            // 'jenis_barang' => $jenis_barang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Reparasi";
        $subtitle = "Tambah data";
        $data = ReparasiHeader::all();

        $kode_r = ReparasiHeader::orderBy('kode_reparasi', 'desc')->first();
        $kode_reparasi = "";
        if ($kode_r) {
            $last_kode = $kode_r->kode_reparasi;
            $kode_reparasi = substr($last_kode, 3) + 1;
            $kode_reparasi = 'LIA' . str_pad($kode_reparasi, 6, '0', STR_PAD_LEFT);
        } 
        else {
            $kode_reparasi = 'LIA000001';
        }

        $transaksi = TransaksiMasuk::all();
        $customer = Customer::orderByDesc('created_at')->get();
        $jenis_barang = JenisBarang::all();

        return view('reparasi.create')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'data' => $data,
            'kode_reparasi' => $kode_reparasi,
            'transaksi' => $transaksi,
            'customer' => $customer,
            'jenis_barang' => $jenis_barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_reparasi' => 'required',
            'nama_customer_id' => ['not_in:-'],
            'tanggal' => 'required',
            'nama_barang_id.*' => ['not_in:-'],
            'jumlah.*' => 'required',
            'kerusakan.*' => 'required',
            'biaya.*' => 'required',
        ],[
            'kode_reparasi.required' => 'Masukkan kode reparasi!',
            'nama_customer_id.not_in' => 'Pilih customer atau tambah baru customer!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
            'nama_barang_id.*.not_in' => 'Pilih barang atau tambah baru barang!',
            'jumlah.*.required' => 'Masukkan jumlah barang!',
            'kerusakan.*.required' => 'Tuliskan kerusakan barang!',
            'biaya.*.required' => 'Masukkan biaya reparasi!',
        ]);
        // dd($request->validated(), $request->errors());
            
        $status = "";
        $tujuan = "";
        if ($request->input('uang_muka') < $request->input('total')) {
            $status = "Belum lunas";
            $tujuan = "Uang muka";
        } else if ($request->input('uang_muka') >= $request->input('total')) {
            $status = "Lunas";
            $tujuan = "Pelunasan";
        }
        
        $header = [
            'kode_reparasi' => $request->input('kode_reparasi'),
            'nama_customer_id' => $request->input('nama_customer_id'),
            'tanggal' => $request->input('tanggal'),
            'total' => $request->input('total'),
            'status_pembayaran' => $status,
        ];

        ReparasiHeader::create($header);
        
        foreach ($request->nama_barang_id as $key => $item) {
            $detail = [
                'kode_reparasi' => $request->kode_reparasi,
                'nama_barang_id' => $request->nama_barang_id[$key],
                'jumlah' => $request->jumlah[$key],
                'kerusakan' => $request->kerusakan[$key],
                'biaya' => $request->biaya[$key],
            ];

            ReparasiDetail::create($detail);
        }
        $kode_tm = TransaksiMasuk::orderBy('kode_transaksi', 'desc')->first();
        $kode_transaksi = "";
        if ($kode_tm) {
            $last_kode = $kode_tm->kode_transaksi;
            $kode_transaksi = substr($last_kode, 2) + 1;
            $kode_transaksi = 'TM' . str_pad($kode_transaksi, 6, '0', STR_PAD_LEFT);
        } 
        else {
            $kode_transaksi = 'TM000001';
        }
        $uang_muka = [
            'kode_transaksi' => $kode_transaksi,
            'kode_reparasi' => $request->input('kode_reparasi'),
            'tanggal' => $request->input('tanggal'),
            'tujuan_pembayaran' => $tujuan,
            'nominal' => $request->input('uang_muka'),
        ];

        if ($request->input('uang_muka') !== null) {
            TransaksiMasuk::create($uang_muka);
        }

        return redirect('reparasi')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_reparasi)
    {
        $title = "Reparasi";
        $data = ReparasiHeader::where('kode_reparasi', $kode_reparasi)->first();
        $detail = ReparasiDetail::where('kode_reparasi', $kode_reparasi)->get();
        $uang_muka = TransaksiMasuk::select('kode_reparasi', 'nominal')
            ->where('kode_reparasi', '=', $kode_reparasi)
            ->get();        
        return view('reparasi.detail')->with([
            'data' => $data,
            'uang_muka' => $uang_muka,
            'detail' => $detail,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_reparasi)
    {
        $title = "Reparasi";
        $subtitle = "Edit data";
        $customer = Customer::all();
        $jenis_barang = JenisBarang::all();
        $data = ReparasiHeader::where('kode_reparasi', $kode_reparasi)->first();
        $detail = ReparasiDetail::where('kode_reparasi', $kode_reparasi)->get();
        return view('reparasi.edit')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'customer' => $customer,
            'jenis_barang' => $jenis_barang,
            'data' => $data,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'kode_reparasi' => 'required',
            'nama_customer_id' => ['not_in:-'],
            'tanggal' => 'required',
            'nama_barang_id.*' => ['not_in:-'],
            'jumlah.*' => 'required',
            'kerusakan.*' => 'required',
            'biaya.*' => 'required',
        ],[
            'kode_reparasi.required' => 'Masukkan kode reparasi!',
            'nama_customer_id.not_in' => 'Pilih customer atau tambah baru customer!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
            'nama_barang_id.*.not_in' => 'Pilih barang atau tambah baru barang!',
            'jumlah.*.required' => 'Masukkan jumlah barang!',
            'kerusakan.*.required' => 'Tuliskan kerusakan barang!',
            'biaya.*.required' => 'Masukkan biaya reparasi!',
        ]);

        $header = [
            'kode_reparasi' => $request->kode_reparasi,
            'nama_customer_id' => $request->nama_customer_id,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
        ];

        ReparasiHeader::where('kode_reparasi', $request->kode_reparasi)->update($header);
        ReparasiDetail::where('kode_reparasi', $request->kode_reparasi)->delete();

        foreach ($request->nama_barang_id as $key => $item) {
            $detail = [
                'kode_reparasi' => $request->kode_reparasi,
                'nama_barang_id' => $request->nama_barang_id[$key],
                'jumlah' => $request->jumlah[$key],
                'kerusakan' => $request->kerusakan[$key],
                'biaya' => $request->biaya[$key],
            ];

            if ($request->nama_barang_id[$key] == '-') continue;

            ReparasiDetail::create($detail);
        }

        return redirect('reparasi')->with('success', 'Berhasil melakukan update data.');
        
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_reparasi)
    {
        ReparasiHeader::where('kode_reparasi', $kode_reparasi)->delete();
        ReparasiDetail::where('kode_reparasi', $kode_reparasi)->delete();
        TransaksiMasuk::where('kode_reparasi', $kode_reparasi)->delete();
        return redirect('/reparasi')->with('success', 'Data berhasil dihapus.');
    }
}
