<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- <link rel="stylesheet" href="{{ asset('js/slick/slick-theme.css') }}" type="text/css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('js/slick/slick.css') }}" type="text/css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/banner.css') }}"> -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <form action="{{ route('search') }}" method="post">
                    @csrf
                    <select name="type"　class="form-control-sm" style="margin-right:-5px;">
                        <option value="0">全て</option>
                        @foreach( App\Models\Type::$types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="search"　id="search" class="form-control-sm" placeholder="商品検索">
                    </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ url('/mycart') }}">
                                       カートを見る
                                    </a>

                                    <a class="dropdown-item" href="{{ url('/history') }}">
                                       購入履歴を見る
                                    </a>
                                </div>
                            </li>
                            <a href="{{ url('/mycart') }}" >
                               <img src="{{ asset('image/cart.png') }}" class="cart" >
                            </a>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer_design">

        @guest
           <p class="nav-item" style="display:inline;">
               <a class="nav-link" href="{{ route('login') }}" style="color:#fefefe; display:inline;">{{ __('ログイン') }}</a>

           @if (Route::has('register'))

                   <a class="nav-link" href="{{ route('register') }}" style="color:#fefefe; display:inline;">{{ __('会員登録') }}</a>
               </p>
           @endif
       
        @endguest
       <br>
       <div style="margin-top:24px;">
       なんでも売ります<br>
       <p style="font-size:2.4em">Larashop</p><br>
       </div>

       <p style="font-size:0.7em;">@copyright @mukae9</p>

   </footer>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="{{ asset('js/slick/slick.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/banner.js') }}"></script>
</body>
</html>
