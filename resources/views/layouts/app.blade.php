<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

    <title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/media/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/media/bootstrap/js/bootstrap.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="https://www.sitesoft.ru" target="_blank">Сайтсофт</a>
        <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Главная</a></li>
		@guest
            <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ Route('login') }}">Авторизация</a></li>
            <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ Route('register') }}">Регистрация</a></li>
		@endguest
        </ul>
		<!-- Authentication Links -->
		@guest
		@else
        <ul class="nav pull-right">
            <li><a>{{ Auth::user()->name }}</a></li>
            <li><a href="{{ Route('logout') }}">Выход</a></li>
        </ul>
		@endguest
    </div>
</div>

@yield('content')

</body>
</html>
