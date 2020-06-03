$(function () {

    const $icon = $('#js-drawer__click-target');
    const $menu = $('#js-drawer__menu');
    const $bg = $('#js-drawer__bg');

    function drawerOpen() {
        $icon.removeClass('is-inactive');
        $icon.addClass('is-active');
        $menu.show();
        $bg.show();
    }

    function drawerClose() {
        $icon.removeClass('is-active');
        $icon.addClass('is-inactive');
        $menu.hide();
        $bg.hide();
    }

    // スクロール禁止
    function no_scroll() {
        // PCでのスクロール禁止
        document.addEventListener("mousewheel", scroll_control, { passive: false });
        // スマホでのタッチ操作でのスクロール禁止
        document.addEventListener("touchmove", scroll_control, { passive: false });
    }
    // スクロール禁止解除
    function return_scroll() {
        // PCでのスクロール禁止解除
        document.removeEventListener("mousewheel", scroll_control, { passive: false });
        // スマホでのタッチ操作でのスクロール禁止解除
        document.removeEventListener('touchmove', scroll_control, { passive: false });
    }
    // スクロール関連メソッド
    function scroll_control(event) {
        event.preventDefault();
    }
    
    $(document).on('click', '#js-drawer__click-target.is-inactive', function () {
        drawerOpen();
        no_scroll();
    })
    $(document).on('click', '#js-drawer__click-target.is-active', function () {
        drawerClose();
        return_scroll();
    })
    $(document).on('click', '#js-drawer__bg', function () {
        drawerClose();
        return_scroll();
    })
    
});
