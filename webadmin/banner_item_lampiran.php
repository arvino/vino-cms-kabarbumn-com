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
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST ');
}else{
include"kelas_function.php";
?>


<html>
<head>

<?php 
include"head.php"; ?>
<script type="text/javascript">


function JavaScript_Konfirmasi_ItemLampiran( iditem , id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_banner_itemlampiran.php?action=itemlampiran_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="banner_item_lampiran.php?iditem=" + iditem
}

 
function OpenWindow(theURL,winName,features) {  
  window.open(theURL,winName,features);
}
 
</script> 

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
   <td background="images/templates/frame_vinocms_r9_c2.png" width="11" height="19"> </td>
   <td background="images/templates/frame_vinocms_r9_c4.png">     
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
include"menu_banner.php";?>
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
                 <td background="images/box/B2_Latar.png"> <span class="JudulKanal_box1">banner ITEM FILE LAMPIRAN</span>
                     <hr class='line_box'>
                     <?php 
include"pesan_error.php";?>



<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))){
	
	include"access_denied.php";
	
}else{

?>


<?php 
$iditem = $_GET['iditem'];
$row_item = Select_Detail_Item_banner($tbl_banner, $iditem);
if( !isset($action) ){
	$FormbannerItemLampiran_Action = "proses_banner_itemlampiran.php?action=itemlampiran_tambahdata";
	$bannerkategori_submitbutton = "Tambah Lampiran...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('banner_item_lampiran.php?iditem=$iditem')\" >";
}


if( $action == "EditData" ){
	$id = $_GET['id'];
	$FormbannerItemLampiran_Action = "proses_banner_itemlampiran.php?action=itemlampiran_updatedata";
	$bannerkategori_submitbutton = "Update Lampiran...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('banner_item_lampiran.php?iditem=$iditem')\" >";
	$detail_itemlampiran = ViewDetail_bannerFileLampiran( $tbl_bannerfile, $id );
	if($detail_itemlampiran->statustampil == 1)
	{
		$cek_statustampil = "checked";
	}else{
		$cek_statustampil = "";
	}

}

?>

<?php 
include"menu_banner2.php";?>
                     <br>
<?php 
include"banner_preview_item.php";?>
                     <br>
<?php 
include"banner_list_itemlampiran.php";?>
                     <br>
<?php 
include"banner_form_itemlampiran.php";?>
<?php 
} ?>                 

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
     </table></td>
   <td background="images/templates/frame_vinocms_r9_c6.png" width="10" height="19"> </td>
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
   <td background="images/templates/frame_vinocms_r14_c4.png" height="19"><?php 
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