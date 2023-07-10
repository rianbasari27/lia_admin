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
                    <a href="/reparasi" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $title }}</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg aria-hidden="true" class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="/reparasi/create" class="ml-1 text-sm font-medium text-slate-700 hover:text-red-700 md:ml-2">{{ $subtitle }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class='flex justify-between'>
            <h1 class='lg:text-3xl text-2xl my-auto text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/reparasi' class='flex px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                    <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class='bg-white rounded-lg shadow-md mt-5 text-sm'>
        <div class='bg-slate-200 px-5 py-3 rounded-t-md'>
            <span class='font-semibold text-slate-600'>Tambah data</span>
        </div>

        <div class='p-5'>
            <div class='font-light'>
                <form action='/reparasi' method='post'>
                    @csrf
                    <div class='border border-slate-400 lg:p-7 p-4 rounded-lg mb-5'>
                        <div class="grid grid-cols-12 gap-1 mb-3">

                            <div class="lg:col-span-5 col-span-12 lg:mb-0 mb-2">
                                <div>
                                    <label for='kode_reparasi' class='text-slate-600 lg:mr-[28px]'>Kode Reparasi</label>
                                    <input type='text' name='kode_reparasi' id='kode_reparasi' value="{{ $kode_reparasi }}" class="@error('kode_reparasi') border-red-400 @enderror lg:w-[250px] w-full p-1 rounded-md border focus:border-red-400 focus:ring-red-400">
                                </div>
                                @error('kode_reparasi')
                                    <div class="text-red-700 text-start lg:ml-[125px]">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="lg:col-span-5 col-span-12 lg:mb-0 mb-2">
                                <div>
                                    <label for='tanggal' class='text-slate-600 lg:mr-7 my-auto'>Tanggal Reparasi</label>
                                    <input type='date' name='tanggal' id='tanggal' value="{{ old('tanggal') }}" class="lg:w-[200px] w-full p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                </div>
                                @error('tanggal')
                                    <div class="text-red-700 text-start lg:ml-[140px]">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="lg:col-span-5 col-span-12">
                                <div class="flex">
                                    <div>
                                        <label for='nama_customer_id' class='text-slate-600 lg:mr-[16px]'>Nama Customer</label>
                                        <select name='nama_customer_id' id='nama_customer_id' class="lg:w-[250px] w-full p-1.5 rounded-md border @error('nama_customer_id') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option selected>-</option>
                                            @foreach ($customer as $item)
                                            <option value='{{ $item->id }}' {{ old('nama_customer_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_customer }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>    
                                        <a href="{{ url('/customer') }}" id='add_cust' class='block shadow-md lg:mt-0 mt-5 bg-slate-200 font-semibold px-2.5 py-1.5 ml-2 rounded-md hover:bg-red-700 hover:text-white hover:border-red-700 text-slate-600 duration-150'>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                    @error('nama_customer_id')
                                    <div class="text-red-700 text-start lg:ml-[125px]">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div> 

                    <div class='flex border border-slate-400 lg:p-7 p-4 rounded-lg mb-5'>
                        <div class='w-full'>

                            <div class="mb-3 lg:text-sm text-xs flex">
                                <button type="button" id='add' class='add-row flex shadow-md bg-slate-200 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 my-auto mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="my-auto">Tambah</span>
                                </button>
                                <a href="/jenis_barang"  class='ml-2 flex shadow-md bg-slate-200 font-semibold p-2.5 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 my-auto mr-1">
                                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                        <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                                    </svg>
                                    <span class="my-auto">Tambah barang</span>
                                </a>
                            </div>

                            <div class="lg:grid grid-cols-12 gap-2 hidden">
                                <div></div>
                                <div class="col-span-2">Jenis Barang</div>
                                <div class="col-span-2">Jumlah</div>
                                <div class="col-span-4">Kerusakan</div>
                                <div class="col-span-3">Biaya</div>
                            </div>

                            <div class="multiple-records rounded">
                                <div class="grid grid-cols-12 gap-3 mb-3 duplicate-row lg:border-0 border border-slate-400 lg:bg-white bg-slate-50 lg:shadow-none shadow-lg lg:p-0 p-4 rounded-md">
                                    <div>
                                        <button type='button' id='remove' class='remove-row shadow-md px-3 py-2 rounded text-slate-600 bg-slate-200 hover:bg-red-700 hover:text-white duration-150'>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="lg:col-span-2 col-span-12">
                                        <div class="lg:hidden">Jenis Barang</div>
                                        <select name='nama_barang_id[]' id='nama_barang_id' class="w-full p-1.5 rounded-md border @error('nama_barang_id.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            <option selected>-</option>
                                            @foreach ($jenis_barang as $item)
                                                <option value='{{ $item->id }}' {{ old('nama_barang_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_barang_id.*')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="lg:col-span-2 col-span-12">
                                        <div class="lg:hidden">Jumlah</div>
                                        <div class="flex">
                                            <div class='mr-2 my-auto'>
                                                x
                                            </div>
                                            <div>
                                                <input type='number' name='jumlah[]' id='jumlah' class="lg:w-full w-1/3 p-1 rounded-md border @error('jumlah.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            </div>
                                        </div>
                                        @error('jumlah.*')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="lg:col-span-4 col-span-12">
                                        <div class="lg:hidden">Kerusakan</div>
                                        <input type='text' name='kerusakan[]' id='kerusakan' class='w-full p-1 rounded-md border @error('kerusakan.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400'>
                                        @error('kerusakan.*')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="lg:col-span-3 col-span-12">
                                        <div class="lg:hidden">Biaya</div>
                                        <div class="flex">
                                            <div class='py-1.5 px-1.5 border-y border-l rounded-y-md rounded-l-md bg-slate-200 border-slate-500'>Rp</div>
                                            <input type='number' name='biaya[]' id='biaya' class='biaya w-full p-1 rounded-r-md rounded-y-md border @error('biaya.*') border-red-400 @enderror focus:border-red-400 focus:ring-red-400'>
                                        </div>
                                        @error('biaya.*')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="lg:hidden border-t border-slate-500 mt-7"></div>

                            <div class="grid grid-cols-12 lg:gap-4 gap-1 mt-5 mb-2">
                                <div class=""></div>
                                <div class="col-span-3"></div>
                                <div class=""></div>
                                <div class="lg:col-span-4 col-span-12 lg:text-end my-auto">Total biaya</div>
                                <div class="lg:col-span-3 col-span-12">
                                    <div class="flex">
                                        <div class='py-1.5 px-1.5 border-y border-l rounded-y-md rounded-l-md bg-slate-200 border-slate-500'>Rp</div>
                                        <input type='number' name='total' id='total' class='total w-full p-1 rounded-r-md rounded-y-md border border-slate-500 bg-slate-100 focus:ring-0 focus:border-slate-400' readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 lg:gap-4 gap-1">
                                <div></div>
                                <div class="col-span-3"></div>
                                <div></div>
                                <div class="lg:col-span-4 col-span-12 lg:text-end my-auto">Uang muka</div>
                                <div class="lg:col-span-3 col-span-12">
                                    <div class="flex">
                                        <div class='py-1.5 px-1.5 border-y border-l rounded-y-md rounded-l-md bg-slate-200 border-slate-500'>Rp</div>
                                        <input type='number' name='uang_muka' id='uang_muka' class='uang_muka w-full p-1 rounded-r-md rounded-y-md border border-slate-500 focus:border-red-400 focus:ring-red-400'>
                                    </div>
                                </div>
                            </div>

                            @php
                                foreach ($transaksi as $item) {
                                    $id = explode('-', $item->kode_transaksi);
                                }
                            @endphp

                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 shadow-md rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200'></i>Simpan</button>
                        <a href='/reparasi' name='back' class='px-3 py-2 shadow-md rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
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