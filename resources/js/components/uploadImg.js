import jquery from "jquery";
window.$ = jquery;
require("cropper");

$(function () {
    
    let articleId = $('#js-articleId__for-ajax').attr('data-article__id');
    const $prevArea = $('#js-img__prevArea');
    const $delete = $('#js-img__delete')
    //==========================================================
    //記事本文の画像投稿
    //==========================================================≈
    $(document).on('change','#js-upload__img', function() {
        let file = this.files[0];
        let formData = new FormData();
        let postType = "body";
    
        formData.append('file', file);
        formData.append('article_id', articleId);
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
    $(document).on('change', '#js-upload-mainImg', function (e) {
        let file = this.files[0];
        let formData = new FormData();
        let postType = "header";
    
        let $x = $('#upload-image-x');
        let $y = $('#upload-image-y');
        let $w = $('#upload-image-w');
        let $h = $('#upload-image-h');

         // 初期設定
        let options =
        {
            aspectRatio: 1 / 1,
            viewMode: 1,
            dragMode: 'move',
            cropBoxMovable: false,
            cropBoxResizable: false,
            crop: function(e) {
                var cropData = $('#js-resize__img').cropper('getData');
            $x.val(Math.floor(cropData.x));
            $y.val(Math.floor(cropData.y));
            $w.val(Math.floor(cropData.width));
            $h.val(Math.floor(cropData.height));
            },
            // zoomable:false,
            minCropBoxWidth:375,
            minCropBoxHeight:375,
            maxCropBoxWidth:375,
            maxCropBoxHeight:375
        }

        // 初期設定をセットする
        $('#js-resize__img').cropper(options);
        $('#js-resize__img').cropper('setData(options)');
        console.log('ここ');
        $('#js-resize__img').cropper('replace', URL.createObjectURL(this.files[0]));
        $('#js-image__modal').show();
        $('#js-upload-mainImg').val('');
        
        
        // OKボタン押したら処理再開
        $('#js-resize__btn').one('click', function () {
            let x = $x.val();
            let y = $y.val();
            let w = $w.val();
            let h = $h.val();
            
            formData.append('file', file);
            formData.append('article_id', articleId);
            formData.append('postType', postType);
            formData.append('crop-x', x);
            formData.append('crop-y', y);
            formData.append('crop-w', w);
            formData.append('crop-h', h);
            $('#js-image__modal').hide();
            $('#js-resize__img').cropper('reset');
            $('#js-resize__img').cropper('clear');
            $('#js-resize__img').cropper('destroy');

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
                $prevArea.css({
                    'background-image': 'url("/storage/' + data + '")',
                });
                $prevArea.addClass('hasImg');
                $delete.addClass('hasImg');
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
            "article_id" : articleId,
            "postType":postType,
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
            $prevArea.css({
                'background-image': 'url("/images/image-plus.svg")',
            });
            $prevArea.removeClass('hasImg');
            $delete.removeClass('hasImg');
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