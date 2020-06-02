<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
    <title>{{ config('app.name', 'BinQ') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta_sns')
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