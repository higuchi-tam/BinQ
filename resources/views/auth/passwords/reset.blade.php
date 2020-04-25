@extends('layouts.app')
@extends('layouts.header')

@section('title', 'パスワード再設定')

@section('content')
<div class="l-container">

    <div class="p-email">
        <h2 class="p-email__title">新しいパスワードを設定</h2>

        @include('error_card_list')

        <div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="password"></label>
                    <input class="form-control" type="password" id="password" name="password" required
                        class="p-email__input" placeholder="新しいパスワード">
                </div>

                <div>
                    <label for="password_confirmation"></label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                        required class="p-email__input" placeholder="新しいパスワード(再入力">
                </div>

                <button class=c-button__primary" type="submit">送信</button>
            </form>
        </div>

    </div>
</div>
@endsection
