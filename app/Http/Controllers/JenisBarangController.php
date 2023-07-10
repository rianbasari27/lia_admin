<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisBarangController extends Controller
{

    public function index(Request $request) {
        $title = "Jenis Barang";
        $query = JenisBarang::query();
        if ($request->search) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }
        $data = $query->paginate(10);
        return view('jenis_barang.index')->with([
            'title' => $title,
            'data' => $data,
        ]);
    }

    public function store(Request $request) {
        if($request->id_barang){
            $request->validate([
                'edit_barang' => 'required',
            ],[
                'edit_barang.required' => 'Masukkan nama barang',
            ]);
    
            foreach ($request->edit_barang as $key => $item) {
                $data = [
                    'nama_barang' => $request->edit_barang[$key],
                ];
                JenisBarang::where('id', $request->id_barang[$key])->update($data);
            }
    
            return redirect('jenis_barang')->with('success', 'Berhasil melakukan update data.');
        }

        $request->validate([
            'nama_barang' => 'required'
        ],[
            'nama_barang.required' => 'Masukkan nama barang!'
        ]);
        $data = [
            'nama_barang' => $request->nama_barang,
        ];
        JenisBarang::create($data);
        return redirect('jenis_barang')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'edit_barang' => 'required',
        ],[
            'edit_barang.required' => 'Masukkan nama barang',
        ]);

        foreach ($request->edit_barang as $key => $item) {
            $data = [
                'edit_barang' => $request->edit_barang[$key],
            ];
            JenisBarang::where('id', $id)->update($data);
        }

        return redirect('jenis_barang')->with('success', 'Berhasil melakukan update data.');
    }

    public function destroy(string $id)
    {
        JenisBarang::where('id', $id)->delete();
        Session::flash('success','Data berhasil dihapus.');
        return response()->json(['status'=>'success']);
    }
}
