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
    <script src="https://kit.fontawesome.com/6a5458a5a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>{{ $title }} - LIA Reparasi</title>
</head>
<body class="bg-slate-100">
    <div class="w-1/3 mx-auto mt-5">
        @if(session()->has('loginError'))
        <div id="alert-1" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
            <div class="ml-3 text-sm font-medium my-auto">
                <i class="fa-solid fa-circle-xmark text-red-800 mr-2"></i>{{ session('loginError') }}
            </div>
            <button type="button" class="ml-auto bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-300 inline-flex " data-dismiss-target="#alert-1" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        @endif
    </div>

    <div class="w-1/3 mx-auto mt-32 bg-white p-8 rounded-lg shadow-lg">
        <img src="/img/lia_logo_svg.svg" alt="Logo LIA Reparasi" class="w-36 mx-auto mb-3">
        <h1 class="text-3xl font-semibold mb-4 mx-auto">Login</h1>
        <hr>
        <form class="mt-4" action="/" method="post">
            @csrf
            <div class="mb-4">
                <label class="text-xs block text-gray-700 font-semibold mb-2" for="Username">
                Username
                </label>
                <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" autofocus class="appearance-none border @error('username') border-red-400 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                @error('username')
                <div class="text-red-700 text-start text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="text-xs block text-gray-700 font-semibold mb-2" for="password">
                Password
                </label>
                <input name="password" id="password" type="password" placeholder="Password" value="{{ old('password') }}" class="appearance-none border rounded w-full py-2 px-3 @error('password') border-red-400 @enderror text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password')
                <div class="text-red-700 text-start text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="submit" name="submit" value="Login" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>

    <footer class="mt-48">
        <div class="border-t border-slate-300 px-9 py-5 text-slate-600">
            <span>&copy; Copyright 2023 - LIA Reparasi version 1.0</span>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>
