<?php
/**
* Navigation options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_navigation_options($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_navigation', array( 'title' => esc_html__( 'Post/Posts Navigation Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 185 ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_navigation_control', array( 'label' => esc_html__( 'Hide Post Navigation from Full Posts', 'simple-grid' ), 'section' => 'simple_grid_section_navigation', 'settings' => 'simple_grid_options[hide_post_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_posts_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_posts_navigation_control', array( 'label' => esc_html__( 'Hide Posts Navigation from Home/Archive/Search Pages', 'simple-grid' ), 'section' => 'simple_grid_section_navigation', 'settings' => 'simple_grid_options[hide_posts_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[posts_navigation_type]', array( 'default' => 'numberednavi', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_posts_navigation_type' ) );

    $wp_customize->add_control( 'simple_grid_posts_navigation_type_control', array( 'label' => esc_html__( 'Posts Navigation Type', 'simple-grid' ), 'description' => esc_html__('Select posts navigation type you need. If you activate WP-PageNavi plugin, this navigation will be replaced by WP-PageNavi navigation.', 'simple-grid'), 'section' => 'simple_grid_section_navigation', 'settings' => 'simple_grid_options[posts_navigation_type]', 'type' => 'select', 'choices' => array( 'normalnavi' => esc_html__('Normal Navigation', 'simple-grid'), 'numberednavi' => esc_html__('Numbered Navigation', 'simple-grid') ) ) );

}