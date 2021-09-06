<!doctype html>
<html class="antialiased" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/css/form.min.css" rel="stylesheet">
    <link href="assets/css/tailwind.css" rel="stylesheet">
    <link href="assets/css/base.css" rel="stylesheet">
    <link href="assets/css/main_page_template_styles.css" rel="stylesheet">
    
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    
    <link href="assets/js/vendor/slick.css" rel="stylesheet">
    <script src="assets/js/vendor/slick.min.js"></script>
    
    <script src="assets/js/script.js"></script>
    <title>Рога и Сила - Главная страница</title>
    <link href="assets/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
    <div class="wrapper flex flex-1 flex-col">

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

    </div>
</body>
</html>