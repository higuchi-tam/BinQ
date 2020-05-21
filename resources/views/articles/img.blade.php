@if($article->img)
<img src="{{ asset('/storage/'.$article->img) }}" alt="記事のメイン画像">
@else
<img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像">
@endif