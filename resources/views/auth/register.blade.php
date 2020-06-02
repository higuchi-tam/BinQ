@extends('layouts.app')
@section('content')
<div class="l-container">
    <div class="p-login__container">
        <h2 class="p-login__mainTitle">BinQ</h2>

        <div class="p-login__form">
            <div class="p-login__titleWrap">
                <h3 class="p-login__titleTxt">BinQに登録する</h3>
            </div>

            <form method="POST" action="{{ route('register') }}" class="p-register--border u-mb20">
                @csrf
                <div class="p-login__formGroup u-mb20">
                    <p class="p-register__formTxt">メールアドレス</p>
                    <input class="p-login__formItem" placeholder="メールアドレス" autocomplete="email" type="email"
                        name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <div class="c-error__msg">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="p-login__formGroup u-mb20">
                    　<p class="p-register__formTxt">ユーザーネーム（任意）</p>
                    <input class="p-login__formItem" placeholder="ユーザーネーム" type="text" name="name"
                        value="{{ old('name') }}" required autofocus>
                    <small class="p-register__formSubTxt">英数字5〜16文字<br class="sp">(登録後の変更はできません)</small>
                </div>

                <div class="p-login__formGroup u-mb20">
                    　<p class="p-register__formTxt">パスワード</p>
                    <input class="p-login__formItem" placeholder="パスワード" autocomplete="off" type="password"
                        name="password" required>
                    @if ($errors->has('password'))
                    <div class="c-error__msg">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="p-login__formGroup u-mb20">
                    　<p class="p-register__formTxt">パスワード（確認）</p>
                    <input class="p-login__formItem" placeholder="パスワードの確認" autocomplete="off" type="password"
                        name="password_confirmation" required>
                </div>
                <div class="p-login__formGroup p-register__radioWrap">
                    <input class="p-register__radionItem" autocomplete="off" type="checkbox" required>
                    　<p class=""><a href="">利用規約</a>に同意する</p>
                </div>

                <div class="actions u-mb20">
                    <input type="submit" name="commit" value="登録する（無料）" class="c-button__register">
                </div>
            </form>

            <div class="c-button__sns p-register--border">
                <p class="p-register__snsTtile">ソーシャルアカウントで登録</p>
                <a href="" class="c-button__sns--tw">Twitterで登録</a>
                <a href="/login/facebook" class="c-button__sns--fb">Facebookで登録</a>
                <a href="/login/google" class="c-button__sns--gg u-mb20">Googleで登録</a>
            </div>

            <p class="p-register__loginLink">
                アカウントをお持ちですか？<br>
                <a href="/login">ログインする</a>
            </p>
        </div>
    </div>
</div>
@endsection