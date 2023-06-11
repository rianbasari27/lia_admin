@extends('index')

@section('main-content')
    <div>
        <div class='flex justify-between'>
            <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/transaksi_keluar' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <i class='fa-solid fa-angle-left mr-2'></i>Kembali
            </a>
        </div>
    </div>

    <div class='bg-white rounded-lg shadow-md mt-5'>
        <div class='bg-slate-300 px-5 py-3 rounded-t-md'>
            <span class='font-semibold text-slate-600'>Tambah data</span>
        </div>

        <div class='p-5'>
            <div class='font-light'>
                <form action='/transaksi_keluar' method='post'>
                    @csrf
                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class="w-full">
                            <div class='flex'>

                                <div class='flex mb-3'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='kode_transaksi' class='text-slate-600'>Kode Transaksi</label>
                                    </div>
                                    <div>
                                        <input type='text' name='kode_transaksi' id='kode_transaksi' value="{{ $kode_transaksi }}" class="w-[300px] p-1 rounded-md border @error('kode_transaksi') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('kode_transaksi')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class='flex mb-3 ml-10'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='tanggal' class='text-slate-600'>Tanggal</label>
                                    </div>
                                    <div>
                                        <input type='date' name='tanggal' id='tanggal' value="{{ old('tanggal') }}" class="w-[225px] p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('tanggal')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class='flex'>
                                
                                <div class="flex mb-3">
                                    <div class='w-[140px] my-auto'>
                                        <label for='kode_pembelian' class='text-slate-600'>Kode pembelian</label>
                                    </div>
                                    <div>
                                        <select name='kode_pembelian' id='kode_pembelian' class="w-[300px] p-1 rounded-md border @error('kode_pembelian') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option>-</option>
                                            @foreach ($data as $item)
                                            <option value='{{ $item->kode_pembelian }} {{ $item->nama_supplier_id }}' {{ old('kode_pembelian') == $item->kode_pembelian ? 'selected' : '' }}>
                                                {{ $item->kode_pembelian }}, {{ $item->nama_supplier }}                                               
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('kode_reparasi')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="flex mb-3 ml-10">
                                    <div class='w-[140px] my-auto'>
                                        <label for='nominal' class='text-slate-600'>Nominal</label>
                                    </div>
                                    <div>
                                        <span class="mr-2">Rp</span><input type='number' name='nominal' id='nominal' value="{{ old('nominal') }}" class="w-[200px] p-1 rounded-md border @error('nominal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('nominal')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>    
                            
                            <div class="flex mb-3">
                                <input type="checkbox" name="check" id="check" class="rounded border border-slate-400 text-red-700 focus:ring-red-700">
                                <label for="check" class="ml-2 text-slate-600">Pembayaran lain</label>
                            </div>

                            <div class='flex'>
                                <div class='flex mb-5'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='pembayaran_lain' class='text-slate-600'>Pembayaran lain</label>
                                    </div>
                                    <div>
                                        <input type='text' name='pembayaran_lain' id='pembayaran_lain' disabled class="w-[300px] p-1 bg-slate-200 rounded-md border @error('pembayaran_lain') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('pembayaran_lain')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>    
                            </div>
                            
                            <div class="flex mb-3">
                                <div class='w-[140px] my-auto'>
                                    <label for='tujuan_transaksi' class='text-slate-600'>Tujuan transaksi</label>
                                </div>
                                <div>
                                    <input type='text' name='tujuan_transaksi' id='tujuan_transaksi' value="{{ old('tujuan_transaksi') }}" class="w-[300px] p-1 rounded-md border @error('tujuan_transaksi') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('tujuan_transaksi')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="flex mb-3">
                                <div class='w-[140px] my-auto'>
                                    <label for='keterangan' class='text-slate-600'>Keterangan</label>
                                </div>
                                <div>
                                    <textarea name="keterangan" id="keterangan" cols="37" rows="3" class="block p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400"></textarea>
                                    @error('keterangan')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200'></i>Simpan</button>
                        <a href='/transaksi_keluar' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
<script>
    $('#check').on('change', function() {
        $('#pembayaran_lain').prop('disabled', !this.checked);
        $('#kode_pembelian').prop('disabled', this.checked);
        if ($('#check').is(':checked')) {
            $('#kode_pembelian').addClass("bg-slate-200");
            $('#pembayaran_lain').removeClass("bg-slate-200");
        }
        if (!$('#check').is(':checked')) {
            $('#kode_pembelian').removeClass("bg-slate-200");
            $('#pembayaran_lain').addClass("bg-slate-200");
        }
    });
</script>

@endsection