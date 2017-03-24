<ul class="admin-nav">
    <li>
        <a href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}">МЕНЮ</a>
    </li>
    <li>
        <a href="{{ action('Front\Restoran\ReviewController@getList', $restoran->id) }}">ОТЗЫВЫ</a>
    </li>
</ul>
