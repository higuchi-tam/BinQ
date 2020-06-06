$(function () {
    
    let event;
    const $title = $('#js-title');
    const $body = $('.js-body');
    const $bodyKeyupTarget = $('.ql-editor');
    const $saveMsg = $('#js-save__msg');
    const $saveTime = $('#js-save__time');
    const $savingTime = $('#js-save__msg--saving');

    $(document).on('keyup', [$title, $bodyKeyupTarget], function () {
        $saveMsg.css('display','none');
        ajaxDraftSave();
        
    })
    
function setEvent() {
    event = setTimeout(() => {
        saveEvent();
    }, 3000);
}

function clearEvent() {
    clearTimeout(event);
}

function ajaxDraftSave() {
    clearEvent();
    $savingTime.css('display', 'block');
    setEvent();
}

    function saveEvent() {
        let title = $title.val();
        let body = $body.val();
        
        let postData = {
            "title": title,
            "body": body,
            "open_flg": 1,
            "article_id": $('#js-articleId__for-ajax').attr('data-article__id'),
        };
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/articles/ajaxUpdate',
            type: 'POST',
            dataType: 'json',
            data: postData,
        })
            // Ajaxリクエストが成功した場合
            .done(function (data) {
                $savingTime.css('display', 'none');
                $saveMsg.css('display','block');
                $saveTime.text(data);
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data) {
            })
    }
})