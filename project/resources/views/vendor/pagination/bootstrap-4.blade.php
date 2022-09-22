@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="btn btn-icon  btn-sm btn-light mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="ki ki-bold-arrow-back icon-xs"></i></a>
                </li>
            @else
                <li class="btn btn-icon  btn-sm btn-light mr-2 my-1 ">
                    <a class="ki ki-bold-arrow-back icon-xs" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 disabled" aria-disabled="true">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 btn-hover-primary active" aria-current="page">{{ $page }}</li>
                        @else
                            <li class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1"><a  href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="btn btn-icon btn-sm btn-light mr-2 my-1">
                    <a class="ki ki-bold-arrow-next icon-xs" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="ki ki-bold-arrow-next icon-xs" aria-hidden="true">&rsaquo;</i>
                </li>
            @endif
        </ul>
    </nav>
@endif
