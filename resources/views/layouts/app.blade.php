<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="font-montserrat w-full h-screen bg-slate-100 scroll-smooth">

    <script src="https://kit.fontawesome.com/3842a0eeb4.js" crossorigin="anonymous"></script>

    @auth
        <nav class="w-full h-16 hidden bg-white lg:flex p-4 justify-between items-center border-b shadow-sm">
            <div class="h-auto w-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Educa" class="h-16 w-full object-cover">
            </div>

            <div class="flex space-x-8">
                <a class="flex items-center justify-center w-28 p-2 transition-all ease-linear border-2 border-white rounded-lg font-semibold text-primary hover:border-primary"
                    href="{{route('home')}}">Inicio</a>
                <a class="flex items-center justify-center w-28 p-2 transition-all ease-linear border-2 border-white rounded-lg font-semibold text-primary hover:border-primary"
                    href="{{route('courses.all')}}">Cursos</a>
            </div>

            <div class="flex space-x-4 items-center">
                <a class="flex w-48 items-center justify-center space-x-2 p-2 transition-all ease-linear border-primary rounded-lg font-normal text-primary hover:border-2"
                    href="{{ route('profile.index', ['user' => auth()->user()->username])}}">
                    <p>{{auth()->user()->username}}</p>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="Primary-Button">Cerrar Sesión</button>
                </form>
            </div>

        </nav>
    @endauth

    @guest
        <nav class="w-full h-16 hidden bg-white lg:flex p-4 justify-between items-center border-b shadow-sm">

            <div class="h-auto w-auto">
                <img src="{{ asset('images/logo.png') }}" alt="Educa" class="h-16 w-full object-cover">
            </div>

            <div class="flex items-center justify-around w-50 space-x-4">
                <a class="Primary-Button" href="{{ route('login') }}">Iniciar Sesión</a>
                <a class="Primary-Button" href="{{ route('register.index') }}">Registrarse</a>
            </div>

        </nav>
    @endguest

    @yield('content')

    <footer class="w-full h-36 bg-gray-50 flex flex-col items-center justify-center mt-6 shadow-md">
        <p class="text-lg mt-5"><x-logo></x-logo></p>
        <div class="m-2 flex flex-col items-center justify-center">
            <p class="text-gray-300 text-lg font-semibold">Powered by</p>
            <p class="text-gray-300 text-md">UDG - {{ now()->year }}</p>
        </div>
    </footer>

    @auth
        <nav
            class="w-full h-16 bg-white fixed left-0 bottom-0 shadow-md flex space-x-8 justify-center items-center lg:hidden">

            <a href="{{route('home')}}">
                <i
                    class="fa-solid fa-house text-3xl text-gray-300 transition-all duration-500 ease-in-out hover:text-primary"></i>
            </a>

            <a href="{{route('courses.all')}}">
                <i
                    class="fa-solid fa-school text-3xl text-gray-300 transition-all duration-500 ease-in-out hover:text-primary"></i>
            </a>

            <a href="{{ route('profile.index', ['user' => auth()->user()->username]) }}">
                <i
                    class="fa-solid fa-user text-3xl text-gray-300 transition-all duration-500 ease-in-out hover:text-primary"></i>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="hover:text-primary  text-3xl text-gray-300 transition-all duration-500 ease-in-out"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>

        </nav>
    @endauth

    @guest
        <nav
            class="w-full h-16 bg-white fixed left-0 bottom-0 shadow-md flex space-x-8 justify-center items-center lg:hidden ">

            <a href="{{ route('login') }}">
                <i
                    class="fa-solid fa-right-to-bracket text-3xl text-gray-300 transition-all duration-500 ease-in-out hover:text-primary"></i>
            </a>

            <a href="{{route('register.index')}}">
                <i
                    class="fa-solid fa-pen-to-square text-3xl text-gray-300 transition-all duration-500 ease-in-out hover:text-primary"></i>
            </a>

        </nav>
    @endguest

</body>

</html>
