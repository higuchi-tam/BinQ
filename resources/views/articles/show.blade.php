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

                {{-- 編集・削除ボタン --}}
                <div class="p-article__actions js-article__action">
                    <ul>
                        <li>
                            <a href="{{ route('articles.edit',$article->id) }}" class="p-article__action js-article__editBtn">編集</a>
                        </li>
                        <li class="p-article__action__list">

                            <form action="{{ route('articles.destroy',$article->id) }}" method="POST" id="js-action__form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-article__action js-article__deleteBtn">削除</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="p-article__icon js-article__icon">
                    <img src="/images/action-icon.svg" alt="" width="15" height="15">
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
                                    <a href="javascript:void(0)" class="p-comment__modal__btn p-comment__modal__btn--delete"
                                        id="js-comment__modal__delete">削除</a>
                                </li>
                            </ul>
                        </footer>
                    </div>
                </div>
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