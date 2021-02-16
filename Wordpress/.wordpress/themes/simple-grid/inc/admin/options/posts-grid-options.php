<?php
/**
* Posts Grid options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_posts_grid_options($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_posts_grid', array( 'title' => esc_html__( 'Posts Grid Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 160 ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'simple-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'simple_grid_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[posts_heading]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_title_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_title_home_control', array( 'label' => esc_html__( 'Hide Post Titles from Posts Grid', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[hide_post_title_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_posted_date_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_posted_date_home_control', array( 'label' => esc_html__( 'Hide Posted Dates from Posts Grid', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[hide_posted_date_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[show_post_author_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_show_post_author_home_control', array( 'label' => esc_html__( 'Show Post Authors on Posts Grid', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[show_post_author_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[show_post_categories_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_show_post_categories_home_control', array( 'label' => esc_html__( 'Show Post Categories from Posts Grid', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[show_post_categories_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_comments_link_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_comments_link_home_control', array( 'label' => esc_html__( 'Hide Comment Links from Posts Grid', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[hide_comments_link_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_thumbnail_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_thumbnail_home_control', array( 'label' => esc_html__( 'Hide Featured Images from Posts Grid', 'simple-grid' ), 'section' => 'simple_grid_section_posts_grid', 'settings' => 'simple_grid_options[hide_thumbnail_home]', 'type' => 'checkbox', ) );

}