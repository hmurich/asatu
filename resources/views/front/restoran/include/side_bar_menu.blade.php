<div class="side-bar__show button">
    {{ $translator->getTrans('filter') }}
</div>
<div class="side-bar">
    <form action="" class="form js_change_form">
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                {{ $translator->getTrans('menu_type') }}:
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
                <br>
                <div class="side-bar-box__item">
                    <button class="button ">
                        {{ $translator->getTrans('show') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                Поиск блюд:
            </div>
            <div class="side-bar-box">
                <div class="side-bar-box__item-search">
                   <input type="text" placeholder="Введите блюдо.." name='k_name' value="{{ (isset($ar_input["k_name"]) ? $ar_input["k_name"] : null) }}" />
                    <button></button>
                </div>
            </div>
        </div>
        <div class="side-bar-item "id="basket-side-bar">
            <div class="side-bar-item__title">
                {{ $translator->getTrans('busket') }}:
            </div>
            <div class="side-bar-box ">
                <div class="basket">
                    <div class="basket-img">
                        <img src="/img/basket.png" alt="">
                    </div>
                    <div class="basket-info">
                        <div class="basket-info__title">
                            {{ $translator->getTrans('you_order') }}
                        </div>
                        <div class="basket-info__item">
                            {{ $translator->getTrans('summa') }}:
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
             <div style='overflow: hidden; width: 100%;'>
                        <ul class='js_busket_list product-add-list'>
                            @if ($busket)
                                @foreach ($busket as $menu_id => $b)
                                    @if (isset($b['count']) && isset($b['cost']))
                                        <li class='js_busket_item_li_{{ $menu_id }}'>
                                            <div class="busket-item">
                                                <div class="busket-item__name">
                                                    <div class="busket-item__name-category">
                                                        {{ $ar_menu_type[$ar_menu_cat[$menu_id]['cat_id']] }}
                                                    </div>
                                                    {{ $ar_menu[$menu_id] }}
                                                </div>
                                                <div class="busket-item__count">
                                                    x{{ $b['count'] }}
                                                </div>
                                                <div class="busket-item__del js_busket_item_li_delete" data-id='{{ $menu_id }}' data-restoran_id="{{ $restoran->id }}">

                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
            <div class="side-bar-box">
                <div class="side-bar-box__checkout">
                    <img src="/img/cards.png" alt="">
                    <a  href="{{ action('Front\OrderController@getForm', $restoran->id) }}"
                        class="button side-bar-box__checkout-button js_order_href"
                        data-min='{{ $restoran->relData->min_price }}'
                        data-current='{{ ($busket ? $busket['total_cost'] : 0) }}'>
                        {{ $translator->getTrans('order_href') }}
                    </a>
                    {{ $translator->getTrans('min_de_cost') }}: <span>{{ $restoran->relData->min_price }} тг</span>
                </div>
            </div>
        </div>
    </form>
</div>
