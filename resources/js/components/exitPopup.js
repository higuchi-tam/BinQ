 if($('.js-popup')){
    $('.js-popup').click(function() {
    $(window).off('beforeunload');
    });
    $(window).on('beforeunload', function (e) {
        return 'このページを離れますか？'; // Google Chrome以外
    });
  
}