@extends('layout')
@section('title', $title)

@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')

<div class="container">
	<div class="container-inner">
		<div class="checkout-content">
			<div class="checkout-content__top">
				<div class="checkout-title">
					Оформите заказ
				</div>
				<div class="checkout-list-step">
					<div class="checkout-list-step-item active">
						1 ШАГ
					</div>
					<div class="checkout-list-step-item">
						2 ШАГ
					</div>
					<div class="checkout-list-step-item">
						3 ШАГ
					</div>
				</div>
			</div>
            <form action="{{ action('Front\OrderController@postForm', $restoran->id) }}" method="post">
    			<div class="js-checkout-tab active">
                    @include('front.order.include.step_1')
                </div>
    			<div class="js-checkout-tab">
    				@include('front.order.include.step_2')
    			</div>
    			<div class="js-checkout-tab">
                    @include('front.order.include.step_3')
    			</div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
			<div class="checkout-content__bottom">
				<a href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}" class="button back-button">назад к меню</a>
			</div>
		</div>
	</div>
</div>


@endsection
