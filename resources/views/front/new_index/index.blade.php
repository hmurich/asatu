<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="pizza, delivery food, fast food, sushi, take away, chinese, italian food">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Asat</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/new_index/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/new_index/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/new_index/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/new_index/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/new_index/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>

    <!-- BASE CSS -->
    <link href="/new_index/css/base.css" rel="stylesheet">


    <!-- Modernizr -->
	<script src="/new_index/js/modernizr.js"></script>

    <!--[if lt IE 9]>
      <script src="/new_index/js/html5shiv.min.js"></script>
      <script src="/new_index/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->



    <!-- Header ================================================== -->
    <header>
        <div class="container-fluid">
        <div class="row">
            <div class="col--md-2 col-sm-2 col-xs-2">
                <div class="logo__img">
                    <a href="/" id="logo">
                        <img src="/new_index/img/logo.png" width="150" height="97"  alt="" data-retina="true" class=" logo__1">
                        <img src="/new_index/img/logo-1.png" width="85" height="30" alt="" data-retina="true" class="scroll_logo">
                    </a>
                </div>
            </div>
			<div class="select--select hidden-lg hidden-md">
                <select class="dropdown js_select_lang">
                    <option class="selected" value="ru">RU</option>
                    <option class="selected" value="kz">KZ</option>
                    <option class="selected" value="en">EN</option>
                </select>
            </div>
            <nav class="col--md-10 col-sm-10 col-xs-10">
	            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
	            <div class="main-menu">
	                <div id="header_menu">
	                    <img src="/new_index/img/logo-1.png" width="190" height="42" alt="" data-retina="true">
	                </div>
	                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
	                 <ul>
	                    <li class="submenu">
	                        <div class="call">
	                            <div class="call_img">
	                                <img src="/new_index/img/tel.png" alt="">
	                            </div>
	                            <div class="call_tel">
	                                <span>+7 (707) 555 01 22<br>
	                                    +7 (707) 555 01 66</span>
	                            </div>
	                         </div>
	                    </li>
	                    <li>
							<a href="#login_2" data-toggle="modal" data-target="#login_2" class="open_modal">
		                        <div class="login">
		                        	<div class="login__img">
		                                <img src="/new_index/img/login.png" alt="">
		                            </div>
		                            <div class="login__text ">
		                                Войти
		                            </div>
		                        </div>
							</a>
						</li>
						  <li class="submenu hidden-xs">
	                        <div class="select">
	                            <select class="dropdown js_select_lang">
									<option class="selected" value="ru">RU</option>
				                    <option class="selected" value="kz">KZ</option>
				                    <option class="selected" value="en">EN</option>
	                            </select>
	                        </div>
	                    </li>
	                </ul>
	            </div><!-- End main-menu -->
            </nav>
        </div><!-- End row -->
    </div>

    <div class="container-fluid">

        <div class="inner">
            <div class="header">

            </div>
        </div>
    </div><!-- End container -->
    </header>
	<!-- End Header =============================================== -->

    <!-- SubHeader =============================================== -->
    <section class="header-video">
        <div id="hero_video">
            <div id="sub_content">
             <div class="video-block-form">
                <h1>доставим с любовью!</h1>
				<form  action="{{ action('Front\CatalogController@postAddress') }}" method="post" >
	                <div class="container_input">
	                    <div class="selec">
							<select name="city_id" class='js_find_address_city_id down' required="">
			                    @foreach ($ar_city as $id=>$name)
			                        <option value="{{ $id }}">{{ $translator->getTrans('sys_directory_name_'.$id) }}</option>
			                    @endforeach
			                </select>
	                    </div>
						<input type="text" name='address' class="js_find_address" required="" placeholder="{{ $translator->getTrans('street') }}" />
		                <input type='hidden' name='lat' class='js_find_address_lat' />
		                <input type='hidden' name='lng' class='js_find_address_lng' />
	                </div>
	                <div class="submit">
						<a href="#" class="js_find_address_submit">
	                        <p>Доставка</p>
	                    </a>
	                </div>
	                <div class="or">
	                    <p>или</p>
	                </div>
	                <div class="submit">
	                    <a href="#asd" class='js_self_remote'>
	                        <p>Самовывоз</p>
	                    </a>
	                </div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    </form>
            </div>
        </div><!-- End sub_content -->
    </div>
    <img src="/new_index/img/video_fix.png" alt="" class="header-video--media" data-video-src="/new_index/video/intro" data-teaser-source="/new_index/video/intro" data-provider="Vimeo" data-video-width="1920" data-video-height="960">
