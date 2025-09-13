@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-4">
        <ul class="inline-flex items-center -space-x-px text-sm">
            {{-- Botón "Anterior" --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-400 bg-white border border-gray-300 rounded-l-lg cursor-not-allowed">Anterior</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 leading-tight text-blue-600 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100">Anterior</a>
                </li>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="px-3 py-2 leading-tight text-white bg-blue-600 border border-blue-600">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-3 py-2 leading-tight text-blue-600 bg-white border border-gray-300 hover:bg-gray-100">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botón "Siguiente" --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 leading-tight text-blue-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100">Siguiente</a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-400 bg-white border border-gray-300 rounded-r-lg cursor-not-allowed">Siguiente</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
