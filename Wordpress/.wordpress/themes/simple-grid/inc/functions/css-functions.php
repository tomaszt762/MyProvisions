<?php
/**
* Css Classes Functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Category ids in post class
function simple_grid_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
        $classes[] = 'wpcat-' . $category->cat_ID . '-id';
    }
    return apply_filters( 'simple_grid_category_id_class', $classes );
}
add_filter('post_class', 'simple_grid_category_id_class');


// Adds custom classes to the array of body classes.
function simple_grid_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'simple-grid-group-blog';
    }

    $classes[] = 'simple-grid-theme-is-active';

    if ( get_header_image() ) {
        $classes[] = 'simple-grid-header-image-active';
    }

    if ( has_custom_logo() ) {
        $classes[] = 'simple-grid-custom-logo-active';
    }

    $classes[] = 'simple-grid-layout-type-full';

    $classes[] = 'simple-grid-masonry-inactive';

    $classes[] = 'simple-grid-float-grid';

    $classes[] = 'simple-grid-responsive-grid-details';

    if ( is_singular() ) {

        if( is_single() ) {
            if ( simple_grid_get_option('featured_media_under_post_title') ) {
                $classes[] = 'simple-grid-single-media-under-title';
            }
        }
        if( is_page() ) {
            if ( simple_grid_get_option('featured_media_under_page_title') ) {
                $classes[] = 'simple-grid-single-media-under-title';
            }
        }

        if ( is_page_template() ) {
            if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
               $classes[] = 'simple-grid-layout-full-width';
            } else {
                $classes[] = 'simple-grid-layout-c-s1';
            }
        } else {
            $classes[] = 'simple-grid-layout-c-s1';
        }

    } else {

        $classes[] = 'simple-grid-layout-full-width';

    }

    $classes[] = 'simple-grid-header-banner-active';

    if ( simple_grid_get_option('hide_tagline') ) {
        $classes[] = 'simple-grid-tagline-inactive';
    }

    $classes[] = 'simple-grid-logo-above-title';

    if ( simple_grid_is_primary_menu_active() ) {
        $classes[] = 'simple-grid-primary-menu-active';
    }
    $classes[] = 'simple-grid-primary-mobile-menu-active';

    if ( simple_grid_is_secondary_menu_active() ) {
        $classes[] = 'simple-grid-secondary-menu-active';
    }
    $classes[] = 'simple-grid-secondary-mobile-menu-active';

    if ( 'primary-menu' === simple_grid_social_buttons_location() ) {
        $classes[] = 'simple-grid-primary-social-icons';
    } else {
        $classes[] = 'simple-grid-secondary-social-icons';
    }

    return apply_filters( 'simple_grid_body_classes', $classes );
}
add_filter( 'body_class', 'simple_grid_body_classes' );