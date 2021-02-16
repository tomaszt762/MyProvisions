/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var clean_grid_secondary_container, clean_grid_secondary_button, clean_grid_secondary_menu, clean_grid_secondary_links, clean_grid_secondary_i, clean_grid_secondary_len;

    clean_grid_secondary_container = document.getElementById( 'clean-grid-secondary-navigation' );
    if ( ! clean_grid_secondary_container ) {
        return;
    }

    clean_grid_secondary_button = clean_grid_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof clean_grid_secondary_button ) {
        return;
    }

    clean_grid_secondary_menu = clean_grid_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof clean_grid_secondary_menu ) {
        clean_grid_secondary_button.style.display = 'none';
        return;
    }

    clean_grid_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === clean_grid_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        clean_grid_secondary_menu.className += ' nav-menu';
    }

    clean_grid_secondary_button.onclick = function() {
        if ( -1 !== clean_grid_secondary_container.className.indexOf( 'clean-grid-toggled' ) ) {
            clean_grid_secondary_container.className = clean_grid_secondary_container.className.replace( ' clean-grid-toggled', '' );
            clean_grid_secondary_button.setAttribute( 'aria-expanded', 'false' );
            clean_grid_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            clean_grid_secondary_container.className += ' clean-grid-toggled';
            clean_grid_secondary_button.setAttribute( 'aria-expanded', 'true' );
            clean_grid_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    clean_grid_secondary_links    = clean_grid_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( clean_grid_secondary_i = 0, clean_grid_secondary_len = clean_grid_secondary_links.length; clean_grid_secondary_i < clean_grid_secondary_len; clean_grid_secondary_i++ ) {
        clean_grid_secondary_links[clean_grid_secondary_i].addEventListener( 'focus', clean_grid_secondary_toggleFocus, true );
        clean_grid_secondary_links[clean_grid_secondary_i].addEventListener( 'blur', clean_grid_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function clean_grid_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'clean-grid-focus' ) ) {
                    self.className = self.className.replace( ' clean-grid-focus', '' );
                } else {
                    self.className += ' clean-grid-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( clean_grid_secondary_container ) {
        var touchStartFn, clean_grid_secondary_i,
            parentLink = clean_grid_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, clean_grid_secondary_i;

                if ( ! menuItem.classList.contains( 'clean-grid-focus' ) ) {
                    e.preventDefault();
                    for ( clean_grid_secondary_i = 0; clean_grid_secondary_i < menuItem.parentNode.children.length; ++clean_grid_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[clean_grid_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[clean_grid_secondary_i].classList.remove( 'clean-grid-focus' );
                    }
                    menuItem.classList.add( 'clean-grid-focus' );
                } else {
                    menuItem.classList.remove( 'clean-grid-focus' );
                }
            };

            for ( clean_grid_secondary_i = 0; clean_grid_secondary_i < parentLink.length; ++clean_grid_secondary_i ) {
                parentLink[clean_grid_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( clean_grid_secondary_container ) );
} )();


( function() {
    var clean_grid_primary_container, clean_grid_primary_button, clean_grid_primary_menu, clean_grid_primary_links, clean_grid_primary_i, clean_grid_primary_len;

    clean_grid_primary_container = document.getElementById( 'clean-grid-primary-navigation' );
    if ( ! clean_grid_primary_container ) {
        return;
    }

    clean_grid_primary_button = clean_grid_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof clean_grid_primary_button ) {
        return;
    }

    clean_grid_primary_menu = clean_grid_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof clean_grid_primary_menu ) {
        clean_grid_primary_button.style.display = 'none';
        return;
    }

    clean_grid_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === clean_grid_primary_menu.className.indexOf( 'nav-menu' ) ) {
        clean_grid_primary_menu.className += ' nav-menu';
    }

    clean_grid_primary_button.onclick = function() {
        if ( -1 !== clean_grid_primary_container.className.indexOf( 'clean-grid-toggled' ) ) {
            clean_grid_primary_container.className = clean_grid_primary_container.className.replace( ' clean-grid-toggled', '' );
            clean_grid_primary_button.setAttribute( 'aria-expanded', 'false' );
            clean_grid_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            clean_grid_primary_container.className += ' clean-grid-toggled';
            clean_grid_primary_button.setAttribute( 'aria-expanded', 'true' );
            clean_grid_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    clean_grid_primary_links    = clean_grid_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( clean_grid_primary_i = 0, clean_grid_primary_len = clean_grid_primary_links.length; clean_grid_primary_i < clean_grid_primary_len; clean_grid_primary_i++ ) {
        clean_grid_primary_links[clean_grid_primary_i].addEventListener( 'focus', clean_grid_primary_toggleFocus, true );
        clean_grid_primary_links[clean_grid_primary_i].addEventListener( 'blur', clean_grid_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function clean_grid_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'clean-grid-focus' ) ) {
                    self.className = self.className.replace( ' clean-grid-focus', '' );
                } else {
                    self.className += ' clean-grid-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( clean_grid_primary_container ) {
        var touchStartFn, clean_grid_primary_i,
            parentLink = clean_grid_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, clean_grid_primary_i;

                if ( ! menuItem.classList.contains( 'clean-grid-focus' ) ) {
                    e.preventDefault();
                    for ( clean_grid_primary_i = 0; clean_grid_primary_i < menuItem.parentNode.children.length; ++clean_grid_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[clean_grid_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[clean_grid_primary_i].classList.remove( 'clean-grid-focus' );
                    }
                    menuItem.classList.add( 'clean-grid-focus' );
                } else {
                    menuItem.classList.remove( 'clean-grid-focus' );
                }
            };

            for ( clean_grid_primary_i = 0; clean_grid_primary_i < parentLink.length; ++clean_grid_primary_i ) {
                parentLink[clean_grid_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( clean_grid_primary_container ) );
} )();