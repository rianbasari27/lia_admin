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
                    <a href="/reparasi" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $title }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="{{ url('/reparasi/'.$data->kode_reparasi.'/edit') }}" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $subtitle }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class='flex justify-between'>
            <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/reparasi' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <i class='fa-solid fa-angle-left mr-2'></i>Kembali
            </a>
        </div>
    </div>

    <div class='bg-white rounded-lg shadow-md mt-5'>
        <div class='bg-slate-300 px-5 py-3 rounded-t-md'>
            <span class='font-semibold text-slate-600'>Edit data</span>
        </div>

        <div class='p-5'>
            <div class='font-light'>
                <form action='{{ '/reparasi/'.$data->kode_reparasi }}' method='post'>
                    @csrf
                    @method('PUT')
                    <div class='border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class="grid grid-cols-12 gap-4 mb-4">
                            <div class="col-span-2 my-auto">
                                <label for='kode_reparasi' class='text-slate-600'>Kode Reparasi</label>
                            </div>
                            <div class="col-span-3">
                                <input type='text' value="{{ $data->kode_reparasi }}" name='kode_reparasi' id='kode_reparasi' class='w-full p-1 rounded-md border border-slate-400 bg-slate-200 focus:border-red-400 focus:ring-red-400' readonly>
                            </div>
                            <div></div>
                            <div class="col-span-2 my-auto">
                                <label for='tanggal' class='text-slate-600'>Tanggal Reparasi</label>
                            </div>
                            <div class="col-span-3">
                                <input type='date' value="{{ $data->tanggal }}" name='tanggal' id='tanggal' class='w-full p-1 rounded-md border @error('tanggal') border-red-400 @enderror border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                @error('tanggal')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-4 mb-1">
                            <div class="col-span-2 my-auto">
                                <label for='nama_customer_id' class='text-slate-600'>Nama Customer</label>
                            </div>
                            <div class="col-span-3">
                                <select name='nama_customer_id' id='nama_customer_id' class='w-full p-1 rounded-md border @error('nama_customer_id') border-red-400 @enderror border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                    <option selected>-</option>
                                    @foreach ($customer as $item)
                                        <option value='{{ $item->id }}' {{ $data->nama_customer_id == $item->id ? 'selected' : '' }}>{{ $item->nama_customer }}</option>
                                    @endforeach
                                </select>
                                @error('nama_customer_id')
                                    <div class="text-red-700 text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class='w-1/2'>
                            <div class='flex'>
                                <div class='flex mb-3'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='kode_reparasi' class='text-slate-600'>Kode Reparasi</label>
                                    </div>
                                    <div>
                                        <input type='text' value="{{ $data->kode_reparasi }}" name='kode_reparasi' id='kode_reparasi' class='w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                    </div>
                                </div>
                                <div class='flex mb-3 ml-10'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='tanggal' class='text-slate-600'>Tanggal Reparasi</label>
                                    </div>
                                    <div>
                                        <input type='date' value="{{ $data->tanggal }}" name='tanggal' id='tanggal' class='w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                    </div>
                                </div>
                            </div>
                            <div class='flex mb-3'>
                                <div class='w-[140px] my-auto'>
                                    <label for='nama_customer_id' class='text-slate-600'>Nama Customer</label>
                                </div>
                                <div>
                                    <select name='nama_customer_id' id='nama_customer_id' class='w-[400px] p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                        <option selected>-</option>
                                        @foreach ($customer as $item)
                                            <option value='{{ $item->id }}' {{ $data->nama_customer_id == $item->id ? 'selected' : '' }}>{{ $item->nama_customer }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class='w-full'>

                            <div class="m-3">
                                <button type="button" id='add' class='add-row bg-slate-200 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'><i class='fa-solid fa-plus mr-2'></i>Tambah</button>
                            </div>

                            <div class="grid grid-cols-12 gap-4 mb-1">
                                <div></div>
                                <div class="col-span-2">Jenis Barang</div>
                                <div class="col-span-2">Jumlah</div>
                                <div class="col-span-4">Kerusakan</div>
                                <div class="col-span-3">Biaya</div>
                            </div>

                            <div class="multiple-records">
                                @foreach ($detail as $item)
                                    <div class="duplicate-row grid grid-cols-12 gap-4 mb-2">
                                        <div class="text-end">
                                            <button type='button' id='remove' class='remove-row px-3 py-2 rounded text-slate-600 bg-slate-200 hover:bg-red-700 hover:text-white duration-150'><i class='fa-solid fa-trash-can'></i></button>
                                        </div>

                                        <input type="text" name="id" id="id" value="{{ $item->id }}" class="hidden">

                                        <div class="col-span-2">
                                            <select name='nama_barang_id[]' id='nama_barang_id' class='w-full p-1.5 rounded-md border @error('nama_barang_id.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400'>
                                                <option selected>-</option>
                                                @foreach ($jenis_barang as $barang)
                                                    <option class="option" value="{{ $barang->id }}" {{ $item->nama_barang_id == $barang->id ? 'selected' : ''}}>{{ $barang->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_barang_id.*')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-span-2 flex">
                                            <div class='mr-2 my-auto'>x</div>
                                            <div>
                                                <input type='number' value="{{ $item->jumlah }}" name='jumlah[]' id='jumlah' class='w-full p-1 rounded-md border @error('jumlah.*') border-red-400 @enderror border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                                @error('jumlah.*')
                                                    <div class="text-red-700 text-start">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-span-4">
                                            <input type='text' value="{{ $item->kerusakan }}" name='kerusakan[]' id='kerusakan' class='w-full p-1 rounded-md border @error('kerusakan.*') border-red-400 @enderror border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                            @error('kerusakan.*')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="flex col-span-3">
                                            <div class='mr-2 my-auto'>Rp</div>
                                            <div>
                                                <input type='number' value="{{ $item->biaya }}" name='biaya[]' id='biaya' class='biaya w-full p-1 rounded-md border @error('biaya.*') border-red-400 @enderror border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                                @error('biaya.*')
                                                    <div class="text-red-700 text-start">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                @endforeach

                                
                            </div>

                            <div class="grid grid-cols-12 gap-4 mb-1 mt-4">
                                <div></div>
                                <div class="col-span-3"></div>
                                <div></div>
                                <div class="col-span-4 text-end">Total Biaya</div>
                                <div class="col-span-3 flex">
                                    <div class='mr-2'>Rp</div>
                                    <div>
                                        <input type='number' value="{{ $data->total }}" name='total' id='total' class='w-full p-1 rounded-md border border-slate-400 bg-slate-200 focus:ring-0 focus:border-slate-400' readonly>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 focus:ring focus:ring-emerald-200'></i>Simpan</button>
                        <a href='{{ url('/reparasi/'.$item->kode_reparasi) }}' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('.multiple-records .duplicate-row:last-child')
            .clone()
            .appendTo('.multiple-records')
            .find("input").val("").end()
            totalIt()

            // $("option:selected").prop("selected", false)
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
@endsection