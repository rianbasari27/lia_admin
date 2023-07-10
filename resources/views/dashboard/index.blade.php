@extends('index')

@section('main-content')

<div>

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center lg:my-4 my-2 space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/home" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                Home
                </a>
            </li>
        </ol>
    </nav>

    <div class="flex justify-between lg:mb-4 mb-2">
        <h1 class="lg:text-3xl text-2xl text-slate-600 font-semibold">{{ $title }}</h1>
        <p class="lg:text-lg text-sm my-auto flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
            </svg>
            <span id="month"></span>
        </p>
    </div>
    
    <hr>

    <div class="grid grid-cols-12 gap-4 text-slate-700 my-4">

        <div class="lg:col-span-3 col-span-6 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Reparasi</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white">
                        <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 016.775-5.025.75.75 0 01.313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 011.248.313 5.25 5.25 0 01-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 112.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0112 6.75zM4.117 19.125a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z" clip-rule="evenodd" />
                        <path d="M10.076 8.64l-2.201-2.2V4.874a.75.75 0 00-.364-.643l-3.75-2.25a.75.75 0 00-.916.113l-.75.75a.75.75 0 00-.113.916l2.25 3.75a.75.75 0 00.643.364h1.564l2.062 2.062 1.575-1.297z" />
                        <path fill-rule="evenodd" d="M12.556 17.329l4.183 4.182a3.375 3.375 0 004.773-4.773l-3.306-3.305a6.803 6.803 0 01-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 00-.167.063l-3.086 3.748zm3.414-1.36a.75.75 0 011.06 0l1.875 1.876a.75.75 0 11-1.06 1.06L15.97 17.03a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            @foreach ($reparasi as $item)
                <div class="lg:text-5xl text-4xl my-2 font-bold">{{ $item->total_r }}</div>
            @endforeach
            <div>Total customer</div>
            <div class="mt-4">
                <a href="/reparasi" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>

        <div class="lg:col-span-3 col-span-6 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Pembelian</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white">
                        <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                    </svg>
                </div>
            </div>
            @foreach ($pembelian as $item)
                <div class="lg:text-5xl text-4xl my-2 font-bold">{{ $item->total_p }}</div>
            @endforeach
            <div>Total pembelian</div>
            <div class="mt-4">
                <a href="/pembelian" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>

        <div class="lg:col-span-3 col-span-6 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Transaksi Masuk</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white">
                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd" />
                        <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                    </svg>
                </div>
            </div>
            @foreach ($transaksi_masuk as $item)
                <div class="lg:text-5xl text-4xl my-2 font-bold">{{ $item->tr_masuk }} <span class="text-xs font-normal">x transaksi</span></div>
            @endforeach
            <div>Total transaksi</div>
            <div class="mt-4">
                <a href="#" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>

        <div class="lg:col-span-3 col-span-6 p-4 rounded-md shadow bg-white">
            <div class="flex justify-between">
                <div class="my-auto">Transaksi Keluar</div>
                <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white">
                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                        <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd" />
                        <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                    </svg>
                </div>
            </div>
            @foreach ($transaksi_keluar as $item)
                <div class="lg:text-5xl text-4xl my-2 font-bold">{{ $item->tr_keluar }} <span class="text-xs font-normal">x transaksi</span></div>
            @endforeach
            <div>Total transaksi</div>
            <div class="mt-4">
                <a href="#" class="text-red-600 hover:text-red-700"><i class="fa-regular fa-eye"></i> Lihat data</a>
            </div>
        </div>
        
    </div>

    <div class="grid grid-cols-12 gap-4 my-4 text-slate-700">
        <div class="lg:col-span-6 col-span-12 p-4 rounded-md shadow bg-white">
            <canvas id="grafik_tmasuk"></canvas>
        </div>
        <div class="lg:col-span-6 col-span-12 p-4 rounded-md shadow bg-white">
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