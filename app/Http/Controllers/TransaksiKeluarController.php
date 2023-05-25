<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
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
        $supplier = Supplier::all();
        return view('transaksi_keluar.create')->with([
            'title' => $title,
            'data' => $data,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'kode_transaksi' => 'required',
        //     'nama_supplier_id' => 'required',
        //     'tanggal' => 'required',
        // ],[
        //     'kode_transaksi.required' => 'Masukkan kode transaksi!',
        //     'nama_supplier_id.required' => 'Masukkan transaksi tujuan!',
        //     'tanggal.required' => 'Masukkan tanggal reparasi!',
        // ]);

        $header = [
            'kode_transaksi' => $request->input('kode_transaksi'),
            'nama_supplier_id' => $request->input('nama_supplier_id'),
            'pembayaran_lain' => $request->input('pembayaran_lain'),
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
        $supplier = Supplier::all();
        $data = TransaksiKeluarHeader::where('kode_transaksi', $kode_transaksi)->first();
        $detail = TransaksiKeluarDetail::where('kode_transaksi', $kode_transaksi)->get();
        return view('transaksi_keluar.edit')->with([
            'title' => $title,
            'supplier' => $supplier,
            'data' => $data,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $header = [
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal' => $request->tanggal,
            'nama_supplier_id' => $request->nama_supplier_id,
            'pembayaran_lain' => $request->pembayaran_lain,
            'total' => $request->total,
        ];

        // if ($request->nama_supplier_id == '-') continue;
        // if ($request->pembayaran_lain == null) continue;

        TransaksiKeluarHeader::where('kode_transaksi', $request->kode_transaksi)->update($header);
        TransaksiKeluarDetail::where('kode_transaksi', $request->kode_transaksi)->delete();

        foreach ($request->tujuan_transaksi as $key => $item) {
            $detail = [
                'kode_transaksi' => $request->kode_transaksi,
                'tujuan_transaksi' => $request->tujuan_transaksi[$key],
                'nominal' => $request->nominal[$key],
                'keterangan' => $request->keterangan[$key],
            ];

            TransaksiKeluarDetail::create($detail);
        }

        return redirect('transaksi_keluar')->with('success', 'Berhasil melakukan update data.');
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
