<?php 
/* Ambil detail users dari tabel users */
$detail_users_check = Users_Select_Detail( $tbl_users, $sesi_id  );

/* Arahkan Form Ke Proses Edit Profile - Proses_Users_Internal*/


/* 

id
idupline 
idfb 
idpegawai 
username 
email 
password 
noponsel 
gambarkecil 
gambarbesar 
im 
namaperusahaan 
kantorcabang 
jabatan 
divisi 
alamat 

statusinternal 
aksesmodul 
aksesproses 
status 
statusbaru 
tanggaldaftar 
tanggalaktif
loginterakhir
updateterakhir
updateusers
kodeaktifasi
teraktif
terpopuler
direktori
hit


*/
$Form_UsersEditProfile = "proses_users_internal.php?action=user_editprofile";
?>
 

<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM  EDIT PROFIL USER
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>
									

							
<form action='<?php 
echo $Form_UsersEditProfile ?>' method='post' enctype="multipart/form-data" name='FormUsersRegister' id='FormUsersRegister'>
  							
							
<table class='tabelform' width='100%' cellpadding='1' cellspacing='1'>
<tr class='kontenform' >
  <td height="21"><div align="right"><strong>User Roles </strong></div></td>
  <td><div align="center"><strong>:</strong></div></td>
	  <td>     <?php 
echo $detail_users_check->aksesmodul  ?> <input name="aksesmodul" type="hidden" id="aksesmodul" value="<?php 
echo $detail_users_check->aksesmodul ?>"></td>
</tr>
<tr class='kontenform' >
<td width='32%'>


<div align='right'>

<b> Name </b></div></td>
								

<td width='2%'>

<div align='center'> <b> : </b> </div></td>
      							
								<td width='66%'>
	  								<div align='left' >
          								<input name='username' type='text' id='username' value="<?php 
echo $detail_users_check->username ?>" size='25' maxlength='100'>
      								</div>

                                    * Fill your name.								</td>
		  </tr>
  							 <tr class='kontenform' >
  							   <td><div align="right"> <b> ID</b> </div></td>
  							   <td> <div align="center"><strong>: </strong></div></td>
  							   <td> 
<input name='idpegawai' type='text' id='idpegawai' value="<?php 
echo $detail_users_check->idpegawai ?>" size='25' maxlength='8'>
                               <br />
* Fill your ID.                               </td>
	      </tr>
  							 <tr class='kontenform' >
      							<td>
        						<div align='right'><b>Email</b></div></td>
      							<td>
									<div align='center'><b>:</b></div></td>
      							<td>
	  								<input name='email' type='text' id='email' value="<?php 
echo $detail_users_check->email ?>" size='25' >								</td>
    						</tr>
							
							
    						<tr class='kontenform' >
      							<td></td>
      							<td></td>
      							<td>

* Fill email address				</td>
    						</tr>
	
    						<tr class='kontenform' >
    						  <td><div align="right"> <b> User Photo</b></div></td>
    						  <td>
							  
							  
<div align='center'> <b> : </b> </div></td>
    						  <td><input name="image_foto" type="file" id="image_foto"></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td><div align='right'>
									<b>
									Phone number </b>
									</div></td>
    						  <td><div align='center'><b>:</b></div></td>

    						  <td><input name='noponsel' type='text' id='noponsel' value="<?php 
echo $detail_users_check->noponsel  ?>" size='25' maxlength='15'></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td>* Phone number( CDMA / GSM ). </td>
  						  </tr>
 

                            <tr class='kontenform' >
                              <td>
                              
                              
                              <div align="right"><strong>  Facebook ID  </strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              </td>
                              <td><input name="idfb" type="text" id="idfb" value="<?php 
echo $detail_users_check->idfb ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Yahoo Messenger</strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              
                              </td>
                              <td><input name="im" type="text" id="im" value="<?php 
echo $detail_users_check->im ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"></div></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Company name</strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              </td>
                              <td><input name="namaperusahaan" type="text" id="namaperusahaan" value="<?php 
echo $detail_users_check->namaperusahaan ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Branch office</strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              </td>
                              <td><input name="kantorcabang" type="text" id="kantorcabang" value="<?php 
echo $detail_users_check->kantorcabang ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Position</strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              </td>
                              <td><input name="jabatan" type="text" id="jabatan" value="<?php 
