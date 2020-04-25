<div>
    <figure class="p-top__news--img">
        {{-- TODO:動的に切り替える --}}
        <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
    </figure>
    <div>
        <a class="p-top__news--cardTitle"
            href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}
        </a>
        <div class="card-text">
            <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('articles.like', ['article' => $article]) }}">
            </article-like>
        </div>
    </div>
</div>

