@extends('layouts.app')

@section('contenido')

    <h1 class="text-2xl text-blue-950 font-medium">Nuevo Usuario</h1>

    <nav class="flex my-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Nuevo Usuario</span>
                </div>
            </li>
        </ol>
    </nav>


    <section class="bg-white mt-6">
        <div class="max-w-2xl">
            <form action="{{ route('registro.store') }}" method="POST">
                @csrf

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre</label>
                        <x-input-text id="nombre" name="nombre" type="nombre" class="block mt-1 w-full @error('nombre') @enderror" placeholder="tu nombre"/>
                        
                        @error('nombre')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <x-input-text id="email" name="email" type="email" class="block mt-1 w-full @error('email') is-invalid @enderror" placeholder="tu email de registro"/>

                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="sm:col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <x-input-text id="password" name="password" type="password" class="block mt-1 w-full @error('password') is-invalid @enderror" placeholder="tu password de registro"/>

                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="sm:col-span-2">
                        <label for="repetir_password" class="block mb-2 text-sm font-medium text-gray-900 ">Repetir Password</label>
                        <x-input-text id="repetir_password" name="repetir_password" type="password" class="block mt-1 w-full @error('repetir_password') is-invalid @enderror" placeholder="repite tu password"/>

                        @error('repetir_password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                   
                   
                </div>
                <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
    </section>

@endsection


