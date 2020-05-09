$(function () {
    $(document).on('click', '.js-comment__editBtn', function () {
        const $target = $(this);
        const $preview = $target.parents('.js-comment__item').find('.js-comment__preview');
        const $editArea = $target.parents('.js-comment__item').find('.js-comment__editArea');
        
        $preview.hide();
        $editArea.show();
    })
    $(document).on('click', '.js-comment__canselBtn', function () {
        const $target = $(this);
        const $preview = $target.parents('.js-comment__item').find('.js-comment__preview');
        const $editArea = $target.parents('.js-comment__item').find('.js-comment__editArea');
        
        $preview.show();
        $editArea.hide();
    })
    
    $(document).on('click', '.js-comment__icon,.js-comment__action', function () {
        const $target = $(this);
        const $action = $target.parents('.js-comment__item').find('.js-comment__action');
        
        $action.toggle();
    })
    
    $(document).on('click', '.js-comment__deleteBtn', function (e) {
        const $target = $(this);
        $modal = $('#js-comment__modal');
        $form = $target.parents('form');
        
        e.stopPropagation();
        e.preventDefault();
        $modal.show();

        $('#js-comment__modal__delete').on('click', function () {
            $form.submit();
        })
        
    })
    $(document).on('click', '#js-comment__modal__close', function () {
        const $modal = $('#js-comment__modal');
        
        $modal.hide();
    })
    
    if ($('.js-comment__action').hasClass('is-active')) {
        $(document).on('click', function () {
            const $modal = $('#js-comment__modal');
            $modal.hide();
        })
    }

});