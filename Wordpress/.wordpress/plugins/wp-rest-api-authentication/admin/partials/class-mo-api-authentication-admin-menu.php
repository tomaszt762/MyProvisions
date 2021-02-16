<?php

require( 'support/class-mo-api-authentication-support.php' );
require( 'support/class-mo-api-authentication-faq.php' );
require( 'config/class-mo-api-authentication-config.php' );
require( 'license/class-mo-api-authentication-license.php' );
require( 'account/class-mo-api-authentication-account.php' );
require( 'demo/class-mo-api-authentication-demo.php' );
require( 'advanced/class-mo-api-authentication-advancedsettings.php' );
require ( 'advanced/class-mo-api-authentication-protectedrestapis.php' );
require( 'custom-api-integration/class-mo-api-authentication-custom-api-integration.php' );

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       miniorange
 * @since      1.0.0
 *
 * @package    Miniorange_api_authentication
 * @subpackage Miniorange_api_authentication/admin/partials
 */

function mo_api_authentication_main_menu() {

	$currenttab = "";
	if( isset( $_GET['tab'] ) )
		$currenttab = $_GET['tab'];
	
	Mo_API_Authentication_Admin_Menu::mo_api_auth_show_menu( $currenttab );
	echo '
	<div id="mo_api_authentication_settings">';
		echo '
		<div class="miniorange_container">';
		echo '
		<table style="width:100%;">
			<tr>
				<td style="vertical-align:top;width:65%;" class="mo_api_authentication_content">';
					Mo_API_Authentication_Admin_Menu::mo_api_auth_show_tab( $currenttab );
				// echo '</td><td style="vertical-align:top;padding-left:1%;" class="mo_api_authentication_sidebar">';
					Mo_API_Authentication_Admin_Menu::mo_api_auth_show_support_sidebar( $currenttab );
				echo '</tr>
		</table>
		<div class="mo_api_authentication_tutorial_overlay" id="mo_api_authentication_tutorial_overlay" hidden></div>
		</div>';
}

class Mo_API_Authentication_Admin_Menu {
	
	public static function mo_api_auth_show_menu( $currenttab ) { ?> 
		<div class="wrap">
			<div>
				<img style="float:left;" src="<?php echo dirname( plugin_dir_url( __FILE__ ) );?>/images/logo.png">
			</div>
		</div>
		<div class="wrap">
	       	<h1>
	            miniOrange API Authentication&nbsp
	           	<a class="add-new-h2" href="https://forum.miniorange.com/" target="_blank">Ask questions on our forum</a>
				<a class="add-new-h2" href="https://faq.miniorange.com/" target="_blank">FAQ</a>	
	       	</h1>
       	</div>
        <style>
            .add-new-hover:hover{
                color: white !important;
            }
        </style>
		<div id="tab">
			<h2 class="nav-tab-wrapper">
				<a class="nav-tab <?php if( $currenttab == '' || $currenttab == 'config' ) echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure API Authentication</a>
                <a class="nav-tab <?php if( $currenttab == 'protectedrestapis' ) echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=protectedrestapis">Protected REST APIs</a>
                <a class="nav-tab <?php if( $currenttab == 'advancedsettings' ) echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=advancedsettings">Advanced Settings</a>
				<a class="nav-tab <?php if( $currenttab == 'custom-integration' ) echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=custom-integration">Custom API Intergration</a>
				<a class="nav-tab <?php if($currenttab == 'requestfordemo') echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=requestfordemo">Request For Demo</a>
				<a class="nav-tab <?php if($currenttab == 'account') echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=account">Account Setup</a>
				<a class="nav-tab <?php if($currenttab == 'licensing') echo 'nav-tab-active';?>" href="admin.php?page=mo_api_authentication_settings&tab=licensing">Licensing Plans</a>
			</h2>
		</div> 
		<?php
	
	}
	
	
	public static function mo_api_auth_show_tab( $currenttab ) { 
		if($currenttab == 'account') {
			if (get_option ( 'mo_api_authentication_verify_customer' ) == 'true') {
				Mo_API_Authentication_Admin_Account::verify_password();
			} else if (trim ( get_option ( 'mo_api_authentication_email' ) ) != '' && trim ( get_option ( 'mo_api_authentication_admin_api_key' ) ) == '' && get_option ( 'mo_api_authentication_new_registration' ) != 'true') {
				Mo_API_Authentication_Admin_Account::verify_password();
			}
			else {
				Mo_API_Authentication_Admin_Account::register();
			}
		} elseif( $currenttab == '' || $currenttab == 'config') 
    		Mo_API_Authentication_Admin_Config::mo_api_authentication_config();
		elseif( $currenttab == 'protectedrestapis')
            Mo_API_Authentication_Admin_ProtectedRestAPIs::mo_api_authentication_protectedrestapis();
    	elseif( $currenttab == 'advancedsettings') 
			Mo_API_Authentication_Admin_AdvancedSettings::mo_api_authentication_advancedsettings();
		elseif( $currenttab == 'custom-integration' )
			Mo_API_Authentication_Admin_CustomAPIIntegration::mo_api_authentication_customintegration();			
    	elseif( $currenttab == 'requestfordemo') 
    		Mo_API_Authentication_Admin_RFD::mo_api_authentication_requestfordemo();
    	elseif( $currenttab == 'faq') 
    		Mo_API_Authentication_Admin_FAQ::mo_api_authentication_faq();
    	elseif( $currenttab == 'licensing')
    		Mo_API_Authentication_Admin_License::mo_api_authentication_licensing_page();
	} 
	
	public static function mo_api_auth_show_support_sidebar( $currenttab ) { 
		if( $currenttab != 'licensing' ) { 
			echo '<td style="vertical-align:top;padding-left:1%;" class="mo_api_authentication_sidebar">';
			echo Mo_API_Authentication_Admin_Support::mo_api_authentication_support();
			echo '</td>';
		}
	}
		
}