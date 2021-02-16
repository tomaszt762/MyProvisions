<?php
/**
* Recommended plugins options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_recomm_plugin_options($wp_customize) {

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'simple_grid_section_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 620 ));

    $wp_customize->add_setting( 'simple_grid_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'install_plugins', 'sanitize_callback' => '__return_false' ) );

    $wp_customize->add_control( new Simple_Grid_Customize_Recommended_Plugins( $wp_customize, 'simple_grid_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'simple-grid' ), 'section' => 'simple_grid_section_recommended_plugins', 'settings' => 'simple_grid_options[recommended_plugins]', 'type' => 'themesdna-recommended-wpplugins', 'capability' => 'install_plugins' ) ) );

}