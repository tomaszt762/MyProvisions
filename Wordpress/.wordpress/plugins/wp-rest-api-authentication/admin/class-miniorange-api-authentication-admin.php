<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       miniorange
 * @since      1.0.0

 * @package    Miniorange_api_authentication
 * @subpackage Miniorange_api_authentication/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Miniorange_api_authentication
 * @subpackage Miniorange_api_authentication/admin
 * @author     miniOrange
 */
// require plugin_dir_path( dirname( __FILE__ ) ) .'miniorange-api-authentication.php';
require_once plugin_dir_path( __FILE__ ) . '../includes/class-miniorange-api-authentication-deactivator.php';
require plugin_dir_path( __FILE__ ) .'/class-miniorange-api-authentication-customer.php';
require( 'partials/class-mo-api-authentication-admin-menu.php' );
require( 'partials/flow/mo-api-authentication-flow.php' );
require( 'partials/flow/mo-token-api-flow.php' );
require( 'partials/support/class-mo-api-authentication-feedback.php' );

class Miniorange_API_Authentication_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		
		add_action( 'admin_menu',  array( $this, 'miniorange_api_authentication_save_settings' ) );
		// add_action( 'admin_enqueue_scripts', array( $this, 'plugin_settings_style' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'plugin_settings_style' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'plugin_settings_script' ) );
		// add_action( 'admin_footer', array( $this, 'mo_api_authentication_feedback_request' ) );
