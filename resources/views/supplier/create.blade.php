@extends('index')

@section('main-content')
    <div>
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
            <h1 class='lg:text-3xl text-2xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/supplier' class='flex px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md mt-5">
        <div class="bg-slate-200 px-5 py-3 rounded-t-md">
            <span class="font-semibold text-slate-600">Tambah data</span>
        </div>
    
        <div class="p-5">
            <div class="font-light">
                <form action="/supplier" method="post">
                    @csrf
                    <div class="lg:flex mb-3">
                        <div class="w-[140px] my-auto">
                            <label for="nama_supplier" class="text-slate-600">Nama Supplier</label>
                        </div>
                        <div>
                            <input type="text" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier') }}" class="lg:w-[400px] w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                            @error('nama_supplier')
                                <div class="text-red-700 text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="lg:flex mb-3">
                        <div class="lg:w-[140px] my-auto">
                            <label for="no_telepon" class="text-slate-600">No. Telepon</label>
                        </div>
                        <div>
                            <div class="flex">
                                <div class="p-1.5 bg-slate-200 my-auto rounded-l-md border border-r-0 border-slate-400">
                                    <span>+62</span>
                                </div>
                                <div>
                                    <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" class="lg:w-[359px] w-full p-1 rounded-r-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                </div>
                            </div>
                            @error('no_telepon')
                            <div class="text-red-700 text-start">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="lg:flex mb-3">
                        <div class="lg:w-[140px] my-auto">
                            <label for="alamat" class="text-slate-600">Alamat</label>
                        </div>
                        <div>
                            <textarea name="alamat" id="alamat" cols="50" rows="3" class="block w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">{{ old('alamat') }}</textarea>
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