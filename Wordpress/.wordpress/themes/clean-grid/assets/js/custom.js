jQuery(document).ready(function($) {

    if(clean_grid_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var cleangridstickyNavTop = $('.clean-grid-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var cleangridstickyNav = function(){
        var cleangridscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(window.innerWidth > 1112) {
            if (cleangridscrollTop > cleangridstickyNavTop) {
                $('.clean-grid-primary-menu-container').addClass('clean-grid-fixed');
            } else {
                $('.clean-grid-primary-menu-container').removeClass('clean-grid-fixed'); 
            }
        }
    };

    cleangridstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        cleangridstickyNav();
    });
    }

    //$(".clean-grid-nav-primary .clean-grid-primary-nav-menu").addClass("clean-grid-primary-responsive-menu").before('<div class="clean-grid-primary-responsive-menu-icon"></div>');
    $(".clean-grid-nav-primary .clean-grid-primary-nav-menu").addClass("clean-grid-primary-responsive-menu");

    $(".clean-grid-primary-responsive-menu-icon").click(function(){
        $(this).next(".clean-grid-nav-primary .clean-grid-primary-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".clean-grid-nav-primary .clean-grid-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".clean-grid-primary-responsive-menu > li").removeClass("clean-grid-primary-menu-open");
        }
    });

    $(".clean-grid-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").toggleClass('clean-grid-submenu-toggle').parent().toggleClass("clean-grid-primary-menu-open");
        $(this).find(".children:first").toggleClass('clean-grid-submenu-toggle').parent().toggleClass("clean-grid-primary-menu-open");
    });

    $("div.clean-grid-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").toggleClass('clean-grid-submenu-toggle').parent().toggleClass("clean-grid-primary-menu-open");
    });

    $(".clean-grid-social-search-icon").on('click', function (e) {
        e.preventDefault();
        $('.clean-grid-social-search-box').slideToggle(400);
    });

    $(".post").fitVids();

    var scrollButtonEl = $( '.clean-grid-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.clean-grid-scroll-top' ).fadeOut();
        } else {
            $( '.clean-grid-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(clean_grid_ajax_object.sticky_sidebar){
    $('.clean-grid-main-wrapper, .clean-grid-sidebar-wrapper').theiaStickySidebar({
        containerSelector: ".clean-grid-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 785,
    });
    }

    $(".clean-grid-grid-post-thumbnail").attr("tabindex",0);

});