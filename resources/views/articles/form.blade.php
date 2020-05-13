<section class="l-article_post">
    @include('error_card_list')
    <div>
        @if($type === "edit")
        <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
            @method('PATCH')
            @endif
            @csrf
            <input type="hidden" id="js-articleId__for-ajax" data-article__id="{{$article->id ?? ''}}"
                data-cursor__index="">

            {{-- 画像があれば画像表示、なければアイコン表示 --}}
            @if($article->img)
            <div id="js-img__prevArea" class="p-form__image hasImg"
                style="background-image:url('{{"/storage/".$article->img}}');">
                @else
                <div id="js-img__prevArea" class="p-form__image"
                    style="background-image: url('/images/image-plus.svg');">
                    @endif
                    <label for="js-upload-mainImg" class="p-form__image__area"><input type="file" id="js-upload-mainImg"
                            class="p-form__image__input"></label>
                    {{-- 画像があればhasImgクラス付与 --}}
                    @if($article->img)
                    <div class="p-form__image__deleteBtn hasImg" id="js-img__delete">
                        @else
                        <div class="p-form__image__deleteBtn" id="js-img__delete">
                            @endif
                            <img src="{{ asset('images/close.svg') }}" alt="">
                        </div>
                    </div>

                    <div class="p-form__title">
                        <textarea name="title" placeholder="タイトル記入欄">{{ $article->title ?? old('title') }}</textarea>
                    </div>

                    <div class="p-form__tag">
                        <article-tags-input :initial-tags='@json($tagNames ?? [])' class="p-form"
                            :autocomplete-items='@json($allTagNames ?? [])'></article-tags-input>
                    </div>


                    <div class="p-form__textarea">
                        @if($type === "edit")
                        <div class="js-quill-editor" data-target="#content" style="height: 150px;">{!! old('body') ??
                            $article->body !!}
                        </div>
                        @endif
                        <input id="content" name="body" type="hidden" value="">
                    </div>
                    <input type="hidden" id="js-postType" name="postType" value="">
        </form>
    </div>
</section>