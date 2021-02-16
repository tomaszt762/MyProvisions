<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#simple-grid-content-wrapper -->
</div><!--/#simple-grid-wrapper -->

<?php simple_grid_bottom_wide_widgets(); ?>

<?php simple_grid_before_footer(); ?>

<?php if ( !(simple_grid_hide_footer_widgets()) ) { ?>
<?php if ( is_active_sidebar( 'simple-grid-footer-1' ) || is_active_sidebar( 'simple-grid-footer-2' ) || is_active_sidebar( 'simple-grid-footer-3' ) || is_active_sidebar( 'simple-grid-footer-4' ) || is_active_sidebar( 'simple-grid-footer-5' ) || is_active_sidebar( 'simple-grid-footer-6' ) || is_active_sidebar( 'simple-grid-top-footer' ) || is_active_sidebar( 'simple-grid-bottom-footer' ) ) : ?>
<div class='clearfix' id='simple-grid-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='simple-grid-container clearfix'>
<div class="simple-grid-outer-wrapper">

<?php if ( is_active_sidebar( 'simple-grid-top-footer' ) ) : ?>
<div class='clearfix'>
<div class='simple-grid-top-footer-block'>
<?php dynamic_sidebar( 'simple-grid-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'simple-grid-footer-1' ) || is_active_sidebar( 'simple-grid-footer-2' ) || is_active_sidebar( 'simple-grid-footer-3' ) || is_active_sidebar( 'simple-grid-footer-4' ) || is_active_sidebar( 'simple-grid-footer-5' ) || is_active_sidebar( 'simple-grid-footer-6' ) ) : ?>
<div class='simple-grid-footer-block-cols clearfix'>

<div class="simple-grid-footer-block-col simple-grid-footer-6-col" id="simple-grid-footer-block-1">
<?php dynamic_sidebar( 'simple-grid-footer-1' ); ?>
</div>

<div class="simple-grid-footer-block-col simple-grid-footer-6-col" id="simple-grid-footer-block-2">
<?php dynamic_sidebar( 'simple-grid-footer-2' ); ?>
</div>

<div class="simple-grid-footer-block-col simple-grid-footer-6-col" id="simple-grid-footer-block-3">
<?php dynamic_sidebar( 'simple-grid-footer-3' ); ?>
</div>

<div class="simple-grid-footer-block-col simple-grid-footer-6-col" id="simple-grid-footer-block-4">
<?php dynamic_sidebar( 'simple-grid-footer-4' ); ?>
</div>

<div class="simple-grid-footer-block-col simple-grid-footer-6-col" id="simple-grid-footer-block-5">
<?php dynamic_sidebar( 'simple-grid-footer-5' ); ?>
</div>

<div class="simple-grid-footer-block-col simple-grid-footer-6-col" id="simple-grid-footer-block-6">
<?php dynamic_sidebar( 'simple-grid-footer-6' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'simple-grid-bottom-footer' ) ) : ?>
<div class='clearfix'>
<div class='simple-grid-bottom-footer-block'>
<?php dynamic_sidebar( 'simple-grid-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div><!--/#simple-grid-footer-blocks-->
<?php endif; ?>
<?php } ?>

<div class='clearfix' id='simple-grid-copyright-area'>
<div class='simple-grid-copyright-area-inside simple-grid-container'>
<div class="simple-grid-outer-wrapper">

<div class='simple-grid-copyright-area-inside-content clearfix'>
<?php if ( simple_grid_get_option('footer_text') ) : ?>
  <p class='simple-grid-copyright'><?php echo wp_kses_post(simple_grid_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='simple-grid-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'simple-grid' ), esc_html(date_i18n(__('Y','simple-grid'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='simple-grid-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'simple-grid' ), 'ThemesDNA.com' ); ?></a></p>
</div>

</div>
</div>
</div><!--/#simple-grid-copyright-area -->

<?php simple_grid_after_footer(); ?>

<button class="simple-grid-scroll-top" title="<?php esc_attr_e('Scroll to Top','simple-grid'); ?>"><i class="fas fa-arrow-up" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'simple-grid'); ?></span></button>

<?php wp_footer(); ?>
</body>
</html>