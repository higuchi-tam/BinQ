import jquery from "jquery";
window.$ = jquery;

require("cropper");
import { initCropper, setCropData } from './resizeImg';

$(function () {
    //複数の関数で使用する変数の宣言
    let _options = {
        articleId : $('#js-articleId__for-ajax').attr('data-article__id'),
        $prevArea : $('#js-img__prevArea'),
        $delete : $('#js-img__delete'),
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
    $(document).on('change', '#js-upload-mainImg', function () {
        let initOptions = {
            file : this.files[0],
            formData : new FormData(),
            postType : "header",
            $cropTarget : $('#js-resize__img'),
            $cropModal : $('#js-image__modal'),
            $headerImgFile: $('#js-upload-mainImg'),
            $x : $('#upload-image-x'),
            $y : $('#upload-image-y'),
            $w : $('#upload-image-w'),
            $h : $('#upload-image-h'),
        }
        
        // cropprerの初期化・表示
        initCropper(initOptions);
        
        // OKボタン押したら処理再開
        $('#js-resize__btn').one('click', function () {
            let addOptions = {
                x: initOptions.$x.val(),
                y: initOptions.$y.val(),
                w: initOptions.$w.val(),
                h: initOptions.$h.val(),
            }

            let setCropOptions = $.extend(_options, initOptions, addOptions);

            setCropData(setCropOptions);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/articles/ajaxImgUpload',
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: initOptions.formData,
            })
            // Ajaxリクエストが成功した場合
            .done(function (data) {
                _options.$prevArea.css({
                    'background-image': 'url("/storage/' + data + '")',
                });
                _options.$prevArea.addClass('hasImg');
                _options.$delete.addClass('hasImg');
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
    })
    //==========================================================
    //記事のヘッダー画像削除
    //==========================================================
    $(document).on('click', '#js-img__delete', function () {
        let isDelete = 1;
        let postType = "header";
        
        let postData = {
            "article_id": _options.articleId,
            "postType": postType,
            "isDelete": isDelete,
        };
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/articles/ajaxImgUpload',
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