@extends('layouts.app')

@section('contenido')

    <h1 class="text-2xl text-blue-950 font-medium">Categorias</h1>

    <nav class="flex my-3 mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Consultar Categorias</span>
                </div>
            </li>
        </ol>
    </nav>

    <a href="{{ route('categorias.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 focus:outline-none ">Nueva Categoria</a>

        @if (session()->has('mensaje'))
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm" id="mensaje">
                {{ session('mensaje') }}
            </div>
        @endif

    <div class="relative overflow-x-auto rounded mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Nombre
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $category->id }}
                        </td>                        
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $category->name }}
                        </td>
                        
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex gap-5">

                            <a href="{{ route('categorias.edit', $category) }}" type="submit" class="font-medium text-indigo-600 cursor-pointer hover:underline">Editar</a>
                           
                            <form action="{{ route('categorias.destroy', $category) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="font-medium text-red-600 cursor-pointer  hover:underline">Eliminar</button>

                            </form>

                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6 flex justify-end">
        {{ $categories->links('vendor.pagination.tailwind') }}
    </div>

    @push('scripts')
        
        <script>
           const mensaje = document.querySelector('#mensaje')

            if (mensaje) {
                setTimeout(() => {
                    mensaje.remove()
                    console.log("eliminado...");
                }, 7000);
                
            }
           
        </script>


    @endpush

@endsection


