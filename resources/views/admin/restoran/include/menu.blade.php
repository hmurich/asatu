<div class="side-bar-item">
    <div class="side-bar-box_info-edit">
        @if (isset($item) && $item)
            <a href="{{ action("Admin\Restoran\EditController@getItem", $item->id) }}" class="side-bar-box__link">Инфо</a>
            <a href="{{ action("Admin\Restoran\MenuController@getItem", $item->id) }}" class="side-bar-box__link">Меню</a>
            <a href="{{ action("Admin\Restoran\LocationController@getList", $item->id) }}" class="side-bar-box__link">Зона доставки</a>
            <!-- <a href="{{ action("Admin\Restoran\ReviewController@getList", $item->id) }}" class="side-bar-box__link">Отзывы</a> -->
        @else
            <a href="{{ action("Admin\Restoran\EditController@getItem") }}" class="side-bar-box__link">Инфо</a>
        @endif
    </div>
</div>
