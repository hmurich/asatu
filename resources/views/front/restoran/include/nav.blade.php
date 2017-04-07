<ul class="admin-nav">
    <li class='{{ (Request::is('restoran/menu/list/'.$restoran->id) ? "active" : null) }}'>
        <a href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}">{{ $translator->getTrans('menu_href') }}</a>
    </li>
    <li class='{{ (Request::is('restoran/review/list/'.$restoran->id) ? "active" : null) }}'>
        <a href="{{ action('Front\Restoran\ReviewController@getList', $restoran->id) }}">{{ $translator->getTrans('review_href') }}</a>
    </li>
</ul>
