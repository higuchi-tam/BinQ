<div class="p-user_like__userContainer">
    <figure class="p-user_like__userImg">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            @include('users.icon',['target_user' => $user])
        </a>
    </figure>
    <div class="p-user_like__wrap">
        <ul class="p-user_like__user">
            <li class="p-user_like__name">
                {{ $user->name }}
            </li>
            　　<li class="p-user_like__userTitle">
                {{ $user->title }}
            </li>

            <li class="p-user_like__comment">
                {{ $user->comment }}
            </li>
            <li>
                <ul class="p-user_like__snsList">
                    <li class="p-user_like__snsItem">
                        <a href="{{ $user->twitter_url}}" target="blank"><img src="/images/tw.svg" alt=""></a>
                    </li>
                    <li class="p-user_like__snsItem">
                        <a href="{{ $user->facebook_url}}" target="blank"><img src="/images/fb.svg" alt=""></a>
                    </li>
                    <li class="p-user_like__snsItem">
                        <a href="{{ $user->instagram_url}}" target="blank"><img src="/images/ins.svg" alt=""></a>
                    </li>
                </ul>
            </li>
        </ul>

        @if( Auth::id() !== $user->id )
        <div class="p-user_like__follow">
            <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
            </follow-button>
        </div>
        @endif



    </div>
</div>