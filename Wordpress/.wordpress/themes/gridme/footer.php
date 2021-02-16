<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#gridme-content-wrapper -->
</div><!--/#gridme-wrapper -->

<?php gridme_bottom_wide_widgets(); ?>

<?php gridme_before_footer(); ?>

<?php if ( !(gridme_hide_footer_widgets()) ) { ?>
<?php if ( is_active_sidebar( 'gridme-footer-1' ) || is_active_sidebar( 'gridme-footer-2' ) || is_active_sidebar( 'gridme-footer-3' ) || is_active_sidebar( 'gridme-footer-4' ) || is_active_sidebar( 'gridme-footer-5' ) || is_active_sidebar( 'gridme-footer-6' ) || is_active_sidebar( 'gridme-top-footer' ) || is_active_sidebar( 'gridme-bottom-footer' ) ) : ?>
<div class='clearfix' id='gridme-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='gridme-container clearfix'>
<div class="gridme-outer-wrapper">

<?php if ( is_active_sidebar( 'gridme-top-footer' ) ) : ?>
<div class='clearfix'>
<div class='gridme-top-footer-block'>
<?php dynamic_sidebar( 'gridme-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'gridme-footer-1' ) || is_active_sidebar( 'gridme-footer-2' ) || is_active_sidebar( 'gridme-footer-3' ) || is_active_sidebar( 'gridme-footer-4' ) || is_active_sidebar( 'gridme-footer-5' ) || is_active_sidebar( 'gridme-footer-6' ) ) : ?>
<div class='gridme-footer-block-cols clearfix'>

<div class="gridme-footer-block-col <?php echo esc_attr( gridme_footer_grid_cols() ); ?>" id="gridme-footer-block-1">
<?php dynamic_sidebar( 'gridme-footer-1' ); ?>
</div>

<div class="gridme-footer-block-col <?php echo esc_attr( gridme_footer_grid_cols() ); ?>" id="gridme-footer-block-2">
<?php dynamic_sidebar( 'gridme-footer-2' ); ?>
</div>

<div class="gridme-footer-block-col <?php echo esc_attr( gridme_footer_grid_cols() ); ?>" id="gridme-footer-block-3">
<?php dynamic_sidebar( 'gridme-footer-3' ); ?>
</div>

<div class="gridme-footer-block-col <?php echo esc_attr( gridme_footer_grid_cols() ); ?>" id="gridme-footer-block-4">
<?php dynamic_sidebar( 'gridme-footer-4' ); ?>
</div>

<div class="gridme-footer-block-col <?php echo esc_attr( gridme_footer_grid_cols() ); ?>" id="gridme-footer-block-5">
<?php dynamic_sidebar( 'gridme-footer-5' ); ?>
</div>

<div class="gridme-footer-block-col <?php echo esc_attr( gridme_footer_grid_cols() ); ?>" id="gridme-footer-block-6">
<?php dynamic_sidebar( 'gridme-footer-6' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'gridme-bottom-footer' ) ) : ?>
<div class='clearfix'>
<div class='gridme-bottom-footer-block'>
<?php dynamic_sidebar( 'gridme-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div><!--/#gridme-footer-blocks-->
<?php endif; ?>
<?php } ?>

<div class='clearfix' id='gridme-copyright-area'>
<div class='gridme-copyright-area-inside gridme-container'>
<div class="gridme-outer-wrapper">

<div class='gridme-copyright-area-inside-content clearfix'>

<div class='gridme-copyright-area-inside-left'>
<?php if ( gridme_get_option('footer_text') ) : ?>
  <p class='gridme-copyright'><?php echo esc_html(gridme_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='gridme-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'gridme' ), esc_html(date_i18n(__('Y','gridme'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='gridme-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'gridme' ), 'ThemesDNA.com' ); ?></a></p>
</div>

<?php if ( gridme_is_footer_social_buttons_active() ) { ?>
<div class='gridme-copyright-area-inside-right'>
<?php gridme_footer_social_buttons(); ?>
</div>
<?php } ?>

</div>

</div>
</div>
</div><!--/#gridme-copyright-area -->

<?php gridme_after_footer(); ?>

<button class="gridme-scroll-top" title="<?php esc_attr_e('Scroll to Top','gridme'); ?>"><i class="fas fa-arrow-up" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'gridme'); ?></span></button>

<?php wp_footer(); ?>
</body>
</html>