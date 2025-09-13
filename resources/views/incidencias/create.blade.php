@extends('layouts.app')

@section('contenido')

    <h1 class="text-2xl text-blue-950 font-medium">Nueva Incidencia</h1>

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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Nueva Incidencia</span>
                </div>
            </li>
        </ol>
    </nav>

    <section class="bg-white mt-6 p-3 max-w-3xl border border-gray-300">
        @if (session()->has('mensaje'))
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="max-w-2xl">
            <form action="{{ route('incidencias.store') }}" method="POST">

                @csrf

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Titulo</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Titulo de la incidencia" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 ">Prioridad</label>
                        <select id="priority" name="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                            <option value="">Selecciona una prioridad</option>
                            @foreach ($prioridades as $prioridad)
                                <option value="{{ $prioridad->id }}">{{ $prioridad->name }}</option>
                            @endforeach

                        </select>
                        @error('priority')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Categoria</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                            <option value="">Selecciona una category</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                
                            @endforeach

                        </select>
                        @error('category')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    
                    <div class="sm:col-span-2">
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripcion</label>
                        <x-trix-input id="descripcion" name="descripcion" />
                        {{-- <textarea id="descripcion" name="descripcion" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Tu descripcion aqui" value="{{ old('descripcion') }}"></textarea> --}}

                        @error('descripcion')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
    </section>

    @push('scripts')
        
    @endpush

@endsection









