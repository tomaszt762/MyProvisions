<?php
/**
* Custom Hooks
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_before_header() {
    do_action('gridme_before_header');
}

function gridme_after_header() {
    do_action('gridme_after_header');
}

function gridme_before_main_content() {
    do_action('gridme_before_main_content');
}
add_action('gridme_before_main_content', 'gridme_top_widgets', 20 );

function gridme_after_main_content() {
    do_action('gridme_after_main_content');
}
add_action('gridme_after_main_content', 'gridme_bottom_widgets', 10 );

function gridme_sidebar_one() {
    do_action('gridme_sidebar_one');
}
add_action('gridme_sidebar_one', 'gridme_sidebar_one_widgets', 10 );

function gridme_before_single_post() {
    do_action('gridme_before_single_post');
}

function gridme_before_single_post_title() {
    do_action('gridme_before_single_post_title');
}

function gridme_after_single_post_title() {
    do_action('gridme_after_single_post_title');
}

function gridme_top_single_post_content() {
    do_action('gridme_top_single_post_content');
}

function gridme_bottom_single_post_content() {
    do_action('gridme_bottom_single_post_content');
}

function gridme_after_single_post_content() {
    do_action('gridme_after_single_post_content');
}

function gridme_after_single_post() {
    do_action('gridme_after_single_post');
}

function gridme_before_single_page() {
    do_action('gridme_before_single_page');
}

function gridme_before_single_page_title() {
    do_action('gridme_before_single_page_title');
}

function gridme_after_single_page_title() {
    do_action('gridme_after_single_page_title');
}

function gridme_after_single_page_content() {
    do_action('gridme_after_single_page_content');
}

function gridme_after_single_page() {
    do_action('gridme_after_single_page');
}

function gridme_before_comments() {
    do_action('gridme_before_comments');
}

function gridme_after_comments() {
    do_action('gridme_after_comments');
}

function gridme_before_footer() {
    do_action('gridme_before_footer');
}
add_action('gridme_before_footer', 'gridme_secondary_menu_area', 50 );

function gridme_after_footer() {
    do_action('gridme_after_footer');
}