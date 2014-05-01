<?php 
$FormAction = "proses_users.php?action=users_request_register";
?>

<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM REQUEST USERS REGISTARTION 
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>
									

							
							<form action='<?php 
echo $FormAction ?>' method='post' name='FormUsersRequestRegister'>
  							
							
							<table class='tabelform' width='100%' cellpadding='1' cellspacing='1'>
							
							
    						<tr class='kontenform' >
      							<td width='32%'>
        							<div align='right'>
										<b> Name </b>									</div>								</td>
								
      							<td width='2%'>
									<div align='center'> 
										<b> : </b>									</div>								</td>
      							
								<td width='66%'>
	  								<div align='left' >
          								<input name='username' type='text' id='username' size='25' maxlength='100'>
      								</div>

                                    * Fill out your name.								</td>
    						</tr>
								
  							 <tr class='kontenform' >
  							   <td><div align="right"> <b> ID </b> </div></td>
  							   <td> <div align='center'><b>:</b></div> </td>
  							   <td> 
<input name='idpegawai' type='text' id='idpegawai' size='25' maxlength='8'>
                               <br />
* fill out ID ( 12345 )</td>
						      </tr>
  							 <tr class='kontenform' >
      							<td>
        						<div align='right'><b>Email</b></div></td>
      							<td>
									<div align='center'><b>:</b></div>
									
									
									</td>
      							<td>
	  								<input name='email' type='text' id='email' size='25' >								</td>
    						</tr>
							
							
    						<tr class='kontenform' >
      							<td></td>
      							<td></td>
      							<td>
* Please fill out your email address.<br />
* Email address must be valid and active.<br />



	</td>
    						</tr>
	
    						<tr class='kontenform' >
    						  <td>
							  
							  
<div align='right'><b>Phone number</b></div>
									
									
									</td>
    						  <td><div align='center'><b>:</b></div></td>
    						  <td><input name='noponsel' type='text' id='noponsel' size='25' maxlength='15' /></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td>* Phone number ( CDMA / GSM ). </td>
  						  </tr>
  
   
    						<tr class='kontenform' >
    						  <td>
							  
							  
<div align='right'>
<b>
Message
</b>
</div>
									

							  
							  
							  </td>
    						  <td>
							  
<div align='center'>
<b>
:
</b>
</div>

							  
							  </td>
    						  <td><textarea name="pesanregistrasi" cols="50" rows="4" id="pesanregistrasi"></textarea></td>
  						  </tr>
    						<tr class='kontenform' >
      							<td>
									<div align='right'> <b>Verification Code</b> </div></td>
      							<td>
									<div align='center'><b>:</b></div>								</td>
      							<td> 
									<img src='../function/Function.Register.CaptchaSecurityImages.php?width=100&height=20&characters=5'>								</td>
    						</tr>
	
	
  											 <tr class='kontenform' >
      											<td><div align='right'></div></td>
      											<td><div align='center'></div></td>
     										 	<td>
	  												<input name='kodeverifikasi' type='text' id='kodeverifikasi'  size='25' maxlength='25'>
         											<br>
      												* Fill out verification code 												</td>
   											 </tr>
    										<tr class='kontenform' >
      											<td><div align='right'></div></td>
      											<td valign='top'><div align='center'></div></td>
      											<td valign='top'>
												<input name='SubmitUsersRequestRegistrasi' type='submit' class='button' id="SubmitUsersRequestRegistrasi" value='Submit'>												</td>
    										</tr>
							  </table>
								</form>
									
									</td>
								</tr>
							</table>