@php
    /**@var $ads*/
    $pages = [];
    $pages['value'] = $ads;
@endphp


@section('pages')
    <nav aria-label="Page navigation example">
        <ul class="pagination">

        @if($pages['value']->currentPage() > 1 )
            <li class="page-item"><a class="page-link" href="{{ $pages['value']->previousPageUrl() }}"> Prev </a></li>
        @endif

        @foreach($pages['value']->getUrlRange($pages['value']->currentPage()-1 , $pages['value']->currentPage()+1) as $num => $link)


            @if($loop->first && $num >= 2)
                <li class="page-item"><a class="page-link" href="{{ $pages['value']->url(1) }}"> {{ 1 }} </a></li>
            @endif

            @if($num >= 3 && $loop->first)
                ...
            @endif


            @if($num > 0 && $num <= $pages['value']->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $link }}"> {{ $num }} </a></li>
            @endif


            @if($num == 2 && $loop->last)
                <li class="page-item"><a class="page-link" href="{{ $pages['value']->url($pages['value']->currentPage() + 2) }}"> {{ $pages['value']->currentPage() + 2 }} </a></li>
            @endif

            @if($num+1 < $pages['value']->lastPage() && $loop->last)
                ...
            @endif
            @if($loop->last && $num < $pages['value']->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $pages['value']->url($pages['value']->lastPage()) }}"> {{ $pages['value']->lastPage()}} </a></li>
            @endif

        @endforeach


        @if($pages['value']->currentPage() !== $pages['value']->lastPage())
            <li class="page-item"><a class="page-link" href="{{ $pages['value']->nextPageUrl() }}"> Next </a></li>
        @endif


        </ul>
    </nav>

@endsection
