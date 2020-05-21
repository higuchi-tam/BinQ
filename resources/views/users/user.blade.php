<div class="p-user_detail__userContainer">
    <figure class="p-user_detail__userImg">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            @include('users.icon',['target_user' => $user])
        </a>
    </figure>

    <div class="p-user_detail__wrap">
        <ul>
            <li class="p-user_detail__nameWrap">
                <div class="p-user_detail__name">
                    {{ $user->name }}
                </div>
                <ul class="l-footer__snsList p-user_detail__snsList">
                    <li class="l-footer__snsItem p-user_detail__snsItem">
                        <a href="{{ $user->twitter_url}}" target="blank"><img src="/images/tw.svg" alt=""></a>
                    </li>
                    <li class="l-footer__snsItem">
                        <a href="{{ $user->facebook_url}}" target="blank"><img src="/images/fb.svg" alt=""></a>
                    </li>
                    <li class="l-footer__snsItem">
                        <a href="{{ $user->instagram_url}}" target="blank"><img src="/images/ins.svg" alt=""></a>
                    </li>
                </ul>

                {{-- プロフィール編集 --}}
                @if( Auth::id() == $user->id )
                <a href="{{ route("users.edit", ['name' => $user->name]) }}" class="p-user_detail__edit">変更</a>
                @endif

            </li>
            　　<li class="p-user_detail__userTitle">
                {{ $user->title }}
            </li>
            <li class="p-user_detail__topicWrap">
                <span class="p-user_detail__topicNum">記事数　<span>{{ $myArticles->count() }}</span></span>
                <span class="p-user_detail__followNum">
                    <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
                        {{ $user->count_followings }} フォロー
                    </a>
                </span>
                <span class="p-user_detail__followerNum">
                    <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
                        {{ $user->count_followers }} フォロワー
                    </a>
                </span>
            </li>
            <li class="p-user_detail__comment">
                {{ $user->comment }}
            </li>
            <li class="p-user_detail__url">
                <span>HP</span>
                <a href="{{ $user->url }}" target="_blank" rel="noopener">{{ $user->url }}</a>
            </li>
        </ul>
    </div>
    @if( Auth::id() !== $user->id )
    <div class="p-user_detail__follow">
        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
        </follow-button>
    </div>
    @endif
</div>