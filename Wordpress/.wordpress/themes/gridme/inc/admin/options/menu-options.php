<?php
/**
* Menu options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_menu_options($wp_customize) {

    $wp_customize->add_section( 'gridme_section_menu_options', array( 'title' => esc_html__( 'Menu Options', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 100 ) );

    $wp_customize->add_setting( 'gridme_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'gridme' ), 'section' => 'gridme_section_menu_options', 'settings' => 'gridme_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[hide_header_search_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_header_search_button_control', array( 'label' => esc_html__( 'Hide Header Search Button', 'gridme' ), 'description' => esc_html__('This option has no effect if you checked the option: "Disable Primary Menu"', 'gridme'), 'section' => 'gridme_section_menu_options', 'settings' => 'gridme_options[hide_header_search_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[disable_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_disable_secondary_menu_control', array( 'label' => esc_html__( 'Disable Secondary Menu', 'gridme' ), 'section' => 'gridme_section_menu_options', 'settings' => 'gridme_options[disable_secondary_menu]', 'type' => 'checkbox', ) );

}