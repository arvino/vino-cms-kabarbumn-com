<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM  USERS REGISTRATION
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>
									

							
							<form action='<?php 
echo $FormProses ?>' method='post' name='FormUsersRegister' >
  							
							
							  <table class='tabelform' width='100%' cellpadding='1' cellspacing='1'>
                                <tr class='kontenform' >
                                  <td width='32%'>
                                    <div align='right'> <b> Name </b> </div></td>
                                  <td width='2%'>
                                    <div align='center'> <b> : </b> </div></td>
                                  <td width='66%'>
                                    <div align='left' >
                                      <input name='username' type='text' id='username2' size='25' maxlength='100'>
                                  </div></td>
                                </tr>
                                <tr class='kontenform' >
                                  <td>
                                    <div align='right'><b>Email</b></div></td>
                                  <td>
                                    <div align='center'><b>:</b></div></td>
                                  <td>
                                    <input name='email' type='text' id='email2' size='25' >
                                  </td>
                                </tr>
                                <tr class='kontenform' >
                                  <td></td>
                                  <td></td>
                                  <td> * Email must be valid</td>
                                </tr>
                                <tr class='kontenform' >
                                  <td><div align='right'> <b> Phone No. </b> </div></td>
                                  <td><div align='center'><b>:</b></div></td>
                                  <td><input name='noponsel' type='text' id='noponsel2' size='25' maxlength='15'></td>
                                </tr>
                                <tr class='kontenform' >
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>* Phone number ( CDMA / GSM ). </td>
                                </tr>
                                <tr class='kontenform' >
                                  <td><div align='right' ><b>Password</b></div></td>
                                  <td><div align='center'><b>:</b></div></td>
                                  <td><div align='left'>
                                      <input name='pass1' type='password' id='pass12' size='25' maxlength='10'>
                                  </div></td>
                                </tr>
                                <tr class='kontenform' >
                                  <td><div align='right'><b>Repeat Password </b></div></td>
                                  <td><div align='center'><b> : </b></div></td>
                                  <td>
                                    <input name='pass2' type='password' id='pass22'  size='25' maxlength='10'>
                                  </td>
                                </tr>
                                <tr class='kontenform' >
                                  <td ></td>
                                  <td ></td>
                                  <td >* Password Max. 10 Character. </td>
                                </tr>
                                <tr class='kontenform' >
                                  <td>&nbsp;</td>
                                  <td valign='top'>&nbsp;</td>
                                  <td valign='top'><label>
                                    <input name="status" type="checkbox" id="status2" value="checkbox">
      ACTIVATION STATUS</label></td>
                                </tr>
                                <tr class='kontenform' >
                                  <td>&nbsp;</td>
                                  <td valign='top'>&nbsp;</td>
                                  <td valign='top'>
                                    <label>
                                    <input name="statusinternal" type="checkbox" id="statusinternal4" value="checkbox">
      INTERNAL USERS STATUS </label>
                                  </td>
                                </tr>
                                <tr class='kontenform' >
                                  <td>&nbsp;</td>
                                  <td valign='top'>&nbsp;</td>
                                  <td valign='top'><input name="aksesproses" type="checkbox" id="aksesproses2" value="checkbox" checked>
ACCESS PROCESS STATUS</td>
                                </tr>
                                <tr class='kontenform' >
                                  <td><div align="right"><b>Roles</b></div></td>
                                  <td valign='top'><div align="center"><b>:</b></div></td>
                                  <td valign='top'>
                                    <?php 
$result_users_roles = Select_All_Users_Roles_By_Urutan( $tbl_usersroles );
	?>
                                    <select name="aksesmodul" id="select">
                                      <option value="0"> Choose Roles </option>
                                      <?php 
while($data_users_roles = mysql_fetch_object($result_users_roles)){
		?>
                                      <option value="<?php 
echo $data_users_roles->secroleid ?>"><?php 
echo strtoupper($data_users_roles->secrolename) ?></option>
                                      <?php 
}
		?>
                                    </select>
                                  </td>
                                </tr>
                                <tr class='kontenform' >
                                  <td><div align="right"><b>Activation Code</b></div></td>
                                  <td valign='top'><div align="center"><b>:</b></div></td>
                                  <td valign='top'><input name="kodeaktifasi" type="text" id="kodeaktifasi" value="<?php 
echo nomoraktifasi(); ?>"></td>
                                </tr>
                                <tr class='kontenform' >
                                  <td>
 								  
<input name="idfb" type="hidden" value="<?php 
echo $detail_users->idfb ?>">
<input name="id" type="hidden" value="<?php 
echo $detail_users->id ?>">
<input name="idupline" type="hidden" value="<?php 
echo $detail_users->idupline ?>">
<input name="idpegawai" type="hidden" value="<?php 
echo $detail_users->idpegawai ?>">
<input name="password" type="hidden" value="<?php 
echo $detail_users->password ?>">
<input name="tanggaldaftar" type="hidden" value="<?php 
echo $detail_users->tanggaldaftar ?>">
<input name="tanggalaktif" type="hidden" value="<?php 
echo $detail_users->tanggalaktif ?>">
<input name="loginterakhir" type="hidden" value="<?php 
echo $detail_users->loginterakhir ?>">
<input name="updateterakhir" type="hidden" value="<?php 
echo $detail_users->updateterakhir ?>">
<input name="updateusers" type="hidden" value="<?php 
echo $detail_users->updateusers ?>">
<input name="teraktif" type="hidden" value="<?php 
echo $detail_users->teraktif ?>">
<input name="terpopuler" type="hidden" value="<?php 
echo $detail_users->terpopuler ?>">
<input name="direktori" type="hidden" value="<?php 
echo $detail_users->direktori ?>">
<input name="hit" type="hidden" value="<?php 
echo $detail_users->hit ?>">


</td>
                                  <td> </td>
                                  <td>



		<div align='left'>
        	<input name='btn_usersaccount' type='submit' class='button' value='<?php 
echo $userskategori_submitbutton ?>'>
    	   <?php 
echo  $Tombol_CANCEL ?>
		</div>
		
		
                                  </td>
                                </tr>
                              </table>
							</form>
									
									</td>
								</tr>
							</table>