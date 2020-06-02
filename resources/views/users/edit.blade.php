@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('content')
<div class="l-container">
    <div class="p-form__container">

        <form id="js-edit_user" class="edit_user" enctype="multipart/form-data"
            action="{{ route('users.update', ['name' => $user->name]) }}" accept-charset="UTF-8" method="post">
            <input name="utf8" type="hidden" value="✓" />
            <input type="hidden" name="id" value="{{ $user->id }}" id="js-userId__for-ajax" />
            {{csrf_field()}}

            @method('PATCH')
            <div class="u-mb20">
                <h2 class="p-form__title">プロフィール編集画面</h2>

                {{-- 画像があれば画像表示、なければアイコン表示 --}}
                @if(preg_match('/^http.+/',$user->profile_photo))
                <div id="js-img__prevArea" class="p-form__image p-form__image--user hasImg"
                    style="background-image:url('{{ $user->profile_photo }}');">
                    @elseif($user->profile_photo)
                    <div id="js-img__prevArea" class="p-form__image p-form__image--user hasImg"
                        style="background-image:url('{{"/storage/".$user->profile_photo}}');">
                        @else
                        <div id="js-img__prevArea" class="p-form__image"
                            style="background-image: url('/images/image-plus.svg');">
                            @endif
                            <label for="js-upload-mainImg" class="p-form__image__area"><input type="file"
                                    id="js-upload-mainImg" class="p-form__image__input"></label>
                            {{-- 画像があればhasImgクラス付与 --}}
                            @if($user->profile_photo)
                            <div class="p-form__image__deleteBtn hasImg" id="js-img__delete">
                                @else
                                <div class="p-form__image__deleteBtn" id="js-img__delete">
                                    @endif
                                    <img src="{{ asset('images/close.svg') }}" alt="">
                                </div>
                                <div class="p-form__image__modal" id="js-image__modal">
                                    <div class="p-form__image__modal__inner">
                                        <img id="js-resize__img" src="" alt="">
                                        <input type="hidden" id="upload-image-x" name="profileImageX" value="0" />
                                        <input type="hidden" id="upload-image-y" name="profileImageY" value="0" />
                                        <input type="hidden" id="upload-image-w" name="profileImageW" value="0" />
                                        <input type="hidden" id="upload-image-h" name="profileImageH" value="0" />
                                    </div>
                                    <div class="p-form__image__modal__btns">
                                        <button type="button" class="p-form__image__modal__btn"
                                            id="js-resize__cancel">キャンセル</button>
                                        <button type="button" class="p-form__image__modal__btn ok"
                                            id="js-resize__ok">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-form__wrap">

                            <div class="u-mb20">
                                <label for="name" class="p-form__label">ユーザー名<span
                                        class="p-form__required">必須</span></label>
                                <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('name',$user->name) }}" name="name" />
                                @error('name')
                                <div class="c-error__msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="u-mb20">
                                <label for="title" class="p-form__label">肩書き<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('title',$user->title) }}" name="title" />
                                @error('title')
                                <div class="c-error__msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="u-mb20">
                                <label for="comment" class="p-form__label">コメント<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label> <textarea autofocus="autofocus" class="p-form__item p-form__comment"
                                    type="text" name="comment">{{ old('comment',$user->comment) }}</textarea>
                            </div>

                            <div class="u-mb20">
                                <label for="email" class="p-form__label">メールアドレス<span class="p-form__required">必須</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="email"
                                    value="{{ old('email',$user->email) }}" name="email" />
                                @error('email')
                                <div class="c-error__msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="u-mb20">
                                <label for="password" class="p-form__label">パスワード<span
                                        class="p-form__required">必須</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="password"
                                    value="{{ old('password',$user->password) }}" name="password" />
                                @error('password')
                                <div class="c-error__msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="u-mb20">
                                <label for="password_confirmation" class="p-form__label">パスワードの確認<span
                                        class="p-form__required">必須</span>
                                </label> <input autofocus="autofocus" value="{{ old('password',$user->password) }}"
                                    class="p-form__item" type="password" name="password_confirmation" />
                            </div>

                            <div class="u-mb20">
                                <label for="url" class="p-form__label">URL<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('url',$user->url) }}" name="url" />
                            </div>

                            <div class="u-mb20">
                                <label for="twitter_url" class="p-form__label">Twitter<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('twitter_url',$user->twitter_url) }}" name="twitter_url" />
                            </div>

                            <div class="u-mb20">
                                <label for="facebook_url" class="p-form__label">Facebook<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('facebook_url',$user->facebook_url) }}" name="facebook_url" />
                            </div>

                            <div class="u-mb40">
                                <label for="instagram_url" class="p-form__label">Google<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label>
                                <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('instagram_url',$user->instagram_url) }}" name="instagram_url" />
                            </div>


                        </div>

                        <input type="submit" value="変更を保存する" class="c-button__primary p-form__submit" />
                    </div>

        </form>
    </div>
    @endsection