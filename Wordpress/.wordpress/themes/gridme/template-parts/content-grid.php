<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php $gridme_grid_post_content = get_the_content(); ?>
<div id="post-<?php the_ID(); ?>" class="gridme-grid-post <?php echo esc_attr( gridme_post_grid_cols() ); ?>">
<div class="gridme-grid-post-inside">

    <?php gridme_media_content_grid(); ?>

    <?php if ( !(gridme_get_option('hide_post_title_home')) || !(gridme_get_option('hide_post_snippet')) ) { ?>

    <div class="gridme-grid-post-details gridme-grid-post-block">
    <?php if ( !(gridme_get_option('hide_post_title_home')) ) { ?><?php the_title( sprintf( '<h3 class="gridme-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?><?php } ?>

    <?php if ( !(gridme_get_option('hide_post_snippet')) ) { ?><?php if ( !empty( $gridme_grid_post_content ) ) { ?><div class="gridme-grid-post-snippet"><div class="gridme-grid-post-snippet-inside"><?php the_excerpt(); ?></div></div><?php } ?><?php } ?>
    </div>

    <?php } ?>

    <?php gridme_grid_postmeta(); ?>

</div>
</div>