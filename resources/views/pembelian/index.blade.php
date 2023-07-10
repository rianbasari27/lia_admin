@extends('index')

@section('main-content')

<div>
    
    @if(session()->has('success'))
    <div id="alert-1" class="flex p-2 mb-4 text-emerald-700 rounded-lg bg-emerald-200" role="alert">
        <div class="ml-3 text-sm font-medium my-auto">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 text-emerald-700 inline">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        <button type="button" class="ml-auto bg-emerald-200 text-emerald-500 rounded-lg focus:ring-2 focus:ring-emerald-400 p-1.5 hover:bg-emerald-300 inline-flex " data-dismiss-target="#alert-1" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    @endif

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center lg:my-4 my-2 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700">
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
                <a href="/pembelian" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex justify-between lg:mb-4 mb-2">
        <h1 class="lg:text-3xl text-2xl text-slate-600 font-semibold">{{ $title }}</h1>
        <a href="/pembelian/create" class="flex lg:px-3 lg:py-2 px-2 py-1.5 bg-red-700 rounded-lg shadow-md text-white hover:bg-red-800 focus:ring focus:ring-red-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Tambah
        </a>
    </div>

    {{-- Filter --}}

    <div id="accordion-collapse" data-accordion="collapse" class="bg-white rounded-lg shadow-md mt-5">
        <h2 id="accordion-collapse-heading-3">
            <button type="button" class="flex items-center rounded-lg justify-between w-full px-5 py-2 font-medium text-left text-slate-500 bg-slate-200 focus:ring-4 focus:ring-slate-200 hover:bg-slate-300" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                <span class="font-semibold text-slate-600 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                    </svg>
                    Filter data
                </span>
                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
            <div class="p-5 border border-t-0 border-slate-200">
                <div class="font-light">

                    <form action="/pembelian" method="get">
                        <div class="grid grid-cols-12 gap-1 mb-3">
                            <div class="lg:col-span-2 col-span-12 my-auto">
                                <label for="kode_pembelian" class="text-slate-600">Kode Pembelian</label>
                            </div>
                            <div class="lg:col-span-3 col-span-12">
                                <input type="text" name="kode_pembelian" id="kode_pembelian" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400" value="{{ Request::input('kode_pembelian') }}">
                            </div>
                            <div></div>
                            <div class="lg:col-span-1 col-span-12 my-auto">
                                <label for="tanggal" class="text-slate-600">Tanggal</label>
                            </div>
                            <div class="lg:col-span-4 col-span-12 flex">
                                <input type="date" name="tanggal_mulai" id="tanggal" value="{{ Request::input('tanggal_mulai') }}" class="lg:w-[150px] w-[145px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                <span class="mx-2">-</span>
                                <input type="date" name="tanggal_sampai" id="tanggal" value="{{ Request::input('tanggal_sampai') }}" class="lg:w-[150px] w-[145px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-1 mb-3">
                            <div class="lg:col-span-2 col-span-12 my-auto">
                                <label for="nama_supplier" class="text-slate-600">Nama Supplier</label>
                            </div>
                            <div class="lg:col-span-3 col-span-12">
                                <input type="text" name="nama_supplier" id="nama_supplier" value="{{ Request::input('nama_supplier') }}" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            </div>
                            <div></div>
                            <div class="lg:col-span-2 col-span-12 my-auto">
                                <label for="nama_barang" class="text-slate-600">Nama Barang</label>
                            </div>
                            <div class="lg:col-span-3 col-span-12">
                                <div class="w-full">
                                    <input type="text" name="nama_barang" id="nama_barang" value="{{ Request::input('nama_barang') }}" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                </div>
                            </div>
                        </div>

                        <div class="flex">
                            <button type="submit" name="search" class="flex mr-1 px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 my-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                                Cari data
                            </button>
                            <input type="button" name="reset" id="clearButton" value="Clear" class="lg:px-3 flex lg:py-2 px-2 py-1.5 rounded-lg bg-slate-400 text-white hover:bg-slate-500 focus:ring focus:ring-slate-300" form="filter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    {{-- End Filter --}}


    <div class="bg-white mt-7 rounded-lg shadow-md">
        <div class="bg-slate-200 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">Pembelian terbaru</span>
        </div>
        <div class="p-5">
            <div class="overflow-x-auto lg:border-0 border-x">
                <table class="lg:w-full w-[800px] rounded-lg lg:text-sm text-xs">
                    <thead class="text-left">
                        <tr class="bg-slate-200">
                            <th class="p-3 text-center">No.</th>
                            <th>Kode Pembelian</th>
                            <th>Nama Supplier</th>
                            <th>Tanggal Pembelian</th>
                            <th>Barang</th>
                            <th class="text-center">Total Biaya</th>
                            <th class="p-5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count())
                            
                            @foreach ($data as $key => $item)
                            <tr class="border-b border-x border-slate-300 hover:bg-slate-100 text-slate-500">
                                <td class="text-center font-semibold">{{ $key + $data->firstItem() }}</td>
                                <td>{{ $item->kode_pembelian }}</td>
                                <td>{{ $item->nama_supplier }}</td>
                                <td>{{ $item->tanggal }}</td>
                                
                                @php
                                    if (strlen($item->nama_barang) > 20) {
                                        $nama_barang = substr($item->nama_barang, 0, 20) . '...';
                                    } else {
                                        $nama_barang = $item->nama_barang;
                                    }
                                @endphp

                                <td>{{ $nama_barang }}</td>
                                <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td class="p-3">
                                    <div class="flex justify-end">
                                        <div class="mr-2">
                                            <a href="{{ url('/pembelian/'.$item->kode_pembelian.'/edit') }}" class="block text-xs p-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-emerald-500 hover:border-emerald-500">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <a href="{{ url('/pembelian/'.$item->kode_pembelian) }}" class="block text-xs px-1.5 py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-amber-500 hover:border-amber-500">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                        <path d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" />
                                                        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z" clip-rule="evenodd" />
                                                        <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="mr-2">
                                            <form action="{{ '/pembelian/'.$item->kode_pembelian }}" method="post" onsubmit="return confirm('Ini akan menghapus detail pembelian. Apakah Anda yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-xs rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        @else
                        <tr class="border-b border-x border-slate-300 text-slate-500">
                            <td colspan="7" class="text-center py-3">Tidak ada data untuk ditampilkan.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <nav role="navigation">
                    {{ $data->links('pagination::default') }}
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#clearButton').click(function() {
            $('#kode_pembelian').val('');
            $('#nama_supplier').val('');
            $('#nama_barang').val('');
            
            $("input[name='tanggal_mulai'][id='tanggal']").val('');
            $("input[name='tanggal_sampai'][id='tanggal']").val('');
        });
    });
</script>
    
@endsection