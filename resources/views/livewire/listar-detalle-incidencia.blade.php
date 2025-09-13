<div>
    <input type="hidden" wire:model='incidenciaId'>
    @foreach ($registros as $registro)
        <div class="border border-gray-300 p-3 bg-white mt-3 rounded">
            <p class="font-medium capitalize">{{ $registro->user->name . " " . $registro->user->first_lastname}}</p>
            <p class="text-gray-500 text-sm">{{ $registro->user->rol->name }}</p>
            <div class="flex items-center gap-8">
                <p class="text-gray-500 text-sm">{{ fecha($registro->created_at)  }}</p>
                <p>{{ $registro->description }}</p>
            </div>
        </div>
        
    @endforeach
</div>
