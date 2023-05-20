<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function create() {
        $title = "Reparasi";
        return view('customer.index')->with('title', $title);
    }

    public function store(Request $request) {
        $data = [
            'nama_customer' => $request->input('nama_customer'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat')
        ];
        Customer::create($data);
        return redirect('reparasi/create')->with('success', 'Data berhasil ditambahkan.');
    }
}
