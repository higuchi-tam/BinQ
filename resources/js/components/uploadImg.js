import jquery from "jquery";
window.$ = jquery;

require("cropper");
import { initCropper, setCropData, resetCropData } from './resizeImg';

$(function () {
    //複数の関数で使用する変数の宣言
    let _options = {
        articleId : $('#js-articleId__for-ajax').attr('data-article__id'),
        userId : $('#js-userId__for-ajax').val(),
        $prevArea : $('#js-img__prevArea'),
        $delete: $('#js-img__delete'),
        $x : $('#upload-image-x'),
        $y : $('#upload-image-y'),
        $w : $('#upload-image-w'),
        $h: $('#upload-image-h'),
        $cropTarget : $('#js-resize__img'),
        $cropModal : $('#js-image__modal'),
        $headerImgFile: $('#js-upload-mainImg'),
        isUserEdit: $('#js-edit_user').length
    }
    
//==========================================================
//記事本文の画像投稿
//==========================================================≈
    $(document).on('change','#js-upload__img', function() {
        let file = this.files[0];
        let formData = new FormData();
        let postType = "body";
    
        formData.append('file', file);
        formData.append('article_id', _options.articleId);
        formData.append('postType', postType);
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/articles/ajaxImgUpload',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
        })
        // Ajaxリクエストが成功した場合
        .done(function (data) {
            //現在のカーソル位置を特定し、そこに画像を挿入する
            let cursor = $('#js-articleId__for-ajax').attr('data-cursor__index');
            let newPosition = cursor ? cursor : editor.getLength();
            editor.setSelection(newPosition,0);
            
            editor.updateContents(
                new Delta()
                .retain(editor.getSelection().index)
                .insert('\n')
                .insert({
                    image: '/storage/'+data
                })
                .insert('\n')
            );
            editor.setSelection(Number(newPosition) + 1,0);
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data) {
            let status = data.status;
            let errMessage;

            switch (status) {
                case 413:
                    errMessage = 'アップロード上限は2MBです';
                    break;
                case 422:
                    errMessage = 'アップロードできるのは画像のみです';
                    break;
                default:
                    errMessage = 'アップロードに失敗しました。もう一度やり直してください';
            }
            alert(errMessage);
        })
    })
//==========================================================
//記事のヘッダー画像登録
//==========================================================

$(document).on('change', '#js-upload-mainImg,#js-upload-userImg', function () {
    let initOptions = {
        file : this.files[0],
        postType : "header",
        $cropTarget : _options.$cropTarget,
        $cropModal : _options.$cropModal,
        $headerImgFile: _options.$headerImgFile,
        $x : _options.$x,
        $y : _options.$y,
        $w : _options.$w,
        $h : _options.$h,
    }
    
    // cropprerの初期化・表示
    initCropper(initOptions);
})

//キャンセルボタンを押したら処理終了
$('#js-resize__cancel').on('click', function () {
    let options = {
        $cropTarget : _options.$cropTarget,
        $cropModal : _options.$cropModal,
        $headerImgFile: _options.$headerImgFile,
    }
    resetCropData(options);
});
    
// OKボタン押したら処理再開
$('#js-resize__ok').on('click', function () {
    
    let options = {
        file: document.getElementById('js-upload-mainImg').files[0],
        formData : new FormData(),
        articleId: _options.articleId,
        userId: _options.userId,
        postType: "header",
        x : _options.$x.val(),
        y : _options.$y.val(),
        w : _options.$w.val(),
        h : _options.$h.val(),
        $cropTarget : _options.$cropTarget,
        $cropModal : _options.$cropModal,
        $headerImgFile: _options.$headerImgFile,

        //プロフィール編集かコンテンツ編集かどうかの判定
        isUserEdit: _options.isUserEdit
    }

    //トリミングしたデータをformDataにセットする
    setCropData(options);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: options.isUserEdit ? '/users/ajaxImgUpload' :'/articles/ajaxImgUpload',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: options.formData,
    })
    // Ajaxリクエストが成功した場合
    .done(function (data) {
        _options.$prevArea.css({
            'background-image': 'url("/storage/' + data + '")',
        });
        _options.$prevArea.addClass('hasImg');
        _options.$delete.addClass('hasImg');
        return false;
    })
    // Ajaxリクエストが失敗した場合
    .fail(function (data) {
        let status = data.status;
        let errMessage;
        
        switch (status) {
            case 413:
                errMessage = 'アップロード上限は2MBです';
                break;
            case 422:
                errMessage = 'アップロードできるのは画像のみです';
                break;
            default:
                    errMessage = 'アップロードに失敗しました。もう一度やり直してください';
            }
        alert(errMessage);
        return false;
    })
})
//==========================================================
//記事のヘッダー画像削除
//==========================================================
$(document).on('click', '#js-img__delete', function () {
    
    const isUserEdit = $('#js-edit_user').length;

    let isDelete = 1;
    let postType = "header";
    
    let postData = {
        "article_id": _options.articleId,
        "user_id": _options.userId,
        "postType": postType,
        "isDelete": isDelete,
    };
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: isUserEdit ? '/users/ajaxImgUpload' : '/articles/ajaxImgUpload',
        type: 'POST',
        dataType: 'json',
        data: postData,
    })
    // Ajaxリクエストが成功した場合
    .done(function (data) {
        _options.$prevArea.css({
            'background-image': 'url("/images/image-plus.svg")',
        });
        _options.$prevArea.removeClass('hasImg');
        _options.$delete.removeClass('hasImg');
    })
    // Ajaxリクエストが失敗した場合
    .fail(function (data) {
        let status = data.status;
        let errMessage;

        switch (status) {
            case 413:
                errMessage = 'アップロード上限は2MBです';
                break;
            case 422:
                errMessage = 'アップロードできるのは画像のみです';
                break;
            default:
                errMessage = 'アップロードに失敗しました。もう一度やり直してください';
            }
            alert(errMessage);
    })
});
})