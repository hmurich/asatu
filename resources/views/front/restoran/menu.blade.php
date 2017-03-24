@extends('layout')
@section('title', $title)

@section('top_block')
    @include('include.top_block_def')
@endsection

@section('content')
<div class="middle-icon position-absolute">
    @include('front.index.include.middle_icon')
</div>
<div class="container">
    <div class="container-inner">
        <div class="restaurant">
            @include('front.restoran.include.top_info')
        </div>
        <div class="admin-content__top">@include('front.restoran.include.nav')</div>

        @include('front.restoran.include.side_bar')

        <div class="restaurants-box">
            <ul class="product-list">
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            <img src="img/restaurant.jpg" alt="">
                        </div>
                        <div class="product-item__name">
                            Название блюда
                        </div>
                        <div class="product-item__price">
                            Цена: <span>5.000тг</span>
                        </div>
                        <div class="product-item__des">
                            Состав: название, название, название, название, название, название.
                        </div>
                        <div class="product-item-count">
                            <div class="product-item-count-item js-min hover-but">
                                -
                            </div>
                            <div class="product-item-count-item count">
                                <span class="js-count">1</span> шт
                                <input type="hidden" class="js-count-input"value="1">
                            </div>
                            <div class="product-item-count-item js-plus hover-but">
                                +
                            </div>
                        </div>
                        <button class="button product-item__button">
                            заказать
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>



@endsection
