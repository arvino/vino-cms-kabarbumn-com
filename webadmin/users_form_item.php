<?php 
/* Ambil detail users dari tabel users */

$sesi_id = $_GET['id'];

$detail_users_check = Users_Select_Detail( $tbl_users, $sesi_id  );

/* Arahkan Form Ke Proses Edit Profile - Proses_Users_Internal*/

$Form_UsersEditProfile = "proses_users_internal.php?action=usersaccount_updateprofile";

?>
<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM  EDIT PROFIL USERS
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>

							
<form action='<?php 
echo $Form_UsersEditProfile ?>' method='post' enctype="multipart/form-data" name='FormUsersRegister' id='FormUsersRegister'>
  							
							
<table class='tabelform' width='100%' cellpadding='1' cellspacing='1'>
<tr class='kontenform' >
  <td>
  
<div align='right'>
<b> User Roles </b>
</div>

  
  </td>
  <td>
  
    <div align="center"><b>:</b></div></td>
  <td>
  
<?php 
/*
List Users Groups
*/ 
?>
<select name='aksesmodul'>
<option value='<?php 
echo $detail_users_check->aksesmodul  ?>'>-- <?php 
echo $detail_users_check->aksesmodul  ?> --</option>
<?php 
$result = Select_All_Users_Roles_By_Urutan( $tbl_usersroles );
while($row = mysql_fetch_object( $result )){
?>
<option value='<?php 
echo $row->secroleid ?>'><?php 
echo $row->secroleid ?></option>
<?php 
}
?>
</select>
  
  </td>
</tr>
<tr class='kontenform' >
<td width='32%'>


<div align='right'>
<b> Nama </b>
</div>

</td>
								

<td width='2%'>  <div align="center"><strong> :  </strong></div></td>
      							
								<td width='66%'>
	  								<div align='left' >
          								<input name='username' type='text' id='username' value="<?php 
echo $detail_users_check->username ?>" size='25' maxlength='100'>
      								</div>

                                    * Masukkan nama lengkap anda.								
									
									
			</td>
		  </tr>
  							 <tr class='kontenform' >
  							   <td><div align="right"> <b> PIN / NIK</b> </div></td>
  							   <td> <div align="center"><strong>: </strong></div></td>
  							   <td> 
<input name='idpegawai' type='text' id='idpegawai' value="<?php 
echo $detail_users_check->idpegawai ?>" size='25' maxlength='8'>
                               <br />
* Masukkan NIK / PIN.                               </td>
	      </tr>
  							 <tr class='kontenform' >
      							<td>
        						<div align='right'><b>Email</b></div></td>
      							<td>
							   <div align="center"><strong>:</strong></div></td>
      							<td>
	  								<input name='email' type='text' id='email' value="<?php 
echo $detail_users_check->email ?>" size='25' >								</td>
    						</tr>
							
							
    						<tr class='kontenform' >
      							<td><p>&nbsp;                                  </p>   							    </td>
      							<td><div align="center"></div></td>
      							<td> * Email Harus Valid.<br />
* Kosongkan jika tida ada .<br />				</td>
    						</tr>
	
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td><div align="center"></div></td>
    						  <td>
<?php 
if( $detail_users_check->gambarbesar != "" ){
?>

<img src="../<?php 
echo $detail_users_check->direktori ?><?php 
echo $detail_users_check->gambarkecil ?>" width="100">
<br>
[ <a href="proses_users_internal.php?id=<?php 
echo $detail_users_check->id ?>&action=usersaccount_Deleteimage"> Delete Foto </a> ]
<?php 
}
?>
							  
							  
							  </td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td><div align="right"> <b> Foto Profil User</b></div></td>
    						  <td>                                <div align="center"><b> : </b> </div></td>
    						  <td><input name="image_foto" type="file" id="image_foto"></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td><div align='right'>
									<b>
									No. Ponsel </b>
									</div></td>
    						  <td><div align="center"><b>:</b></div></td>

    						  <td><input name='noponsel' type='text' id='noponsel' value="<?php 
echo $detail_users_check->noponsel  ?>" size='25' maxlength='15'></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td><div align="center"></div></td>
    						  <td>* No. Ponsel ( CDMA / GSM ). </td>
  						  </tr>
 

                            <tr class='kontenform' >
                              <td>
                              
                              
                              <div align="right"><strong>  ID Facebook  </strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><input name="idfb" type="text" id="idfb" value="<?php 
echo $detail_users_check->idfb ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Yahoo Messenger</strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><input name="im" type="text" id="im" value="<?php 
echo $detail_users_check->im ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"></div></td>
                              <td><div align="center"></div></td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Nama Perusahaan</strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><input name="namaperusahaan" type="text" id="namaperusahaan" value="<?php 
echo $detail_users_check->namaperusahaan ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Kantor Cabang</strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><input name="kantorcabang" type="text" id="kantorcabang" value="<?php 
echo $detail_users_check->kantorcabang ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Jabatan</strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><input name="jabatan" type="text" id="jabatan" value="<?php 
echo $detail_users_check->jabatan ?>"></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Divisi</strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><input name="divisi" type="text" id="divisi" value="<?php 
echo $detail_users_check->divisi ?>"></td>
                            </tr>
                            <tr class='kontenform' valign="top">
                              <td><div align="right"><strong>Alamat Kantor</strong></div></td>
                              <td>
                              
                                <div align="center"><b>:</b></div></td>
                              <td><textarea name="alamat" cols="40" rows="5" id="alamat"><?php 
echo $detail_users_check->alamat ?></textarea></td>
                            </tr>
                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td><div align="center"></div></td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Password</strong></div></td>
                              <td><div align="center"><strong>:</strong></div></td>
                              <td>
                              
<input type="text" name="newpass1" id="newpass1" /></td>
                            </tr>
                            <tr class='kontenform' >
                              <td><div align="right"><strong>Ulangi Password</strong></div></td>
                              <td><div align="center"><strong>:</strong></div></td>
                              <td><label>
                                <input type="text" name="newpass2" id="newpass2" />
                              </label></td>
                            </tr>
                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td><div align="center"></div></td>
                              <td>
							  

<input name="passwordlama" type="hidden" id="passwordlama" value="<?php 
echo $detail_users_check->password ?>" size="25" />
							  
							  </td>
                            </tr>
    										<tr class='kontenform' >
      											<td><div align='right'>
      											  <p>&nbsp;</p>
      											  </div></td>
      											<td valign='top'><div align="center"></div></td>
      											<td valign='top'>
												  <p>
												    <input class='button' type='submit' value='Edit Profile Users' name='SubmitUsersRegistrasi'>


											       <input name="id" type="hidden" id="id" value="<?php 
echo $sesi_id ?>"> 
											      
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
echo $detail_users_check->hit ?>">
<br>
<br>
								
												
</td>
</tr>
</table>
</form>


</td>
</tr>
</table>