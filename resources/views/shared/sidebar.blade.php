<nav class="fixed top-0 z-50 w-full shadow bg-white border-b border-slate-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">

            <button data-drawer-target="logo-sidebar" data-drawer-backdrop="false" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg sm:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            
            <a href="#" class="ml-2 md:mr-24">
                <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="lg:w-40 w-28">
            </a>
            </div>
            <div class="flex my-auto">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="lg:w-8 lg:h-8 w-6 h-6 text-slate-800">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-slate-800">
                    <div class="my-auto ml-3 font-semibold text-slate-800 text-start flex">
                        {{ auth()->user()->nama }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mb-2 ml-2 pt-2">
                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-start text-xs -mt-1 ml-3">{{ auth()->user()->jabatan }}</div>
                </button>
                <div id="dropdown" class="z-10 hidden bg-slate-50 divide-y divide-slate-100 rounded-lg shadow-md w-44 ">
                    <ul class="py-2 text-sm text-slate-700 " aria-labelledby="dropdownDefaultButton">
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="block lg:px-4 px-3 lg:py-2 py-1 w-full text-start hover:bg-slate-200"><i class="fas fa-sign-out mr-2"></i>
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
                    <a href="/home" class="flex {{ $title == 'Dashboard' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/reparasi" class="flex {{ auth()->user()->jabatan == 'Pimpinan' ? 'hidden' : '' }} {{ $title == 'Reparasi' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Reparasi</span>
                    </a>
                </li>
                <li>
                    <a href="/customer" class="flex {{ auth()->user()->jabatan == 'Pimpinan' ? 'hidden' : '' }} {{ $title == 'Customer' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="/jenis_barang" class="flex {{ auth()->user()->jabatan == 'Pimpinan' ? 'hidden' : '' }} {{ $title == 'Jenis Barang' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Jenis Barang</span>
                    </a>
                </li>
                <li>
                    <a href="/pembelian" class="flex {{ auth()->user()->jabatan == 'Pimpinan' ? 'hidden' : '' }} {{ $title == 'Pembelian' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Pembelian</span>
                    </a>
                </li>
                <li>
                    <a href="/supplier" class="flex {{ auth()->user()->jabatan == 'Pimpinan' ? 'hidden' : '' }} {{ $title == 'Supplier' ? 'text-red-600 font-bold border-l-2 border-red-600' : 'text-slate-500 hover:text-red-600' }} items-center px-4 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Supplier</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex {{ auth()->user()->jabatan == 'Pimpinan' ? 'hidden' : '' }} {{ $title == 'Transaksi Masuk' || $title == 'Transaksi Keluar' ? 'text-red-600 font-bold' : 'text-slate-500 hover:text-red-600' }} items-center w-full px-4 mt-4 mb-2 transition duration-75 group" aria-controls="dropdown-transaksi" data-collapse-toggle="dropdown-transaksi">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Transaksi</span>
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Laporan</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
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
    
    
  