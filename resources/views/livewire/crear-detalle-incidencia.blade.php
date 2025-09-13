<div>

    @if ($abierto)
        <h1 class="font-medium text-xl">Ingresar Informacion</h1>
        <form class="mt-3">

            <input type="hidden" wire:model='incidenciaId'>

            <div class="sm:col-span-2">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripcion</label>
                <textarea id="descripcion" wire:model="descripcion" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"></textarea>
            </div>

            <div class="flex mt-2">
                <button type="button" wire:click='guardar' class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Enviar</button>
                <button type="button" wire:click='cerrar' class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Cerrar</button>
            </div>

        </form>
        
    @endif
</div>
