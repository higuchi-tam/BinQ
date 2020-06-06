@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('title', $user->name . 'のいいねした記事')

@section('content')

<div class="l-2col">
    <section class="u-mb80">

        @include('users.user')
        @include('users.tabs', ['currentPage' => "likes"])

        <div class="c-3col__container u-mb40 l-container">
            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
        </div>


        <div class="p-article__paginate">
            {{-- {{ $articles -> links() }} --}}
        </div>



    </section>

    @include('layouts.sidebar')


    </section>
</div>
@endsection