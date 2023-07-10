<?php

namespace App\Http\Controllers;

use App\Models\ReparasiHeader;
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
        $subtitle = "Laporan";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        
        $get_month = $request->bulan ?? date('n');
        $get_year = $request->tahun ?? date('Y');
        $yearRange = range(date('Y'), 2000);
        $tahun = array_combine($yearRange, $yearRange);
        

        $total_masuk = ReparasiHeader::query();
        $total_masuk->selectRaw('SUM(tm.nominal) as total')
            ->join('transaksi_masuk as tm', 'reparasi_header.kode_reparasi', '=', 'tm.kode_reparasi');
        if ($request->bulan && $request->tahun) {
            $total_masuk->whereMonth('reparasi_header.tanggal', $get_month)
                ->whereYear('reparasi_header.tanggal', $get_year);
        } else {
            $total_masuk->whereMonth('reparasi_header.tanggal', date('n'))
                ->whereYear('reparasi_header.tanggal', date('Y'));
        }
        $total = $total_masuk->groupBy(DB::raw('MONTH(reparasi_header.tanggal)'))->get();

        $query = ReparasiHeader::query();
        $query->select(
            DB::raw('MONTH(reparasi_header.tanggal) as bulan'), 
            'tanggal',
            )->selectSub(function ($query) {
                $query->from('reparasi_header as rh')
                    ->selectRaw('COUNT(rh.kode_reparasi)')
                    ->whereRaw('rh.tanggal = reparasi_header.tanggal');
            }, 'jumlah_customer')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('COUNT(tm.kode_transaksi)')
                    ->whereRaw('reparasi_header.tanggal = tm.tanggal');
            }, 'jumlah_transaksi')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('SUM(tm.nominal)')
                    ->whereRaw('tm.tanggal = reparasi_header.tanggal');
            }, 'uang_masuk')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('SUM(tm.nominal)')
                    ->whereRaw('MONTH(tm.tanggal) = MONTH(reparasi_header.tanggal)');
            }, 'total');

        if ($request->bulan && $request->tahun) {
            $query->whereMonth('reparasi_header.tanggal', $request->bulan)
                ->whereYear('reparasi_header.tanggal', $request->tahun);
        }

        else {
            $query->whereMonth('reparasi_header.tanggal', date('m'))
                ->whereYear('reparasi_header.tanggal', date('Y'));
        }

        
        $data = $query->groupBy('reparasi_header.tanggal')->get();
        // dd($data);
        
        return view('laporan_pemasukan.index')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'data' => $data,
            'total' => $total,
            'bulan' => $bulan,
            'get_month' => $get_month,
            'get_year' => $get_year,
            'tahun' => $tahun,
        ]);
    }

    public function cetak(Request $request) {
        $month_now = $request->bulan??date('n');
        $year_now = $request->tahun??date('Y');
        $title = "Laporan Kas Masuk";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        $query = ReparasiHeader::query();
        $query->select(
            DB::raw('MONTH(reparasi_header.tanggal) as bulan'), 
            'tanggal',
            )->selectSub(function ($query) {
                $query->from('reparasi_header as rh')
                    ->selectRaw('COUNT(rh.nama_customer_id)')
                    ->whereRaw('rh.tanggal = reparasi_header.tanggal');
            }, 'jumlah_customer')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('COUNT(tm.kode_transaksi)')
                    ->whereRaw('reparasi_header.tanggal = tm.tanggal');
            }, 'jumlah_transaksi')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('SUM(tm.nominal)')
                    ->whereRaw('tm.tanggal = reparasi_header.tanggal');
            }, 'uang_masuk')
            ->selectSub(function ($query) {
                $query->from('transaksi_masuk as tm')
                    ->selectRaw('SUM(tm.nominal)')
                    ->whereRaw('MONTH(tm.tanggal) = MONTH(reparasi_header.tanggal)');
            }, 'total')
            ->whereMonth('reparasi_header.tanggal', $month_now)
            ->whereYear('reparasi_header.tanggal', $year_now);

        $data = $query->groupBy('reparasi_header.tanggal')->get();

        return view('laporan_pemasukan.print')->with([
            'title' => $title, 
            'data' => $data, 
            'bulan' => $bulan, 
            'month_now' => $month_now, 
            'year_now' => $year_now, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
}
