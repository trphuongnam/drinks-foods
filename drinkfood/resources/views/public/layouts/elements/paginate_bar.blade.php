@if ($paginator->total() > 0)
@php
    $total_page = ceil($paginator->total()/$paginator->perPage());
@endphp
<div class="pagination_bar">
    <ul class="pagination">
        
        @if ($paginator->currentPage() != 1)
            <li><a href="{{$paginator->previousPageUrl()}}">{{ trans('message.prev') }}</a></li>
        @endif

        @for ($i = 1; $i <= $total_page; $i++)
            @if ($i == $paginator->currentPage())
                <li><a href="{{url()->current()}}?page={{$i}}" class="active">{{$i}}</a></li>
            @else
                <li><a href="{{url()->current()}}?page={{$i}}">{{$i}}</a></li>
            @endif
        @endfor  
        
        @if ($paginator->currentPage() != $total_page)
            <li><a href="{{$paginator->nextPageUrl()}}">{{ trans('message.next') }}</a></li>
        @endif
    </ul>
</div>
@endif
