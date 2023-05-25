@extends('index')

@section('main-content')
    <div>

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center my-4 space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700 dark:text-slate-400 dark:hover:text-white">
                        <i class="fa-solid fa-house mr-2"></i>
                    Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="/pembelian" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $title }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class='flex justify-between'>
            <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/pembelian' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
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
                <form action='/pembelian' method='post'>
                    @csrf
                    <div class='border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class="grid grid-cols-12 gap-1 mb-3">

                            <div class="col-span-5">
                                <label for='kode_pembelian' class='text-slate-600 mr-6'>Kode Pembelian</label>
                                @php
                                    foreach ($data as $item) {
                                        $id = explode('-', $item->kode_pembelian);
                                    }
                                @endphp
                                <input type='text' name='kode_pembelian' id='kode_pembelian' value="{{ $data->isEmpty() ? 'PB-1' : 'PB-'.$id[1] + 1 }}" class="@error('kode_pembelian') border-red-400 @enderror w-[250px] p-1 rounded-md border focus:border-red-400 focus:ring-red-400">
                                @error('kode_pembelian')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-span-5">
                                <label for='tanggal' class='text-slate-600 mr-7 my-auto'>Tanggal Pembelian</label>
                                <input type='date' name='tanggal' id='tanggal' value="{{ old('tanggal') }}" class="w-[200px] p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                @error('tanggal')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-span-5 flex">
                                <div>
                                    <label for='nama_supplier_id' class='text-slate-600 mr-8'>Nama Supplier</label>
                                    <select name='nama_supplier_id' id='nama_supplier_id' class="w-[250px] p-1.5 rounded-md border @error('nama_supplier_id') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        <option selected>-</option>
                                        @foreach ($supplier as $supp)
                                        <option value='{{ $supp->id }}' {{ old('nama_supplier_id') == $supp->id ? 'selected' : '' }}>{{ $supp->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_supplier_id')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div>    
                                    <a href="{{ url('/pembelian/create/supplier') }}" id='add_supp' class='block bg-slate-200 border border-slate-400 font-semibold px-2.5 py-1.5 ml-2 rounded-md hover:bg-red-700 hover:text-white hover:border-red-700 text-slate-600 duration-150'><i class='fa-solid fa-plus'></i></a>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class='w-full'>

                            <div class="mb-3">
                                <button type="button" id='add' class='add-row bg-slate-200 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'><i class='fa-solid fa-plus mr-2'></i>Tambah</button>
                            </div>

                            <div class="grid grid-cols-12 gap-2">
                                <div></div>
                                <div class="col-span-3">Nama Barang</div>
                                <div class="col-span-2">Jumlah</div>
                                <div class="col-span-2">Satuan</div>
                                <div class="col-span-3">Biaya</div>
                            </div>

                            <div class="multiple-records">
                                <div class="grid grid-cols-12 gap-3 mb-2 duplicate-row">
                                    <div>
                                        <button type='button' id='remove' class='remove-row px-3 py-2 rounded text-slate-600 bg-slate-200 hover:bg-red-700 hover:text-white duration-150'><i class='fa-solid fa-trash-can'></i></button>
                                    </div>
                                    <div class="col-span-3">
                                        <input type='text' name='nama_barang[]' id='nama_barang' class="w-full p-1 rounded-md border @error('nama_barang.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('nama_barang.*')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <div class='mr-2 my-auto'>
                                                x
                                            </div>
                                            <div>
                                                <input type='number' name='jumlah[]' id='jumlah' class="w-full p-1 rounded-md border @error('jumlah.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            </div>
                                        </div>
                                        @error('jumlah.*')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <select name='satuan' id='satuan' class="w-full p-1.5 rounded-md border @error('satuan') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option value="PCS">PCS</option>
                                            <option value="Dus">Dus</option>
                                            <option value="Lusin">Lusin</option>
                                            <option value="Kilogram">Kilogram</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Centimeter">Centimeter</option>
                                            <option value="Meter">Meter</option>
                                        </select>
                                        @error('satuan')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-3">
                                        <span class='mr-2'>Rp</span><input type='number' name='biaya[]' id='biaya' class='biaya w-52 p-1 rounded-md border @error('biaya.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400'>
                                        @error('biaya.*')
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
                                <div class="col-span-2"></div>
                                <div class="col-span-2 text-end my-auto">Total biaya</div>
                                <div class="col-span-3">
                                    <span class='mr-2'>Rp</span><input type='number' name='total' id='total' class='w-52 p-1 rounded-md border border-slate-400 bg-slate-200 focus:ring-0 focus:border-slate-400' readonly>
                                </div>
                            </div>
                            @php
                                foreach ($transaksi as $tr) {
                                    $id = explode('-', $tr->kode_transaksi);
                                }
                            @endphp
                            <input type='text' name='kode_transaksi' id='kode_transaksi' value="{{ $transaksi->isEmpty() ? 'TK-1' : 'TK-'.$id[1] + 1 }}" class="hidden">

                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200'></i>Simpan</button>
                        <a href='/pembelian' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
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