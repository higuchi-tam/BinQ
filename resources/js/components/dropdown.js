export default function dropdown(){
    $(".js-dropdown").on("click", function() {
        $(this)
            .next()
            .slideToggle("fast");
    });
};
