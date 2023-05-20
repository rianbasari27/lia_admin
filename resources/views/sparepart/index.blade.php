@extends('index')

@section('main-content')

<div>
    <div>
        <div class='flex justify-between'>
            <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/pembelian_sparepart' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <i class='fa-solid fa-angle-left mr-2'></i>Kembali
            </a>
        </div>
    </div>

    @if(session()->has('success'))
    <div id="alert-1" class="flex p-4 mb-4 text-emerald-700 rounded-lg bg-emerald-200" role="alert">
        <div class="ml-3 text-sm font-medium my-auto">
            <i class="fa-solid fa-circle-check text-emerald-700 mr-2"></i>{{ session('success') }}
        </div>
        <button type="button" class="ml-auto bg-emerald-200 text-emerald-500 rounded-lg focus:ring-2 focus:ring-emerald-400 p-1.5 hover:bg-emerald-300 inline-flex " data-dismiss-target="#alert-1" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    @endif

    
    <div class="bg-white mt-7 rounded-lg shadow-md">
        <div class="bg-slate-300 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">List Sparepart</span>
        </div>
        <div class="w-1/2 p-5">
            {{-- Filter --}}
        
            <div>
                <form action="/list_sparepart" method="get">
                    <div class="flex mb-5 justify-between">
                        <div class="flex">
                            <div>
                                <input type="text" name="search" id="search" placeholder="Search" class="w-[330px] p-1.5 rounded-l-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            </div>
                            <div class="mr-2">
                                <button type="submit" name="submit" class="px-3 py-[9px] bg-slate-400 rounded-r-md text-white hover:bg-slate-500 focus:ring focus:ring-slate-300">Search</button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="/list_sparepart/create" class="px-3 py-2.5 bg-red-700 rounded-md shadow-md text-white hover:bg-red-800 focus:ring focus:ring-red-200">
                                <i class="fa-solid fa-plus mr-2"></i>Tambah
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        
            {{-- Filter --}}
            <table class="w-full rounded-lg">
                <thead class="text-left">
                    <tr class="bg-slate-300 text-slate-600">
                        <th class="rounded-tl-lg pl-5">Nama Sparepart</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th class="p-5 rounded-tr-lg"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="border-b border-x border-slate-300 hover:bg-slate-100 text-slate-500">
                        <td class="pl-5">{{ $item->nama_sparepart }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td class="text-end">
                            <div class="p-4">
                                <a href="#" class="px-2 py-2 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                                    <span class=""><i class="fa-solid fa-trash"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection