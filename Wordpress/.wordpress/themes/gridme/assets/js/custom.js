jQuery(document).ready(function($) {
    'use strict';

    if(gridme_ajax_object.secondary_menu_active){
        if(gridme_ajax_object.secondary_mobile_menu_active){

        $(".gridme-nav-secondary .gridme-secondary-nav-menu").addClass("gridme-secondary-responsive-menu");

        $(".gridme-secondary-responsive-menu-icon").click(function(){
            $(this).next(".gridme-nav-secondary .gridme-secondary-nav-menu").slideToggle();
        });

        $(window).resize(function(){
            if(window.innerWidth > 1112) {
                $(".gridme-nav-secondary .gridme-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".gridme-secondary-responsive-menu > li").removeClass("gridme-secondary-menu-open");
            }
        });

        $(".gridme-secondary-responsive-menu > li").click(function(event){
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('gridme-submenu-toggle').parent().toggleClass("gridme-secondary-menu-open");
            $(this).find(".children:first").toggleClass('gridme-submenu-toggle').parent().toggleClass("gridme-secondary-menu-open");
        });

        $("div.gridme-secondary-responsive-menu > ul > li").click(function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('gridme-submenu-toggle').parent().toggleClass("gridme-secondary-menu-open");
        });

        }
    }

    if(gridme_ajax_object.primary_menu_active){
        if(gridme_ajax_object.primary_mobile_menu_active){

        $(".gridme-nav-primary .gridme-primary-nav-menu").addClass("gridme-primary-responsive-menu");

        $(".gridme-primary-responsive-menu-icon").click(function(){
            $(this).next(".gridme-nav-primary .gridme-primary-nav-menu").slideToggle();
        });

        $(window).resize(function(){
            if(window.innerWidth > 1112) {
                $(".gridme-nav-primary .gridme-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".gridme-primary-responsive-menu > li").removeClass("gridme-primary-menu-open");
            }
        });

        $(".gridme-primary-responsive-menu > li").click(function(event){
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('gridme-submenu-toggle').parent().toggleClass("gridme-primary-menu-open");
            $(this).find(".children:first").toggleClass('gridme-submenu-toggle').parent().toggleClass("gridme-primary-menu-open");
        });

        $("div.gridme-primary-responsive-menu > ul > li").click(function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('gridme-submenu-toggle').parent().toggleClass("gridme-primary-menu-open");
        });

        }
    }

    if($(".gridme-header-icon-search").length){
        $(".gridme-header-icon-search").on('click', function (e) {
            e.preventDefault();
            document.getElementById("gridme-search-overlay-wrap").style.display = "block";
            const gridme_focusableelements = 'button, [href], input';
            const gridme_search_modal = document.querySelector('#gridme-search-overlay-wrap');
            const gridme_firstfocusableelement = gridme_search_modal.querySelectorAll(gridme_focusableelements)[0];
            const gridme_focusablecontent = gridme_search_modal.querySelectorAll(gridme_focusableelements);
            const gridme_lastfocusableelement = gridme_focusablecontent[gridme_focusablecontent.length - 1];
            document.addEventListener('keydown', function(e) {
              let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
              if (!isTabPressed) {
                return;
              }
              if (e.shiftKey) {
                if (document.activeElement === gridme_firstfocusableelement) {
                  gridme_lastfocusableelement.focus();
                  e.preventDefault();
                }
              } else {
                if (document.activeElement === gridme_lastfocusableelement) {
                  gridme_firstfocusableelement.focus();
                  e.preventDefault();
                }
              }
            });
            gridme_firstfocusableelement.focus();
        });
    }

    if($(".gridme-search-closebtn").length){
        $(".gridme-search-closebtn").on('click', function (e) {
            e.preventDefault();
            document.getElementById("gridme-search-overlay-wrap").style.display = "none";
        });
    }

    $(".entry-content, .widget").fitVids();

    if($(".gridme-scroll-top").length){
        var gridme_scroll_button = $( '.gridme-scroll-top' );
        gridme_scroll_button.hide();

        $( window ).scroll( function () {
            if ( $( window ).scrollTop() < 20 ) {
                $( '.gridme-scroll-top' ).fadeOut();
            } else {
                $( '.gridme-scroll-top' ).fadeIn();
            }
        } );

        gridme_scroll_button.click( function () {
            $( "html, body" ).animate( { scrollTop: 0 }, 300 );
            return false;
        } );
    }

    if(gridme_ajax_object.sticky_header_active){

    // grab the initial top offset of the navigation 
    var gridmestickyheadertop = $('#gridme-header-end').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var gridmestickyheader = function(){
        var gridmescrolltop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(gridme_ajax_object.sticky_header_mobile_active){
            if (gridmescrolltop > gridmestickyheadertop) {
                $('.gridme-site-header').addClass('gridme-fixed');
            } else {
                $('.gridme-site-header').removeClass('gridme-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (gridmescrolltop > gridmestickyheadertop) {
                    $('.gridme-site-header').addClass('gridme-fixed');
                } else {
                    $('.gridme-site-header').removeClass('gridme-fixed');
                }
            }
        }
    };

    gridmestickyheader();
    // and run it again every time you scroll
    $(window).scroll(function() {
        gridmestickyheader();
    });

    }

    if(gridme_ajax_object.sticky_sidebar_active){
        $('.gridme-main-wrapper, .gridme-sidebar-one-wrapper').theiaStickySidebar({
            containerSelector: ".gridme-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 960,
        });

        $(window).resize(function(){
            $('.gridme-main-wrapper, .gridme-sidebar-one-wrapper').theiaStickySidebar({
                containerSelector: ".gridme-content-wrapper",
                additionalMarginTop: 0,
                additionalMarginBottom: 0,
                minWidth: 960,
            });
        });
    }

});