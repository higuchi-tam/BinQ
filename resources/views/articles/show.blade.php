@extends('layouts.app')

@include('layouts.header')
{{-- @include('layouts.top_baner') --}}
@include('layouts.footer')
{{-- @include('layouts.sidebar') --}}

@section('content')
<div class="l-container">
    @include('articles.card')


    @if( Auth::id() === $article->user_id )
    <!-- dropdown -->
    <div class="js-dropdown">
        <button>MENUボタン</button>
    </div>
    <div>
        <a href="{{ route("articles.edit", ['article' => $article]) }}">
            記事を更新する
        </a>
        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
            記事を削除する
        </a>
    </div>
    <!-- dropdown -->

    <!-- modal -->
    <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        {{ $article->title }}を削除します。よろしいですか？
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                        <button type="submit" class="btn btn-danger">削除する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    @endif

    @include('articles.comment')
</div>
@endsection