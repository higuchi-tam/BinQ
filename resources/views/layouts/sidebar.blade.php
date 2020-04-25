<section class="l-sidebar l-container">
    <div class="c-members">
        <h4 class="c-category__title">人気の美容師</h4>
        @foreach($users as $user)
        　　@if ($loop->index < 5)
              @include('users.user_side')
        　　@endif
        @endforeach


        {{-- <div class="u-mb20">
            <div class="c-members__item">
                <figure class="c-members__img">
                    <img src="" alt="プロフィール写真">
                </figure>
                <p class="c-members__name">ユーザー名</p>
            </div>
            <div class="c-members__item">
                <figure class="c-members__img">
                    <img src="" alt="プロフィール写真">
                </figure>
                <p class="c-members__name">ユーザー名</p>
            </div>
            <div class="c-members__item">
                <figure class="c-members__img">
                    <img src="" alt="プロフィール写真">
                </figure>
                <p class="c-members__name">ユーザー名</p>
            </div>
            <div class="c-members__item">
                <figure class="c-members__img">
                    <img src="" alt="プロフィール写真">
                </figure>
                <p class="c-members__name">ユーザー名</p>
            </div>
            <div class="c-members__item">
                <figure class="c-members__img">
                    <img src="" alt="プロフィール写真">
                </figure>
                <p class="c-members__name">ユーザー名</p>
            </div>
        </div> --}}

        <div class="c-button__sns">
            <a href="/users" class="c-button__sidebar">人気の美容師一覧</a>
        </div>
    </div>

    <div class="c-article">

        <h4 class="c-category__title">人気記事</h4>
        @foreach($articles as $article)
        　　@if ($loop->index < 5)
              @include('articles.card_side')
        　　@endif
        @endforeach

        <div class="c-button__sns">
        <a href="/likeIndex" class="c-button__sidebar">人気記事一覧</a>
        </div>
    </div>

    <div class="c-category u-mb100">
        <h4 class="c-category__title">カテゴリから探す</h4>
        <div>
            <p class="c-category__parents">
                <a href="tags/カット">カット</a>
            </p>
            <ul class="c-category__list">
                <li>子カテゴリ</li>
            </ul>
        </div>
        <div>
            <p class="c-category__parents">
                <a href="tags/カラー">カラー</a>
            </p>
            <ul class="c-category__list">
                <li>子カテゴリ</li>
            </ul>
        </div>
        <div>
            <p class="c-category__parents">
                <a href="tags/パーマ">パーマ</a>
            </p>
            <ul class="c-category__list">
                <li>子カテゴリ</li>
            </ul>
        </div>
    </div>

</section>

