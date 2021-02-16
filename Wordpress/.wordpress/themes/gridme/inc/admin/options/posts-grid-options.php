<?php
/**
* Posts Grid options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_posts_grid_options($wp_customize) {

    $wp_customize->add_section( 'gridme_section_posts_grid', array( 'title' => esc_html__( 'Posts Grid Options', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 160 ) );

    $wp_customize->add_setting( 'gridme_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'gridme' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'gridme_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[posts_heading]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridme_options[read_more_length]', array( 'default' => 17, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_read_more_length' ) );

    $wp_customize->add_control( 'gridme_read_more_length_control', array( 'label' => esc_html__( 'Auto Post Summary Length', 'gridme' ), 'description' => esc_html__('Enter the number of words need to display in the post summary. Default is 20 words.', 'gridme'), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[read_more_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[hide_post_title_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_post_title_home_control', array( 'label' => esc_html__( 'Hide Post Titles from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_post_title_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_posted_date_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_posted_date_home_control', array( 'label' => esc_html__( 'Hide Posted Dates from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_posted_date_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_post_author_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_post_author_home_control', array( 'label' => esc_html__( 'Hide Post Authors from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_post_author_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_post_categories_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_post_categories_home_control', array( 'label' => esc_html__( 'Hide Post Categories from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_post_categories_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_comments_link_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_comments_link_home_control', array( 'label' => esc_html__( 'Hide Comment Links from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_comments_link_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_thumbnail_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_thumbnail_home_control', array( 'label' => esc_html__( 'Hide Featured Images from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_thumbnail_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_default_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_default_thumbnail_control', array( 'label' => esc_html__( 'Hide Default Image', 'gridme' ), 'description' => esc_html__( 'The default image is shown when there is no featured image.', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_default_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_post_snippet]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_post_snippet_control', array( 'label' => esc_html__( 'Hide Post Snippets from Posts Grid', 'gridme' ), 'section' => 'gridme_section_posts_grid', 'settings' => 'gridme_options[hide_post_snippet]', 'type' => 'checkbox', ) );

}