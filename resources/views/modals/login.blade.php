{{--<div id="modal_login" class="modal modal_div"> <!-- скрытый див с уникальным id = modal1 -->--}}
      {{--<span class="modal_close"></span>--}}
     {{--<div class="modal_div__mask">--}}
   {{----}}


    {{--<form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" >--}}
        {{--<div class="form-modal">--}}
            {{--<img src="/img/modal-logo.png">--}}
            {{--<div class="form-modal-min-title">--}}
                {{--Вход в личный кабинет--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="email" name="email" required="required" placeholder="Введите E-mail..." class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="password" name="password" required="required" placeholder="Введите пароль..." class="modal-input ">--}}
            {{--</div>--}}
            {{--<button class="modal-button button">--}}
               {{--Войти--}}
            {{--</button>--}}
            {{--<a href="#modal_forgot_pass" class="modal-link open_modal">--}}
                {{--Забыли пароль?--}}
            {{--</a>--}}

            {{--<a href="#modal_registr" class="modal-link open_modal">--}}
                {{--Зарегистрироваться--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--@if (Session::has('login_error'))--}}
            {{--<div class="asdas">--}}
                {{--Не удается войти. <br />--}}
                {{--Пожалуйста, проверьте правильность написания логина и пароля.--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{--<input type="hidden" name="login" value="1">--}}
        {{----}}
    {{--</form>--}}
       {{--</div>--}}
{{--</div>--}}

<!-- Login modal -->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" class="popup-form">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" name="email" class="form-control form-white" placeholder="Введите E-mail...">
                <input type="text" name="password" class="form-control form-white" placeholder="Введите пароль...">
                <div class="text-left">
                    <a href="#modal_forgot_pass" class="modal-link open_modal">
                        Забыли пароль?
                    </a>
                </div>
                @if (Session::has('login_error'))
                    <div class="asdas">
                        Не удается войти. <br />
                        Пожалуйста, проверьте правильность написания логина и пароля.
                    </div>
                @endif
                <button type="submit" class="btn btn-submit">Войти</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="login" value="1">
            </form>
        </div>
    </div>
</div><!-- End modal -->
