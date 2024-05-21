<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{ asset('js/slide.js') }}"></script>

    <!-- Style --> 
    <link rel="stylesheet" href="https://unpkg.com/destyle.css@3.0.2/destyle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/top.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/delivery.css') }}"> 


</head>
<body>
    <div id="app">
        <main class="py-4">

        @unless(Request::is('login') || Request::is('register'))
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="navbar_wrap" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="nav_area">
                        <ul class="main_nav">
                            <li class="nav_btn size_a"><a href="">時間割</a></li>
                            <li class="nav_btn size_a"><a href="">授業進捗</a></li>
                            <li class="nav_btn size_b"><a href="">プロフィール設定</a></li>
                        </ul> 
                </div>
                    
                <div class="nav_area">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav_item">
                            <a class="nav-link" href="{{ route('user.show.login') }}">ログイン</a>
                        </li>
                        @endif
                        @else
                        <li class="nav_item dropdown">
                            
                            <div class="dropdown_menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.show.login') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                ログアウト
                                </a>
                            
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                </div>
        </div>
        </nav>
        @endunless

            @yield('content')

        </main>
    </div>
</body>
</html>
