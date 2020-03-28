@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}


@section('content')

<div class="l-2col">

    <section class="u-mb80">

        <div class="p-user_detail__userContainer">
            <figure class="p-user_detail__userImg">
                <img src="//localhost:3000/images/blank_profile.png" alt="記事投稿者のプロフィール画像">
            </figure>
            <div class="p-user_detail__wrap">
                <div class="p-user_detail__nameWrap">
                    <div class="p-user_detail__name">山田太郎</div>
                    <ul class="l-footer__snsList p-user_detail__snsList">
                        <li class="l-footer__snsItem p-user_detail__snsItem">
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
                　　<p class="p-user_detail__userTitle">テクニカルディレクター</p>
                <div class="p-user_detail__topicWrap">
                    <span class="p-user_detail__topicNum">記事数　<span>10</span></span>
                    <span class="p-user_detail__followNum">フォロー　<span>10</span></span>
                    <span class="p-user_detail__followerNum">フォロワー　<span>10</span></span>
                </div>
                <p class="p-user_detail__comment">
                    ご覧頂きありがとうございます！<br>
                    インスタやツイッターもやってるのでよろしかったら見ていってください！
                </p>
                <p class="p-user_detail__url">
                    <span>HP</span>
                    <a href="">https://www.binq.com/</a>
                </p>
            </div>
        </div>

        <div class="p-user_detail__tab">
            <ul class="p-user_detail__list">
                <li class="p-user_detail__item is-active">記事一覧</li>
                <li class="p-user_detail__item">人気の記事</li>
                <li class="p-user_detail__item">いいねした記事</li>
            </ul>
        </div>


        <div class="c-3col__container u-mb40 l-container">
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    <p class="p-top__news--category">CATEGORY</p>
                    <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
                </div>
                    <p class="p-top__news--date">2020.3.1</p>
            </div>
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    <p class="p-top__news--category">CATEGORY</p>
                    <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
                </div>
                    <p class="p-top__news--date">2020.3.1</p>
            </div>
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    <p class="p-top__news--category">CATEGORY</p>
                    <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
                </div>
                    <p class="p-top__news--date">2020.3.1</p>
            </div>
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    <p class="p-top__news--category">CATEGORY</p>
                    <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
                </div>
                    <p class="p-top__news--date">2020.3.1</p>
            </div>
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    <p class="p-top__news--category">CATEGORY</p>
                    <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
                </div>
                    <p class="p-top__news--date">2020.3.1</p>
            </div>
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    <p class="p-top__news--category">CATEGORY</p>
                    <p class="p-top__news--cardTitle">ここにテキストが入ります。ここにタイトルテキスtが入ります。ここにタイトルテキストが入ります。</p>
                </div>
                    <p class="p-top__news--date">2020.3.1</p>
            </div>

        </div>

        <div class="c-button__sns">
            ここにページネーションが入る。
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
