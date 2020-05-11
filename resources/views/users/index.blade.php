@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')

@section('content')

<div class="l-container l-2col">

    <section class="u-mb80">

        <div class="p-user__news--titleWrap u-mb20">
            <h3 class="p-user__news--title c-contents__title">美容師一覧</h3>
        </div>

        <div class="p-user__tab">
            <ul class="p-user__tab--list">
                <li class="p-user__tab--item is-active">人気美容師</li>
                <li class="p-user__tab--item">人気記事</li>
                <li class="p-user__tab--item">最近の記事</li>
                <li class="p-user__tab--item">カテゴリ</li>
                <li class="p-user__tab--item">カテゴリ</li>
            </ul>
        </div>

        <div class="c-3col__container u-mb40 l-container">
            @foreach ($all_users as $user)
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
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                    </follow-button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="p-article__paginate">
            {{ $all_users -> links() }}
        </div>
    </section>

    @include('layouts.sidebar')

</div>

@endsection