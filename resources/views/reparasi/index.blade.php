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

                    <form action="/reparasi" method="get">
                        <div class="grid grid-cols-12 gap-1 mb-3">
                            <div class="col-span-2 my-auto">
                                <label for="kode_reparasi" class="text-slate-600">Kode Reparasi</label>
                            </div>
                            <div class="col-span-3 ">
                                <input type="text" name="kode_reparasi" id="kode_reparasi" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400" value="{{ old('kode_reparasi') }}">
                                {{-- @php
                                    dd(old('kode_reparasi'));
                                @endphp --}}
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
                                <p class="text-slate-600">Status Pembayaran</p>
                            </div>
                            <div class="col-span-3 ">
                                <div class="w-full">
                                    <input type="radio" name="status_pembayaran" id="lunas" value="Lunas" class="rounded-full border border-slate-400 text-red-700 focus:ring-red-700">
                                    <label for="lunas" class="mr-3">Lunas</label>
        
                                    <input type="radio" name="status_pembayaran" id="belum_lunas" value="Belum lunas" class="rounded-full border border-slate-400 text-red-700 focus:ring-red-700">
                                    <label for="belum_lunas" class="mr-3">Belum Lunas</label>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 mb-3">

                            <div class="col-span-2 my-auto">
                                <p class="text-slate-600">Jenis Barang</p>
                            </div>
                            
                            <div class="col-span-5">
                                <div class="grid grid-cols-12 gap-1">
                                    
                                    @foreach ($jenis_barang as $item)
                                        <div class="col-span-3">
                                            <input type="checkbox" name="nama_barang[]" id="{{ $item->nama_barang }}" value="{{ $item->id }}" class="rounded border border-slate-400 text-red-700 focus:ring-red-700">
                                            <label for="{{ $item->nama_barang }}" class="mr-3">{{ $item->nama_barang }}</label>
                                        </div>
                                    @endforeach
                                    
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
            <span class="font-semibold text-slate-600">Reparasi terbaru</span>
        </div>
        <div class="p-5">
            <table class="w-full rounded-lg">
                <thead class="text-left">
                    <tr class="bg-slate-300">
                        <th class="p-3 text-center">No</th>
                        <th>Kode Reparasi</th>
                        <th>Nama Customer</th>
                        <th>Tanggal Reparasi</th>
                        <th>Barang</th>
                        <th class="text-center">Total Biaya</th>
                        <th class="text-center">Status Pembayaran</th>
                        <th class="p-5"></th>
                        {{-- <th class="p-5 rounded-tr-lg"></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count())
                        
                        @foreach ($data as $key => $item)
                        <tr class="border-b border-x border-slate-300 hover:bg-slate-100 text-slate-500">
                            <td class="text-center font-semibold">{{ $key + $data->firstItem() }}</td>
                            <td>{{ $item->kode_reparasi }}</td>
                            <td>{{ $item->nama_customer }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="p-2 {{ $item->status_pembayaran == 'Lunas' ? 'bg-emerald-600' : 'bg-amber-600' }} text-white rounded-md font-normal"><i class="fa-solid {{ $item->status_pembayaran == 'Lunas' ? 'fa-circle-check' : 'fa-circle-exclamation' }} mr-2"></i>{{ $item->status_pembayaran }}</span>
                                {{-- <span class="p-2 {{ $item->status_lunas == 'Lunas' ? 'bg-emerald-600' : 'bg-amber-600' }} text-white rounded-md font-normal"><i class="fa-solid {{ $item->status_lunas == 'Lunas' ? 'fa-circle-check' : 'fa-circle-exclamation' }} mr-2"></i>{{ $item->status_lunas }}</span> --}}
                            </td>
                            <td class="p-3">
                                <div class="flex justify-end">
                                    <div class="mr-2">
                                        <a href="{{ url('/reparasi/'.$item->kode_reparasi.'/edit') }}" class="block text-xs px-1.5 py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-emerald-500 hover:border-emerald-500">
                                            <span class=""><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <a href="{{ url('/reparasi/'.$item->kode_reparasi) }}" class="block text-xs px-2.5 py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-amber-500 hover:border-amber-500">
                                            <span class=""><i class="fa-solid fa-info"></i></span>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <form action="{{ '/reparasi/'.$item->kode_reparasi }}" method="post" onsubmit="return confirm('Ini akan menghapus detail reparasi. Apakah Anda yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 text-xs py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                                                <span class=""><i class="fa-solid fa-trash"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            {{-- <td>
                                <a href="{{ url('/reparasi/'.$item->kode_reparasi) }}/" class="underline underline-offset-1 text-red-700">Lihat detail</a>
                            </td> --}}
                        </tr>
                        @endforeach

                    @else
                    <tr class="border-b border-x border-slate-300 text-slate-500">
                        <td colspan="7" class="text-center py-3">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                    {{-- @if (empty($data)) 
                    <tr class="border-b border-x border-slate-300 text-slate-500">
                        <td colspan="7" class="text-center py-3">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                    @endif --}}
                    
                    @endif
                </tbody>
            </table>
            <div class="mt-5">
                <nav role="navigation">
                    {{ $data->links('pagination::default') }}
                </nav>
            </div>
        </div>
    </div>
</div>
    
@endsection