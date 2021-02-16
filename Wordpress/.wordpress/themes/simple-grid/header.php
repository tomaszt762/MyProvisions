<?php
/**
* The header for Simple Grid theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class('simple-grid-animated simple-grid-fadein'); ?> id="simple-grid-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#simple-grid-content-wrapper"><?php esc_html_e( 'Skip to content', 'simple-grid' ); ?></a>

<?php simple_grid_header_image(); ?>

<?php simple_grid_before_header(); ?>

<div class="simple-grid-site-header simple-grid-container" id="simple-grid-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="simple-grid-head-content clearfix" id="simple-grid-head-content">

<?php if ( simple_grid_is_header_content_active() ) { ?>
<div class="simple-grid-header-inside clearfix">
<div class="simple-grid-header-inside-content clearfix">
<div class="simple-grid-outer-wrapper">
<div class="simple-grid-header-inside-container">

<div class="simple-grid-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding site-branding-full">
    <div class="simple-grid-custom-logo-image">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="simple-grid-logo-img-link">
        <img src="<?php echo esc_url( simple_grid_custom_logo() ); ?>" alt="" class="simple-grid-logo-img"/>
    </a>
    </div>
    <div class="simple-grid-custom-logo-info"><?php simple_grid_site_title(); ?></div>
    </div>
<?php else: ?>
    <div class="site-branding">
      <?php simple_grid_site_title(); ?>
    </div>
<?php endif; ?>
</div>

<div class="simple-grid-header-banner">
<?php dynamic_sidebar( 'simple-grid-header-ad' ); ?>
</div>

</div>
</div>
</div>
</div>
<?php } else { ?>
<div class="simple-grid-no-header-content">
  <?php simple_grid_site_title(); ?>
</div>
<?php } ?>

</div><!--/#simple-grid-head-content -->
</div><!--/#simple-grid-header -->

<div id="simple-grid-search-overlay-wrap" class="simple-grid-search-overlay">
  <div class="simple-grid-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
  <button class="simple-grid-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'simple-grid' ); ?>" title="<?php esc_attr_e('Close Search','simple-grid'); ?>">&#xD7;</button>
</div>

<?php simple_grid_after_header(); ?>

<?php if ( simple_grid_is_primary_menu_active() ) { ?>
<div class="simple-grid-container simple-grid-primary-menu-container simple-grid-clearfix">
<div class="simple-grid-primary-menu-container-inside simple-grid-clearfix">
<nav class="simple-grid-nav-primary" id="simple-grid-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'simple-grid' ); ?>">
<div class="simple-grid-outer-wrapper">
<button class="simple-grid-primary-responsive-menu-icon" aria-controls="simple-grid-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'simple-grid' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'simple-grid-menu-primary-navigation', 'menu_class' => 'simple-grid-primary-nav-menu simple-grid-menu-primary', 'fallback_cb' => 'simple_grid_fallback_menu', 'container' => '', ) ); ?>
<?php if ( 'primary-menu' === simple_grid_social_buttons_location() ) { ?><?php if ( simple_grid_is_social_buttons_active() ) { ?><?php simple_grid_header_social_buttons(); ?><?php } ?><?php } ?>
</div>
</nav>
</div>
</div>
<?php } ?>

<?php simple_grid_top_wide_widgets(); ?>

<div class="simple-grid-outer-wrapper" id="simple-grid-wrapper-outside">

<div class="simple-grid-container clearfix" id="simple-grid-wrapper">
<div class="simple-grid-content-wrapper clearfix" id="simple-grid-content-wrapper">