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
        <div class="l-tabs">
            @include('layouts.tabs',['currentPage'=> "users.index"])
        </div>
        <div class="c-3col__container u-mb40 l-container">
            @foreach ($all_users as $user)
            @include('users.card')
            @endforeach
        </div>

        <div class="p-article__paginate">
            {{ $all_users -> links() }}
        </div>
    </section>

    @include('layouts.sidebar')

</div>

@endsection