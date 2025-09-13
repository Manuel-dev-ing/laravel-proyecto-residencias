@extends('layouts.auth')

@section('contenido')
    <div class="flex flex-col items-center">
        <p class="text-2xl font-semibold font-sans">Inicia Sesion en tu Cuenta</p>
        <p class="text-md font-normal">ingresa tu correo y contraseña para iniciar sesion</p>    

    </div>


    <form action="{{ route('login.store') }}" method="post">
        @csrf
        @if (session('mensaje'))
            <p class="text-red-500 text-center">{{ session('mensaje') }}</p>

        @endif

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-input-text id="email" name="email" type="email" class="block mt-1 w-full @error('email') is-invalid @enderror" placeholder="ingresa tu email"/>
            
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-input-text id="password" name="password" type="password" class="block mt-1 w-full @error('password') is-invalid @enderror" placeholder="ingresa tu contraseña"/>
            
            @error('password')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-center mb-4 mt-3">
            <input id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 ">mostrar contraseña</label>
        </div>

        <x-black-button class="cursor-pointer mt-3">
            iniciar sesion
        </x-black-button>

    </form>

    @push('scripts')
        
    <script>
        document.querySelector('#default-checkbox').addEventListener('click', function () {
            var pass = document.getElementById('password');
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password"
            }
            
        })
    </script>


    @endpush
@endsection











