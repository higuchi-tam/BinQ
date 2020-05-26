@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('top_baner')
<div class="">
    <div class="p-topbaner__container">
        <div class="p-topbaner__titleWrap">
            <h2 class="p-topbaner__title">美容師で、<br>つながる。</h2>
            <p class="p-topbaner__titleSub">美容師だけのSNSブログ"BinQ"</p>
            <div class="c-btn__roundWrap">
                <a href="" class="c-btn__round">今すぐ始める</a>
            </div>
        </div>
        <div class="p-topbaner__mainImg">
            <img src="images/top-baner.jpg" alt="メイン画像">
        </div>

    </div>
    {{-- PC用 --}}
    {{-- <div class="p-topbaner__articles pc"> --}}
    @include('layouts.top.pc')
    @include('layouts.top.sp')

    {{-- @include('articles.card') --}}
    {{-- </div> --}}
    {{-- SP用 --}}
    {{-- <div class="p-topbaner__articles sp">
        @include('layouts.top.sp')
    </div> --}}



</div>
<section class="p-top__step u-mb80 l-container">
    <div class="p-top__step--titleWrap l-container">
        <h3 class="p-top__news--title">Step</h3>
        <p class="p-top__news--titleSub">3ステップでカンタンにつながる。</p>
    </div>
    <div class="p-top-step__card u-mb40 l-container">

        <div class="p-top__step--item">
            <div class="p-top__step--imgWrap">
                <p class="p-top__figure--number">01.</p>
                <figure class="p-top__step--img">
                    <img src="{{ asset('images/home/01.png') }}" alt="記事のメイン画像">
                </figure>
            </div>
            <p class="p-top__step--text">新規登録</p>
        </div>

        <figure class="p-top__arrow">
            <img src="{{ asset('images/arrow.png') }}" alt="矢印">
        </figure>

        <div class="p-top__step--item">
            <div class="p-top__step--imgWrap">
                <figure class="p-top__step--img">
                    <p class="p-top__figure--number">02.</p>
                    <img src="{{ asset('images/home/02.png') }}" alt="記事のメイン画像">
                </figure>
            </div>
            <p class="p-top__step--text">ログイン</p>
        </div>

        <figure class="p-top__arrow">
            <img src="{{ asset('images/arrow.png') }}" alt="矢印">
        </figure>

        <div class="p-top__step--item">
            <div class="p-top__step--imgWrap">
                <figure class="p-top__step--img">
                    <p class="p-top__figure--number">03.</p>
                    <img src="{{ asset('images/home/03.png') }}" alt="記事のメイン画像">
                </figure>
            </div>
            <p class="p-top__step--text">記事投稿して<br>美容師でつながろう！</p>
        </div>

    </div>
    <div class="c-button__sns p-top__step--btn">
        <a href="" class="c-button__primary">新規会員登録</a>
    </div>
</section>

<section class="p-top__about u-mb80 l-container">
    <div class="p-top__about--titleWrap l-container">
        <h3 class="p-top__news--title u-mb20">About BinQ</h3>
        <p class="p-top__news--titleSub">”BinQ”は、<br>
            「もっと美容師同士で繋がりたい（仮）」の思いから生まれた<br>
            美容師だけのSNSブログサービスです。</p>
    </div>
    <div class="p-top-step__card u-mb60 l-container">
        <div class="p-top__about--item">
            <figure class="p-top__about--img">
                <p class="p-top__figure--text">Skills</p>
                <img src="{{ asset('images/home/04.png') }}" alt="記事のメイン画像">
            </figure>
            <div class="p-top__about--text">
                <p class="p-top__about--textTop">スキル・知識を自由に発信</p>
                <p class="p-top__about--textLeft">あなたの経験は大切な財産になります。<br>
                    スキルや知識を発信すると、多くの人に自分のことを知ってもらうことができます。
                </p>
            </div>
        </div>
        <div class="p-top__about--item">
            <figure class="p-top__about--img">
                <p class="p-top__figure--text">Community</p>
                <img src="{{ asset('images/home/05.png') }}" alt="記事のメイン画像">
            </figure>
            <div class="p-top__about--text">
                <p class="p-top__about--textTop">美容師だけのコミュニティ</p>
                <p class="p-top__about--textLeft">発信するのも、読むのも美容師。<br>
                    どのSNSよりも共感が生まれ「いいね」「フォロワー」が生まれるプラットフォームです。
                </p>
            </div>
        </div>
        <div class="p-top__about--item">
            <figure class="p-top__about--img">
                <p class="p-top__figure--text">For Free！</p>
                <img src="{{ asset('images/home/06.png') }}" alt="記事のメイン画像">
            </figure>
            <div class="p-top__about--text">
                <p class="p-top__about--textTop">利用料は完全無料</p>
                <p class="p-top__about--textLeft">美容師なら誰でも登録できます。<br>
                    お金は一切かかりません。ブログ発信も自由に行うことができます。
                </p>
            </div>
        </div>
    </div>

</section>
<div class="c-button__sns u-mb100">
    <a href="" class="c-button__primary">今すぐはじめる</a>
</div>
@endsection