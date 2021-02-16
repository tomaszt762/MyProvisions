<?php
/**
* Posts navigation functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'gridme_wp_pagenavi' ) ) :
function gridme_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'gridme_posts_navigation' ) ) :
function gridme_posts_navigation() {
    if ( !(gridme_get_option('hide_posts_navigation')) ) {
        if ( function_exists( 'wp_pagenavi' ) ) {
            gridme_wp_pagenavi();
        } else {
            if ( gridme_get_option('posts_navigation_type') === 'normalnavi' ) {
                the_posts_navigation(array('prev_text' => esc_html__( 'Older posts', 'gridme' ), 'next_text' => esc_html__( 'Newer posts', 'gridme' )));
            } else {
                the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__( '&larr; Newer posts', 'gridme' ), 'next_text' => esc_html__( 'Older posts &rarr;', 'gridme' )));
            }
        }
    }
}
endif;

if ( ! function_exists( 'gridme_post_navigation' ) ) :
function gridme_post_navigation() {
    if ( !(gridme_get_option('hide_post_navigation')) ) {
            the_post_navigation(array('prev_text' => esc_html__( '%title &rarr;', 'gridme' ), 'next_text' => esc_html__( '&larr; %title', 'gridme' )));
    }
}
endif;