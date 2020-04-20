@extends('layouts.app')

{{-- @include('layouts.header') --}}
{{-- @include('layouts.footer') --}}

@section('content')
<div class="l-container">
    <div class="p-login__container">
        <h2 class="p-login__mainTitle">BinQ</h2>

        @include('error_card_list') {{--この行を追加--}}

        <div class="p-login__form">
            <div class="p-login__titleWrap">
                <h3 class="p-login__titleTxt">ログイン</h3>
            </div>
            <div class="c-button__sns">
                <a href="" class="c-button__sns--tw">Twitterでログイン</a>
                <a href="" class="c-button__sns--ins">Instagramでログイン</a>
                {{-- <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="c-button__sns--ins">Googleでログイン</a> --}}
            </div>
            <div class="p-login__addressWrap">
                <h4 class="p-login__addressTitle">メールアドレスでログイン</h4>

                <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
                    @csrf
                    <div class="p-login__formGroup">
                        <input id="email" type="email" class="p-login__formItem" name="email" placeholder="メールアドレス"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="p-login__formItem" name="password"
                            placeholder="パスワード" required>
                    </div>

                    <input type="hidden" name="remember" id="remember" value="on">

                    <a href="{{ route('password.request') }}" class="p-login__passRemind">パスワードを忘れた方</a>
                    <div class="c-button__wrap">
                        <input type="submit" name="remember" value="ログイン" class="c-button__login">
                    </div>
                </form>

            </div>
            <p class="p-login__signUp">
                <a href="{{ route('register') }}">会員登録はコチラ</a>
            </p>
        </div>
    </div>
</div>
@endsection
