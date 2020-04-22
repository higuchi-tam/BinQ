@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('content')
<div class="l-2col">
    <section class="u-mb80">

        @include('users.user')
        @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])

        <div class="c-3col__container u-mb40 l-container">
            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
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
                <a href="{{ route('articles.index')}}" class="c-button__sidebar">人気記事一覧</a>
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