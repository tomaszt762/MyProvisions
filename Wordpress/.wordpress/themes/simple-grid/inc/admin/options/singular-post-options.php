<?php
/**
* Post options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_post_options($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_post', array( 'title' => esc_html__( 'Post Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 180 ) );

    $wp_customize->add_setting( 'simple_grid_options[thumbnail_link]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'simple_grid_thumbnail_link_control', array( 'label' => esc_html__( 'Featured Image Link', 'simple-grid' ), 'description' => esc_html__('Do you want the featured image in a single post to be linked to its post?', 'simple-grid'), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[thumbnail_link]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'simple-grid'), 'no' => esc_html__('No', 'simple-grid') ) ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_thumbnail_control', array( 'label' => esc_html__( 'Hide Featured Image from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[featured_media_under_post_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_featured_media_under_post_title_control', array( 'label' => esc_html__( 'Move Featured Image to Bottom of Full Post Title', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[featured_media_under_post_title]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_title_control', array( 'label' => esc_html__( 'Hide Post Header from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_post_title]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[remove_post_title_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_remove_post_title_link_control', array( 'label' => esc_html__( 'Remove Link from Full Post Title', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[remove_post_title_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_edit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_edit_control', array( 'label' => esc_html__( 'Hide Post Edit Link', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_post_edit]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags from Full Post', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box', 'simple-grid' ), 'section' => 'simple_grid_section_post', 'settings' => 'simple_grid_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

}