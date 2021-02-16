<?php
/**
* Menu Functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function simple_grid_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'simple_grid_page_menu_args' );

function simple_grid_top_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'simple-grid-menu-secondary-navigation',
        'menu_class'   => 'simple-grid-secondary-nav-menu simple-grid-menu-secondary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

function simple_grid_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'simple-grid-menu-primary-navigation',
        'menu_class'   => 'simple-grid-primary-nav-menu simple-grid-menu-primary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

function simple_grid_secondary_menu_area() {
if ( simple_grid_is_secondary_menu_active() ) { ?>
<div class="simple-grid-container simple-grid-secondary-menu-container clearfix">
<div class="simple-grid-secondary-menu-container-inside clearfix">
<nav class="simple-grid-nav-secondary" id="simple-grid-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'simple-grid' ); ?>">
<div class="simple-grid-outer-wrapper">
<button class="simple-grid-secondary-responsive-menu-icon" aria-controls="simple-grid-menu-secondary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'simple-grid' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'simple-grid-menu-secondary-navigation', 'menu_class' => 'simple-grid-secondary-nav-menu simple-grid-menu-secondary', 'fallback_cb' => 'simple_grid_top_fallback_menu', 'container' => '', ) ); ?>
<?php if ( 'secondary-menu' === simple_grid_social_buttons_location() ) { ?><?php if ( simple_grid_is_social_buttons_active() ) { ?><?php simple_grid_header_social_buttons(); ?><?php } ?><?php } ?>
</div>
</nav>
</div>
</div>
<?php }
}