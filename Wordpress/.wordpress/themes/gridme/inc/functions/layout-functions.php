<?php
/**
* Layout Functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_footer_grid_cols() {
    $footer_column = 'gridme-footer-6-col';
    return apply_filters( 'gridme_footer_grid_cols', $footer_column );
}

function gridme_hide_footer_widgets() {
    $hide_footer_widgets = FALSE;
    if ( gridme_get_option('hide_footer_widgets') ) {
        $hide_footer_widgets = TRUE;
    }
    return apply_filters( 'gridme_hide_footer_widgets', $hide_footer_widgets );
}

function gridme_is_header_content_active() {
    $header_content_active = TRUE;
    if ( gridme_get_option('hide_header_content') ) {
        $header_content_active = FALSE;
    }
    return apply_filters( 'gridme_is_header_content_active', $header_content_active );
}

function gridme_is_primary_menu_active() {
    $primary_menu_active = TRUE;
    if ( gridme_get_option('disable_primary_menu') ) {
        $primary_menu_active = FALSE;
    }
    return apply_filters( 'gridme_is_primary_menu_active', $primary_menu_active );
}

function gridme_is_secondary_menu_active() {
    $secondary_menu_active = TRUE;
    if ( gridme_get_option('disable_secondary_menu') ) {
        $secondary_menu_active = FALSE;
    }
    return apply_filters( 'gridme_is_secondary_menu_active', $secondary_menu_active );
}

function gridme_is_footer_social_buttons_active() {
    $footer_social_buttons_active = TRUE;
    if ( gridme_get_option('hide_footer_social_buttons') ) {
        $footer_social_buttons_active = FALSE;
    }
    return apply_filters( 'gridme_is_footer_social_buttons_active', $footer_social_buttons_active );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gridme_content_width() {
    $content_width = 922;

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $content_width = 1222;
    }

    if ( is_404() ) {
        $content_width = 1222;
    }

    $GLOBALS['content_width'] = apply_filters( 'gridme_content_width', $content_width ); /* phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound */
}
add_action( 'template_redirect', 'gridme_content_width', 0 );

function gridme_grid_thumb_style() {
   $thumb_style = 'gridme-480w-360h-image';
   return apply_filters( 'gridme_grid_thumb_style', $thumb_style );
}

function gridme_post_grid_cols() {
   $post_column = 'gridme-4-col';
   return apply_filters( 'gridme_post_grid_cols', $post_column );
}

function gridme_grid_no_thumb_url() {
    $no_thumb_url = get_template_directory_uri() . '/assets/images/no-image-480-360.jpg';
    return apply_filters( 'gridme_grid_no_thumb_url', $no_thumb_url );
}