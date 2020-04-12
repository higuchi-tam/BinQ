@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}

@section('content')
<div class="l-container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body pt-0">
                    @include('error_card_list')
                    <div class="card-text">
                        <form method="POST" action="{{ route('articles.store') }}">
                            @include('articles.form')
                            <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
