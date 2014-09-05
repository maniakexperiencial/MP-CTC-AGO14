@if ($paginator->getLastPage() > 1)

<ul class="number_page">
    <li><a href="{{ $paginator->getUrl(1) }}" class="item{{ ($paginator->getCurrentPage() == 1) ? ' disabled' : '' }}"><img src="{{ URL::to('/img/back.png') }}" ></a></li>
    @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
    <a href="{{ $paginator->getUrl($i) }}" class="item{{ ($paginator->getCurrentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
    @endfor
    <li><a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class="item{{ ($paginator->getCurrentPage() == $paginator->getLastPage()) ? ' disabled' : '' }}"><img src="{{ URL::to('/img/next.png') }}" ></a></li>
</ul>

@endif
