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
        $title = "Laporan Kas Masuk";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        $tahun = date("Y");
        // $jumlah_customer = DB::table('reparasi_header as a')
        //             ->select(DB::raw('COUNT(nama_customer_id) as jumlah_customer', 'tanggal'))
        //             ->whereDate('tanggal', '=', date('d'))
        //             ->whereMonth('tanggal', '=', date('m'))
        //             ->whereYear('tanggal', '=', date('Y'))
        //             ->get();
        // $jumlah_barang = DB::table('reparasi_detail as a')
        //             ->select(DB::raw('COUNT(nama_barang_id) as jumlah_barang'))
        //             ->join('transaksi_masuk as b', 'a.kode_reparasi', '=', 'b.kode_reparasi')
        //             ->whereDate('tanggal', '=', date('d'))
        //             ->whereMonth('tanggal', '=', date('m'))
        //             ->whereYear('tanggal', '=', date('Y'))
        //             ->get();

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

        // SELECT 
        //     MONTH(rh.tanggal) AS bulan,
        //     DAY(rh.tanggal) AS tanggal,
        //     COUNT(DISTINCT rh.nama_customer_id) AS jumlah_customer,
        //     COUNT(DISTINCT rd.nama_barang_id) AS jumlah_barang,
        //     SUM(tm.nominal) AS uang_masuk
        // FROM reparasi_header rh
        // JOIN reparasi_detail rd ON rh.kode_reparasi = rd.kode_reparasi
        // JOIN customer c ON rh.nama_customer_id = c.id
        // JOIN jenis_barang jb ON rd.nama_barang_id = jb.id
        // JOIN transaksi_masuk tm ON rh.kode_reparasi = tm.kode_reparasi
        // GROUP BY bulan, tanggal
        // ORDER BY tanggal;


        else {
            $query = DB::table('reparasi_header as rh')
            ->select(DB::raw('MONTH(rh.tanggal) as bulan'), 'tanggal')
            ->selectRaw('COUNT(rh.nama_customer_id) as jumlah_customer')
            ->selectSub(function ($query) {
                $query->from('reparasi_detail as rd')
                    ->selectRaw('COUNT(1)')
                    ->join('transaksi_masuk as tm', 'rd.kode_reparasi', '=', 'tm.kode_reparasi')
                    // ->groupBy('rh.tanggal');
                    ->whereRaw('tm.tanggal = rh.tanggal');
                    // ->whereRaw('rd.created_at = rh.created_at');
            }, 'jumlah_barang')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('SUM(tm.nominal)')
                    ->whereRaw('tm.tanggal = rh.tanggal');
            }, 'uang_masuk')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('SUM(tm.nominal)')
                    ->whereRaw('MONTH(tm.tanggal) = MONTH(rh.tanggal)');
            }, 'total')
            ->groupBy('rh.tanggal')
            ->get();
        }

        // dd($data);
        
        return view('laporan_pemasukan.index')->with([
            'title' => $title,
            'query' => $query,
            'bulan' => $bulan,
            'tahun' => $tahun,
            // 'jumlah_customer' => $jumlah_customer,
            // 'jumlah_barang' => $jumlah_barang,
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
