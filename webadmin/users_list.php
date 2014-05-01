<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];



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
	xmlhttp.open("GET","users_tampilsubkategori.php?idkategori="+str1+"&idkategorisub="+str2,true);
	xmlhttp.send();
}

</script>

<script type="text/javascript">

/* Start Function konfirmasi Delete users */
function JavaScript_Konfirmasi_Item( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users_internal.php?action=usersaccount_hapusdata&id=" + id
	else
	window.location="users_list.php?action=Users_ViewList"
}
/* End Function */


function JavaScript_Konfirmasi_ItemLampiran( iditem , id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users_itemlampiran.php?action=itemlampiran_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="users_item_lampiran.php?iditem=" + iditem
}


function JavaScript_Konfirmasi_ItemKomentar( id, iditem ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users_itemkomentar.php?action=itemkomentar_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="users_item_komentar.php?iditem=" + iditem
}

 
function JavaScript_Konfirmasi_Itemrevisi( id, iditem ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users_itemrevisi.php?action=itemrevisi_hapusdata&iditem="+  iditem  +"&id=" + id 
	else
	window.location="users_item_revisi.php?iditem=" + iditem
}


function JavaScript_Konfirmasi_Itemlogakses( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="proses_users_itemlogakses.php?action=itemrevisi_hapusdata&id=" + id 
	else
	window.location="users_item_itemlogakses.php?id=" + id
}

 
function OpenWindow(theURL,winName,features) {  
  window.open(theURL,winName,features);
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
            <td width="25%"><table width="98%" border="0" cellspacing="0" cellpadding="0">
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
            <td width="75%">
            
<div align="left"> 
            
<?php 
$action = $_GET['action'];
if( $action == "Users_ViewList"){





?>            
            
<?php 
$ukuran_popup_lampiran = "width=650,height=650";
$scrollbar = "scrollbars=yes";
$view_detail_list_users_all = "users_list_aktifasi_print.php";
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

<div class="link_action" align="right">
<ul class="link_action">
	<li class="link_action"> 
	
<a class="link_action" href="javascript:OpenWindow('<?php 
echo $view_detail_list_users_all ?>','printWindowFileLampiran','<?php 
echo $scrollbar ?>,<?php 
echo $ukuran_popup_lampiran ?>')">
  Print List Users Aktif
</a>
	</li>
</ul>
</div>  
<hr>
<br>

 </td>
  </tr>
</table>
            
<?php 
} ?>
            
</div>     
            
            
            
            <div align="center">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
                  <td background="images/box/B2_Batas_Atas.png"> </td>
                  <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
                </tr>
                <tr valign="top">
                  <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
                  <td background="images/box/B2_Latar.png">
				  
				  <span class="JudulKanal_box1">   USERS LISTS  </span>
                    <hr class='line_box'>
 
                
<?php 
$action = $_GET['action'];
include"users_list_users.php";
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
include"tmpl_footer.php";?>		
		
		
		

</body>
</html>
<?php 
} ?>