{{-- @extends('layouts.app') --}}

{{-- @include('layouts.header') --}}
{{-- @include('layouts.top_baner') --}}
{{-- @include('layouts.footer') --}}
{{-- @include('layouts.sidebar') --}}


{{-- @section('content') --}}

        {{-- <div class="p-top__news--titleWrap u-mb20">
            <h3 class="p-top__news--title c-contents__title">カテゴリ名</h3>
            <p class="p-top__news--titleSub">最新の記事</p>
        </div> --}}

        {{-- <div class="c-3col__container u-mb40 l-container"> --}}
            {{-- 記事表示生成　新しい順に表示 --}}
            {{-- @foreach($articles as $article) --}}
            <div class="c-3col__item">
                <figure class="p-top__news--img">
                    {{-- TODO:動的に切り替える --}}
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
                    {{-- イイネボタン --}}
                    <img src="" alt="">
                </figure>
                <div class="p-top__news--text">
                    {{-- TODO:動的に切り替える --}}
                    <p class="p-top__news--category">CATEGORY</p>
                    <a class="p-top__news--cardTitle" href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }} </a>
                </div>
                <div class="p-top__news--user">
                    <figure class="p-top__news--userImg">
                        {{-- TODO:動的に切り替える --}}
                        <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                    </figure>
                    <div class="p-top__news--userTxt">
                        <p class="p-top__news--useName">{{ $article->user->name }}</p>
                        <p class="p-top__news--date"> {{ $article->created_at->format('Y/m/d H:i') }}</p>
                    </div>
                </div>

                @if( Auth::id() === $article->user_id )
                <!-- dropdown -->
                <div class="ml-auto card-text">
                    <div class="dropdown">
                        {{-- <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                            </button>
                        </a> --}}
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
                                記事を更新する
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" data-toggle="modal"
                                data-target="#modal-delete-{{ $article->id }}">
                                記事を削除する
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dropdown -->

                <!-- modal -->
                <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    {{ $article->title }}を削除します。よろしいですか？
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                    <button type="submit" class="btn btn-danger">削除する</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                @endif
                {{-- ここまで追加 --}}

            </div>

            {{-- @endforeach --}}
        {{-- </div> --}}


        {{-- <section class="l-sidebar l-container">
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

        </section> --}}
{{-- @endsection --}}
