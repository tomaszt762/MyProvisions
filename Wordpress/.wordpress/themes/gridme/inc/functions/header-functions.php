<?php
/**
* Header Functions
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gridme_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'gridme_pingback_header' );

// Get custom-logo URL
function gridme_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $gridme_custom_logo_id = get_theme_mod( 'custom_logo' );
    $gridme_logo = wp_get_attachment_image_src( $gridme_custom_logo_id , 'full' );
    $gridme_logo_src = $gridme_logo[0];
    return apply_filters( 'gridme_custom_logo', $gridme_logo_src );
}

// Site Title
function gridme_site_title() {
    if ( is_front_page() && is_home() ) { ?>
            <h1 class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_home() ) { ?>
            <h1 class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_singular() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_category() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_tag() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_author() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_search() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_404() ) { ?>
            <p class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } else { ?>
            <h1 class="gridme-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(gridme_get_option('hide_tagline')) ) { ?><p class="gridme-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php }
}

function gridme_header_image_destination() {
    $url = home_url( '/' );
    if ( gridme_get_option('header_image_destination') ) {
        $url = gridme_get_option('header_image_destination');
    }
    return apply_filters( 'gridme_header_image_destination', $url );
}

function gridme_header_image_markup() {
    if ( get_header_image() ) {
        if ( gridme_get_option('remove_header_image_link') ) {
            the_header_image_tag( array( 'class' => 'gridme-header-img', 'alt' => '' ) );
        } else { ?>
            <a href="<?php echo esc_url( gridme_header_image_destination() ); ?>" rel="home" class="gridme-header-img-link"><?php the_header_image_tag( array( 'class' => 'gridme-header-img', 'alt' => '' ) ); ?></a>
        <?php }
    }
}

function gridme_header_image_details() {
    $header_image_custom_title = '';
    if ( gridme_get_option('header_image_custom_title') ) {
        $header_image_custom_title = gridme_get_option('header_image_custom_title');
    }

    $header_image_custom_description = '';
    if ( gridme_get_option('header_image_custom_description') ) {
        $header_image_custom_description = gridme_get_option('header_image_custom_description');
    }

    if ( !(gridme_get_option('hide_header_image_details')) ) {
    if ( gridme_get_option('header_image_custom_text') ) {
        if ( $header_image_custom_title || $header_image_custom_description ) { ?>
            <div class="gridme-header-image-info">
            <div class="gridme-header-image-info-inside">
                <?php if ( $header_image_custom_title ) { ?><p class="gridme-header-image-site-title gridme-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_title) ) ); ?></p><?php } ?>
                <?php if ( !(gridme_get_option('hide_header_image_description')) ) { ?><?php if ( $header_image_custom_description ) { ?><p class="gridme-header-image-site-description gridme-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_description) ) ); ?></p><?php } ?><?php } ?>
            </div>
            </div>
        <?php }
    } else { ?>
        <div class="gridme-header-image-info">
        <div class="gridme-header-image-info-inside">
            <p class="gridme-header-image-site-title gridme-header-image-block"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(gridme_get_option('hide_header_image_description')) ) { ?><p class="gridme-header-image-site-description gridme-header-image-block"><?php bloginfo( 'description' ); ?></p><?php } ?>
        </div>
        </div>
    <?php }
    }
}

function gridme_header_image_wrapper() { ?>
    <div class="gridme-header-image clearfix">
    <?php gridme_header_image_markup(); ?>
    <?php gridme_header_image_details(); ?>
    </div><?php
}

function gridme_header_image() {
    if ( gridme_get_option('hide_header_image') ) { return; }
    if ( get_header_image() ) {
        gridme_header_image_wrapper();
    }
}