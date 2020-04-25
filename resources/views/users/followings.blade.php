@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('title', $user->name . 'のフォロー中')

@section('content')
<div class="l-2col">
    <section class="u-mb80">


    @include('users.user')
    @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])

    <div class="c-3col__container u-mb40 l-container">
    @foreach($followings as $person)
      @include('users.person')
    @endforeach
    </div>

    </section>
</div>
@endsection
