@extends('layouts.app')
{{-- @include('layouts.header') --}}
{{-- @include('layouts.footer') --}}
@section('content')
<div class="l-container">
  <div class="p-login__container">
    <h2 class="p-login__mainTitle">BinQ</h2>

    @include('error_card_list') {{--この行を追加--}}

    <div class="p-login__form">
      <div class="p-login__titleWrap">
        <h3 class="p-login__titleTxt">BinQに登録する</h3>
      </div>
      <form method="POST" action="{{ route('register') }}" class="p-register--border u-mb20">
        {{ csrf_field() }}
        <div class="p-login__formGroup">
          <p class="p-register__formTxt">メールアドレス</p>
          <input class="p-login__formItem" placeholder="メールアドレス" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <div class="p-login__formGroup">
        　<p class="p-register__formTxt">ユーザーネーム（任意）</p>
          <input class="p-login__formItem" placeholder="ユーザーネーム" type="text" name="name" value="{{ old('name') }}" required autofocus>
          <small>英数字5〜16文字(登録後の変更はできません)</small>
        </div>

        <div class="p-login__formGroup">
        　<p class="p-register__formTxt">パスワード</p>
          <input class="p-login__formItem" placeholder="パスワード" autocomplete="off" type="password" name="password" required>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <div class="p-login__formGroup">
        　<p class="p-register__formTxt">パスワード（確認）</p>
          <input class="p-login__formItem" placeholder="パスワードの確認" autocomplete="off" type="password" name="password_confirmation" required>
        </div>
        <div class="p-login__formGroup p-register__radioWrap">
            <input class="p-register__radionItem" placeholder="パスワードの確認" autocomplete="off" type="checkbox" name="password_confirmation" required>
            　<p class=""><a href="">利用規約</a>に同意する</p>
        </div>

        <div class="actions u-mb20">
          <input type="submit" name="commit" value="登録する（無料）" class="c-button__register">
        </div>
      </form>
      <div class="c-button__sns p-register--border">
        <p class="p-register__snsTtile">ソーシャルアカウントで登録</p>
        <a href="" class="c-button__sns--tw">Twitterで登録</a>
        <a href="" class="c-button__sns--ins u-mb20">Instagramで登録</a>
      </div>

      <p class="p-register__loginLink">
        アカウントをお持ちですか？
        <a href="/login">ログインする</a>
      </p>
    </div>
  </div>
</div>
@endsection
