<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ config('app.name', 'BinQ') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kiwatchi1991" />
    <meta property="og:url" content="https://binq.kiwatchi.com/articles/91" />
    <meta property="og:title" content="サルワカの殿堂入り記事集" />
    <meta property="og:description" content="これまで公開してきた200以上の記事の中で、特に人気のあったものを紹介します。" />
    <meta property="og:site_name" content="BinQ" />
    <meta property="og:image" content="https://binq.kiwatchi.com/images/blank_profile.png" />
    {{-- @yield('meta_sns') --}}
    <!--CSS -->
    <!-- Styles -->
    {{-- TODO:本番環境ではsecure_assetに切り替える --}}
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <div class="l-wrapper">
        {{-- yieldは配置する場所を決めているだけ --}}
        @yield('header')

        @yield('top_baner')
        <div id="app">
            @yield('content')
        </div>
        @yield('footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>