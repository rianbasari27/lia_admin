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
            <span class='font-semibold text-slate-600'>Tambah data</span>
        </div>

        <div class='p-5'>
            <div class='font-light'>
                <form action='/reparasi' method='post'>
                    @csrf
                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class='w-1/2'>
                            <div class='flex'>
                                <div class='flex mb-3'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='kode_reparasi' class='text-slate-600'>Kode Reparasi</label>
                                    </div>
                                    <div>
                                        @php
                                            foreach ($data as $item) {
                                                $id = explode('-', $item->kode_reparasi);
                                            }
                                        @endphp
                                        <input type='text' name='kode_reparasi' id='kode_reparasi' value="{{ $data->isEmpty() ? 'LIA-1' : 'LIA-'.$id[1] + 1 }}" class="@error('kode_reparasi') border-red-400 @enderror w-[300px] p-1 rounded-md border focus:border-red-400 focus:ring-red-400">
                                        @error('kode_reparasi')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class='flex mb-3 ml-10'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='tanggal' class='text-slate-600'>Tanggal Reparasi</label>
                                    </div>
                                    <div>
                                        <input type='date' name='tanggal' id='tanggal' value="{{ old('tanggal') }}" class="w-[300px] p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('tanggal')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class='flex mb-3'>
                                <div class='w-[140px] my-auto'>
                                    <label for='nama_customer_id' class='text-slate-600'>Nama Customer</label>
                                </div>
                                <div>
                                    <select name='nama_customer_id' id='nama_customer_id' class="w-[300px] p-1 rounded-md border @error('nama_customer_id') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        <option selected>-</option>
                                        @foreach ($customer as $item)
                                            <option value='{{ $item->id }}' {{ old('nama_customer_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_customer }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_customer_id')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class='mt-8'>
                                <a href='/reparasi/create/customer' class='bg-slate-200 text-slate-600 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white duration-150 '><i class='fa-solid fa-plus mr-2'></i>Tambah customer baru</a>
                            </div>
                        </div>
                    </div>

                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class='w-full'>

                            <div class="mb-3">
                                <button type="button" id='add' class='add-row bg-slate-200 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'><i class='fa-solid fa-plus mr-2'></i>Tambah</button>
                            </div>

                            <div class="grid grid-cols-12 gap-4">
                                <div></div>
                                <div class="col-span-3">Jenis Barang</div>
                                <div>Jumlah</div>
                                <div class="col-span-4">Kerusakan</div>
                                <div class="col-span-3">Biaya</div>
                            </div>

                            <div class="multiple-records">
                                <div class="grid grid-cols-12 gap-4 mb-2 duplicate-row">
                                    <div>
                                        <button type='button' id='remove' class='remove-row px-3 py-2 rounded text-slate-600 bg-slate-200 hover:bg-red-700 hover:text-white duration-150'><i class='fa-solid fa-trash-can'></i></button>
                                    </div>
                                    <div class="col-span-3">
                                        <select name='nama_barang_id[]' id='nama_barang_id' class="w-[250px] p-1.5 rounded-md border @error('nama_barang_id') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option selected>-</option>
                                            @foreach ($jenis_barang as $item)
                                                <option value='{{ $item->id }}' {{ old('nama_barang_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_barang_id')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <span class='mr-2'>x</span><input type='number' name='jumlah[]' id='jumlah' class="w-[50px] p-1 rounded-md border @error('jumlah') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('jumlah')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-4">
                                        <input type='text' name='kerusakan[]' id='kerusakan' class='w-[300px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                        @error('kerusakan')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-3">
                                        <span class='mr-2'>Rp</span><input type='number' name='biaya[]' id='biaya' class='biaya w-52 p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                        @error('biaya')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-4 mt-5 mb-2">
                                <div></div>
                                <div class="col-span-3"></div>
                                <div></div>
                                <div class="col-span-4 text-end my-auto">Total biaya</div>
                                <div class="col-span-3">
                                    <span class='mr-2'>Rp</span><input type='number' name='total' id='total' class='w-52 p-1 rounded-md border border-slate-400 bg-slate-200 focus:ring-0 focus:border-slate-400' readonly>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-4">
                                <div></div>
                                <div class="col-span-3"></div>
                                <div></div>
                                <div class="col-span-4 text-end my-auto">Uang muka</div>
                                <div class="col-span-3">
                                    <span class='mr-2'>Rp</span><input type='number' name='uang_muka' id='uang_muka' class='w-52 p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                </div>
                            </div>

                            @php
                                foreach ($transaksi as $item) {
                                    $id = explode('-', $item->kode_transaksi);
                                }
                            @endphp
                            <input type='text' name='kode_transaksi' id='kode_transaksi' value="{{ $transaksi->isEmpty() ? 'TM-1' : 'TM-'.$id[1] + 1 }}" class="hidden">

                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200'></i>Simpan</button>
                        <a href='/reparasi' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
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
                            $(".biaya").each(function() {
                                totalIt();
                            });
                        });
                        });

                        // $(".biaya").on("change", function() {
                            //     totalIt()
                            // });
                    });
                        
                    function totalIt() {
                        var total = 0;
                        
                        $(".biaya").each(function() {
                            var val = this.value;
                            console.log('test');
                            total += val == "" || isNaN(val) ? 0 : parseInt(val);
                        });
                        $("#total").val(total);
                        // console.log(total);
                        $(function() {
                            $(".biaya").on("keyup",function() {
                                totalIt();
                            });
                        });
                    }
                    
                    $(function() {
                        $(".biaya").on("keyup",function() {
                            totalIt();
                        });
                    });
                    
                    
                    // $(document).ready(function() {

                    //     let total = function() {
                            
                    //         let sum = 0;

                    //         $('.biaya').each(function() {
                    //             let num = $(this).val().replace('.','');
                    //             if(num != 0) {
                    //                 sum += parseInt(num);
                    //             }
                    //         });

                    //         $('#total').val(sum);
                    //     }

                    //     $('.biaya').keyup(function() {
                    //         total();
                    //     });
                    // });

                    

                    </script>
                </form>
            </div>
        </div>
    </div>

@endsection