{{--<div class="header-top-line">--}}
    {{--<div class="header-top-line__inner">--}}
        {{--<a href="/" class="header-logo">--}}
            {{--<img src="/img/logo.png" alt="">--}}
        {{--</a>--}}
        {{--<div class="header-right">  --}}
            {{--<div class="header-lang">--}}
                {{--<a href="/kz" class="header-lang__item {{ session()->has('lang_id') && session()->get('lang_id') == 'kz' ? 'active' : null }}">--}}
                    {{--Каз--}}
                {{--</a>--}}
                {{--<a href="/ru" class="header-lang__item {{ !session()->has('lang_id') || session()->get('lang_id') == 'ru' ? 'active' : null }}">--}}
                    {{--Рус--}}
                {{--</a>--}}
                {{--<a href="/en" class="header-lang__item {{ session()->has('lang_id') && session()->get('lang_id') == 'en' ? 'active' : null }}">--}}
                    {{--Eng--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="call-center">--}}
                {{--Call Center: +7 (7172) <span>40 38 40</span>--}}
            {{--</div>            --}}
        {{--</div>--}}
        {{--<div class="header-slogan">--}}
			{{--{{ $translator->getTrans('one_service_food') }}--}}
		{{--</div>--}}
        {{--<div class="header-enter">--}}
            {{--@if (Auth::guest())--}}
                {{--<a href="#modal_registr" class="header-enter__button-reg open_modal">{{ $translator->getTrans('registr_button') }}</a>--}}
                {{--<a href="#modal_login" class="header-enter__button-enter open_modal js_open_modal_login">{{ $translator->getTrans('enter_button') }}</a>--}}
            {{--@else--}}
                {{--@if (Auth::user()->type_id == 1)--}}
                    {{--<a href="{{ action('Admin\IndexController@getIndex') }}" class="header-enter__button-reg ">Личный кабинет</a>--}}
                {{--@elseif (Auth::user()->type_id == 2)--}}
                    {{--<a href="{{ action('Moderator\CabinetController@getCabinet') }}" class="header-enter__button-reg ">Личный кабинет</a>--}}
                {{--@elseif (Auth::user()->type_id == 3)--}}
                    {{--<a href="{{ action('Restoran\OrderController@getList') }}" class="header-enter__button-reg ">Личный кабинет</a>--}}
                {{--@elseif (Auth::user()->type_id == 4)--}}
                    {{--<a href="{{ action('Customer\CabinetController@getCabinet') }}" class="header-enter__button-reg ">Личный кабинет</a>--}}
                {{--@endif--}}

                {{--<a href="{{ action('Auth\AuthController@getLogout') }}" class="header-enter__button-enter ">Выйти</a>--}}

            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="container-fluid">
    <div class="row">
        <div class="col--md-4 col-sm-4 col-xs-4">
            <a href="index.html" id="logo">
                <img src="/img/logo.png" width="150" height="97" alt="" data-retina="true" class="hidden-xs">
                <img src="/img/logo_mobile.png" width="59" height="" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
            </a>
        </div>
        <nav class="col--md-8 col-sm-8 col-xs-8">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="/img/logo.png" width="150" height="97" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                <ul>
                    <li class="submenu">
                        <a href="/" class="show-submenu">Главная<i class="icon-down-open-mini"></i></a>
                    </li>
                    <li>
                        <a>Call Center: +7 (7172) <span>40 38 40</span></a>
                    </li>
                    <li><a href="/kz" class="header-lang__item {{ session()->has('lang_id') && session()->get('lang_id') == 'kz' ? 'active' : null }}">
                    Каз
                    </a></li>
                    <li><a href="/ru" class="header-lang__item {{ !session()->has('lang_id') || session()->get('lang_id') == 'ru' ? 'active' : null }}">
                    Рус
                    </a></li>
                    <li><a href="/en" class="header-lang__item {{ session()->has('lang_id') && session()->get('lang_id') == 'en' ? 'active' : null }}">
                    Eng
                    </a></li>
                    @if (Auth::guest())
                        <li><a href="#0" data-toggle="modal" data-target="#modal_login">{{ $translator->getTrans('enter_button') }}</a></li>
                        <li><a href="#0" data-toggle="modal" data-target="#modal_registr">{{ $translator->getTrans('registr_button') }}</a></li>
                    @else
                        @if (Auth::user()->type_id == 1)
                                <li><a href="{{ action('Admin\IndexController@getIndex') }}" class="header-enter__button-reg ">Личный кабинет</a></li>
                        @elseif (Auth::user()->type_id == 2)
                            <li><a href="{{ action('Moderator\CabinetController@getCabinet') }}" class="header-enter__button-reg ">Личный кабинет</a></li>
                        @elseif (Auth::user()->type_id == 3)
                            <li><a href="{{ action('Restoran\OrderController@getList') }}" class="header-enter__button-reg ">Личный кабинет</a></li>
                        @elseif (Auth::user()->type_id == 4)
                            <li><a href="{{ action('Customer\CabinetController@getCabinet') }}" class="header-enter__button-reg ">Личный кабинет</a></li>
                        @endif
                        <li><a href="{{ action('Auth\AuthController@getLogout') }}" class="header-enter__button-enter ">Выйти</a></li>
                    @endif
                </ul>
            </div><!-- End main-menu -->
        </nav>
    </div><!-- End row -->
</div><!-- End container -->
