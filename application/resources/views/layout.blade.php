<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'pardefaut')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <ul class="nav">
        <li> <a href="{{ route('home') }}"> home </a></li>
        <li> <a href="{{ route('about') }}"> about us </a></li>
    </ul>
    @yield('content')
</body>
</html>