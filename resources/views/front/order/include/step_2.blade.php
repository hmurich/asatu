<div class="checkout-content__right">
    <div class="checkout-body">
        <div class="checkout-body__titel">
            {{ $translator->getTrans('alread_regstr') }}
        </div>
        <div class="checkout-body__content">
            <a href="#modal_login" class="button checkout-button open_modal">
                {{ $translator->getTrans('enter_cabinet') }}
            </a>
        </div>
    </div>
</div>
<div class="checkout-content__left">
    <div class="checkout-body">
        <div class="checkout-body__titel">
            {{ $translator->getTrans('enter_data_to_order') }}
        </div>
        <div class="checkout-body__content">
            <div class="checkout-form">
                <div class="checkout-form__item">
                    <input  type="text"
                            name='promo_key'
                            placeholder="{{ $translator->getTrans('enter_promo_key') }}"
                            class='js_promo_key'
                            data-restoran_id='{{ $restoran->id }}'
                            data-sum='{{ $busket["total_cost"] }}' />
                </div>
                <div class="checkout-form__item checkout-form__item-bottom ">
                    <input type="radio" name="oplata" class="checkbox" id="nal"  checked="checked">
                    <label for="nal">{{ $translator->getTrans('cash_to_curier') }}</label>
                </div>
            </div>

        </div>
    </div>
</div>
