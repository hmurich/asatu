<div class="side-bar__show button">
    Фильтр
</div>
<div class="side-bar">
    <div class="side-bar-item">
        <div class="side-bar-item__title">
            заказы:
        </div>
        @foreach ($orders as $o)
            <a href='?order_id={{ $o->id }}' style='color: inherit; text-decoration: none;'>
                <div class="side-bar-box">
                    <div class="order-client">
                        <div class="order-client__name ">
                            {{ $o->relCustomer->name }}
                            <span>{{ $ar_status[$o->status_id] }}</span>
                        </div>
                        <div class="order-client__sum">
                            Счет на сумму: <span>{{ $o->total_sum }} тг</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
