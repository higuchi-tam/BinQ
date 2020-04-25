@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}

@section('content')
<div class="l-container">
    @include('error_card_list')
    <div>
        <form method="POST" action="{{ route('articles.store') }}">
            @include('articles.form')
            <button type="submit" class="p-form__button">投稿する</button>
            <button type="submit" class="p-form__button">下書きを保存する</button>
        </form>
    </div>
</div>
@endsection
