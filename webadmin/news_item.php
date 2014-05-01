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
 

	$idkategori = $_GET['idkategori'];
	$idkategori = Filter_Get($idkategori);
	if($idkategori == "" || $idkategori == "none"){
		$idkategori = 0;
	}else if($idkategori <> is_numeric($idkategori)){
		$idkategori = 0;
	}else{
		$idkategori = Filter_Get($idkategori);
	}


	$idsubkategori = $_GET['idsubkategori'];
	$idsubkategori = Filter_Get($idsubkategori);
	if($idsubkategori == "" || $idsubkategori == "none"){
		$idkategorisub = 0;
	}else if($idsubkategori <> is_numeric($idsubkategori)){
		$idsubkategori = 0;
	}else{
		$idsubkategori = Filter_Get($idsubkategori);
	}


	$idkategorisub = $_GET['idsubkategori'];
	$idkategorisub = Filter_Get($idkategorisub);
	if($idkategorisub == "" || $idkategorisub == "none"){
		$idkategorisub = 0;
	}else if($idkategorisub <> is_numeric($idkategorisub)){
		$idkategorisub = 0;
	}else{
		$idkategorisub = Filter_Get($idkategorisub);
	}




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


function Ambil_SubKategori(str1,str2){
	if (str1=="")
  	{
  		document.getElementById("output_subkategori").innerHTML="";
  		return;
  	}
	
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
		xmlhttp.onreadystatechange=function()
  		{
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
   		{
    		document.getElementById("output_subkategori").innerHTML=xmlhttp.responseText;
    	}
 	 }
	xmlhttp.open("GET","news_tampilsubkategori.php?idkategori="+str1+"&idkategorisub="+str2,true);
	xmlhttp.send();
}

</script>

<script type="text/javascript">


function JavaScript_Konfirmasi_Item( idkategori, idkategorisub, id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_news_item.php?action=item_hapusdata&idkategori=" + idkategori + "&idkategorisub=" + idkategorisub + "&id=" + id
	else
	window.location="news_item.php?idkategori=" + idkategori + "&idsubkategori=" + idkategorisub + "&id=" + id + "&action=ViewList"
}



function JavaScript_Konfirmasi_ItemLampiran( iditem , id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_news_itemlampiran.php?action=itemlampiran_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="news_item_lampiran.php?iditem=" + iditem
}


function JavaScript_Konfirmasi_ItemKomentar( id, iditem ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_news_itemkomentar.php?action=itemkomentar_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="news_item_komentar.php?iditem=" + iditem
}

 
function JavaScript_Konfirmasi_Itemrevisi( id, iditem ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_news_itemrevisi.php?action=itemrevisi_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="news_item_revisi.php?iditem=" + iditem
}


function JavaScript_Konfirmasi_Itemlogakses( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_news_itemlogakses.php?action=itemrevisi_hapusdata&id=" + id 
	else
	window.location="news_item_itemlogakses.php?id=" + id
}

 
function OpenWindow(theURL,winName,features) {  
  window.open(theURL,winName,features);
}
 

</script> 


</head>
 

<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image:url('images/bghalaman.png');background-repeat:no-repeat;
background-position:top;background-attachment:fixed;" 
<?php 
if($action=="EditData"){
?>
onFocus="Ambil_SubKategori(<?php 
echo $idkategori ?>, <?php 
echo $idkategorisub ?>)"
<?php 
}
?>
>
   
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
include"menu_news.php";?>
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
<?php 
$idkategori = $_GET["idkategori"];
$idkategorisub = $_GET["idsubkategori"];
$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub )

?>


<span class="JudulKanal_box1"> NEWS ARTICLE <?php 
echo strtoupper($detail_kanal->keterangan) ?> <?php 
echo strtoupper($detail_subkanal->keterangan) ?></span>
<hr class='line_box'>
					 
<?php 
include"pesan_error.php";?>

<?php 
$KodeKeamananhalaman  = "token_news";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
<?php 
include"menu_subkanal_news.php"; ?>
<?php 
include"menu_news1.php";?>
 
<?php 
if(!isset($action)){
?>


<?php 
}else{

/* Form Komentar */
	$FormnewsItemKomentar_Action = "proses_news_itemkomentar.php?action=itemkomentar_tambahdata";
	$newskategori_submitbutton = "Add Comment...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('news_item_komentar.php?iditem=$iditem')\" >";


	switch ($action){
		Case 'ViewList': 

		include"news_list_item.php";
		break;
		
		Case 'search': 

		include"news_list_item.php";
		break;
	
		Case 'ViewDetail': 
		echo "
		<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='kontenform'>
		<td>";
		include"news_detail_item.php";
		$iditem = $id;
		echo "<br>";
		include"news_list_itemlampiran.php";
		echo "
		</td>
		</tr>
		</table>
		";	
		break;


		Case 'FormEntry': 
		include"news_form_item.php";
		$iditem = $id;
		echo "
		<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='kontenform'>
		<td>";
		include"news_list_itemlampiran.php";
		echo "
		</td>
		</tr>
		</table>
		";	
		break;

		Case 'EditData': 
		include"news_form_item.php";
		$iditem = $id;
		echo "
		<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='kontenform'>
		<td>";
		include"news_list_itemlampiran.php";
		echo "
		</td>
		</tr>
		</table>
		";	

		break;


	}		
		
}
?>

<?php 
}
?>                 </td>
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


<script type="text/javascript">
   window.onload = function(){ 
      try{
         $("#content_rte").jqrte();
      }
      catch(e){}
   } 

   $(document).ready(function() {
         $("#content_rte").jqrte_setIcon();
         $("#content_rte").jqrte_setContent();
   });
</script>


   
</body>
</html>
<?php 
} ?>