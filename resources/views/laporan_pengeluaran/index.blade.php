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
                <a href="/laporan_kas_keluar" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $subtitle }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="/laporan_kas_keluar" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $title }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <div>
        <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
    </div>

    {{-- Filter --}}

    <div class="mt-5">
        <form action="/laporan_kas_keluar" method="get">
            <div class="grid grid-cols-12 gap-1">
                <div class="col-span-2">
                    <select name='bulan' id='bulan' class="w-full p-1.5 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                        @foreach ($data as $item)
                            @foreach ($bulan as $key => $bln)
                            <option value="{{ $key }}" {{ ($item->bulan == $key) ? 'selected' : '' }}>{{ $bln }}</option>
                            @endforeach
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
            <span class="font-semibold text-slate-600">Laporan Kas Keluar</span>
        </div>
        {{-- <div class="mx-5 mt-3">
            @foreach ($bulan as $key => $month)
                <p class="text-lg font-semibold">{{ (date('m') == $key) ? $month : '' }}, {{ date('Y') }}</p>
            @endforeach  
        </div> --}}
        <div class="p-5">

            <div class="mb-4">
                <a href="{{ url('/laporan_kas_keluar/cetak') }}" name="cetak" id="cetak" target="blank" class="py-2 px-2 mr-2 bg-red-700 text-white rounded-md mb-3 hover:bg-red-800">
                    <i class="fa-solid fa-print text-lg mr-1"></i>
                    Cetak 
                </a>
            </div>

            <table class="w-full">
                <thead class="text-left">
                    <tr class="text-center bg-slate-200">
                        <th class="border border-slate-300 p-2 w-10">No.</th>
                        <th class="border border-slate-300 p-2 w-70">Bulan</th>
                        <th class="border border-slate-300 p-2">Tanggal</th>
                        <th class="border border-slate-300 p-2 w-40">Jumlah Supplier</th>
                        <th class="border border-slate-300 p-2 w-40">Jumlah Transaksi</th>
                        <th class="border border-slate-300 p-2">Uang Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @if ($data->count())
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
                                    {{ $item->jumlah_supplier }}
                                </td>
                                <td class="border border-slate-300 p-2 text-end">
                                    {{ $item->jumlah_transaksi }}
                                </td>
                                <td class="border border-slate-300 p-2 text-end">Rp {{ number_format($item->uang_keluar, 0, ',', '.') }}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    @else 
                    <tr class="border-b border-x border-slate-300 text-slate-500">
                        <td colspan="6" class="text-center py-3">Laporan belum tersedia.</td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th class="border border-slate-300 p-2 text-end" colspan="5">Total pengeluaran</th>
                        {{-- <th class="border border-slate-300 p-2 text-end">Rp {{ $item->total }}</th> --}}
                        <th class="border border-slate-300 p-2 text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
    
@endsection