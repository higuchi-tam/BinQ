@extends('layouts.app')
@section('content')
<div class="l-container">
    <div class="p-login__container">
        <h2 class="p-login__mainTitle">BinQ</h2>

        <div class="p-login__form">
            <div class="p-login__titleWrap">
                <h3 class="p-login__titleTxt"><a href="/">BinQに登録する</a></h3>
            </div>

            <form method="POST" action="{{ route('register') }}" class="p-register--border u-mb20">
                @csrf
                <div class="p-login__formGroup u-mb20">
                    <p class="p-register__formTxt">メールアドレス<span class="p-form__required">必須</span></p>
                    <input class="p-login__formItem" placeholder="メールアドレス" autocomplete="email" type="email"
                        name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <div class="c-error__msg">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="p-login__formGroup u-mb20">
                    　<p class="p-register__formTxt">ユーザーID<span class="p-form__required">必須</span></p>
                    <div class="p-form__idWrapper">
                        <span class="p-register__atSign">@ </span>
                        <input class="p-login__formItem" placeholder="ユーザーID(英数字5~16文字)" type="text" name="userId"
                            value="{{ old('userId') }}" required autofocus>
                    </div>
                    {{-- <small class="p-register__formSubTxt">英数字5〜16文字</small> --}}
                    @if ($errors->has('userId'))
                    <div class="c-error__msg">
                        <strong>{{ $errors->first('userId') }}</strong>
                    </div>
                    @endif
                </div>

                <div class="p-login__formGroup u-mb20">
                    　<p class="p-register__formTxt">パスワード<span class="p-form__required">必須</span></p>
                    <input class="p-login__formItem" placeholder="パスワード" autocomplete="off" type="password"
                        name="password" required>
                    @if ($errors->has('password'))
                    <div class="c-error__msg">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="p-login__formGroup u-mb20">
                    　<p class="p-register__formTxt">パスワード（確認）<span class="p-form__required">必須</span></p>
                    <input class="p-login__formItem" placeholder="パスワードの確認" autocomplete="off" type="password"
                        name="password_confirmation" required>
                </div>
                <div class="p-login__formGroup p-register__radioWrap">
                    <input id="p-register__agree" class="p-register__checkbox" autocomplete="off" type="checkbox"
                        required>
                    <label class="p-register__checkboxLabel" for="p-register__agree"></label>
                    　<p class=""><a href="" target="_blank">利用規約</a>に同意する</p>
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