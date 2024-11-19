@extends('layouts.app')

@section('title', 'EduCA - Crear Cuenta')

@section('content')

    <main class="flex items-center justify-center h-screen my-12">
        <div class="w-full h-auto max-w-md p-8 bg-white md:shadow-lg rounded-lg mt-4">

            <div class="flex flex-col justify-center items-center">
                <x-logo></x-logo>
            </div>

            <form action="{{ route('register.store') }}" method="POST" novalidate class="space-y-4">
                @csrf
                @method('POST')

                <div>
                    <label for="email" class="block">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-primary focus:outline-none
                        @error('email')
                        border-red-500 border-2
                        @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="name" class="block">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Nombre" value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-primary focus:outline-none
                        @error('name')
                        border-red-500 border-2
                        @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="block">Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Nombre de usuario" value="{{ old('username') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-primary focus:outline-none
                        @error('username')
                        border-red-500 border-2
                        @enderror">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-primary focus:outline-none
                        @error('password')
                        border-red-500 border-2
                        @enderror">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block">Repite Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repite la contraseña"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-primary focus:outline-none
                        @error('password_confirmation')
                        border-red-500 border-2
                        @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <p class="mb-2">Escoge las categorías que te interesan:</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                class="form-checkbox text-blue-500 focus:ring-blue-500 h-4 w-4">
                            <span class="text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>

                @error('categories')
                    <p class="text-red-500 text-xs mt-1">Las categorias son obligatorias</p>
                @enderror

                <button type="submit"
                    class="Primary-Button w-full">Enviar</button>
            </form>
        </div>
    </main>

@endsection
