<?php
	
	function mo_api_auth_otp_verification_ui(){ ?>
		<form name="f" method="post" id="otp_form" action="">
			<input type="hidden" name="option" value="mo_api_authentication_validate_otp" />
				<div class="mo_table_layout">
					<div id="panel5">
						<table class="mo_settings_table">
							<h3>Verify Your Email</h3>
							<tr>
								<td><b><font color="#FF0000">*</font>Enter OTP:</b></td>
								<td><input class="mo_table_textbox" autofocus="true" type="text" name="mo_api_authentication_otp_token" required placeholder="Enter OTP" style="width:61%;" pattern="[0-9]{6,8}"/>
								 &nbsp;&nbsp;<a style="cursor:pointer;" onclick="document.getElementById('mo_api_authentication_resend_otp_form').submit();">Resend OTP</a></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><br /><input type="submit" name="submit" value="Validate OTP" class="button button-primary button-large" />

									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="button" name="back-button" id="mo_api_authentication_back_button" onclick="document.getElementById('mo_api_authentication_change_email_form').submit();" value="Back" class="button button-primary button-large" />
								</td>
							</tr>
						</table>

				</div>
		</form>
		<form name="f" id="mo_api_authentication_resend_otp_form" method="post" action="">
			<?php


			if(get_option('mo_api_authentication_registration_status') == 'MO_OTP_DELIVERED_SUCCESS' || get_option('mo_api_authentication_registration_status') == 'MO_OTP_VALIDATION_FAILURE') {
				echo '<input type="hidden" name="option" value="mo_api_authentication_resend_otp_email"/>';
			} else {
				echo '<input type="hidden" name="option" value="mo_api_authentication_resend_otp_phone"/>';
			}
			?>
		</form>
		<form id="mo_api_authentication_change_email_form" method="post" action="">
			<input type="hidden" name="option" value="mo_api_authentication_change_email" />
		</form>
		<?php

			if(get_option('mo_api_authentication_registration_status') == 'MO_OTP_DELIVERED_SUCCESS' || get_option('mo_api_authentication_registration_status') == 'MO_OTP_DELIVERED_FAILURE'|| get_option('mo_api_authentication_registration_status')=='MO_OTP_VALIDATION_FAILURE') {
			echo '<hr>

			<h3>I did not recieve any email with OTP . What should I do ?</h3>
			<form id="mo_api_authentication_register_with_phone_form" method="post" action="">
				<input type="hidden" name="option" value="mo_api_authentication_register_with_phone_option" />
				If you cannot see the email from miniOrange in your mails, please check your <b>SPAM</b> folder. If you don\'t see an email even in the SPAM folder, verify your identity with our alternate method.
				<br><br>
				<b>Enter your valid phone number here and verify your identity using one time passcode sent to your phone.</b><br><br>
				<input class="mo_api_authentication_table_textbox" type="tel" id="phone_contact" style="width:40%;"
				pattern="[\+]\d{11,14}|[\+]\d{1,4}([\s]{0,1})(\d{0}|\d{9,10})" class="mo_api_authentication_table_textbox" name="phone"
				title="Phone with country code eg. +1xxxxxxxxxx" required
				placeholder="Phone with country code eg. +1xxxxxxxxxx"
				value="'. get_option('mo_api_authentication_admin_phone').'" />
				<br /><br /><input type="submit" value="Send OTP" class="button button-primary button-large" />

			</form>';
		}?></div>
<?php
}