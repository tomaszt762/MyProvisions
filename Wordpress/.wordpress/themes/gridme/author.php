<?php
/**
* The template for displaying author archive pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="gridme-main-wrapper clearfix" id="gridme-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="gridme-main-wrapper-inside clearfix">

<?php gridme_before_main_content(); ?>

<div class="gridme-posts-wrapper" id="gridme-posts-wrapper">

<div class="gridme-page-header-outside">
<header class="gridme-page-header">
<div class="gridme-page-header-inside">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</div>
</header>
</div>

<div class="gridme-posts-content">

<?php if (have_posts()) : ?>

    <div class="gridme-posts gridme-posts-grid">
    <?php $gridme_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content-grid' ); ?>

    <?php $gridme_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php gridme_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div><!--/#gridme-posts-wrapper -->

<?php gridme_after_main_content(); ?>

</div>
</div>
</div><!-- /#gridme-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>