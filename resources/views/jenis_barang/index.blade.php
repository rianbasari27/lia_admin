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
                <a href="/jenis_barang" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
</div>

{{-- FILTER --}}

<form action="/jenis_barang" method="get" class="mt-5">
    <div class="flex justify-between">
        <div class="flex">
            <div>
                <input type="text" name="search" id="search" class="w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400" value="{{ Request::input('search') }}">
            </div>
            <div>
                <button type="submit" name="btn-search" class="flex ml-2 px-3 py-2 rounded-lg bg-slate-400 text-white hover:bg-slate-500 focus:ring focus:ring-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 my-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <div class="ml-1">Search</div>
                </button>
            </div>
        </div>
    </div>
</form>

{{-- CONTAINER TABEL BARANG --}}

<div class="bg-white mt-7 rounded-md border">
    <div class="bg-slate-200 px-5 py-3 rounded-t-md">
        <span class="font-semibold text-slate-600">Data jenis barang</span>
    </div>
    <div class="p-5">

        {{-- TAMBAH BARANG --}}

        <form action="/jenis_barang" method="post" class="mb-3">
            @csrf
            <div class="flex">
                <div>
                    <input type='text' name='nama_barang' id='nama_barang' value="" class="@error('nama_barang') border-red-400 @enderror w-full p-1 rounded-md border focus:border-red-400 focus:ring-red-400">
                </div>
                <button type="submit" name="btn-search" class="flex ml-2 px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Tambah</span>
                </button>
            </div>
            @error('nama_barang')
                <div class="text-red-700 text-start">
                    {{ $message }}
                </div>
            @enderror
        </form>

        {{-- ISI TABEL BARANG --}}
        
        <form action="/jenis_barang" method="post">
            @csrf
            <table class="lg:w-1/3 w-full rounded-lg">

                {{-- Header --}}
                <thead class="text-left">
                    <tr class="bg-slate-200 text-slate-700 border">
                        <th class="p-3 text-center w-14">No</th>
                        <th>Nama Barang</th>
                        <th class="p-5"></th>
                    </tr>
                </thead>

                {{-- Isi --}}
                <tbody>
                    @if ($data->count())
                        @foreach ($data as $key => $item)
                            <tr class="border-b border-x border-slate-300 hover:bg-slate-100 text-slate-500">
                                <td class="text-center font-semibold">{{ $key + $data->firstItem() }}</td>
                                @php
                                    if (strlen($item->nama_barang) > 20) {
                                        $nama_barang = substr($item->nama_barang, 0, 20) . '...';
                                    } else {
                                        $nama_barang = $item->nama_barang;
                                    }
                                @endphp
                                <td>
                                    <span id="edit_text_{{ $item->id }}" class="edit_text">{{ $nama_barang }}</span>
                                </td>
                                <td class="p-3">
                                    <div class="flex justify-end">
                                        <div class="mr-2 flex">

                                            {{-- TOMBOL EDIT --}}
                                            <button data-id="{{ $item->id }}" data-value="{{ $item->nama_barang }}" id="edit_{{ $item->id }}" type="button" class="edit block text-xs px-1.5 py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-emerald-500 hover:border-emerald-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                            </button>

                                            {{-- TOMBOL CANCEL --}}
                                            <button data-id="{{ $item->id }}" data-value="{{ $item->nama_barang }}" id="cancel_{{ $item->id }}" type="button" class="cancel hidden text-xs px-1.5 py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-emerald-500 hover:border-emerald-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        {{-- TOMBOL DELETE --}}
                                        <div class="mr-2">
                                                <button type="button" data-id="{{ $item->id }}" class="delete-barang px-1.5 text-xs py-1.5 rounded-lg border border-slate-500 text-slate-500 hover:text-white hover:bg-red-500 hover:border-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
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

            {{-- SAVE BUTTON --}}
            
            <div class="mt-3">
                <button data-id="{{ $item->id }}" type="submit" class="save hidden px-3 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 focus:ring focus:ring-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Save
                </button>
            </div>
        </form>

        <div class="mt-5">
            <nav role="navigation">
                {{ $data->links('pagination::default') }}
            </nav>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.edit').click(function() {
            let itemId = $(this).data('id');
            let itemValue = $(this).data('value');
            let editSpan = $('#edit_text_' + itemId);
            let saveButton = $('.save');
            let cancelButton = $('#cancel_' + itemId);
            
            editSpan.empty();
            editSpan.append('<input type="text" name="edit_barang[]" class="edit-input w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400" value="' + itemValue + '">');
            editSpan.append('<input type="hidden" name="id_barang[]" value="' + itemId + '">');
            $(this).hide();
            saveButton.show();
            cancelButton.show();
        });

        $('.cancel').click(function() {
            let itemId = $(this).data('id');
            let itemValue = $(this).data('value');
            let saveButton = $('.save');

            let editSpan = $('#edit_text_' + itemId);
            let inputValue = $('#input_value_' + itemId).val();
            let editButton = $('#edit_' + itemId);
            
            editSpan.empty();
            editSpan.append(itemValue);
            $(this).hide();
            editButton.show();

            let isCancelShown = false;
            $('.cancel').each(function() {
                if ($(this).is(':visible')) {
                    isCancelShown = true;
                    return false;
                }
            });
            
            if (!isCancelShown) {
                saveButton.hide();
            }
        });

        $('.delete-barang').click(function() {
            event.preventDefault();

            var data_id = $(this).data("id");
            
            if(confirm("Yakin ingin menghapus data ini?")){
                $.ajax({
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    url: "/jenis_barang/"+data_id,
                    success: function (data) {
                        window.location.href = "jenis_barang";
                    } 
                });
            } else {
                return;
            }
        });
    });
</script>

@endsection