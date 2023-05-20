<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reparasi;
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
    public function index(Request $request)
    {
        
        $title = "Reparasi";
        $jenis_barang = JenisBarang::all();
        if( $request->has('kode_reparasi') || 
            $request->has('nama_customer') || 
            $request->has('status_pembayaran')) {
            $data = ReparasiHeader::select(
                'reparasi_header.kode_reparasi',
                'nama_customer_id',
                'nama_customer',
                'nama_barang_id',
                'nama_barang',
                'tanggal',
                'status_pembayaran',
                'total',
                )
                ->join('reparasi_detail', 'reparasi_header.kode_reparasi', '=', 'reparasi_detail.kode_reparasi')
                ->join('jenis_barang', 'reparasi_detail.nama_barang_id', '=', 'jenis_barang.id')
                ->join('customer', 'reparasi_header.nama_customer_id', '=', 'customer.id')
                ->where('reparasi_header.kode_reparasi', 'like', '%' . $request->kode_reparasi. '%')
                ->where('nama_customer', 'like', '%' . $request->nama_customer .'%')
                ->where('status_pembayaran', 'like', $request->status_pembayaran. '%')
                ->groupBy('reparasi_header.kode_reparasi')
                ->orderBy('reparasi_detail.updated_at', 'desc')
                ->paginate(10);
        }

        // else if ($request->has('tanggal_mulai') && $request->has('tanggal_sampai')) {

        

        else {
            $data = ReparasiHeader::select(
            'reparasi_header.kode_reparasi',
            'reparasi_header.nama_customer_id',
            'customer.nama_customer',
            'reparasi_detail.nama_barang_id',
            'jenis_barang.nama_barang',
            'reparasi_header.tanggal',
            'reparasi_header.status_pembayaran',
            'reparasi_header.total',
            )
            ->join('reparasi_detail', 'reparasi_header.kode_reparasi', '=', 'reparasi_detail.kode_reparasi')
            ->join('jenis_barang', 'reparasi_detail.nama_barang_id', '=', 'jenis_barang.id')
            ->join('customer', 'reparasi_header.nama_customer_id', '=', 'customer.id')
            ->groupBy('reparasi_header.kode_reparasi')
            ->orderBy('reparasi_detail.updated_at', 'desc')
            ->paginate(10);
        }


        
        
        foreach ($data as $item) {
            $barang = ReparasiHeader::select(
                'reparasi_header.kode_reparasi',
                'nama_barang_id',
                'nama_barang',
                )->join('reparasi_detail', 'reparasi_header.kode_reparasi', '=', 'reparasi_detail.kode_reparasi')
                ->join('jenis_barang', 'reparasi_detail.nama_barang_id', '=', 'jenis_barang.id')
                ->where('reparasi_header.kode_reparasi', '=', $item->kode_reparasi)
                ->get();
        }

        $data = DB::table('reparasi_header as a')
        ->join('customer as b', 'a.nama_customer_id', '=', 'b.id')
        ->select('*', DB::raw(
            "(CASE WHEN (SELECT SUM(nominal) FROM transaksi_masuk trmsk 
            WHERE trmsk.kode_reparasi = a.kode_reparasi GROUP BY trmsk.kode_reparasi) >= a.total 
            THEN 'Lunas' 
            ELSE 'Belum lunas' 
            END) 
            as status_lunas"
            ))
        ->get();

        // dd($data);

        // $no_reparasi = Reparasi::select(
        //     'id',
        //     'no_reparasi',
        // )->get();
        // for ($i = 0; $i < )
        // $jenis_barang = Reparasi::select(
        //     'reparasi.nama_barang_id',
        //     'jenis_barang.nama_barang',
        // )->join('jenis_barang', 'reparasi.nama_barang_id', '=', 'jenis_barang.id')
        // ->where('no_reparasi', '=', '');
        return view('reparasi.index')->with([
            'title' => $title,
            'jenis_barang' => $jenis_barang,
            'barang' => $barang,
            'data' => $data,
            // 'jenis_barang' => $jenis_barang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Reparasi";
        $data = ReparasiHeader::all();
        $transaksi = TransaksiMasuk::all();
        $customer = Customer::all();
        $jenis_barang = JenisBarang::all();
        return view('reparasi.create')->with([
            'title' => $title,
            'data' => $data,
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
            'nama_barang_id' => ['not_in:-'],
        ],[
            'kode_reparasi.required' => 'Masukkan kode reparasi!',
            'nama_customer_id.not_in' => 'Pilih customer atau tambah baru customer!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
        ]);

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

        
        $uang_muka = [
            'kode_transaksi' => $request->input('kode_transaksi'),
            'nama_customer_id' => $request->input('nama_customer_id'),
            'kode_reparasi' => $request->input('kode_reparasi'),
            'tanggal' => $request->input('tanggal'),
            'tujuan_pembayaran' => $tujuan,
            'nominal' => $request->input('uang_muka'),
        ];
        // foreach ($data as $item) {
        //     $id = explode('-', $item->kode_transaksi);
        //     dd($uang_muka);
        // }

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
        $customer = Customer::all();
        $jenis_barang = JenisBarang::all();
        $data = ReparasiHeader::where('kode_reparasi', $kode_reparasi)->first();
        $detail = ReparasiDetail::where('kode_reparasi', $kode_reparasi)->get();
        return view('reparasi.edit')->with([
            'title' => $title,
            'customer' => $customer,
            'jenis_barang' => $jenis_barang,
            'data' => $data,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request
    // , string $kode_reparasi
    // , string $id
    )
    {

        // dd($request->all());

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
