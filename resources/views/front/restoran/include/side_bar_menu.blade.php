<div id="cart_box" >
    <h3>{{ $translator->getTrans('you_order') }} <i class="icon_cart_alt pull-right"></i></h3>
    <ul class="table table_summary js_busket_list product-add-list">
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
                            <div class="busket-item__del js_busket_item_li_delete" data-id='{{ $menu_id }}' data-restoran_id="{{ $restoran->id }}"></div>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
    <hr>

    <table class="table table_summary">
        <tbody>
        <tr>
            <td class="total">
                {{ $translator->getTrans('summa') }}:
                <span class="pull-right">
                    <span class="js_total_cost">{{ $busket ?  $busket['total_cost'] : 0 }}</span> тг
                </span>
            </td>
        </tr>
        </tbody>
    </table>

    <hr />
    <div class="nowrap">
        {{ $translator->getTrans('min_de_cost') }}: <strong><span class="js_asdasdas">{{ $restoran->relData->min_price }} тг</span></strong>
    </div>
    <hr />

    <a class="btn_full"  href="{{ action('Front\OrderController@getForm', $restoran->id) }}"
        class="button side-bar-box__checkout-button js_order_href"
        data-min='{{ $restoran->relData->min_price }}'
        data-current='{{ ($busket ? $busket['total_cost'] : 0) }}'>
        {{ $translator->getTrans('order_href') }}
    </a>

</div>
