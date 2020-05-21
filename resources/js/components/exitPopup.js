if ($('.js-popup').length) {
     
    $(document).on('click','.js-popup',function() {
         $(window).off('beforeunload');
    });
    $(window).on('beforeunload', function (e) {
        return 'このページを離れますか？'; // Google Chrome以外
    });
  
}