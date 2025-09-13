@extends('layouts.app')


@section('contenido')
    <h1 id="dashboard" class="text-2xl text-blue-950 font-medium mb-3">Dashboard</h1>
    <div class="flex justify-between">

        <div class="align-self-start w-80 p-6 bg-green-500 border border-gray-200 rounded-lg shadow-sm ">

            <h5 class="mb-2 text-5xl font-medium text-center tracking-tight text-white">{{ $total_incidencias }}</h5>
            <p class="font-medium text-center text-white">Total de Incidencias</p>
        </div>


        <div class="block w-80 p-6 bg-yellow-400 border border-gray-200 rounded-lg shadow-sm ">

            <h5 class="mb-2 text-5xl font-medium text-center tracking-tight text-white">{{ $incidencias_abiertas }}</h5>
            <p class="font-medium text-center text-white">Total de Incidencias abiertas</p>
        </div>
        <div class="block w-80 p-6 bg-red-500 border border-gray-200 rounded-lg shadow-sm ">

            <h5 class="mb-2 text-5xl font-medium text-center tracking-tight text-white">{{ $incidencias_cerradas }}</h5>
            <p class="font-medium text-center text-white">Total de Incidencias Cerradas</p>
        </div>

    </div>


    <div class="border border-gray-300 p-2 mt-5 rounded bg-white">
        <h6 class="text-center font-medium mt-3">¿Como podemos ayudarte?</h6>
        <div class="mt-3 flex justify-center">

            <form>   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" class="block w-750 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="busca por titulo de la incidencia" required />
                </div> 
                <ul class="text-xs text-gray-900 bg-gray-50 border-t-0 border-x-1 border-b-1 border-gray-300 rounded">
                    <li class="w-full px-4 py-2 border-b border-gray-200">Profile</li>
                    <li class="w-full px-4 py-2 border-b border-gray-200 ">Settings</li>
                    <li class="w-full px-4 py-2 border-b border-gray-200 ">Messages</li>
                    <li class="w-full px-4 py-2 rounded-b-lg">Download</li>
                </ul>
            </form>

        </div>
    
    
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush










