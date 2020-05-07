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
