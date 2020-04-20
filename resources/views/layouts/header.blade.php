@section('header')

<nav class="l-header">
    <div class="l-header__nav">
        <h1 class="l-header__title"><a href="/">BinQ</a></h1>
        <span class="navbar-toggler-icon"></span>
        <div class="l-header__menuWrap" id="">
            <ul class="l-header__menu">

                @guest
                    <li class="l-header__item">
                        <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a> {{--この行を変更--}}
                    </li>
                    <li class="l-header__item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
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
                        <div class="js-dropdown">
                            <img src="{{ asset('/images/blank_profile.png') }}" alt="記事のメイン画像" class="l-header__item--img">
                        </div>
                        <ul class="l-header__dropdown--menu">
                            <li class="l-header__dropdown--item">
                                <button class="dropdown-item" type="button" onclick="location.href=''">
                                    マイページ
                                </button>
                            </li>
                            <li class="l-header__dropdown--item">
                                <button form="logout-button" type="submit" class="l-header__button">
                                    ログアウト
                                </button>
                            </li>
                            <li class="l-header__dropdown--item">アカウント設定</li>
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
@endsection
