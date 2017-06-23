{{--<div id="modal_registr" class="modal modal_div"> <!-- скрытый див с уникальным id = modal1 -->--}}
   {{--<span class="modal_close"></span>--}}
   {{--<div class="modal_div__mask">--}}
   {{----}}

    {{--<form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" >--}}
        {{--<div class="form-modal">--}}
            {{--<img src="/img/modal-logo.png">--}}
            {{--<div class="form-modal-min-title">--}}
               {{--Зарегистрироваться--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="email" name="email" required="required" placeholder="Введите E-mail..." class="modal-input js_check_new_email">--}}
                {{--<span class='js_check_new_email_message' style="display:none">Этот почтовый адресс уже используеться</span>--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="password" name="password" required="required" placeholder="Введите пароль..." class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="password" name="re_password" required="required" placeholder="Подтвердите пароль..." class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="text" name="name" required="required" placeholder="Введите имя..." class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="tel" name="phone" required="required" placeholder="Введите телефон..." class="modal-input ">--}}
            {{--</div>--}}
            {{--<button class="modal-button button">--}}
                {{--зарегистрироваться--}}
            {{--</button>--}}
        {{--</div>--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{----}}
    {{--</form>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- Register modal -->
<div class="modal fade" id="modal_registr" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="{{ action('Auth\AuthController@postLogin') }}" class="popup-form" id="myRegister" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="email" required="required" class="form-control form-white js_check_new_email" name="email" placeholder="Введите E-mail...">
                <input type="password" required="required" class="form-control form-white" name="password" placeholder="Введите пароль...">
                <input type="text" required="required" class="form-control form-white" name="name" placeholder="Введите имя...">
                <input type="tel" required="required" class="form-control form-white" name="phone" placeholder="Введите телефон...">
                <div id="pass-info" class="clearfix"></div>
                {{--<div class="checkbox-holder text-left">--}}
                    {{--<div class="checkbox">--}}
                        {{--<input type="checkbox" value="accept_2" id="check_2" name="check_2" />--}}
                        {{--<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <button type="submit" class="btn btn-submit">зарегистрироваться</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</div><!-- End Register modal -->
