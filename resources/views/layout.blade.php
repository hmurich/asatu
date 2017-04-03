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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('include.css_links')
</head>
<body class='@yield('body_class')'>
	<header class="header @yield('header_class')">
		@include('include.top_panel')
        @section('top_block')
        @show
	</header>

    @yield('content')

    <div id="overlay"></div>

    @include('include.footer')

    @include('include.message')

    @include('modals.login')
    @include('modals.forgot_pass')
    @include('modals.registr_restoran')

    @include('include.js_links')
</body>
</html>
