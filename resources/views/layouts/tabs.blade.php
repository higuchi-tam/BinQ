<ul class="p-tab__wrap">
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "index"  ? 'tab-active' : '' }}"
            href="{{ route('users.show', ['name' => $user->name]) }}">
            投稿
        </a>
    </li>
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "follow" ? 'tab-active' : '' }}"
            href="{{ route('users.followings', ['name' => $user->name]) }}">
            フォロー
        </a>
    </li>
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "follower" ? 'tab-active' : '' }}"
            href="{{ route('users.followers', ['name' => $user->name]) }}">
            フォロワー
        </a>
    </li>
    @if( Auth::id() === $user->id )
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "likes" ? 'tab-active' : '' }}"
            href="{{ route('users.likes', ['name' => $user->name]) }}">
            いいね
        </a>
    </li>
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "draft" ? 'tab-active' : '' }}"
            href="{{ route('users.draft', ['name' => $user->name]) }}">
            下書き
        </a>
    </li>
    @endif
</ul>