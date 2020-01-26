(function ($) {
    /* Toggle mobile menu */
    $(".toggle-icon").click(function () {
        $("#navbarMenu").toggleClass('show')
    });
    /* Show submenu items on menu item hover (desktop and tablet) */
    function setup_collapsible_submenus() {
        var parent = $('#top-menu .menu-item-has-children');

        if (window.matchMedia('(min-width: 601px)').matches) {

            $(parent).hover(function (e) {  // mouse enter
                $(this).children('ul').addClass('show'); // display immediate child
            }, function () { // mouse leave
                $(this).children('ul').removeClass('show');
            });
        }
        //Allow keyboard menu dropdown navigation for accessibility
        $('.menu-item-has-children a').focus(function () {
            $(this).siblings('ul').addClass('show');            
        })
        // CLean up
        parent = document.getElementById('top-menu');
        parent.addEventListener('focusout', e => {
            const leavingParent = !parent.contains(e.relatedTarget);   
            if (leavingParent) {
                //Hide submenu when the user tabs outside of the main menu and all of its children
                $('#top-menu .sub-menu').removeClass('show');
            }
        });
    }
    $(window).load(function () {
        setTimeout(function () {
            setup_collapsible_submenus();
        }, 100);
    });
})(jQuery);