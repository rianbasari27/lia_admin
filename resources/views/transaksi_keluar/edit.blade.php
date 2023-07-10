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
                    <a href="/transaksi_keluar" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ url('/transaksi_keluar/'.$data->kode_transaksi . '/edit') }}" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $subtitle }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class='flex justify-between'>
            <h1 class='lg:text-3xl text-xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/transaksi_keluar' class='flex lg:px-3 px-2 py-2 lg:text-sm text-xs bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class='bg-white rounded-lg shadow-md mt-5'>
        <div class='bg-slate-200 px-5 py-3 rounded-t-md'>
            <span class='font-semibold text-slate-600'>Edit data</span>
        </div>

        <div class='p-5'>
            <div class='font-light'>
                <form action='{{ '/transaksi_keluar/'.$data->kode_transaksi }}' method='post'>
                    @csrf
                    @method('PUT')
                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class="w-full">
                            <div class="grid grid-cols-12 gap-1">

                                <div class='lg:col-span-6 col-span-12 mb-3'>
                                    <label for='kode_transaksi' class='text-slate-600 lg:mr-[28px]'>Kode Transaksi</label>
                                    <input type='text' name='kode_transaksi' id='kode_transaksi' value="{{ $data->kode_transaksi }}" class="lg:w-[300px] w-full p-1 rounded-md border @error('kode_transaksi') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('kode_transaksi')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class='lg:col-span-6 col-span-12 mb-3'>
                                    <label for='tanggal' class='text-slate-600 lg:mr-[28px]'>Tanggal Transaksi</label>
                                    <input type='date' name='tanggal' id='tanggal' value="{{ $data->tanggal }}" class="lg:w-[200px] w-full p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('tanggal')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class='grid grid-cols-12 gap-1'>
                                
                                <div class="lg:col-span-6 col-span-12 mb-3">
                                    <label for='kode_pembelian' class='text-slate-600 lg:mr-[22px]'>Kode Pembelian</label>
                                    <select name='kode_pembelian' id='kode_pembelian' {{ ($data->kode_pembelian == null || $data->kode_pembelian == '') ? 'disabled' : '' }} class="lg:w-[300px] w-full p-1 {{ ($data->kode_pembelian == null || $data->kode_pembelian == '') ? 'bg-slate-200' : '' }} rounded-md border @error('kode_pembelian') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        <option>-</option>
                                        @foreach ($supplier as $item)
                                        <option value='{{ $item->kode_pembelian }} {{ $item->nama_supplier_id }}' {{ $data->kode_pembelian == $item->kode_pembelian ? 'selected' : '' }}>
                                            {{ $item->kode_pembelian }}, {{ $item->nama_supplier }}                                               
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('kode_pembelian')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            
                            </div>
                            
                            <div class="flex mb-3">
                                <input type="checkbox" name="check" id="check" {{ ($data->kode_pembelian == null || $data->kode_pembelian == '') ? 'checked' : '' }} class="rounded border border-slate-400 text-red-700 focus:ring-red-700">
                                <label for="check" class="ml-2 text-slate-600">Pembayaran lain</label>
                            </div>

                            <div class='grid grid-cols-12 gap-1'>

                                <div class='lg:col-span-6 col-span-12 mb-3'>
                                    <label for='pembayaran_lain' class='text-slate-600 lg:mr-[15px]'>Pembayaran Lain</label>
                                    <input type='text' name='pembayaran_lain' id='pembayaran_lain' value="{{ $data->pembayaran_lain }}" {{ ($data->pembayaran_lain == null || $data->pembayaran_lain == '') ? 'disabled' : '' }} class="lg:w-[300px] w-full p-1 {{ ($data->pembayaran_lain == null || $data->pembayaran_lain == '') ? 'bg-slate-200' : '' }} rounded-md border @error('pembayaran_lain') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('pembayaran_lain')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            
                            <div class="grid grid-cols-12 gap-1">
                                <div class="lg:col-span-6 col-span-12 mb-3 lg:flex">
                                    <label for='nominal' class='text-slate-600 lg:my-auto lg:mr-[77px]'>Nominal</label>
                                    <div class="flex">
                                        <div class='py-1.5 px-1.5 border-y border-l rounded-y-md rounded-l-md bg-slate-200 border-slate-500'>Rp</div>
                                        <input type='number' name='nominal' id='nominal' value="{{ $data->nominal }}" class='nominal lg:w-[270px] w-full p-1 rounded-r-md rounded-y-md border @error('nominal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400'>
                                    </div>
                                    @error('nominal')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class='grid grid-cols-12 gap-1'>

                                <div class='lg:col-span-6 col-span-12 mb-3'>
                                    <label for='tujuan_transaksi' class='text-slate-600 lg:mr-[18px]'>Tujuan Transaksi</label>
                                    <input type='text' name='tujuan_transaksi' id='tujuan_transaksi' value="{{ $data->tujuan_transaksi }}" class="lg:w-[300px] w-full p-1 rounded-md border @error('tujuan_transaksi') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('tujuan_transaksi')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>      
                            
                            <div class="grid grid-cols-12 gap-1 mb-3">

                                <div class="lg:col-span-6 col-span-12 lg:flex">
                                    <label for='keterangan' class='text-slate-600 lg:mr-[56px]'>Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="block w-full lg:w-[300px] p-1 rounded-md border focus:border-red-400 focus:ring-red-400">{{ $data->keterangan }}</textarea>
                                    @error('keterangan')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-emerald-700 text-white hover:bg-emerald-800 focus:ring focus:ring-emerald-200'></i>Simpan</button>
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