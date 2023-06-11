@extends('index')

@section('main-content')
    <div>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center my-4 space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700">
                        <i class="fa-solid fa-house mr-2"></i>
                    Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="/supplier" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="/supplier/create" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $subtitle }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class='flex justify-between'>
            <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/supplier' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <i class='fa-solid fa-angle-left mr-2'></i>Kembali
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md mt-5">
        <div class="bg-slate-300 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">Edit data</span>
        </div>
    
        <div class="p-5">
            <div class="font-light">
                <form action="{{ '/supplier/'.$data->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="flex mb-3">
                        <div class="w-[140px] my-auto">
                            <label for="nama_supplier" class="text-slate-600">Nama Supplier</label>
                        </div>
                        <div>
                            <input type="text" name="nama_supplier" id="nama_supplier" value="{{ $data->nama_supplier }}" class="w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            @error('nama_supplier')
                                <div class="text-red-700 text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex mb-3">
                        <div class="w-[140px] my-auto">
                            <label for="no_telepon" class="text-slate-600">No. Telepon</label>
                        </div>
                        <div>
                            <div class="flex">
                                @php
                                    $no_telp = explode(' ', $data->no_telepon);
                                @endphp
                                <div class="p-1.5 bg-slate-200 my-auto rounded-l-md border border-r-0 border-slate-400">
                                    <span>{{ $no_telp[0] }}</span>
                                </div>
                                <div>
                                    <input type="text" name="no_telepon" id="no_telepon" value="{{ $no_telp[1] }}" class="w-[359px] p-1 rounded-r-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                </div>
                            </div>
                            @error('no_telepon')
                            <div class="text-red-700 text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex mb-3">
                        <div class="w-[140px] my-auto">
                            <label for="alamat" class="text-slate-600">Alamat</label>
                        </div>
                        <div>
                            <textarea name="alamat" id="alamat" cols="50" class="block p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">{{ $data->alamat }}</textarea>
                            @error('alamat')
                                <div class="text-red-700 text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div>
                    <input type="submit" name="submit" value="Simpan" class="px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200">
                    <a href="/supplier" name="back" class="px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection