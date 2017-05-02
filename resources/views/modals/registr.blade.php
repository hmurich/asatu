<div id="modal_registr" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>
    <div class="modal-title">Зарегистрироваться</div>

    <form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" >
        <div class="form-modal">
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
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-button-container">
            <button class="modal-button button">
                зарегистрироваться
            </button>
        </div>
    </form>
</div>
