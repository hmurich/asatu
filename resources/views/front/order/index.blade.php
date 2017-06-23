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
                <h1>Оформление заказа</h1>
                <div class="bs-wizard">
                    <div class="col-xs-6 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum"><strong>1.</strong> Информация о клиенте</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-xs-6 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum"><strong>2.</strong> Потверждение заказа</div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="cart_2.html" class="bs-wizard-dot"></a>
                    </div>
                </div><!-- End bs-wizard -->
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->

    <div class="modal alert-block">
        <span class="modal_close alert-block-close"></span>
        <img src="/img/modal-logo.png">
        <div class="form-modal-min-title">
            Вы хотите покинуть страницу ?
        </div>
        <div class="yes button">ДА</div>
        <div class="no button">нет</div>
    </div>

    <div class="container margin_60_35">
		<div class="row">
			<div class="col-md-3">

				<div class="box_style_2 hidden-xs info">
					<h4 class="nomargin_top">Delivery time <i class="icon_clock_alt pull-right"></i></h4>
					<p>
						Lorem ipsum dolor sit amet, in pri partem essent. Qui debitis meliore ex, tollit debitis conclusionemque te eos.
					</p>
					<hr>
					<h4>Secure payment <i class="icon_creditcard pull-right"></i></h4>
					<p>
						Lorem ipsum dolor sit amet, in pri partem essent. Qui debitis meliore ex, tollit debitis conclusionemque te eos.
					</p>
				</div><!-- End box_style_1 -->

				<div class="box_style_2 hidden-xs" id="help">
					<i class="icon_lifesaver"></i>
					<h4>Need <span>Help?</span></h4>
					<a href="tel://004542344599" class="phone">+45 423 445 99</a>
					<small>Monday to Friday 9.00am - 7.30pm</small>
				</div>

			</div><!-- End col-md-3 -->

            <form action="{{ action('Front\OrderController@postForm', $restoran->id) }}" method="post" class="rf">
    			<div class="col-md-6">
                        <div class="js-checkout-tab active">
                            @include('front.order.include.step_1')
                        </div>

                        <?php /* @include('front.order.include.step_2') */ ?>
    			</div><!-- End col-md-6 -->

    			<div class="col-md-3" id="sidebar">
                	<div class="theiaStickySidebar">
                        @include('front.order.include.step_3')
                    </div><!-- End theiaStickySidebar -->
    			</div><!-- End col-md-3 -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

		</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->


@endsection
