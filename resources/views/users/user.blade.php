<div class="p-user_detail__userContainer">
    <div id="js-detail__top" class="p-user_detail__top">
        <figure class="p-user_detail__userImg">
            <a href="{{ route('users.show', ['name' => $user->userId]) }}" class="text-dark">
                @include('users.icon',['target_user' => $user])
            </a>
        </figure>
        <div class="p-user_detail__name">
            {{ $user->name }}
        </div>
        {{-- フォローボタンorプロフィール編集ボタン --}}
        @auth
        @if( Auth::id() !== $user->id )
        <div class="p-user_detail__follow">
            <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->userId]) }}">
            </follow-button>
        </div>
        @elseif( Auth::id() == $user->id )
        <a href="{{ route("users.edit", ['name' => $user->userId]) }}" class="p-user_detail__edit">変更</a>
        @endif
        @endauth
    </div>
    <div id="js-detail__top-right" class="p-user_detail__top-right">
        <ul>
            <li class="p-user_detail__nameWrap">

                <ul class="l-footer__snsList p-user_detail__snsList">
                    <li class="l-footer__snsItem p-user_detail__snsItem">
                        <a href="{{ $user->twitter_url}}" target="blank"><img src="/images/tw.svg"
                                alt="twitterアイコン"></a>
                    </li>
                    <li class="l-footer__snsItem">
                        <a href="{{ $user->facebook_url}}" target="blank"><img src="/images/fb.svg"
                                alt="facebookアイコン"></a>
                    </li>
                    <li class="l-footer__snsItem">
                        <a href="{{ $user->instagram_url}}" target="blank"><img src="/images/ins.svg"
                                alt="Instagramアイコン"></a>
                    </li>
                </ul>



            </li>
            　　<li class="p-user_detail__userTitle">
                {{ $user->title }}
            </li>
        </ul>
    </div>
    <div id="js-detail__bottom" class="p-user_detail__bottom">
        <ul>
            <li class="p-user_detail__topicWrap">
                <span class="p-user_detail__topicNum">記事数　<span>{{ $totalArticles->count() }}</span></span>
                <span class="p-user_detail__followNum">
                    <a href="{{ route('users.followings', ['name' => $user->userId]) }}" class="text-muted">
                        {{ $user->count_followings }} フォロー
                    </a>
                </span>
                <span class="p-user_detail__followerNum">
                    <a href="{{ route('users.followers', ['name' => $user->userId]) }}" class="text-muted">
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


</div>