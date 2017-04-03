@extends('layout')
@section('title', $title)

@section('body_class', 'second-page')
@section('top_block')
    @include('include.top_block_def')
@endsection

@section('content')
<div class="container">
	<div class="container-inner">
        @include('front.catalog.include.side_bar')
        <div class="restaurants-box">
			@include('front.catalog.include.top_filter')
			<ul class="restaurant-list">
                @foreach ($items as $i)
    				<li class="restaurant-item {{ ($i->is_gold ? 'gold' : null) }} {{ (!$i->is_gold && $i->is_platinum ? 'premium' : null) }}" >
    					<div class="restaurant-item__img">
                            @if ($i->logo)
                                <img src="{{ $i->logo }}" alt="">
                            @else
                                <img src="/img/restaurant.jpg" alt="">
                            @endif
                        </div>
    					<div class="restaurant-item-box">
    						<div class="restaurant-item-box__top">
    							<div class="restaurant-name {{ (!$i->is_open ? 'close' : null) }}">
    								{{ $i->name }}
    							</div>
    							<ul class="reiting restaurant-item-box__top-reiting">
    								{!! $i->generateHtmlStar() !!}
    								<div class="reiting-text">{{ $i->raiting }}/5</div>
    							</ul>
    						</div>
    						<div class="restaurant-item-box__info">
    							<div class="restaurant-info__item">
    								Минимальный заказ: <span>{{ $i->relData->min_price }} тг</span>
    							</div>
    							<div class="restaurant-info__item">
    								Стомость доставки:  <span>{{ ( $i->relData->delivery_price ? $i->relData->delivery_price.' тг': "Бесплатно") }}</span>
    							</div>
                                {!! $i->relData->short_note !!}
                            </div>
    						<div class="restaurant-item-box__bottom">
    							<div class="delivery-time">
    								Время доставки <span>{{ $i->relData->delivery_duration }} минут</span>
    							</div>
    							<a href="{{ action('Front\Restoran\MenuController@getList', $i->id) }}" class="button restaurants-filtr__button">
    								найти
    							</a>
    						</div>
    					</div>
    				</li>
                @endforeach
			</ul>
		</div>
	</div>
</div>

@endsection
