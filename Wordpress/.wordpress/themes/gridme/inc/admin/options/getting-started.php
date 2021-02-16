<?php
/**
* Getting started options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_getting_started($wp_customize) {

    $wp_customize->add_section( 'gridme_section_getting_started', array( 'title' => esc_html__( 'Getting Started', 'gridme' ), 'description' => esc_html__( 'Thanks for your interest in GridMe! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'gridme_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new GridMe_Customize_Button_Control( $wp_customize, 'gridme_documentation_control', array( 'label' => esc_html__( 'Documentation', 'gridme' ), 'section' => 'gridme_section_getting_started', 'settings' => 'gridme_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/gridme-wordpress-theme/' ), 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'gridme_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new GridMe_Customize_Button_Control( $wp_customize, 'gridme_contact_control', array( 'label' => esc_html__( 'Contact Us', 'gridme' ), 'section' => 'gridme_section_getting_started', 'settings' => 'gridme_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => esc_url( 'https://themesdna.com/contact/' ), 'button_target' => '_blank', ) ) );

}