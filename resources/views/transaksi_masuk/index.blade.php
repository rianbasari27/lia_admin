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
                <span class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">Transaksi</span>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="/transaksi_masuk" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $title }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex justify-between">
        <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
        <a href="/transaksi_masuk/create" class="px-3 py-2 bg-red-700 rounded-lg shadow-md text-white hover:bg-red-800 focus:ring focus:ring-red-200">
            <i class="fa-solid fa-plus mr-2"></i>Tambah
        </a>
    </div>

    {{-- Filter --}}

    <div id="accordion-collapse" data-accordion="collapse" class="bg-white rounded-lg shadow-md mt-5">
        <h2 id="accordion-collapse-heading-3">
            <button type="button" class="flex items-center rounded-lg justify-between w-full px-5 py-2 font-medium text-left text-slate-500 bg-slate-300  focus:ring-4 focus:ring-slate-200 hover:bg-slate-400" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                <span class="font-semibold text-slate-600"><i class="fa-solid fa-magnifying-glass mr-2"></i>Filter data</span>
                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
            <div class="p-5 border border-t-0 border-slate-200">
                <div class="font-light">

                    <form action="/transaksi_masuk" method="get">
                        <div class="grid grid-cols-12 gap-1 mb-3">
                            <div class="col-span-2 my-auto">
                                <label for="kode_transaksi" class="text-slate-600">Kode Transaksi</label>
                            </div>
                            <div class="col-span-3 ">
                                <input type="text" name="kode_transaksi" id="kode_transaksi" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400" value="{{ old('kode_transaksi') }}">
                            </div>
                            <div></div>
                            <div class="col-span-1 my-auto">
                                <label for="tanggal" class="text-slate-600">Tanggal</label>
                            </div>
                            <div class="col-span-4 ">
                                <input type="date" name="tanggal_mulai" id="tanggal" class="w-[150px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                -
                                <input type="date" name="tanggal_sampai" id="tanggal" class="w-[150px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-1 mb-3">
                            <div class="col-span-2 my-auto">
                                <label for="nama_customer" class="text-slate-600">Nama Customer</label>
                            </div>
                            <div class="col-span-3">
                                <input type="text" name="nama_customer" id="nama_customer" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            </div>
                            <div></div>
                            <div class="col-span-2">
                                <p class="text-slate-600">Tujuan Pembayaran</p>
                            </div>
                            <div class="col-span-3 ">
                                <div class="w-full">
                                    <select name="tujuan_pembayaran" id="tujuan_pembayaran" class="w-5/6 p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                        <option value="Uang muka">Uang muka</option>
                                        <option value="Cicilan">Cicilan</option>
                                        <option value="Pelunasan">Pelunasan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" name="search" class="px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200"><i class="fa-solid fa-magnifying-glass mr-2"></i>Cari data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    {{-- End Filter --}}


    <div class="bg-white mt-7 rounded-lg shadow-md">
        <div class="bg-slate-300 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">Transaksi masuk terbaru</span>
        </div>
        <div class="p-5">
            <table class="w-full rounded-lg">
                <thead class="text-left">
                    <tr class="bg-slate-300">
                        <th class="p-5 rounded-tl-lg"></th>
                        <th>Kode Transaksi</th>
                        <th>Nama Customer</th>
                        <th>Tanggal</th>
                        <th>tujuan Pembayaran</th>
                        <th>Nominal</th>
                        <th class="rounded-tr-lg"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="border-b border-x border-slate-300 hover:bg-slate-100 text-slate-500">
                        <td class="p-2">
                            <div class="flex">
                                <div class="mr-2">
                                    <a href="{{ url('/transaksi_masuk/'.$item->kode_transaksi.'/edit') }}" class="block px-2.5 py-2 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-emerald-500 hover:border-emerald-500">
                                        <span class=""><i class="fa-solid fa-pen-to-square"></i></span>
                                    </a>
                                </div>
                                <div class="mr-2">
                                    <form action="{{ '/transaksi_masuk/'.$item->kode_transaksi }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-2 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                                            <span class=""><i class="fa-solid fa-trash"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->kode_transaksi }}</td>
                        <td>{{ $item->nama_customer }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->tujuan_pembayaran }}</td>
                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ url('/transaksi_masuk/'.$item->kode_transaksi) }}/" class="underline underline-offset-1 text-red-700">Lihat detail</a>
                        </td>
                    </tr>
                    @endforeach
                    @if ($data->isEmpty()) 
                    <tr class="border-b border-x border-slate-300 text-slate-500">
                        <td colspan="7" class="text-center py-3">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection