<div class="p-topbaner__sp">
    <div class="c-3col__container u-mb40 l-container">
        {{-- 記事表示生成　新しい順に表示 --}}
        @foreach($articles as $article)
        @include('articles.card')
        @endforeach
    </div>
</div>