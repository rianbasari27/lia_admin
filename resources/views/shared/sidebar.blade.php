<nav class="fixed top-0 z-50 w-full shadow bg-white border-b border-slate-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg sm:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <a href="#" class="ml-2 md:mr-24">
                <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="w-40">
            </a>
            </div>
            <div class="flex my-auto">
                <div>
                    <i class="fa-solid fa-circle-user text-3xl text-slate-800"></i>
                </div>
                
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-slate-800">
                    <div class="my-auto ml-3 font-semibold text-slate-800 text-start">{{ auth()->user()->nama }} <i class="fas fa-sort-down mb-2 ml-2"></i></div>
                    <div class="text-start text-xs -mt-1 ml-3">{{ auth()->user()->jabatan }}</div>
                </button>
                <div id="dropdown" class="z-10 hidden bg-slate-50 divide-y divide-slate-100 rounded-lg shadow-md w-44 ">
                    <ul class="py-2 text-sm text-slate-700 " aria-labelledby="dropdownDefaultButton">
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="block px-4 py-2 w-full text-start hover:bg-slate-200"><i class="fas fa-sign-out mr-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
    
            </div>
        </div>
        </div>
    </nav>
    
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-slate-200 sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="font-medium mx-2">
                <li>
                    <a href="/dashboard" class="flex {{ $title == 'Dashboard' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <i class="fa-solid fa-gauge"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/reparasi" class="flex {{ $title == 'Reparasi' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Reparasi</span>
                    </a>
                </li>
                <li>
                    <a href="/pembelian" class="flex {{ $title == 'Pembelian' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Pembelian</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex {{ $title == 'Transaksi Masuk' || $title == 'Transaksi Keluar' ? 'text-red-600 font-bold' : 'text-slate-500 hover:text-red-600' }} items-center w-full px-4 mt-4 mb-2 transition duration-75 group" aria-controls="dropdown-transaksi" data-collapse-toggle="dropdown-transaksi">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                        <span class="flex-1 ml-2 text-left whitespace-nowrap">Transaksi</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <ul id="dropdown-transaksi" class="{{ $title == 'Transaksi Masuk' || $title == 'Transaksi Keluar' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="/transaksi_masuk" class="flex {{ $title == 'Transaksi Masuk' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center transition duration-75 pl-3 ml-6 mb-2 group">Transaksi masuk</a>
                        </li>
                        <li>
                            <a href="/transaksi_keluar" class="flex {{ $title == 'Transaksi Keluar' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center transition duration-75 pl-3 ml-6 mt-4 group">Transaksi keluar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button" class="flex {{ $title == 'Laporan Kas Masuk' || $title == 'Laporan Kas Keluar' ? 'text-red-600 font-bold' : 'text-slate-500 hover:text-red-600' }} items-center w-full px-4 mt-4 mb-2 transition duration-75 group" aria-controls="dropdown-laporan" data-collapse-toggle="dropdown-laporan">
                        <i class="fa-solid fa-clipboard ml-1"></i>
                        <span class="flex-1 ml-4 text-left whitespace-nowrap">Laporan</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <ul id="dropdown-laporan" class="{{ $title == 'Laporan Kas Masuk' || $title == 'Laporan Kas Keluar' ? '' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="/laporan_kas_masuk" class="flex {{ $title == 'Laporan Kas Masuk' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center transition duration-75 pl-3 ml-6 mb-2 group">Laporan kas masuk</a>
                        </li>
                        <li>
                            <a href="/laporan_kas_keluar" class="flex {{ $title == 'Laporan Kas Keluar' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center transition duration-75 pl-3 ml-6 mt-4 group">Laporan kas keluar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 mt-4 mb-2 text-slate-500 hover:text-red-600">
                            <i class="fa-solid fa-sign-out ml-1"></i>
                            <span class="flex ml-3">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
            <ul>
                <li>
                    <div>
                        <p id="time" class="absolute inset-x-0 bottom-0 mx-5 pt-5 mb-5 border-t border-slate-300 text-slate-500"></p>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <script>
        function myTime() {
            function addZero(param) {
                if (param < 10) {
                    param = "0" + param;
                }
                return param;
            }

            dayArr = [
                "Minggu",
                "Senin",
                "Selasa",
                "Rabu",
                "Kamis",
                "Jumat",
                "Sabtu",
            ];

            monthArr = [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ];
            let today = new Date();

            let day = dayArr[today.getDay()];
            let date = addZero(today.getDate());
            let month = monthArr[today.getMonth()];
            let year = today.getFullYear();

            let hours = addZero(today.getHours());
            let minutes = addZero(today.getMinutes());
            let seconds = addZero(today.getSeconds());

            let time = hours + ":" + minutes + ":" + seconds + " WIB" + " <br> " + day + ", " + date + " " + month + " " + year ;

            document.getElementById("time").innerHTML = time;
        }
        setInterval(myTime, 10)
    </script>
    
    
  