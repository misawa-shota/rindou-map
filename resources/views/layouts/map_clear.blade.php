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

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- leaflet.css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- geocoder.css -->
    <link rel="stylesheet" href="//rawgit.com/k4r573n/leaflet-control-osm-geocoder/master/Control.OSMGeocoder.css">

    <!-- leaflet.locate -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

    <!-- fullscreen.css -->
    <link rel="stylesheet" href="{{ asset('css/Control.FullScreen.css') }}" />

    {{-- <!-- leaflet.draw -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.9/leaflet.draw-src.css' /> --}}

    <!-- markerCluster.css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        <main class="pt-4">
            @yield('content')
        </main>
        @component('components.footer')
        @endcomponent
    </div>
    <!-- leaflet.js -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABaSlpOUo9NuhOBHeGb2gKrs84g0uSG60" async defer></script>

    <!-- Leaflet.GridLayer.GoogleMutantプラグイン -->
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

    <!-- geocoder.js -->
    <script src="//rawgit.com/k4r573n/leaflet-control-osm-geocoder/master/Control.OSMGeocoder.js"></script>

    <!-- leaflet.locate.js -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

    <!-- fullscreen.js -->
    <script src="{{ asset('js/Control.FullScreen.js') }}"></script>

    {{-- <!-- leaflet.draw.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.9/leaflet.draw-src.js"></script> --}}

    <!-- markerCluster.js -->
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <!-- js -->
    <script type="text/javascript" src="{{ asset('js/map_clear.js') }}"></script>
</body>
</html>
