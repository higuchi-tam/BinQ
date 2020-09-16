@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')
@section('content')
<form id="delete-form" method="POST" action="{{ route('users.delete',$user->userId) }}">
    @csrf
    <a href="" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">削除</a>する

</form>

@endsection