@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <button class="join-item btn btn-sm btn-disabled" disabled>&laquo;</button>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-sm">&laquo;</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <button class="join-item btn btn-sm btn-disabled" disabled>{{ $element }}</button>
        @endif

        {{-- Array Of Links --}}
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

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-sm">&raquo;</a>
    @else
        <button class="join-item btn btn-sm btn-disabled" disabled>&raquo;</button>
    @endif
@endif
