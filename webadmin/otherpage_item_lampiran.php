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
<script type="text/javascript">


function JavaScript_Konfirmasi_ItemLampiran( iditem , id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_otherpage_itemlampiran.php?action=itemlampiran_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="otherpage_item_lampiran.php?iditem=" + iditem
}

 
function OpenWindow(theURL,winName,features) {  
  window.open(theURL,winName,features);
}
 
</script> 

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
include"menu_otherpage.php";?>
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
                 <td background="images/box/B2_Latar.png"> <span class="JudulKanal_box1">OTHERPAGE EXTRA FILE</span>
MANAGER                     
  <hr class='line_box'>
                     <?php 
include"pesan_error.php";?>
					 
					 
                     <?php 
$KodeKeamananhalaman  = "token_otherpage";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))){
	
	include"access_denied.php";
	
}else{

?>


<?php 
$iditem = $_GET['iditem'];
$row_item = Select_Detail_Item_otherpage($tbl_otherpage, $iditem);
if( !isset($action) ){
	$FormotherpageItemLampiran_Action = "proses_otherpage_itemlampiran.php?action=itemlampiran_tambahdata";
	$otherpagekategori_submitbutton = "Add Data...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('otherpage_item_lampiran.php?iditem=$iditem')\" >";
}


if( $action == "EditData" ){
	$id = $_GET['id'];
	$FormotherpageItemLampiran_Action = "proses_otherpage_itemlampiran.php?action=itemlampiran_updatedata";
	$otherpagekategori_submitbutton = "Update Data...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('otherpage_item_lampiran.php?iditem=$iditem')\" >";
	$detail_itemlampiran = ViewDetail_otherpageFileLampiran( $tbl_otherpagefile, $id );
	if($detail_itemlampiran->statustampil == 1)
	{
		$cek_statustampil = "checked";
	}else{
		$cek_statustampil = "";
	}

}

?>

<?php 
include"menu_otherpage2.php";?>
                     <br>
<?php 
include"otherpage_preview_item.php";?>
                     <br>
<?php 
include"otherpage_list_itemlampiran.php";?>
                     <br>
<?php 
include"otherpage_form_itemlampiran.php";?>
<?php 
} ?></td>
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