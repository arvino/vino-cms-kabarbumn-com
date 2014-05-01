<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
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
   
   
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
       <td background="images/box/B2_Batas_Atas.png"> </td>
       <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
     </tr>
     <tr valign="top">
       <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
       <td background="images/box/B2_Latar.png"> <span class="JudulKanal_box1"> WEB STATISTIC</span>
           
            
 
 <?php 
include"box_preview_visitor.php"?>
 
 
 </td>
       <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
     </tr>
     <tr>
       <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
       <td background="images/box/B2_Batas_Bawah.png"> </td>
       <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
     </tr>
   </table>
   
   
<?php 
include"tmpl_footer.php"; ?>
</body>
</html>
<?php 
} ?>