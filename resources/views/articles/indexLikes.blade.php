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

    <section class="l-sidebar l-container">
        <div class="c-members">
            <h4 class="c-category__title">人気の美容師</h4>
            <div class="u-mb20">
                <div class="c-members__item">
                    <figure class="c-members__img">
                        <img src="" alt="プロフィール写真">
                    </figure>
                    <p class="c-members__name">ユーザー名</p>
                </div>
                <div class="c-members__item">
                    <figure class="c-members__img">
                        <img src="" alt="プロフィール写真">
                    </figure>
                    <p class="c-members__name">ユーザー名</p>
                </div>
                <div class="c-members__item">
                    <figure class="c-members__img">
                        <img src="" alt="プロフィール写真">
                    </figure>
                    <p class="c-members__name">ユーザー名</p>
                </div>
                <div class="c-members__item">
                    <figure class="c-members__img">
                        <img src="" alt="プロフィール写真">
                    </figure>
                    <p class="c-members__name">ユーザー名</p>
                </div>
                <div class="c-members__item">
                    <figure class="c-members__img">
                        <img src="" alt="プロフィール写真">
                    </figure>
                    <p class="c-members__name">ユーザー名</p>
                </div>
            </div>
            <div class="c-button__sns">
                <a href="/users" class="c-button__sidebar">人気の美容師一覧</a>
            </div>
        </div>

        <div class="c-article">
            <h4 class="c-category__title">人気記事</h4>
            <div class="u-mb20">
                <div class="c-article__item">
                    <figure class="c-members__img">
                        <img src="" alt="記事画像">
                    </figure>
                    <div class="c-article__itemTxt">
                        <p class="c-members__name">ユーザー名</p>
                        <button>いいねボタン(いいね数の表示？）</button>
                    </div>
                </div>
                <div class="c-article__item">
                    <figure class="c-members__img">
                        <img src="" alt="記事画像">
                    </figure>
                    <div class="c-article__itemTxt">
                        <p class="c-members__name">ユーザー名</p>
                        <button>いいねボタン</button>
                    </div>
                </div>
                <div class="c-article__item">
                    <figure class="c-members__img">
                        <img src="" alt="記事画像">
                    </figure>
                    <div class="c-article__itemTxt">
                        <p class="c-members__name">ユーザー名</p>
                        <button>いいねボタン</button>
                    </div>
                </div>
                <div class="c-article__item">
                    <figure class="c-members__img">
                        <img src="" alt="記事画像">
                    </figure>
                    <div class="c-article__itemTxt">
                        <p class="c-members__name">ユーザー名</p>
                        <button>いいねボタン</button>
                    </div>
                </div>
                <div class="c-article__item">
                    <figure class="c-members__img">
                        <img src="" alt="記事画像">
                    </figure>
                    <div class="c-article__itemTxt">
                        <p class="c-members__name">ユーザー名</p>
                        <button>いいねボタン</button>
                    </div>
                </div>
            </div>

            <div class="c-button__sns">
            <a href="/likeIndex" class="c-button__sidebar">人気記事一覧</a>
            </div>
        </div>

        <div class="c-category u-mb100">
            <h4 class="c-category__title">カテゴリから探す</h4>
            <div>
                <p class="c-category__parents">
                    <a href="tags/カット">カット</a>
                </p>
                <ul class="c-category__list">
                    <li>子カテゴリ</li>
                </ul>
            </div>
            <div>
                <p class="c-category__parents">
                    <a href="tags/カラー">カラー</a>
                </p>
                <ul class="c-category__list">
                    <li>子カテゴリ</li>
                </ul>
            </div>
            <div>
                <p class="c-category__parents">
                    <a href="tags/パーマ">パーマ</a>
                </p>
                <ul class="c-category__list">
                    <li>子カテゴリ</li>
                </ul>
            </div>
        </div>



    </section>


</div>
@endsection
