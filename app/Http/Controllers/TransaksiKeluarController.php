<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKeluarDetail;
use App\Models\TransaksiKeluarHeader;
use Illuminate\Http\Request;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Transaksi Keluar";
        $data = TransaksiKeluarHeader::latest()
        ->groupBy('kode_transaksi')
        ->orderBy('updated_at', 'desc')
        ->paginate(10);
        return view('transaksi_keluar.index')->with([
            'data' => $data,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Transaksi Keluar";
        $data = TransaksiKeluarHeader::all();
        return view('transaksi_keluar.create')->with([
            'title' => $title,
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
            'transaksi_tujuan' => 'required',
            'tanggal' => 'required',
        ],[
            'kode_transaksi.required' => 'Masukkan kode transaksi!',
            'transaksi_tujuan.required' => 'Masukkan transaksi tujuan!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
        ]);

        $header = [
            'kode_transaksi' => $request->input('kode_transaksi'),
            'transaksi_tujuan' => $request->input('transaksi_tujuan'),
            'tanggal' => $request->input('tanggal'),
            'total' => $request->input('total')
        ];

        TransaksiKeluarHeader::create($header);
        
        foreach ($request->tujuan_transaksi as $key => $item) {
            $detail = [
                'kode_transaksi' => $request->kode_transaksi,
                'tujuan_transaksi' => $request->tujuan_transaksi[$key],
                'nominal' => $request->nominal[$key],
                'keterangan' => $request->keterangan[$key],
            ];

            TransaksiKeluarDetail::create($detail);
        }

        return redirect('transaksi_keluar')->with('success', 'Data berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_transaksi)
    {
        $title = "Transaksi Keluar";
        $data = TransaksiKeluarHeader::where('kode_transaksi', $kode_transaksi)->first();
        $detail = TransaksiKeluarDetail::where('kode_transaksi', $kode_transaksi)->get();
        return view('transaksi_keluar.detail')->with([
            'data' => $data,
            'detail' => $detail,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_transaksi)
    {
        $title = "Transaksi Keluar";
        $data = TransaksiKeluarHeader::where('kode_transaksi', $kode_transaksi)->first();
        $detail = TransaksiKeluarDetail::where('kode_transaksi', $kode_transaksi)->get();
        return view('transaksi_keluar.edit')->with([
            'title' => $title,
            'data' => $data,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_transaksi)
    {
        TransaksiKeluarHeader::where('kode_transaksi', $kode_transaksi)->delete();
        TransaksiKeluarDetail::where('kode_transaksi', $kode_transaksi)->delete();
        return redirect('/transaksi_keluar')->with('success', 'Data berhasil dihapus.');
    }
}
