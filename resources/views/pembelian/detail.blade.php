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
                <a href="/pembelian" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <a href="{{ url('/pembelian/'.$data->kode_pembelian) }}" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $subtitle }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class='flex justify-between'>
        <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
        <a href='/pembelian' class='px-3 py-2 flex bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
            </svg>
            Kembali
        </a>
    </div>
</div>

<div class='bg-white rounded-lg shadow-md mt-5'>
    <div class='bg-slate-200 px-5 py-3 rounded-t-md'>
        <span class='font-semibold text-slate-600'>Data detail</span>
    </div>

    <div class='p-5'>
        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Kode Pembelian</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">{{ $data->kode_pembelian }}</div>
        </div>

        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Tempat Pembelian</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">{{ $data->supplier->nama_supplier }}</div>
        </div>

        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">No. Telepon Supplier</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">{{ $data->supplier->no_telepon }}</div>
        </div>

        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Alamat Pembelian</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">{{ $data->supplier->alamat }}</div>
        </div>

        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Tanggal Pembelian</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">{{ $data->tanggal }}</div>
        </div>
        
        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Nama Barang</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">
                @foreach ($detail as $item)
                <span class="mr-1">{{ $item->jumlah }}x</span>
                <span class="mr-1">{{ $item->nama_barang }}</span> <br>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Biaya</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">
                @foreach ($detail as $item)
                    <div>{{ $item->nama_barang }}</div> 
                    <div class="mb-1">Rp {{ number_format($item->biaya, 0, ',', '.') }}</div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-12 gap-1 border-b border-slate-300 lg:py-3 py-2">
            <div class="lg:col-span-3 col-span-12 font-semibold text-slate-600">Total Biaya</div>
            <div class="lg:col-span-9 col-span-12 my-auto font-light text-slate-600">
                Rp {{ number_format($data->total, 0, ',', '.') }}
            </div>
        </div>

        <div class="mt-8 mb-4 flex">
            <a href="{{ url('/pembelian/'.$data->kode_pembelian.'/edit') }}" name='edit' class='mr-2 px-3 py-2 flex rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 focus:ring focus:ring-emerald-200'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                </svg>
                Edit
            </a>
            <a href='/pembelian' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
        </div>
    </div>
</div>
@endsection