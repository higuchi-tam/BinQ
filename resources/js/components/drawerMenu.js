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

    $(document).on('click', '#js-drawer__click-target.is-inactive', function () {
        drawerOpen();
    })
    $(document).on('click', '#js-drawer__click-target.is-active', function () {
        drawerClose();
    })
    $(document).on('click', '#js-drawer__bg', function () {
        drawerClose();
    })
    
});
