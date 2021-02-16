<?php
/**
* Media functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_media_content_grid() {
    global $post;
    if ( has_post_thumbnail($post->ID) ) {
        if ( !(simple_grid_get_option('hide_thumbnail_home')) ) { ?>
            <div class="simple-grid-grid-post-thumbnail simple-grid-grid-post-block">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="simple-grid-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('simple-grid-360w-360h-image', array('class' => 'simple-grid-grid-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php simple_grid_grid_postmeta_header(); ?>
                <?php if ( (simple_grid_get_option('show_post_categories_home')) ) { simple_grid_grid_cats(); } ?>
                <div class="simple-grid-grid-post-details simple-grid-grid-post-block">
                <?php simple_grid_grid_postmeta(); ?>
                <?php if ( !(simple_grid_get_option('hide_post_title_home')) ) { ?><?php the_title( sprintf( '<h3 class="simple-grid-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?><?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="simple-grid-grid-post-thumbnail simple-grid-grid-post-thumbnail-default simple-grid-grid-post-block">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="simple-grid-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-360-360.jpg' ); ?>" class="simple-grid-grid-post-thumbnail-img"/></a>
                <?php simple_grid_grid_postmeta_header(); ?>
                <?php if ( (simple_grid_get_option('show_post_categories_home')) ) { simple_grid_grid_cats(); } ?>
                <div class="simple-grid-grid-post-details simple-grid-grid-post-block">
                <?php simple_grid_grid_postmeta(); ?>
                <?php if ( !(simple_grid_get_option('hide_post_title_home')) ) { ?><?php the_title( sprintf( '<h3 class="simple-grid-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?><?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="simple-grid-grid-post-thumbnail simple-grid-grid-post-thumbnail-default simple-grid-grid-post-block">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="simple-grid-grid-post-thumbnail-link" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-360-360.jpg' ); ?>" class="simple-grid-grid-post-thumbnail-img"/></a>
            <?php simple_grid_grid_postmeta_header(); ?>
            <?php if ( (simple_grid_get_option('show_post_categories_home')) ) { simple_grid_grid_cats(); } ?>
            <div class="simple-grid-grid-post-details simple-grid-grid-post-block">
            <?php simple_grid_grid_postmeta(); ?>
            <?php if ( !(simple_grid_get_option('hide_post_title_home')) ) { ?><?php the_title( sprintf( '<h3 class="simple-grid-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?><?php } ?>
            </div>
        </div>
    <?php }
}

function simple_grid_media_content_single() {
    global $post;
    if ( has_post_thumbnail() ) {
        if ( !(simple_grid_get_option('hide_thumbnail')) ) {
            if ( simple_grid_get_option('thumbnail_link') == 'no' ) { ?>
                <div class="simple-grid-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-post.php' ) ) ) {
                    the_post_thumbnail('simple-grid-1222w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('simple-grid-922w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="simple-grid-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-post.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="simple-grid-post-thumbnail-single-link"><?php the_post_thumbnail('simple-grid-1222w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="simple-grid-post-thumbnail-single-link"><?php the_post_thumbnail('simple-grid-922w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
}

function simple_grid_media_content_single_location() {
    if( simple_grid_get_option('featured_media_under_post_title') ) {
        add_action('simple_grid_after_single_post_title', 'simple_grid_media_content_single', 10 );
    } else {
        add_action('simple_grid_before_single_post_title', 'simple_grid_media_content_single', 10 );
    }
}
add_action('template_redirect', 'simple_grid_media_content_single_location', 100 );

function simple_grid_media_content_page() {
    global $post; ?>
    <?php
    if ( has_post_thumbnail() ) {
        if ( !(simple_grid_get_option('hide_page_thumbnail')) ) {
            if ( simple_grid_get_option('thumbnail_link_page') == 'no' ) { ?>
                <div class="simple-grid-post-thumbnail-single">
                <?php
                if ( is_page_template( array( 'template-full-width-page.php' ) ) ) {
                    the_post_thumbnail('simple-grid-1222w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                } else {
                    the_post_thumbnail('simple-grid-922w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                }
                ?>
                </div>
            <?php } else { ?>
                <div class="simple-grid-post-thumbnail-single">
                <?php if ( is_page_template( array( 'template-full-width-page.php' ) ) ) { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="simple-grid-post-thumbnail-single-link"><?php the_post_thumbnail('simple-grid-1222w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'simple-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="simple-grid-post-thumbnail-single-link"><?php the_post_thumbnail('simple-grid-922w-autoh-image', array('class' => 'simple-grid-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                <?php } ?>
                </div>
    <?php   }
        }
    }
    ?>
<?php }

function simple_grid_media_content_page_location() {
    if( simple_grid_get_option('featured_media_under_page_title') ) {
        add_action('simple_grid_after_single_page_title', 'simple_grid_media_content_page', 10 );
    } else {
        add_action('simple_grid_before_single_page_title', 'simple_grid_media_content_page', 10 );
    }
}
add_action('template_redirect', 'simple_grid_media_content_page_location', 110 );