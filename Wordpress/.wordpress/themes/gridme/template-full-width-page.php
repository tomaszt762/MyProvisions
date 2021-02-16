<?php
/**
* The template for displaying full-width page.
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar
* Template Post Type: page
*/

get_header(); ?>

<div class="gridme-main-wrapper clearfix" id="gridme-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="gridme-main-wrapper-inside clearfix">

<?php gridme_before_main_content(); ?>

<div class='gridme-posts-wrapper' id='gridme-posts-wrapper'>

<?php while (have_posts()) : the_post();

    get_template_part( 'template-parts/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;

endwhile; ?>

<div class="clear"></div>
</div><!--/#gridme-posts-wrapper -->

<?php gridme_after_main_content(); ?>

</div>
</div>
</div><!-- /#gridme-main-wrapper -->

<?php get_footer(); ?>