@extends('layouts.app')
@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}

@section('content')
<div class="l-container">
    <div class="row">
        <div>
            <div>
                <div>
                    @include('error_card_list')
                    <div>
                        <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                            @method('PATCH')
                            @include('articles.form')
                            <button type="submit" class="">更新する</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
