
@extends('layouts.app')

@include('layouts.header')
@include('layouts.top_baner')
@include('layouts.footer')

@section('content')

<div class="l-container l-2col">

<section class="u-mb80">
    <div class="p-top__news--titleWrap u-mb20">
        <h3 class="p-top__news--title">News</h3>
        <p class="p-top__news--titleSub">最新の記事</p>
    </div>
    <div class="p-top-news__card u-mb40">
        <div class="p-top__news--item">
            <figure class="p-top__news--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category">CATEGORY</p>
                <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
            </div>
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-top__news--userTxt">
                    <p class="p-top__news--useName">ユーザー名</p>
                    <p class="p-top__news--date">2020.3.1</p>
                </div>
            </div>
        </div>
        <div class="p-top__news--item">
            <figure class="p-top__news--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category">CATEGORY</p>
                <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
            </div>
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-top__news--userTxt">
                    <p class="p-top__news--useName">ユーザー名</p>
                    <p class="p-top__news--date">2020.3.1</p>
                </div>
            </div>
        </div>
        <div class="p-top__news--item">
            <figure class="p-top__news--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category">CATEGORY</p>
                <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
            </div>
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-top__news--userTxt">
                    <p class="p-top__news--useName">ユーザー名</p>
                    <p class="p-top__news--date">2020.3.1</p>
                </div>
            </div>
        </div>
    </div>
    <div class="p-top-news__card u-mb40">
        <div class="p-top__news--item">
            <figure class="p-top__news--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category">CATEGORY</p>
                <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
            </div>
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-top__news--userTxt">
                    <p class="p-top__news--useName">ユーザー名</p>
                    <p class="p-top__news--date">2020.3.1</p>
                </div>
            </div>
        </div>
        <div class="p-top__news--item">
            <figure class="p-top__news--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category">CATEGORY</p>
                <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
            </div>
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-top__news--userTxt">
                    <p class="p-top__news--useName">ユーザー名</p>
                    <p class="p-top__news--date">2020.3.1</p>
                </div>
            </div>
        </div>
        <div class="p-top__news--item">
            <figure class="p-top__news--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category">CATEGORY</p>
                <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
            </div>
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-top__news--userTxt">
                    <p class="p-top__news--useName">ユーザー名</p>
                    <p class="p-top__news--date">2020.3.1</p>
                </div>
            </div>
        </div>
    </div>
    <div class="c-button__sns">
        <a href="" class="c-button__primary">もっとみる</a>
    </div>
</section>

<section class="c-sidebar">
    <div class="c-members">
        <div class="c-members__item">
            <figure class="c-members__img">
                <img src="" alt="プロフィール写真">
            </figure>
            <p class="c-members__name">ユーザー名</p>
        </div>
    </div>
</section>


</div>
@endsection
