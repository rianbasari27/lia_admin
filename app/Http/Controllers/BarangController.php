<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public $title;
    public $data;

    public function index() {
        $this->title = "Jenis Barang";
        $this->data = JenisBarang::latest();
        return view('jenis_barang.index')->with([
            'title' => $this->title,
            'data' => $this->data,
        ]);
    }

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
