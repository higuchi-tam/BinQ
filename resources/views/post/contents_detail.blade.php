@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')

@section('content')

<div class="l-container l-2col">

    <section class="u-mb80 l-2col--main l-container">
        <div class="u-mb20">
            <h3 class="p-top__news--title">記事タイトルが入ります</h3>
            <p class="">カテゴリ名が入ります。</p>
            <p class="p-contents_detail--date">2020.03.01</p>
        </div>

        <div class="c-button__sns u-mb80">
            <a href="" class="c-button__primary">もっとみる</a>
        </div>

        <div class="p-contents_detail__under">
            <div class="c-button--like">
                いいねボタンが入ります
            </div>
            <div class="p-contents_detail__share">
                <ul class="l-footer__snsList p-contents_detail__list">
                    <li class="p-contents_detail__shareItem">SHARE</li>
                    <li class="p-contents_detail__shareItem">
                        <a href="https://twitter.com/nishimachikid" target="blank">
                            <svg id="tw" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }

                                        .cls-1,
                                        .cls-2 {
                                            fill-rule: evenodd;
                                        }

                                        .cls-2 {
                                            fill: #1DA1F2;
                                        }
                                    </style>
                                </defs>
                                <path id="楕円形_26" data-name="楕円形 26" class="cls-1"
                                    d="M2619.92,3841a15,15,0,1,1,15.08-14.92A14.993,14.993,0,0,1,2619.92,3841Z"
                                    transform="translate(-2605 -3811)" />
                                <path id="パス_235" data-name="パス 235" class="cls-2"
                                    d="M2618.08,3831.57a7.539,7.539,0,0,0,7.59-7.59v-0.35a5.3,5.3,0,0,0,1.33-1.38,5.257,5.257,0,0,1-1.53.42,2.662,2.662,0,0,0,1.17-1.48,5.165,5.165,0,0,1-1.69.65,2.674,2.674,0,0,0-4.62,1.83,2.483,2.483,0,0,0,.07.61,7.591,7.591,0,0,1-5.5-2.79,2.735,2.735,0,0,0-.36,1.34,2.668,2.668,0,0,0,1.19,2.22,2.7,2.7,0,0,1-1.2-.34v0.04a2.652,2.652,0,0,0,2.14,2.61,2.344,2.344,0,0,1-.71.1,2.825,2.825,0,0,1-.5-0.05,2.661,2.661,0,0,0,2.49,1.85,5.308,5.308,0,0,1-3.31,1.14,4.49,4.49,0,0,1-.64-0.04A7.385,7.385,0,0,0,2618.08,3831.57Z"
                                    transform="translate(-2605 -3811)" />
                            </svg>
                        </a>
                    </li>
                    <li class="p-contents_detail__shareItem">
                        <a href="/images/fv.svg">
                            <svg id="fb" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <defs>
                                    <style>
                                        .fb-1 {
                                            fill: #fff;
                                        }

                                        .fb-2 {
                                            fill: #3B5998;
                                            fill-rule: evenodd;
                                        }
                                    </style>
                                </defs>
                                <circle id="楕円形_28" data-name="楕円形 28" class="fb-1" cx="15" cy="15" r="15" />
                                <path id="パス_231" data-name="パス 231" class="fb-2"
                                    d="M2667.33,3821.58h1.17v-1.99a16.324,16.324,0,0,0-1.71-.09,2.688,2.688,0,0,0-2.87,2.94v1.65H2662v2.23h1.92v5.71h2.29v-5.71h1.94l0.29-2.24h-2.22v-1.42A0.925,0.925,0,0,1,2667.33,3821.58Z"
                                    transform="translate(-2650 -3811)" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="p-contents_detail__userContainer">
            <div class="p-contents_detail__userWrap">
                <figure class="p-contents_detail__userImg">
                    <img src="//localhost:3000/images/blank_profile.png" alt="記事投稿者のプロフィール画像">
                </figure>
                <div class="p-contents_detail__userInfo">
                    <div class="p-contents_detail__userName">
                        <p class="">ユーザー名</p>
                        <p class="">肩書き</p>
                    </div>
                    <ul class="l-footer__snsList p-contents_detail__snsList">
                        <li class="l-footer__snsItem p-contents_detail__snsItem">
                            <a href="https://twitter.com/nishimachikid" target="blank"><img src="/images/tw.svg"
                                    alt=""></a>
                        </li>
                        <li class="l-footer__snsItem">
                            <a href="/images/fv.svg"><img src="/images/fb.svg" alt=""></a>
                        </li>
                        <li class="l-footer__snsItem">
                            <a href="/images/ins.svg"><img src="/images/ins.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="c-button__sns p-contents_detail--button">
                <a href="" class="c-button__primary c-button__follow">+ フォロー</a>
            </div>
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
                <a href="" class="c-button__sidebar">人気の美容師一覧</a>
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
                <a href="" class="c-button__sidebar">人気記事一覧</a>
            </div>
        </div>

        <div class="c-category u-mb100">
            <h4 class="c-category__title">カテゴリから探す</h4>
            <div>
                <p class="c-category__parents">親カテゴリ</p>
                <ul class="c-category__list">
                    <li>子カテゴリ</li>
                    <li>子カテゴリ</li>
                </ul>
            </div>
            <div>
                <p class="c-category__parents">親カテゴリ</p>
                <ul class="c-category__list">
                    <li>子カテゴリ</li>
                    <li>子カテゴリ</li>
                </ul>
            </div>
        </div>



    </section>


</div>
@endsection
