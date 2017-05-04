@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
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
        <div class="pr-category">
            <?php $cat_id = 0; ?>
            @forelse ($items as $i)
                @if ($cat_id != $i->cat_id)
                    @if ($cat_id != 0)
                        </ul>
                    @endif
                    <span class="pr-category__heading">{{ $ar_menu_type[$i->cat_id] }}</span>
                    <ul class="product-list">
                    <?php $cat_id = $i->cat_id; ?>
                @endif
                    <li>
                        <div class="product-item">

                            <div class="product-item__img">
                                @if ($i->photo)
                                    <img src="{{ $i->photo }}" alt="">
                                @else
                                    <img src="/images/restaurant.png" alt="">
                                @endif
                            </div>
                            <div class="product-item__name">
                                {{ $i->title }}
                            </div>
                            <div class="product-item__price">
                                {{ $translator->getTrans('Price') }}: <span>{{ $i->cost_item }} тг</span>
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
                                            1
                                        @endif
                                    </span> шт
                                    <input  type="hidden"
                                            class="js-count-input js_menu_item_{{ $i->id }}"
                                            value="{{ ($busket && isset($busket[$i->id]) ? $busket[$i->id]['count'] : 1) }}"
                                            data-id='{{ $i->id }}'
                                            data-cost='{{ $i->cost_item }}'
                                            data-restoran_id='{{ $i->restoran_id }}'
                                            data-title='{{ $i->title }}'
                                            data-cat='{{ $ar_menu_type[$i->cat_id] }}' />
                                </div>
                                <div class="product-item-count-item js-plus hover-but">
                                    +
                                </div>
                            </div>
                            <button class="button product-item__button js_add_menu_item" data-id='{{ $i->id }}'>
                                {{ $translator->getTrans('zakaz') }}
                            </button>
                        </div>
                    </li>
                @empty
                    <p>По вашему запросу не найдено блюд</p>
                @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection
