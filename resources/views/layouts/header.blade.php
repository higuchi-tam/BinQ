@section('header')

<nav class="l-header">
    <div class="l-header__nav">
        <h1 class="l-header__title"><a href="/">BinQ</a></h1>
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
                        <div class="js-dropdown">
                            {{-- <a href="{{ route('users.show', ['name' => $user->name]) }}" class=""> --}}
                                {{-- @if ($user->profile_photo) --}}
                                <img class="l-header__userImg" src="{{ asset('storage/user_images/' . $user->profile_photo) }}" />
                                {{-- @else
                                <img src="{{ asset('/images/blank_profile.png') }}" alt="記事投稿者のプロフィール画像"> --}}
                                {{-- @endif --}}
                            {{-- </a> --}}
                        </div>
                        <ul class="l-header__dropdown--menu">
                            <li class="l-header__dropdown--item">
                                <button class="l-header__button" type="button" onclick="">
                                    マイページ
                                </button>
                            </li>
                            <li class="l-header__dropdown--item">
                                <button class="l-header__button">
                                    いいねした投稿
                                </button>
                            </li>
                            <li class="l-header__dropdown--item">
                                <button class="l-header__button">
                                    アカウント設定
                                </button>
                            </li>
                            <li class="l-header__dropdown--item">
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
@endsection
