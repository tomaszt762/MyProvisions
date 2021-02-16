<?php
/**
* The header for GridMe theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package GridMe WordPress Theme
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

<body <?php body_class('gridme-animated gridme-fadein'); ?> id="gridme-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#gridme-content-wrapper"><?php esc_html_e( 'Skip to content', 'gridme' ); ?></a>

<?php gridme_before_header(); ?>

<?php gridme_header_image(); ?>

<div class="gridme-site-header gridme-container" id="gridme-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="gridme-head-content clearfix" id="gridme-head-content">

<?php if ( gridme_is_header_content_active() ) { ?>
<div class="gridme-header-inside clearfix">
<div class="gridme-header-inside-content clearfix">
<div class="gridme-outer-wrapper">
<div class="gridme-header-inside-container">

<div class="gridme-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="gridme-logo-img-link">
        <img src="<?php echo esc_url( gridme_custom_logo() ); ?>" alt="" class="gridme-logo-img"/>
    </a>
    <div class="gridme-custom-logo-info"><?php gridme_site_title(); ?></div>
    </div>
<?php else: ?>
    <div class="site-branding">
      <?php gridme_site_title(); ?>
    </div>
<?php endif; ?>
</div>

<?php if ( gridme_is_primary_menu_active() ) { ?>
<div class="gridme-header-menu">
<div class="gridme-container gridme-primary-menu-container clearfix">
<div class="gridme-primary-menu-container-inside clearfix">
<nav class="gridme-nav-primary" id="gridme-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'gridme' ); ?>">
<button class="gridme-primary-responsive-menu-icon" aria-controls="gridme-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'gridme' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'gridme-menu-primary-navigation', 'menu_class' => 'gridme-primary-nav-menu gridme-menu-primary', 'fallback_cb' => 'gridme_fallback_menu', 'container' => '', ) ); ?>
</nav>
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</div>
</div>
<?php } else { ?>
<div class="gridme-no-header-content">
  <?php gridme_site_title(); ?>
</div>
<?php } ?>

</div><!--/#gridme-head-content -->
</div><!--/#gridme-header -->

<div id="gridme-search-overlay-wrap" class="gridme-search-overlay">
  <div class="gridme-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
  <button class="gridme-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'gridme' ); ?>" title="<?php esc_attr_e('Close Search','gridme'); ?>">&#xD7;</button>
</div>

<?php gridme_after_header(); ?>

<div id="gridme-header-end"></div>

<?php gridme_top_wide_widgets(); ?>

<div class="gridme-outer-wrapper" id="gridme-wrapper-outside">

<div class="gridme-container clearfix" id="gridme-wrapper">
<div class="gridme-content-wrapper clearfix" id="gridme-content-wrapper">