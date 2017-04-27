<div class="checkout-body">
    <div class="checkout-body__titel">
        {{ $translator->getTrans('menu_order') }}
    </div>
    <div class="checkout-body__content">
        @foreach ($menu as $m)
            <div class="checkout-card__item">
                <div class="order-img">
                    @if ($m->photo)
                        <img src="{{ $m->photo }}" alt="" style="width: 100%;">
                    @else
                        <img src="/images/restaurant.png" alt="">
                    @endif
                </div>
                <div class="order-text">
                    <div class="order-text__title-container	">
                        <div class="order-text__title">{{ $m->title }}</div>
                        <div class="order-text__col">
                            x{{ $busket[$m->id]['count'] }}
                        </div>
                    </div>
                    <div class="order-text__info-container">
                        <div class="order-text__info">
                            {{ $translator->getTrans('Price') }}: <span>{{ $m->cost_item }} тг</span>
                            <p>{!! $m->note !!}</p>
                        </div>
                        <div class="order-text__col">
                            {{ ($busket[$m->id]['count'] * $m->cost_item) }}тг
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="basket-itog">
    <div class="basket-itog__item">
        {{ $translator->getTrans('total_sum') }}: <span class='js_promo_total_sum' data-delivery="{{ $area->cost }}">{{ ($busket['total_cost'] + $area->cost) }}тг</span>
    </div>
    <!--
    <div class="basket-itog__item">
        {{ $translator->getTrans('promo_key') }}: <span class='js_promo_key_val'></span>
    </div>
    -->
    <div class="basket-itog__item">
        {{ $translator->getTrans('order_type') }}: <span>{{ $translator->getTrans('cash_to_curier') }}</span>
    </div>
    <button class="button basket-itog__button" type="submit">
        {{ $translator->getTrans('eate_me') }}
    </button>
</div>
