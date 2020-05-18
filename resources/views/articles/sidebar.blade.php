<section class="l-sidebar l-container">
    <div class="l-article_post__sidebar">
        <div class="p-article_sidebar__btns">
            {{-- @if($type === "edit") --}}
            <button type="button" class="p-article_sidebar__btn js-form__submit js-popup" data-type=1>下書き保存</button>
            <button type="button" class="p-article_sidebar__btn p-article_sidebar__btn--open js-form__submit js-popup"
                data-type=0>{{($type === "create")?"保存して公開":"更新して公開"}}</button>
            {{-- @endif --}}
        </div>
    </div>
</section>