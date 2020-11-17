<li class="p-card__side">
    <figure class="p-card__side--img">
        {{-- TODO:動的に切り替える --}}
        <a href="{{ route('articles.show', ['article' => $article]) }}">
            <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
        </a>

    </figure>
    <div class="p-card__side--text">
        <a class="p-card__side--title"
            href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}
        </a>
        <div class="card-text">
            <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('articles.like', ['article' => $article]) }}">
            </article-like>
        </div>
    </div>
</li>
