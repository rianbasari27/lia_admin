@extends('index')

@section('main-content')
    <div>
        <div class='flex justify-between'>
            <h1 class='text-3xl text-slate-600 font-semibold'>{{ $title }}</h1>
            <a href='/pembelian_sparepart' class='px-3 py-2 bg-slate-500 rounded-lg shadow-md text-white hover:bg-slate-600 focus:ring focus:ring-slate-300'>
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
                <form action='/pembelian_sparepart' method='post'>
                    @csrf
                    <div class='flex border border-slate-400 p-7 rounded-lg mb-5'>
                        <div class="w-full">
                            <div class='flex'>

                                <div class='flex mb-3'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='kode_pembelian' class='text-slate-600'>Kode Pembelian</label>
                                    </div>
                                    <div>
                                        <input type='text' name='kode_pembelian' id='kode_pembelian' value="{{ old('kode_pembelian') }}" class="w-[300px] p-1 rounded-md border @error('kode_pembelian') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                        @error('kode_pembelian')
                                            <div class="text-red-700 text-start">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class='flex mb-3 ml-10'>
                                    <div class='w-[140px] my-auto'>
                                        <label for='tanggal' class='text-slate-600'>Tanggal Pembelian</label>
                                    </div>
                                    <div>
                                        <input type='date' name='tanggal' id='tanggal' value="{{ old('tanggal') }}" class="w-[200px] p-1 rounded-md border @error('tanggal') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
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
                                    <label for='tempat_pembelian' class='text-slate-600'>Tempat Pembelian</label>
                                </div>
                                <div>
                                    <input type='text' name='tempat_pembelian' id='tempat_pembelian' value="{{ old('tempat_pembelian') }}" class="w-[300px] p-1 rounded-md border @error('tempat_pembelian') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                    @error('tempat_pembelian')
                                        <div class="text-red-700 text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" id='add' class='add-row bg-slate-200 font-semibold p-2 rounded-md hover:bg-red-700 hover:text-white text-slate-600 duration-150'><i class='fa-solid fa-plus mr-2'></i>Tambah</button>
                            </div>
                            
                            <table>
                                <thead>
                                    <tr>
                                        <td class='px-3 text-xs'></td>
                                        <td class='px-3 text-xs'>Nama Sparepart</td>
                                        <td class='px-3 text-xs'>Jumlah</td>
                                        <td class='px-3 text-xs'>Satuan</td>
                                        <td class='px-3 text-xs'>Biaya</td>
                                    </tr>
                                </thead>
                                
                                <tbody class="multiple-records">
                                    <tr class="duplicate-row">
                                        <td class="px-3">
                                            <button type='button' id='remove' class='remove-row px-3 py-2 rounded text-slate-600 bg-slate-200 hover:bg-red-700 hover:text-white duration-150'><i class='fa-solid fa-trash-can'></i></button>
                                        </td>
                                        <td class='px-3'>
                                            <select name='nama_sparepart_id[]' id='nama_sparepart_id' class="w-72 p-1 rounded-md border @error('nama_sparepart_id') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                                <option selected>-</option>
                                                @foreach ($sparepart as $item)
                                                    <option value='{{ $item->id }}' {{ old('nama_sparepart_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_sparepart }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_sparepart_id')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class='px-3'>
                                            <input type='number' name='jumlah[]' id='jumlah' class="w-[50px] p-1 rounded-md border @error('jumlah') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                            @error('jumlah')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class='px-3'>
                                            <select name='satuan[]' id='satuan' class="w-[100] p-1 rounded-md border @error('satuan') border-red-400 @enderror focus:border-red-400 focus:ring-red-400">
                                                <option value="Pcs">Pcs</option>
                                                <option value="Dus">Dus</option>
                                                <option value="Lusin">Lusin</option>
                                                <option value="Kg">Kg</option>
                                                <option value="Meter">Meter</option>
                                            </select>
                                            @error('satuan')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class='px-3'>
                                            <span class='mr-2'>Rp</span><input type='number' name='biaya[]' id='biaya' class='biaya w-52 p-1 rounded-md border border-slate-400 focus:border-red-400 focus:ring-red-400'>
                                            @error('biaya')
                                                <div class="text-red-700 text-start">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td class="px-3 pt-7"></td>
                                        <td class="px-3 pt-7"></td>
                                        <td class="px-3 pt-7"></td>
                                        <td class="px-3 pt-7 text-end">Total biaya</td>
                                        <td class="px-3 pt-7">
                                            <span class='mr-2'>Rp</span><input type='number' name='total' id='total' class='w-52 p-1 rounded-md border border-slate-400 bg-slate-200 focus:ring-0 focus:border-slate-400' readonly>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                    </div>

                    <div>
                        <button type='submit' name='simpan' class='px-3 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800 focus:ring focus:ring-red-200'></i>Simpan</button>
                        <a href='/pembelian_sparepart' name='back' class='px-3 py-2 rounded-lg bg-slate-500 text-white hover:bg-slate-700 focus:ring focus:ring-slate-300'></i>Kembali</a>
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
                            //         totalIt()
                            //     });
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
                    </script>
                    
                </form>
            </div>
        </div>
    </div>

@endsection