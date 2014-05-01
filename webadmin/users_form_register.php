<?php 
if( $sesi_id == "" ){

	$Form_UsersRegister = "proses_users.php?action=users_register";

}else{

	$Form_UsersRegister = "proses_users_internal.php?action=users_register";

}

?>

<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM  REQUEST REGISTRATION USERS
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>
									
							<form action='<?php 
echo $Form_UsersRegister ?>' method='post' name='FormUsersRegister' id='FormUsersRegister'>
  							
							
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
	  								* Fill your name</td>
    						</tr>
								
  							 <tr class='kontenform' >
  							   <td><div align="right"> <b> ID </b> </div></td>
  							   <td> : </td>
  							   <td> 
<input name='idpegawai' type='text' id='idpegawai' size='25' maxlength='8'>
                               <br />
* Fill your ID ( Ex. : 12345 )</td>
						      </tr>
  							 <tr class='kontenform' >
      							<td>
        						<div align='right'><b>Email</b></div></td>
      							<td>
									<div align='center'><b>:</b></div></td>
      							<td>
	  								<input name='email' type='text' id='email' size='25' >								</td>
    						</tr>
							
							
    						<tr class='kontenform' >
      							<td></td>
      							<td></td>
      							<td>
* Please fill out your email address<br />
* Email must be valid and acitve<br />



	</td>
    						</tr>
	
    						<tr class='kontenform' >
    						  <td><div align='right'><b>Phone No.</b></div></td>
    						  <td><div align='center'><b>:</b></div></td>
    						  <td><input name='noponsel' type='text' id='noponsel' size='25' maxlength='15'></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td>* Phone Number ( CDMA / GSM ). </td>
  						  </tr>
<?php 
/* 

<tr class='kontenform' >
      							<td><div align='right' ><b>Password</b></div></td>
      							<td><div align='center'><b>:</b></div></td>
      							<td><div align='left'>
			  					<input name='pass1' type='password' id='pass1' size='25' maxlength='10'>
      							</div></td>
   							</tr>
	
   							<tr class='kontenform' >
      							<td><div align='right'><b>Ulangi Password </b></div></td>
      							<td><div align='center'><b> : </b></div></td>
      							<td>
      
	   							<input name='pass2' type='password' id='pass2'  size='25' maxlength='10'>								</td>
   							 </tr>

*/

?>
    						<tr class='kontenform' >
      							<td ></td>
      							<td ></td>
      							<td >* Password Max. 10 Character</td>
    						</tr>
   
    						<tr class='kontenform' >
      							<td>
									<div align='right'><b>Verification Code</b></div></td>
      							<td>
									<div align='center'><b>:</b></div>								</td>
      							<td> 
									<img src='<?php 
echo $link_host ?>function/Function.Register.CaptchaSecurityImages.php?width=100&height=20&characters=5'>								</td>
    						</tr>
	
	
  											 <tr class='kontenform' >
      											<td><div align='right'></div></td>
      											<td><div align='center'></div></td>
     										 	<td>
	  												<input name='kodeverifikasi' type='text' id='kodeverifikasi'  size='25' maxlength='25'>
         											<br>
      												* Please fill out verification code												
													</td>
   											 </tr>
    										<tr class='kontenform' >
      											<td><div align='right'></div></td>
      											<td valign='top'><div align='center'></div></td>
      											<td valign='top'>
												<input class='button' type='submit' value='Submit' name='SubmitUsersRegistrasi'>												</td>
    										</tr>
							  </table>
								</form>
									
									</td>
								</tr>
							</table>