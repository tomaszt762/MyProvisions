<?php
/**
* Css Classes Functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Category ids in post class
function gridme_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
        $classes[] = 'wpcat-' . $category->cat_ID . '-id';
    }
    return apply_filters( 'gridme_category_id_class', $classes );
}
add_filter('post_class', 'gridme_category_id_class');


// Adds custom classes to the array of body classes.
function gridme_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'gridme-group-blog';
    }

    $classes[] = 'gridme-theme-is-active';

    if ( get_header_image() ) {
        $classes[] = 'gridme-header-image-active';
    }

    if ( has_custom_logo() ) {
        $classes[] = 'gridme-custom-logo-active';
    }

    $classes[] = 'gridme-layout-type-full';

    $classes[] = 'gridme-masonry-inactive';

    if( is_single() ) {
        if ( gridme_get_option('featured_media_under_post_title') ) {
            $classes[] = 'gridme-single-media-under-title';
        }
    }
    if( is_page() ) {
        if ( gridme_get_option('featured_media_under_page_title') ) {
            $classes[] = 'gridme-single-media-under-title';
        }
    }

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $classes[] = 'gridme-layout-full-width';
    }

    if ( is_404() ) {
        $classes[] = 'gridme-layout-full-width';
    }

    $classes[] = 'gridme-header-menu-active';

    if ( gridme_get_option('hide_tagline') ) {
        $classes[] = 'gridme-tagline-inactive';
    }

    if ( gridme_is_primary_menu_active() ) {
        $classes[] = 'gridme-primary-menu-active';
    }
    $classes[] = 'gridme-primary-mobile-menu-active';

    if ( gridme_is_secondary_menu_active() ) {
        $classes[] = 'gridme-secondary-menu-active';
    }
    $classes[] = 'gridme-secondary-mobile-menu-active';

    $classes[] = 'gridme-secondary-menu-centered';

    if ( gridme_is_footer_social_buttons_active() ) {
        $classes[] = 'gridme-footer-social-buttons-active';
    } else {
        $classes[] = 'gridme-footer-social-buttons-inactive';
    }

    return apply_filters( 'gridme_body_classes', $classes );
}
add_filter( 'body_class', 'gridme_body_classes' );