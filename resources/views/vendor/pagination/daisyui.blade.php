@if ($paginator->hasPages())
    <div class="flex justify-center mt-6">
        <div class="join">
            {{-- Eelmine leht --}}
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-sm btn-disabled">«</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-sm">«</a>
            @endif

            {{-- Lehe numbrid --}}
            @foreach ($elements as $element)
                {{-- Kolm punkti --}}
                @if (is_string($element))
                    <button class="join-item btn btn-sm btn-disabled">{{ $element }}</button>
                @endif

                {{-- Linkide massiiv --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="join-item btn btn-sm btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="join-item btn btn-sm">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Järgmine leht --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-sm">»</a>
            @else
                <button class="join-item btn btn-sm btn-disabled">»</button>
            @endif
        </div>
    </div>
@endif
