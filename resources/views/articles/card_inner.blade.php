<a href="{{ route('articles.show',$article->id) }}">
    <figure class="p-top__news--img">
        {{-- TODO:動的に切り替える --}}
        @include('articles.img')
    </figure>
</a>

{{-- いいねボタン --}}
<div>
    <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
        endpoint="{{ route('articles.like', ['article' => $article]) }}">
    </article-like>
</div>
　　
{{-- タグ表示 --}}
<div class="p-card__tag">
    @foreach($article->tags as $tag)
    <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
        {{ $tag->hashtag }}
    </a>
    @endforeach
</div>
{{-- タイトル表示 --}}
<div class="p-top__news--text">
    <a class="p-top__news--cardTitle" href="{{ route('articles.show', ['article' => $article]) }}">{{ $article->title }}
    </a>
</div>


{{-- 投稿者の情報 --}}
<div class="p-top__news--user">
    <figure class="p-top__news--userImg">
        @include('users.icon',['target_user' => $article->user])
    </figure>
    <div class="p-top__news--userTxt">
        <a href="{{ route('users.show', ['name' => $article->user->userId]) }}" class="text-dark">
            {{ $article->user->name }}
            <p class="p-top__news--date"> {{ $article->created_at->format('Y/m/d') }}</p></a>
    </div>


</div>
