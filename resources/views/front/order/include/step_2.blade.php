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
            <div class="checkout-form">
                <div class="checkout-form__item">
                    <input  type="text"
                            name='promo_key'
                            placeholder="Ввести промо-код"
                            class='js_promo_key'
                            data-restoran_id='{{ $restoran->id }}'
                            data-sum='{{ $busket["total_cost"] }}' />
                </div>
                <div class="checkout-form__item checkout-form__item-bottom ">
                    <input type="radio" name="oplata" class="checkbox" id="nal"  checked="checked">
                    <label for="nal">Наличным курьеру</label>
                </div>
            </div>

        </div>
    </div>
</div>
