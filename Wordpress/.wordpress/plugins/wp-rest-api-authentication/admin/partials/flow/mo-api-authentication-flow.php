<?php

function mo_api_authentication_config_app_settings()
{

	if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  current_user_can('administrator') ) {
		if( ( isset( $_POST['option'] ) and $_POST['option'] == 'mo_api_authentication_config_form' ) && isset($_REQUEST['mo_api_authentication_authentication_method_config_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_authentication_method_config_fields'])), 'mo_api_authentication_authentication_method_config') ) {

			if (isset($_POST['action'])){
				if( $_POST['action'] == 'Save Configuration' ) {
					if( !empty( $_POST['mo_api_authentication_selected_authentication_method'] ) ) {
						$selected_auth_method = "";
						$selected_auth_method = $_POST['mo_api_authentication_selected_authentication_method'];
						update_option( 'mo_api_authentication_selected_authentication_method', $selected_auth_method );
						update_option( 'mo_api_authentication_config_settings_'.$selected_auth_method, true );
						
						if( $selected_auth_method == 'tokenapi' ) {
							if ( get_option( 'mo_api_auth_bearer_token' ) === false ) {
								$bearer_token = stripslashes( wp_generate_password( 32, false, false ) );
								update_option( 'mo_api_auth_bearer_token', $bearer_token );
							}
							update_option( 'mo_api_auth_message', 'API Key authentication is enabled' );
						} elseif( ( $selected_auth_method == 'basic_auth' ) && (!empty( $_POST['mo_api_authentication_authentication_key'] ) ) ) {
							if( $_POST['mo_api_authentication_authentication_key'] == 'cid_secret' ){
								if (get_option( 'mo_api_auth_clientid' ) === false ){
									mo_api_authentication_create_client();
								}
							}
							update_option( 'mo_api_authentication_authentication_key', stripslashes( $_POST['mo_api_authentication_authentication_key'] ) );
							update_option( 'mo_api_auth_message', 'Basic authentication is enabled' );
						} elseif( $selected_auth_method == 'jwt_auth' ) {
							update_option( 'mo_api_authentication_jwt_client_secret', stripslashes( wp_generate_password( 32, false, false ) ) );
							update_option( 'mo_api_authentication_jwt_signing_algorithm', 'HS256' );
							update_option( 'mo_api_auth_message', 'JWT authentication is enabled' );
						} else {
							update_option( 'mo_api_auth_message', $selected_auth_method. ' Authentication method is not supported with your version' );
							mo_api_auth_show_error_message();
							return;
						}
						mo_api_auth_show_success_message();
					} else {
						update_option( 'mo_api_auth_message', 'Please select valid Authentication Method' );
						mo_api_auth_show_error_message();
						return;
					} 
				}	elseif( $_POST['action'] == 'Reset' ) {
					mo_api_authentication_reset_settings();
					mo_api_auth_show_success_message();
				}
			} else {
				update_option( 'mo_api_auth_message', 'Something went wrong!! Please try again.' );
				mo_api_auth_show_error_message();
				return;
			}
		} else if ( ( isset( $_POST['option'] ) && $_POST['option'] == "mo_api_authentication_protected_apis_form" ) && isset($_REQUEST['ProtectedRestAPI_admin_nonce_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['ProtectedRestAPI_admin_nonce_fields'])), 'ProtectedRestAPI_admin_nonce') ) {
			// Catch the routes that should be whitelisted
			$rest_routes = (isset($_POST['rest_routes'])) ?
				array_map('esc_html', wp_unslash($_POST['rest_routes'])) :
				null;

			// If resetting or whitelist is empty, clear the option and exit the function
			if (empty( $rest_routes ) || isset($_POST['reset'])) {
				mo_api_authentication_reset_api_protection();
				add_settings_error('ProtectedRestAPI_notices', 'settings_updated', 'All APIs below are protected.', 'updated');
				return;
			}

			// Save whitelist to the Options table
			update_option('mo_api_authentication_protectedrestapi_route_whitelist', $rest_routes);
			add_settings_error('ProtectedRestAPI_notices', 'settings_updated', 'Whitelist settings saved.', 'updated');
		}
	}
}

function mo_api_authentication_reset_api_protection() {
    $wp_rest_server     = rest_get_server();
    $all_routes = array_keys( $wp_rest_server->get_routes() );
    $all_routes = array_map('esc_html',$all_routes);
    update_option( 'mo_api_authentication_protectedrestapi_route_whitelist', $all_routes);
}

function mo_api_authentication_create_client() {
	$client_id = stripslashes( wp_generate_password( 12, false, false ) );
	update_option( 'mo_api_auth_clientid ', $client_id );
	$client_secret = stripslashes( wp_generate_password( 24, false, false ) );
	update_option( 'mo_api_auth_clientsecret', $client_secret );
}

function mo_api_authentication_reset_settings() {
	delete_option( 'mo_api_authentication_selected_authentication_method' );
	delete_option( 'mo_api_authentication_config_settings_tokenapi' );
	delete_option( 'mo_api_authentication_config_settings_basic_auth' );
	delete_option( 'mo_api_authentication_config_settings_jwt_auth' );
	delete_option( 'mo_api_auth_bearer_token ');
	delete_option( 'mo_api_auth_clientid ' );
	delete_option( 'mo_api_auth_clientsecret' );
	delete_option( 'mo_api_authentication_authentication_key' );	
	delete_option( 'mo_api_authentication_jwt_client_secret' );
	delete_option( 'mo_api_authentication_jwt_signing_algorithm' );
	update_option( 'mo_api_auth_message', 'Configuration reset successfully' );
}

function mo_api_authentication_export_plugin_config() {
	$config = null;
	$config['Authentication_Method'] = get_option( 'mo_api_authentication_selected_authentication_method' );
	if( $config['Authentication_Method'] == "tokenapi" )
		$config['Authentication_Method'] = "API Key";
	return $config;
}