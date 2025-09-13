@extends('layouts.app')

@section('contenido')

    <h1 class="text-2xl text-blue-950 font-medium mb-3">Consultar Sucursales</h1>

    <a href="{{ route('sucursales.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 focus:outline-none">Nueva Sucursal</a> 
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
                        Numero Telefono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Calle
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Numero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Colonia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ciudad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sucursales as $sucursal)
                    <tr class="bg-white">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->id }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->name }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->phone_number }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->street }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->number }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->neighborhood }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $sucursal->city }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex gap-3">
                            <a href="{{ route('sucursales.edit', $sucursal) }}" class="font-medium text-indigo-600 cursor-pointer hover:underline">Editar</a>
                           
                            <form action="{{ route('sucursales.destroy', $sucursal) }}" method="post">
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
        {{ $sucursales->links('vendor.pagination.tailwind') }}
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


