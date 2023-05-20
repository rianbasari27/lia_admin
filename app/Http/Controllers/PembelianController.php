<?php

namespace App\Http\Controllers;

use App\Models\PembelianDetail;
use App\Models\PembelianHeader;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Pembelian Sparepart";
        $data = PembelianHeader::select(
            'pembelian_header.kode_pembelian',
            'tanggal',
            'sparepart.nama_sparepart',
            'tempat_pembelian',
            'jumlah',
            'total',
            )
            ->join('pembelian_detail', 'pembelian_header.kode_pembelian', '=', 'pembelian_detail.kode_pembelian')
            ->join('sparepart', 'pembelian_detail.nama_sparepart_id', '=', 'sparepart.id')
            ->orderBy('pembelian_header.updated_at', 'desc')
            ->paginate(10);;
        return view('pembelian_sparepart.index')->with([
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Pembelian Sparepart";
        $sparepart = Sparepart::all();
        return view('pembelian_sparepart.create')->with([
            'title' => $title,
            'sparepart' => $sparepart,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'tanggal' => 'required',
        //     'nama_sparepart_id' => 'required',
        //     'tempat_pembelian' => 'required',
        //     'jumlah' => 'required',
        //     'satuan' => 'required',
        //     'biaya' => 'required',
        // ],[
        //     'tanggal.required' => 'Isi tanggal pembelian!',
        //     'nama_sparepart.required' => 'Pilih sparepart atau tambah sparepart baru!',
        //     'tempat_pembelian.required' => 'Masukkan lokasi tempat pembelian!',
        //     'jumlah.required' => 'Masukkan jumlah pembelian!',
        //     'satuan.required' => 'Pilih satuan barang!',
        //     'biaya.required' => 'Masukkan biaya!',
        // ]);

        $header = [
            'kode_pembelian' => $request->input('kode_pembelian'),
            'tanggal' => $request->input('tanggal'),
            'tempat_pembelian' => $request->input('tempat_pembelian'),
        ];

        
        PembelianHeader::create($header);
        
        foreach ($request->nama_sparepart_id as $key => $item) {
            $detail = [
                'kode_pembelian' => $request->kode_pembelian,
                'nama_sparepart_id' => $request->nama_sparepart_id[$key],
                'jumlah' => $request->jumlah[$key],
                'satuan' => $request->satuan[$key],
                'biaya' => $request->biaya[$key],
                'total' => $request->total,
            ];
            
            // dd($detail);
            PembelianDetail::create($detail);
        }
        return redirect('pembelian_sparepart')->with('success', 'Data berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_pembelian)
    {
        $title = "Pembelian Sparepart";
        $header = PembelianHeader::where('kode_pembelian', $kode_pembelian)->first();    
        $detail = PembelianDetail::where('kode_pembelian', $kode_pembelian)->get();    
        return view('pembelian_sparepart.detail')->with([
            'header' => $header,
            'detail' => $detail,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

}
