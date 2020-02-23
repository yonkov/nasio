(function ($) {
    /* Toggle mobile menu */
    $(".toggle-icon").click(function () {
        $("#navbarMenu").toggleClass('show')
    });
    /* Keyboard Navigation */
    function nasio_kb_navigation() {
        $('#top-menu .menu-item-has-children a').on('focus blur',
            function(){
                // recursively go up the DOM using .parents() method
                $(this).parents("li").toggleClass("show");
            }
        );
    }
    // Make sure the function is loaded after the DOM
    $(window).load(function () {
        setTimeout(function () {
            nasio_kb_navigation();
        }, 100);
    });
})(jQuery);