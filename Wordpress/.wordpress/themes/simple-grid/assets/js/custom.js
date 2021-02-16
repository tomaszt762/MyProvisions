jQuery(document).ready(function($) {
    'use strict';

    if(simple_grid_ajax_object.secondary_menu_active){
        if(simple_grid_ajax_object.secondary_mobile_menu_active){

        $(".simple-grid-nav-secondary .simple-grid-secondary-nav-menu").addClass("simple-grid-secondary-responsive-menu");

        $(".simple-grid-secondary-responsive-menu-icon").click(function(){
            $(this).next(".simple-grid-nav-secondary .simple-grid-secondary-nav-menu").slideToggle();
        });

        $(window).resize(function(){
            if(window.innerWidth > 1112) {
                $(".simple-grid-nav-secondary .simple-grid-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".simple-grid-secondary-responsive-menu > li").removeClass("simple-grid-secondary-menu-open");
            }
        });

        $(".simple-grid-secondary-responsive-menu > li").click(function(event){
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('simple-grid-submenu-toggle').parent().toggleClass("simple-grid-secondary-menu-open");
            $(this).find(".children:first").toggleClass('simple-grid-submenu-toggle').parent().toggleClass("simple-grid-secondary-menu-open");
        });

        $("div.simple-grid-secondary-responsive-menu > ul > li").click(function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('simple-grid-submenu-toggle').parent().toggleClass("simple-grid-secondary-menu-open");
        });

        }
    }

    if(simple_grid_ajax_object.primary_menu_active){
        if(simple_grid_ajax_object.primary_mobile_menu_active){

            if(simple_grid_ajax_object.sticky_menu_active){
            // grab the initial top offset of the navigation 
            var simplegridstickyNavTop = $('.simple-grid-primary-menu-container').offset().top;
            
            // our function that decides weather the navigation bar should have "fixed" css position or not.
            var simplegridstickyNav = function(){
                var simplegridscrollTop = $(window).scrollTop(); // our current vertical position from the top
                     
                // if we've scrolled more than the navigation, change its position to fixed to stick to top,
                // otherwise change it back to relative

                if(simple_grid_ajax_object.sticky_mobile_menu_active){
                    if (simplegridscrollTop > simplegridstickyNavTop) {
                        $('.simple-grid-primary-menu-container').addClass('simple-grid-fixed');
                    } else {
                        $('.simple-grid-primary-menu-container').removeClass('simple-grid-fixed');
                    }
                } else {
                    if(window.innerWidth > 1112) {
                        if (simplegridscrollTop > simplegridstickyNavTop) {
                            $('.simple-grid-primary-menu-container').addClass('simple-grid-fixed');
                        } else {
                            $('.simple-grid-primary-menu-container').removeClass('simple-grid-fixed'); 
                        }
                    }
                }
            };

            simplegridstickyNav();
            // and run it again every time you scroll
            $(window).scroll(function() {
                simplegridstickyNav();
            });
            }

            //$(".simple-grid-nav-primary .simple-grid-primary-nav-menu").addClass("simple-grid-primary-responsive-menu").before('<div class="simple-grid-primary-responsive-menu-icon"></div>');
            $(".simple-grid-nav-primary .simple-grid-primary-nav-menu").addClass("simple-grid-primary-responsive-menu");

            $(".simple-grid-primary-responsive-menu-icon").click(function(){
                $(this).next(".simple-grid-nav-primary .simple-grid-primary-nav-menu").slideToggle();
            });

            $(window).resize(function(){
                if(window.innerWidth > 1112) {
                    $(".simple-grid-nav-primary .simple-grid-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                    $(".simple-grid-primary-responsive-menu > li").removeClass("simple-grid-primary-menu-open");
                }
            });

            $(".simple-grid-primary-responsive-menu > li").click(function(event){
                if (event.target !== this)
                return;
                $(this).find(".sub-menu:first").toggleClass('simple-grid-submenu-toggle').parent().toggleClass("simple-grid-primary-menu-open");
                $(this).find(".children:first").toggleClass('simple-grid-submenu-toggle').parent().toggleClass("simple-grid-primary-menu-open");
            });

            $("div.simple-grid-primary-responsive-menu > ul > li").click(function(event) {
                if (event.target !== this)
                    return;
                $(this).find("ul:first").toggleClass('simple-grid-submenu-toggle').parent().toggleClass("simple-grid-primary-menu-open");
            });

        }
    }

    if($(".simple-grid-social-icon-search").length){
        $(".simple-grid-social-icon-search").on('click', function (e) {
            e.preventDefault();
            document.getElementById("simple-grid-search-overlay-wrap").style.display = "block";
            const simple_grid_focusableelements = 'button, [href], input';
            const simple_grid_search_modal = document.querySelector('#simple-grid-search-overlay-wrap');
            const simple_grid_firstfocusableelement = simple_grid_search_modal.querySelectorAll(simple_grid_focusableelements)[0];
            const simple_grid_focusablecontent = simple_grid_search_modal.querySelectorAll(simple_grid_focusableelements);
            const simple_grid_lastfocusableelement = simple_grid_focusablecontent[simple_grid_focusablecontent.length - 1];
            document.addEventListener('keydown', function(e) {
              let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
              if (!isTabPressed) {
                return;
              }
              if (e.shiftKey) {
                if (document.activeElement === simple_grid_firstfocusableelement) {
                  simple_grid_lastfocusableelement.focus();
                  e.preventDefault();
                }
              } else {
                if (document.activeElement === simple_grid_lastfocusableelement) {
                  simple_grid_firstfocusableelement.focus();
                  e.preventDefault();
                }
              }
            });
            simple_grid_firstfocusableelement.focus();
        });
    }

    if($(".simple-grid-search-closebtn").length){
        $(".simple-grid-search-closebtn").on('click', function (e) {
            e.preventDefault();
            document.getElementById("simple-grid-search-overlay-wrap").style.display = "none";
        });
    }

    $(".entry-content, .widget").fitVids();

    if($(".simple-grid-scroll-top").length){
        var simple_grid_scroll_button = $( '.simple-grid-scroll-top' );
        simple_grid_scroll_button.hide();

        $( window ).scroll( function () {
            if ( $( window ).scrollTop() < 20 ) {
                $( '.simple-grid-scroll-top' ).fadeOut();
            } else {
                $( '.simple-grid-scroll-top' ).fadeIn();
            }
        } );

        simple_grid_scroll_button.click( function () {
            $( "html, body" ).animate( { scrollTop: 0 }, 300 );
            return false;
        } );
    }

    if(simple_grid_ajax_object.sticky_sidebar_active){
        $('.simple-grid-main-wrapper, .simple-grid-sidebar-one-wrapper').theiaStickySidebar({
            containerSelector: ".simple-grid-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 960,
        });

        $(window).resize(function(){
            $('.simple-grid-main-wrapper, .simple-grid-sidebar-one-wrapper').theiaStickySidebar({
                containerSelector: ".simple-grid-content-wrapper",
                additionalMarginTop: 0,
                additionalMarginBottom: 0,
                minWidth: 960,
            });
        });
    }

});