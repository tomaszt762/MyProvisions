<?php
/**
* Footer options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_footer_options($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_footer', array( 'title' => esc_html__( 'Footer Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 280 ) );

    $wp_customize->add_setting( 'simple_grid_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_html', ) );

    $wp_customize->add_control( 'simple_grid_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'simple-grid' ), 'section' => 'simple_grid_section_footer', 'settings' => 'simple_grid_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'simple-grid' ), 'section' => 'simple_grid_section_footer', 'settings' => 'simple_grid_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}