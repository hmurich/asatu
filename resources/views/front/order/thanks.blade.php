@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')
	<div class="inner">
		<div class="thank">
			<div class="thank-left">
				<div class="thank-up">
					<span class="thank__heading">
						Благодарим за ваш заказ
					</span>
					<div class="order-number">
						Ваш номер заказа: <span>{{ $order->sys_key }}</span>
					</div>
				</div>
				<div class="thank-bottom">
				<p>Мы отправили данные о заказе на вашу почту: <a href="">abubakirov.azamat@gmail.com</a></p>
				<p>При возникновении вопросов, просим сообщить на почту:<a href="">info@asat.kz</a></p>
				<p>либо позвонив по номеру: <a href="tel:+7 707 555 00 17">+7 707 555 00 17</a></p>
				<div class="thank-bottom__title">
					Что с моим заказом?
				</div>
					<div class="thank-bottom__item first-icon">
						1. Мы отправили ваш заказ в ресторан <a href="{{ action('Front\Restoran\MenuController@getList', $restoran->id) }}">“{{ $restoran->name }}”,</a><br>
	доставка будет в течении 60 мин.
					</div>
                    @if ($user)
    					<div class="thank-bottom__item second-icon">
    						2. Если вы хотите следить за вашим заказом,<br>
    то вы должны перейти по это ссылке: <a href="{{ action('Customer\CabinetController@getCabinet') }}">статус заказа</a>
    					</div>
                    @endif
				</div>
			</div>
			<div class="thank-right">
				<img src="/img/th-page-logo.png">
			</div>
		</div>
	</div>
@endsection
