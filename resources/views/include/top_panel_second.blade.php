<div class="header-top-line">
    <div class="header-top-line__inner">
        <a href="/" class="header-logo">
            <img src="/img/logo.png" alt="">
        </a>
        <div class="header-right">  
            <div class="header-lang">
                <a href="/kz" class="header-lang__item {{ session()->has('lang_id') && session()->get('lang_id') == 'kz' ? 'active' : null }}">
                    Каз
                </a>
                <a href="/ru" class="header-lang__item {{ !session()->has('lang_id') || session()->get('lang_id') == 'ru' ? 'active' : null }}">
                    Рус
                </a>
                <a href="/en" class="header-lang__item {{ session()->has('lang_id') && session()->get('lang_id') == 'en' ? 'active' : null }}">
                    Eng
                </a>
            </div>
            <div class="call-center">
                Колл центр: +7 (7172) 40 38 40
            </div>            
        </div>
        <div class="header-slogan">
			{{ $translator->getTrans('one_service_food') }}
		</div>
        <div class="header-enter">
            @if (Auth::guest())
                <a href="#modal_registr" class="header-enter__button-reg open_modal">{{ $translator->getTrans('registr_button') }}</a>
                <a href="#modal_login" class="header-enter__button-enter open_modal js_open_modal_login">{{ $translator->getTrans('enter_button') }}</a>
            @else
                @if (Auth::user()->type_id == 1)
                    <a href="{{ action('Admin\IndexController@getIndex') }}" class="header-enter__button-reg ">Личный кабинет</a>
                @elseif (Auth::user()->type_id == 2)
                    <a href="{{ action('Moderator\CabinetController@getCabinet') }}" class="header-enter__button-reg ">Личный кабинет</a>
                @elseif (Auth::user()->type_id == 3)
                    <a href="{{ action('Restoran\OrderController@getList') }}" class="header-enter__button-reg ">Личный кабинет</a>
                @elseif (Auth::user()->type_id == 4)
                    <a href="{{ action('Customer\CabinetController@getCabinet') }}" class="header-enter__button-reg ">Личный кабинет</a>
                @endif

                <a href="{{ action('Auth\AuthController@getLogout') }}" class="header-enter__button-enter ">Выйти</a>

            @endif
        </div>
    </div>
</div>
