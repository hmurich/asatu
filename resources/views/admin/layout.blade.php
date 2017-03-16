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

    @include('include.css_links')
</head>
<body class="second-page">
	<header class="header header-admin">
		@include('include.top_panel')
        @section('top_block')
        @show
	</header>

    <div class="container">
		<div class="container-inner">
			<div class="admin-content">
				<div class="admin-content__top">
					@include('admin.include.menu')
				</div>
                @yield('content')
            </div>
        </div>
    </div>

    @include('include.footer')

    @include('include.message')

    @include('include.js_links')
</body>
</html>
