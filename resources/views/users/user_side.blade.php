<div class="p-card__side">
    <figure class="p-card__side--img">
        <a href="{{ route('users.show', ['name' => $user->name]) }}">
            @include('users.icon',['target_user' => $user])
        </a>
    </figure>
    <div class="p-card__side--text">
        <a class="p-card__side--title" href="{{ route('users.show', ['name' => $user->name]) }}">{{ $user->name }}
        </a>
    </div>
</div>