//        add_filter( 'rest_authentication_errors', array( $this, 'whitelist_routes' ), 20 );
    }

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */

	// function mo_api_authentication_feedback_request() {
	// 	Mo_API_Authentication_Admin_Feedback::mo_api_authentication_display_feedback_form();
	// }
	
	function plugin_settings_style() {
		wp_enqueue_style( 'mo_api_authentication_admin_settings_style', plugins_url( 'css/style_settings.css', __FILE__ ) );
		wp_enqueue_style( 'mo_api_authentication_admin_settings_phone_style', plugins_url( 'css/phone.css', __FILE__ ) );
		// wp_enqueue_style( 'mo_api_authentication_admin_settings_datatable', plugins_url( 'css/jquery.dataTables.min.css', __FILE__ ) );
	}

	function plugin_settings_script() {
		// wp_enqueue_script( 'mo_api_authentication_admin_settings_script', plugins_url( 'js/settings.js', __FILE__ ) );
		wp_enqueue_script( 'mo_api_authentication_admin_settings_phone_script', plugins_url('js/phone.js', __FILE__ ) );
		// wp_enqueue_script( 'mo_api_authentication_admin_settings_datatable', plugins_url( 'js/jquery.dataTables.min.js', __FILE__ ) );
	}

	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Miniorange_api_authentication_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Miniorange_api_authentication_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/miniorange-api-authentication-admin.css', array(), $this->version, 'all' );
		if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'licensing'){
            wp_enqueue_style( 'mo_api_authentication_bootstrap_css', plugins_url( 'css/bootstrap/bootstrap.min.css', __FILE__ ) );
        }
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Miniorange_api_authentication_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Miniorange_api_authentication_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/miniorange-api-authentication-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jquery-3.4.1.js', array( 'jquery' ), $this->version, false );

		if(isset($_REQUEST['tab']) && $_REQUEST['tab'] == 'licensing'){
            wp_enqueue_script( 'mo_api_authentication_modernizr_script', plugins_url( 'js/modernizr.js', __FILE__ ) );
            wp_enqueue_script( 'mo_api_authentication_popover_script', plugins_url( 'js/bootstrap/popper.min.js', __FILE__ ) );
            wp_enqueue_script( 'mo_api_authentication_bootstrap_script', plugins_url( 'js/bootstrap/bootstrap.min.js', __FILE__ ) );
        }
	}

	private function mo_api_authentication_show_curl_error() {
		if( $this->mo_api_authentication_is_curl_installed() == 0 ) {
			update_option( 'mo_api_auth_message', '<a href="http://php.net/manual/en/curl.installation.php" target="_blank">PHP CURL extension</a> is not installed or disabled. Please enable it to continue.');
			mo_api_auth_show_error_message();
			return;
		}
	}

	private function mo_api_authentication_is_curl_installed() {
		if  (in_array  ('curl', get_loaded_extensions())) {
			return 1;
		} else {
			return 0;
		}
	}

	public function mo_api_auth_admin_menu() {

		$page = add_menu_page( 'API Authentication Settings ' . __( 'Configure Authentication', 'mo_api_authentication_settings' ), 'miniOrange API Authentication', 'administrator', 'mo_api_authentication_settings', array( $this, 'mo_api_auth_menu_options' ) ,plugin_dir_url(__FILE__) . 'images/miniorange.png');	
	}

	function mo_api_auth_menu_options () {
		global $wpdb;
		$customerRegistered = mo_api_authentication_is_customer_registered();
		mo_api_authentication_main_menu();
	}

    public static function whitelist_routes( $access ) {

        // Return current value of $access and skip all plugin functionality
        if ( self::allow_rest_api() ) {
            return $access;
        }


		$current_route = self::get_current_route();
	

        if ( self::is_whitelisted( $current_route ) ) {
			return false;
        }
        return $access;

    }

    public static function is_whitelisted( $currentRoute ) {
        return array_reduce( self::get_route_whitelist_option(), function ( $isMatched, $pattern ) use ( $currentRoute ) {
            return $isMatched || (bool) preg_match( '@^' . htmlspecialchars_decode( $pattern ) . '$@i', $currentRoute );
        }, false );
    }

    public static function get_route_whitelist_option() {
        return (array) get_option( 'mo_api_authentication_protectedrestapi_route_whitelist', array() );
    }

    public static function get_current_route() {
        $rest_route = $GLOBALS['wp']->query_vars['rest_route'];

        return ( empty( $rest_route ) || '/' == $rest_route ) ?
            $rest_route :
            untrailingslashit( $rest_route );
    }

    public static function allow_rest_api() {
        return (bool) apply_filters( 'dra_allow_rest_api', is_user_logged_in() );
    }

	public function mo_api_authentication_config_settings() {
		mo_api_authentication_config_app_settings();
	}

	public function mo_api_authentication_export_plugin_configuration() {
		mo_api_authentication_export_plugin_config();
	}

	public function mo_api_auth_initialize_api_flow() {
		if ( ! isset( $_GET['page'] ) ) {
			$api               = $_SERVER['REQUEST_URI'];
			$method            = $_SERVER['REQUEST_METHOD'];
			$lastrequestedapis = get_option( 'mo_api_authentication_last_requested_api' );
			if ( ! $lastrequestedapis )
				$lastrequestedapis = array();
				
			if ( is_array($lastrequestedapis) && ! isset( $lastrequestedapis[$api] ) ) {
				$count = count( $lastrequestedapis );
			    if ( $count >= 5 )
			        array_shift( $lastrequestedapis );
				$lastrequestedapis[$api] = $method;
				update_option( 'mo_api_authentication_last_requested_api', $lastrequestedapis );
			}
		}
		if ( !mo_api_auth_user_has_capability() ) {
			if(strpos($_SERVER['REQUEST_URI'], '/api/v1/token') !== false  && get_option( 'mo_api_authentication_selected_authentication_method' ) === 'jwt_auth' ) {
				$json = file_get_contents('php://input');
				$json = json_decode( $json, true );
				if( json_last_error() !== JSON_ERROR_NONE ) {
					$json = $_POST;
				}
	        	mo_api_auth_token_endpoint_flow($json);
			} else {
	        	mo_api_auth_restrict_rest_api_for_invalid_users();
	        } 
	    }
	}

	function regenerate_token() {	
		if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  current_user_can('administrator') ) {
			$bearer_token = stripslashes( wp_generate_password( 32, false, false ) );
			update_option( 'mo_api_auth_bearer_token ', $bearer_token );
			echo $bearer_token;
			wp_die(); 
		}
	}

	function regenerate_client_credentials(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  current_user_can('administrator') ) {
			mo_api_authentication_create_client();
			$response = [
				'client_id' => get_option( 'mo_api_auth_clientid' ),
				'client_secret' => get_option( 'mo_api_auth_clientsecret' )
			];
			wp_send_json( $response, 200 );
		}
	}

	function mo_api_authentication_check_empty_or_null( $value ) {
		if( ! isset( $value ) || empty( $value ) ) {
			return true;
		}
		return false;
	}

	function miniorange_api_authentication_remove_registered_user(){
		delete_option( 'new_registration' );
		delete_option( 'mo_api_authentication_admin_email');
		delete_option( 'mo_api_authentication_admin_phone');
		delete_option( 'mo_api_authentication_admin_fname');
		delete_option( 'mo_api_authentication_admin_lname');
		delete_option( 'mo_api_authentication_admin_company');
		delete_option( 'mo_api_authentication_verify_customer' );
		delete_option( 'mo_api_authentication_admin_customer_key' );
		delete_option( 'mo_api_authentication_admin_api_key' );
		delete_option( 'mo_api_authentication_new_customer' );
		delete_option( 'mo_api_authentication_registration_status' );
		delete_option( 'customer_token' );
	}

	function miniorange_api_authentication_save_settings() {

		if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  current_user_can('administrator') ) {

			if ( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_change_email_address" && isset($_REQUEST['mo_api_authentication_change_email_address_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_change_email_address_form_fields'])), 'mo_api_authentication_change_email_address_form') ) {
				$this->miniorange_api_authentication_remove_registered_user();
				return;
			} else if( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_register_customer" && isset($_REQUEST['mo_api_authentication_register_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_register_form_fields'])), 'mo_api_authentication_register_form')  ) {	//register the admin to miniOrange
				//validation and sanitization
				$email = '';
				$phone = '';
				$password = '';
				$confirmPassword = '';
				$fname = '';
				$lname = '';
				$company = '';
				if( $this->mo_api_authentication_check_empty_or_null( $_POST['email'] ) || $this->mo_api_authentication_check_empty_or_null( $_POST['password'] ) || $this->mo_api_authentication_check_empty_or_null( $_POST['confirmPassword'] ) ) {
					update_option( 'mo_api_auth_message', 'All the fields are required. Please enter valid entries.');
					mo_api_auth_show_error_message();
					return;
				} else if( strlen( $_POST['password'] ) < 8 || strlen( $_POST['confirmPassword'] ) < 8){
					update_option( 'mo_api_auth_message', 'Choose a password with minimum length 8.');
					mo_api_auth_show_error_message();
					return;
				} else {
					$email = sanitize_email( $_POST['email'] );
					$phone = stripslashes( $_POST['phone'] );
					$password = stripslashes( $_POST['password'] );
					$confirmPassword = stripslashes( $_POST['confirmPassword'] );
					$fname = stripslashes( $_POST['fname'] );
					$lname = stripslashes( $_POST['lname' ] );
					$company = stripslashes( $_POST['company'] );
				}
				
				
				update_option( 'mo_api_authentication_admin_email', $email );
				update_option( 'mo_api_authentication_admin_phone', $phone );
				update_option( 'mo_api_authentication_admin_fname', $fname );
				update_option( 'mo_api_authentication_admin_lname', $lname );
				update_option( 'mo_api_authentication_admin_company', $company );
				
				if( strcmp( $password, $confirmPassword) == 0 ) {
					update_option( 'password', $password );
					$customer = new Miniorange_API_Authentication_Customer();
					$email = get_option('mo_api_authentication_admin_email');
					$content = json_decode( $customer->check_customer(), true );
					
					if( strcasecmp( $content['status'], 'CUSTOMER_NOT_FOUND') == 0 ) {
						$response = json_decode( $customer->create_customer(), true );

						if(strcasecmp($response['status'], 'SUCCESS') != 0) {
							update_option( 'mo_api_auth_message', 'Failed to create customer. Try again.');
							mo_api_auth_show_error_message();
						} else {
							update_option( 'mo_api_authentication_verify_customer', 'true' );
							update_option( 'mo_api_auth_message', $response['message']);
							mo_api_auth_show_success_message();
						}
					} elseif(strcasecmp( $content['status'], 'SUCCESS') == 0 ) {
						update_option( 'mo_api_authentication_verify_customer', 'true' );
						update_option( 'mo_api_auth_message', 'Account already exist. Please Login.');
						mo_api_auth_show_error_message();
					} else if(is_null($content)) {
						update_option( 'mo_api_auth_message', 'Failed to create customer. Try again.');
						mo_api_auth_show_error_message();
					} else {
						update_option( 'mo_api_auth_message', $content['message'] );
						mo_api_auth_show_error_message();
					}
					
				} else {
					update_option( 'mo_api_auth_message', 'Passwords do not match.');
					delete_option('mo_api_authentication_verify_customer');
					mo_api_auth_show_error_message();
				}
			} else if( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_goto_login" && isset($_REQUEST['mo_api_authentication_goto_login_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_goto_login_fields'])), 'mo_api_authentication_goto_login') ) {
				delete_option( 'new_registration' );
				update_option( 'mo_api_authentication_verify_customer', 'true' );
			} else if( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_verify_customer" && isset($_REQUEST['mo_api_authentication_verify_customer_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_verify_customer_form_fields'])), 'mo_api_authentication_verify_customer_form') ) {	//login the admin to miniOrange
				//validation and sanitization
				$email = '';
				$password = '';
				if( $this->mo_api_authentication_check_empty_or_null( $_POST['email'] ) || $this->mo_api_authentication_check_empty_or_null( $_POST['password'] ) ) {
					update_option( 'mo_api_auth_message', 'All the fields are required. Please enter valid entries.');
					mo_api_auth_show_error_message();
					return;
				} else{
					$email = sanitize_email( $_POST['email'] );
					$password = stripslashes( $_POST['password'] );
				}

				update_option( 'mo_api_authentication_admin_email', $email );
				update_option( 'password', $password );
				$customer = new Miniorange_API_Authentication_Customer();
				$content = $customer->get_customer_key();
				$customerKey = json_decode( $content, true );
				if( json_last_error() == JSON_ERROR_NONE && isset($customerKey['status']) && $customerKey['status'] === "SUCCESS" ) {
					update_option( 'mo_api_authentication_admin_customer_key', $customerKey['id'] );
					update_option( 'mo_api_authentication_admin_api_key', $customerKey['apiKey'] );
					update_option( 'customer_token', $customerKey['token'] );
					if( isset( $customerKey['phone'] ) )
						update_option( 'mo_api_authentication_admin_phone', $customerKey['phone'] );
					delete_option( 'password' );
					update_option( 'mo_api_auth_message', 'Customer retrieved successfully');
					delete_option( 'mo_api_authentication_verify_customer' );
					mo_api_auth_show_success_message();
				} else {
					update_option( 'mo_api_auth_message', 'Invalid username or password. Please try again.');
					mo_api_auth_show_error_message();
				}
			} else if ( isset( $_POST['option'] ) and $_POST['option'] == 'mo_api_authentication_skip_feedback' && isset($_REQUEST['mo_api_authentication_skip_feedback_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_skip_feedback_form_fields'])), 'mo_api_authentication_skip_feedback_form') ) {
				$path = plugin_dir_path( dirname( __FILE__ ) ) .'miniorange-api-authentication.php';
				deactivate_plugins( $path );
				update_option( 'mo_api_auth_message', 'Plugin deactivated successfully' );
				mo_api_auth_show_success_message();
			} else if(isset($_POST['mo_api_authentication_feedback']) and $_POST['mo_api_authentication_feedback'] == 'true' && isset($_REQUEST['mo_api_authentication_feedback_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_feedback_fields'])), 'mo_api_authentication_feedback_form')) {
				$user = wp_get_current_user();
				$message = 'Plugin Deactivated:';
				$deactivate_reason         = array_key_exists( 'deactivate_reason_radio', $_POST ) ? $_POST['deactivate_reason_radio'] : false;
				$deactivate_reason_message = array_key_exists( 'query_feedback', $_POST ) ? $_POST['query_feedback'] : false;
				if ( $deactivate_reason ) {
					$message .= $deactivate_reason;
					if ( isset( $deactivate_reason_message ) ) {
						$message .= ':' . $deactivate_reason_message;
					}
					$email = get_option( "mo_api_authentication_admin_email" );
					if ( $email == '' ) {
						$email = $user->user_email;
					}
					$phone = get_option( 'mo_api_authentication_admin_phone' );
					$plugin_config = mo_api_authentication_export_plugin_config();
					//only reason
					$feedback_reasons = new Miniorange_API_Authentication_Customer();
					$submited = $feedback_reasons->mo_api_authentication_send_email_alert( $email, $phone, $message, "Feedback: WordPress REST API Authentication", $plugin_config );
					
					$path = plugin_dir_path( dirname( __FILE__ ) ) .'miniorange-api-authentication.php';
					deactivate_plugins( $path );
					if ( $submited == false ) {
						update_option('mo_api_auth_message', 'Your query could not be submitted. Please try again.');
						mo_api_auth_show_error_message();
					} else {
						update_option('mo_api_auth_message', 'Thanks for getting in touch! We shall get back to you shortly.');
						mo_api_auth_show_success_message();
					}
				} else {
					update_option( 'mo_api_auth_message', 'Please Select one of the reasons ,if your reason is not mentioned please select Other Reasons' );
					mo_api_auth_show_error_message();
				}
			} else if( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_contact_us_query_option" && isset($_REQUEST['mo_api_authentication_contact_us_query_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_contact_us_query_form_fields'])), 'mo_api_authentication_contact_us_query_form') ) {

				// Contact Us query
				$email = $_POST['mo_api_authentication_contact_us_email'];
				$phone = $_POST['mo_api_authentication_contact_us_phone'];
				$query = $_POST['mo_api_authentication_contact_us_query'];
				$send_config = isset( $_POST['mo_api_authentication_send_plugin_config'] );
				$customer = new Miniorange_API_Authentication_Customer();
				if ( $this->mo_api_authentication_check_empty_or_null( $email ) || $this->mo_api_authentication_check_empty_or_null( $query ) ) {
					update_option('mo_api_auth_message', 'Please fill up Email and Query fields to submit your query.');
					mo_api_auth_show_error_message();
				} else {
					$submited = $customer->submit_contact_us( $email, $phone, $query, $send_config );
					if ( $submited == false ) {
						update_option('mo_api_auth_message', 'Your query could not be submitted. Please try again.');
						mo_api_auth_show_error_message();
						return;
					} else {
						update_option('mo_api_auth_message', 'Thanks for getting in touch! We shall get back to you shortly.');
						mo_api_auth_show_success_message();
						return;
					}
				}
			} else if( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_license_contact_form" && isset($_REQUEST['mo_api_authentication_license_contact_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_license_contact_fields'])), 'mo_api_authentication_license_contact_form') ) {	
				$email = isset($_POST['email']) ? $_POST['email'] : '';
				$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
				$query = isset($_POST['query']) ? $_POST['query'] : '';
				$plugin_config = mo_api_authentication_export_plugin_config();
				//only reason
				$payment_plan = new Miniorange_API_Authentication_Customer();
				if ( $this->mo_api_authentication_check_empty_or_null( $email ) || $this->mo_api_authentication_check_empty_or_null( $query ) ) {
					update_option('mo_api_auth_message', 'Please fill up Email and Query fields to submit your query.');
					mo_api_auth_show_error_message();
				} else {
					$submited = $payment_plan->mo_api_authentication_send_email_alert( $email, $phone, $query, "Payment Plan Information: WordPress REST API Authentication", $plugin_config );
					if ( $submited == false ) {
						update_option('mo_api_auth_message', 'Your query could not be submitted. Please try again.');
						mo_api_auth_show_error_message();
					} else {
						update_option('mo_api_auth_message', 'Thanks for getting in touch! We shall get back to you shortly.');
						mo_api_auth_show_success_message();
					}
				}
			} else if( isset( $_POST['option'] ) and $_POST['option'] == "mo_api_authentication_demo_request_form" && isset($_REQUEST['mo_api_authentication_demo_request_field']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_api_authentication_demo_request_field'])), 'mo_api_authentication_demo_request_form') ) {
				// Demo Request 
				if( $this->mo_api_authentication_is_curl_installed() == 0 ) {
					return $this->mo_api_authentication_show_curl_error();
				}

				$email = $_POST['mo_api_authentication_demo_email'];
				$demo_plan = $_POST['mo_api_authentication_demo_plan'];
				$query = $_POST['mo_api_authentication_demo_usecase'];

				if ( $this->mo_api_authentication_check_empty_or_null( $email ) || $this->mo_api_authentication_check_empty_or_null( $demo_plan ) || $this->mo_api_authentication_check_empty_or_null( $query ) ) {
					update_option('message', 'Please fill up Usecase, Email field and Requested demo plan to submit your query.');
					mo_api_auth_show_error_message();
				} else {
					$url = 'http://demo.miniorange.com/wordpress-oauth/';

					$headers = array( 'Content-Type' => 'application/x-www-form-urlencoded', 'charset' => 'UTF - 8');
					$args = array(
						'method' =>'POST',
						'body' => array(
							'option' => 'mo_auto_create_demosite',
							'mo_auto_create_demosite_email' => $email,
							'mo_auto_create_demosite_usecase' => $query,
							'mo_auto_create_demosite_demo_plan' => $demo_plan,
							'mo_auto_create_demosite_plugin_name' => 'mo-rest-api-authentication'
						),
						'timeout' => '20',
						'redirection' => '5',
						'httpversion' => '1.0',
						'blocking' => true,
						'headers' => $headers,

					);

					$response = wp_remote_post( $url, $args );

					if ( is_wp_error( $response ) ) {
						$error_message = $response->get_error_message();
						echo "Something went wrong: $error_message";
						exit();
					}
					$output = wp_remote_retrieve_body($response);
					$output = json_decode($output);

					if(is_null($output)){
						update_option('mo_api_auth_message', 'Something went wrong! contact to your administrator');
						mo_api_auth_show_error_message();
					}

					if($output->status == 'SUCCESS'){
						update_option('mo_api_auth_message', $output->message);
						mo_api_auth_show_success_message();
					}else{
						update_option('mo_api_auth_message', $output->message);
						mo_api_auth_show_error_message();
					}

				}

			}
			
		}
	}
}
