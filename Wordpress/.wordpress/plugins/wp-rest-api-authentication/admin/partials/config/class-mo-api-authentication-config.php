<?php

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

require( 'output/class-mo-api-authentication-basic-oauth-config.php' );
require( 'output/class-mo-api-authentication-tokenapi-config.php' );
require( 'output/class-mo-api-authentication-jwt-auth-config.php' );

class Mo_API_Authentication_Admin_Config {
	
	public static function mo_api_authentication_config() {
	?>
		<div id="mo_api_authentication_support_layout" class="mo_api_authentication_support_layout">
			<div>
				<!-- <h1 class="mo_api_auth_headers"><b>API Authentication Configuration</b></h1> -->
				<form method="post" id="mo-authentication-method-form" action="">
					<input required type="hidden" name="option" value="mo_api_authentication_config_form" />
					<?php wp_nonce_field('mo_api_authentication_authentication_method_config','mo_api_authentication_authentication_method_config_fields'); ?>								
					<div class="mo_api_authentication_settings_table">
						<?php $authentication_method = !empty( get_option('mo_api_authentication_selected_authentication_method') ) ? get_option('mo_api_authentication_selected_authentication_method') : ''; 
						$display_block = "display: block";
						$display_none = "display: none"; ?>
						<div class="mo_api_authentication_common_div_css">
							<h3><b>Authentication Method : </b></h3> 
							<div class="mo_auth_method">
								<label>
								  <input type="radio" name="mo_api_authentication_selected_authentication_method" value="tokenapi" onclick="divVisibility('',0)" <?php if( $authentication_method == 'tokenapi' ) { echo 'checked="checked"'; } ?> >
								  <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>/images/apikey.png"><br/>API Key
								</label>
							</div>
							<div class="mo_auth_method">
								<label>
								  <input type="radio" name="mo_api_authentication_selected_authentication_method" value="basic_auth" onclick="divVisibility('ShowBasicAuthDiv',0)" <?php if( $authentication_method == 'basic_auth' ) { echo 'checked="checked"'; } ?> >
								  <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>/images/basic-auth.png"><br/>Basic Authentication
								</label>
							</div>
							<div class="mo_auth_method">
								<label>
								  <input type="radio" name="mo_api_authentication_selected_authentication_method" value="jwt_auth" onclick="divVisibility('ShowJwtDiv',0)" <?php if( $authentication_method == 'jwt_auth' ) { echo 'checked="checked"'; } ?>>
								  <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>/images/jwt.png"><br/>JWT Authentication
								</label>
							</div>
							<div class="mo_auth_method">
								<label>
								  <input type="radio" name="mo_api_authentication_selected_authentication_method" value="OAuth 2.0" onclick="divVisibility('ShowOauthDiv',1)" <?php if( $authentication_method == 'oauth_client' ) { echo 'checked="checked"'; } ?> >
								  <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>/images/oauth.png"><br/>OAuth 2.0 <a href="admin.php?page=mo_api_authentication_settings&tab=licensing" target="_blank" rel="noopener noreferrer" style="font-size: x-small">[PREMIUM]</a>
								</label>
							</div>
							<div class="mo_auth_method">
								<label>
								  <input type="radio" name="mo_api_authentication_selected_authentication_method" value="Third Party Provider" onclick="divVisibility('ShowThirdParyProviderDiv',1)" <?php if( $authentication_method == 'thirdpartyprovider' ) { echo 'checked="checked";'; } ?>>
								  <img src="<?php echo plugin_dir_url(dirname(dirname(__FILE__)));?>/images/thirdparty.png"><br/>Third Party Provider <a href="admin.php?page=mo_api_authentication_settings&tab=licensing" target="_blank" rel="noopener noreferrer" style="font-size: x-small">[ENTERPRISE]</a>
								</label>
							</div>


							<hr width="80%">
							<div style="display: none;" id="ShowOauthDiv">
								<br/>
								<table width="150%">
									<tr>
										<td colspan="2">
											<b>OAuth 2.0 Grant Type :</b>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="radio" readonly name="mo_api_authentication_grant_type" value="password_grant" onclick="OAuthTokenTypeVis('password-grant')" > Password Grant
										</td>
										<td colspan="2">
											<input type="radio" readonly name="mo_api_authentication_grant_type" value="client_credentials" onclick="OAuthTokenTypeVis('client-grant')" > Client Credentials
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<br/><b>Token Type :</b>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="radio" readonly name="mo_api_authentication_token_type" value="access_token" >Access Token
										</td>
										<td colspan="2">
											<div id="oauth_jwt_token" ><input readonly type="radio" name="mo_api_authentication_token_type" value="jwt_token" >JWT Token <small>(Supported with Password Grant Only)</small></div>
										</td>
									</tr>
								</table>

								<h4>Enable additional control with OAuth : </h4>
								<input type="checkbox" readonly> <b>Refresh Token </b> <small>(Refresh tokens are the credentials that can be used to acquire new access tokens to increase session timeout)</small><br><br>
								<input type="checkbox" readonly> <b>Revoke Token </b> <small>(Revoke token request causes the removal of the client permissions associated with the specified token)</small>
							</div>
							
							<br/>
							<div style="<?php if( $authentication_method == 'basic_auth' ) { echo $display_block; } else { echo $display_none; } ?>" id="ShowBasicAuthDiv" >
								<b>Basic Authentication Key Type: </b>
								<table width="150%">
									<tr>
										<td colspan="2">
											<input type="radio" name="mo_api_authentication_authentication_key" <?php if( get_option('mo_api_authentication_authentication_key') == 'uname_pass' ) { echo 'checked="checked";'; } ?> value="uname_pass"> Username : Password 
										</td>
										<td colspan="2">
											<input type="radio" name="mo_api_authentication_authentication_key" <?php if( get_option('mo_api_authentication_authentication_key') == 'cid_secret' ) { echo 'checked="checked";'; } ?> value="cid_secret"> Client-ID : Client-Secret
										</td>
									</tr>
								</table>
								<br/>
								<b>Encryption Method </b> <small>(Used to send credentials over the internet securely in encrypted format)</small> : 
								
								<table width="150%">
									<tr>
										<td colspan="2">
											<input type="radio" name="basic_auth_encryption" checked> None
										</td>
										<td colspan="2">
											<input type="radio" readonly name="basic_auth_encryption"> HMAC <a href="admin.php?page=mo_api_authentication_settings&tab=licensing" target="_blank" rel="noopener noreferrer" style="font-size: x-small"> [PREMIUM]</a>
										</td>
									</tr>
								</table>
							</div>
							<div style="<?php if( $authentication_method == 'jwt_auth' ) { echo $display_block; } else { echo $display_none; } ?>" id="ShowJwtDiv">
								<h4>JSON Web Token (JWT) Authentication:</h4>
								A JSON web token(JWT) is JSON Object which is used to securely transfer information over the web (between two parties).<br/>
								<table>
									<tr>
										<td>
											<b>Signing Algorithms <a href="admin.php?page=mo_api_authentication_settings&tab=licensing" target="_blank" rel="noopener noreferrer" style="font-size: x-small">[PREMIUM]</a> :</b> 
											<br><small>Select secure signing algorithm for JWT signatures</small>
										</td>
										<td><select style="min-width:200px">
                                                <option disabled selected value="algo">Select Algorithm</option>
											    <option disabled value="algo">HS256</option>
  											    <option disabled value="algo">RS256</option>
										</select>
										</td>
									</tr>
									<tr>
										<td><b>Client Secret / Certificate: </b></td>&nbsp;
										<td><textarea type="textbox" readonly placeholder="Configure your certificate or secret key" name="mo_api_authentication_jwt_client_secret" style="width:350px;"></textarea></td>
									</tr>
								</table>
							</div>
							<div style="display: none;" id="ShowThirdParyProviderDiv">
							<h4> Authentication with Third Party Provider / Federated Identities: </h4>
							We provide REST API authentication for your applications using existing third party or federated identities such as SAML, OAuth, OpenID Connect or custom API's.
							<br/><br/>
							<table style="width:100%">
							<tr><td style="width:25%"><input type="radio" checked selected name="third_party_identity_type" value="OAuth"> OAuth 2.0</td>
							<td><input type="radio" readonly  name="third_party_identity_type" value="SAML"> SAML 2.0 Token</td>
							<td><input type="radio" readonly  name="third_party_identity_type" value="OPENID"> OpenID Connect Token</td>
							<td><input type="radio" readonly name="third_party_identity_type" value="API"> Custom API</td>
							</tr>
							</table>
							
							<p><b>OAuth 2.0 Introspection Endpoint : </b>&nbsp;<br/>
							<small>This endpoint is used to query Third Party OAuth provider to identify if the OAuth token exists and is valid</small><br/>
							<input type="textbox" placeholder="OAuth Introspection endpoint" style="width:80%;padding:3px" /></p>
							</div>
						</div>
						<div style="text-align:center;">
							<input type="hidden" name="action" id="mo_api_auth_save_config_input" value="Save Configuration">
							<button type="button" style="margin:15px; width:170px;" onclick="moAuthenticationMethodSave('Reset')" class="button button-primary button-large">Reset</button>
							<button type="submit" style="margin:15px; width:170px;" id="mo_api_auth_save_config_button" onclick="moAuthenticationMethodSave('Save Configuration')" class="button button-primary button-large">Save Configuration</button>
						</div>
						</form>
					</div>		
				</div>
			</div>
			<br>

					<div style="display: block;">
						<?php 
						if( get_option( 'mo_api_authentication_selected_authentication_method' ) === 'tokenapi' )
							Mo_API_Authentication_Admin_TokenAPI_Config::mo_api_auth_configuration_output();
						elseif(  get_option( 'mo_api_authentication_selected_authentication_method' ) === 'basic_auth'  ) 
							Mo_API_Authentication_Admin_Basic_Auth_Config::mo_api_auth_configuration_output();
						elseif(  get_option( 'mo_api_authentication_selected_authentication_method' ) === 'jwt_auth'  ) 
							Mo_API_Authentication_Admin_Jwt_Auth_Config::mo_api_auth_configuration_output();
						?>
					</div></div>&nbsp;

					<div id="mo_api_authentication_support_layout" class="mo_api_authentication_support_layout">
						<div class="mo_api_authentication_common_div_css">
							<h3><b>Protected APIs : </b></h3>
							<p>The below list of WP REST APIs are protected and allowed for authorized access in free plugin:</p>
							<ol>
								<li>/wp/v2/posts</li>
								<li>/wp/v2/comments</li>
								<li>/wp/v2/media</li>
							</ol>
							<p>We have allowed authorized access to other WP REST APIs in premium versions.</p>
						</div>
					</div>


					<script>
						var divs = ["ShowBasicAuthDiv", "ShowJwtDiv", "ShowOauthDiv", "ShowThirdParyProviderDiv"];
					    var visibleDivId = null;
					    function divVisibility(divId, para) {
					      if(visibleDivId === divId) {
					        visibleDivId = null;
					      } else {
					        visibleDivId = divId;
					      }
					      hideNonVisibleDivs();
						  if( para === 1 ){
								document.getElementById('mo_api_auth_save_config_button').disabled = true;								
							} else {
								document.getElementById('mo_api_auth_save_config_button').disabled = false;
							}
							if(divId === "ShowBasicAuthDiv"){
								document.getElementsByName('mo_api_authentication_authentication_key')[0].required = true;
							} else {
								document.getElementsByName('mo_api_authentication_authentication_key')[0].required = false;
							}
					    }
					    function hideNonVisibleDivs() {
					      var i, divId, div;
					      for(i = 0; i < divs.length; i++) {
					        divId = divs[i];
					        div = document.getElementById(divId);
					        if(visibleDivId === divId) {
					          div.style.display = "block";
					        } else {
					          div.style.display = "none";
					        }
					      }
					    }
						function OAuthTokenTypeVis(grantType){
							if(grantType === 'password-grant'){
								document.getElementById('oauth_jwt_token').style.display = "block";
							} else if (grantType === 'client-grant'){
								document.getElementById('oauth_jwt_token').style.display = "none";
							} else {
								document.getElementById('oauth_jwt_token').style.display = "block";								
							}
						}

						function moAuthenticationMethodSave(action){
							document.getElementById("mo_api_auth_save_config_input").value = action;
							document.getElementById("mo-authentication-method-form").submit();
						}

					</script>
	<?php
	}
}