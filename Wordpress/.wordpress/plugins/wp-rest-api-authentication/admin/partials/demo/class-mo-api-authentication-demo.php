<?php
	
	class Mo_API_Authentication_Admin_RFD {
	
		public static function mo_api_authentication_requestfordemo() {
			self::demo_request();
		}

		public static function demo_request(){
			$democss = "width: 350px; height:35px;";
		?>
			<div class="mo_table_layout">
			    <h3> Demo Request Form : </h3>
			    <!-- <div class="mo_table_layout mo_modal-demo"> -->
			    	<form method="post" action="">
					<input type="hidden" name="option" value="mo_api_authentication_demo_request_form" />
					<?php wp_nonce_field('mo_api_authentication_demo_request_form', 'mo_api_authentication_demo_request_field'); ?>
			    	<table cellpadding="4" cellspacing="4">
                        <tr>
						  	<td><strong>Usecase : </strong></td>
							<td>
							<textarea type="text" minlength="15" name="mo_api_authentication_demo_usecase" style="resize: vertical; width:350px; height:100px;" rows="4" placeholder="Write us about your usecase" required value=""></textarea>
							</td>
						  </tr> 	
                        <tr>
							<td></td>
							<td style="width:350px;"><p style="color:grey;font-size:14px">Example. Restrict access to WP Pages/Posts with Token provided by Facebook, Restrict all WordPress REST APIs with OAuth 2.0 Authentication methods etc</p></td>
						</tr>
			    		<tr>
							<td><strong>Email ID : </strong></td>
							<td><input required type="email" style="<?php echo $democss; ?>" name="mo_api_authentication_demo_email" placeholder="Email id" value="<?php echo get_option("mo_api_authentication_admin_email"); ?>" /></td>
						</tr>
						<tr>
							<td><strong>Request a demo for : </strong></td>
							<td>
								<select required style="<?php echo $democss; ?>" name="mo_api_authentication_demo_plan" id="mo_api_authentication_demo_plan_id">
									<option disabled selected>------------------ Select ------------------</option>
									<option value="rest-api-authentication-enterprise@31.0.2">WP API Authentication Enterprise Plugin</option>
									<option value="rest-api-authentication-premium@21.0.2">WP API Authentication Premium Plugin</option>
									<option value="Not Sure">Not Sure</option>
								</select>
							</td>
					  	</tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Submit Demo Request" class="button button-primary button-large" />
                            </td>
                        </tr>
			    	</table>
			</form>
			</div>
		<?php
		}
	}