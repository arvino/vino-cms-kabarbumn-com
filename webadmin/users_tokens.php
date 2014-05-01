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

/*
Token atau Access Token, dalam arsitektur Windows NT adalah sebuah objek sistem operasi (yang diberi nama "Token") 
yang merepresentasikan subjek dalam beberapa operasi pengaturan akses (access control). 
Objek Token umumnya dibuat oleh layanan logon (logon service) untuk merepresentasikan informasi keamanan yang diketahui mengenai 
sebuah pengguna yang lolos proses autentikasi (authenticated user). Objek token digunakan oleh komponen sistem operasi Windows NT 
yang menangani masalah keamanan, yaitu Security Reference Monitor (SRM).
*/
?>
<?php 
include"kelas_function.php";

?>
<html>
<head>
<?php 
include"head.php"; ?>
<script type="text/javascript">
function JavaScript_Konfirmasi_Delete( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users_tokens.php?action=userstokens_hapusdata&id=" + id 
	else
	window.location="users_tokens.php"
}


</script> 


</head>
<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image:url('images/bghalaman.png');background-repeat:no-repeat;
background-position:top;background-attachment:fixed;">

		
		
<?php 
include"tmpl_header.php"; ?>


		
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
				  
				   <span class="JudulKanal_box1"> USERS TOKENS</span>
                    <hr class='line_box'>
					<?php 
include"pesan_error.php";?>



<?php 
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
<?php 
if($action=="EditData"){                                                       
$FormProses = "proses_users_tokens.php?action=userstokens_updatedata";
$Submit_Button = "UPDATE DATA......";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('users_tokens.php')\" >";
$tokenid = $_GET['id'];
$detail_token = Select_Detail_Users_Tokens( $tbl_userstokens, $tokenid );
}





if( !isset($action) ){
$FormProses = "proses_users_tokens.php?action=userstokens_tambahdata";
$Submit_Button = "ADD DATA...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('users_tokens.php')\" >";
}
?>

<?php 
include"users_form_userstokens.php"; ?>

<br>

<?php 
include"users_list_userstokens.php"; ?>

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
            </div></td>
          </tr>
        </table>         
		
		

<?php 
include"tmpl_footer.php"; ?>
 
		
		
		
</body>
</html>
<?php 
}
?>