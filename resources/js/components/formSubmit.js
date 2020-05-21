$(function () {
    $(document).on('click','.js-form__submit',function () {
        $tgt = $(this);

        const type = $tgt.attr('data-type');
        const $postType = $('#js-postType');

        setPostType(type);
        function setPostType(option){
            $postType.val(option);
        }
            
        $('form').submit();
    })
})