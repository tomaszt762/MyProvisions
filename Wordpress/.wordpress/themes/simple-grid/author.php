<?php
/**
* The template for displaying author archive pages.
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

<div class="simple-grid-page-header-outside">
<header class="simple-grid-page-header">
<div class="simple-grid-page-header-inside">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</div>
</header>
</div>

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