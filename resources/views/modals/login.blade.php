<div id="modal_login" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>
    <div class="modal-title">Войти в личный кабинет ?</div>

    <form  action="/login" method="post" >
        <div class="form-modal">
            <div class="modal-input__container ">
                <input type="email" name="email" required="required" placeholder="Введите E-mail..." class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="password" name="password" required="required" placeholder="Введите пароль..." class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="re_password" name="re_password" required="required" placeholder="Подтвердите пароль..." class="modal-input ">
            </div>
            <a href="#modal_forgot_pass" class="modal-link open_modal">
                Забыли пароль?
            </a>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-button-container">
            <button class="modal-button button">
                войти в личный кабинет
            </button>
        </div>
    </form>
</div>
