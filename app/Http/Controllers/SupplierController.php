<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Supplier";
        if ($request->search) {
            $data = Supplier::where('nama_supplier', 'like', '%' . $request->search . '%')
                ->orWhere('no_telepon', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                ->paginate(10);
        }
        else {
            $data = Supplier::orderBy('updated_at', 'desc')->paginate(10);
        }
        return view('supplier.index')->with([
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Supplier";
        $subtitle = "Tambah data";
        return view('supplier.create')->with([
            'title' => $title,
            'subtitle' => $subtitle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
        ],[
            'nama_supplier.required' => 'Masukkan nama supplier!',
            'no_telepon.required' => 'Masukkan nomor telepon!',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'alamat.required' => 'Masukkan alamat supplier!',
        ]);
        $format_telp = "+62 ";
        $data = [
            'nama_supplier' => $request->input('nama_supplier'),
            'no_telepon' => $format_telp . $request->input('no_telepon'),
            'alamat' => $request->input('alamat')
        ];
        Supplier::create($data);
        return redirect('/supplier')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Supplier";
        $subtitle = "Edit data";
        $data = Supplier::where('id', $id)->first();
        return view('supplier.edit')->with([
            'title' => $title,
            'data' => $data,
            'subtitle' => $subtitle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
        ],[
            'nama_supplier.required' => 'Masukkan nama supplier!',
            'no_telepon.required' => 'Masukkan nomor telepon!',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka!',
            'alamat.required' => 'Masukkan alamat supplier!',
        ]);

        $format_telp = "+62 ";
        $data = [
            'nama_supplier' => $request->nama_supplier,
            'no_telepon' => $format_telp . $request->no_telepon,
            'alamat' => $request->alamat,
        ];

        Supplier::where('id', $id)->update($data);

        return redirect('/supplier')->with('success', 'Berhasil melakukan update data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::where('id', $id)->delete();
        return redirect('/supplier')->with('success', 'Data berhasil dihapus.');
    }
}
