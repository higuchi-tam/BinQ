$(function() {
    $(".js-dropdown").on("click", function() {
        $(this)
            .next()
            .slideToggle("fast");
    });
});
