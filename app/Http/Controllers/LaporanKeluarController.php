<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianHeader;
use Illuminate\Support\Facades\DB;

class LaporanKeluarController extends Controller
{
    public function index(Request $request)
    {
        $subtitle = "Laporan";
        $title = "Laporan Kas Keluar";
        $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember",];
        array_unshift($bulan,"");
        unset($bulan[0]);
        $tahun = date("Y");

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

        // dd($data);
        
        return view('laporan_pengeluaran.index')->with([
            'title' => $title,
            'subtitle' => $subtitle,
            'data' => $data,
            'bulan' => $bulan,
            'tahun' => $tahun,
            // 'jumlah_customer' => $jumlah_customer,
            // 'jumlah_barang' => $jumlah_barang,
        ]);
    }

    public function cetak() {
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
                    ->selectRaw('COUNT(ph.nama_customer_id)')
                    ->whereRaw('ph.tanggal = pembelian_header.tanggal');
            }, 'jumlah_customer')
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
            ->whereMonth('pembelian_header.tanggal', date('m'))
            ->whereYear('pembelian_header.tanggal', date('Y'));

        $data = $query->groupBy('pembelian_header.tanggal')->get();

        return view('laporan_pengeluaran.print')->with([
            'title' => $title, 
            'data' => $data, 
            'bulan' => $bulan, 
            // 'jumlah_customer' => $jumlah_customer,
            // 'jumlah_barang' => $jumlah_barang,
        ]);
    }

}
