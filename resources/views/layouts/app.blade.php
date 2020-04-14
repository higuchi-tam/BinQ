<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name', 'Laravelgram') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--CSS -->
    <!-- Styles -->
    {{-- TODO:本番環境ではsecure_assetに切り替える --}}
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
      <div class="l-wrapper">
{{-- yieldは配置する場所を決めているだけ --}}
    @yield('header')

    @yield('top_baner')
        <div id="app">
            @yield('content')
        </div>

        {{-- 　@yield('sidebar') --}}


    @yield('footer')


</div>
<script src="{{ mix('js/app.js') }}"></script>

  </body>
</html>
