<div class="p-user_detail__userContainer">
    <figure class="p-user_detail__userImg">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            @if ($user->profile_photo)
            <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}" />
            @else
            <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像">
            @endif
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
