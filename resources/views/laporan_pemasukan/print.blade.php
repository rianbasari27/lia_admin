<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css"  rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6a5458a5a6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>Cetak {{ $title }} - LIA Reparasi</title>
</head>
<body class="mx-5">
    
    <header>
        <div class="flex border-b-2 pb-5 border-red-700">
            <div class="my-auto">
                <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="w-32">
            </div>
            <div class="ml-5 pl-4 text-xs border-l border-slate-700">
                <p>Jl. Kelapa Dua Raya RT006/009, Tugu, Cimanggis, <br>Kota Depok 16451</p>
                <p><i class="fa-solid fa-phone mr-2"></i>(+62) 878 7617 3566</p>
                <p><i class="fa-solid fa-envelope mr-2"></i>lia.reparasi@gmail.com</p>
            </div>
        </div>
    </header>

    <main class="mt-3">
        <div class="font-semibold text-xl text-center">
            {{ $title }}
        </div>

        <div class="grid grid-cols-12 gap-1 text-sm">
            <div class="col-span-2">Per Bulan</div>
            <div class="col-span-3">: Mei 2023</div>
        </div>
        <div class="grid grid-cols-12 gap-1 mt-1 text-sm">
            <div class="col-span-2">Tanggal Laporan</div>
            <div class="col-span-3">: 31-05-2023</div>
        </div>

        <div class="mt-3">
            <table class="w-full text-sm">
                <thead>
                    <tr>
                        <th class="py-2 border border-slate-700 w-[50px]">No.</th>
                        <th class="py-2 border border-slate-700">Bulan</th>
                        <th class="py-2 border border-slate-700">Tanggal</th>
                        <th class="py-2 border border-slate-700 w-[140px]">Jumlah Customer</th>
                        <th class="py-2 border border-slate-700 w-[140px]">Jumlah Transaksi</th>
                        <th class="py-2 border border-slate-700">Uang Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="px-2 border border-slate-700 text-center">{{ $loop->iteration }}</td>
                        <td class="px-2 border border-slate-700 ">
                            @foreach ($bulan as $key => $get_month)
                                {{ ($item->bulan == $key) ? $get_month : '' }}
                            @endforeach  
                        </td>
                        <td class="px-2 border border-slate-700">{{ $item->tanggal }}</td>
                        <td class="px-2 border border-slate-700 text-end">{{ $item->jumlah_customer }}</td>
                        <td class="px-2 border border-slate-700 text-end">{{ $item->jumlah_transaksi }}</td>
                        <td class="px-2 border border-slate-700 ">
                            <div class="flex justify-between">
                                <div>
                                    Rp
                                </div>
                                <div>
                                    {{ ($item->uang_masuk == null) ? '-' : $item->uang_masuk }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    {{-- @for ($i = 1; $i <= 31; $i++)
                        <tr>
                            <td class="px-2 border border-slate-700 text-center">{{ $i }}</td>
                            <td class="px-2 border border-slate-700">Mei</td>
                            <td class="px-2 border border-slate-700">{{ date('Y-m-d') }}</td>
                            <td class="px-2 border border-slate-700 text-end">1</td>
                            <td class="px-2 border border-slate-700 text-end">1</td>
                            <td class="px-2 border border-slate-700">100000</td>
                        </tr>
                    @endfor --}}
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="border border-slate-700 px-2 text-end font-semibold">Total Kas Masuk</td>
                        <td class="border border-slate-700 px-2 text-end font-semibold">
                            <div class="flex justify-between">
                                <div>
                                    Rp
                                </div>
                                <div>
                                    {{ ($item->total == null) ? '-' : $item->total }}
                                </div>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    

    <script type="text/javascript">
        window.print()
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>
</html>