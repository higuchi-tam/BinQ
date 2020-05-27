<div class="c-3col__item">
    <figure class="p-user__news--img">
        @include('users.icon',['target_user' => $user])
    </figure>
    <div class="p-user__news--text">
        <p class="p-user__news--category">
        </p>
        <p class="p-user__news--cardTitle"> {{ $user->name}}</p>
    </div>
    <div class="c-button__sns">
        @if( Auth::id() !== $user->id )
        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
        </follow-button>
        @endif
    </div>
</div>