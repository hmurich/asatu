<ul class="admin-nav">
    <li class='{{ (Request::is('cabinet/order/list') ? "active" : null) }}'>
        <a href="{{ action('Restoran\OrderController@getList') }}">ОБРАБОТКА ЗАКАЗА</a>
    </li>
    <li class='{{ (Request::is('cabinet/review/list') ? "active" : null) }}'>
        <a href="{{ action('Restoran\ReviewController@getList') }}">ОТЗЫВЫ</a>
    </li>
    <li class='{{ (Request::is('cabinet/menu/list') ? "active" : null) }}'>
        <a href="{{ action('Restoran\MenuController@getList') }}">БЛЮДА</a>
    </li>
    <li >
        <a href="{{ action('Restoran\RestoranController@getOpen') }}">
            @if ($restoran->is_open)
                ПРИОСТАНОВИТЬ
            @else
                ОТКРЫТЬ
            @endif
        </a>
    </li>
    <li class='{{ (Request::is('cabinet/history/list') ? "active" : null) }}'>
        <a href="{{ action('Restoran\HistoryController@getList') }}">ИСТОРИЯ</a>
    </li>
</ul>
