@if (preg_match('/^http.+/',$target_user->profile_photo))
<img src="{{ $target_user->profile_photo }}" alt="プロフィール画像" />
@elseif($target_user->profile_photo)
<img src="{{ asset('storage/' . $target_user->profile_photo) }}" alt="プロフィール画像" />
@else
<img src="{{ asset('/images/blank_profile.png') }}" alt="{{ $target_user->name. ' のプロフィール画像' }}">
@endif