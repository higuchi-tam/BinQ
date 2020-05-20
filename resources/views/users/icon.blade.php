@if (preg_match('/^http.+/',$target_user->profile_photo))
<img src="{{ $target_user->profile_photo }}" />
@elseif($target_user->profile_photo)
<img src="{{ asset('storage/user_images/' . $target_user->profile_photo) }}" />
@else
<img src="{{ asset('/images/blank_profile.png') }}" alt="{{ $target_user->name. ' のプロフィール画像' }}">
@endif