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
    <title>{{ $title }} - LIA Reparasi</title>
</head>
<body class="bg-slate-100 text-sm">
    <header class="fixed top-0 left-0 right-0">
        {{-- @include('shared.header')
        @include('shared.navbar') --}}
        @include('shared.sidebar')
    </header>

    <main class="px-5 mt-20">
        <div class="sm:ml-64">
            @yield('main-content')
        </div>
    </main>
    
    <footer class="mt-5">
        @include('shared.footer')
    </footer>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

</body>
</html>