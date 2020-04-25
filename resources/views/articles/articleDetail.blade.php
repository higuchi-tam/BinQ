<div class="c-3col__item">
    <figure class="p-top__news--img">
        {{-- TODO:動的に切り替える --}}
        <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
    </figure>

    {{-- いいねボタン --}}
    <div>
        <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
            :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
            endpoint="{{ route('articles.like', ['article' => $article]) }}">
        </article-like>
    </div>
　　
    {{-- タイトル表示 --}}
    <div class="p-top__news--text">
        <a class="p-top__news--cardTitle"
            href="{{ route('articles.detail', ['article' => $article]) }}">{{ $article->title }} </a>
    </div>

    {{-- タグ表示 --}}
    @foreach($article->tags as $tag)
    @if($loop->first)
    <div class="card-body pt-0 pb-4 pl-3">
        <div class="card-text line-height">
            @endif
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                {{ $tag->hashtag }}
            </a>
            @if($loop->last)
        </div>
    </div>
    @endif
    @endforeach

    <div class="p-top__news--user">
        <figure class="p-top__news--userImg">
            <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
                @if ($article->user->profile_photo)
                <img class="round-img" src="{{ asset('storage/user_images/' . $article->user->profile_photo) }}" />
                @else
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
                @endif
            </a>
        </figure>
        <div class="p-top__news--userTxt">
            <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
                {{ $article->user->name }}
            </a>
            <p class="p-top__news--date"> {{ $article->created_at->format('Y/m/d H:i') }}</p>
        </div>


    </div>

    {{-- @if( Auth::id() === $article->user_id )
    <!-- dropdown -->
    <div class="js-dropdown"></div>
    <div>
        <a href="{{ route("articles.edit", ['article' => $article]) }}">
            記事を更新する
        </a>
        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
            記事を削除する
        </a>
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
    @endif --}}
    {{-- ここまで追加 --}}
</div>
