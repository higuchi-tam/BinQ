@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}

@section('content')
<div class="l-2col">
    <section class="">
        <div class="p-article_show">
            <div class="p-article_show__inner">

                <div class="p-article_show__title">{{ $article->title }}</div>

                {{-- タグ表示 --}}
                <div class="p-article_show__tag_date">
                    <div class="p-article_show__tag">
                        @foreach($article->tags as $tag)
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}"
                            class="border p-1 mr-1 mt-1 text-muted">
                            {{ $tag->hashtag }}
                        </a>
                        @endforeach
                    </div>
                    <div class="p-article_show__date">
                        <div class="p-article_show__updated">
                            <span><img src="{{ asset('images/reload.svg') }}" alt=""></span>最終更新：
                            {{ $article->updated_at->format('Y.m.d') }}
                        </div>
                        <div class="p-article_show__created">
                            <span><img src="{{ asset('images/post.svg') }}" alt=""></span>投稿日：
                            {{ $article->created_at->format('Y.m.d') }}
                        </div>
                    </div>
                </div>

                <div class="p-article_show__img" style="background-image:url('{{asset('/storage/'.$article->img)}}')">
                </div>
                <div class="p-article_show__body">{!! $article->body !!}</div>
            </div>
        </div>

        @include('articles.comment')
    </section>
    {{-- サイドバー読み込み --}}
    @include('layouts.sidebar')
</div>
@endsection