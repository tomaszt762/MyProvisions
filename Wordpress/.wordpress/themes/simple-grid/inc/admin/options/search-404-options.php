<?php
/**
* 404 options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_search_404_options($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_search_404', array( 'title' => esc_html__( 'Search and 404 Pages Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 340 ) );

    $wp_customize->add_setting( 'simple_grid_options[no_search_heading]', array( 'default' => esc_html__( 'Nothing Found', 'simple-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_html', ) );

    $wp_customize->add_control( 'simple_grid_no_search_heading_control', array( 'label' => esc_html__( 'No Search Results Heading', 'simple-grid' ), 'description' => esc_html__( 'Enter a heading to display when no search results are found.', 'simple-grid' ), 'section' => 'simple_grid_section_search_404', 'settings' => 'simple_grid_options[no_search_heading]', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'simple_grid_options[no_search_results]', array( 'default' => esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'simple-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_html', ) );

    $wp_customize->add_control( 'simple_grid_no_search_results_control', array( 'label' => esc_html__( 'No Search Results Message', 'simple-grid' ), 'description' => esc_html__( 'Enter a message to display when no search results are found.', 'simple-grid' ), 'section' => 'simple_grid_section_search_404', 'settings' => 'simple_grid_options[no_search_results]', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'simple_grid_options[error_404_heading]', array( 'default' => esc_html__( 'Oops! That page can not be found.', 'simple-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_html', ) );

    $wp_customize->add_control( 'simple_grid_error_404_heading_control', array( 'label' => esc_html__( '404 Error Page Heading', 'simple-grid' ), 'description' => esc_html__( 'Enter the heading for the 404 error page.', 'simple-grid' ), 'section' => 'simple_grid_section_search_404', 'settings' => 'simple_grid_options[error_404_heading]', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'simple_grid_options[error_404_message]', array( 'default' => esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'simple-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_html', ) );

    $wp_customize->add_control( 'simple_grid_error_404_message_control', array( 'label' => esc_html__( 'Error 404 Message', 'simple-grid' ), 'description' => esc_html__( 'Enter a message to display on the 404 error page.', 'simple-grid' ), 'section' => 'simple_grid_section_search_404', 'settings' => 'simple_grid_options[error_404_message]', 'type' => 'textarea', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_404_search]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_404_search_control', array( 'label' => esc_html__( 'Hide Search Box from 404 Page', 'simple-grid' ), 'section' => 'simple_grid_section_search_404', 'settings' => 'simple_grid_options[hide_404_search]', 'type' => 'checkbox', ) );

}