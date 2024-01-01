<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | 林道に特化したマップ検索サービス</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/favicon.ico') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="description" content="林道を検索するなら林道マップ! マップ上で林道の位置とルートが確認できるから分かりやすい。あなたの日常に冒険という選択肢を。">
    <meta name="keywords" content="林道,冒険,自然,アドベンチャー,マップ,林道マップ">
    <meta property="og:site_name" content="林道マップ">
    <meta property="og:title" content="林道マップ">
    <meta property="og:description" content="林道を検索するなら林道マップ! マップ上で林道の位置とルートが確認できるから分かりやすい。あなたの日常に冒険という選択肢を。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="{{ asset('storage/img/icon.svg') }}">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@rindoumap_net">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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

    {{-- javascript --}}
    <script src="{{ asset('js/postShow.js') }}"></script>
</body>
</html>
