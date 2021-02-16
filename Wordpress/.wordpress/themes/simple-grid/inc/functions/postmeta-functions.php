<?php
/**
* Post meta functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'simple_grid_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function simple_grid_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'simple-grid' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="simple-grid-tags-links"><i class="fas fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'simple-grid' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'simple_grid_grid_cats' ) ) :
function simple_grid_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'simple-grid' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="simple-grid-grid-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'simple-grid' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'simple_grid_grid_postmeta' ) ) :
function simple_grid_grid_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( (simple_grid_get_option('show_post_author_home')) || !(simple_grid_get_option('hide_posted_date_home')) ) { ?>
    <div class="simple-grid-grid-post-footer simple-grid-grid-post-block">
    <div class="simple-grid-grid-post-footer-inside">
    <?php if ( (simple_grid_get_option('show_post_author_home')) ) { ?><span class="simple-grid-grid-post-author simple-grid-grid-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_posted_date_home')) ) { ?><span class="simple-grid-grid-post-date simple-grid-grid-post-meta"><?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    </div>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'simple_grid_single_cats' ) ) :
function simple_grid_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'simple-grid' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<span class="simple-grid-entry-meta-single-cats"><i class="far fa-folder-open" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'simple-grid' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'simple_grid_single_postmeta' ) ) :
function simple_grid_single_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(simple_grid_get_option('hide_post_author')) || !(simple_grid_get_option('hide_posted_date')) || !(simple_grid_get_option('hide_comments_link')) || !(simple_grid_get_option('hide_post_categories')) || !(simple_grid_get_option('hide_post_edit')) ) { ?>
    <div class="simple-grid-entry-meta-single">
    <?php if ( !(simple_grid_get_option('hide_post_author')) ) { ?><span class="simple-grid-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_posted_date')) ) { ?><span class="simple-grid-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="simple-grid-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'simple-grid' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_post_categories')) ) { ?><?php simple_grid_single_cats(); ?><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'simple-grid' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), '<span class="edit-link">&nbsp;&nbsp;<i class="far fa-edit" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'simple_grid_page_postmeta' ) ) :
function simple_grid_page_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(simple_grid_get_option('hide_page_author')) || !(simple_grid_get_option('hide_page_date')) || !(simple_grid_get_option('hide_page_comments')) ) { ?>
    <div class="simple-grid-entry-meta-single">
    <?php if ( !(simple_grid_get_option('hide_page_author')) ) { ?><span class="simple-grid-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_page_date')) ) { ?><span class="simple-grid-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo esc_html( get_the_date() ); ?></span><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_page_comments')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="simple-grid-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'simple-grid' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'simple_grid_grid_postmeta_header' ) ) :
function simple_grid_grid_postmeta_header() { ?>
    <?php global $post; ?>
    <?php if ( !(simple_grid_get_option('hide_comments_link_home')) ) { ?>
    <div class="simple-grid-grid-post-header clearfix">
    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="simple-grid-grid-post-comments simple-grid-grid-post-header-meta"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0<span class="screen-reader-text"> Comment on %s</span>', 'simple-grid' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), sprintf( wp_kses( /* translators: %s: post title */ __( '1<span class="screen-reader-text"> Comment on %s</span>', 'simple-grid' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ), sprintf( wp_kses( /* translators: %s: post title */ __( '%1$s<span class="screen-reader-text"> Comments on %2$s</span>', 'simple-grid' ), array( 'span' => array( 'class' => array(), ), ) ), number_format_i18n( get_comments_number() ), wp_kses_post( get_the_title() ) ) ); ?></span>
    <?php } ?>
    </div>
    <?php } ?>
<?php }
endif;