<li class="p-user__side">
    <figure class="p-user__side--img">
        <a href="{{ route('users.show', ['name' => $user->userId]) }}">
            @include('users.icon',['target_user' => $user])
        </a>
    </figure>
    <div class="p-user__side--text">
        <a class="p-user__side--title"
            href="{{ route('users.show', ['name' => $user->userId]) }}">{{ $user->name?$user->name:$user->userId }}
        </a>
    </div>
</li>