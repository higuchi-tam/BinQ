@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')
@include('common.errors')

@section('content')
<div class="l-container">
    <div class="p-form__container">

        <form class="edit_user" enctype="multipart/form-data"
            action="{{ route('users.update', ['name' => $user->name]) }}" accept-charset="UTF-8" method="post">
            <input name="utf8" type="hidden" value="✓" />
            <input type="hidden" name="id" value="{{ $user->id }}" />
            {{csrf_field()}}

            @method('PATCH')
            <div class="u-mb20">
                <h2 class="p-form__title">プロフィール編集画面</h2><br>
                @if ($user->profile_photo)
                <p>
                    <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}" alt="avatar" />
                </p>
                @endif
                <input type="file" name="profile_photo" value="{{ old('profile_photo',$user->id) }}"
                    accept="image/jpeg,image/gif,image/png" />
            </div>

            <div class="p-form__wrap">

                <div class="u-mb10">
                    <label for="name" class="p-form__label">ユーザー名</label><br>
                    <input autofocus="autofocus" class="p-form__item" type="text" value="{{ old('name',$user->name) }}"
                        name="name" />
                </div>

                <div class="u-mb10">
                    <label for="title">肩書き</label><br>
                    <input autofocus="autofocus" class="p-form__item" type="text"
                        value="{{ old('title',$user->title) }}" name="title" />
                </div>

                <div class="u-mb10">
                    <label for="comment">コメント</label><br>
                    <textarea autofocus="autofocus" class="p-form__item p-form__comment" type="text"
                         name="comment">{{ old('comment',$user->comment) }}</textarea>
                </div>

                <div class="u-mb10">
                    <label for="email">メールアドレス</label><br>
                    <input autofocus="autofocus" class="p-form__item" type="email"
                        value="{{ old('email',$user->email) }}" name="email" />
                </div>

                <div class="u-mb10">
                    <label for="password">パスワード</label><br>
                    <input autofocus="autofocus" class="p-form__item" type="password"
                        value="{{ old('password',$user->password) }}" name="password" />
                </div>

                <div class="u-mb10">
                    <label for="password_confirmation">パスワードの確認</label><br>
                    <input autofocus="autofocus" value="{{ old('password',$user->password) }}"
                    class="p-form__item" type="password" name="password_confirmation" />
                </div>

                <div class="u-mb10">
                    <label for="url">URL</label><br>
                    <input autofocus="autofocus" class="p-form__item" type="text" value="{{ old('url',$user->url) }}"
                        name="url" />
                </div>

            </div>

            <input type="submit" value="変更を保存する" class="c-button__primary p-form__submit" />
    </div>

    </form>
</div>
@endsection
