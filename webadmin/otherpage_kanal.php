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
<?php 
$mode = $_GET['mode']; ?>
<?php 
if(isset($mode)){?>
	<script type="text/javascript">
	function JavaScript_Konfirmasi( idkategori, id ){
		var answer = confirm ("Are you sure want to delete this file.")
		if (answer)
		window.location="proses_otherpage_subkanal.php?action=subkanal_hapusdata&id=" + id 
		else
		window.location="otherpage_kanal.php?idkategori=" + idkategori +"&mode=SubSection"
	}
	</script> 
<?php 
}else{ ?>
	<script type="text/javascript">
	function JavaScript_Konfirmasi( id ){
		var answer = confirm ("Are you sure want to delete this file.")
		if (answer)
		window.location="proses_otherpage_kanal.php?action=kanal_hapusdata&id=" + id 
		else
		window.location="otherpage_kanal.php"
	}
	</script>
<?php 
} ?>
</head>
 
<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image: url(images/bghalaman.png);background-repeat:no-repeat;
background-position:top;background-attachment:fixed;">


<?php 
include('tmpl_header.php'); ?>
   
<!-- HEADER -->
   
   
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
       <tr valign="top">
         <td width="22%">
           <table width="204" border="0" cellspacing="0" cellpadding="0">
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
				 <span class="JudulKanal_box1">SECTION OTHERPAGE MANAGER </span>
				 <hr class='line_box'>
                     <?php 
include"pesan_error.php";?>




<?php 
$KodeKeamananhalaman  = "token_otherpage";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
include"access_denied.php";
	
}else{

?>


<?php 
$mode = $_GET['mode'];
$action = $_GET['action'];
if($mode=="SubSection"){
	 include"otherpage_form_subkanal.php";
	 include"otherpage_list_subkanal.php"; 
}else{

	if($action=="EditData"){                                                       
		$FormotherpageKategori_Action = "proses_otherpage_kanal.php?action=kanal_updatedata";
		$otherpagekategori_submitbutton = "UPDATE DATA......";
		$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('otherpage_kanal.php')\" >";
		
		$idkategori = $_GET['id'];
		$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $idkategori );
	}

	if( !isset($action) ){
		$FormotherpageKategori_Action = "proses_otherpage_kanal.php?action=kanal_tambahdata";
		$otherpagekategori_submitbutton = "Add Data...";
		$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('otherpage_kanal.php')\" >";
	}
	?>
	<?php 
include"otherpage_form_kanal.php"; ?>
						 <br>
	<?php 
include"otherpage_list_kanal.php"; ?>
	
	
<?php 
}}
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
include('tmpl_footer.php'); ?>


</body>
</html>
<?php 
} ?>