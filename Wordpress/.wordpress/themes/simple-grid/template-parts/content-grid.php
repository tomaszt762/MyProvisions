<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="simple-grid-post-<?php the_ID(); ?>" class="simple-grid-grid-post simple-grid-5-col simple-grid-360w-360h-grid-thumbnail">
<div class="simple-grid-grid-post-inside">

    <?php simple_grid_media_content_grid(); ?>

</div>
</div>