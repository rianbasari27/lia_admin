@extends('index')

@section('main-content')

<div>

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center my-4 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700 dark:text-slate-400 dark:hover:text-white">
                    <i class="fa-solid fa-house mr-2"></i>
                Home
                </a>
            </li>
        </ol>
    </nav>

    <div class="flex justify-between mb-4">
        <h1 class="text-3xl text-slate-600 font-semibold">{{ $title }}</h1>
        <p class="text-lg"><i class="fa-regular fa-calendar"></i> <span id="month"></span></p>
    </div>
    
    <hr>

    <div class="grid grid-cols-12 gap-4 mt-7 text-slate-700">

        <div class="col-span-3 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Reparasi</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <i class="fa-solid fa-screwdriver-wrench text-white"></i>
                </div>
            </div>
            @foreach ($reparasi as $item)
                <div class="text-5xl font-bold">{{ $item->total_r }}</div>
            @endforeach
            <div>Total customer</div>
            <div class="mt-4">
                <a href="/reparasi" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>

        <div class="col-span-3 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Pembelian</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <i class="fa-solid fa-shopping-cart text-white"></i>
                </div>
            </div>
            @foreach ($pembelian as $item)
                <div class="text-5xl font-bold">{{ $item->total_p }}</div>
            @endforeach
            <div>Total pembelian</div>
            <div class="mt-4">
                <a href="/pembelian" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>

        <div class="col-span-3 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Transaksi Masuk</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <i class="fa-solid fa-hand-holding-dollar text-white"></i>
                </div>
            </div>
            @foreach ($transaksi_masuk as $item)
                <div class="text-5xl font-bold">{{ $item->tr_masuk }} <span class="text-xs font-normal">x transaksi</span></div>
            @endforeach
            <div>Total transaksi</div>
            <div class="mt-4">
                <a href="#" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>

        <div class="col-span-3 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Transaksi Keluar</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill-1-wave text-white"></i>
                </div>
            </div>
            @foreach ($transaksi_keluar as $item)
                <div class="text-5xl font-bold">{{ $item->tr_keluar }} <span class="text-xs font-normal">x transaksi</span></div>
            @endforeach
            <div>Total transaksi</div>
            <div class="mt-4">
                <a href="#" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>
        
    </div>

    <div class="grid grid-cols-12 gap-4 mt-4 text-slate-700">
        <div class="col-span-6 p-4 rounded-md shadow bg-white">
            <canvas id="grafik_tmasuk"></canvas>
        </div>
        <div class="col-span-6 p-4 rounded-md shadow bg-white">
            <canvas id="grafik_tkeluar"></canvas>
        </div>
    </div>


</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

<script>
    function monthYear() {
        monthArr = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        let today = new Date();

        let month = monthArr[today.getMonth()];
        let year = today.getFullYear();

        let thisMonth = month + ", " + year ;

        document.getElementById("month").innerHTML = thisMonth;
    }
    document.addEventListener('DOMContentLoaded', function() {
        monthYear();
    });
</script>

<script>
    const ctxMasuk = document.getElementById('grafik_tmasuk');
    const ctxKeluar = document.getElementById('grafik_tkeluar');
    var tMasuk = @json($t_masuk);
    var tKeluar = @json($t_keluar);
    var bulan = @json($bulan);

    var labels = tMasuk.map(item => bulan[item.bulan]);
    var valuesMasuk = tMasuk.map(item => item.total_masuk);
    var valuesKeluar = tKeluar.map(item => item.total_keluar);

    new Chart(ctxMasuk, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Transaksi Masuk',
            data: valuesMasuk,
            borderWidth: 1,
            backgroundColor: '#dc2626',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
    

    new Chart(ctxKeluar, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Transaksi Keluar',
            data: valuesKeluar,
            borderWidth: 1,
            backgroundColor: '#dc2626',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
</script>

@endsection