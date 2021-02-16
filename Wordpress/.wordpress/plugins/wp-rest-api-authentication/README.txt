=== WordPress REST API Authentication ===
Contributors: cyberlord92
Tags: authentication, rest api, rest, oauth, jwt
Requires at least: 3.0.1
Tested up to: 5.5
Stable tag: 1.3.9
License: MIT/Expat
License URI: https://docs.miniorange.com/mit-license

WordPress REST API Authentication secures rest API access for unauthorized users using OAuth 2.0, Basic Auth, jwt, API Key methods. Also reduces potential attack factors to the respective site. 

== Description ==

Wordpress REST API Authentication plugin secures the unauthorized access to your WordPress site using different authentication credentials verification. This plugin doesn't requires much configuration.

There are multiple ways to secure a REST APIs e.g. basic auth, OAuth, JWT etc. but one thing is sure that RESTful APIs should be stateless – so request authentication/authorization should not depend on cookies or sessions. Instead, each API request should come with some sort authentication credentials which must be validated on the server for each and every request.

REST API Authentication Methods:
*	Basic Authentication 
	1. Using Username & Password
	2. Using Client-ID & Client-Secret
*	API Key Authentication (Authentication with Randomly Generated Key )
*	JWT Authentication / JSON Web Tokens Authentication
*	OAuth 2.0 Authentication
	1. Client Credentials
	2. Password grant
*	API Authentication for Third Party Provider( using Introspection Endpoint / User Info Endpoint )

FEATURES:
*  Supports Basic Auth (Basic Authentication), API Key, OAuth 2.0, JWT Authentication methods
*  Validates Signature for json web tokens (jwt)
*  Allows to access all type of posts/pages based on User's WordPress Role & Capability   
*  Allows to  Authenticate your WordPress site / REST API with token (access token / jwt token) provided by your OAuth Provider ( Third Party Provider )
*  Supports WooCommerce API Authentication


== Installation ==

This section describes how to install the WordPress REST API Authentication and get it working.

= From your WordPress dashboard =
1. Visit `Plugins > Add New`
2. Search for `REST API Authentication`. Find and Install `api authentication` plugin by miniOrange
3. Activate the plugin

= From WordPress.org =
1. Download WordPress REST API Authentication.
2. Unzip and upload the `wp-rest-api-authentication` directory to your `/wp-content/plugins/` directory.
3. Activate WordPress REST API Authentication from your Plugins page.


== Privacy ==

This plugin does not store any user data. 

== Frequently Asked Questions ==

= What is the use of API Authentication =

    The REST API authentication prevents the unauthorized access to your WordPress API's.
    It reduces potential attack factors


= How does this plugin work? =

	You just have to select your Authentication Method.
	Based on the method you have selected you will get the authorization code/token after sending the token request.
	Access your REST API with code/token you received in previous step. 

= How to access draft posts? =
	You can access draft posts using Basic Auth, OAuth 2.0(using Username:Password) methods. Pages/posts are need to access with the status. Default status used in request is 'Publish' and any user can access Published post. 
	To access the pages/posts stored in draft, you need to append the ?status=draft to the page/post request.
	For Example:
	You need to use below URL format while sending request to access different type of posts
	1. Access draft posts only
		https://localhost:8080/wp-json/wp/v2/posts?status=draft
	2. Access all type of posts
		https://localhost:8080/wp-json/wp/v2/posts?status=any
	You just have to change the status(draft, pending, any, publish) as per your requirement. You do not have to pass status parameter to access Published posts.

=  I am not able to access some APIs? =
    The below list of WP REST APIs are protected and allowed for authorized access in free plugin:
    1. /wp/v2/posts
    2. /wp/v2/comments
    3. /wp/v2/media
    We have allowed authorized access to other WP REST APIs in premium versions.

== Screenshots ==

1. List of API Authentication Methods
2. List of Protected WP REST APIs
3. Advanced Settings
4. Custom API Integration

== Changelog ==

= 1.3.9 =
* Minor Bugfix

= 1.3.8 =
* Added compatibility for WP 5.5

= 1.3.7 =
* Bundle plan release
* Minor Bugfix

= 1.3.6 =
* Added compatibility for WP 5.4

= 1.3.5 =
* Minor Bugfix

= 1.3.4 =
* Minor Bugfix

= 1.3.2 =
* Minor Bugfix

= 1.3.1 =
* Minor Fixes

= 1.3.0 =
* Added UI Changes
* Updated plugin licensing
* Added New features
* Added compatibility for WP 5.3 & PHP7.4
* Minor UI & feature fixes

= 1.2.1 =
* Added fixes for undefined getallheaders()

= 1.2.0 =
* Added UI changes for Signing Algorithms and Role Based Access
* Added Signature Validation
* Minor fixes

= 1.1.2 =
* Added JWT Authentication
* Fixed role based access to REST APIs
* Fixed common class conflicts

= 1.1.1 =
* Fixes to Create, Posts, Update Publish Posts

= 1.1.0 =
* Updated UI and features
* Added compatibility for WordPress version 5.2.2
* Added support for accessing draft posts as per User's WordPress Role Capability
* Allowed Logged In Users to access posts through /wp-admin Dashboard

= 1.0.2 =
* Added Bug fixes  

= 1.0.0 =
* Updated UI and features
* Added compatibility for WordPress version 5.2.2

== Upgrade Notice ==

= 1.1.1 =
* Fixes to Create, Posts, Update Publish Posts

= 1.1.0 =
* Updated UI and features
* Added compatibility for WordPress version 5.2.2
* Added support for accessing draft posts as per User's WordPress Role Capability
* Allowed Logged In Users to access posts through /wp-admin Dashboard

= 1.0.2 =
* Added Bug fixes  

= 1.0.0 =
* Updated UI and features
* Added compatibility for WordPress version 5.2.2
