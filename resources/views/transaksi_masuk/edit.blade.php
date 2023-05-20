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
            <span class='font-semibold text-slate-600'>Tambah data</span>
        </div>

        <div class='p-5'>
            <div class='font-light'>
                <form action='{{ '/transaksi_masuk/'.$data->kode_transaksi }}' method='post'>
                    @csrf
                    @method('PUT')
                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class="w-full">
                            <div class='flex'>

                                <div class='flex mb-3'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='kode_transaksi' class='text-slate-600'>Kode Transaksi</label>
                                    </div>
                                    <div>
                                        <input type='text' name='kode_transaksi' id='kode_transaksi' value="{{ $data->kode_transaksi }}" readonly class="w-[300px] p-1 rounded-md bg-slate-200 border border-slate-400 focus:border-slate-400 focus:ring-slate-400">
                                        @error('kode_transaksi')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class='flex mb-3 ml-10'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='tanggal' class='text-slate-600'>Tanggal Transaksi</label>
                                    </div>
                                    <div>
                                        <input type='date' name='tanggal' id='tanggal' value="{{ $data->tanggal }}" class="w-[200px] p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
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
                                        <label for='kode_reparasi' class='text-slate-600'>Kode Reparasi</label>
                                    </div>
                                    <div>
                                        <select name='kode_reparasi' id='kode_reparasi' class="w-[300px] p-1 rounded-md border @error('kode_reparasi') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option selected>-</option>
                                            @foreach ($customer as $item)
                                            <option value="{{ $item->kode_reparasi }} {{ $item->nama_customer_id }}" {{ $data->kode_reparasi == $item->kode_reparasi ? 'selected' : '' }}>
                                                {{ $item->kode_reparasi }}, {{ $item->nama_customer }}                                               
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
                                        <label for='tujuan_pembayaran' class='text-slate-600'>Tujuan Pembayaran</label>
                                    </div>
                                    <div>
                                        <select name='tujuan_pembayaran' id='tujuan_pembayaran' class="w-[300px] p-1 rounded-md border @error('tujuan_pembayaran') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option>-</option>
                                            <option value="Uang muka" {{ $data->tujuan_pembayaran == "Uang muka" ? "selected" : "" }}>Uang muka</option>
                                            <option value="Cicil" {{ $data->tujuan_pembayaran == "Cicil" ? "selected" : "" }}>Cicil</option>
                                            <option value="Pelunasan" {{ $data->tujuan_pembayaran == "Pelunasan" ? "selected" : "" }}>Pelunasan</option>
                                        </select>
                                        @error('tujuan_pembayaran')
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
                                        <label for='nominal' class='text-slate-600'>Nominal</label>
                                    </div>
                                    <div>
                                        <span class="mr-2">Rp</span><input type='number' name='nominal' id='nominal' value="{{ $data->nominal }}" class="w-[250px] p-1 rounded-md border @error('nominal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('nominal')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>      
                            
                            <div class="flex mb-3">
                                <div class='w-[140px] my-auto'>
                                    <label for='keterangan' class='text-slate-600'>Keterangan</label>
                                </div>
                                <div>
                                    <textarea name="alamat" id="alamat" cols="37" rows="3" class="block p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400">
                                        @if ($data->keterangan === null)
                                            -
                                        @else
                                            {{ $data->keterangan }}
                                        @endif
                                    </textarea>
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
                        <a href='/transaksi_masuk' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300' onclick="return confirm('Data yang Anda sudah input akan hilang. Anda yakin ingin membatalkan pengisian data?')"></i>Kembali</a>
                    </div>

                    {{-- <script>
                        let kodeReparasi = document.getElementById('kode_reparasi');
                        let namaCustomer = document.getElementById('nama_customer_id');

                        if(kodeReparasi.value === '-') {
                            namaCustomer.value = '';
                        } else {
                            namaCustomer.value = {{  }};
                        }
                    </script> --}}
                    
                </form>
            </div>
        </div>
    </div>

@endsection