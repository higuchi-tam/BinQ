@csrf
<div class="p-form__title">
    <input type="text" name="title" placeholder="記事タイトル" required value="{{ $article->title ?? old('title') }}">
</div>

<div class="p-form__tag">
    <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'
        class="p-form">
        </article-ta$usergs-input>
</div>


<div class="p-form__textarea">
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>

    <div id="editor" name="body">{{ $article->body ?? old('body') }}</div>

    <textarea name="body" required placeholder="ご自由にお書きください。">{{ $article->body ?? old('title') }}

    </textarea>
</div>
