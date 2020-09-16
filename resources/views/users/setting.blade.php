@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('content')
<div class="l-container u-pr20 u-pl20">
    <div class="p-setting__container u-pt60">
        <div class="p-setting__inner">

            <div class="u-mb20">
                <h2 class="p-setting__title">アカウント設定</h2>

                <div class="p-setting__img">
                    @include('users.icon',['target_user' => $auth_user])
                </div>

                <div class="u-mb40">
                    <label for="name" class="p-setting__label">ユーザーID<span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span></label>
                    <div class="p-form__idWrapper">
                        <div>@ {{ $user->userId }}</div>
                    </div>
                    <span class="p-setting__subtext">※ユーザーIDがマイページのURLとなります</span>

                </div>

                <div class="u-mb40">
                    <label for="title" class="p-setting__label">ユーザー名<span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span>
                    </label>
                    <div>{!! $user->name?$user->name:'<span class="p-setting__nomsg">他のユーザーに対してはユーザー名が表示されます</span>' !!}
                    </div>
                    <span class="p-setting__subtext">※ユーザー名がない場合、ユーザーIDを表示します</span>

                </div>

                <div class="u-mb40">
                    <label for="comment" class="p-setting__label">コメント<span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span>
                    </label>
                    <div>{!! $user->comment?$user->comment:'<span class="p-setting__nomsg">自己紹介</span>' !!}</div>
                </div>

                <div class="u-mb40">
                    <label for="email" class="p-setting__label">メールアドレス<span class="p-setting__toEdit"><a
                                href="{{ route('changeEmail.index') }}">変更</a></span>
                    </label>
                    <div>{{ $user->email }}</div>

                </div>
                <div class="u-mb40">
                    <label for="email" class="p-setting__label">パスワード<span class="p-setting__toEdit"><a
                                href="{{ route('changepassword') }}">変更</a></span>
                    </label>
                    <div>********</div>

                </div>

                <div class="u-mb40">
                    <label for="url" class="p-setting__label">URL<span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span>
                    </label>
                    <div>{!! $user->url?$user->url:'<span class="p-setting__nomsg">ブログやHP等のURL</span>' !!}</div>
                </div>

                <div class="u-mb40">
                    <label for="twitter_url" class="p-setting__label">Twitter<span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span>
                    </label>
                    <div>{!! $user->twitter_url?$user->twitter_url:'<span
                            class="p-setting__nomsg">twitterのプロフィールページURL</span>' !!}
                    </div>
                </div>

                <div class="u-mb40">
                    <label for="facebook_url" class="p-setting__label">Facebook<span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span>
                    </label>
                    <div>{!! $user->facebook_url?$user->facebook_url:'<span
                            class="p-setting__nomsg">facebookのプロフィールページURL</span>' !!}</div>
                </div>

                <div class=" u-mb40">
                    <label for="instagram_url" class="p-setting__label">Instagram <span class="p-setting__toEdit"><a
                                href="{{ route('users.edit',$user->userId) }}">変更</a></span>
                    </label>
                    <div>{!! $user->instagram_url?$user->instagram_url:'<span
                            class="p-setting__nomsg">InstagramのプロフィールページURL</span>' !!}</div>
                </div>
            </div>
            <div class="p-setting__delete">
                アカウントを<a href="{{ route('users.delete.confirm',$user->userId) }}">削除</a>する
            </div>
        </div>
    </div>
    @endsection