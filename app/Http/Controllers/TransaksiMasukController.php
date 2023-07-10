<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reparasi;
use App\Models\ReparasiDetail;
use App\Models\ReparasiHeader;
use App\Models\TransaksiMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Transaksi Masuk";
        $query = TransaksiMasuk::query();
        $query->select(
            'kode_transaksi',
            'nama_customer',
            'transaksi_masuk.tanggal',
            'tujuan_pembayaran',
            'nominal',)
        ->join('reparasi_header', 'transaksi_masuk.kode_reparasi', '=', 'reparasi_header.kode_reparasi')
        ->join('customer', 'reparasi_header.nama_customer_id', '=', 'customer.id');

        if ( $request->kode_transaksi ) {
            $query->where('kode_transaksi', 'like', '%' . $request->kode_transaksi . '%');
        }

        if ( $request->nama_customer ) {
            $query->where('nama_customer', 'like', '%' . $request->nama_customer . '%');
        }
        
        if ( $request->tanggal_mulai && $request->tanggal_sampai ) {
            $query->whereBetween('transaksi_masuk.tanggal', [$request->tanggal_mulai, $request->tanggal_sampai]);
        }
        
        if ( $request->tujuan_pembayaran ) {
            $query->where('tujuan_pembayaran', 'like', '%' . $request->tujuan_pembayaran . '%');
        }

        $data = $query->orderBy('transaksi_masuk.tanggal', 'desc')
        ->paginate(10);
        return view('transaksi_masuk.index')->with([
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Transaksi Masuk";
        $subtitle = "Tambah data";
        $transaksi = TransaksiMasuk::all();

        $kode_tm = TransaksiMasuk::orderBy('kode_transaksi', 'desc')->first();
        $kode_transaksi = "";
        if ($kode_tm) {
            $kode_transaksi = substr($kode_tm->kode_transaksi, 2) + 1;
            $kode_transaksi = 'TM' . str_pad($kode_transaksi, 6, '0', STR_PAD_LEFT);
        } 
        else {
            $kode_transaksi = 'TM000001';
        }

        $data = ReparasiHeader::select(
            'kode_reparasi',
            'nama_customer_id',
            'customer.nama_customer'
        )->join('customer', 'reparasi_header.nama_customer_id', '=', 'customer.id')
        ->groupBy('kode_reparasi')
        ->orderBy('reparasi_header.updated_at', 'asc')
        ->get();
        return view('transaksi_masuk.create')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'transaksi' => $transaksi,
            'kode_transaksi' => $kode_transaksi,
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'kode_reparasi' => ['not_in:-'],
            'tanggal' => 'required',
            'tujuan_pembayaran' => ['not_in:-'],
            'nominal' => 'required',
        ],[
            'kode_transaksi.required' => 'Masukkan kode transaksi!',
            'kode_reparasi.not_in' => 'Pilih customer atau tambah baru customer!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
            'tujuan_pembayaran.not_in' => 'Pilih tujuan pembayaran!',
            'nominal.required' => 'Masukkan nominal transaksi!',
        ]);

        $kode_reparasi = explode(' ', $request->input('kode_reparasi'));
        $data = [
            'kode_transaksi' => $request->input('kode_transaksi'),
            'nama_customer_id' => $kode_reparasi[1],
            'kode_reparasi' => $kode_reparasi[0],
            'tanggal' => $request->input('tanggal'),
            'tujuan_pembayaran' => $request->input('tujuan_pembayaran'),
            'nominal' => $request->input('nominal'),
            'keterangan' => $request->input('keterangan'),
            'created_by' => auth()->user()->id,
        ];
        TransaksiMasuk::create($data);

        if ($request->input('tujuan_pembayaran') == 'Pelunasan') {
            ReparasiHeader::where('kode_reparasi', $kode_reparasi[0])->update([
                'status_pembayaran' => 'Lunas'
            ]);
        }
        
        return redirect('transaksi_masuk')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_transaksi)
    {
        $title = "Transaksi Masuk";
        $subtitle = "Detail data";
        $data = TransaksiMasuk::join('users', 'created_by', '=', 'users.id')
        ->join('reparasi_header', 'transaksi_masuk.kode_reparasi', '=', 'reparasi_header.kode_reparasi')
        ->join('customer', 'reparasi_header.nama_customer_id', '=', 'customer.id')
        ->where('kode_transaksi', $kode_transaksi)
        ->first();
        
        return view('transaksi_masuk.detail')->with([
            'data' => $data,
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_transaksi)
    {
        $title = "Transaksi Masuk";
        $subtitle = "Edit data";
        $data = TransaksiMasuk::where('kode_transaksi', $kode_transaksi)->first();
        $customer = ReparasiHeader::select(
            'kode_reparasi',
            'nama_customer_id',
            'customer.nama_customer'
        )->join('customer', 'reparasi_header.nama_customer_id', '=', 'customer.id')
        ->groupBy('kode_reparasi')
        ->orderBy('reparasi_header.updated_at', 'asc')
        ->get();
        return view('transaksi_masuk.edit')->with([
            'data' => $data,
            'customer' => $customer,
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_transaksi)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'kode_reparasi' => ['not_in:-'],
            'tanggal' => 'required',
            'tujuan_pembayaran' => ['not_in:-'],
            'nominal' => 'required',
        ],[
            'kode_transaksi.required' => 'Masukkan kode transaksi!',
            'kode_reparasi.not_in' => 'Pilih customer!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
            'tujuan_pembayaran.not_in' => 'Pilih tujuan pembayaran!',
            'nominal.required' => 'Masukkan nominal transaksi!',
        ]);

        $kode_reparasi = explode(' ', $request->input('kode_reparasi'));
        $data = [
            'kode_reparasi' => $kode_reparasi[0],
            'tanggal' => $request->input('tanggal'),
            'tujuan_pembayaran' => $request->input('tujuan_pembayaran'),
            'nominal' => $request->input('nominal'),
            'keterangan' => $request->input('keterangan'),
        ];

        TransaksiMasuk::where('kode_transaksi', $kode_transaksi)->update($data);
        return redirect('transaksi_masuk')->with('success', 'Berhasil melakukan update data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_transaksi)
    {
        $data = TransaksiMasuk::all();
        foreach ($data as $item) {
            $kode_reparasi = $item->kode_reparasi;
        }
        TransaksiMasuk::where('kode_transaksi', $kode_transaksi)->delete();
        ReparasiHeader::where('kode_reparasi', $kode_reparasi)->update([
            'status_pembayaran' => 'Belum lunas'
        ]);
        return redirect('/transaksi_masuk')->with('success', 'Data berhasil dihapus.');
    }
}
