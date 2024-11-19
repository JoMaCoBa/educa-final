@extends('layouts.app')

@section('title', 'EduCA - Iniciar Sesión')

@section('content')

    <main class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm flex flex-col justify-center items-center">
            <x-logo></x-logo>
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Inicia Sesión
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm ">
            <form method="POST" action="{{ route('login.store') }}" novalidate class="space-y-6">
                @csrf
                @method('POST')
                @if (session('mensaje'))
                    <p class="text-red-500 text-xs mt-1">{{ session('mensaje') }}</p>
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Correo Electrónico</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6
                            @error('email')
                                border-red-500 border-2
                            @enderror
                        ">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6
                            @error('password')
                                border-red-500 border-2
                            @enderror
                            ">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                    </div>
                </div>

                <div class="mb-5 flex items-center space-x-2">
                    <input type="checkbox" id="remember" name="remember" > <label for="remember" class=" text-sm font-medium leading-6 text-gray-400">Mantener mi sesión abierta</label>
                </div>

                <div>
                    <button type="submit" class="Primary-Button w-full">
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                ¿No tienes cuenta?
                <a href="{{ route('register.index') }}" class="font-semibold leading-6 hover:text-primary">Crea una</a>
            </p>
        </div>
    </main>

@endsection
