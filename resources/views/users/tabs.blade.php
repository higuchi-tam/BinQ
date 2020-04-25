<ul class="p-tab__wrap">
    <li class="p-tab__item">
        <a class="p-tab__link {{ $hasArticles ? 'tab-active' : '' }}"
            href="{{ route('users.show', ['name' => $user->name]) }}">
            投稿
        </a>
    </li>
    <li class="p-tab__item">
        <a class="p-tab__link {{ $hasLikes ? 'tab-active' : '' }}"
            href="{{ route('users.likes', ['name' => $user->name]) }}">
            いいね
        </a>
    </li>
</ul>
