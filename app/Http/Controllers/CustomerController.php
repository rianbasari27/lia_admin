<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $title = "Customer";
        if ($request->search) {
            $data = Customer::where('nama_customer', 'like', '%' . $request->search . '%')
                ->orWhere('no_telepon', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                ->paginate(10);
        }
        else {
            $data = Customer::orderBy('updated_at', 'desc')->paginate(10);
        }
        return view('customer.index')->with([
            'title' => $title,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Customer";
        $subtitle = "Tambah data";
        return view('customer.create')->with([
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
            'nama_customer' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
        ],[
            'nama_customer.required' => 'Masukkan nama customer!',
            'no_telepon.required' => 'Masukkan nomor telepon!',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'alamat.required' => 'Masukkan alamat customer!',
        ]);
        $data = [
            'nama_customer' => $request->input('nama_customer'),
            'no_telepon' => "+62 " . $request->input('no_telepon'),
            'alamat' => $request->input('alamat')
        ];
        Customer::create($data);
        return redirect('/customer')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Customer";
        $subtitle = "Edit data";
        $data = Customer::where('id', $id)->first();
        return view('customer.edit')->with([
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
            'nama_customer' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
        ],[
            'nama_customer.required' => 'Masukkan nama customer!',
            'no_telepon.required' => 'Masukkan nomor telepon!',
            'no_telepon.numeric' => 'Nomor telepon harus berupa angka!',
            'alamat.required' => 'Masukkan alamat customer!',
        ]);

        $data = [
            'nama_customer' => $request->nama_customer,
            'no_telepon' => "+62 " . $request->no_telepon,
            'alamat' => $request->alamat,
        ];

        Customer::where('id', $id)->update($data);

        return redirect('/customer')->with('success', 'Berhasil melakukan update data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::where('id', $id)->delete();
        return redirect('/customer')->with('success', 'Data berhasil dihapus.');
    }
}
