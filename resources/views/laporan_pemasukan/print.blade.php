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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>Laporan Kas Masuk - {{ $bulan[$month_now] }} {{ $year_now }}</title>
</head>
<body class="mx-5">
    
    <header>
        <div class="flex border-b-2 pb-5 border-red-700">
            <div class="my-auto">
                <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="lg:w-32 w-20">
            </div>
            <div class="ml-5 pl-4 lg:text-xs text-[10px] border-l border-slate-700">
                <p>Jl. Kelapa Dua Raya RT006/009, Tugu, Cimanggis, <br>Kota Depok 16451</p>
                <p><i class="fa-solid fa-phone mr-2"></i>(+62) 878 7617 3566</p>
                <p><i class="fa-solid fa-envelope mr-2"></i>lia.reparasi@gmail.com</p>
            </div>
        </div>
    </header>

    <main class="lg:mt-3 mt-5">
        <div class="font-semibold lg:text-xl text-lg text-center">
            {{ $title }}
        </div>

        <div class="grid grid-cols-12 gap-1 lg:text-sm text-[8px]">
            <div class="col-span-3">Per Bulan</div>
            <div class="col-span-3">: {{ $bulan[$month_now] }} {{ $year_now }}</div>
        </div>
        <div class="grid grid-cols-12 gap-1 mt-1 lg:text-sm text-[8px]">
            <div class="col-span-3">Tanggal Laporan</div>
            <div class="col-span-3">: {{ date('d-m-Y') }}</div>
        </div>

        <div class="mt-3">
            <table class="w-full lg:text-sm text-[8px]">
                <thead>
                    <tr>
                        <th class="py-2 border border-slate-700 w-[40px]">No.</th>
                        <th class="py-2 border border-slate-700">Bulan</th>
                        <th class="py-2 border border-slate-700">Tanggal</th>
                        <th class="py-2 border border-slate-700">Jumlah Customer</th>
                        <th class="py-2 border border-slate-700">Jumlah Transaksi</th>
                        <th class="py-2 border border-slate-700">Uang Masuk</th>
                    </tr>
                </thead>
                @if ($data->count())
                    @foreach ($data as $item)
                    <tbody>
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
                            <td class="px-2 border border-slate-700 text-end">
                                <div class="justify-between">
                                    Rp {{ ($item->uang_masuk == null) ? '-' : number_format($item->uang_masuk, 0, ',', '.') }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    <tfoot>
                        <tr>
                            <td colspan="5" class="border border-slate-700 px-2 text-end font-semibold">Total Kas Masuk</td>
                            <td class="border border-slate-700 px-2 text-end font-semibold">
                                <div class="justify-between">
                                    Rp {{ ($item->total == null) ? '-' : number_format($item->total, 0, ',', '.') }}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                @else
                    <tbody>
                        <tr>
                            <tr class="border-b border-x border-slate-700">
                                <td colspan="6" class="text-center py-3">Laporan belum tersedia.</td>
                            </tr>
                        </tr>
                    </tbody>
                @endif
            </table>
        </div>
    </main>
    

    <script type="text/javascript">
        window.print()
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>
</html>