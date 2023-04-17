 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
    <link href="@yield('css')" type="text/css" rel="stylesheet">
    

    <!-- Scripts -->
    @vite(['resources/css/style.js', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body id="body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm  d-flex justify-content-between" fixed-top>
                <a class="navbar-brand logo-img ms-5 mt-2" href="{{ url('/') }}">
                   <img src="{{ asset('assets/images/logo.png') }}"  alt="Ntbadlo | Exchange">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav me-auto ms-auto ">
                        <li class="nav-item me-4">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a>
                        </li> 
                        <li class="nav-item me-4">
                            <a class="nav-link {{ request()->routeIs('aboutus.about') ? 'active' : '' }}" href="{{ route('aboutus.about') }}">about</a>
                        </li> 
                        @guest
                                @if (Route::has('login'))
                                    <div class="nav-item">
                                        <a class="btn btn-light text-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </div>
                                @endif

                                @if (Route::has('register'))
                                    <div class="nav-item">
                                        <a class="
                                        btn btn-dark text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                @endif
                        @else
                        <li class="nav-item me-4 ">
                            <a class="nav-link {{ request()->routeIs('chatify') ? 'active' : '' }}" href="{{ route('chatify' , Auth::user()->id) }}">
                                Chat
                            </a>
                        </li>
                        <li class="nav-item me-4 ">
                            <a class="nav-link {{ request()->routeIs('users/profile') ? 'active' : '' }}" href="{{ route('users/profile' , Auth::user()->id) }}">
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
        <hr class="border border-dark">
        <footer class="d-flex justify-content-center">
            <p>&copy; 2023 NtbadLo. All rights reserved.</p>
        </footer>      
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        // let table = new DataTable('#myTable');
            $(document).ready( function () {
        $('#myTable').DataTable();  
    } );
    </script>
    @yield('script')
</body>
</html> 

