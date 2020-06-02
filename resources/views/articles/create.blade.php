@extends('layouts.app')

@include('layouts.header')
@section('content')
<div class="l-2col">
        {{-- メイン読み込み --}}
        @include('articles.form')
        {{-- サイドバー読み込み --}}
        @include('articles.sidebar',['type' => 'create'])
</div>
@endsection