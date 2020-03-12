@extends('layouts.app')

@include('layouts.header')
@include('layouts.top_baner')
@include('layouts.footer')

@section('content')


<section class="p-top__news u-mb80 l-container">
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
    <div class="c-button__sns">
        <a href="" class="c-button__primary">もっとみる</a>
    </div>
</section>

<section class="p-top__members u-mb80 l-container">
    <div class="p-top__news--titleWrap u-mb20">
        <h3 class="p-top__news--title">Members</h3>
        <p class="p-top__news--titleSub">人気の美容師</p>
    </div>
    <div class="p-top-news__card u-mb40">
        <div class="p-top__news--item">
            <figure class="p-top__members--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category p-top__members__useName">ユーザー名</p>
            </div>
            <div class="c-button__sns">
                <a href="" class="c-button__primary c-button__follow">+ フォロー</a>
            </div>
        </div>
        <div class="p-top__news--item">
            <figure class="p-top__members--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category p-top__members__useName">ユーザー名</p>
            </div>
            <div class="c-button__sns">
                <a href="" class="c-button__primary c-button__follow">+ フォロー</a>
            </div>
        </div>
        <div class="p-top__news--item">
            <figure class="p-top__members--img">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                {{-- イイネボタン --}}
                <img src="" alt="">
            </figure>
            <div class="p-top__news--text">
                <p class="p-top__news--category p-top__members__useName">ユーザー名</p>
            </div>
            <div class="c-button__sns">
                <a href="" class="c-button__primary c-button__follow">+ フォロー</a>
            </div>
        </div>
    </div>
    <div class="c-button__sns">
        <a href="" class="c-button__primary">もっとみる</a>
    </div>
</section>

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



{{-- @foreach ($posts as $post)
  <div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
      <div class="card">

        <div class="card-header align-items-center d-flex">
          <a class="no-text-decoration" href="/users/{{ $post->user->id }}">
@if ($post->user->profile_photo)
<img class="post-profile-icon round-img" src="{{ asset('storage/user_images/' . $post->user->profile_photo) }}" />
@else
<img class="post-profile-icon round-img" src="{{ asset('/images/blank_profile.png') }}" />
@endif
</a>
<a class="black-color no-text-decoration" title="{{ $post->user->name }}" href="/users/{{ $post->user->id }}">
    <strong>{{ $post->user->name }}</strong>
</a>
@if ($post->user->id == Auth::user()->id)
<a class="ml-auto mx-0 my-auto" rel="nofollow" href="/postsdelete/{{ $post->id }}">
    <div class="delete-post-icon">削除する
    </div>
</a>
@endif
</div>

<a href="/users/{{ $post->user->id }}">
    <img src="/storage/post_images/{{ $post->id }}.jpg" class="card-img-top" />
</a>

<div class="card-body">
    <div class="row parts">
        <div id="like-icon-post-{{ $post->id }}">
            @if ($post->likedBy(Auth::user())->count() > 0)
            <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE"
                href="/likes/{{ $post->likedBy(Auth::user())->firstOrFail()->id }}">いいねを取り消す</a>
            @else
            <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST"
                href="/posts/{{ $post->id }}/likes">いいね</a>
            @endif
        </div>
        <a class="comment" href="#"></a>
    </div>
    <div id="like-text-post-{{ $post->id }}">
        @include('post.like_text')
    </div>
    <div>
        <span><strong>{{ $post->user->name }}</strong></span>
        <span>{{ $post->caption }}</span>

        <div id="comment-post-{{ $post->id }}">
            @include('post.comment_list')
        </div>
        <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a>
        <hr>
        <div class="row actions" id="comment-form-post-{{ $post->id }}">
            <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8"
                data-remote="true" method="post"><input name="utf8" type="hidden" value="✓" />
                {{csrf_field()}}
                <input value="{{ Auth::user()->id }}" type="hidden" name="user_id" />
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text"
                    name="comment" />
            </form>
        </div>
    </div>
</div>


</div>
</div>
</div>
@endforeach --}}

@endsection
