<?php
/**
* Template part for displaying single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php gridme_before_single_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gridme-post-singular gridme-box'); ?>>
<div class="gridme-box-inside">

    <?php gridme_before_single_post_title(); ?>

    <?php if ( !(gridme_get_option('hide_post_title')) ) { ?>
    <header class="entry-header">
    <div class="entry-header-inside clearfix">
        <?php if ( gridme_get_option('remove_post_title_link') ) { ?>
            <?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>
        <?php } else { ?>
            <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        <?php } ?>

        <?php gridme_single_postmeta(); ?>
    </div>
    </header><!-- .entry-header -->
    <?php } ?>

    <?php gridme_after_single_post_title(); ?>

    <div class="entry-content clearfix">
            <?php
            gridme_top_single_post_content();

            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span> <span class="meta-nav">&rarr;</span>', 'gridme' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ) );

            wp_link_pages( array(
             'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'gridme' ) . '</span>',
             'after'       => '</div>',
             'link_before' => '<span>',
             'link_after'  => '</span>',
             ) );

            gridme_bottom_single_post_content();
            ?>
    </div><!-- .entry-content -->

    <?php gridme_after_single_post_content(); ?>

    <?php if ( !(gridme_get_option('hide_author_bio_box')) ) { echo wp_kses_post( force_balance_tags( gridme_add_author_bio_box() ) ); } ?>

    <?php if ( !(gridme_get_option('hide_post_tags')) ) { ?>
    <?php if ( has_tag() ) { ?>
    <footer class="entry-footer gridme-entry-footer">
    <div class="gridme-entry-footer-inside">
        <?php gridme_post_tags(); ?>
    </div>
    </footer><!-- .entry-footer -->
    <?php } ?>
    <?php } ?>

</div>
</article>

<?php gridme_after_single_post(); ?>