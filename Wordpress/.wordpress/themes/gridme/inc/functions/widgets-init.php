<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_widgets_init() {

register_sidebar(array(
    'id' => 'gridme-sidebar-one',
    'name' => esc_html__( 'Sidebar 1 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is located on the left-hand side of your web page.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-side-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Default HomePage)', 'gridme' ),
    'description' => esc_html__( 'This full-width widget area is located after the header of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Everywhere)', 'gridme' ),
    'description' => esc_html__( 'This full-width widget area is located after the header of your website. Widgets of this widget area are displayed on every page of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-home-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Default HomePage)', 'gridme' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content (above posts) of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-top-widgets',
    'name' => esc_html__( 'Above Content Widgets (Everywhere)', 'gridme' ),
    'description' => esc_html__( 'This widget area is located at the top of the main content (above posts) of your website. Widgets of this widget area are displayed on every page of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-home-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Default HomePage)', 'gridme' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content (below posts) of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-bottom-widgets',
    'name' => esc_html__( 'Below Content Widgets (Everywhere)', 'gridme' ),
    'description' => esc_html__( 'This widget area is located at the bottom of the main content (below posts) of your website. Widgets of this widget area are displayed on every page of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-home-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Default HomePage)', 'gridme' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on the default homepage of your website (when you are showing your latest posts on homepage).', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-fullwidth-bottom-widgets',
    'name' => esc_html__( 'Bottom Full Width Widgets (Everywhere)', 'gridme' ),
    'description' => esc_html__( 'This full-width widget area is located before the footer of your website. Widgets of this widget area are displayed on every page of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-single-post-bottom-widgets',
    'name' => esc_html__( 'Single Post Bottom Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is located at the bottom of single post of any post type (except attachments and pages).', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-main-widget widget gridme-widget-box %2$s"><div class="gridme-widget-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="gridme-widget-header"><h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'gridme-top-footer',
    'name' => esc_html__( 'Footer Top Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is located on the top of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-footer-1',
    'name' => esc_html__( 'Footer 1 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is the column 1 of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-footer-2',
    'name' => esc_html__( 'Footer 2 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is the column 2 of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-footer-3',
    'name' => esc_html__( 'Footer 3 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is the column 3 of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-footer-4',
    'name' => esc_html__( 'Footer 4 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is the column 4 of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-footer-5',
    'name' => esc_html__( 'Footer 5 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is the column 5 of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-footer-6',
    'name' => esc_html__( 'Footer 6 Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is the column 6 of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'gridme-bottom-footer',
    'name' => esc_html__( 'Footer Bottom Widgets', 'gridme' ),
    'description' => esc_html__( 'This widget area is located on the bottom of the footer of your website.', 'gridme' ),
    'before_widget' => '<div id="%1$s" class="gridme-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="gridme-widget-title"><span class="gridme-widget-title-inside">',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'gridme_widgets_init' );


function gridme_sidebar_one_widgets() {
    dynamic_sidebar( 'gridme-sidebar-one' );
}

function gridme_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'gridme-home-fullwidth-widgets' ) || is_active_sidebar( 'gridme-fullwidth-widgets' ) ) : ?>
<div class="gridme-outer-wrapper">
<div class="gridme-top-wrapper-outer clearfix">
<div class="gridme-featured-posts-area gridme-top-wrapper clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridme-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridme-fullwidth-widgets' ); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php }


function gridme_bottom_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'gridme-home-fullwidth-bottom-widgets' ) || is_active_sidebar( 'gridme-fullwidth-bottom-widgets' ) ) : ?>
<div class="gridme-outer-wrapper">
<div class="gridme-bottom-wrapper-outer clearfix">
<div class="gridme-featured-posts-area gridme-bottom-wrapper clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridme-home-fullwidth-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridme-fullwidth-bottom-widgets' ); ?>
</div>
</div>
</div>
<?php endif; ?>

<?php }


function gridme_top_widgets() { ?>

<?php if ( is_active_sidebar( 'gridme-home-top-widgets' ) || is_active_sidebar( 'gridme-top-widgets' ) ) : ?>
<div class="gridme-featured-posts-area gridme-featured-posts-area-top clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridme-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridme-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function gridme_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'gridme-home-bottom-widgets' ) || is_active_sidebar( 'gridme-bottom-widgets' ) ) : ?>
<div class='gridme-featured-posts-area gridme-featured-posts-area-bottom clearfix'>
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'gridme-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'gridme-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function gridme_post_bottom_widgets() {
    if ( is_singular() ) {
        if ( is_active_sidebar( 'gridme-single-post-bottom-widgets' ) ) : ?>
            <div class="gridme-featured-posts-area clearfix">
            <?php dynamic_sidebar( 'gridme-single-post-bottom-widgets' ); ?>
            </div>
        <?php endif;
    }
}