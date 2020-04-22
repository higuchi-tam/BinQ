@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')

@section('content')

<div class="l-container l-2col">

    <section class="u-mb80">

        <div class="p-user__news--titleWrap u-mb20">
            <h3 class="p-user__news--title c-contents__title">美容師一覧</h3>
        </div>

        <div class="p-user__tab">
            <ul class="p-user__tab--list">
                <li class="p-user__tab--item is-active">人気美容師</li>
                <li class="p-user__tab--item">人気記事</li>
                <li class="p-user__tab--item">最近の記事</li>
                <li class="p-user__tab--item">カテゴリ</li>
                <li class="p-user__tab--item">カテゴリ</li>
            </ul>
        </div>

        <div class="c-3col__container u-mb40 l-container">
            @foreach ($all_users as $user)
            <div class="c-3col__item">
                <figure class="p-user__news--img">
                    <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}" class="rounded-circle"
                        width="50" height="50" />
                    {{-- イイネボタン --}}
                </figure>
                <div class="p-user__news--text">
                    <p class="p-user__news--category">
                    </p>
                    <p class="p-user__news--cardTitle"> {{ $user->name}}</p>
                </div>
                <div class="c-button__sns">
                    @if( Auth::id() !== $user->id )
                    <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                    </follow-button>
                    @endif
                </div>
            </div>
            @endforeach
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
                <a href="{{ route('articles.index')}}" class="c-button__sidebar">人気記事一覧</a>
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
