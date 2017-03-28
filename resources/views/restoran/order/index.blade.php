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
            <div class="info-card__item">
                <div class="order-img">
                    <img src="img/order-img.jpg" alt="">
                </div>
                <div class="order-text">
                    <div class="order-text__title-container	">
                        <div class="order-text__title">Пеппероне</div>
                        <div class="order-text__col">
                            x2
                        </div>
                    </div>
                    <div class="order-text__info-container">
                        <div class="order-text__info">
                            Цена: <span>310 тг</span>
                            <p>Состав: название, название, название, название, название, название.</p>
                        </div>
                        <div class="order-text__col">
                            3.800тг
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-card__item">
                <div class="order-img">
                    <img src="img/order-img.jpg" alt="">
                </div>
                <div class="order-text">
                    <div class="order-text__title-container	">
                        <div class="order-text__title">Пеппероне</div>
                        <div class="order-text__col">
                            x2
                        </div>
                    </div>
                    <div class="order-text__info-container">
                        <div class="order-text__info">
                            Цена: <span>310 тг</span>
                            <p>Состав: название, название, название, название, название, название.</p>
                        </div>
                        <div class="order-text__col">
                            3.800тг
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-card__item">
                <div class="order-img">
                    <img src="img/order-img.jpg" alt="">
                </div>
                <div class="order-text">
                    <div class="order-text__title-container	">
                        <div class="order-text__title">Пеппероне</div>
                        <div class="order-text__col">
                            x2
                        </div>
                    </div>
                    <div class="order-text__info-container">
                        <div class="order-text__info">
                            Цена: <span>310 тг</span>
                            <p>Состав: название, название, название, название, название, название.</p>
                        </div>
                        <div class="order-text__col">
                            3.800тг
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
