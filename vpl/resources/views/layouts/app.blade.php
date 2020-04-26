<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VCDN - Planet Nine Vast Configurator</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="{{ asset('js/videojs-ie8.min.js') }}"></script>
    <script src="{{ asset('js/video.js') }}"></script>
    <script src="{{ asset('js/videojs-logobrand.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/videojs.ads.css') }}" rel="stylesheet">
    <link href="{{ asset('css/videojs.ima.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/videojs.logobrand.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    VIDEO-JS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}">{{ __('Admin Panel') }}</a>
                        </li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{Auth::user()->last_name}} <span class="caret"></span>
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
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>




    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script type="text/javascript" src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script src="{{ asset('js/videojs.ima.js') }}" defer></script>
    <script src="{{ asset('js/videojs.ads.min.js') }}" defer></script>

    @yield('scripts')
    
</body>
</html>
