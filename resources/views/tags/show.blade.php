@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')

@section('title', $tag->hashtag)

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
            <div class="card-text text-right">
                {{ $tag->articles->count() }}件
            </div>
        </div>
    </div>
    @foreach($tag->articles as $article)
       @include('articles.card')
    @endforeach
</div>
@endsection
