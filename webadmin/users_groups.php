<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];

?>


<?php 
if( $sesi_id == "" ){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
}else{
include"kelas_function.php";
?>


<html>
<head>

<?php 
include"head.php"; ?>
</head>
 
<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image: url(images/bghalaman.png);background-repeat:no-repeat;
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
         </table></td>
         <td width="78%"><div align="center">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
                 <td background="images/box/B2_Batas_Atas.png"> </td>
                 <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
               </tr>
               <tr valign="top">
                 <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
                 <td background="images/box/B2_Latar.png"> <span class="JudulKanal_box1">USERS GROUPS</span>
                     <hr class='line_box'>
                     <?php 
include"pesan_error.php";?>


<?php 
$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
                     <?php 
if( !isset($action) ){
$FormProses = "proses_users_groups.php?action=usersgroups_tambahdata";
$submit_button = "ADD DATA...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('users_groups.php')\" >";
}




?>
                     <?php 
include"users_form_usersgroups.php"; ?>
                     <hr class='line_box'>
                     <ul>
                       <?php 
$result_users_roles = Select_All_Users_Roles_By_Urutan( $tbl_usersroles );
while($data_users_roles = mysql_fetch_object($result_users_roles)){
$result_groups = Select_All_Users_Groups_By_RolesId( $tbl_usersgroups, $data_users_roles->secroleid );
$detail_roles = Select_Detail_Users_Roles( $tbl_usersroles, $data_users_roles->secroleid );
?>
                       <li>
                         <hr>
                         <b><u><?php 
echo $detail_roles->secrolename ?> &nbsp; : </u></b>
                         <ul>
                           <?php 
while($data_users_groups = mysql_fetch_object($result_groups)){
	
		$detail_token = Select_Detail_Users_Tokens( $tbl_userstokens, $data_users_groups->tokenid )
	
		?>
                           <li>  <?php 
echo strtoupper($detail_token->tokenname) ?> &nbsp; [ <a href='#' onClick="JavaScript_Konfirmasi( <?php 
echo $data_users_groups->id ?> )" >x</a> ] </li>
                           <?php 
}
		?>
                         </ul>
                       </li>
                       <?php 
}
?>
                       <?php 
} ?>
                   </ul></td>
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
} ?>