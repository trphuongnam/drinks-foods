
@if ($paginator->total() > 1)
@php
    $total_page = ceil($paginator->total()/$paginator->perpage());
@endphp
<nav class="card-footer">
    <ul class="pagination">
        @if ($paginator->currentPage() != 1)
        <li class="page-item">
            <a class="page-link" href="{{$paginator->previousPageUrl().addParamsPaginateCategory()}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        @endif
        @for ($i = 1; $i <= $total_page; $i++)
            @if($i == $paginator->currentPage())
                <li class="page-item"><a class="page-link active" href="{{url()->current()}}?page={{$i.addParamsPaginateCategory()}}">{{$i}}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{url()->current()}}?page={{$i.addParamsPaginateCategory()}}">{{$i}}</a></li>
            @endif
        @endfor
        @if ($paginator->currentPage() != $total_page)
        <li class="page-item">
            <a class="page-link" href="{{$paginator->nextPageUrl().addParamsPaginateCategory()}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif