<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_widgets_init() {

register_sidebar(array(
    'id' => 'simple-grid-header-ad',
    'name' => esc_html__( 'Header Right Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located on the right side of the header of your web page. You can drag and drop a "Custom HTML" widget into this widget area and add your 728x90 banner ad code into that widget. You need to select "Header Layout" as "Logo + Header Banner" from theme options to display this widget area.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'simple-grid-sidebar-one',
    'name' => esc_html__( 'Sidebar 1 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located on the left-hand side of your web page.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-side-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Default HomePage)', 'simple-grid' ),
    'description' => esc_html__( 'This full-width widget area is located after the header of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Everywhere)', 'simple-grid' ),
    'description' => esc_html__( 'This full-width widget area is located after the header of your website. Widgets of this widget area are displayed on every page of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-home-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Default HomePage)', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content (above posts) of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Everywhere)', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content (above posts) of your website. Widgets of this widget area are displayed on every page of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-home-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Default HomePage)', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content (below posts) of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Everywhere)', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content (below posts) of your website. Widgets of this widget area are displayed on every page of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-home-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Default HomePage)', 'simple-grid' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Everywhere)', 'simple-grid' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on every page of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-single-post-bottom-widgets',
    'name' => esc_html__( 'Single Post Bottom Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located at the bottom of single post of any post type (except attachments and pages).', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-main-widget widget simple-grid-widget-box %2$s"><div class="simple-grid-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="simple-grid-widget-header"><h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'simple-grid-top-footer',
    'name' => esc_html__( 'Footer Top Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located on the top of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-footer-1',
    'name' => esc_html__( 'Footer 1 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is the column 1 of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-footer-2',
    'name' => esc_html__( 'Footer 2 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is the column 2 of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-footer-3',
    'name' => esc_html__( 'Footer 3 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is the column 3 of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-footer-4',
    'name' => esc_html__( 'Footer 4 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is the column 4 of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-footer-5',
    'name' => esc_html__( 'Footer 5 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is the column 5 of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-footer-6',
    'name' => esc_html__( 'Footer 6 Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is the column 6 of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'simple-grid-bottom-footer',
    'name' => esc_html__( 'Footer Bottom Widgets', 'simple-grid' ),
    'description' => esc_html__( 'This widget area is located on the bottom of the footer of your website.', 'simple-grid' ),
    'before_widget' => '<div id="%1$s" class="simple-grid-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="simple-grid-widget-title"><span class="simple-grid-widget-title-inside">',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'simple_grid_widgets_init' );


function simple_grid_sidebar_one_widgets() {
    dynamic_sidebar( 'simple-grid-sidebar-one' );
}

function simple_grid_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'simple-grid-home-fullwidth-widgets' ) || is_active_sidebar( 'simple-grid-fullwidth-widgets' ) ) : ?>
<div class="simple-grid-outer-wrapper">
<div class="simple-grid-top-wrapper-outer clearfix">
<div class="simple-grid-featured-posts-area simple-grid-top-wrapper clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'simple-grid-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'simple-grid-fullwidth-widgets' ); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php }


function simple_grid_bottom_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'simple-grid-home-fullwidth-bottom-widgets' ) || is_active_sidebar( 'simple-grid-fullwidth-bottom-widgets' ) ) : ?>
<div class="simple-grid-outer-wrapper">
<div class="simple-grid-bottom-wrapper-outer clearfix">
<div class="simple-grid-featured-posts-area simple-grid-bottom-wrapper clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'simple-grid-home-fullwidth-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'simple-grid-fullwidth-bottom-widgets' ); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php }


function simple_grid_top_widgets() { ?>

<?php if ( is_active_sidebar( 'simple-grid-home-top-widgets' ) || is_active_sidebar( 'simple-grid-top-widgets' ) ) : ?>
<div class="simple-grid-featured-posts-area simple-grid-featured-posts-area-top clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'simple-grid-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'simple-grid-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function simple_grid_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'simple-grid-home-bottom-widgets' ) || is_active_sidebar( 'simple-grid-bottom-widgets' ) ) : ?>
<div class='simple-grid-featured-posts-area simple-grid-featured-posts-area-bottom clearfix'>
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'simple-grid-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'simple-grid-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function simple_grid_post_bottom_widgets() {
    if ( is_singular() ) {
        if ( is_active_sidebar( 'simple-grid-single-post-bottom-widgets' ) ) : ?>
            <div class="simple-grid-featured-posts-area clearfix">
            <?php dynamic_sidebar( 'simple-grid-single-post-bottom-widgets' ); ?>
            </div>
        <?php endif;
    }
}