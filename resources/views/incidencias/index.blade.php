@extends('layouts.app')

@section('contenido')

    <h1 class="text-2xl text-blue-950 font-medium">Consultar Incidencias</h1>

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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Consultar Incidencia</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="relative overflow-x-auto rounded">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prioridad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Creacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Asignacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Soporte
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                    <tr class="bg-white">
                        
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $incidencia->id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $incidencia->category->name }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $incidencia->title }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {!! tipoPrioridad($incidencia->priority->name) !!}
                        </td>
                        <td class="px-6 py-4 font-medium  whitespace-nowrap">
                            
                            <span class="bg-green-200 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full ">{{ $incidencia->incident_status }}  </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            
                            {!! formatearFecha($incidencia->created_at) !!}
                        </td>
                       
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {!!  formatearFecha($incidencia->assignment_date) !!}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {!!  usuarioAsignado($incidencia->assignedUser?->name . " ". 	$incidencia->assignedUser?->first_lastname) !!}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('incidencias.show', $incidencia) }}" class="text-xs text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg px-5 py-2.5 me-2 mb-2 ">Ver</a>    
                        </td>
                        
                    </tr>

                @endforeach
             
            </tbody>
           
        </table>
    </div>
    <div class="mt-6 flex justify-end">
        {{ $incidencias->links('vendor.pagination.tailwind') }}
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden z-50">

        <!-- Fondo semitransparente -->
        <div class="backdrop absolute inset-0 bg-black opacity-50"></div>

        <!-- Caja del modal -->
        <div class="relative bg-white rounded-2xl shadow-lg w-96 z-10">
            <div class="flex justify-between border-b-1 border-gray-200 p-2 justify-items-center ">
                <div class="header-modal">
                    <h6>Asignar Usuario</h6>
                </div>
                <div class="">
                    <!-- Botón cerrar -->
                    <button id="closeModal" class=" text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                </div>

            </div>

            <!-- Contenido -->
            <form class="p-6" action="{{ route('user.store') }}" method="POST">
                @csrf
                @method('POST')

                <input type="hidden" id="id_incidencia" name="id">

                <div class="">
                    <label for="asignarUsuario" class="block mb-2 text-sm font-medium text-gray-900 ">Soporte</label>
                    <select id="asignarUsuario" name="asignarUsuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                        {{-- <option value="">Selecciona un rol</option> --}}
                    </select>
                    
        
                </div>
        
                <div class="flex justify-end gap-2 mt-2 p-2 ">
                    <a id="cancelModal" class="cursor-default px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800">
                        Aceptar
                    </button>
                </div>
            </form>
        </div>
    </div>

    
@endsection

@push('scripts')
    <script src="{{ asset('js/consultarIncidencias.js') }}"></script>
@endpush







