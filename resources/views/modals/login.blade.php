<div id="modal_login" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
      <span class="modal_close"></span>
     <div class="modal_div__mask">
   


    <form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" >
        <div class="form-modal">
            <img src="/img/modal-logo.png">
            <div class="form-modal-min-title">
                Вход в личный кабинет
            </div>
            <div class="modal-input__container ">
                <input type="email" name="email" required="required" placeholder="Введите E-mail..." class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="password" name="password" required="required" placeholder="Введите пароль..." class="modal-input ">
            </div>
            <button class="modal-button button">
               Войти
            </button>
            <a href="#modal_forgot_pass" class="modal-link open_modal">
                Забыли пароль?
            </a>

            <a href="#modal_registr" class="modal-link open_modal">
                Зарегистрироваться
            </a>
        </div>

        @if (Session::has('login_error'))
            <div class="asdas">
                Не удается войти. <br />
                Пожалуйста, проверьте правильность написания логина и пароля.
            </div>
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="login" value="1">
        
    </form>
       </div>
</div>
