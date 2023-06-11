<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use App\Models\PembelianHeader;
use App\Models\Supplier;
use App\Models\TransaksiKeluar;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Pembelian";
        $query = PembelianHeader::query();
        $query->select(
            'pembelian_header.kode_pembelian'
            ,'s.nama_supplier'
            ,'pembelian_header.tanggal'
            ,DB::raw("GROUP_CONCAT(pd.nama_barang) as nama_barang")
            ,'pembelian_header.total'
            )
            ->join('supplier as s', 'pembelian_header.nama_supplier_id', '=', 's.id')
            ->join('pembelian_detail as pd', 'pembelian_header.kode_pembelian', '=', 'pd.kode_pembelian');
        
        if ( $request->kode_pembelian ) {
            $query->where('pembelian_header.kode_pembelian', 'like', '%' . $request->kode_pembelian . '%');
        }
        
        if ( $request->tanggal_mulai && $request->tanggal_sampai ) {
            $query->whereBetween('pembelian_header.tanggal', [$request->tanggal_mulai, $request->tanggal_sampai]);
        }
        
        if ( $request->nama_supplier ) {
            $query->where('s.nama_supplier', 'like', '%' . $request->nama_supplier . '%');
        }
        
        if ( $request->nama_barang ) {
            $query->where('pd.nama_barang', 'like', '%' . $request->nama_barang . '%');
        }
        
        
        $data = $query->groupBy('pembelian_header.kode_pembelian'
        ,'pembelian_header.tanggal'
        ,'pembelian_header.total'
        ,'s.nama_supplier')
        ->orderByDesc('pembelian_header.updated_at')
        ->paginate(10);
        return view('pembelian.index')->with([
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Pembelian";
        $data = PembelianHeader::all();
        $transaksi = TransaksiKeluar::all();
        
        $kode_p = PembelianHeader::orderBy('kode_pembelian', 'desc')->first();
        $kode_pembelian = "";
        if ($kode_p) {
            $last_kode = $kode_p->kode_pembelian;
            $kode_pembelian = substr($last_kode, 2) + 1;
            $kode_pembelian = 'PB' . str_pad($kode_pembelian, 6, '0', STR_PAD_LEFT);
        } 
        else {
            $kode_pembelian = 'PB000001';
        }

        $supplier = Supplier::all();
        return view('pembelian.create')->with([
            'title' => $title,
            'data' => $data,
            'kode_pembelian' => $kode_pembelian,
            'transaksi' => $transaksi,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama_supplier_id' => ['not_in:-'],
            'nama_barang.*' => 'required',
            'jumlah.*' => 'required',
            'satuan.*' => 'required',
            'biaya.*' => 'required',
        ],[
            'tanggal.required' => 'Isi tanggal pembelian!',
            'nama_supplier_id.not_in' => 'Pilih nama tempat pembelian atau supplier!',
            'nama_barang.*.required' => 'Masukkan nama barang!',
            'jumlah.*.required' => 'Masukkan jumlah pembelian!',
            'satuan.*.required' => 'Pilih satuan barang!',
            'biaya.*.required' => 'Masukkan biaya!',
        ]);

        $header = [
            'kode_pembelian' => $request->input('kode_pembelian'),
            'tanggal' => $request->input('tanggal'),
            'nama_supplier_id' => $request->input('nama_supplier_id'),
            'total' => $request->total,
        ];

        PembelianHeader::create($header);

        foreach ($request->nama_barang as $key => $item) {
            $detail = [
                'kode_pembelian' => $request->kode_pembelian,
                'nama_barang' => $request->nama_barang[$key],
                'jumlah' => $request->jumlah[$key],
                'satuan' => $request->satuan,
                'biaya' => $request->biaya[$key],
            ];
            
            // dd($detail);
            PembelianDetail::create($detail);
            
        $kode_tk = TransaksiKeluar::orderBy('kode_transaksi', 'desc')->first();
        $kode_transaksi = "";
        if ($kode_tk) {
            $last_kode = $kode_tk->kode_transaksi;
            $kode_transaksi = substr($last_kode, 2) + 1;
            $kode_transaksi = 'TK' . str_pad($kode_transaksi, 6, '0', STR_PAD_LEFT);
        } 
        else {
            $kode_transaksi = 'TK000001';
        }
        $biaya = [
            'kode_transaksi' => $kode_transaksi,
            'kode_pembelian' => null,
            'tanggal' => $request->tanggal,
            'tujuan_transaksi' => 'Pembayaran barang atau sparepart',
            'nominal' => $request->total,
            'keterangan' => null,
        ];
        
        TransaksiKeluar::create($biaya);
        
        }
        return redirect('pembelian')->with('success', 'Data berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_pembelian)
    {
        $title = "Pembelian";
        $data = PembelianHeader::where('kode_pembelian', $kode_pembelian)->first();    
        $detail = PembelianDetail::where('kode_pembelian', $kode_pembelian)->get();    

        $supplier = Supplier::select(
            'nama_supplier',
            'no_telepon',
            'alamat',
        )->join('pembelian_header', 'supplier.id', '=', 'pembelian_header.nama_supplier_id')
        ->where('kode_pembelian', $kode_pembelian)
        ->get();    
        // dd($supplier);
        return view('pembelian.detail')->with([
            'data' => $data,
            'supplier' => $supplier,
            'detail' => $detail,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_pembelian)
    {
        $title = "Pembelian";
        $subtitle = "Edit data";
        $supplier = supplier::all();
        $data = PembelianHeader::where('kode_pembelian', $kode_pembelian)->first();
        $detail = PembelianDetail::where('kode_pembelian', $kode_pembelian)->get();
        return view('pembelian.edit')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'supplier' => $supplier,
            'data' => $data,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_pembelian)
    {
        $request->validate([
            'kode_pembelian' => 'required',
            'nama_supplier_id' => ['not_in:-'],
            'tanggal' => 'required',
            'nama_barang' => 'required',
            'jumlah.*' => 'required',
            'biaya.*' => 'required',
        ],[
            'kode_pembelian.required' => 'Masukkan kode pembelian!',
            'nama_supplier_id.not_in' => 'Pilih tempat pembelian!',
            'tanggal.required' => 'Masukkan tanggal pembelian!',
            'nama_barang.required' => 'Masukkan nama barang!',
            'jumlah.*.required' => 'Masukkan jumlah barang!',
            'biaya.*.required' => 'Masukkan biaya pembelian!',
        ]);

        $header = [
            'kode_pembelian' => $request->kode_pembelian,
            'nama_supplier_id' => $request->nama_supplier_id,
            'tanggal' => $request->tanggal,
            'total' => $request->total,
        ];

        PembelianHeader::where('kode_pembelian', $request->kode_pembelian)->update($header);
        PembelianDetail::where('kode_pembelian', $request->kode_pembelian)->delete();

        foreach ($request->nama_barang as $key => $item) {
            $detail = [
                'kode_pembelian' => $request->kode_pembelian,
                'nama_barang' => $request->nama_barang[$key],
                'jumlah' => $request->jumlah[$key],
                'satuan' => $request->satuan[$key],
                'biaya' => $request->biaya[$key],
            ];

            // if ($request->nama_barang_id[$key] == '-') continue;

            PembelianDetail::create($detail);
        }

        return redirect('pembelian')->with('success', 'Berhasil melakukan update data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_pembelian)
    {
        PembelianHeader::where('kode_pembelian', $kode_pembelian)->delete();
        PembelianDetail::where('kode_pembelian', $kode_pembelian)->delete();
        TransaksiKeluar::where('kode_pembelian', $kode_pembelian)->delete();
        return redirect('/pembelian')->with('success', 'Data berhasil dihapus.');
    }

}
