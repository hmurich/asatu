@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')
    <?php
    $img = $restoran->photo ? $restoran->photo : '/img/restaurant-big.jpg';
    ?>
    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?=$img?>" data-natural-width="1170" data-natural-height="250">
        <div id="subheader">
            <div id="sub_content" class="zoomIn">
                <h1>Благодарим за ваш заказ</h1>
                <div class="bs-wizard">
                    <div class="col-xs-6 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Информация о клиенте</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a class="bs-wizard-dot"></a>
                    </div>
                    <div class="col-xs-6 bs-wizard-step complete">
                        <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Потверждение заказа</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a class="bs-wizard-dot"></a>
                    </div>
                </div><!-- End bs-wizard -->
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->

<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="box_style_2">
				<h2 class="inner">Потверждение заказа</h2>
				<div id="confirm">
					<i class="icon_check_alt2"></i>
					<h3>Благодарим за ваш заказ</h3>
                    <p class="order-number">
                        Ваш номер заказа: <span>{{ $order->sys_key }}</span>
                    </p>
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
		</div>
	</div><!-- End row -->
</div><!-- End container -->
@endsection
