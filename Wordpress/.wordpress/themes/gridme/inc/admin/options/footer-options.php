<?php
/**
* Footer options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_footer_options($wp_customize) {

    $wp_customize->add_section( 'gridme_section_footer', array( 'title' => esc_html__( 'Footer Options', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 280 ) );

    $wp_customize->add_setting( 'gridme_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_html', ) );

    $wp_customize->add_control( 'gridme_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'gridme' ), 'section' => 'gridme_section_footer', 'settings' => 'gridme_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'gridme_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'gridme' ), 'section' => 'gridme_section_footer', 'settings' => 'gridme_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}