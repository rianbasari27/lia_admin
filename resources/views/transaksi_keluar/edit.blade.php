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
                <form action='{{ '/transaksi_keluar/'.$data->kode_transaksi }}' method='post'>
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
                                        <input type='text' name='kode_transaksi' id='kode_transaksi' value="{{ $data->kode_transaksi }}" class="w-[300px] p-1 rounded-md border @error('kode_transaksi') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
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

                            <div class='flex mb-5'>
                                <div class='w-[140px] my-auto'>
                                    <label for='transaksi_tujuan' class='text-slate-600'>Transaksi Tujuan</label>
                                </div>
                                <div>
                                    <input type='text' name='transaksi_tujuan' id='transaksi_tujuan' value="{{ $data->transaksi_tujuan }}" class="w-[300px] p-1 rounded-md border @error('transaksi_tujuan') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('transaksi_tujuan')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" id='add' class='add-row bg-slate-200 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'><i class='fa-solid fa-plus mr-2'></i>Tambah</button>
                            </div>

                            <div class="grid grid-cols-12 gap-4 mb-1">
                                <div></div>
                                <div class="col-span-4">Tujuan transaksi</div>
                                <div class="col-span-3">Nominal</div>
                                <div class="col-span-4">Keterangan</div>
                            </div>

                            <div class="multiple-records">
                                @foreach ($detail as $item)
                                    <div class="grid grid-cols-12 gap-4 mb-2 duplicate-row">
                                        <div>
                                            <button type='button' id='remove' class='remove-row px-3 py-2 rounded text-slate-600 bg-slate-200 hover:bg-red-700 hover:text-white duration-150'><i class='fa-solid fa-trash-can'></i></button>
                                        </div>
                                        <div class="col-span-4">
                                            <input type='text' name='tujuan_transaksi[]' id='tujuan_transaksi' value="{{ $item->tujuan_transaksi }}" class='tujuan_transaksi w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                            @error('tujuan_transaksi')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-span-3">
                                            <span class='mr-2'>Rp</span><input type='number' name='nominal[]' id='nominal' value="{{ $item->nominal }}" class='nominal w-5/6 p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                            @error('nominal')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-span-4">
                                                <input type='text' name='keterangan[]' id='keterangan' value="{{ $item->keterangan }}" class='keterangan w-full p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                            @error('keterangan')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="grid grid-cols-12 gap-4 mt-5 mb-2">
                                <div></div>
                                <div class="col-span-4 text-end my-auto">Total biaya</div>
                                <div class="col-span-3">
                                    <span class='mr-2'>Rp</span><input type='number' name='total' id='total' value="{{ $data->total }}" class='w-5/6 p-1 rounded-md border border-slate-400 bg-slate-200 focus:ring-0 focus:border-slate-400' readonly>
                                </div>
                                <div class="col-span-4"></div>
                            </div>
                            
                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200'></i>Simpan</button>
                        <a href='/transaksi_keluar' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $('#add').click(function(){
                                $('.multiple-records .duplicate-row:last-child')
                                .clone()
                                .appendTo('.multiple-records')
                                .find("input").val("").end()
                                totalIt()
                            });

                            $(document).on('click','#remove',function(){
                                if($(".multiple-records .duplicate-row").length > 1)
                                {
                                    $(this).parents(".duplicate-row").remove();
                                }
                                $(function() {
                                $(".nominal").each(function() {
                                    totalIt();
                                });
                            });
                            });

                            // $(".nominal").on("change", function() {
                            //         totalIt()
                            //     });
                        });

                        function totalIt() {
                            var total = 0;
                            
                            $(".nominal").each(function() {
                                var val = this.value;
                                console.log('test');
                                total += val == "" || isNaN(val) ? 0 : parseInt(val);
                            });
                            $("#total").val(total);
                            // console.log(total);
                            $(function() {
                                $(".nominal").on("keyup",function() {
                                    totalIt();
                                });
                            });
                        }
                        
                        $(function() {
                            $(".nominal").on("keyup",function() {
                                totalIt();
                            });
                        });
                    </script>
                    
                </form>
            </div>
        </div>
    </div>

@endsection