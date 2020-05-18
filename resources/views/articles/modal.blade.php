{{-- フラッシュメッセージ --}}
@if (session('flash_message'))
<div class="p-modal">
    <div class="p-modal__bg"></div>
    <div class="p-modal__inner">
        <header class="p-modal__header">記事が公開されました</header>
        <div class="p-modal__main">
            <p> 公開した記事をシェアしましょう！</p>

            <ul class="p-modal__btns js-popup">
                <li>
                    <a href="http://twitter.com/share?url=シェアするURL&text=文言" target="_blank"
                        class="p-modal__btn p-modal__btn--tw js-popup">
                        <span><img src="/images/tw-share.svg" alt=""></span>ツイートする
                    </a>

                </li>
                <li>
                    <a href="http://www.facebook.com/share.php?{URL}" rel="nofollow" target="_blank"
                        class="p-modal__btn p-modal__btn--fb js-popup">
                        <span><img src="/images/fb-share.svg" alt=""></span>シェアする</a>
                </li>
        </div>
        <footer class="p-modal__footer">
            <a href="{{ route('articles.show',$article->id) }}"
                class="p-modal__btn p-modal__btn--close js-popup">閉じる</a>
        </footer>
    </div>
</div>
@endif