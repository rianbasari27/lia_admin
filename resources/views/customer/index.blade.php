@extends('index')

@section('main-content')
<div>
    <div class="flex justify-between">
        <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
        <a href="/reparasi/create" class="px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300">
            <i class="fa-solid fa-angle-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md mt-5">
    <div class="bg-slate-300 px-5 py-3 rounded-t-md">
        <span class="font-semibold text-slate-600">Tambah data</span>
    </div>

    <div class="p-5">
        <div class="font-light">
            <form action="/reparasi/create/customer" method="post">
                @csrf
                <div class="flex mb-3">
                    <div class="w-[140px] my-auto">
                        <label for="nama_customer" class="text-slate-600">Nama Customer</label>
                    </div>
                    <div>
                        <input type="text" name="nama_customer" id="nama_customer" class="w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                    </div>
                </div>
                <div class="flex mb-3">
                    <div class="w-[140px] my-auto">
                        <label for="no_telepon" class="text-slate-600">No. Telepon</label>
                    </div>
                    <div>
                        <input type="text" value="+62 " name="no_telepon" id="no_telepon" class="w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                    </div>
                </div>
                <div class="flex mb-3">
                    <div class="w-[140px] my-auto">
                        <label for="alamat" class="text-slate-600">Alamat</label>
                    </div>
                    <div>
                        <textarea name="alamat" id="alamat" cols="50" rows="3" class="block p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400"></textarea>
                    </div>
                </div>
            </div>
            
            <div>
                <input type="submit" name="submit" value="Simpan" class="px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200">
                <a href="/reparasi/create" name="back" class="px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300"></i>Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection