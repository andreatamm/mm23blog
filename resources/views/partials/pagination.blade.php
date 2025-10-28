@if ($paginator->hasPages())
        <div class="join my-2 w-full justify-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-disabled" aria-hidden="true" aria-disabled="true" aria-label="@lang('pagination.previous')">«</button>
            @else
                <a class="join-item btn" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="join-item btn btn-disabled" aria-disabled="true">{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="join-item btn btn-active" aria-current="page">{{ $page }}</button>
                        @else
                            <a class="join-item btn" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="join-item btn" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">»</a>
            @else
                <button class="join-item btn btn-disabled" aria-hidden="true" aria-disabled="true" aria-label="@lang('pagination.next')">»</button>
            @endif
        </div>
@endif
