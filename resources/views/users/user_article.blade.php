<div class="p-user_article__userContainer">
    <figure class="p-user_article__userImg">
        <a href="{{ route('users.show', ['name' => $article->user->userId]) }}" class="text-dark">
            @include('users.icon',['target_user' => $article->user])
        </a>
    </figure>
    <div class="p-user_article__wrap">
        <ul class="p-user_article__user">
            <li class="p-user_article__name">
                {{ $article->user->name }}
            </li>
            　　<li class="p-user_article__userTitle">
                {{ $article->user->title }}
            </li>

            <li class="p-user_article__comment">
                {{ $article->user->comment }}
            </li>
            <li>
                <ul class="p-user_article__snsList">
                    <li class="p-user_article__snsItem">
                        <a href="{{ $article->user->twitter_url}}" target="blank"><img src="/images/tw.svg"
                                alt="twitterアイコン"></a>
                    </li>
                    <li class="p-user_article__snsItem">
                        <a href="{{ $article->user->facebook_url}}" target="blank"><img src="/images/fb.svg"
                                alt="facebookアイコン"></a>
                    </li>
                    <li class="p-user_article__snsItem">
                        <a href="{{ $article->user->instagram_url}}" target="blank"><img src="/images/ins.svg"
                                alt="Instagramアイコン"></a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="p-user_article__follow">
            @if( Auth::id() !== $article->user->id )
            <follow-button class="ml-auto" :initial-is-followed-by='@json($article->user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $article->user->userId]) }}">
            </follow-button>
            @endif

        </div>

    </div>
</div>