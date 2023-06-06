<?php

namespace App\Http\Controllers;

use App\Models\PembelianHeader;
use App\Models\ReparasiHeader;
use App\Models\TransaksiKeluar;
use App\Models\TransaksiMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $title = "Dashboard";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        $tahun = date("Y");

        $t_masuk = TransaksiMasuk::selectRaw('COUNT(kode_transaksi) as j_t_masuk, MONTH(tanggal) as bulan, SUM(nominal) as total_masuk')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        
        $t_keluar = TransaksiKeluar::selectRaw('COUNT(kode_transaksi) as j_t_keluar, MONTH(tanggal) as bulan, SUM(nominal) as total_keluar')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        // $t_masuk = TransaksiMasuk::all();
        // $t_keluar = TransaksiKeluar::all();
        $reparasi = ReparasiHeader::select(DB::raw('COUNT(kode_reparasi) as total_r'))->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->get();
        $pembelian = PembelianHeader::select(DB::raw('COUNT(kode_pembelian) as total_p'))->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->get();
        $transaksi_masuk = TransaksiMasuk::select(DB::raw('COUNT(kode_transaksi) as tr_masuk'))->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->get();
        $transaksi_keluar = TransaksiKeluar::select(DB::raw('COUNT(kode_transaksi) as tr_keluar'))->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->get();
        // dd($reparasi);
        return view('dashboard.index')->with([
            'title' => $title,
            't_masuk' => $t_masuk,
            't_keluar' => $t_keluar,
            'reparasi' => $reparasi,
            'pembelian' => $pembelian,
            'transaksi_masuk' => $transaksi_masuk,
            'transaksi_keluar' => $transaksi_keluar,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }
}
