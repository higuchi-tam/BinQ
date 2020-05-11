@if (preg_match('/^http.+/',$target_user->profile_photo))
<img class="l-header__userImg" src="{{ $target_user->profile_photo }}" />
@elseif($target_user->profile_photo)
<img class="l-header__userImg" src="{{ asset('storage/user_images/' . $target_user->profile_photo) }}" />
@else
<img src="{{ asset('/images/blank_profile.png') }}" alt="{{ $target_user->name. ' のプロフィール画像' }}">
@endif