echo $detail_users_check->jabatan ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Division</strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              
                              </td>
                              <td><input name="divisi" type="text" id="divisi" value="<?php 
echo $detail_users_check->divisi ?>"></td>
                            </tr>
                            <tr class='kontenform' valign="top">
                              <td><div align="right"><strong>Office address</strong></div></td>
                              <td>
                              
                              <div align='center'><b>:</b></div>
                              
                              </td>
                              <td><textarea name="alamat" cols="40" rows="5" id="alamat"><?php 
echo $detail_users_check->alamat ?></textarea></td>
                            </tr>
                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
          <tr class='kontenform' >
      							<td><div align='right' ><b>Password</b></div></td>
      							<td><div align='center'><b>:</b></div></td>
      							<td><div align='left'>
			  					<input name='newpass1' type='password' id='newpass1' size='25' maxlength='10'>
      							</div></td>
		  </tr>
	
   							<tr class='kontenform' >
      							<td><div align='right'><b>Repeat Password </b></div></td>
      							<td><div align='center'><b> : </b></div></td>
      							<td>
      
	   							<input name='newpass2' type='password' id='newpass2'  size='25' maxlength='10'>								</td>
		  </tr>

 
    						<tr class='kontenform' >
      							<td ></td>
      							<td ></td>
      							<td >* Password Max. 10 Character . 	</td>
    						</tr>
    										<tr class='kontenform' >
    										  <td>&nbsp;</td>
    										  <td valign='top'>&nbsp;</td>
    										  <td valign='top'><input name="passwordlama" type="hidden" id="passwordlama" value="<?php 
echo $detail_users_check->password ?>" size="25" /></td>
  										  </tr>
    										<tr class='kontenform' >
      											<td><div align='right'>
      											  <p>&nbsp;</p>
      											  </div></td>
      											<td valign='top'><div align='center'></div></td>
   											  <td valign='top'>
												<input class='button' type='submit' value='Submit' name='SubmitUsersRegistrasi'>
												<input name="id" type="hidden" id="id" value="<?php 
echo $sesi_id ?>">
												<input name="idupline" type="hidden" id="idupline" value="<?php 
echo $detail_users_check->idupline ?>">
                                                <input name="gambarkecil" type="hidden" id="gambarkecil" value="<?php 
echo $detail_users_check->gambarkecil ?>">
                                                <input name="gambarbesar" type="hidden" id="gambarbesar" value="<?php 
echo $detail_users_check->gambarbesar ?>">
                                                <input name="statusinternal" type="hidden" id="statusinternal" value="<?php 
echo $detail_users_check->statusinternal ?>">
                                                <input name="aksesproses" type="hidden" id="aksesproses" value="<?php 
echo $detail_users_check->aksesproses ?>">
                                                <input name="status" type="hidden" id="status" value="<?php 
echo $detail_users_check->status ?>">
                                                <input name="tanggaldaftar" type="hidden" id="tanggaldaftar" value="<?php 
echo $detail_users_check->tanggaldaftar ?>">
                                                <input name="tanggalaktif" type="hidden" id="tanggalaktif" value="<?php 
echo $detail_users_check->tanggalaktif  ?>">
                                                <input name="loginterakhir" type="hidden" id="loginterakhir" value="<?php 
echo $detail_users_check->loginterakhir ?>">
                                                <input name="updateterakhir" type="hidden" id="updateterakhir" value="<?php 
echo $detail_users_check->updateterakhir ?>">
                                                <input name="updateusers" type="hidden" id="updateusers" value="<?php 
echo $detail_users_check->updateusers ?>">
                                                <input name="kodeaktifasi" type="hidden" id="kodeaktifasi" value="<?php 
echo $detail_users_check->kodeaktifasi ?>">
                                                <input name="terpopuler" type="hidden" id="terpopuler" value="<?php 
echo $detail_users_check->terpopuler ?>">
                                                <input name="direktori" type="hidden" id="direktori" value="<?php 
echo $detail_users_check->direktori ?>">
                                                <input name="hit" type="hidden" id="hit" value="<?php 
echo $detail_users_check->hit ?>"></td>
    										</tr>
	    </table>
								</form>
									
									</td>
								</tr>
</table>