<ul class="admin-nav">
    <li>
        <a href="">заказы</a>
    </li>
    <li><a href="">рестораны</a></li>
    <li><a href="">промо коды</a></li>
    <li><a href="">трекинг</a></li>
    <li><a href="">клиенты</a></li>
    <li><a href="{{ action('Admin\PageController@getIndex') }}">Cтраницы</a></li>
    <li><a href="{{ action('Admin\StaticPageController@getIndex') }}">Стат. страницы</a></li>
    <li><a href="{{ action('Admin\ModeratorController@getIndex') }}">Модераторы</a></li>
    <li><a href="{{ action('Admin\SiteSettingController@getIndex') }}">Настройки</a></li>
</ul>
