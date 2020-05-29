@extends('layouts.app')

@include('layouts.header')
@include('layouts.footer')

@section('content')
<div class="l-container">
    @include('articles.detail')
</div>
@endsection