@extends('index')

@section('main-content')

<div>
    
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
        </ol>
    </nav>

    <div class="flex justify-between">
        <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
        <a href="/reparasi/create" class="px-3 py-2 bg-red-700 rounded-lg shadow-md text-white hover:bg-red-800 focus:ring focus:ring-red-200">
            <i class="fa-solid fa-plus mr-2"></i>Tambah
        </a>
    </div>

    {{-- Filter --}}

    <div class="mt-5">
        <form action="/laporan_pemasukan" method="get">
            <div class="grid grid-cols-12 gap-1">
                <div class="col-span-2">
                    <select name='bulan' id='bulan' class="w-full p-1.5 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                        @foreach ($bulan as $key => $item)
                            <option value="{{ $key }}" {{ (date('m') == $key) ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-1">
                    <select name='tahun' id='tahun' class="w-full p-1.5 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                        @for ($i = $tahun; $i >= ($tahun - 10); $i--)
                            <option value='{{ $i }}'>{{ $i }}</option>;
                        @endfor
                    </select>
                </div>
                
                <div class="col-span-1">
                    <button type="submit" name="search" class="px-3 py-2 rounded-md bg-slate-400 text-white hover:bg-red-700 focus:ring focus:ring-red-200">Search</button>
                </div>
            </div>
        </form>    
    </div>

    {{-- End Filter --}}


    <div class="bg-white mt-7 rounded-lg shadow-md">
        <div class="bg-slate-300 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">Laporan pemasukan</span>
        </div>
        {{-- <div class="mx-5 mt-3">
            @foreach ($bulan as $key => $month)
                <p class="text-lg font-semibold">{{ (date('m') == $key) ? $month : '' }}, {{ date('Y') }}</p>
            @endforeach  
        </div> --}}
        <div class="p-5">
            <table class="w-full">
                <thead class="text-left">
                    <tr class="text-center bg-slate-200">
                        <th class="border border-slate-300 p-2 w-10">No.</th>
                        <th class="border border-slate-300 p-2 w-70">Bulan</th>
                        <th class="border border-slate-300 p-2">Tanggal</th>
                        <th class="border border-slate-300 p-2 w-40">Jumlah Customer</th>
                        <th class="border border-slate-300 p-2 w-40">Jumlah Barang</th>
                        <th class="border border-slate-300 p-2">Uang Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="border border-slate-300 p-2 text-end"><?= $no; ?></td>
                            <td class="border border-slate-300 p-2">
                                @foreach ($bulan as $key => $month)
                                    {{ ($item->bulan == $key) ? $month : '' }}
                                @endforeach    
                            </td>
                            <td class="border border-slate-300 p-2 text-end">{{ $item->tanggal }}</td>
                            <td class="border border-slate-300 p-2 text-end">
                                {{ $item->jumlah_customer }}
                                {{-- @foreach ($jumlah_customer as $customer)
                                    {{ $customer->jumlah_customer }}
                                @endforeach --}}
                            </td>
                            <td class="border border-slate-300 p-2 text-end">
                                {{ $item->jumlah_barang }}
                                {{-- @foreach ($jumlah_barang as $barang)
                                    {{ $barang->jumlah_barang }}
                                @endforeach --}}
                            </td>
                            <td class="border border-slate-300 p-2 text-end">Rp {{ number_format($item->uang_masuk, 0, ',', '.') }}</td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="border border-slate-300 p-2 text-end" colspan="5">Total pemasukan</th>
                        <th class="border border-slate-300 p-2 text-end"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
    
@endsection