</section>
    <div class="container__top hidden-xs">
        <div class="inner">
            <div class="order_title">
                <p>Заказ в три клика</p>
            </div>
            <div class="order__ul">
                <ul>
                    <li>
                        <a href="">
                            <img src="/new_index/img/icon1.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/new_index/img/icon2.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/new_index/img/icon3.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container__middle hidden-xs">
        <div class="inner">
            <div class="sale_title">
                <h3>Акции прямо сейчас</h3>
            </div>
            <div class="sale__list">
				@foreach ($sales as $s)
					<div class="sale__item">
						<div class="sale__img">
							<img src="{{ $s->img }}" alt="">
						</div>
						<div class="sale__ramka">
							<img src="/new_index/img/ramka.png" alt="">
						</div>
						<div class="sale__text--kfc">
							<p>{{ $s->slogan }}</p>
						</div>
					</div>
				@endforeach
            </div>
        </div>
    </div>
    <section class="parallax-window hidden-xs" data-parallax="scroll" data-image-src="/new_index/img/bg_down.jpg" data-natural-width="1200" data-natural-height="600">
    <div class="parallax-content">
        <div class="inner">
            <div class="tel__down">
                <img src="/new_index/img/tel_down.png" alt="">
            </div>
            <div class="text__down">
                <p>доставим еду,<br>
                    когда удобно<br>
                    и куда угодно</p>
            </div>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End Content =============================================== -->
	<div class="block-promotion hidden-xs">
	   <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="promotion">
						@if ($about)

                              <h2 >{{ $about->title_trans }}</h2>
                          {!! $about->short_note_trans !!}
                      @endif

					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container__line">
    	<div class="container">
	        <div class="rassylka_title">
	            <p>Хотите всегда быть в курсе самых выгодных акций от ресторанов?<br>
	                Подписывайтесь на нашу рассылку:</p>
            </div>
            <div class="email_input">
                <input type="text" name="city" placeholder="Город" class="second">
                <input type="text" name="email" placeholder="e-mail">
            </div>
            <div class="mail">
                <a href="#">
                    <p>Подписаться</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer ================================================== -->
  <div class="footer_bg">
        <div class="inner">
            <div class="in__inner">
                <div class="city">
					<?php $i = 0; ?>
					@foreach ($ar_city as $k=>$v)
						<?php $i++; ?>
						@if ($i == 1)
							<div class="list_city">
								<ul>
						@endif
							<li><a href="?city_id={{ $k }}">{{ $v }}</li>
						@if ($i == 6)
								</ul>
							</div>
							<?php $i = 0; ?>
						@endif
					@endforeach
					@if ($i != 0)
							</ul>
						</div>
					@endif
					<div class="list_city_menu">
                        <ul class="list_city__ul">
                            <li><a href="#">О компании</a></li>
                            <li><a href="#">Как мы работаем</a></li>
                            <li><a href="#">Регистрация заведений</a></li>
                            <li><a href="#">Вакансии</a></li>
                            <li><a href="#">Контакты</a></li>
                            <li>
                                <div class="social">
                                    <p>мы в соц.сетях!</p>
                                </div>
                                <div class="social_item">
                                    <div class="social_icon">
                                        <img src="/new_index/img/soc1.png" alt="">
                                    </div>
                                    <div class="social_icon">
                                        <img src="/new_index/img/soc2.png" alt="">
                                    </div>
                                    <div class="social_icon">
                                        <img src="/new_index/img/soc3.png" alt="">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="inner">
            <div class="copyright">
                Все права защищены © 2017 год
            </div>
            <div class="author">
              <a href='/page/confidentiality'> Политика конфидециальности </a>
            </div>
            <div class="author">
                 <a href='/page/agreement'> Пользовательское соглашение</a>
            </div>
        </div>
    </footer>
    <!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<form  action="{{ action('Auth\AuthController@postLogin') }}" method="post" class="popup-form">
	               <h3>Войти в личный кабинет</h3>
					<input type="text" name="email" class="form-control form-white" placeholder="EMAIL">
					<input type="password" name="password" class="form-control form-white" placeholder="Пароль" id="password1">
	                <div class="text-left">
	                    <a href="#modal_forgot_pass" class="modal-link open_modal">
	                        Забыли пароль?
	                    </a>
	                </div>
	                @if (Session::has('login_error'))
	                    <div class="asdas">
	                        Не удается войти. <br />
	                        Пожалуйста, проверьте правильность написания логина и пароля.
	                    </div>
	                @endif
	                <button type="submit" class="btn btn-submit">Войти</button>
                   <div class="text-reg">
                        <a href="#register" ata-toggle="modal" data-target="#login_2" class="close-modal-item">
                            Регистрация
                        </a>
                    </div>
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <input type="hidden" name="login" value="1">
	            </form>
              <div class="popup-form--img hidden-xs">
                    <div class="popup-form--text">
                        <h4>ASAT.kz</h4>
                        <p>Единый сервис доставки<br> еды и продуктов</p>
                    </div>
                </div>
			</div>
		</div>
	</div><!-- End modal -->

<!-- Register modal -->
<div class="modal fade out" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content modal-popup">
			<form action="{{ action('Auth\AuthController@postLogin') }}" class="popup-form" id="myRegister">
              <h4>Регистрация</h4>
				<input type="email" name="email" class="form-control form-white" placeholder="EMAIL">
				<input type="password" name="password" class="form-control form-white" placeholder="ПАРОЛЬ" id="password2">
                <input type="text" name="name" class="form-control form-white" placeholder="ВАШЕ ИМЯ">
                <input type="tel" name="phone" class="form-control form-white" placeholder="ТЕЛЕФОН">
                 <button type="submit" class="btn btn-submit reg-btn">ЗАРЕГИСТРИРОВАТЬСЯ</button>
                <div class="text-reg">
                    <a href="#login_2" class="open__modal-login_2">
                        ВОЙТИ В ЛИЧНЫЙ КАБИНЕТ
                    </a>
                </div>
			</form>
          <div class="popup-form--reg-img hidden-xs">
                    <div class="popup-form--text">
                        <h4>ASAT.kz</h4>
                        <p>Единый сервис доставки<br> еды и продуктов</p>
                    </div>
          </div>
		</div>
	</div>
</div><!-- End Register modal -->

<!-- COMMON SCRIPTS -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="/new_index/js/common_scripts_min.js"></script>
<script src="/new_index/js/functions.js"></script>
<script src="/new_index/assets/validate.js"></script>
<script type="text/javascript" src="{{ URL::asset('add/main.js') }}" ></script>

<!-- SPECIFIC SCRIPTS -->
<script src="/new_index/js/video_header.js"></script>
<script>
$(document).ready(function() {
	'use strict';
   	 HeaderVideo.init({
      container: $('.header-video'),
      header: $('.header-video--media'),
      videoTrigger: $("#video-trigger"),
      autoPlayVideo: true
    });

	$('.js_select_lang').click(function(){
		window.location.replace('/' + $(this).val());
	});
});
</script>

  <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'z7G6WHOsd5';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->

</body>
</html>
