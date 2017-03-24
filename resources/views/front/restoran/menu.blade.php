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

        @include('front.restoran.include.side_bar_menu')

        <div class="restaurants-box">
            <ul class="product-list">
                @foreach ($items as $i)
                    <li>
                        <div class="product-item">
                            <div class="product-item__img">
                                @if ($i->photo)
                                    <img src="{{ $i->photo }}" alt="">
                                @else
                                    <img src="/img/restaurant.jpg" alt="">
                                @endif
                            </div>
                            <div class="product-item__name">
                                {{ $i->title }}
                            </div>
                            <div class="product-item__price">
                                Цена: <span>{{ $i->cost_item }} тг</span>
                            </div>
                            <div class="product-item__des">
                                {!! $i->note !!}
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
                @endforeach
            </ul>
        </div>
    </div>
</div>



@endsection
