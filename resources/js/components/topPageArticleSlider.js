$( function () {

    // ============================================
    // 変数宣言
    // ============================================
    const $slider = $( '#js-slider--art' );
    const $slideItem = $( '.js-slide__item--art' );
    let sliderWidth;
    let slideItemMarginRight;
    let slideItemWidth;

    const $prevBtn = $( '#js-slide__prev--art' );
    const $nextBtn = $( '#js-slide__next--art' );

    let currentPosition = 0;
    let currentIndex = 1;
    let slideItemCount = $slideItem.length;
    let slideItemPages = Math.ceil( slideItemCount / 3 );

    let startPage = 1;
    let endPage = slideItemPages;

    // ============================================
    // 関数定義
    // ============================================
    function init() {
        setInActiveClass();
        setSlideItemWidth();
    }

    function setSlideItemWidth() {
        sliderWidth = $slider.innerWidth();
        slideItemMarginRight = parseInt( $slideItem.css( 'margin-right' ) );
        slideItemWidth = ( sliderWidth - slideItemMarginRight * 2 ) / 3;
        $slideItem.css( 'width', slideItemWidth );
    }

    function setInActiveClass() {
        $nextBtn.removeClass( 'is-inactive' );
        $prevBtn.removeClass( 'is-inactive' );

        if ( currentIndex === startPage ) {
            $prevBtn.addClass( 'is-inactive' );
        } else if ( currentIndex === endPage ) {
            $nextBtn.addClass( 'is-inactive' );
        }
    }

    function setSlideItem() {
        $slider.css( 'transform', 'translateX(' + currentPosition + 'px)' )
    }

    // ============================================
    // controller
    // ============================================
    $( window ).on( "load resize", function () {
        init();
    } )

    $( document ).on( 'click', '#js-slide__next--art', function () {
        currentIndex++
        setInActiveClass();

        currentPosition -= sliderWidth + slideItemMarginRight;
        setSlideItem();
    } )
    $( document ).on( 'click', '#js-slide__prev--art', function () {
        currentIndex--
        setInActiveClass();

        currentPosition += sliderWidth + slideItemMarginRight;
        setSlideItem();
    } )

} )
