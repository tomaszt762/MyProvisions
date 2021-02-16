<?php
/**
* Menu options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_menu_options($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_menu_options', array( 'title' => esc_html__( 'Menu Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 100 ) );

    $wp_customize->add_setting( 'simple_grid_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'simple-grid' ), 'description' => esc_html__('If you checked this option, there is no any effect from these options: "Hide Header Search Button", "Show Header Login/Logout Button", "Show Header Random Post Button".', 'simple-grid'), 'section' => 'simple_grid_section_menu_options', 'settings' => 'simple_grid_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[disable_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_disable_secondary_menu_control', array( 'label' => esc_html__( 'Disable Secondary Menu', 'simple-grid' ), 'section' => 'simple_grid_section_menu_options', 'settings' => 'simple_grid_options[disable_secondary_menu]', 'type' => 'checkbox', ) );

}