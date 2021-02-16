<?php
/**
* Custom Hooks
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_before_header() {
    do_action('simple_grid_before_header');
}
add_action('simple_grid_before_header', 'simple_grid_secondary_menu_area', 50 );

function simple_grid_after_header() {
    do_action('simple_grid_after_header');
}

function simple_grid_before_main_content() {
    do_action('simple_grid_before_main_content');
}
add_action('simple_grid_before_main_content', 'simple_grid_top_widgets', 20 );

function simple_grid_after_main_content() {
    do_action('simple_grid_after_main_content');
}
add_action('simple_grid_after_main_content', 'simple_grid_bottom_widgets', 10 );

function simple_grid_sidebar_one() {
    do_action('simple_grid_sidebar_one');
}
add_action('simple_grid_sidebar_one', 'simple_grid_sidebar_one_widgets', 10 );

function simple_grid_sidebar_two() {
    do_action('simple_grid_sidebar_two');
}

function simple_grid_before_single_post() {
    do_action('simple_grid_before_single_post');
}

function simple_grid_before_single_post_title() {
    do_action('simple_grid_before_single_post_title');
}

function simple_grid_after_single_post_title() {
    do_action('simple_grid_after_single_post_title');
}

function simple_grid_top_single_post_content() {
    do_action('simple_grid_top_single_post_content');
}

function simple_grid_bottom_single_post_content() {
    do_action('simple_grid_bottom_single_post_content');
}

function simple_grid_after_single_post_content() {
    do_action('simple_grid_after_single_post_content');
}

function simple_grid_after_single_post() {
    do_action('simple_grid_after_single_post');
}

function simple_grid_before_single_page() {
    do_action('simple_grid_before_single_page');
}

function simple_grid_before_single_page_title() {
    do_action('simple_grid_before_single_page_title');
}

function simple_grid_after_single_page_title() {
    do_action('simple_grid_after_single_page_title');
}

function simple_grid_after_single_page_content() {
    do_action('simple_grid_after_single_page_content');
}

function simple_grid_after_single_page() {
    do_action('simple_grid_after_single_page');
}

function simple_grid_before_comments() {
    do_action('simple_grid_before_comments');
}

function simple_grid_after_comments() {
    do_action('simple_grid_after_comments');
}

function simple_grid_before_footer() {
    do_action('simple_grid_before_footer');
}

function simple_grid_after_footer() {
    do_action('simple_grid_after_footer');
}