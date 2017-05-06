<div id="registr_restoran" class="modal_div registar-zav">
    <span class="modal_close"></span>
 <div class="modal_div__mask">
    <form  action="{{ action('Front\IndexController@postRegistrRestoran') }}" method="post" >
        <div class="form-modal">
            <img src="/img/modal-logo.png">
            <div class="form-modal-min-title">
              Регистрация заведений
            </div>
            <div class="modal-input__container ">
                <input type="text" name="name" required="required" placeholder="Название ресторана:" class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="text" name="city" required="required" placeholder="Город: " class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="text" name="fio" required="required" placeholder="Имя:" class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="text" name="phone" required="required" placeholder="Телефон:" class="modal-input ">
            </div>
            <div class="modal-input__container ">
                <input type="text" name="email" required="required" placeholder="Электронная почта:" class="modal-input js_check_new_email">
                <span class='js_check_new_email_message' style="display:none">Этот почтовый адресс уже используеться</span>
            </div>
             <button class="modal-button button">
                Отправить
            </button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    </div>
</div>
