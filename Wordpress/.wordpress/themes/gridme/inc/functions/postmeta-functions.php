<?php
/**
* Post meta functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'gridme_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function gridme_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'gridme' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="gridme-tags-links"><i class="fas fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'gridme' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

if ( ! function_exists( 'gridme_grid_cats' ) ) :
function gridme_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'gridme' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="gridme-grid-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'gridme' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

if ( ! function_exists( 'gridme_grid_postmeta' ) ) :
function gridme_grid_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridme_get_option('hide_post_author_home')) || !(gridme_get_option('hide_comments_link_home')) ) { ?>
    <div class="gridme-grid-post-footer gridme-grid-post-block">
    <div class="gridme-grid-post-footer-inside">
    <?php if ( !(gridme_get_option('hide_post_author_home')) ) { ?><span class="gridme-grid-post-author gridme-grid-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(gridme_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="gridme-grid-post-comment gridme-grid-post-meta"><?php comments_popup_link( esc_html__( '0 Comment', 'gridme' ), esc_html__( '1 Comment', 'gridme' ), esc_html__( '% Comments', 'gridme' ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'gridme_single_cats' ) ) :
function gridme_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'gridme' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="gridme-entry-meta-single-cats"><i class="far fa-folder-open" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'gridme' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;

if ( ! function_exists( 'gridme_single_postmeta' ) ) :
function gridme_single_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridme_get_option('hide_post_author')) || !(gridme_get_option('hide_posted_date')) || !(gridme_get_option('hide_comments_link')) || !(gridme_get_option('hide_post_categories')) || !(gridme_get_option('hide_post_edit')) ) { ?>
    <div class="gridme-entry-meta-single">
    <?php if ( !(gridme_get_option('hide_post_author')) ) { ?><span class="gridme-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(gridme_get_option('hide_posted_date')) ) { ?><span class="gridme-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(gridme_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="gridme-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'gridme' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(gridme_get_option('hide_post_categories')) ) { ?><?php gridme_single_cats(); ?><?php } ?>
    <?php if ( !(gridme_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'gridme' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), '<span class="edit-link">&nbsp;&nbsp;<i class="far fa-edit" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'gridme_page_postmeta' ) ) :
function gridme_page_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(gridme_get_option('hide_page_author')) || !(gridme_get_option('hide_page_date')) || !(gridme_get_option('hide_page_comments')) ) { ?>
    <div class="gridme-entry-meta-single">
    <?php if ( !(gridme_get_option('hide_page_author')) ) { ?><span class="gridme-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(gridme_get_option('hide_page_date')) ) { ?><span class="gridme-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(gridme_get_option('hide_page_comments')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="gridme-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'gridme' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;

if ( ! function_exists( 'gridme_grid_datebox' ) ) :
function gridme_grid_datebox() { ?>
    <?php global $post; ?>
    <?php if ( !(gridme_get_option('hide_posted_date_home')) ) { ?>
    <div class="gridme-grid-datebox"><div class="gridme-grid-datebox-day"><?php echo esc_html( get_the_date('d') ); ?></div><div class="gridme-grid-datebox-month"><?php echo esc_html( get_the_date('M') ); ?></div><div class="gridme-grid-datebox-year"><?php echo esc_html( get_the_date('Y') ); ?></div></div>
    <?php } ?>
<?php }
endif;