<?php
/**
* Author bio box
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_add_author_bio_box() {
    $content='';
    if (is_single()) {
        $content .= '
            <div class="gridme-author-bio">
            <div class="gridme-author-bio-inside">
            <div class="gridme-author-bio-top">
            <span class="gridme-author-bio-gravatar">
                '. get_avatar( get_the_author_meta('email') , 80 ) .'
            </span>
            <div class="gridme-author-bio-text">
                <div class="gridme-author-bio-name">'.esc_html__( 'Author: ', 'gridme' ).'<span>'. get_the_author_link() .'</span></div><div class="gridme-author-bio-text-description">'. wp_kses_post( get_the_author_meta('description',get_query_var('author') ) ) .'</div>
            </div>
            </div>
            </div>
            </div>
        ';
    }
    return apply_filters( 'gridme_add_author_bio_box', $content );
}