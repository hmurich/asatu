{{--<div id="registr_restoran" class="modal modal_div registar-zav">--}}
    {{--<span class="modal_close"></span>--}}
 {{--<div class="modal_div__mask">--}}
    {{--<form  action="{{ action('Front\IndexController@postRegistrRestoran') }}" method="post" >--}}
        {{--<div class="form-modal">--}}
            {{--<img src="/img/modal-logo.png">--}}
            {{--<div class="form-modal-min-title">--}}
              {{--Регистрация заведений--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="text" name="name" required="required" placeholder="Название ресторана:" class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="text" name="city" required="required" placeholder="Город: " class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="text" name="fio" required="required" placeholder="Имя:" class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="text" name="phone" required="required" placeholder="Телефон:" class="modal-input ">--}}
            {{--</div>--}}
            {{--<div class="modal-input__container ">--}}
                {{--<input type="text" name="email" required="required" placeholder="Электронная почта:" class="modal-input js_check_new_email">--}}
                {{--<span class='js_check_new_email_message' style="display:none">Этот почтовый адресс уже используеться</span>--}}
            {{--</div>--}}
             {{--<button class="modal-button button">--}}
                {{--Отправить--}}
            {{--</button>--}}
        {{--</div>--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{--</form>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="modal fade" id="registr_restoran" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="{{ action('Front\IndexController@postRegistrRestoran') }}" class="popup-form" id="myRegister" method="post">
                <div class="login_icon"><i class="icon_lock_alt"></i></div>
                <input type="text" required="required" class="form-control form-white" name="name" placeholder="Название ресторана:">
                <input type="text" required="required" class="form-control form-white" name="city" placeholder="Город: ">
                <input type="text" required="required" class="form-control form-white" name="fio" placeholder="Имя:">
                <input type="tel" required="required" class="form-control form-white" name="phone" placeholder="Телефон:">
                <div class="modal-input__container ">
                    <input type="text" name="email" required="required" placeholder="Электронная почта:" class="form-control form-white js_check_new_email">
                    <span class='js_check_new_email_message' style="display:none">Этот почтовый адресс уже используеться</span>
                </div>
                <div id="pass-info" class="clearfix"></div>
                {{--<div class="checkbox-holder text-left">--}}
                {{--<div class="checkbox">--}}
                {{--<input type="checkbox" value="accept_2" id="check_2" name="check_2" />--}}
                {{--<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>--}}
                {{--</div>--}}
                {{--</div>--}}
                <button type="submit" class="btn btn-submit">Отправить</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</div><!-- End Register modal -->
