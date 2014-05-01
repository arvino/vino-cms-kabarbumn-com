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
include"head_editor.php"; ?>

<script>
function Return_Kategori(targ,selObj,restore){  
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}


function Return_URL(targ,selObj,restore){
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}


function Open_Window(theURL,winName,features) {  
  window.open(theURL,winName,features);
}

</script>

<script type="text/javascript">


function JavaScript_Konfirmasi_Item( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="guestbook_proses_item.php?action=item_hapusdata&id=" + id
	else
	window.location="guestbook_item.php?id=" + id + "&action=ViewList"
}


 
</script> 


</head>
 

<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image:url('images/bghalaman.png');background-repeat:no-repeat;
background-position:top;background-attachment:fixed;" >
   
   <?php 
include"tmpl_header.php"; ?>
   
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
include"guestbook_menu.php";?>
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

 
<span class="JudulKanal_box1"> halaman  DATA GUEST BOOK / TESTIMONIAL  </span>
<hr class='line_box'>

 					 
<?php 
include"pesan_error.php";?>



<?php 
$KodeKeamananhalaman  = "token_guestbook";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
include"guestbook_menu_1.php";?>
 
<?php 
if(!isset($action)){
?>


<?php 
}else{

 

	switch ($action){
		Case 'ViewList': 
		echo "<br>";

		include"guestbook_list_item.php";
		break;
		
		Case 'search': 
		echo "<br>";

		include"guestbook_list_item.php";
		break;
	
		Case 'ViewDetail': 
		include"guestbook_detail_item.php";
		break;


		Case 'FormEntry': 
		include"guestbook_form_item.php";
		break;

		Case 'EditData': 
		include"guestbook_form_item.php";
		break;


	}		
		
}
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
         </div></td>
       </tr>
     </table>

<?php 
include"tmpl_footer.php"; ?>

 </body>
</html>
<?php 
} ?>