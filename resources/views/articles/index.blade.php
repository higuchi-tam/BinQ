@extends('layouts.app')

@include('layouts.header' ,['hasArticles' => true, 'hasLikes' => false])
@include('layouts.footer')

@section('content')

<div class="l-2col">

    <section class="u-mb80">

        <div class="p-top__news--titleWrap u-mb20">
            <h3 class="p-top__news--title c-contents__title">最新の記事</h3>
        </div>

        <div class="l-tabs">
            @include('layouts.tabs',['currentPage'=> "articles.index"])
        </div>

        <div class="c-3col__container u-mb40 l-container">
            {{-- 記事表示生成　新しい順に表示 --}}
            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
        </div>


        {{-- ページネーション --}}
        @include('layouts.paginate')
    </section>

    {{-- サイドバー読み込み --}}
    @include('layouts.sidebar')

</div>
@endsection