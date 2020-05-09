<div class="p-comment">
    <div>
        <form action="{{ route('comments.store' , $article->id) }}" method="POST">
            @csrf
            <textarea class="p-comment__textarea" name="comment" id="" cols="30" rows="10"
                placeholder="コメントする...">{{ old('comment') }}</textarea>
            <button type="submit" class="p-comment__submit">送信</button>
        </form>
    </div>
    <div class="p-comment__items">
        @foreach ($comments as $comment)
        <div class="p-comment__item js-comment__item">

            {{-- 投稿者の情報 --}}
            <div class="p-top__news--user">
                <figure class="p-top__news--userImg">
                    {{-- <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark"> --}}
                    @if ($comment->user->profile_photo)
                    <img class="round-img" src="{{ asset('storage/user_images/' . $article->user->profile_photo) }}" />
                    @else
                    <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                    @endif
                    {{-- </a> --}}
                </figure>
                <div class="p-top__news--userTxt">
                    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}" class="text-dark">
                        {{ $comment->user->name }}</a>
                    <p class="p-top__news--date"> {{ $comment->created_at->format('Y/m/d') }}</p>
                </div>
            </div>


            <div class="p-comment__preview js-comment__preview">{{ $comment->comment }}</div>
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
            <div class="p-comment__icon js-comment__icon">
                <img src="/images/action-icon.svg" alt="" width="15" height="15">
            </div>

        </div>
        @endforeach
    </div>
    <div class="p-comment__modal" id="js-comment__modal">
        <div class="p-comment__modal__bg js-comment__modal__close"></div>
        <div class="p-comment__modal__inner">
            <header class="p-comment__modal__header"> コメントの削除</header>
            <div class="p-comment__modal__main">コメントを削除します。よろしいですか？</div>
            <footer class="p-comment__modal__footer">
                <ul class="p-comment__modal__btns">
                    <li>
                        <button type="button" class="p-comment__modal__btn p-comment__modal__btn--cancel"
                            id="js-comment__modal__close">
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
</div>