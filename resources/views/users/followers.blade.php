@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('title', $user->name . 'のフォロワー')

@section('content')
<div class="l-2col">

    <section class="u-mb80">

    @include('users.user')
    @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
    <div class="c-3col__container u-mb40 l-container">
    @foreach($followers as $person)
      @include('users.person')
    @endforeach
    </div>
    </section>
</div>
@endsection
