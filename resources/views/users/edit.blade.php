@extends('layouts.app')
@include('layouts.header')
@include('layouts.footer')

@section('content')
<div class="l-container">
    <div class="p-form__container">

        <form id="js-edit_user" class="edit_user" enctype="multipart/form-data"
            action="{{ route('users.update', ['name' => $user->userId]) }}" accept-charset="UTF-8" method="post">
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
                                    <img src="{{ asset('images/close.svg') }}" alt="閉じるボタン">
                                </div>
                                <div class="p-form__image__modal" id="js-image__modal">
                                    <div class="p-form__image__modal__inner">
                                        <img id="js-resize__img" src="" alt="画像表示エリア">
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
                                <label for="name" class="p-form__label">ユーザーID<span
                                        class="p-form__required">必須</span></label>
                                <div class="p-form__idWrapper">
                                    <span>@ </span><input autofocus="autofocus" class="p-form__item p-form__item--id"
                                        type="text" value="{{ old('userId',$user->userId) }}" name="userId" />
                                </div>
                                <span class="p-form__subtext">※ユーザーIDがマイページのURLとなります</span>
                                @error('userId')
                                <div class="c-error__msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="u-mb20">
                                <label for="title" class="p-form__label">ユーザー名<span
                                        class="p-form__required p-form__required--optional">任意</span>
                                </label> <input autofocus="autofocus" class="p-form__item" type="text"
                                    value="{{ old('name',$user->name) }}" name="name" />
                                <span class="p-form__subtext">※ユーザー名がない場合、ユーザーIDを表示します</span>
                                @error('name')
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