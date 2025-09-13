@extends('layouts.app')

@section('contenido')

    <h1 class="text-2xl text-blue-950 font-medium">Editar Usuario</h1>

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
            {{ session('mensaje') }}
        </div>
    @endif

    <nav class="flex my-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('usuarios.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                </a>
            </li>
        
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Editar Usuario</span>
                </div>
            </li>
        </ol>
    </nav>


    <section class="bg-white mt-6">
        <div class="max-w-2xl">
            <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre</label>
                        <x-input-text id="name" name="name" type="text" class="block mt-1 w-full @error('name') @enderror" placeholder="tu nombre" value="{{ old('name', $usuario->name) }}"/>
                        
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="first_lastname" class="block mb-2 text-sm font-medium text-gray-900 ">Primer apellido</label>
                        <x-input-text id="first_lastname" name="first_lastname" type="text" class="block mt-1 w-full @error('first_lastname') @enderror" placeholder="tu primer apellido" value="{{ old('first_lastname', $usuario->first_lastname) }}" />
                        
                        @error('first_lastname')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="second_lastname" class="block mb-2 text-sm font-medium text-gray-900 ">Segundo apellido</label>
                        <x-input-text id="second_lastname" name="second_lastname" type="text" class="block mt-1 w-full" placeholder="tu segundo apellido" value="{{ old('second_lastname', $usuario->second_lastname) }}" />
                       
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <x-input-text id="email" name="email" type="email" class="block mt-1 w-full @error('email') is-invalid @enderror" placeholder="tu email de registro" value="{{ old('email', $usuario->email) }}"/>

                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 ">Rol</label>
                        <select id="rol" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                            <option value="">Selecciona un rol</option>
                            @foreach ($rols as $rol)
                                <option value="{{ $rol->id }}" @if (old('rol', $usuario->rol_id) == $rol->id) selected @endif >{{ $rol->name }}</option>
                            @endforeach

                        </select>
                        @error('rol')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <label for="sucursal" class="block mb-2 text-sm font-medium text-gray-900 ">Sucursal</label>
                        <select id="sucursal" name="sucursal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                            <option value="">Selecciona una sucursal</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}" @if (old('sucursal', $usuario->sucursal_id) == $sucursal->id) selected @endif>{{ $sucursal->name }}</option>
                            @endforeach

                        </select>

                        @error('sucursal')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <x-input-text id="password" name="password" type="password" class="block mt-1 w-full @error('password') is-invalid @enderror" placeholder="tu password de registro" value="{{ old('password') }}"/>

                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Repetir Password</label>
                        <x-input-text id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full @error('password_confirmation') is-invalid @enderror" placeholder="repite tu password" value="{{ old('password_confirmation') }}" />

                        
                    </div>
                   
                   
                </div>
                <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
    </section>

@endsection


