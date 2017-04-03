@extends('layout')
@section('title', $title)

@section('body_class', 'second-page')
@section('top_block')
    @include('include.top_block_def')
@endsection

@section('content')
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
                                    <span class="js-count">
                                        @if ($busket && isset($busket[$i->id]))
                                            {{ $busket[$i->id]['count'] }}
                                        @else
                                            0
                                        @endif
                                    </span> шт
                                    <input  type="hidden"
                                            class="js-count-input js_menu_item_{{ $i->id }}"
                                            value="{{ ($busket && isset($busket[$i->id]) ? $busket[$i->id]['count'] : 0) }}"
                                            data-id='{{ $i->id }}'
                                            data-cost='{{ $i->cost_item }}'
                                            data-restoran_id='{{ $i->restoran_id }}' />
                                </div>
                                <div class="product-item-count-item js-plus hover-but">
                                    +
                                </div>
                            </div>
                            <button class="button product-item__button js_add_menu_item" data-id='{{ $i->id }}'>
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
