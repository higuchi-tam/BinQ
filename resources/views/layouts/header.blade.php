@section('header')
<nav class="l-header">
    <div class="l-header__nav">
        <h1 class="l-header__title"><a href="/">BinQ</a></h1>
        <span class="navbar-toggler-icon"></span>
        <div class="l-header__menuWrap" id="">
            <ul class="l-header__menu">
                @guest {{--この行を追加--}}
                <li class="l-header__item">
                    <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a> {{--この行を変更--}}
                </li>
                @endguest {{--この行を追加--}}

                @guest {{--この行を追加--}}
                <li class="l-header__item">
                    <a class="nav-link" href="">ログイン</a>
                </li>
                @endguest {{--この行を追加--}}

                @auth
                <li class="l-header__item">
                    <a class="" href="/posts/new">投稿する</a>
                </li>
                <li class="l-header__item l-header__item--right">
                    <button form="logout-button" type="submit">
                        ログアウト
                    </button>
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
