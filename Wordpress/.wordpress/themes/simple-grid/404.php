<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='simple-grid-main-wrapper clearfix' id='simple-grid-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>
<div class="simple-grid-main-wrapper-inside clearfix">

<div class='simple-grid-posts-wrapper' id='simple-grid-posts-wrapper'>

<div class='simple-grid-posts simple-grid-box'>
<div class="simple-grid-box-inside">

<div class="simple-grid-page-header-outside">
<header class="simple-grid-page-header">
<div class="simple-grid-page-header-inside">
    <?php if ( simple_grid_get_option('error_404_heading') ) : ?>
    <h1 class="page-title"><?php echo esc_html( simple_grid_get_option('error_404_heading') ); ?></h1>
    <?php else : ?>
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'simple-grid' ); ?></h1>
    <?php endif; ?>
</div>
</header><!-- .simple-grid-page-header -->
</div>

<div class='simple-grid-posts-content'>

    <?php if ( simple_grid_get_option('error_404_message') ) : ?>
    <p><?php echo wp_kses_post( force_balance_tags( simple_grid_get_option('error_404_message') ) ); ?></p>
    <?php else : ?>
    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'simple-grid' ); ?></p>
    <?php endif; ?>

    <?php if ( !(simple_grid_get_option('hide_404_search')) ) { ?><?php get_search_form(); ?><?php } ?>

</div>

</div>
</div>

</div><!--/#simple-grid-posts-wrapper -->

</div>
</div>
</div><!-- /#simple-grid-main-wrapper -->

<?php get_footer(); ?>