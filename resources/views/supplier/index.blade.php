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
        <ol class="inline-flex items-center my-4 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700 ">
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
                <a href="/supplier" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 ">{{ $title }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
</div>

<form action="/supplier" method="get" class="mt-5">
    <div class="lg:flex justify-between">
        <div class="flex">
            <div>
                <input type="text" name="search" id="search" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400" value="{{ Request::input('search') }}">
            </div>
            <div>
                <button type="submit" name="btn-search" class="flex ml-2 lg:px-3 lg:py-2 px-2 py-2 rounded-lg bg-slate-400 text-white hover:bg-slate-500 focus:ring focus:ring-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <div class="ml-1">Search</div>
                </button>
            </div>
        </div>
        <div class="lg:my-auto mt-5">
            <a href="/supplier/create" class="flex w-fit px-3 py-2.5 bg-red-700 rounded-lg shadow-md text-white hover:bg-red-800 focus:ring focus:ring-red-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Tambah</span>
            </a>
        </div>
    </div>
</form>

<div class="bg-white mt-7 rounded-md border">
    <div class="bg-slate-200 px-5 py-3 rounded-t-md">
        <span class="font-semibold text-slate-600">Data Supplier</span>
    </div>
    <div class="p-5">
        <div class="overflow-x-auto lg:border-0 border-x">
            <table class="lg:w-full w-[800px] rounded-lg lg:text-sm text-xs">
                <thead class="text-left">
                    <tr class="bg-slate-200 text-slate-700 border">
                        <th class="p-3 text-center">No</th>
                        <th>Nama Supplier</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th class="p-5"></th>
                        {{-- <th class="p-5 rounded-tr-lg"></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count())
                        
                        @foreach ($data as $key => $item)
                        <tr class="border-b border-x border-slate-300 hover:bg-slate-100 text-slate-500">
                            <td class="text-center font-semibold">{{ $key + $data->firstItem() }}</td>
                            <td>{{ $item->nama_supplier }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="p-3">
                                <div class="flex justify-end">
                                    <div class="mr-2">
                                        <a href="{{ url('/supplier/'.$item->id.'/edit') }}" class="block text-xs px-1.5 py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-emerald-500 hover:border-emerald-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <form action="{{ '/supplier/'.$item->id }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-1.5 text-xs py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                                </svg>
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
                    {{-- @if (empty($data)) 
                    <tr class="border-b border-x border-slate-300 text-slate-500">
                        <td colspan="7" class="text-center py-3">Tidak ada data untuk ditampilkan.</td>
                    </tr>
                    @endif --}}
                    
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
@endsection