@if ($paginator->hasPages())
    {{-- <nav>
        <ul class="pagination"> --}}
            {{-- Previous Page Link --}}
            {{-- @if ($paginator->onFirstPage())
                <li class="page-item disabled"  aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif --}}

            {{-- Pagination Elements --}}
            {{-- @foreach ($elements as $element) --}}
                {{-- "Three Dots" Separator --}}
                {{-- @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif --}}

                {{-- Array Of Links --}}
                {{-- @if (is_array($element)) --}}
                    {{-- @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif --}}
            {{-- @endforeach --}}

            {{-- Next Page Link --}}
            {{-- @if ($paginator->hasMorePages())
                <li class="page-item " >
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul> --}}
    {{-- </nav> --}}

    {{--  --}}

<div class="pagination_block">
    <ul>
        @if ($paginator->onFirstPage())
                <li>
                    <a href="#" class="prev fade" aria-label="@lang('pagination.previous')"><i class="icofont-arrow-left"></i> Prev</a>
                </li>
        @else
            
            <li>
                <a  href="{{ $paginator->previousPageUrl() }}" class="prev" aria-label="@lang('pagination.previous')"><i class="icofont-arrow-left"></i> Prev</a>
            </li>
        @endif

        
        @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        {{-- <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li> --}}

                        <li><a href="#" class="page-item disabled" aria-disabled="true"><i class="icofont-arrow-left"></i> {{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> --}}

                                <li><a href="#" class="active" aria-current="page">{{ $page }}</a></li>
                            @else
                                {{-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> --}}

                                <li><a href="{{ $url }}" class="page-item" aria-current="page">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

    
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    {{-- <li class="page-item " >
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li> --}}

                    <li><a href="{{ $paginator->nextPageUrl() }}" class="next" rel="next" >Next <i class="icofont-arrow-right"></i></a></li>
                @else
                    {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li> --}}
                    <li><a  class="next fade" rel="next" >Next <i class="icofont-arrow-right"></i></a></li>
                @endif

        

                {{-- <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li> --}}
                {{-- <li><a href="#" class="next">Next <i class="icofont-arrow-right"></i></a></li> --}}
    </ul>
</div>
  
        
@endif
