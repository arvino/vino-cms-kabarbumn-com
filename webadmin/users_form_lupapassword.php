<?php 
$FormUsersResetPassword = "proses_users.php?action=lupapassword";

?>
<table class='tabelform' align='center' width='98%' cellpadding='1' cellspacing='1' >
							
		<tr class='judulform'>
			<td width='100%' height='30'>

				FORM RESET PASSWORD
				
				
			</td>
		</tr>

    	<tr class='kontenform' valign="">
      		<td>

<form action='<?php 
echo $FormUsersResetPassword ?>' method='post' name='FormUsersResetPassword' id='FormUsersResetPassword'>
									  
            								<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1' >
             								
              								<tr class='kontenform'>
                								<td>
													<div align='right'><strong>Email</strong></div>
												</td>
               									<td>
													<div align='center'><strong>:</strong></div></td>
                								<td>
                  									<div align='left'>
														 
                    										<input name='email' type='text' id='email' size='25' />
<br>
</div>
												</td>
              								</tr>
											
              								<tr class='kontenform'>
                								<td width='32%'>
                									<div align='right'>
														<b>
															Verification Code</b></div>
												</td>
												
                								<td width='2%'>
													<div align='center'>
														<b>
															:
														</b>
													</div>
												</td>
												
                								<td width='66%'>
														<strong>
<img src='../function/Function.LupaPassword.CaptchaSecurityImages.php?width=100&height=20&characters=5'> 
														</strong>
												</td>
              								</tr>
											
              								<tr class='kontenform'>
               									<td> </td>
                								<td> </td>
               									<td> 
                  									<input name='kodeverifikasi' type='text' id='kodeverifikasi' size='25' maxlength='10'>
                  									<br>
                 								 	* Please Input Verification Code </td>
              								</tr>
											
              								<tr class='kontenform'>
              								  <td></td>
              								  <td></td>
              								  <td>* Please Check Your Email After Reset Password. </td>
            								  </tr>
              								<tr class='kontenform'>
                								<td></td>
                								<td></td>
               									<td>
											<strong>
                  								<input name='SubmitResetPassword'  type='submit'  class='button' id='SubmitResetPassword' value='Submit' />
                							</strong>
											</td>
              								</tr>
  										</table>
			  </form>

			</td>
		</tr>
		
</table>