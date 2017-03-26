@extends('restoran.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    @include('restoran.order.include.side_bar')

    <div class="restaurants-box">
        <div class="info-card">
            <div class="info-card__item">
                <div class="order-client__name expectation">
                    Аубакир Азамат
                </div>
            </div>
            <div class="info-card__item">
                Счет на сумму:  <span>8.750тг</span>
            </div>
            <div class="info-card__item">
                Промокод:    <span> QWc37fPGcD4023slP$32</span>
            </div>
            <div class="info-card__item">
                Способ оплаты:    <span>Онлайн оплата</span>
            </div>
            <div class="info-card__item">
                Телефон:   <span>+7 (707) 149-11-27</span>
            </div>
            <div class="info-card__item">
                Адрес:   <span>ул. Женис, дом 17, подъезд #1, этаж 7, квартира 47</span>
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
