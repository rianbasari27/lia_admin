<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianHeader;
use App\Models\TransaksiKeluar;
use Illuminate\Support\Facades\DB;

class LaporanKeluarController extends Controller
{
    public function index(Request $request)
    {
        $title = "Laporan Kas Keluar";
        $subtitle = "Laporan";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);

        $get_month = $request->bulan ?? date('n');
        $get_year = $request->tahun ?? date('Y');

        $yearRange = range(date('Y'), 2000);
        $tahun = array_combine($yearRange, $yearRange);

        // $total_keluar = PembelianHeader::query();
        // $total_keluar->selectRaw('SUM(tk.nominal) as total')
        //     ->join('transaksi_keluar as tk', 'pembelian_header.kode_pembelian', '=', 'tk.kode_pembelian');

        // dd($total_keluar->get());  
        // if ($request->bulan && $request->tahun) {
        //     $total_keluar->whereMonth('pembelian_header.tanggal', $request->bulan)
        //         ->whereYear('pembelian_header.tanggal', $request->tahun);
        // } else {
        //     $total_keluar->whereMonth('pembelian_header.tanggal', date('m'))
        //         ->whereYear('pembelian_header.tanggal', date('Y'));
        // }

        // $total = $total_keluar->groupBy(DB::raw('MONTH(pembelian_header.tanggal)'), 'total')->get();

        $query = PembelianHeader::query();
        $query->select(
            DB::raw('MONTH(pembelian_header.tanggal) as bulan'), 
            'tanggal',
            )->selectSub(function ($query) {
                $query->from('pembelian_header as ph')
                    ->selectRaw('COUNT(ph.nama_supplier_id)')
                    ->whereRaw('ph.tanggal = pembelian_header.tanggal');
            }, 'jumlah_supplier')
            ->selectSub(function ($query) {
                $query->from('transaksi_keluar as tk')
                    ->selectRaw('COUNT(tk.kode_transaksi)')
                    ->whereRaw('pembelian_header.tanggal = tk.tanggal');
            }, 'jumlah_transaksi')
            ->selectSub(function ($query) {
                $query->from('transaksi_keluar as tk')
                    ->selectRaw('SUM(tk.nominal)')
                    ->whereRaw('tk.tanggal = pembelian_header.tanggal');
            }, 'uang_keluar')
            ->selectSub(function ($query) {
                $query->from('transaksi_keluar as tk')
                    ->selectRaw('SUM(tk.nominal)')
                    ->whereRaw('MONTH(tk.tanggal) = MONTH(pembelian_header.tanggal)');
            }, 'total');

        if ($request->bulan && $request->tahun) {
            $query->whereMonth('pembelian_header.tanggal', $request->bulan)
                ->whereYear('pembelian_header.tanggal', $request->tahun);
        }

        else {
            $query->whereMonth('pembelian_header.tanggal', date('m'))
                ->whereYear('pembelian_header.tanggal', date('Y'));
        }

        $data = $query->groupBy('pembelian_header.tanggal')->get();
        $total = $query->groupBy(DB::raw('MONTH(pembelian_header.tanggal)'), 'total')->first();
        // dd($data);
        
        return view('laporan_pengeluaran.index')->with([
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
        $title = "Laporan Kas Keluar";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        $query = PembelianHeader::query();
        $query->select(
            DB::raw('MONTH(pembelian_header.tanggal) as bulan'), 
            'tanggal',
            )->selectSub(function ($query) {
                $query->from('pembelian_header as ph')
                    ->selectRaw('COUNT(ph.nama_supplier_id)')
                    ->whereRaw('ph.tanggal = pembelian_header.tanggal');
            }, 'jumlah_supplier')
            ->selectSub(function ($query) {
                $query->from('transaksi_keluar as tk')
                    ->selectRaw('COUNT(tk.kode_transaksi)')
                    ->whereRaw('pembelian_header.tanggal = tk.tanggal');
            }, 'jumlah_transaksi')
            ->selectSub(function ($query) {
                $query->from('transaksi_keluar as tk')
                    ->selectRaw('SUM(tk.nominal)')
                    ->whereRaw('tk.tanggal = pembelian_header.tanggal');
            }, 'uang_keluar')
            ->selectSub(function ($query) {
                $query->from('transaksi_keluar as tk')
                    ->selectRaw('SUM(tk.nominal)')
                    ->whereRaw('MONTH(tk.tanggal) = MONTH(pembelian_header.tanggal)');
            }, 'total')
            ->whereMonth('pembelian_header.tanggal', $month_now)
            ->whereYear('pembelian_header.tanggal', $year_now);

        $data = $query->groupBy('pembelian_header.tanggal')->get();

        return view('laporan_pengeluaran.print')->with([
            'title' => $title, 
            'data' => $data, 
            'bulan' => $bulan, 
            'month_now' => $month_now, 
            'year_now' => $year_now, 
        ]);
    }

}
