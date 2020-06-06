@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')

<div class="l-container l-2col">

    <section class="l-2col--main u-mb80">

        <h4 class="c-category__title u-mb40">記事にいいねした人一覧</h4>
        <div class="p-likesArticle__target">
            @include('articles.card_side')
        </div>
        <div class="p-likesArticle__users">
            <ul>
                @foreach($like_users as $user)
                　@include('users.user_like')
                @endforeach
                @foreach($like_users as $user)
                　@include('users.user_like')
                @endforeach
                @foreach($like_users as $user)
                　@include('users.user_like')
                @endforeach
            </ul>
    </section>

    @include('layouts.sidebar')

</div>

@endsection