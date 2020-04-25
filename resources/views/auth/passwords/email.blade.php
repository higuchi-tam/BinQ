@extends('layouts.app')
@extends('layouts.header')
{{-- @extends('layouts.footer') --}}

@section('title', 'パスワード再設定')

@section('content')
<div class="l-container">
    <div class="p-email">
        <h2 class="p-email__title">パスワードをリセットする</h2>

        @include('error_card_list')

        @if (session('status'))
        <div class="card-text alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <label for="email"></label>
                    <input type="text" id="email" name="email" required class="p-email__input" placeholder="メールアドレス">
                </div>

                <button class="c-button__primary" type="submit">メール送信</button>
                {{-- <p>入力頂いたメールアドレスにパスワード再設定リンクが記載されています。</p> --}}

            </form>

        </div>
    </div>
</div>

@endsection
