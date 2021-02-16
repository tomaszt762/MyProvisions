<?php
/**
* Layout Functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_hide_footer_widgets() {
    $hide_footer_widgets = FALSE;
    if ( simple_grid_get_option('hide_footer_widgets') ) {
        $hide_footer_widgets = TRUE;
    }
    return apply_filters( 'simple_grid_hide_footer_widgets', $hide_footer_widgets );
}

function simple_grid_is_header_content_active() {
    $header_content_active = TRUE;
    if ( simple_grid_get_option('hide_header_content') ) {
        $header_content_active = FALSE;
    }
    return apply_filters( 'simple_grid_is_header_content_active', $header_content_active );
}

function simple_grid_is_primary_menu_active() {
    $primary_menu_active = TRUE;
    if ( simple_grid_get_option('disable_primary_menu') ) {
        $primary_menu_active = FALSE;
    }
    return apply_filters( 'simple_grid_is_primary_menu_active', $primary_menu_active );
}

function simple_grid_is_secondary_menu_active() {
    $secondary_menu_active = TRUE;
    if ( simple_grid_get_option('disable_secondary_menu') ) {
        $secondary_menu_active = FALSE;
    }
    return apply_filters( 'simple_grid_is_secondary_menu_active', $secondary_menu_active );
}

function simple_grid_social_buttons_location() {
    $social_buttons_location = 'secondary-menu';
    if ( simple_grid_get_option('social_buttons_location') ) {
        $social_buttons_location = simple_grid_get_option('social_buttons_location');
    }
    return apply_filters( 'simple_grid_social_buttons_location', $social_buttons_location );
}

function simple_grid_is_social_buttons_active() {
    $social_buttons_active = TRUE;
    if ( simple_grid_get_option('hide_social_buttons') ) {
        $social_buttons_active = FALSE;
    }
    return apply_filters( 'simple_grid_is_social_buttons_active', $social_buttons_active );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_grid_content_width() {
    $content_width = 872;

    if ( is_singular() ) {
        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $content_width = 1222;
        }
    } else {
        $content_width = 1222;
    }

    $GLOBALS['content_width'] = apply_filters( 'simple_grid_content_width', $content_width ); /* phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound */
}
add_action( 'template_redirect', 'simple_grid_content_width', 0 );