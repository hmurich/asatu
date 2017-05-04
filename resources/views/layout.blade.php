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
    <link id="png16favicon" rel="icon" href="/img/favicon1.png" sizes="16x16"> 
    <link id="png32favicon" rel="icon" href="/img/favicon2.png" sizes="32x32">

    @include('include.css_links')
</head>
<body class='@yield('body_class')'>

	<header class="header @yield('header_class')">
		@section('top_panel')
            @include('include.top_panel')
        @show

        @section('top_block')
        @show
	</header>

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
