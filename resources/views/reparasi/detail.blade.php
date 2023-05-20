@extends('index')

@section('main-content')
<div>
    <div class='flex justify-between'>
        <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
        <a href='/reparasi' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
            <i class='fa-solid fa-angle-left mr-2'></i>Kembali
        </a>
    </div>
</div>

<div class='bg-white rounded-lg shadow-md mt-5'>
    <div class='bg-slate-300 px-5 py-3 rounded-t-md'>
        <span class='font-semibold text-slate-600'>Data detail</span>
    </div>

    <div class='p-5'>
        <table class="w-full">
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Kode Reparasi</td>
                <td class="font-light text-slate-600 py-3">{{ $data->kode_reparasi }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Nama Customer</td>
                <td class="font-light text-slate-600 py-3">{{ $data->customer->nama_customer }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">No. Telepon</td>
                <td class="font-light text-slate-600 py-3">{{ $data->customer->no_telepon }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Alamat</td>
                <td class="font-light text-slate-600 py-3">{{ $data->customer->alamat }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Tanggal</td>
                <td class="font-light text-slate-600 py-3">{{ $data->tanggal }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Jenis barang</td>
                <td class="font-light text-slate-600 py-3">
                    @foreach ($detail as $item)
                        <span class="mr-1">{{ $item->jumlah }}x</span>
                        <span class="mr-1">{{ $item->jenis_barang->nama_barang }}</span> <br>
                    @endforeach
                </td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Kerusakan</td>
                <td class="font-light text-slate-600 py-3">
                    @foreach ($detail as $item)
                        <div class="font-semibold">{{ $item->jenis_barang->nama_barang }}</div> 
                        <div class="mb-1 w-[400px]">{{ $item->kerusakan }}</div>
                    @endforeach
                </td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Biaya</td>
                <td class="font-light text-slate-600 py-3">
                    @foreach ($detail as $item)
                    <div class="flex">
                        <div class="font-semibold w-[100px]">{{ $item->jenis_barang->nama_barang }}</div> 
                        <span class="mb-1 w-[400px]">Rp {{ $item->biaya }}</span><br>
                    </div>
                    @endforeach
                </td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Total biaya</td>
                <td class="font-light text-slate-600 py-3">
                    <span class="mb-1 w-[400px] font-semibold">Rp {{ $data->total }}</span><br>
                </td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Uang muka</td>
                <td class="font-light text-slate-600 py-3">
                    @foreach ($uang_muka as $item)
                        <div class="mb-1 w-[400px]">Rp {{ $item->nominal }}</div>
                    @endforeach
                </td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Status Pembayaran</td>
                <td class="font-light text-slate-600 py-3">
                    <div class="p-2 w-fit {{ $data->status_pembayaran == 'Lunas' ? 'bg-emerald-600' : 'bg-amber-600' }} text-white rounded-md font-normal">
                        <i class="fa-solid {{ $data->status_pembayaran == 'Lunas' ? 'fa-circle-check' : 'fa-circle-exclamation' }} mr-2"></i>
                        {{ $data->status_pembayaran }}
                    </div>
                </td>
            </tr>
        </table>

        <div class="mt-8 mb-4">
            <a href="{{ url('/reparasi/'.$data->kode_reparasi.'/edit') }}" name='edit' class='mr-2 px-3 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 focus:ring focus:ring-emerald-200'><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
            <a href='/reparasi' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
        </div>
    </div>
</div>
@endsection