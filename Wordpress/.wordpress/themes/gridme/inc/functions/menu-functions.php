<?php
/**
* Menu Functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function gridme_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'gridme_page_menu_args' );

function gridme_top_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'gridme-menu-secondary-navigation',
        'menu_class'   => 'gridme-secondary-nav-menu gridme-menu-secondary',
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

function gridme_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'gridme-menu-primary-navigation',
        'menu_class'   => 'gridme-primary-nav-menu gridme-menu-primary',
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

function gridme_secondary_menu_area() {
if ( gridme_is_secondary_menu_active() ) { ?>
<div class="gridme-container gridme-secondary-menu-container clearfix">
<div class="gridme-secondary-menu-container-inside clearfix">
<nav class="gridme-nav-secondary" id="gridme-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'gridme' ); ?>">
<div class="gridme-outer-wrapper">
<button class="gridme-secondary-responsive-menu-icon" aria-controls="gridme-menu-secondary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'gridme' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'gridme-menu-secondary-navigation', 'menu_class' => 'gridme-secondary-nav-menu gridme-menu-secondary', 'fallback_cb' => 'gridme_top_fallback_menu', 'container' => '', ) ); ?>
</div>
</nav>
</div>
</div>
<?php }
}