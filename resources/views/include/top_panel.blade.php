<div class="header-top-line">
    <div class="header-top-line__inner">
        <a href="" class="header-logo">
            <img src="/img/logo.png" alt="">
        </a>
        <div class="header-lang">
            <a href="/kz" class="header-lang__item">
                Каз
            </a>
            <a href="/ru" class="header-lang__item active">
                Рус
            </a>
            <a href="/en" class="header-lang__item">
                Eng
            </a>
        </div>
        @if (Auth::guest())
            <a href="#modal_login" class="header-enter open_modal">
                Войти / Зарегистрироваться
            </a>
        @else
            <a href="{{ action('Auth\AuthController@getLogout') }}" class="header-enter">
                Выйти
            </a>
        @endif

    </div>
</div>
