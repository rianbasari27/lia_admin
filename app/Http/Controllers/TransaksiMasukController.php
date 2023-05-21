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
    public function index()
    {
        $title = "Transaksi Masuk";
        $data = TransaksiMasuk::select(
            'kode_transaksi',
            'nama_customer',
            'tanggal',
            'tujuan_pembayaran',
            'nominal',
        )->join('customer', 'transaksi_masuk.nama_customer_id', '=', 'customer.id')
        ->orderBy('transaksi_masuk.updated_at', 'desc')
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
        $transaksi = TransaksiMasuk::all();
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
            'transaksi' => $transaksi,
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'kode_reparasi' => 'required',
        //     'nama_customer_id' => 'required',
        //     'tanggal' => 'required',
        // ],[
        //     'kode_reparasi.required' => 'Masukkan kode reparasi!',
        //     'nama_customer_id.required' => 'Pilih customer atau tambah baru customer!',
        //     'tanggal.required' => 'Masukkan tanggal reparasi!',
        // ]);

        $kode_reparasi = explode(' ', $request->input('kode_reparasi'));
        $data = [
            'kode_transaksi' => $request->input('kode_transaksi'),
            'nama_customer_id' => $kode_reparasi[1],
            'kode_reparasi' => $kode_reparasi[0],
            'tanggal' => $request->input('tanggal'),
            'tujuan_pembayaran' => $request->input('tujuan_pembayaran'),
            'nominal' => $request->input('nominal'),
            'keterangan' => $request->input('keterangan'),
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
        $data = TransaksiMasuk::where('kode_transaksi', $kode_transaksi)->first();
        return view('transaksi_masuk.detail')->with([
            'data' => $data,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_transaksi)
    {
        $title = "Transaksi Masuk";
        $data = TransaksiMasuk::where('kode_transaksi', $kode_transaksi)->first();
        $tes = ReparasiHeader::all();
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
            'tes' => $tes,
            'customer' => $customer,
            'title' => $title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_transaksi)
    {
        $kode_reparasi = explode(' ', $request->input('kode_reparasi'));
        $data = [
            'nama_customer_id' => $kode_reparasi[1],
            'kode_reparasi' => $kode_reparasi[0],
            'tanggal' => $request->input('tanggal'),
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
