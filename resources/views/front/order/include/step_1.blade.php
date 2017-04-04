<div class="checkout-content__right">
    <div class="checkout-body">
        <div class="checkout-body__titel">
            Уже зарегистрированны ?
        </div>
        <div class="checkout-body__content">
            <a href="#modal_login" class="button checkout-button open_modal">
                войти в личный кабинет
            </a>
        </div>
    </div>
</div>

<div class="checkout-content__left">
    <div class="checkout-body">
        <div class="checkout-body__titel">
            Введите данные для оформления заказа
        </div>
        <div class="checkout-body__content">
            <div class="checkout-form" style="width: 100%;">
                @if (!$user)
                    <div class="checkout-form__item">
                        <input type="text" name='email' placeholder="Почтовый адресс" required="">
                    </div>
                @endif
                <div class="checkout-form__item">
                    <input type="text" name='name' placeholder="Введите Ваше Ф.И.О..." value='{{ ($customer ? $customer->name : null ) }}' required="">
                </div>
                <div class="checkout-form__item">
                    <input type="text" name='phone' placeholder="Введите мобильный телефон..." value='{{ ($customer ? $customer->phone : null ) }}' required="">
                </div>
                <div class="checkout-form__item">
                    <input type="text" name='address' placeholder="Введите Ваш адрес..." value='{{ ($customer ? $customer->address : null ) }}' required="">
                </div>
                <div class="checkout-form__item checkout-form__item-left">
                    <input type="text" name='kvartira' placeholder="Квартира..." value='{{ ($customer ? $customer->kvartira : null ) }}' required="">
                </div>
                <div class="checkout-form__item checkout-form__item-right">
                    <input type="text" name='podezd' placeholder="Подъезд..." value='{{ ($customer ? $customer->podezd : null ) }}' required="">
                </div>
                <div class="checkout-form__item checkout-form__item-left">
                    <input type="text" name='etag' placeholder="Этаж..." value='{{ ($customer ? $customer->etag : null ) }}' required="">
                </div>
                <div class="checkout-form__item checkout-form__item-right">
                    <input type="text" name='domofon' placeholder="Домофон..." value='{{ ($customer ? $customer->domofon : null ) }}' required="">
                </div>
                <div class="checkout-form__item checkout-form__item-left">
                    <input type="text" name='count_person'  placeholder="Персон..." value='{{ ($customer ? $customer->count_person : null ) }}' required="">
                </div>
                <div class="checkout-form__item js-checkout-form__item">
                    <span>Добавить комментарий к заказу...</span>
                    <div class="js-checkout-form__item-textarea">
                        <textarea name="note" id="" placeholder='Добавить комментарий к заказу...' ></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
   
</div>
