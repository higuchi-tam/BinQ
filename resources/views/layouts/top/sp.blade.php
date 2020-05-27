<div class="p-topbaner__sp">
    <div class="p-topbaner__sp--articles">
        <div class="p-top__news--titleWrap u-mb40">
            <h3 class="p-top__news--title">News</h3>
            <p class="p-top__news--titleSub">最新の記事</p>
        </div>
        <div class="c-3col__container u-mb40 l-container">
            {{-- 記事表示生成　新しい順に表示 --}}
            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
        </div>
    </div>

    <div class="p-topbaner__sp--users">
        <div class="p-top__news--titleWrap u-mb40">
            <h3 class="p-top__news--title">Members</h3>
            <p class="p-top__news--titleSub">人気の美容師</p>
        </div>
        <div class="c-3col__container u-mb40 l-container">
            @foreach ($users as $user)
            @include('users.card')
            @endforeach
        </div>
    </div>
</div>