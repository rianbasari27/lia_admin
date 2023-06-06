@extends('index')

@section('main-content')

<div>

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center my-4 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700 dark:text-slate-400 dark:hover:text-white">
                    <i class="fa-solid fa-house mr-2"></i>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="/reparasi" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $title }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="/reparasi/create/barang" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $subtitle }}</a>
                </div>
            </li>
        </ol>
    </nav>
    

    <div class='flex justify-between'>
        <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
        <a href='/reparasi' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
            <i class='fa-solid fa-angle-left mr-2'></i>Kembali
        </a>
    </div>
</div>


<div class="bg-white rounded-lg shadow-md mt-5">
    <div class="bg-slate-300 px-5 py-3 rounded-t-md">
        <span class="font-semibold text-slate-600">Tambah data</span>
    </div>

    <div class="p-5">
        <div class="font-light">
            <form action="/reparasi/create/barang" method="post">
                @csrf
                <div class="flex mb-3">
                    <div class="w-[140px] my-auto">
                        <label for="nama_barang" class="text-slate-600">Nama Barang</label>
                    </div>
                    <div>
                        <input type="text" name="nama_barang" id="nama_barang" class="w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
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