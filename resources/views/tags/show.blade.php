@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('title', $tag->hashtag)

@section('content')
<div class="l-2col">
    <section class="u-mb80">

        <div class="p-user__news--titleWrap u-mb20">
            <h3 class="p-user__news--title c-contents__title">{{ $tag->hashtag }}</h3>
        </div>

        <div class="l-tabs">
            @include('layouts.tabs',['currentPage'=> $tag->name ])
        </div>

        <div class="c-3col__container u-mb40 l-container">
            @foreach($tag->articles as $article)
            @include('articles.card')
            @endforeach
        </div>
    </section>
</div>
@endsection

@section('content')