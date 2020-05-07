<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VCDN - Planet Nine Vast Configurator</title>

    <link rel="stylesheet" href="https://vjs.zencdn.net/7.7.5/video-js.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/videojs-contrib-ads@6.6.5/dist/videojs-contrib-ads.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/videojs-logobrand@1.0.3/src/videojs.logobrand.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.6.5/videojs-contrib-ads.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-ima/1.5.0/videojs.ima.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-logobrand@1.0.3/src/videojs.logobrand.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
