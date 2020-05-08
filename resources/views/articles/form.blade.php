@csrf
<input type="hidden" id="js-articleId__for-ajax" data-article__id="{{$article->id ?? ''}}" data-cursor__index="">
<div id="js-img__prevArea" class="p-form__image"
    style="background-image: url('/{{($article->img)?"storage/".$article->img:"images/blank_profile.png"}}') ">
    <label for="js-upload-mainImg" class="p-form__image__area"><input type="file" id="js-upload-mainImg"
            class="p-form__image__input"></label>
</div>
<div class="p-form__image__deleteBtn" id="js-img__delete">
    削除する
</div>

<div class="p-form__title">
    <input type="text" name="title" placeholder="記事タイトル" required value="{{ $article->title ?? old('title') }}">
</div>

<div class="p-form__tag">
    <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'
        class="p-form">
    </article-tags-input>
</div>


<div class="p-form__textarea">
    <div class="js-quill-editor" data-target="#content" style="height: 150px;">{!! $article->body ?? old('body') !!}
    </div>
    <input id="content" name="body" type="hidden" value="">
</div>