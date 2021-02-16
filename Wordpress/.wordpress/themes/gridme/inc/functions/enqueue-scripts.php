<?php
/**
* Enqueue scripts and styles
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_scripts() {
    wp_enqueue_style('gridme-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), NULL );
    wp_enqueue_style('gridme-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700|Patua+One&amp;display=swap', array(), NULL);
    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);

    $gridme_primary_mobile_menu_active = TRUE;
    $gridme_secondary_mobile_menu_active = TRUE;

    $gridme_primary_menu_active = FALSE;
    if ( gridme_is_primary_menu_active() ) {
        $gridme_primary_menu_active = TRUE;
    }
    $gridme_secondary_menu_active = FALSE;
    if ( gridme_is_secondary_menu_active() ) {
        $gridme_secondary_menu_active = TRUE;
    }

    $gridme_sticky_header_active = TRUE;
    $gridme_sticky_header_mobile_active = FALSE;

    $gridme_sticky_sidebar_active = TRUE;
    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $gridme_sticky_sidebar_active = FALSE;
    }
    if ( is_404() ) {
        $gridme_sticky_sidebar_active = FALSE;
    }
    if ( $gridme_sticky_sidebar_active ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    $gridme_columnwidth = '.'.gridme_post_grid_cols().'-sizer';
    $gridme_gutter = '.'.gridme_post_grid_cols().'-gutter';

    wp_enqueue_script('gridme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('gridme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('gridme-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery', 'imagesloaded' ), NULL, true);

    wp_localize_script( 'gridme-customjs', 'gridme_ajax_object',
        array(
            'ajaxurl' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
            'primary_menu_active' => $gridme_primary_menu_active,
            'secondary_menu_active' => $gridme_secondary_menu_active,
            'primary_mobile_menu_active' => $gridme_primary_mobile_menu_active,
            'secondary_mobile_menu_active' => $gridme_secondary_mobile_menu_active,
            'sticky_header_active' => $gridme_sticky_header_active,
            'sticky_header_mobile_active' => $gridme_sticky_header_mobile_active,
            'sticky_sidebar_active' => $gridme_sticky_sidebar_active,
            'columnwidth' => $gridme_columnwidth,
            'gutter' => $gridme_gutter,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script('gridme-html5shiv-js', get_template_directory_uri() .'/assets/js/html5shiv.js', array('jquery'), NULL, true);

    wp_localize_script('gridme-html5shiv-js','gridme_custom_script_vars',array(
        'elements_name' => esc_html__('abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video', 'gridme'),
    ));
}
add_action( 'wp_enqueue_scripts', 'gridme_scripts' );

/**
 * Enqueue IE compatible scripts and styles.
 */
function gridme_ie_scripts() {
    wp_enqueue_script( 'respond', get_template_directory_uri(). '/assets/js/respond.min.js', array(), NULL, false );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'gridme_ie_scripts' );

/**
 * Enqueue customizer styles.
 */
function gridme_enqueue_customizer_styles() {
    wp_enqueue_style( 'gridme-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'gridme_enqueue_customizer_styles' );