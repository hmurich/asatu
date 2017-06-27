<div id="cart_box">
    <h3>
        {{ $translator->getTrans('menu_order') }} <i class="icon_cart_alt pull-right"></i>
    </h3>
    <table class="table table_summary">
        <thead>
        <th>Наименование</th>
        <th>{{ $translator->getTrans('Price') }}</th>
        <th>Сумма</th>
        </thead>
        <tbody>
        @foreach ($menu as $m)
            <tr class="checkout-card__item">
                <td>
                    <strong>{{ $busket[$m->id]['count'] }}x</strong> {{ $m->title }}
                </td>
                <td>
                    <span class="nowrap">{{ $m->cost_item }} тг</span>
                </td>
                <td>
                    <strong class="pull-right nowrap">
                        {{ ($busket[$m->id]['count'] * $m->cost_item) }} тг
                    </strong>
                </td>
                {{--<td class="order-img">--}}
                    {{--@if ($m->photo)--}}
                        {{--<img src="{{ $m->photo }}" alt="" style="width: 100%;">--}}
                    {{--@else--}}
                        {{--<img src="/images/restaurant.png" alt="">--}}
                    {{--@endif--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <table class="table table_summary">
        <tbody>
        <tr>
            <td>
                {{ $translator->getTrans('total_sum') }}<span class="pull-right">{{ $busket['total_cost'] }} тг</span>
            </td>
        </tr>
        <tr>
            <td>
                Доставка <span class="pull-right">{{ ($self_remote ? 'Самовывоз' : $area->cost) }} тг</span>
            </td>
        </tr>
        <tr>
            <td class="total">
                ИТОГО <span class="pull-right">{{ ($busket['total_cost'] + ($self_remote ? 0 : $area->cost)) }} тг</span>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <div class="checkout-content__bottom">
        <button class="btn_full basket-itog__button" type="submit">
            {{ $translator->getTrans('eate_me') }}
        </button>
        <a href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}" class="btn_full_outline button back-button">{{ $translator->getTrans('before_in_menu') }}</a>
    </div>
</div><!-- End cart_box -->
