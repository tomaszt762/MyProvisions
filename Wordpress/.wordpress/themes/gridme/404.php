<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package GridMe WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='gridme-main-wrapper clearfix' id='gridme-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>
<div class="gridme-main-wrapper-inside clearfix">

<div class='gridme-posts-wrapper' id='gridme-posts-wrapper'>

<div class='gridme-posts gridme-box'>
<div class="gridme-box-inside">

<div class="gridme-page-header-outside">
<header class="gridme-page-header">
<div class="gridme-page-header-inside">
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'gridme' ); ?></h1>
</div>
</header><!-- .gridme-page-header -->
</div>

<div class='gridme-posts-content'>

    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gridme' ); ?></p>

    <?php get_search_form(); ?>

</div>

</div>
</div>

</div><!--/#gridme-posts-wrapper -->

</div>
</div>
</div><!-- /#gridme-main-wrapper -->

<?php get_footer(); ?>