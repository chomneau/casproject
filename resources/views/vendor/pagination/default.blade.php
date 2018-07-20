{{--<link href="{{ asset('css/buttonStyle.css') }}" rel="stylesheet">--}}
{{--<script type="text/javascript" src="{{URL::asset('js/buttonStyle.js')}}"></script>--}}
@if ($paginator->hasPages())
    <ul class="pagination pagination-xs">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" style="color: #0BB9BF"><span>
                    prev
                    {{--<i class="fa fa-chevron-circle-left" aria-hidden="true" style="color: #0BB9BF"></i>--}}
                </span>
            </li>
        @else
            <li class="page-link" >
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <span style="color: #0e90d2">
                    prev
                    </span>
                    {{--<i class="fa fa-chevron-circle-left" aria-hidden="true" style="color: #0BB9BF"></i>--}}
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="color: #0e90d2">
                    {{--<i class="fa fa-chevron-circle-right" aria-hidden="true" style="color: #0BB9BF"></i>--}}
                    Next
                </a>
            </li>
        @else
            <li class="disabled"><span>
                            Next
                    {{--<i class="fa fa-chevron-circle-right" aria-hidden="true" style="color: #0BB9BF"></i>--}}
                </span>
            </li>
        @endif
    </ul>
@endif


