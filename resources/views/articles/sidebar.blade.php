<section class="l-sidebar l-sidebar__article ">
    <div class="l-article_post__sidebar">
        <div class="p-article_sidebar__msg" id="js-save__msg">
            <span id="js-save__time"></span> 下書き保存しました
        </div>
        <div class="p-article_sidebar__msg p-article_sidebar__msg--saving" id="js-save__msg--saving">
            下書き保存中...
        </div>
        <div class="p-article_sidebar__btns">
            <button type="button" class="p-article_sidebar__btn js-form__submit js-popup" data-type=1>下書き保存</button>
            <button type="button" class="p-article_sidebar__btn p-article_sidebar__btn--open js-form__submit js-popup"
                data-type=0>{{($type === "create")?"保存して公開":"更新して公開"}}</button>
        </div>
    </div>
</section>