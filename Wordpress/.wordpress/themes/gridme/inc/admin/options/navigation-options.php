<?php
/**
* Navigation options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_navigation_options($wp_customize) {

    $wp_customize->add_section( 'gridme_section_navigation', array( 'title' => esc_html__( 'Post/Posts Navigation Options', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 185 ) );

    $wp_customize->add_setting( 'gridme_options[hide_post_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_post_navigation_control', array( 'label' => esc_html__( 'Hide Post Navigation from Full Posts', 'gridme' ), 'section' => 'gridme_section_navigation', 'settings' => 'gridme_options[hide_post_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_posts_navigation]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_posts_navigation_control', array( 'label' => esc_html__( 'Hide Posts Navigation from Home/Archive/Search Pages', 'gridme' ), 'section' => 'gridme_section_navigation', 'settings' => 'gridme_options[hide_posts_navigation]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[posts_navigation_type]', array( 'default' => 'numberednavi', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_posts_navigation_type' ) );

    $wp_customize->add_control( 'gridme_posts_navigation_type_control', array( 'label' => esc_html__( 'Posts Navigation Type', 'gridme' ), 'description' => esc_html__('Select posts navigation type you need. If you activate WP-PageNavi plugin, this navigation will be replaced by WP-PageNavi navigation.', 'gridme'), 'section' => 'gridme_section_navigation', 'settings' => 'gridme_options[posts_navigation_type]', 'type' => 'select', 'choices' => array( 'normalnavi' => esc_html__('Normal Navigation', 'gridme'), 'numberednavi' => esc_html__('Numbered Navigation', 'gridme') ) ) );

}