@props(['disabled' => false])

{{-- merge sirve para concatenar mas clases es decir las clases que ya tiene por defecto mas las clases que agregue el usuario --}}
<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 p-2']) }}>