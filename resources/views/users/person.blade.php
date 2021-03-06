<div class="c-3col__item">
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
            </a>
            @if( Auth::id() !== $person->id )
            <follow-button class="ml-auto" :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $person->name]) }}">
            </follow-button>
            @endif
        </div>
        <h2 class="h5 card-title m-0">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
        </h2>
    </div>
</div>
