@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')
@section('content')
<div class="container">

    <div class="p-authChange__container">
        <div class="p-authChange__title">メールアドレス変更</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>

        <div class="p-authChange__form">
            <p class="p-authChange__form--text">新しいメールアドレスを入力してください。</p>
            <form action="/email" method="POST" class="p-authChange__form--body">
                {{ csrf_field() }}
                <input type="email" name="new_email" class="p-authChange__form--input">
                <div class="p-authChange__form--button">
                    <input type="submit" class="p-authChange__form--submit" value="変更">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection