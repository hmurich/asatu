@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@include('front.catalog.include.modal_change_address')

@section('content')
<div class="container">
	<div class="container-inner">
        @include('front.catalog.include.side_bar')
        <div class="restaurants-box">
			@include('front.catalog.include.top_filter')

			<ul class="restaurant-list">
                @forelse ($items as $i)
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
    								{{ $translator->getTrans('min_order') }}: <span>{{ $i->relData->min_price }} тг</span>
    							</div>
    							<div class="restaurant-info__item">
    								{{ $translator->getTrans('deliv_cost') }}:  <span>{{ ( $i->relData->delivery_price ? $i->relData->delivery_price.' тг': "Бесплатно") }}</span>
    							</div>
                                <?php
                                    $ar_kithen = $i->relKitchens()->select('kitchen_name')->get()->keyBy('kitchen_name')->toArray();
                                    $ar_kithen = array_keys($ar_kithen);
                                ?>
                                {{ implode(', ', $ar_kithen) }}
                            </div>
    						<div class="restaurant-item-box__bottom">
    							<div class="delivery-time">
    								{{ $translator->getTrans('deliv_time') }} <span>{{ $i->relData->delivery_duration }} минут</span>
    							</div>
    							<a href="{{ action('Front\Restoran\MenuController@getList', $i->id) }}" class="button restaurants-filtr__button">
    								{{ $translator->getTrans('eat_me') }}
    							</a>
    						</div>
    					</div>
    				</li>
                @empty
                	<p>По вашему запросу не найдено заведений</p>
                @endforelse
			</ul>
		</div>
	</div>
</div>

@endsection
