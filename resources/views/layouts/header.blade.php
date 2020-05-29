@section('header')

<nav class="l-header">
    <div class="l-header__nav">
        <h1 class="l-header__title">
            @auth<a href="{{ route('articles.index') }}">BinQ</a>@endauth
            @guest<a href="{{ route('home') }}">BinQ</a>@endguest

        </h1>
        <span class="navbar-toggler-icon"></span>
        <div class="l-header__menuWrap" id="">
            <ul class="l-header__menu">

                @guest
                <li class="l-header__item">
                    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                </li>
                <li class="l-header__item">
                    <a class="l-header__item--register" href="{{ route('register') }}">ユーザー登録</a> {{--この行を変更--}}
                </li>
                @endguest

                @auth
                <li class="l-header__item">
                    <a class="l-header__item--post" href="{{ route('articles.create')}}">
                        <img src="/images/scissors-logo.svg" alt="">
                        <span class="l-header__item--postText">投稿</span>
                    </a>
                </li>
                <li class="l-header__item">
                    <div class="l-header__img is-inactive" id="js-drawer__click-target">
                        @include('users.icon',['target_user' => $auth_user])
                    </div>

                    {{-- ドロップダウンメニュー --}}
                    <ul class="l-header__dropdown--menu" id="js-drawer__menu">
                        <li class="l-header__dropdown--item">
                            <a href="{{ route('users.show', ['name' => $auth_user->name]) }}"
                                class="l-header__button">マイページ</a>
                        </li>
                        <li class="l-header__dropdown--item post">
                            <a class="l-header__button l-header__button--post" href="{{ route('articles.create')}}">
                                <img src="/images/scissors-logo-sp.svg" alt="">
                                <span class="l-header__dropdown--postText">投稿</span>
                            </a>
                        </li>
                        <li class="l-header__dropdown--item">
                            <a href="{{ route('articles.index') }}" class="l-header__button">最新の記事</a>
                            <a href="{{ route('users.index') }}" class="l-header__button">人気の美容師</a>
                            <a href="{{ route('likeIndex') }}" class="l-header__button">人気の記事</a>
                        </li>
                        <li class="l-header__dropdown--item">
                            <a href="{{ route("users.edit", ['name' => $auth_user->name]) }}"
                                class="l-header__button">アカウント設定</a>
                            <button form="logout-button" type="submit" class="l-header__button">
                                ログアウト
                            </button>
                        </li>
                    </ul>

                </li>
                <form id="logout-button" method="POST" action="{{ route('logout') }}"> {{--この行を編集--}}
                    @csrf {{--この行を追加--}}
                </form>
                @endauth

            </ul>
        </div>
    </div>
</nav>
<div class="l-header__dropdown--bg" id="js-drawer__bg"></div>
@endsection