<?php
/**
* Header Functions
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function simple_grid_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'simple_grid_pingback_header' );

// Get custom-logo URL
function simple_grid_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $simple_grid_custom_logo_id = get_theme_mod( 'custom_logo' );
    $simple_grid_logo = wp_get_attachment_image_src( $simple_grid_custom_logo_id , 'full' );
    $simple_grid_logo_src = $simple_grid_logo[0];
    return apply_filters( 'simple_grid_custom_logo', $simple_grid_logo_src );
}

// Site Title
function simple_grid_site_title() {
    if ( is_front_page() && is_home() ) { ?>
            <h1 class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_home() ) { ?>
            <h1 class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_singular() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_category() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_tag() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_author() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_search() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } elseif ( is_404() ) { ?>
            <p class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php } else { ?>
            <h1 class="simple-grid-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(simple_grid_get_option('hide_tagline')) ) { ?><p class="simple-grid-site-description"><?php bloginfo( 'description' ); ?></p><?php } ?>
    <?php }
}

function simple_grid_header_image_destination() {
    $url = home_url( '/' );
    if ( simple_grid_get_option('header_image_destination') ) {
        $url = simple_grid_get_option('header_image_destination');
    }
    return apply_filters( 'simple_grid_header_image_destination', $url );
}

function simple_grid_header_image_markup() {
    if ( get_header_image() ) {
        if ( simple_grid_get_option('remove_header_image_link') ) {
            the_header_image_tag( array( 'class' => 'simple-grid-header-img', 'alt' => '' ) );
        } else { ?>
            <a href="<?php echo esc_url( simple_grid_header_image_destination() ); ?>" rel="home" class="simple-grid-header-img-link"><?php the_header_image_tag( array( 'class' => 'simple-grid-header-img', 'alt' => '' ) ); ?></a>
        <?php }
    }
}

function simple_grid_header_image_details() {
    $header_image_custom_title = '';
    if ( simple_grid_get_option('header_image_custom_title') ) {
        $header_image_custom_title = simple_grid_get_option('header_image_custom_title');
    }

    if ( simple_grid_get_option('header_image_custom_description') ) {
        $header_image_custom_description = simple_grid_get_option('header_image_custom_description');
    }

    if ( !(simple_grid_get_option('hide_header_image_details')) ) {
    if ( simple_grid_get_option('header_image_custom_text') ) {
        if ( $header_image_custom_title || $header_image_custom_description ) { ?>
            <div class="simple-grid-header-image-info">
            <div class="simple-grid-header-image-info-inside">
                <?php if ( $header_image_custom_title ) { ?><p class="simple-grid-header-image-site-title simple-grid-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_title) ) ); ?></p><?php } ?>
                <?php if ( !(simple_grid_get_option('hide_header_image_description')) ) { ?><?php if ( $header_image_custom_description ) { ?><p class="simple-grid-header-image-site-description simple-grid-header-image-block"><?php echo wp_kses_post( force_balance_tags( do_shortcode($header_image_custom_description) ) ); ?></p><?php } ?><?php } ?>
            </div>
            </div>
        <?php }
    } else { ?>
        <div class="simple-grid-header-image-info">
        <div class="simple-grid-header-image-info-inside">
            <p class="simple-grid-header-image-site-title simple-grid-header-image-block"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(simple_grid_get_option('hide_header_image_description')) ) { ?><p class="simple-grid-header-image-site-description simple-grid-header-image-block"><?php bloginfo( 'description' ); ?></p><?php } ?>
        </div>
        </div>
    <?php }
    }
}

function simple_grid_header_image_wrapper() { ?>
    <div class="simple-grid-header-image clearfix">
    <?php simple_grid_header_image_markup(); ?>
    <?php simple_grid_header_image_details(); ?>
    </div>
    <?php
}

function simple_grid_header_image() {
    if ( simple_grid_get_option('hide_header_image') ) { return; }
    if ( get_header_image() ) {
        simple_grid_header_image_wrapper();
    }
}