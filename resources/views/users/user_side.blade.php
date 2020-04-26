<div class="p-card__side">
    <figure class="p-card__side--img">
        @if ($user->profile_photo)
        <a href="{{ route('users.show', ['name' => $user->name]) }}">
        <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}" />
        </a>
        @else
        <a href="{{ route('users.show', ['name' => $user->name]) }}">
        <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
        </a>
        @endif
    </figure>
    <div class="p-card__side--text">
        <a class="p-card__side--title"
            href="{{ route('users.show', ['name' => $user->name]) }}">{{ $user->name }}
        </a>
    </div>
</div>

