@extends('layouts.app')
@extends('layouts.header')
@extends('layouts.footer')
@section('title','エラー')
@section('content')

@php
$status_code = $exception->getStatusCode();
$message = $exception->getMessage();

if (! $message) {
switch ($status_code) {
case 400:
$message = 'Bad Request';
break;
case 401:
$message = '認証に失敗しました';
break;
case 403:
$message = 'アクセス権がありません';
break;
case 404:
$message = '存在しないページです';
break;
case 408:
$message = 'タイムアウトです';
break;
case 414:
$message = 'リクエストURIが長すぎます';
break;
case 419:
$message = '不正なリクエストです';
break;
case 500:
$message = 'サーバーエラーです。';
break;
case 503:
$message = 'アクセスしようとしたページは表示できませんでした。';
break;
default:
$message = 'エラー';
break;
}
}else{
$message = 'アクセスしようとしたページは表示できませんでした。';
}
@endphp
<div class="p-error">

    <h2 class="p-error__msg">
        <div class="p-error__status">{{ $status_code }}</div>
        <div class="">{{ $message }}</div>
    </h2>
</div>

@endsection