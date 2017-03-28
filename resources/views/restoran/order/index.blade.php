@extends('restoran.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    @include('restoran.order.include.side_bar')

    <div class="restaurants-box">
        <div class="info-card">
            <div class="info-card__item">
                <div class="order-client__name expectation">
                    {{ $order->relCustomer->name }}
                </div>
            </div>
            <div class="info-card__item">
                Счет на сумму:  <span>{{ $order->total_sum }} тг</span>
            </div>

            @if ($order->promo_key)
                <div class="info-card__item">
                    Промокод:    <span>{{ $order->promo_key }}</span>
                </div>
            @endif

            <div class="info-card__item">
                Способ оплаты:    <span>Онлайн оплата</span>
            </div>
            <div class="info-card__item">
                Телефон:   <span>{{ $order->relCustomer->phone }}</span>
            </div>
            <div class="info-card__item">
                Адрес:   <span>{{ $order->relCustomer->full_adress }}</span>
            </div>
            <div class="info-card__item order-button-container">
                <a href="" class="button cancel">
                    отказать
                </a>
                <a href="" class="button">
                    одобрить заказ
                </a>
            </div>
        </div>
        <div class="info-card">
            @foreach ($order->relItems as $i)
                <div class="info-card__item">
                    <div class="order-img">
                        @if ($i->relMenu->photo)
                            <img src="{{ $i->relMenu->photo }}" alt="" style='width: 100%;'>
                        @else
                            <img src="/img/order-img.jpg" alt="">
                        @endif
                    </div>
                    <div class="order-text">
                        <div class="order-text__title-container	">
                            <div class="order-text__title">{{ $i->relMenu->title }}</div>
                            <div class="order-text__col">
                                x{{ $i->count_item }}
                            </div>
                        </div>
                        <div class="order-text__info-container">
                            <div class="order-text__info">
                                Цена: <span>{{ $i->cost_item }} тг</span>
                                <p>{!! $i->relMenu->note !!}</p>
                            </div>
                            <div class="order-text__col">
                                {{ $i->cost_total }}тг
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
