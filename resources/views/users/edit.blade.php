@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')
@include('common.errors')

@section('content')
<div class="l-container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="profile-form-wrap">

                <form class="edit_user" enctype="multipart/form-data"
                    action="{{ route('users.update', ['name' => $user->name]) }}" accept-charset="UTF-8" method="post">
                    <input name="utf8" type="hidden" value="✓" />
                    <input type="hidden" name="id" value="{{ $user->id }}" />

                    {{csrf_field()}}

                    @method('PATCH')
                    <div class="form-group">
                        <label for="profile_photo">プロフィール写真</label><br>
                        @if ($user->profile_photo)
                        <p>
                            <img src="{{ asset('storage/user_images/' . $user->profile_photo) }}" alt="avatar" />
                        </p>
                        @endif
                        <input type="file" name="profile_photo" value="{{ old('profile_photo',$user->id) }}"
                            accept="image/jpeg,image/gif,image/png" />
                    </div>

                    <div class="form-group">
                        <label for="name">ユーザー名</label>
                        <input autofocus="autofocus" class="form-control" type="text"
                            value="{{ old('name',$user->name) }}" name="name" />
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input autofocus="autofocus" class="form-control" type="email"
                            value="{{ old('email',$user->email) }}" name="email" />
                    </div>

                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input autofocus="autofocus" class="form-control" type="password"
                            value="{{ old('password',$user->password) }}" name="password" />
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">パスワードの確認</label>
                        <input autofocus="autofocus" class="form-control" type="password"
                            name="password_confirmation" />
                    </div>

                    <div class="form-group">
                        <label for="title">肩書き</label>
                        <input autofocus="autofocus" class="form-control" type="text"
                            value="{{ old('title',$user->title) }}" name="title" />
                    </div>

                    <div class="form-group">
                        <label for="comment">コメント</label>
                        <input autofocus="autofocus" class="form-control" type="text"
                            value="{{ old('comment',$user->comment) }}" name="comment" />
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input autofocus="autofocus" class="form-control" type="text"
                            value="{{ old('url',$user->url) }}" name="url" />
                    </div>

                    <input type="submit" value="変更を保存する"  />
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
