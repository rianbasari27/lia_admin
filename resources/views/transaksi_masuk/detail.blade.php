@extends('index')

@section('main-content')
<div>
    <div class='flex justify-between'>
        <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
        <a href='/transaksi_masuk' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
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
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Kode Transaksi</td>
                <td class="font-light text-slate-600 py-3">{{ $data->kode_transaksi }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Nama Customer</td>
                <td class="font-light text-slate-600 py-3">{{ $data->nama_customer }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Kode Reparasi</td>
                <td class="font-light text-slate-600 py-3">{{ $data->kode_reparasi }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Tanggal</td>
                <td class="font-light text-slate-600 py-3">{{ $data->tanggal }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Tujuan Pembayaran</td>
                <td class="font-light text-slate-600 py-3">{{ $data->tujuan_pembayaran }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Nominal</td>
                <td class="font-semibold text-slate-600 py-3">Rp {{ number_format($data->nominal, 0, ',', '.') }}</td>
            </tr>
            <tr class="border-b border-slate-300">
                <td class="font-semibold text-slate-600 py-3 w-[400px]">Keterangan</td>
                <td class="font-light text-slate-600 py-3">
                    @if ($data->keterangan === null)
                        -
                    @else
                        {{ $data->keterangan }}
                    @endif
                </td>
            </tr>
        </table>

        <div class="mt-8 mb-4">
            <a href="{{ url('/transaksi_masuk/'.$data->kode_transaksi.'/edit') }}" name='edit' class='mr-2 px-3 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 focus:ring focus:ring-emerald-200'><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
            <a href='/transaksi_masuk' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
        </div>
    </div>
</div>
@endsection