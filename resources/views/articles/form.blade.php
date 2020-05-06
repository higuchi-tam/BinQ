@csrf
<input type="hidden" id="js-articleId__for-ajax" data-article__id="{{$article->id ?? ''}}" data-cursor__index="">
<div class="p-form__title">
    <input type="text" name="title" placeholder="記事タイトル" required value="{{ $article->title ?? old('title') }}">
</div>

<div class="p-form__tag">
    <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'
        class="p-form">
        </article-ta$usergs-input>
</div>


<div class="p-form__textarea">
    <div class="js-quill-editor" data-target="#content" style="height: 150px;"></div>
    <input id="content" name="body" type="hidden" value="{{ $article->title ?? old('body') }}">
</div>
