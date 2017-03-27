<div class="side-bar__show button">
    Фильтр
</div>
<div class="side-bar">
    <form action="" class="form">
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                блюдо:
            </div>
            <div class="side-bar-box">
                @foreach ($ar_kitchen as $id=>$name)
                    <div class="side-bar-box__item">
                        @if (isset($ar_input['kitchen']) && in_array($id, $ar_input['kitchen']))
                            <input type="checkbox" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}" checked="">
                        @else
                            <input type="checkbox" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}">
                        @endif

                        <label for="kitchen_{{ $id }}">{{ $name }}</label>
                    </div>
                @endforeach
                <div class="side-bar-box__item-search">
                    <input type="text" name='name' placeholder="Поиск блюда..." value="{{ (isset($ar_input['name']) ? $ar_input['name'] : null) }}">
                </div>
                <br />
                <div class="side-bar-box__item">
                    <button class="button ">
                        Фильтр
                    </button>
                </div>
            </div>
        </div>
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                корзина:
            </div>
            <div class="side-bar-box ">
                <div class="basket">
                    <div class="basket-img">
                        <img src="/img/basket.png" alt="">
                    </div>
                    <div class="basket-info">
                        <div class="basket-info__title">
                            Ваш заказ
                        </div>
                        <div class="basket-info__item">
                            Сумма:
                            <span class='js_total_cost'>
                                @if ($busket)
                                    {{ $busket['total_cost'] }}
                                @else
                                    0
                                @endif
                            </span> тг
                        </div>
                    </div>
                </div>
            </div>
            <div class="side-bar-box">
                <div class="side-bar-box__checkout">
                    <img src="/img/cards.png" alt="">
                    <a href="{{ action('Front\Restoran\MenuController@getIndex') }}" class="button side-bar-box__checkout-button js_order_href" data-min='{{ $restoran->relData-> }}'>
                        оформить заказ
                    </a>
                    Минимальная сумма доставки: <span>5.000 тг</span>
                </div>
            </div>
        </div>
    </form>
</div>
