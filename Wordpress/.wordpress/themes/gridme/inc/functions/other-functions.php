<?php
/**
* More Custom Functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Change excerpt length
function gridme_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 17;
    if ( gridme_get_option('read_more_length') ) {
        $read_more_length = gridme_get_option('read_more_length');
    }
    return apply_filters( 'gridme_excerpt_length', $read_more_length );
}
add_filter('excerpt_length', 'gridme_excerpt_length');

// Change excerpt more word
function gridme_excerpt_more($more) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter('excerpt_more', 'gridme_excerpt_more');


if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;

function gridme_add_menu_search_button( $items, $args ) {
    // Only used for the main menu
    if ( 'primary' != $args->theme_location ) {
        return $items;
    }

    $search_button = '';
    if ( !(gridme_get_option('hide_header_search_button')) ) {
        $search_button = '<li class="gridme-header-icon-search-item"><a href="' . esc_url( '#' ) . '" aria-label="'.esc_attr__('Search Button','gridme').'" class="gridme-header-icon-search"><i class="fas fa-search" aria-hidden="true" title="'.esc_attr__('Search','gridme').'"></i></a></li>';
    }

    $items = $items . $search_button;
    return $items;
}
add_filter( 'wp_nav_menu_items', 'gridme_add_menu_search_button', 10, 2 );