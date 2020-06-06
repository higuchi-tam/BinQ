@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')
@include('layouts.meta_sns',['type'=>'article'])

@section('content')
<div class="l-2col">
    <section class="l-2col--main u-mb80">
        <div class="p-article_show">
            <div class="p-article_show__inner">
                <div class="p-article_show__titleWrap">
                    <div class="p-article_show__title">{{ $article->title }}</div>

                    {{-- 編集・削除ボタン --}}
                    @if( Auth::id() === $article->user->id )
                    <div class="p-article__icon js-article__icon">
                        <img src="/images/action-icon.svg" alt="編集・削除ボタン" width="15" height="15">
                    </div>
                    @endif
                </div>
                @if( Auth::id() === $article->user->id )
                <div class="p-article__actions js-article__action">
                    <ul>
                        <li>
                            <a href="{{ route('articles.edit',$article->id) }}"
                                class="p-article__action js-article__editBtn">編集</a>
                        </li>
                        <li class="p-article__action__list">

                            <form action="{{ route('articles.destroy',$article->id) }}" method="POST"
                                id="js-action__form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-article__action js-article__deleteBtn">削除</button>
                            </form>
                        </li>
                    </ul>
                </div>

                {{-- 削除ボタン押したときのモーダル --}}
                <div class="p-article__action__overlay js-article__action__overlay"></div>
                <div class="p-comment__modal" id="js-comment__modal">
                    <div class="p-comment__modal__bg js-comment__modal__close"></div>
                    <div class="p-comment__modal__inner">
                        <header class="p-comment__modal__header"> コメントの削除</header>
                        <div class="p-comment__modal__main">コメントを削除します。よろしいですか？</div>
                        <footer class="p-comment__modal__footer">
                            <ul class="p-comment__modal__btns">
                                <li>
                                    <button type="button"
                                        class="p-comment__modal__btn p-comment__modal__btn--cancel js-comment__modal__close">
                                        キャンセル
                                    </button>

                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="p-comment__modal__btn p-comment__modal__btn--delete"
                                        id="js-comment__modal__delete">削除</a>
                                </li>
                            </ul>
                        </footer>
                    </div>
                </div>
                @endif
                {{-- タグ表示 --}}
                <div class="p-article_show__tag_date">
                    <div class="p-article_show__tag">
                        @foreach($article->tags as $tag)
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="">
                            {{ $tag->hashtag }}
                        </a>
                        @endforeach
                    </div>
                    <div class="p-article_show__date">
                        <div class="p-article_show__created">
                            <span><img src="{{ asset('images/post.svg') }}" alt="投稿日"></span>投稿日：
                            {{ $article->created_at->format('Y.m.d') }}
                        </div>
                        <div class="p-article_show__updated">
                            <span><img src="{{ asset('images/reload.svg') }}" alt="最終更新"></span>最終更新：
                            {{ $article->updated_at->format('Y.m.d') }}
                        </div>
                    </div>
                </div>

                <div class="p-article_show__img"><img src="{{asset('/storage/'.$article->img)}}" alt="記事のヘッダー画像"></div>
                <div class="p-article_show__body">{!! $article->body !!}</div>
            </div>
        </div>
        <div class="p-article_show__footer">
            <div class="p-article_show__like">
                <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
                    endpoint="{{ route('articles.like', ['article' => $article]) }}">
                </article-like>
                <a href="/likes/articles/{{ $article->id }}" class="c-likeList">いいねした人一覧</a>
            </div>
            <ul class="p-article_show__snsList">
                <li>SHARE</li>
                <li class="p-article_show__snsItem">
                    <a href="http://twitter.com/share?url=シェアするURL&text=文言" target="_blank">
                        <img src="/images/tw-article-footer.svg" alt="twitterシェア"></a>

                </li>
                <li class="p-article_show__snsItem">
                    <a href="http://www.facebook.com/share.php?{URL}" rel="nofollow" target="_blank">
                        <img src="/images/fb-article-footer.svg" alt="facebookシェア"></a>
                </li>
            </ul>
        </div>
        @include('users.user_article')
        @include('articles.comment')
    </section>
    {{-- サイドバー読み込み --}}
    @include('layouts.sidebar')
</div>
@endsection