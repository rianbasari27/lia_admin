@extends('index')

@section('main-content')

<div>

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center my-4 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="/laporan_kas_masuk" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="/laporan_kas_masuk" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $subtitle }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <div>
        <h1 class="lg:text-3xl text-xl text-slate-600 font-semibold">{{ $title }}</h1>
    </div>

    {{-- Filter --}}

    <div class="mt-5">
        <form action="/laporan_kas_masuk" method="get">
            <div class="grid grid-cols-12 gap-1">
                <div class="lg:col-span-2 col-span-5">
                    <select name='bulan' id='bulan' class="w-full p-1.5 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                        @foreach ($bulan as $key => $bln)
                            <option value="{{ $key }}" {{ ( $get_month == $key )  ? 'selected' : '' }}>{{ $bln }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="lg:col-span-1 col-span-3">
                    <select name='tahun' id='tahun' class="w-full p-1.5 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                        @foreach ($tahun as $year)
                            <option value="{{ $year }}" {{ ($year == $get_year) ? 'selected' : '' }}>
                            {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-span-1">
                    <button type="submit" name="search" class="flex px-3 py-2 rounded-md bg-slate-400 text-white hover:bg-red-700 focus:ring focus:ring-red-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        Search
                    </button>
                </div>
            </div>
        </form>    
    </div>

    {{-- End Filter --}}


    <div class="bg-white mt-7 rounded-lg shadow-md">
        <div class="bg-slate-200 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">Laporan Kas Masuk</span>
        </div>
        <div class="p-5">

            <div class="mb-4">
                <a href="{{ url('/laporan_kas_masuk/cetak?bulan='.Request::input('bulan').'&tahun='.Request::input('tahun')) }}" name="cetak" id="cetak" target="blank" class="lg:text-sm text-xs py-2 px-2 mr-2 bg-red-700 text-white rounded-md mb-3 hover:bg-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                    </svg>
                    Cetak 
                </a>
            </div>

            <div class="overflow-x-auto lg:border-0 border-x">
                <table class="lg:w-full w-[700px] lg:text-sm text-xs">
                    <thead class="text-left">
                        <tr class="text-center bg-slate-200">
                            <th class="border border-slate-300 p-2 w-10">No.</th>
                            <th class="border border-slate-300 p-2 w-70">Bulan</th>
                            <th class="border border-slate-300 p-2">Tanggal</th>
                            <th class="border border-slate-300 p-2 w-40">Jumlah Customer</th>
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
                                        @foreach ($bulan as $key => $get_month)
                                            {{ ($item->bulan == $key) ? $get_month : '' }}
                                        @endforeach    
                                    </td>
                                    <td class="border border-slate-300 p-2 text-end">{{ $item->tanggal }}</td>
                                    <td class="border border-slate-300 p-2 text-end">
                                        {{ $item->jumlah_customer }}
                                    </td>
                                    <td class="border border-slate-300 p-2 text-end">
                                        {{ $item->jumlah_transaksi }}
                                    </td>
                                    <td class="border border-slate-300 p-2 text-end">Rp {{ number_format($item->uang_masuk, 0, ',', '.') }}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                            <tr>
                                @foreach ($total as $item)
                                <th class="border border-slate-300 p-2 text-end" colspan="5">Total pemasukan</th>
                                <th class="border border-slate-300 p-2 text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</th>
                                @endforeach
                            </tr>
                            @else 
                            <tr class="border-b border-x border-slate-300 text-slate-500">
                                <td colspan="6" class="text-center py-3">Laporan belum tersedia.</td>
                            </tr>
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection