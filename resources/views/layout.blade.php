<!DOCTYPE html>
<html>
<head>
    <title>
        Asat - @yield('title')
    </title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="keyword" content="@yield('keyword')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="google-site-verification" content="Gxh_Y4vf2XtO18IAK26qwEreYxd6IrNWAKBKOzLqQ6Y" />
    <link id="png16favicon" rel="icon" href="/img/favicon1.png" sizes="16x16"> 
    <link id="png32favicon" rel="icon" href="/img/favicon2.png" sizes="32x32">
    <!-- GOOGLE WEB FONT -->
    @include('include.css_links')
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>
</head>
<body class='@yield('body_class')'>

    <!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div><!-- End Preload -->

	<header class="header @yield('header_class')">
		@section('top_panel')
            @include('include.top_panel')
        @show
	</header>

    <!-- SubHeader =============================================== -->
    <section class="header-video">
        @section('top_block')
        @show
    </section><!-- End Header video -->
    <!-- End SubHeader ============================================ -->

    @yield('content')

    <div id="overlay"></div>

    @include('include.footer')

    @include('include.message')

    @include('modals.login')
    @include('modals.registr')
    @include('modals.forgot_pass')
    @include('modals.registr_restoran')

    @include('include.js_links')
    <!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'z7G6WHOsd5';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
