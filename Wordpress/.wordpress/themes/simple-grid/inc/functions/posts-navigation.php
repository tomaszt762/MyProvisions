<?php
/**
* Posts navigation functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'simple_grid_wp_pagenavi' ) ) :
function simple_grid_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;


if ( ! function_exists( 'simple_grid_posts_navigation' ) ) :
function simple_grid_posts_navigation() {
    if ( !(simple_grid_get_option('hide_posts_navigation')) ) {
        if ( function_exists( 'wp_pagenavi' ) ) {
            simple_grid_wp_pagenavi();
        } else {
            if ( simple_grid_get_option('posts_navigation_type') === 'normalnavi' ) {
                the_posts_navigation(array('prev_text' => esc_html__( 'Older posts', 'simple-grid' ), 'next_text' => esc_html__( 'Newer posts', 'simple-grid' )));
            } else {
                the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__( '&larr; Newer posts', 'simple-grid' ), 'next_text' => esc_html__( 'Older posts &rarr;', 'simple-grid' )));
            }
        }
    }
}
endif;


if ( ! function_exists( 'simple_grid_post_navigation' ) ) :
function simple_grid_post_navigation() {
    if ( !(simple_grid_get_option('hide_post_navigation')) ) {
        the_post_navigation(array('prev_text' => esc_html__( '%title &rarr;', 'simple-grid' ), 'next_text' => esc_html__( '&larr; %title', 'simple-grid' )));
    }
}
endif;