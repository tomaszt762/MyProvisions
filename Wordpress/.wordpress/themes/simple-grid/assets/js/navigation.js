/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var simple_grid_secondary_container, simple_grid_secondary_button, simple_grid_secondary_menu, simple_grid_secondary_links, simple_grid_secondary_i, simple_grid_secondary_len;

    simple_grid_secondary_container = document.getElementById( 'simple-grid-secondary-navigation' );
    if ( ! simple_grid_secondary_container ) {
        return;
    }

    simple_grid_secondary_button = simple_grid_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof simple_grid_secondary_button ) {
        return;
    }

    simple_grid_secondary_menu = simple_grid_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof simple_grid_secondary_menu ) {
        simple_grid_secondary_button.style.display = 'none';
        return;
    }

    simple_grid_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === simple_grid_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        simple_grid_secondary_menu.className += ' nav-menu';
    }

    simple_grid_secondary_button.onclick = function() {
        if ( -1 !== simple_grid_secondary_container.className.indexOf( 'simple-grid-toggled' ) ) {
            simple_grid_secondary_container.className = simple_grid_secondary_container.className.replace( ' simple-grid-toggled', '' );
            simple_grid_secondary_button.setAttribute( 'aria-expanded', 'false' );
            simple_grid_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            simple_grid_secondary_container.className += ' simple-grid-toggled';
            simple_grid_secondary_button.setAttribute( 'aria-expanded', 'true' );
            simple_grid_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    simple_grid_secondary_links    = simple_grid_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( simple_grid_secondary_i = 0, simple_grid_secondary_len = simple_grid_secondary_links.length; simple_grid_secondary_i < simple_grid_secondary_len; simple_grid_secondary_i++ ) {
        simple_grid_secondary_links[simple_grid_secondary_i].addEventListener( 'focus', simple_grid_secondary_toggleFocus, true );
        simple_grid_secondary_links[simple_grid_secondary_i].addEventListener( 'blur', simple_grid_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function simple_grid_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'simple-grid-focus' ) ) {
                    self.className = self.className.replace( ' simple-grid-focus', '' );
                } else {
                    self.className += ' simple-grid-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( simple_grid_secondary_container ) {
        var touchStartFn, simple_grid_secondary_i,
            parentLink = simple_grid_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, simple_grid_secondary_i;

                if ( ! menuItem.classList.contains( 'simple-grid-focus' ) ) {
                    e.preventDefault();
                    for ( simple_grid_secondary_i = 0; simple_grid_secondary_i < menuItem.parentNode.children.length; ++simple_grid_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[simple_grid_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[simple_grid_secondary_i].classList.remove( 'simple-grid-focus' );
                    }
                    menuItem.classList.add( 'simple-grid-focus' );
                } else {
                    menuItem.classList.remove( 'simple-grid-focus' );
                }
            };

            for ( simple_grid_secondary_i = 0; simple_grid_secondary_i < parentLink.length; ++simple_grid_secondary_i ) {
                parentLink[simple_grid_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( simple_grid_secondary_container ) );
} )();


( function() {
    var simple_grid_primary_container, simple_grid_primary_button, simple_grid_primary_menu, simple_grid_primary_links, simple_grid_primary_i, simple_grid_primary_len;

    simple_grid_primary_container = document.getElementById( 'simple-grid-primary-navigation' );
    if ( ! simple_grid_primary_container ) {
        return;
    }

    simple_grid_primary_button = simple_grid_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof simple_grid_primary_button ) {
        return;
    }

    simple_grid_primary_menu = simple_grid_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof simple_grid_primary_menu ) {
        simple_grid_primary_button.style.display = 'none';
        return;
    }

    simple_grid_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === simple_grid_primary_menu.className.indexOf( 'nav-menu' ) ) {
        simple_grid_primary_menu.className += ' nav-menu';
    }

    simple_grid_primary_button.onclick = function() {
        if ( -1 !== simple_grid_primary_container.className.indexOf( 'simple-grid-toggled' ) ) {
            simple_grid_primary_container.className = simple_grid_primary_container.className.replace( ' simple-grid-toggled', '' );
            simple_grid_primary_button.setAttribute( 'aria-expanded', 'false' );
            simple_grid_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            simple_grid_primary_container.className += ' simple-grid-toggled';
            simple_grid_primary_button.setAttribute( 'aria-expanded', 'true' );
            simple_grid_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    simple_grid_primary_links    = simple_grid_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( simple_grid_primary_i = 0, simple_grid_primary_len = simple_grid_primary_links.length; simple_grid_primary_i < simple_grid_primary_len; simple_grid_primary_i++ ) {
        simple_grid_primary_links[simple_grid_primary_i].addEventListener( 'focus', simple_grid_primary_toggleFocus, true );
        simple_grid_primary_links[simple_grid_primary_i].addEventListener( 'blur', simple_grid_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function simple_grid_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'simple-grid-focus' ) ) {
                    self.className = self.className.replace( ' simple-grid-focus', '' );
                } else {
                    self.className += ' simple-grid-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( simple_grid_primary_container ) {
        var touchStartFn, simple_grid_primary_i,
            parentLink = simple_grid_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, simple_grid_primary_i;

                if ( ! menuItem.classList.contains( 'simple-grid-focus' ) ) {
                    e.preventDefault();
                    for ( simple_grid_primary_i = 0; simple_grid_primary_i < menuItem.parentNode.children.length; ++simple_grid_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[simple_grid_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[simple_grid_primary_i].classList.remove( 'simple-grid-focus' );
                    }
                    menuItem.classList.add( 'simple-grid-focus' );
                } else {
                    menuItem.classList.remove( 'simple-grid-focus' );
                }
            };

            for ( simple_grid_primary_i = 0; simple_grid_primary_i < parentLink.length; ++simple_grid_primary_i ) {
                parentLink[simple_grid_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( simple_grid_primary_container ) );
} )();