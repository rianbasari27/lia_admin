<?php

namespace App\Http\Controllers;

use App\Models\PembelianHeader;
use App\Models\ReparasiHeader;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\TransaksiKeluar;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Transaksi Keluar";
        $query = TransaksiKeluar::query();
        $query->select(
            'kode_transaksi',
            'pembelian_header.kode_pembelian',
            'nama_supplier',
            'pembayaran_lain',
            'transaksi_keluar.tanggal',
            'tujuan_transaksi',
            'nominal',)
        // )->join('supplier', 'transaksi_keluar.nama_supplier_id', '=', 'supplier.id')
        ->leftJoin('pembelian_header', 'transaksi_keluar.kode_pembelian', '=', 'pembelian_header.kode_pembelian')
        ->leftJoin('supplier', 'pembelian_header.nama_supplier_id', '=', 'supplier.id');

        if ($request->kode_transaksi) {
            $query->where('kode_transaksi', 'like', '%' . $request->kode_transaksi . '%');
        }

        if ($request->transaksi_tujuan) {
            $query->where('nama_supplier', 'like', '%' . $request->transaksi_tujuan . '%');
        }
        
        if ($request->tanggal_mulai && $request->tanggal_sampai) {
            $query->whereBetween('transaksi_keluar.tanggal', [$request->tanggal_mulai, $request->tanggal_sampai]);
        }

        if ($request->pembayaran_lain) {
            $query->where('pembayaran_lain', 'like', '%' . $request->pembayaran_lain . '%');
        }

        $data = $query->orderBy('transaksi_keluar.updated_at', 'desc')
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
        $subtitle = "Tambah data";
        $transaksi = TransaksiKeluar::all();

        $kode_tk = TransaksiKeluar::orderBy('kode_transaksi', 'desc')->first();
        $kode_transaksi = "";
        if ($kode_tk) {
            $kode_transaksi = substr($kode_tk->kode_transaksi, 2) + 1;
            $kode_transaksi = 'TK' . str_pad($kode_transaksi, 6, '0', STR_PAD_LEFT);
        } 
        else {
            $kode_transaksi = 'TK000001';
        }

        $data = PembelianHeader::select(
            'kode_pembelian',
            'nama_supplier_id',
            'supplier.nama_supplier'
        )->join('supplier', 'pembelian_header.nama_supplier_id', '=', 'supplier.id')
        ->groupBy('kode_pembelian')
        ->orderBy('pembelian_header.updated_at', 'asc')
        ->get();
        return view('transaksi_keluar.create')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'data' => $data,
            'kode_transaksi' => $kode_transaksi,
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'kode_pembelian' => ['required_if:check,false','not_in:-'],
            'tanggal' => 'required',
            'pembayaran_lain' => 'required_if:check,true',
            'nominal' => 'required',
            'tujuan_transaksi' => 'required',
        ],[
            'kode_transaksi.required' => 'Masukkan kode transaksi!',
            'kode_pembelian.required_if' => 'Pilih supplier!',
            'kode_pembelian.not_in' => 'Pilih supplier!',
            'tanggal.required' => 'Masukkan tanggal reparasi!',
            'pembayaran_lain.required_if' => 'Masukkan pembayaran!',
            'nominal.required' => 'Masukkan nominal transaksi!',
            'tujuan_transaksi.required' => 'Pilih tujuan transaksi!',
        ]);

        $kode_pembelian = explode(' ', $request->input('kode_pembelian'));

        $value = $kode_pembelian[0];
        if ($request->input('kode_pembelian') == '-') {
            $value = null;
        } 

        $data = [
            'kode_transaksi' => $request->input('kode_transaksi'),
            'kode_pembelian' => $value,
            'pembayaran_lain' => $request->input('pembayaran_lain'),
            'tanggal' => $request->input('tanggal'),
            'tujuan_transaksi' => $request->input('tujuan_transaksi'),
            'nominal' => $request->input('nominal'),
            'keterangan' => $request->input('keterangan'),
            'created_by' => auth()->user()->id,
        ];

        TransaksiKeluar::create($data);

        return redirect('transaksi_keluar')->with('success', 'Data berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_transaksi)
    {
        $title = "Transaksi Keluar";
        $subtitle = "Detail data";
        $data = TransaksiKeluar::select(
            'kode_transaksi',
            'transaksi_keluar.tanggal',
            'transaksi_keluar.kode_pembelian',
            's.nama_supplier',
            'pembayaran_lain',
            'tujuan_transaksi',
            'nominal',
            'nama',
        )->leftJoin('pembelian_header as ph', 'transaksi_keluar.kode_pembelian', '=', 'ph.kode_pembelian')
        ->leftJoin('supplier as s', 'ph.nama_supplier_id', '=', 's.id')
        ->leftJoin('users', 'created_by', '=', 'users.id')
        ->where('kode_transaksi', $kode_transaksi)
        ->first();

        // dd($data);

        // $data = TransaksiKeluar::leftJoin('pembelian_header', 'transaksi_keluar.kode_pembelian', '=', 'pembelian_header.kode_pembelian')
        // ->leftJoin('supplier', 'pembelian_header.nama_supplier_id', '=', 'supplier.id')
        // ->where('kode_transaksi', $kode_transaksi)
        // ->first();
        
        return view('transaksi_keluar.detail')->with([
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
        $title = "Transaksi Keluar";
        $subtitle = "Edit data";
        $data = TransaksiKeluar::where('kode_transaksi', $kode_transaksi)->first();
        $supplier = PembelianHeader::select(
            'kode_pembelian',
            'nama_supplier_id',
            'supplier.nama_supplier'
        )->join('supplier', 'pembelian_header.nama_supplier_id', '=', 'supplier.id')
        ->groupBy('kode_pembelian')
        ->orderBy('pembelian_header.updated_at')
        ->get();
        return view('transaksi_keluar.edit')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'supplier' => $supplier,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_transaksi)
    {
        $kode_pembelian = explode(' ', $request->input('kode_pembelian'));
        $data = [
            'kode_pembelian' => $kode_pembelian[0],
            'pembayaran_lain' => $request->input('pembayaran_lain'),
            'tanggal' => $request->input('tanggal'),
            'tujuan_transaksi' => $request->input('tujuan_transaksi'),
            'nominal' => $request->input('nominal'),
            'keterangan' => $request->input('keterangan'),
        ];

        TransaksiKeluar::where('kode_transaksi', $kode_transaksi)->update($data);

        return redirect('transaksi_keluar')->with('success', 'Berhasil melakukan update data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_transaksi)
    {
        TransaksiKeluar::where('kode_transaksi', $kode_transaksi)->delete();
        return redirect('/transaksi_keluar')->with('success', 'Data berhasil dihapus.');
    }
}
