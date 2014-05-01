<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];


$halamandiizinkan = $_SESSION['halamandiizinkan'];

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){

	header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
	
}else{


?>
<?php 
include"kelas_function.php";
?>
<html>
<head>
<?php 
include"head.php"; ?>
<script type="text/javascript">
function JavaScript_Konfirmasi( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users.php?action=UsersGroups_hapusdata&id=" + id 
	else
	window.location="users_account.php"
}

</script> 

</head>
<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image:url('images/bghalaman.png');background-repeat:no-repeat;
background-position:top;background-attachment:fixed;">
<?php 
include"tmpl_header.php";?>
		
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr valign="top">
            <td width="22%"><table width="204" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
                <td background="images/box/B2_Batas_Atas.png"> </td>
                <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
              </tr>
              <tr valign="top">
                <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
                <td background="images/box/B2_Latar.png">                
				
				<?php 
include"menu_users.php";?>
				
				</td>
                <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
              </tr>
              <tr>
                <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
                <td background="images/box/B2_Batas_Bawah.png"> </td>
                <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
              </tr>
            </table>
              </td>
            <td width="78%"><div align="center">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
                  <td background="images/box/B2_Batas_Atas.png"> </td>
                  <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
                </tr>
                <tr valign="top">
                  <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
                  <td background="images/box/B2_Latar.png">
				  
				  <span class="JudulKanal_box1">USERS ACCOUNT</span>
                    <hr class='line_box'>
					
					
<?php 
include"pesan_error.php";?>
<?php 
//include"menu_users1.php";?>
<?php 
/*
token_usersadmin
token_usersgroup
*/
$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{


if(!isset($action)){

include"users_form_register.php";

}else{


	switch ($action){
	
		Case 'Users_ViewList': /* View List Of Users Account */
		include"users_list_users.php";
		break;
		
		Case 'Users_Search': 
		include"users_list_users.php";
		break;
	
		Case 'Users_ViewDetail': 
		include"users_detail_users.php";
		$iditem = $id;
		echo "<br>";
		include"users_list_userslampiran.php";
		echo "<br>";
		include"users_list_userskomentar.php";
		echo "<br>";
		include"users_form_userskomentar.php";
		break;
		
		Case 'Users_FormEntry': /* Users Form Entry dari List Users yang di klik */
		include"users_form_item.php";
		break;
		
		Case 'Users_UpdateProfile':  /* Users Form Entry Update Profile */
		include"users_form_editusers.php";
		break;

		Case 'Users_UpdatePassword':
		include"users_form_gantipassword.php";
		break;

	}		

}



?>
<?php 
/*
if($action=="EditData"){                                                       
$FormProses = "proses_users.php?action=usersaccount_updatedata";
$userskategori_submitbutton = "UPDATE DATA......";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('users_tokens.php')\" >";

}

*/

/* 
if( !isset($action) ){
$FormProses = "proses_users.php?action=register";
$userskategori_submitbutton = "ADD DATA...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('users_tokens.php')\" >";
}

if($action=="gantipassword"){
	
}


*/

?>
 
<?php 
} 
?>
</td>
                  <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
                </tr>
                <tr>
                  <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
                  <td background="images/box/B2_Batas_Bawah.png"> </td>
                  <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
                </tr>
              </table>
            </div>
			
			</td>
          </tr>
        </table>          
		
		  
	
<?php 
include"tmpl_footer.php";?>	
	
	
</body>
</html>
<?php 
}
?>