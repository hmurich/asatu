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
            {{ $translator->getTrans('enter_user_data') }}
        </div>
        <div class="checkout-body__content">
            <div class="checkout-form" style="width: 100%;">
                @if (!$user)
                    <div class="checkout-form__item">
                        <input type="text" name='email' placeholder="{{ $translator->getTrans('email_adres') }}" required="">
                    </div>
                @endif
                <div class="checkout-form__item">
                    <input type="text" name='name' placeholder="{{ $translator->getTrans('enter_fio') }}" value='{{ ($customer ? $customer->name : null ) }}' required="">
                </div>
                <div class="checkout-form__item">
                    <input type="text" name='phone' placeholder="{{ $translator->getTrans('enter_phone') }}" value='{{ ($customer ? $customer->phone : null ) }}' required="">
                </div>
                <div class="checkout-form__item">
                    <input type="text" name='address' placeholder="{{ $translator->getTrans('enter_adres') }}" value='{{ ($customer ? $customer->address : null ) }}' required="">
                </div>
                <div class="checkout-form__item checkout-form__item-left">
                    <input type="text" name='kvartira' placeholder="{{ $translator->getTrans('enter_kv') }}" value='{{ ($customer ? $customer->kvartira : null ) }}' >
                </div>
                <div class="checkout-form__item checkout-form__item-right">
                    <input type="text" name='podezd' placeholder="{{ $translator->getTrans('enter_pd') }}" value='{{ ($customer ? $customer->podezd : null ) }}' >
                </div>
                <div class="checkout-form__item checkout-form__item-left">
                    <input type="text" name='etag' placeholder="{{ $translator->getTrans('enter_et') }}" value='{{ ($customer ? $customer->etag : null ) }}' >
                </div>
                <div class="checkout-form__item checkout-form__item-right">
                    <input type="text" name='domofon' placeholder="{{ $translator->getTrans('enter_md') }}" value='{{ ($customer ? $customer->domofon : null ) }}' >
                </div>
                <div class="checkout-form__item checkout-form__item-left">
                    <input type="text" name='count_person'  placeholder="{{ $translator->getTrans('enter_pr') }}" value='{{ ($customer ? $customer->count_person : null ) }}' >
                </div>
                <div class="checkout-form__item js-checkout-form__item">
                    <span>{{ $translator->getTrans('add_comment_order') }}</span>
                    <div class="js-checkout-form__item-textarea">
                        <textarea name="note" id="" placeholder='{{ $translator->getTrans('add_comment_order') }}' ></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
