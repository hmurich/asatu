<!DOCTYPE html>
<html>
<head>
    <title>
        Ас Акелу - @yield('title')
    </title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="keyword" content="@yield('keyword')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/normalize.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slide.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/animate.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.fancybox.css') }}" >

</head>
<body>
	<header class="header video-header">
		@include('include.top_panel')
        @section('top_block')
        @show
	</header>

    @yield('content')

    @include('include.footer')

    @include('modals.login')
    @include('modals.forgot_pass')

    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('js/range.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.fancybox.pack.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('js/tab.js') }}" ></script>

    <script>
        new WOW().init();
    </script>
</body>
</html>
