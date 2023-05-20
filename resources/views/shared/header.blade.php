<div class="px-7 py-4 bg-white shadow-md">
    <div class="flex justify-between">

        <div class="text-center">
            <div>
                <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="w-40">
            </div>
        </div>

        <div class="flex my-auto">
            <div>
                <i class="fa-solid fa-circle-user text-3xl text-slate-800"></i>
            </div>
            
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-slate-800">
                <div class="my-auto ml-3 font-semibold text-slate-800 text-start">{{ auth()->user()->nama }} <i class="fas fa-sort-down mb-2 ml-2"></i></div>
                <div class="text-start text-xs -mt-1 ml-3">{{ auth()->user()->jabatan }}</div>
            </button>
            <div id="dropdown" class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-lg shadow-md w-44 ">
                <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="block px-4 py-2 w-full text-start hover:bg-gray-200"><i class="fas fa-sign-out mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>