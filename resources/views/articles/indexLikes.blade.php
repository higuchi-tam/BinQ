@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}


@section('content')

<div class="l-2col">

    <section class="u-mb80">

        <div class="p-top__news--titleWrap u-mb20">
            <h3 class="p-top__news--title c-contents__title">カテゴリ名</h3>
            <p class="p-top__news--titleSub">人気の記事</p>
        </div>
　　
        <div class="c-3col__container u-mb40 l-container">
            {{-- 記事表示生成　新しい順に表示 --}}
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
        </div>


        <div class="p-article__paginate">
            {{ $articles -> links() }}
        </div>
    </section>

    @include('layouts.sidebar')


</div>
@endsection
