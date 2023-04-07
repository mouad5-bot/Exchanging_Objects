 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
    <link href="@yield('css')" type="text/css" rel="stylesheet">
    

    <!-- Scripts -->
    @vite(['resources/css/style.js', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" fixed-top>
            {{-- <div class="container"> --}}
                <a class="navbar-brand logo-img ms-5 mt-2" href="{{ url('/') }}">
                   <img src="{{ asset('assets/images/logo.png') }}"  alt="Ntbadlo | Exchange">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ms-auto ">
                        <li class="nav-item me-4">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li> 
                        <li class="nav-item me-4">
                            <a class="nav-link {{ request()->routeIs('aboutus.about') ? 'active' : '' }}" href="{{ route('aboutus.about') }}">about</a>
                        </li> 
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item me-4 ">

                                    <a class="nav-link" href="{{ route('users/profile' , Auth::user()->id) }}">
                                      Profile( {{ Auth::user()->name }} )
                                    </a>
                            </li>
                            <li class="nav-item me-4">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            {{-- </div> --}}
        </nav>

        @if ($errors->any())
        <div class="flash-error mt-5 text-center">
            <h3> There is an error, please check out ! </h3>
             @foreach ($errors->all() as $error)
                <p> {{ $error }} </p>
            @endforeach 
        </div>
    @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html> 

