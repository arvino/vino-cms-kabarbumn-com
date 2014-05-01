<?php 
if($status_baru=="0"){
	echo "
	Notes : 
	<br>

* Anda belum pernah ganti password sebelumnya , Harap ganti password anda untuk pertama kali.
	<br>
* Anda di haruskan mengganti password untuk dapat mengakses halaman  internal.
	<br /><br />

";
}

?>

<?php 
if( $sesi_id == "" ){
	$Form_UsersGantiPassword = "proses_users.php?action=users_gantipassword";

}else{
	$Form_UsersGantiPassword = "proses_users_internal.php?action=users_gantipassword";
	
}

?>

<table width='98%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>
    <tr class='judulform' >
      <td width='100%' height='30'>
	  
			FORM CHANGE PASSWORD
	  
	  </td>
    </tr>
	
	
    <tr class='kontenform'>
      <td>
	  
	  
<form action='<?php 
echo $Form_UsersGantiPassword ?>' method='post' enctype='multipart/form-data' name='FormUsersChangePassword' id='FormUsersChangePassword'>

<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>
                                 
 <tr class='kontenform' >
    <td width='32%'>
		<div align='right'> 
			<b> Email </b> 
		</div>
	</td>
	
    <td width='2%'>
		<div align='center'>
			<b>:</b>
		</div>
	</td>
	
    <td width='66%'>
		<div align='left'>
        	<input name='email' type='TEXT' id='email' value="<?php 
echo $sesi_email  ?>" size='25'>
    	</div>
	</td>
  </tr>
<tr>
<td>
<div align='right'> 
<b> 
Old Password
</b>
</div>


									</td>
                                  	<td>
										<div align='center'><b> 
											: 
										</b></div>
									</td>
                                  	<td>
                                    	<input name='password' type='password' id='password'  size='25' maxlength='10'>
									</td>
                                </tr>
                                <tr>
                                  		<td> 

<div align='right'> 
<b> 
New password 
</b>
</div>
										</td>


                                  		<td>
											<div align='center'><b> 
											: 
											</b></div>
										</td>

                                  		<td>
                                    		<input name='pass1' type='password' id='pass1' size='25' maxlength='10'> 
                                    		* Max. Password 10 Character 
                                  		</td>
                                </tr>
                                <tr>
                                  <td> 


<div align='right'> 
<b>
Repeat New Password
</b>
</div>



								  </td>
                                  <td> 
									<div align='center'><b> 
									: 
									</b></div>

								  </td>
                                  <td>
                                    <input name='pass2' type='password' id='pass2' size='25' maxlength='10'>
                                  * Max. Password 10 Character                                  </td>
                                </tr>
                                <tr>
                                  <td><div align='right'><b> Verification Code </b> </div></td>
                                  <td>  

										<div align='center'>
											<b>:</b>
										</div>


								  </td>

                                  	<td>
										<img src='../function/Function.GantiPassword.CaptchaSecurityImages.php?width=100&height=20&characters=5'>
									</td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td><input name='kodeverifikasi' type='text' id='kodeverifikasi' size='25' maxlength='10'></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td>


* Enter Verification Code (Please note the letters of his great & small.)

								  </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td>
                                    <input name='Submit'  type='submit' class='button' id='Submit' value='Submit...'>
                                  </td>
                                </tr>
   		 					  </table>
		</form>  
	  </td>
    </tr>
</table>