
function setBottomMarginTop() {
    let topHeight = $( '#js-detail__top' ).innerHeight();
    let topRightHeight = $( '#js-detail__top-right' ).outerHeight();
    const $bottom = $( '#js-detail__bottom' );

    let offsetHeight = topHeight - topRightHeight;
    if ( $( window ).innerWidth() >= 768 ) {
        $bottom.css( 'margin-top', -offsetHeight );
    } else {
        $bottom.css( 'margin-top', 0 );
    }
}
$( window ).on( 'load resize', function () {
    setBottomMarginTop();
} )
