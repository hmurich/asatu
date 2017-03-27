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
            </form>
			<div class="checkout-content__bottom">
				<a href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}" class="button back-button">назад к меню</a>
			</div>
		</div>
	</div>
</div>


@endsection
