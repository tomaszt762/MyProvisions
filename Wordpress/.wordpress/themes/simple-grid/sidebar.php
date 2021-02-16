<?php
/**
* The file for displaying the sidebars.
*
* @package Simple Grid WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php if ( is_singular() ) { ?>

<?php if(!is_page_template(array( 'template-full-width-page.php', 'template-full-width-post.php' ))) { ?>
<div class="simple-grid-sidebar-one-wrapper simple-grid-sidebar-widget-areas clearfix" id="simple-grid-sidebar-one-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">
<div class="simple-grid-sidebar-one-wrapper-inside clearfix">

<?php simple_grid_sidebar_one(); ?>

</div>
</div>
</div><!-- /#simple-grid-sidebar-one-wrapper-->
<?php } ?>

<?php } ?>