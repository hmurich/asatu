<ul id="cat_nav" class="admin-nav">
    <li>
        <a class='{{ (Request::is('restoran/menu/list/'.$restoran->id) ? "active" : null) }}' href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}">{{ $translator->getTrans('menu_href') }}</a>
    </li>
    <li>
        <a class='{{ (Request::is('restoran/review/list/'.$restoran->id) ? "active" : null) }}' href="{{ action('Front\Restoran\ReviewController@getList', $restoran->id) }}">{{ $translator->getTrans('review_href') }}</a>
    </li>
</ul>
@if (isset($ar_menu_cat))
    <ul id="cat_nav" class="admin-nav">
        @foreach ($ar_menu_cat as $k =>$v)
            <li>
                <a href="#astaasdkalsjdkjahsd_{{ $v['cat_id'] }}">{{ $ar_menu_type[$v['cat_id']] }}</a>
            </li>
        @endforeach
    </ul>
@endif
