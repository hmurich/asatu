<ul class="admin-nav">
    <li>
        <a href="{{ action('Admin\OrderController@getList') }}">заказы</a>
    </li>
    <li><a href="{{ action('Admin\RestoranController@getIndex') }}">рестораны</a></li>
    <li><a href="{{ action('Admin\PromoController@getList') }}">промо коды</a></li>
    <li><a href="{{ action('Admin\HistoryController@getList') }}">трекинг</a></li>
    <li><a href="{{ action('Admin\ClientController@getList') }}">клиенты</a></li>

    <li><a href="{{ action('Admin\MenuTypeController@getIndex') }}">Виды блюд</a></li>
    <li><a href="{{ action('Admin\KitchenController@getIndex') }}">Кухни</a></li>
    <li><a href="{{ action('Admin\CityController@getIndex') }}">Города</a></li>
    <li><a href="{{ action('Admin\PageController@getIndex') }}">Cтраницы</a></li>
    <li><a href="{{ action('Admin\StaticPageController@getIndex') }}">Стат. страницы</a></li>
    <li><a href="{{ action('Admin\ModeratorController@getIndex') }}">Модераторы</a></li>
    <li><a href="{{ action('Admin\TranslateController@getIndex') }}">Переводы</a></li>
    <li><a href="{{ action('Admin\SiteSettingController@getIndex') }}">Настройки</a></li>
</ul>
