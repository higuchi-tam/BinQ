@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('title', $user->name . 'のフォロー中')

@section('content')
<div class="l-2col">
  <section class="u-mb80">


    @include('users.user')
    @include('users.tabs', ['currentPage' => "follow"])

    <div class="c-3col__container u-mb40 l-container">
      @foreach($followings as $user)
      <div class="c-3col__item">
        <figure class="p-user__news--img">
          @include('users.icon',['target_user' => $user])
        </figure>
        <div class="p-user__news--text">
          <p class="p-user__news--category">
          </p>
          <p class="p-user__news--cardTitle"> {{ $user->name}}</p>
        </div>
        <div class="c-button__sns">
          @if( Auth::id() !== $user->id )
          <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
          </follow-button>
          @endif
        </div>
      </div>
      @endforeach
    </div>

  </section>
</div>
@endsection