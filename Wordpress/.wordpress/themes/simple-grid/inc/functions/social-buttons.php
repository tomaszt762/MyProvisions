<?php
/**
* Social buttons
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function simple_grid_header_social_buttons() { ?>

<div class='simple-grid-social-icons'>
    <?php if ( simple_grid_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('twitterlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-twitter" aria-label="<?php esc_attr_e('Twitter Button','simple-grid'); ?>"><i class="fab fa-twitter" aria-hidden="true" title="<?php esc_attr_e('Twitter','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('facebooklink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-facebook" aria-label="<?php esc_attr_e('Facebook Button','simple-grid'); ?>"><i class="fab fa-facebook-f" aria-hidden="true" title="<?php esc_attr_e('Facebook','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('googlelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-google-plus" aria-label="<?php esc_attr_e('Google Plus Button','simple-grid'); ?>"><i class="fab fa-google-plus-g" aria-hidden="true" title="<?php esc_attr_e('Google Plus','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('pinterestlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-pinterest" aria-label="<?php esc_attr_e('Pinterest Button','simple-grid'); ?>"><i class="fab fa-pinterest" aria-hidden="true" title="<?php esc_attr_e('Pinterest','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('linkedinlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-linkedin" aria-label="<?php esc_attr_e('Linkedin Button','simple-grid'); ?>"><i class="fab fa-linkedin-in" aria-hidden="true" title="<?php esc_attr_e('Linkedin','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('instagramlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-instagram" aria-label="<?php esc_attr_e('Instagram Button','simple-grid'); ?>"><i class="fab fa-instagram" aria-hidden="true" title="<?php esc_attr_e('Instagram','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('flickrlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-flickr" aria-label="<?php esc_attr_e('Flickr Button','simple-grid'); ?>"><i class="fab fa-flickr" aria-hidden="true" title="<?php esc_attr_e('Flickr','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('youtubelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-youtube" aria-label="<?php esc_attr_e('Youtube Button','simple-grid'); ?>"><i class="fab fa-youtube" aria-hidden="true" title="<?php esc_attr_e('Youtube','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('vimeolink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-vimeo" aria-label="<?php esc_attr_e('Vimeo Button','simple-grid'); ?>"><i class="fab fa-vimeo-v" aria-hidden="true" title="<?php esc_attr_e('Vimeo','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('soundcloudlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-soundcloud" aria-label="<?php esc_attr_e('SoundCloud Button','simple-grid'); ?>"><i class="fab fa-soundcloud" aria-hidden="true" title="<?php esc_attr_e('SoundCloud','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('messengerlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('messengerlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-messenger" aria-label="<?php esc_attr_e('Messenger Button','simple-grid'); ?>"><i class="fab fa-facebook-messenger" aria-hidden="true" title="<?php esc_attr_e('Messenger','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('lastfmlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-lastfm" aria-label="<?php esc_attr_e('Lastfm Button','simple-grid'); ?>"><i class="fab fa-lastfm" aria-hidden="true" title="<?php esc_attr_e('Lastfm','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('mediumlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('mediumlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-medium" aria-label="<?php esc_attr_e('Medium Button','simple-grid'); ?>"><i class="fab fa-medium-m" aria-hidden="true" title="<?php esc_attr_e('Medium','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('githublink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-github" aria-label="<?php esc_attr_e('Github Button','simple-grid'); ?>"><i class="fab fa-github" aria-hidden="true" title="<?php esc_attr_e('Github','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('bitbucketlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-bitbucket" aria-label="<?php esc_attr_e('Bitbucket Button','simple-grid'); ?>"><i class="fab fa-bitbucket" aria-hidden="true" title="<?php esc_attr_e('Bitbucket','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('tumblrlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-tumblr" aria-label="<?php esc_attr_e('Tumblr Button','simple-grid'); ?>"><i class="fab fa-tumblr" aria-hidden="true" title="<?php esc_attr_e('Tumblr','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('digglink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-digg" aria-label="<?php esc_attr_e('Digg Button','simple-grid'); ?>"><i class="fab fa-digg" aria-hidden="true" title="<?php esc_attr_e('Digg','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('deliciouslink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-delicious" aria-label="<?php esc_attr_e('Delicious Button','simple-grid'); ?>"><i class="fab fa-delicious" aria-hidden="true" title="<?php esc_attr_e('Delicious','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('stumblelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-stumbleupon" aria-label="<?php esc_attr_e('Stumbleupon Button','simple-grid'); ?>"><i class="fab fa-stumbleupon" aria-hidden="true" title="<?php esc_attr_e('Stumbleupon','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('mixlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('mixlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-mix" aria-label="<?php esc_attr_e('Mix Button','simple-grid'); ?>"><i class="fab fa-mix" aria-hidden="true" title="<?php esc_attr_e('Mix','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('redditlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-reddit" aria-label="<?php esc_attr_e('Reddit Button','simple-grid'); ?>"><i class="fab fa-reddit" aria-hidden="true" title="<?php esc_attr_e('Reddit','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('dribbblelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-dribbble" aria-label="<?php esc_attr_e('Dribbble Button','simple-grid'); ?>"><i class="fab fa-dribbble" aria-hidden="true" title="<?php esc_attr_e('Dribbble','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('flipboardlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('flipboardlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-flipboard" aria-label="<?php esc_attr_e('Flipboard Button','simple-grid'); ?>"><i class="fab fa-flipboard" aria-hidden="true" title="<?php esc_attr_e('Flipboard','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('bloggerlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('bloggerlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-blogger" aria-label="<?php esc_attr_e('Blogger Button','simple-grid'); ?>"><i class="fab fa-blogger" aria-hidden="true" title="<?php esc_attr_e('Blogger','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('etsylink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('etsylink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-etsy" aria-label="<?php esc_attr_e('Etsy Button','simple-grid'); ?>"><i class="fab fa-etsy" aria-hidden="true" title="<?php esc_attr_e('Etsy','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('behancelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-behance" aria-label="<?php esc_attr_e('Behance Button','simple-grid'); ?>"><i class="fab fa-behance" aria-hidden="true" title="<?php esc_attr_e('Behance','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('amazonlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('amazonlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-amazon" aria-label="<?php esc_attr_e('Amazon Button','simple-grid'); ?>"><i class="fab fa-amazon" aria-hidden="true" title="<?php esc_attr_e('Amazon','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('meetuplink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('meetuplink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-meetup" aria-label="<?php esc_attr_e('Meetup Button','simple-grid'); ?>"><i class="fab fa-meetup" aria-hidden="true" title="<?php esc_attr_e('Meetup','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('mixcloudlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('mixcloudlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-mixcloud" aria-label="<?php esc_attr_e('Mixcloud Button','simple-grid'); ?>"><i class="fab fa-mixcloud" aria-hidden="true" title="<?php esc_attr_e('Mixcloud','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('slacklink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('slacklink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-slack" aria-label="<?php esc_attr_e('Slack Button','simple-grid'); ?>"><i class="fab fa-slack" aria-hidden="true" title="<?php esc_attr_e('Slack','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('snapchatlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('snapchatlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-snapchat" aria-label="<?php esc_attr_e('Snapchat Button','simple-grid'); ?>"><i class="fab fa-snapchat" aria-hidden="true" title="<?php esc_attr_e('Snapchat','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('spotifylink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('spotifylink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-spotify" aria-label="<?php esc_attr_e('Spotify Button','simple-grid'); ?>"><i class="fab fa-spotify" aria-hidden="true" title="<?php esc_attr_e('Spotify','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('yelplink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('yelplink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-yelp" aria-label="<?php esc_attr_e('Yelp Button','simple-grid'); ?>"><i class="fab fa-yelp" aria-hidden="true" title="<?php esc_attr_e('Yelp','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('wordpresslink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('wordpresslink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-wordpress" aria-label="<?php esc_attr_e('WordPress Button','simple-grid'); ?>"><i class="fab fa-wordpress" aria-hidden="true" title="<?php esc_attr_e('WordPress','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('twitchlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('twitchlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-twitch" aria-label="<?php esc_attr_e('Twitch Button','simple-grid'); ?>"><i class="fab fa-twitch" aria-hidden="true" title="<?php esc_attr_e('Twitch','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('telegramlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('telegramlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-telegram" aria-label="<?php esc_attr_e('Telegram Button','simple-grid'); ?>"><i class="fab fa-telegram" aria-hidden="true" title="<?php esc_attr_e('Telegram','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('bandcamplink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('bandcamplink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-bandcamp" aria-label="<?php esc_attr_e('Bandcamp Button','simple-grid'); ?>"><i class="fab fa-bandcamp" aria-hidden="true" title="<?php esc_attr_e('Bandcamp','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('quoralink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('quoralink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-quora" aria-label="<?php esc_attr_e('Quora Button','simple-grid'); ?>"><i class="fab fa-quora" aria-hidden="true" title="<?php esc_attr_e('Quora','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('foursquarelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('foursquarelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-foursquare" aria-label="<?php esc_attr_e('Foursquare Button','simple-grid'); ?>"><i class="fab fa-foursquare" aria-hidden="true" title="<?php esc_attr_e('Foursquare','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('deviantartlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('deviantartlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-deviantart" aria-label="<?php esc_attr_e('DeviantArt Button','simple-grid'); ?>"><i class="fab fa-deviantart" aria-hidden="true" title="<?php esc_attr_e('DeviantArt','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('imdblink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('imdblink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-imdb" aria-label="<?php esc_attr_e('IMDB Button','simple-grid'); ?>"><i class="fab fa-imdb" aria-hidden="true" title="<?php esc_attr_e('IMDB','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('vklink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('vklink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-vk" aria-label="<?php esc_attr_e('VK Button','simple-grid'); ?>"><i class="fab fa-vk" aria-hidden="true" title="<?php esc_attr_e('VK','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('codepenlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-codepen" aria-label="<?php esc_attr_e('Codepen Button','simple-grid'); ?>"><i class="fab fa-codepen" aria-hidden="true" title="<?php esc_attr_e('Codepen','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('jsfiddlelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-jsfiddle" aria-label="<?php esc_attr_e('JSFiddle Button','simple-grid'); ?>"><i class="fab fa-jsfiddle" aria-hidden="true" title="<?php esc_attr_e('JSFiddle','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('stackoverflowlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-stackoverflow" aria-label="<?php esc_attr_e('Stack Overflow Button','simple-grid'); ?>"><i class="fab fa-stack-overflow" aria-hidden="true" title="<?php esc_attr_e('Stack Overflow','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('stackexchangelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-stackexchange" aria-label="<?php esc_attr_e('Stack Exchange Button','simple-grid'); ?>"><i class="fab fa-stack-exchange" aria-hidden="true" title="<?php esc_attr_e('Stack Exchange','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('bsalink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-buysellads" aria-label="<?php esc_attr_e('BuySellAds Button','simple-grid'); ?>"><i class="fab fa-buysellads" aria-hidden="true" title="<?php esc_attr_e('BuySellAds','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('web500pxlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('web500pxlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-web500px" aria-label="<?php esc_attr_e('500px Button','simple-grid'); ?>"><i class="fab fa-500px" aria-hidden="true" title="<?php esc_attr_e('500px','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('ellolink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('ellolink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-ello" aria-label="<?php esc_attr_e('Ello Button','simple-grid'); ?>"><i class="fab fa-ello" aria-hidden="true" title="<?php esc_attr_e('Ello','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('goodreadslink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('goodreadslink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-goodreads" aria-label="<?php esc_attr_e('Goodreads Button','simple-grid'); ?>"><i class="fab fa-goodreads" aria-hidden="true" title="<?php esc_attr_e('Goodreads','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('odnoklassnikilink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('odnoklassnikilink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-odnoklassniki" aria-label="<?php esc_attr_e('Odnoklassniki Button','simple-grid'); ?>"><i class="fab fa-odnoklassniki" aria-hidden="true" title="<?php esc_attr_e('Odnoklassniki','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('houzzlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('houzzlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-houzz" aria-label="<?php esc_attr_e('Houzz Button','simple-grid'); ?>"><i class="fab fa-houzz" aria-hidden="true" title="<?php esc_attr_e('Houzz','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('pocketlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('pocketlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-pocket" aria-label="<?php esc_attr_e('Pocket Button','simple-grid'); ?>"><i class="fab fa-get-pocket" aria-hidden="true" title="<?php esc_attr_e('Pocket','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('xinglink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('xinglink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-xing" aria-label="<?php esc_attr_e('XING Button','simple-grid'); ?>"><i class="fab fa-xing" aria-hidden="true" title="<?php esc_attr_e('XING','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('googleplaylink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('googleplaylink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-googleplay" aria-label="<?php esc_attr_e('Google Play Button','simple-grid'); ?>"><i class="fab fa-google-play" aria-hidden="true" title="<?php esc_attr_e('Google Play','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('slidesharelink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-slideshare" aria-label="<?php esc_attr_e('SlideShare Button','simple-grid'); ?>"><i class="fab fa-slideshare" aria-hidden="true" title="<?php esc_attr_e('SlideShare','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('dropboxlink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('dropboxlink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-dropbox" aria-label="<?php esc_attr_e('Dropbox Button','simple-grid'); ?>"><i class="fab fa-dropbox" aria-hidden="true" title="<?php esc_attr_e('Dropbox','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('paypallink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('paypallink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-paypal" aria-label="<?php esc_attr_e('PayPal Button','simple-grid'); ?>"><i class="fab fa-paypal" aria-hidden="true" title="<?php esc_attr_e('PayPal','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('viadeolink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('viadeolink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-viadeo" aria-label="<?php esc_attr_e('Viadeo Button','simple-grid'); ?>"><i class="fab fa-viadeo" aria-hidden="true" title="<?php esc_attr_e('Viadeo','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('wikipedialink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('wikipedialink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-wikipedia" aria-label="<?php esc_attr_e('Wikipedia Button','simple-grid'); ?>"><i class="fab fa-wikipedia-w" aria-hidden="true" title="<?php esc_attr_e('Wikipedia','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( simple_grid_get_option('skypeusername') ); ?>?chat" class="simple-grid-social-icon-skype" aria-label="<?php esc_attr_e('Skype Button','simple-grid'); ?>"><i class="fab fa-skype" aria-hidden="true" title="<?php esc_attr_e('Skype','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( simple_grid_get_option('emailaddress') ); ?>" class="simple-grid-social-icon-email" aria-label="<?php esc_attr_e('Email Us Button','simple-grid'); ?>"><i class="far fa-envelope" aria-hidden="true" title="<?php esc_attr_e('Email Us','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( simple_grid_get_option('rsslink') ); ?>" target="_blank" rel="nofollow" class="simple-grid-social-icon-rss" aria-label="<?php esc_attr_e('RSS Button','simple-grid'); ?>"><i class="fas fa-rss" aria-hidden="true" title="<?php esc_attr_e('RSS','simple-grid'); ?>"></i></a><?php endif; ?>
    <?php if ( simple_grid_get_option('show_login_button') ) { ?><?php if (is_user_logged_in()) : ?><a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" class="simple-grid-social-icon-login" aria-label="<?php esc_attr_e( 'Logout Button', 'simple-grid' ); ?>"><i class="fas fa-sign-out-alt" aria-hidden="true" title="<?php esc_attr_e( 'Logout Button', 'simple-grid' ); ?>"></i></a><?php else : ?><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" class="simple-grid-social-icon-login" aria-label="<?php esc_attr_e( 'Login / Register', 'simple-grid' ); ?>"><i class="fas fa-sign-in-alt" aria-hidden="true" title="<?php esc_attr_e( 'Login / Register Button', 'simple-grid' ); ?>"></i></a><?php endif;?><?php } ?>
    <?php if ( !(simple_grid_get_option('hide_search_button')) ) { ?><a href="<?php echo esc_url( '#' ); ?>" class="simple-grid-social-icon-search" aria-label="<?php esc_attr_e('Search Button','simple-grid'); ?>"><i class="fas fa-search" aria-hidden="true" title="<?php esc_attr_e('Search','simple-grid'); ?>"></i></a><?php } ?>
</div>

<?php }