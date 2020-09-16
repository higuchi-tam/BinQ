{{-- フラッシュメッセージ --}}
@if (session('flash_message'))
<div class="p-modal">
    <div class="p-modal__bg"></div>
    <div class="p-modal__inner">
        <header class="p-modal__header">記事が公開されました</header>
        <div class="p-modal__main">
            <p class="p-modal__mainText"> 公開した記事をシェアしましょう！</p>

            <ul class="p-modal__btns js-popup">
                <li>
                    <a href="http://twitter.com/share?url={{route('articles.show',$article->id)}}" target="_blank"
                        class="p-modal__btn p-modal__btn--tw">
                        <span><img src="/images/tw-modal.svg" alt="ツイートする"></span>ツイートする
                    </a>

                </li>
                <li>
                    <a href="http://www.facebook.com/share.php?{{route('articles.show',$article->id)}}" rel="nofollow"
                        target="_blank" class="p-modal__btn p-modal__btn--fb js-popup">
                        <span><img src="/images/fb-modal.svg" alt="シェアする"></span>シェアする</a>
                </li>
            </ul>
        </div>
        <footer class="p-modal__footer">
            <a href="{{ route('articles.show',$article->id) }}"
                class="p-modal__btn p-modal__btn--close js-popup">閉じる</a>
        </footer>
    </div>
</div>
@endif