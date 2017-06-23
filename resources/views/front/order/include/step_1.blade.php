<div class="box_style_2" id="order_process">
    <h2 class="inner">{{ $translator->getTrans('enter_user_data') }}</h2>

        @if (!$user)
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
        @endif

    <hr />

    @if (!$user)
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" name='email' placeholder="E-mail" class="form-control" required="">
        </div>
    @endif

    <div class="form-group">
        <label>{{ $translator->getTrans('enter_fio') }}</label>
        <input type="text" name='name' class="form-control" placeholder="{{ $translator->getTrans('enter_fio') }}" value='{{ ($customer ? $customer->name : null ) }}' required="">
    </div>
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_phone') }}</label>
        <input type="text" name='phone' class="form-control" placeholder="{{ $translator->getTrans('enter_phone') }}" value='{{ ($customer ? $customer->phone : null ) }}' required="">
    </div>
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_adres') }}</label>
        <input type="text" name='address' class="form-control" placeholder="{{ $translator->getTrans('enter_adres') }}" value='{{ ($customer ? $customer->address : null ) }}' required="">
    </div>
    <div class="form-inline">
        <div class="form-group">
            <input type="checkbox" id="pred-zakaz"name='is_pre_order' value="1" />
            <label for="pred-zakaz" class="js-time-order-button ">Предзаказ</label>
        </div>
        <div class="form-group js-time-order" style="display: none;">
            <input type="text" class="time form-control" id="time" name='pre_order_time' placeholder="Время предзаказа" />
        </div>
    </div>
    <hr />
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_kv') }}</label>
        <input type="text" class="form-control" name='kvartira' placeholder="{{ $translator->getTrans('enter_kv') }}" value='{{ ($customer ? $customer->kvartira : null ) }}' >
    </div>
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_pd') }}</label>
        <input type="text" class="form-control" name='podezd'  placeholder="{{ $translator->getTrans('enter_pd') }}" value='{{ ($customer ? $customer->podezd : null ) }}' >
    </div>
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_et') }}</label>
        <input type="text" class="form-control" name='etag' placeholder="{{ $translator->getTrans('enter_et') }}" value='{{ ($customer ? $customer->etag : null ) }}' >
    </div>
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_md') }}</label>
        <input type="text" class="form-control" name='domofon' placeholder="{{ $translator->getTrans('enter_md') }}" value='{{ ($customer ? $customer->domofon : null ) }}' >
    </div>
    <div class="form-group">
        <label>{{ $translator->getTrans('enter_pr') }}</label>
        <input type="text" class="form-control" name='count_person'  placeholder="{{ $translator->getTrans('enter_pr') }}" value='{{ ($customer ? $customer->count_person : null ) }}' >
    </div>
    <hr />
    <div class="form-group">
        <label>{{ $translator->getTrans('add_comment_order') }}</label>
        <textarea class="form-control" name="note" id="" placeholder='{{ $translator->getTrans('add_comment_order') }}' ></textarea>
    </div>
</div><!-- End box_style_1 -->
