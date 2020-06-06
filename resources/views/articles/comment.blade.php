<div class="p-comment">
    <div class="p-comment__header">
        <span><img src="{{asset('images/comment.svg')}}" alt="コメント一覧"></span>コメント一覧
    </div>
    <div class="p-comment__items">
        @if($comments->count() === 0)
        <p　class="p-comment__empty">現在コメントはありません</p>
        @endif
        @foreach ($comments as $comment)
        <div class="p-comment__item u-pr50 js-comment__item">

            {{-- 投稿者の情報 --}}
            <div class="p-top__news--user u-mb20">
                <figure class="p-top__news--userImg">
                    @include('users.icon',['target_user' => $comment->user])
                </figure>
                <div class="p-top__news--userTxt">
                    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
                        {{ $comment->user->name }}</a>
                    <p class="p-top__news--date"> {{ $comment->created_at->format('Y/m/d  h:d') }}</p>
                </div>
            </div>

            {{-- コメント表示エリア --}}
            <div class="p-comment__preview js-comment__preview">{{ $comment->comment }}</div>
            {{-- コメント編集時のテキストエリア --}}
            <div class="p-comment__editArea js-comment__editArea">
                <form action="{{ route('comments.update' , $comment->id) }}" method="POST">
                    @csrf
                    <textarea class="p-comment__textarea" name="comment" id="" cols="30"
                        rows="10">{{ $comment->comment }}</textarea>
                    <ul class="p-comment__editArea__btns">
                        <li>
                            <a
                                class="p-comment__editArea__btn p-comment__editArea__btn--cancel js-comment__canselBtn">キャンセル</a>
                        </li>
                        <li>
                            <button type="submit"
                                class="p-comment__editArea__btn p-comment__editArea__btn--update">更新</button>
                        </li>
                    </ul>
                </form>
            </div>

            {{-- コメントの編集・削除ボタン --}}
            <div class="p-comment__icon js-comment__icon">
                <img src="/images/action-icon.svg" alt="コメントの編集・削除ボタン" width="15" height="15">
            </div>
            <div class="p-comment__actions js-comment__action">
                <ul>
                    <li>
                        <a href="javascript:void(0)" class="p-comment__action js-comment__editBtn">編集</a>
                    </li>
                    <li class="p-comment__action__list">

                        <form action="{{ route('comments.destroy' , $comment->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="p-comment__action js-comment__deleteBtn">削除</button>
                        </form>
                    </li>
                </ul>
            </div>
            {{-- コメント編集・削除ボタン表示時の、キャンセル用オーバーレイ --}}
            <div class="p-comment__action__overlay js-comment__action__overlay"></div>
            <comment-like :initial-is-liked-by='@json($comment->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($comment->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('comments.like', ['comment' => $comment]) }}"></comment-like>
            <a href="/likes/comments/{{ $comment->id }}" class="c-likeList">いいねした人一覧</a>
        </div>
        @endforeach
    </div>

    <div class="p-comment__modal" id="js-comment__modal">
        <div class="p-comment__modal__bg js-comment__modal__close"></div>
        <div class="p-comment__modal__inner">
            <header class="p-comment__modal__header">コメントの削除</header>
            <div class="p-comment__modal__main">コメントを削除します。<br>よろしいですか？</div>
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

    <div class="p-comment__header">
        <span><img src="{{asset('images/scissors-logo-menu.svg')}}" alt="コメントを投稿する"></span>コメントを投稿する
    </div>
    {{-- コメント入力欄 --}}
    <div class="p-comment__input">
        <form action="{{ route('comments.store' , $article->id) }}" method="POST">
            @csrf
            <textarea class="p-comment__textarea" name="comment" id="" cols="30" rows="10"
                placeholder="コメントする...">{{ old('comment') }}</textarea>
            <button type="submit" class="p-comment__submit">送信</button>
        </form>
    </div>
</div>