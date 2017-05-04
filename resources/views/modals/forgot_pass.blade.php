<div id="modal_forgot_pass" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>

    <form  action="/forgot-pass" method="post" >
        <div class="form-modal">
            <img src="/img/modal-logo.png">
            <div class="form-modal-min-title">
             Забыли пароль?
            </div>
            <div class="modal-input__container ">
                <input type="email" name="email" required="required" placeholder="Введите E-mail..." class="modal-input ">
            </div>
            <button class="modal-button button">
                получить пароль
            </button>
        </div>
      
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
