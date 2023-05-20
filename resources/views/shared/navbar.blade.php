<div class="flex justify-between pt-8 pb-2 px-9 border-y bg-white border-gray-300 text-sm text-slate-600 shadow-md">
    <div>
        <ul class="flex flex-row">
            <li>
                <a href="#" class="mr-8"><i class="fa-solid fa-house mr-2"></i>Home</a>
            </li>
            <li>
                <a href="/reparasi" class="{{ $title == 'Reparasi' ? 'text-red-700 pb-2 border-b-2 border-red-700 font-semibold' : '' }} mr-8"><i class="fa-solid fa-screwdriver-wrench mr-2"></i>Reparasi</a>
            </li>
            <li>
                <a href="/pembelian_sparepart" class="{{ $title == 'Pembelian Sparepart' ? 'text-red-700 pb-2 border-b-2 border-red-700 font-semibold' : '' }} mr-8"><i class="fa-solid fa-cart-shopping mr-2"></i>Pembelian Sparepart</a>
            </li>
            <li>
                <button id="dropdownDefaultButton" data-dropdown-toggle="transaksi" class="mr-8"><i class="fa-solid fa-money-bill-transfer mr-2"></i>Transaksi<i class="fa-solid fa-angle-down ml-2"></i></button>
                <div id="transaksi" class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-lg shadow-md w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="/transaksi_masuk" class="block px-4 py-2 hover:bg-gray-200">Transaksi Masuk</a>
                            <a href="/transaksi_keluar" class="block px-4 py-2 hover:bg-gray-200">Transaksi Keluar</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <button id="dropdownDefaultButton" data-dropdown-toggle="laporan" class="mr-8"><i class="fa-solid fa-clipboard mr-2"></i>Laporan<i class="fa-solid fa-angle-down ml-2"></i></button>
                <div id="laporan" class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-lg shadow-md w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200">Pemasukan</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200">Pengeluaran</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="mr-8"><i class="fa-solid fa-sign-out mr-2"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div>
        <p id="time"></p>
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

                var time = day + ", " + date + " " + month + " " + year + " | " + hours + ":" + minutes + ":" + seconds + " WIB";

                document.getElementById("time").innerHTML = time;
            }
            setInterval(myTime, 1000)
        </script>
    </div>
</div>