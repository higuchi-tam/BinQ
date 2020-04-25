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
            href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }} </a>
    </div>

    {{-- タグ表示 --}}
    @foreach($article->tags as $tag)
    @if($loop->first)
    <div class="card-body pt-0 pb-4 pl-3">
        <div class="p-card__tag">
            @endif
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                {{ $tag->hashtag }}
            </a>
            @if($loop->last)
        </div>
    </div>
    @endif
    @endforeach

    {{-- 投稿者の情報 --}}
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
            <p class="p-top__news--date"> {{ $article->created_at->format('Y/m/d') }}</p>
        </div>


    </div>


</div>
