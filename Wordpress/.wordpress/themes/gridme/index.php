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

<?php if ( !(gridme_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( gridme_get_option('posts_heading') ) : ?>
<div class="gridme-posts-header"><h2 class="gridme-posts-heading"><span class="gridme-posts-heading-inside"><?php echo esc_html( gridme_get_option('posts_heading') ); ?></span></h2></div>
<?php else : ?>
<div class="gridme-posts-header"><h2 class="gridme-posts-heading"><span class="gridme-posts-heading-inside"><?php esc_html_e( 'Recent Posts', 'gridme' ); ?></span></h2></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

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