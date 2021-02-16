<?php
/**
* Social profiles options
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function gridme_social_profiles($wp_customize) {

    $wp_customize->add_section( 'gridme_section_social', array( 'title' => esc_html__( 'Social Links Options', 'gridme' ), 'panel' => 'gridme_main_options_panel', 'priority' => 240, ));

    $wp_customize->add_setting( 'gridme_options[hide_footer_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_hide_footer_social_buttons_control', array( 'label' => esc_html__( 'Hide Footer Social + Random + Login/Logout Buttons', 'gridme' ), 'description' => esc_html__('If you checked this option, all buttons will disappear from footer. There is no any effect from these option: "Show Login/Logout Button in Footer", "Show Random Post Button in Footer".', 'gridme'), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[hide_footer_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[show_footer_login_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_checkbox', ) );

    $wp_customize->add_control( 'gridme_show_footer_login_button_control', array( 'label' => esc_html__( 'Show Login/Logout Button in Footer', 'gridme' ), 'description' => esc_html__('This option has no effect if you checked the option: "Hide Footer Social + Random + Login/Logout Buttons"', 'gridme'), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[show_footer_login_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'gridme_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'gridme_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'gridme_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_vklink_control', array( 'label' => esc_html__( 'VK Link', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[messengerlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_messengerlink_control', array( 'label' => esc_html__( 'Messenger URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[messengerlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[mediumlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_mediumlink_control', array( 'label' => esc_html__( 'Medium URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[mediumlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_githublink_control', array( 'label' => esc_html__( 'Github URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[mixlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_mixlink_control', array( 'label' => esc_html__( 'Mix URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[mixlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_redditlink_control', array( 'label' => esc_html__( 'Reddit URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[flipboardlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_flipboardlink_control', array( 'label' => esc_html__( 'Flipboard URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[flipboardlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[bloggerlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_bloggerlink_control', array( 'label' => esc_html__( 'Blogger URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[bloggerlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[etsylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_etsylink_control', array( 'label' => esc_html__( 'Etsy URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[etsylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_behancelink_control', array( 'label' => esc_html__( 'Behance URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[amazonlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_amazonlink_control', array( 'label' => esc_html__( 'Amazon URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[amazonlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[meetuplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_meetuplink_control', array( 'label' => esc_html__( 'Meetup URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[meetuplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[mixcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_mixcloudlink_control', array( 'label' => esc_html__( 'Mixcloud URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[mixcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[slacklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_slacklink_control', array( 'label' => esc_html__( 'Slack URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[slacklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[snapchatlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_snapchatlink_control', array( 'label' => esc_html__( 'Snapchat URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[snapchatlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[spotifylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_spotifylink_control', array( 'label' => esc_html__( 'Spotify URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[spotifylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[yelplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_yelplink_control', array( 'label' => esc_html__( 'Yelp URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[yelplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[wordpresslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_wordpresslink_control', array( 'label' => esc_html__( 'WordPress URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[wordpresslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[twitchlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_twitchlink_control', array( 'label' => esc_html__( 'Twitch URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[twitchlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[telegramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_telegramlink_control', array( 'label' => esc_html__( 'Telegram URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[telegramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[bandcamplink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_bandcamplink_control', array( 'label' => esc_html__( 'Bandcamp URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[bandcamplink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[quoralink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_quoralink_control', array( 'label' => esc_html__( 'Quora URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[quoralink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[foursquarelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_foursquarelink_control', array( 'label' => esc_html__( 'Foursquare URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[foursquarelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[deviantartlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_deviantartlink_control', array( 'label' => esc_html__( 'DeviantArt URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[deviantartlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[imdblink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_imdblink_control', array( 'label' => esc_html__( 'IMDB URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[imdblink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_codepenlink_control', array( 'label' => esc_html__( 'Codepen URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_bsalink_control', array( 'label' => esc_html__( 'BuySellAds URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[web500pxlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_web500pxlink_control', array( 'label' => esc_html__( '500px URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[web500pxlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[ellolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_ellolink_control', array( 'label' => esc_html__( 'Ello URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[ellolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[goodreadslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_goodreadslink_control', array( 'label' => esc_html__( 'Goodreads URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[goodreadslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[odnoklassnikilink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_odnoklassnikilink_control', array( 'label' => esc_html__( 'Odnoklassniki URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[odnoklassnikilink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[houzzlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_houzzlink_control', array( 'label' => esc_html__( 'Houzz URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[houzzlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[pocketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_pocketlink_control', array( 'label' => esc_html__( 'Pocket URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[pocketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[xinglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_xinglink_control', array( 'label' => esc_html__( 'XING URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[xinglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[googleplaylink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_googleplaylink_control', array( 'label' => esc_html__( 'Google Play URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[googleplaylink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[dropboxlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_dropboxlink_control', array( 'label' => esc_html__( 'Dropbox URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[dropboxlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[paypallink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_paypallink_control', array( 'label' => esc_html__( 'PayPal URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[paypallink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[viadeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_viadeolink_control', array( 'label' => esc_html__( 'Viadeo URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[viadeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[wikipedialink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_wikipedialink_control', array( 'label' => esc_html__( 'Wikipedia URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[wikipedialink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'gridme_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'gridme_sanitize_email' ) );

    $wp_customize->add_control( 'gridme_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'gridme_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'gridme_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'gridme' ), 'section' => 'gridme_section_social', 'settings' => 'gridme_options[rsslink]', 'type' => 'text' ) );

}