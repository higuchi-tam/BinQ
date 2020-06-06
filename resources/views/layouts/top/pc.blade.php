<div class="p-topbaner__pc">
    <div class="p-top__news--titleWrap u-mb40">
        <h3 class="p-top__news--title">News</h3>
        <p class="p-top__news--titleSub u-pl20">最新の記事</p>
    </div>

    <div class="p-topbaner__articles pc">
        <img src="/images/slide_prev.svg" alt="" class="p-topbaner__slidePrev" id="js-slide__prev--art">
        <div class="p-topbaner__articles__inner">
            <ul class="p-topbaner__articleSlider" id="js-slider--art">
                {{-- 記事表示生成　新しい順に表示 --}}
                @foreach($articles as $article)
                <li class="p-topbaner__articleItem js-slide__item--art">
                    @include('articles.card_inner')
                </li>
                @endforeach
            </ul>
        </div>
        <img src="/images/slide_next.svg" alt="" class="p-topbaner__slideNext" id="js-slide__next--art">
    </div>
    <div class="p-topbaner__linkBtn">
        <a href="/likeIndex" class="c-button__primary">人気記事一覧</a>
    </div>

    <div class="p-top__news--titleWrap u-mb40">
        <h3 class="p-top__news--title">Members</h3>
        <p class="p-top__news--titleSub u-pl20">人気の美容師</p>
    </div>

    <div class="p-topbaner__users pc">
        <img src="/images/slide_prev.svg" alt="" class="p-topbaner__slidePrev" id="js-slide__prev--usr">
        <div class="p-topbaner__users__inner">
            <ul class="p-topbaner__usersSlider" id="js-slider--usr">
                {{-- 記事表示生成　新しい順に表示 --}}
                @foreach ($users as $user)
                <li class="p-topbaner__usersItem js-slide__item--usr">
                    <a href="{{ route('users.show',$user->userId) }}">
                        <figure class="p-user__news--img">
                            @include('users.icon',['target_user' => $user])
                        </figure>
                        <div class="p-user__news--text">
                            <p class="p-user__news--category">
                            </p>
                            <p class="p-user__news--cardTitle"> {{ $user->name}}</p>
                        </div>
                    </a>
                    <div class="c-button__sns">
                        <follow-button class="ml-auto"
                            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                            :authorized='@json(Auth::check())'
                            endpoint="{{ route('users.follow', ['name' => $user->userId]) }}">
                        </follow-button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <img src="/images/slide_next.svg" alt="" class="p-topbaner__slideNext" id="js-slide__next--usr">
    </div>
    <div class="p-topbaner__linkBtn">
        <a href="/users" class="c-button__primary">人気の美容師一覧</a>
    </div>
</div>