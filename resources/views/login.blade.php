<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>{{ $title }} - LIA Reparasi</title>
</head>
<body class="bg-slate-100">
    <div class="lg:w-1/3 mx-5 lg:mx-auto mt-5">
        @if(session()->has('loginError'))
        <div id="alert-1" class="flex p-2 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
            <div class="ml-3 text-sm font-medium my-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 inline mr-2">
                    <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                </svg>
                {{ session('loginError') }}
            </div>
            <button type="button" class="ml-auto bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-300 inline-flex " data-dismiss-target="#alert-1" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        @endif
    </div>

    <div class="lg:w-1/3 mx-5 lg:mx-auto mt-32 bg-white p-8 rounded-lg shadow-lg">
        <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="lg:w-32 w-28 mx-auto mb-3">
        <h1 class="lg:text-3xl text-xl font-semibold mb-4 mx-auto">Login</h1>
        <hr>
        <form class="mt-4" action="/" method="post">
            @csrf
            <div class="mb-4">
                <label class="text-xs block text-gray-700 font-semibold lg:mb-2 mb-1" for="Username">
                Username
                </label>
                <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" autofocus class="appearance-none text-sm border @error('username') border-red-400 @enderror rounded w-full lg:py-2 py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                @error('username')
                <div class="text-red-700 text-start text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="text-xs block text-gray-700 font-semibold lg:mb-2 mb-1" for="password">
                Password
                </label>
                <input name="password" id="password" type="password" placeholder="Password" value="{{ old('password') }}" class="appearance-none text-sm border rounded w-full lg:py-2 py-1 px-3 @error('password') border-red-400 @enderror text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                <div class="text-red-700 text-start text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="submit" name="submit" value="Login" class="text-sm lg:text-md bg-red-700 hover:bg-red-800 text-white font-bold lg:py-2 py-1 lg:px-4 px-3 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>

    <footer class="fixed bottom-0 w-full">
        <div class="border-t border-slate-300 lg:px-9 py-5 text-sm text-slate-600">
            <div class="mx-5">&copy; Copyright 2023 - LIA Reparasi version 1.0</div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
