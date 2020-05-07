import jquery from "jquery";
window.$ = jquery;

$(document).on('change','#js-upload__img', function() {
    let $tgt = $(this);
    let file = this.files[0];
    let formData = new FormData();
    let articleId = $('#js-articleId__for-ajax').attr('data-article__id');
    formData.append('file', file);
    formData.append('article_id', articleId);

    let postData = {'FormData': formData};
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
            // let $editor = window.editor;
            let cursor = $('#js-articleId__for-ajax').attr('data-cursor__index');
            let newPosition = cursor ? cursor : editor.getLength();
            console.log('newPosition');
            console.log(newPosition);
            console.log('newPosition+1');
            console.log(Number(newPosition) + 1);

            console.log('ここまで1-2');
            editor.setSelection(newPosition,0);

            console.log('editor.getSelection()');
            console.log(editor.getSelection());

            editor.updateContents(
                new Delta()
                    .retain(editor.getSelection().index)
                    .insert({
                        image: '/storage/'+data
                    })
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

