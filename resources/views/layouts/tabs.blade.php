<ul class="p-tab__wrap">
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "articles.index"  ? 'tab-active' : '' }}"
            href="{{ route('articles.index') }}">
            最新の記事
        </a>
    </li>
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "users.index" ? 'tab-active' : '' }}" href="/users">
            人気の美容師
        </a>
    </li>
    <li class="p-tab__item">
        <a class="p-tab__link {{ $currentPage === "likeIndex" ? 'tab-active' : '' }}" href="/likeIndex">
            人気の記事
        </a>
    </li>
</ul>
<ul class="p-categoryTab">
    @foreach($tags as $tag)
    <li class="p-categoryTab__item">
        <a href="{{ route('tags.show',$tag->name) }}"
            class="p-categoryTab__link {{ $currentPage === $tag->name ? 'tab-active' : '' }}">{{ $tag->hashtag }}</a>
    </li>
    @endforeach
</ul>