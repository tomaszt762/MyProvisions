<?php
/**
* Social profiles options
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_social_profiles($wp_customize) {

    $wp_customize->add_section( 'simple_grid_section_social', array( 'title' => esc_html__( 'Social Links Options', 'simple-grid' ), 'panel' => 'simple_grid_main_options_panel', 'priority' => 240, ));

    $wp_customize->add_setting( 'simple_grid_options[social_buttons_location]', array( 'default' => 'secondary-menu', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_social_buttons_location' ) );

    $wp_customize->add_control( 'simple_social_buttons_location_control', array( 'label' => esc_html__( 'Social + Search + Random + Login/Logout Buttons Location', 'simple-grid' ), 'description' => esc_html__('Select where you want to display social buttons.', 'simple-grid'), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[social_buttons_location]', 'type' => 'select', 'choices' => array( 'primary-menu' => esc_html__( 'Primary Menu', 'simple-grid' ), 'secondary-menu' => esc_html__( 'Secondary Menu', 'simple-grid' ) ) ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_social_buttons_control', array( 'label' => esc_html__( 'Hide Social + Search + Random + Login/Logout Buttons', 'simple-grid' ), 'description' => esc_html__('If you checked this option, there is no any effect from these option: "Hide Search Button", "Show Login/Logout Button", "Show Random Post Button".', 'simple-grid'), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[hide_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[hide_search_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_hide_search_button_control', array( 'label' => esc_html__( 'Hide Search Button', 'simple-grid' ), 'description' => esc_html__('This option has no effect if you checked the option: "Hide Social + Search + Random + Login/Logout Buttons"', 'simple-grid'), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[hide_search_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[show_login_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'simple_grid_show_login_button_control', array( 'label' => esc_html__( 'Show Login/Logout Button', 'simple-grid' ), 'description' => esc_html__('This option has no effect if you checked the option: "Hide Social + Search + Random + Login/Logout Buttons"', 'simple-grid'), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[show_login_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'simple_grid_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'simple_grid_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'simple_grid_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_vklink_control', array( 'label' => esc_html__( 'VK Link', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[messengerlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_messengerlink_control', array( 'label' => esc_html__( 'Messenger URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[messengerlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[mediumlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_mediumlink_control', array( 'label' => esc_html__( 'Medium URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[mediumlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_githublink_control', array( 'label' => esc_html__( 'Github URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[mixlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_mixlink_control', array( 'label' => esc_html__( 'Mix URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[mixlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_redditlink_control', array( 'label' => esc_html__( 'Reddit URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[flipboardlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_flipboardlink_control', array( 'label' => esc_html__( 'Flipboard URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[flipboardlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[bloggerlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_bloggerlink_control', array( 'label' => esc_html__( 'Blogger URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[bloggerlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[etsylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_etsylink_control', array( 'label' => esc_html__( 'Etsy URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[etsylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_behancelink_control', array( 'label' => esc_html__( 'Behance URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[amazonlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_amazonlink_control', array( 'label' => esc_html__( 'Amazon URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[amazonlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[meetuplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_meetuplink_control', array( 'label' => esc_html__( 'Meetup URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[meetuplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[mixcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_mixcloudlink_control', array( 'label' => esc_html__( 'Mixcloud URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[mixcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[slacklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_slacklink_control', array( 'label' => esc_html__( 'Slack URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[slacklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[snapchatlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_snapchatlink_control', array( 'label' => esc_html__( 'Snapchat URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[snapchatlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[spotifylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_spotifylink_control', array( 'label' => esc_html__( 'Spotify URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[spotifylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[yelplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_yelplink_control', array( 'label' => esc_html__( 'Yelp URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[yelplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[wordpresslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_wordpresslink_control', array( 'label' => esc_html__( 'WordPress URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[wordpresslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[twitchlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_twitchlink_control', array( 'label' => esc_html__( 'Twitch URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[twitchlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[telegramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_telegramlink_control', array( 'label' => esc_html__( 'Telegram URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[telegramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[bandcamplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_bandcamplink_control', array( 'label' => esc_html__( 'Bandcamp URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[bandcamplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[quoralink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_quoralink_control', array( 'label' => esc_html__( 'Quora URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[quoralink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[foursquarelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_foursquarelink_control', array( 'label' => esc_html__( 'Foursquare URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[foursquarelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[deviantartlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_deviantartlink_control', array( 'label' => esc_html__( 'DeviantArt URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[deviantartlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[imdblink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_imdblink_control', array( 'label' => esc_html__( 'IMDB URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[imdblink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_codepenlink_control', array( 'label' => esc_html__( 'Codepen URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_bsalink_control', array( 'label' => esc_html__( 'BuySellAds URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[web500pxlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_web500pxlink_control', array( 'label' => esc_html__( '500px URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[web500pxlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[ellolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_ellolink_control', array( 'label' => esc_html__( 'Ello URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[ellolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[goodreadslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_goodreadslink_control', array( 'label' => esc_html__( 'Goodreads URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[goodreadslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[odnoklassnikilink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_odnoklassnikilink_control', array( 'label' => esc_html__( 'Odnoklassniki URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[odnoklassnikilink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[houzzlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_houzzlink_control', array( 'label' => esc_html__( 'Houzz URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[houzzlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[pocketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_pocketlink_control', array( 'label' => esc_html__( 'Pocket URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[pocketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[xinglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_xinglink_control', array( 'label' => esc_html__( 'XING URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[xinglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[googleplaylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_googleplaylink_control', array( 'label' => esc_html__( 'Google Play URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[googleplaylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[dropboxlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_dropboxlink_control', array( 'label' => esc_html__( 'Dropbox URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[dropboxlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[paypallink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_paypallink_control', array( 'label' => esc_html__( 'PayPal URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[paypallink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[viadeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_viadeolink_control', array( 'label' => esc_html__( 'Viadeo URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[viadeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[wikipedialink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_wikipedialink_control', array( 'label' => esc_html__( 'Wikipedia URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[wikipedialink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'simple_grid_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'simple_grid_sanitize_email' ) );

    $wp_customize->add_control( 'simple_grid_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'simple_grid_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'simple_grid_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'simple-grid' ), 'section' => 'simple_grid_section_social', 'settings' => 'simple_grid_options[rsslink]', 'type' => 'text' ) );

}