<?php
/**
* Media functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_media_content_grid() {
    global $post;
    if ( !(gridme_get_option('hide_thumbnail_home')) ) {
        if ( has_post_thumbnail($post->ID) ) { ?>
            <div class="gridme-grid-post-thumbnail gridme-grid-post-block">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="gridme-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridme' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(gridme_grid_thumb_style(), array('class' => 'gridme-grid-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php gridme_grid_datebox(); ?>
                <?php if ( !(gridme_get_option('hide_post_categories_home')) ) { gridme_grid_cats(); } ?>
            </div>
        <?php } else { ?>
            <?php if ( !(gridme_get_option('hide_default_thumbnail')) ) { ?>
            <div class="gridme-grid-post-thumbnail gridme-grid-post-thumbnail-default gridme-grid-post-block">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="gridme-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridme' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( gridme_grid_no_thumb_url() ); ?>" class="gridme-grid-post-thumbnail-img"/></a>
                <?php gridme_grid_datebox(); ?>
                <?php if ( !(gridme_get_option('hide_post_categories_home')) ) { gridme_grid_cats(); } ?>
            </div>
            <?php }
        }
    }
}

function gridme_media_content_single() {
    global $post;
    if ( has_post_thumbnail($post->ID) ) {
        if ( !(gridme_get_option('hide_thumbnail')) ) {
            if ( gridme_get_option('thumbnail_link') == 'no' ) { ?>
                <div class="gridme-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-post.php' ) ) ) {
                    the_post_thumbnail('gridme-1222w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('gridme-922w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="gridme-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-post.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridme' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridme-post-thumbnail-single-link"><?php the_post_thumbnail('gridme-1222w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridme' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridme-post-thumbnail-single-link"><?php the_post_thumbnail('gridme-922w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
}

function gridme_media_content_single_location() {
    if( gridme_get_option('featured_media_under_post_title') ) {
        add_action('gridme_after_single_post_title', 'gridme_media_content_single', 10 );
    } else {
        add_action('gridme_before_single_post_title', 'gridme_media_content_single', 10 );
    }
}
add_action('template_redirect', 'gridme_media_content_single_location', 100 );

function gridme_media_content_page() {
    global $post;
    if ( has_post_thumbnail($post->ID) ) {
        if ( !(gridme_get_option('hide_page_thumbnail')) ) {
            if ( gridme_get_option('thumbnail_link_page') == 'no' ) { ?>
                <div class="gridme-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-page.php' ) ) ) {
                    the_post_thumbnail('gridme-1222w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('gridme-922w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="gridme-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-page.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridme' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridme-post-thumbnail-single-link"><?php the_post_thumbnail('gridme-1222w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'gridme' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="gridme-post-thumbnail-single-link"><?php the_post_thumbnail('gridme-922w-autoh-image', array('class' => 'gridme-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
}

function gridme_media_content_page_location() {
    if( gridme_get_option('featured_media_under_page_title') ) {
        add_action('gridme_after_single_page_title', 'gridme_media_content_page', 10 );
    } else {
        add_action('gridme_before_single_page_title', 'gridme_media_content_page', 10 );
    }
}
add_action('template_redirect', 'gridme_media_content_page_location', 110 );