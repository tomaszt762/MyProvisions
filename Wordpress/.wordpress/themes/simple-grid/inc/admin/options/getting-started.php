<?php
/**
* Getting started options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_getting_started($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_getting_started', array( 'title' => esc_html__( 'Getting Started', 'simple-grid' ), 'description' => esc_html__( 'Thanks for your interest in Simple Grid! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'simple_grid_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new Simple_Grid_Customize_Button_Control( $wp_customize, 'simple_grid_documentation_control', array( 'label' => esc_html__( 'Documentation', 'simple-grid' ), 'section' => 'simple_grid_section_getting_started', 'settings' => 'simple_grid_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/simple-grid-wordpress-theme/' ), 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'simple_grid_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new Simple_Grid_Customize_Button_Control( $wp_customize, 'simple_grid_contact_control', array( 'label' => esc_html__( 'Contact Us', 'simple-grid' ), 'section' => 'simple_grid_section_getting_started', 'settings' => 'simple_grid_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/contact/' ), 'button_target' => '_blank', ) ) );

}