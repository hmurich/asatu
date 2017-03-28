<ul class="admin-nav">
    <li><a href="{{ action('Restoran\OrderController@getList') }}">ОБРАБОТКА ЗАКАЗА</a></li>
    <li><a href="{{ action('Restoran\ReviewController@getList') }}">ОТЗЫВЫ</a></li>
    <li><a href="{{ action('Restoran\MenuController@getList') }}">БЛЮДА</a></li>
    <li>
        <a href="{{ action('Restoran\RestoranController@getOpen') }}">
            @if ($restoran->is_open)
                ПРИОСТАНОВИТЬ
            @else
                ОТКРЫТЬ
            @endif
        </a>
    </li>
    <li><a href="{{ action('Restoran\HistoryController@getList') }}">ИСТОРИЯ</a></li>
</ul>
