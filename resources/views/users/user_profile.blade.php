<div class="p-user_detail__userContainer">
    <figure class="p-user_detail__userImg">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            @include('users.icon',['target_user' => $user])
        </a>
    </figure>
    <div class="p-user_detail__wrap">
        <div class="p-user_detail__nameWrap">
            <div class="p-user_detail__name">
                {{-- <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark"> --}}
                {{ $user->name }}
                {{-- </a> --}}
            </div>
        </div>
    </div>
</div>