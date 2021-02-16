/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var gridme_secondary_container, gridme_secondary_button, gridme_secondary_menu, gridme_secondary_links, gridme_secondary_i, gridme_secondary_len;

    gridme_secondary_container = document.getElementById( 'gridme-secondary-navigation' );
    if ( ! gridme_secondary_container ) {
        return;
    }

    gridme_secondary_button = gridme_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gridme_secondary_button ) {
        return;
    }

    gridme_secondary_menu = gridme_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gridme_secondary_menu ) {
        gridme_secondary_button.style.display = 'none';
        return;
    }

    gridme_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gridme_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        gridme_secondary_menu.className += ' nav-menu';
    }

    gridme_secondary_button.onclick = function() {
        if ( -1 !== gridme_secondary_container.className.indexOf( 'gridme-toggled' ) ) {
            gridme_secondary_container.className = gridme_secondary_container.className.replace( ' gridme-toggled', '' );
            gridme_secondary_button.setAttribute( 'aria-expanded', 'false' );
            gridme_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gridme_secondary_container.className += ' gridme-toggled';
            gridme_secondary_button.setAttribute( 'aria-expanded', 'true' );
            gridme_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gridme_secondary_links    = gridme_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gridme_secondary_i = 0, gridme_secondary_len = gridme_secondary_links.length; gridme_secondary_i < gridme_secondary_len; gridme_secondary_i++ ) {
        gridme_secondary_links[gridme_secondary_i].addEventListener( 'focus', gridme_secondary_toggleFocus, true );
        gridme_secondary_links[gridme_secondary_i].addEventListener( 'blur', gridme_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gridme_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gridme-focus' ) ) {
                    self.className = self.className.replace( ' gridme-focus', '' );
                } else {
                    self.className += ' gridme-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gridme_secondary_container ) {
        var touchStartFn, gridme_secondary_i,
            parentLink = gridme_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gridme_secondary_i;

                if ( ! menuItem.classList.contains( 'gridme-focus' ) ) {
                    e.preventDefault();
                    for ( gridme_secondary_i = 0; gridme_secondary_i < menuItem.parentNode.children.length; ++gridme_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gridme_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gridme_secondary_i].classList.remove( 'gridme-focus' );
                    }
                    menuItem.classList.add( 'gridme-focus' );
                } else {
                    menuItem.classList.remove( 'gridme-focus' );
                }
            };

            for ( gridme_secondary_i = 0; gridme_secondary_i < parentLink.length; ++gridme_secondary_i ) {
                parentLink[gridme_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gridme_secondary_container ) );
} )();


( function() {
    var gridme_primary_container, gridme_primary_button, gridme_primary_menu, gridme_primary_links, gridme_primary_i, gridme_primary_len;

    gridme_primary_container = document.getElementById( 'gridme-primary-navigation' );
    if ( ! gridme_primary_container ) {
        return;
    }

    gridme_primary_button = gridme_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gridme_primary_button ) {
        return;
    }

    gridme_primary_menu = gridme_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gridme_primary_menu ) {
        gridme_primary_button.style.display = 'none';
        return;
    }

    gridme_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gridme_primary_menu.className.indexOf( 'nav-menu' ) ) {
        gridme_primary_menu.className += ' nav-menu';
    }

    gridme_primary_button.onclick = function() {
        if ( -1 !== gridme_primary_container.className.indexOf( 'gridme-toggled' ) ) {
            gridme_primary_container.className = gridme_primary_container.className.replace( ' gridme-toggled', '' );
            gridme_primary_button.setAttribute( 'aria-expanded', 'false' );
            gridme_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gridme_primary_container.className += ' gridme-toggled';
            gridme_primary_button.setAttribute( 'aria-expanded', 'true' );
            gridme_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gridme_primary_links    = gridme_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gridme_primary_i = 0, gridme_primary_len = gridme_primary_links.length; gridme_primary_i < gridme_primary_len; gridme_primary_i++ ) {
        gridme_primary_links[gridme_primary_i].addEventListener( 'focus', gridme_primary_toggleFocus, true );
        gridme_primary_links[gridme_primary_i].addEventListener( 'blur', gridme_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gridme_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gridme-focus' ) ) {
                    self.className = self.className.replace( ' gridme-focus', '' );
                } else {
                    self.className += ' gridme-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gridme_primary_container ) {
        var touchStartFn, gridme_primary_i,
            parentLink = gridme_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gridme_primary_i;

                if ( ! menuItem.classList.contains( 'gridme-focus' ) ) {
                    e.preventDefault();
                    for ( gridme_primary_i = 0; gridme_primary_i < menuItem.parentNode.children.length; ++gridme_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gridme_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gridme_primary_i].classList.remove( 'gridme-focus' );
                    }
                    menuItem.classList.add( 'gridme-focus' );
                } else {
                    menuItem.classList.remove( 'gridme-focus' );
                }
            };

            for ( gridme_primary_i = 0; gridme_primary_i < parentLink.length; ++gridme_primary_i ) {
                parentLink[gridme_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gridme_primary_container ) );
} )();