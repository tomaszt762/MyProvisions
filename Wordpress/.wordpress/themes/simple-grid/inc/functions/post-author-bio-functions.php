<?php
/**
* Author bio box
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_add_author_bio_box() {
    $content='';
    if (is_single()) {
        $content .= '
            <div class="simple-grid-author-bio">
            <div class="simple-grid-author-bio-inside">
            <div class="simple-grid-author-bio-top">
            <span class="simple-grid-author-bio-gravatar">
                '. get_avatar( get_the_author_meta('email') , 80 ) .'
            </span>
            <div class="simple-grid-author-bio-text">
                <div class="simple-grid-author-bio-name">'.esc_html__( 'Author: ', 'simple-grid' ).'<span>'. get_the_author_link() .'</span></div><div class="simple-grid-author-bio-text-description">'. wp_kses_post( get_the_author_meta('description',get_query_var('author') ) ) .'</div>
            </div>
            </div>
            </div>
            </div>
        ';
    }
    return apply_filters( 'simple_grid_add_author_bio_box', $content );
}