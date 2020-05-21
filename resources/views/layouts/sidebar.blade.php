<section class="l-sidebar l-container">
    <div class="c-members">
        <h4 class="c-category__title">人気の美容師</h4>
        <ul>
            @foreach($users as $user)
            　　@if ($loop->index < 5) @include('users.user_side')@endif @endforeach </ul> <div class="c-button__sns">
                <a href="/users" class="c-button__sidebar">人気の美容師一覧</a>
    </div>
    </div>

    <div class="c-article">

        <h4 class="c-category__title">人気記事</h4>
        <ul>
            @foreach($articles as $article)
            　　@if ($loop->index < 5) @include('articles.card_side')@endif @endforeach </ul> <div class="c-button__sns">
                <a href="/likeIndex" class="c-button__sidebar">人気記事一覧</a>
    </div>
    </div>

</section>