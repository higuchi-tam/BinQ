@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('top_baner')
<div class="">
    <div class="p-topbaner__container">
        <div class="p-topbaner__titleWrap">
            <h2 class="p-topbaner__title">美容師で、<br>つながる。</h2>
            <p class="p-topbaner__titleSub">美容師だけのSNSブログ"BinQ"</p>
            <div class="c-btn__roundWrap">
                <a href="" class="c-btn__round">今すぐ始める</a>
            </div>
        </div>
        <div class="p-topbaner__mainImg">
            <img src="images/top-baner.jpg" alt="メイン画像">
        </div>
    </div>


</div>
@endsection