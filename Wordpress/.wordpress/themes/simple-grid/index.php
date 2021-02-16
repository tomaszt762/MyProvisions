<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="simple-grid-main-wrapper clearfix" id="simple-grid-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="simple-grid-main-wrapper-inside clearfix">

<?php simple_grid_before_main_content(); ?>

<div class="simple-grid-posts-wrapper" id="simple-grid-posts-wrapper">

<?php if ( !(simple_grid_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( simple_grid_get_option('posts_heading') ) : ?>
<div class="simple-grid-posts-header"><h2 class="simple-grid-posts-heading"><span class="simple-grid-posts-heading-inside"><?php echo esc_html( simple_grid_get_option('posts_heading') ); ?></span></h2></div>
<?php else : ?>
<div class="simple-grid-posts-header"><h2 class="simple-grid-posts-heading"><span class="simple-grid-posts-heading-inside"><?php esc_html_e( 'Recent Posts', 'simple-grid' ); ?></span></h2></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="simple-grid-posts-content">

<?php if (have_posts()) : ?>

    <div class="simple-grid-posts simple-grid-posts-grid">
    <?php $simple_grid_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content-grid' ); ?>

    <?php $simple_grid_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php simple_grid_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div><!--/#simple-grid-posts-wrapper -->

<?php simple_grid_after_main_content(); ?>

</div>
</div>
</div><!-- /#simple-grid-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>