<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function create() {
        $title = "Reparasi";
        $subtitle = "Tambah Jenis Barang";
        return view('jenis_barang.index')->with([
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }

    public function store(Request $request) {
        $data = [
            'nama_barang' => $request->input('nama_barang'),
        ];
        JenisBarang::create($data);
        return redirect('reparasi/create')->with('success', 'Data berhasil ditambahkan.');
    }
}
