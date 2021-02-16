===  REST API Custom Fields ===
Contributors: integromat
Tags: rest, api, rest api, endpoint, endpoints, meta, data, meta_data, integromat
Requires at least: 5.0
Tested up to: 5.5
Requires PHP: 5.6
Stable tag: 1.3
License: GPLv2 or later

This plugin enhances Wordpress REST API v2 responses about metadata

== Description ==
This plugin enhances Wordpress REST API v2 responses about metadata.

== Installation ==
1. Upload "rest-api-custom-fields" folder to the "/wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. New item "REST API Custom Fields" appears in the admin menu (under the Settings menu). There you can select which metadata you want to contain in the REST API response.

== Changelog ==

= 1.3 =
* It is now possible to expose custom fields of custom post types

= 1.2 =
* Exposed values can now contain arrays
* Attributes representing custom fields moved directly under the top-level node in the response

= 1.1 =
* Fixed db prefix

= 1.0 =
* Init version

== Screenshots ==
1. Settings pane