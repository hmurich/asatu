<ul class="admin-nav">
    @if (Auth::user() && Auth::user()->type_id == 1)
        <li class='{{ (Request::is('adminka/menu-type') ? "active" : null) }}'>
            <a href="{{ action('Admin\MenuTypeController@getIndex') }}">Виды блюд</a>
        </li>
        <li class='{{ (Request::is('adminka/kitchen') ? "active" : null) }}'>
            <a href="{{ action('Admin\KitchenController@getIndex') }}">Кухни</a>
        </li>
        <li class='{{ (Request::is('adminka/city') ? "active" : null) }}'>
            <a href="{{ action('Admin\CityController@getIndex') }}">Города</a>
        </li>
        <li class='{{ (Request::is('adminka/page') ? "active" : null) }}'>
            <a href="{{ action('Admin\PageController@getIndex') }}">Cтраницы</a>
        </li>
        <li class='{{ (Request::is('adminka/static-page') ? "active" : null) }}'>
            <a href="{{ action('Admin\StaticPageController@getIndex') }}">Стат. страницы</a>
        </li>
        <li class='{{ (Request::is('adminka/moderator') ? "active" : null) }}'>
            <a href="{{ action('Admin\ModeratorController@getIndex') }}">Модераторы</a>
        </li>
        <li class='{{ (Request::is('adminka/translator') ? "active" : null) }}'>
            <a href="{{ action('Admin\TranslateController@getIndex') }}">Переводы</a>
        </li>
        <li class='{{ (Request::is('adminka/site-setting') ? "active" : null) }}'>
            <a href="{{ action('Admin\SiteSettingController@getIndex') }}">Настройки</a>
        </li>
    @elseif (Auth::user() && Auth::user()->type_id == 2)
        <li class='{{ (Request::is('adminka/order/list') ? "active" : null) }}'>
            <a href="{{ action('Admin\OrderController@getList') }}">заказы</a>
        </li>
        <li class='{{ (Request::is('adminka/restoran') ? "active" : null) }}'>
            <a href="{{ action('Admin\RestoranController@getIndex') }}">рестораны</a>
        </li>
        <li class='{{ (Request::is('adminka/promo/list') ? "active" : null) }}'>
            <a href="{{ action('Admin\PromoController@getList') }}">промо коды</a>
        </li>
        <li class='{{ (Request::is('adminka/history/list') ? "active" : null) }}'>
            <a href="{{ action('Admin\HistoryController@getList') }}">трекинг</a>
        </li>
        <li class='{{ (Request::is('adminka/client/list') ? "active" : null) }}'>
            <a href="{{ action('Admin\ClientController@getList') }}">клиенты</a>
        </li>
        <li class='{{ (Request::is('adminka/registr-restoran/list') ? "active" : null) }}'>
            <a href="{{ action('Admin\RegistrRestoranController@getList') }}">заявки</a>
        </li>
        <li class='{{ (Request::is('moderator/cabinet') ? "active" : null) }}'>
            <a href="{{ action('Moderator\CabinetController@getCabinet') }}">Кабинет</a>
        </li>
    @endif
</ul>
