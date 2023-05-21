<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiMasuk;
use Illuminate\Support\Facades\DB;

class LaporanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Laporan Pemasukan";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        $tahun = date("Y");
        $jumlah_customer = DB::table('reparasi_header as a')
                    ->select(DB::raw('COUNT(nama_customer_id) as jumlah_customer', 'tanggal'))
                    ->whereDate('tanggal', '=', date('d'))
                    ->whereMonth('tanggal', '=', date('m'))
                    ->whereYear('tanggal', '=', date('Y'))
                    ->get();
        $jumlah_barang = DB::table('reparasi_detail as a')
                    ->select(DB::raw('COUNT(nama_barang_id) as jumlah_barang'))
                    ->join('transaksi_masuk as b', 'a.kode_reparasi', '=', 'b.kode_reparasi')
                    ->whereDate('tanggal', '=', date('d'))
                    ->whereMonth('tanggal', '=', date('m'))
                    ->whereYear('tanggal', '=', date('Y'))
                    ->get();

        if ($request->has('bulan') || $request->has('tahun')) {
            // dd($request->all());
            $data = DB::table('reparasi_header as a')
                    ->join('transaksi_masuk as b', 'a.kode_reparasi', '=', 'b.kode_reparasi')
                    ->join('reparasi_detail as c', 'a.kode_reparasi', '=', 'c.kode_reparasi')
                    ->select(
                    DB::raw('MONTH(b.tanggal) as bulan'),
                    'b.tanggal',
                    DB::raw('COUNT(a.nama_customer_id) as jumlah_customer'),
                    DB::raw('COUNT(c.nama_barang_id) as jumlah_barang'),
                    DB::raw("SUM(b.nominal) as uang_masuk"),
                    )
                    ->whereMonth('b.tanggal', '=', $request->bulan)
                    ->whereYear('b.tanggal', '=', $request->tahun)
                    ->groupBy('a.kode_reparasi')
                    ->orderByDesc('b.updated_at')
                    // ->get()
                    ->paginate(10);
        }

        else {
            $data = DB::table('reparasi_header as a')
                ->join('transaksi_masuk as b', 'a.kode_reparasi', '=', 'b.kode_reparasi')
                ->join('reparasi_detail as c', 'a.kode_reparasi', '=', 'c.kode_reparasi')
                ->select(
                    DB::raw('MONTH(b.tanggal) as bulan'),
                    'b.tanggal',
                    DB::raw('COUNT(a.nama_customer_id) as jumlah_customer'),
                    DB::raw('COUNT(c.nama_barang_id) as jumlah_barang'),
                    DB::raw("SUM(b.nominal) as uang_masuk"),
                )
                // ->whereMonth('b.tanggal', date('m'))
                // ->whereYear('b.tanggal', date('Y'))
                ->groupBy('b.tanggal')
                ->orderByDesc('b.tanggal')
                // ->paginate(10);
                ->get();

        }

        // dd($data);
        
        return view('laporan_pemasukan.index')->with([
            'title' => $title,
            'data' => $data,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'jumlah_customer' => $jumlah_customer,
            'jumlah_barang' => $jumlah_barang,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
