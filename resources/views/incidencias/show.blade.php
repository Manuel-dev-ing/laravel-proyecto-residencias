@extends('layouts.app')


@section('contenido')

    <h1 class="text-2xl font-medium">Detalle de la Incidencia - Nro.Incidencia - {{ $incidencia->id }}</h1>
    <div class="flex mt-1 items-center">
        @if ($incidencia->incident_status == 'Abierto')
            <span class="bg-green-200 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full ">
                {{ $incidencia->incident_status }} 
            </span>
            
        @else
            <span class="bg-red-200 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full ">
                {{ $incidencia->incident_status }} 
            </span>
            
        @endif
        <span class="bg-blue-200 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full ">
            {{ $incidencia->user->name . " " .  $incidencia->user->first_lastname }} 
        </span>
        <span class="m-0">

            {!! formatearFecha($incidencia->created_at) !!}
        </span>
    </div>
    <div class="bg-white border border-gray-200 mt-2 rounded p-3 grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="w-full">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Titulo</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('name', $incidencia->title) }}" readonly>
            
        </div>
        <div class="w-full">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Categoria</label>
            <input type="text" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('category', $incidencia->category->name) }}" readonly>
            
        </div>
        <div class="sm:col-span-2">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripcion</label>
            <x-trix-input id="descripcion" name="descripcion" disabled value="{!! $incidencia->description !!}"/>
            
           
            {{-- <textarea id="descripcion" name="descripcion" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" readonly></textarea> --}}

            
        </div>
    </div>
    
    <div>
        <livewire:listar-detalle-incidencia :incidenciaId="$incidencia->id" />
    </div>

    <div class="border border-gray-300 p-3 bg-white mt-3 rounded">
        <livewire:crear-detalle-incidencia :incidenciaId="$incidencia->id" />
    </div>


@endsection


