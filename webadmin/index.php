<?php 
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];

$pesan_error = $_GET['pesan_error'];
if($pesan_error==""){
	$pesan_error = "PLEASE LOGIN FIRST.";
}

if( $sesi_id != "" && $sesi_username != "" && $sesi_email != ""){
header('location:home.php');

}else{

header("location:users_login.php?pesan_error=" . $pesan_error . "");
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
<table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td width="11"><img name="frame_vinocms_r2_c2" src="images/templates/frame_vinocms_r2_c2.png" width="11" height="11" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r2_c4.png" width="949" height="11"> </td>
   <td width="10"><img name="frame_vinocms_r2_c6" src="images/templates/frame_vinocms_r2_c6.png" width="10" height="11" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/templates/frame_vinocms_r3_c2.png" width="11" height="103"> </td>
   <td background="images/templates/frame_vinocms_r3_c4.png">  
   
   
   
   
   
   
   
   
   
   
   
     <?php 
include"header.php";?></td>
   <td background="images/templates/frame_vinocms_r3_c6.png" width="10" height="103"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r4_c2" src="images/templates/frame_vinocms_r4_c2.png" width="11" height="8" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r4_c4.png" width="10" height="8"> </td>
   <td><img name="frame_vinocms_r4_c6" src="images/templates/frame_vinocms_r4_c6.png" width="10" height="8" border="0" alt=""></td>
  </tr>
  <tr valign="top">
   <td background="images/templates/frame_vinocms_r5_c2.png" width="11" height="36"> </td>
   <td background="images/templates/frame_vinocms_r5_c4.png"> 
 <?php 
include"menu_atas.php";?>
 <br>   </td>
   <td background="images/templates/frame_vinocms_r5_c6.png" width="10" height="36"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r6_c2" src="images/templates/frame_vinocms_r6_c2.png" width="11" height="7" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r6_c4.png" width="10" height="7"> </td>
   <td><img name="frame_vinocms_r6_c6" src="images/templates/frame_vinocms_r6_c6.png" width="10" height="7" border="0" alt=""></td>
  </tr>
  <tr valign="top">
   <td background="images/templates/frame_vinocms_r9_c2.png" width="11" height="50"> </td>
   <td background="images/templates/frame_vinocms_r9_c4.png">     
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td width="25%"> <?php 
include"pesan_error.php";?></td>
         <td width="50%">&nbsp;</td>
         <td width="25%">&nbsp;</td>
       </tr>
     </table>    </td>
   <td background="images/templates/frame_vinocms_r9_c6.png" width="10" height="50"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r11_c2" src="images/templates/frame_vinocms_r11_c2.png" width="11" height="9" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r11_c4.png" width="10" height="9"> </td>
   <td><img name="frame_vinocms_r11_c6" src="images/templates/frame_vinocms_r11_c6.png" width="10" height="9" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/templates/frame_vinocms_r12_c2.png" width="11" height="19"> </td>
   <td background="images/templates/frame_vinocms_r12_c4.png" width="10" height="19">&nbsp;</td>
   <td background="images/templates/frame_vinocms_r12_c6.png" width="10" height="19"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r13_c2" src="images/templates/frame_vinocms_r13_c2.png" width="11" height="9" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r13_c4.png" width="10" height="9"> </td>
   <td><img name="frame_vinocms_r13_c6" src="images/templates/frame_vinocms_r13_c6.png" width="10" height="9" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/templates/frame_vinocms_r14_c2.png" width="11" height="19"> </td>
   <td background="images/templates/frame_vinocms_r14_c4.png" width="10" height="19"><?php 
include"footer.php"; ?></td>
   <td background="images/templates/frame_vinocms_r14_c6.png" width="10" height="19"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r15_c2" src="images/templates/frame_vinocms_r15_c2.png" width="11" height="7" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r15_c4.png" width="10" height="7"> </td>
   <td><img name="frame_vinocms_r15_c6" src="images/templates/frame_vinocms_r15_c6.png" width="10" height="7" border="0" alt=""></td>
  </tr>
</table>
</body>
</html>
<?php 
} ?>