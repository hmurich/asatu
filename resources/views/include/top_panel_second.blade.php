<div class="header-top-line">
    <div class="header-top-line__inner">
        <a href="/" class="header-logo">
            <img src="/img/logo.png" alt="">
        </a>
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
        <div class="header-slogan">
			{{ $translator->getTrans('one_service_food') }}
		</div>
        <div class="header-enter">
            @if (Auth::guest())
                <a href="#modal_registr" class="header-enter__button-reg open_modal">{{ $translator->getTrans('registr_button') }}</a>
                <a href="#modal_login" class="header-enter__button-enter open_modal">{{ $translator->getTrans('enter_button') }}</a>
            @else
                <a href="{{ action('Auth\AuthController@getLogout') }}" class=" header-enter__button-enter log-out">
                    {{ $translator->getTrans('user_cabinet') }}
                </a>
            @endif
        </div>
    </div>
</div>
