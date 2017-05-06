<div id="modal_registr" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
   <span class="modal_close"></span>
   <div class="modal_div__mask">
   

    <form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" >
        <div class="form-modal">
            <img src="/img/modal-logo.png">
            <div class="form-modal-min-title">
               Зарегистрироваться
            </div>
            <div class="modal-input__container ">
                <input type="email" name="email" required="required" placeholder="Введите E-mail..." class="modal-input js_check_new_email">
                <span class='js_check_new_email_message' style="display:none">Этот почтовый адресс уже используеться</span>
            </div>
            <div class="modal-input__container ">
                <input type="password" name="password" required="required" placeholder="Введите пароль..." class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="password" name="re_password" required="required" placeholder="Подтвердите пароль..." class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="text" name="name" required="required" placeholder="Введите имя..." class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="tel" name="phone" required="required" placeholder="Введите телефон..." class="modal-input ">
            </div>
            <button class="modal-button button">
                зарегистрироваться
            </button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
    </form>
    </div>
</div>
