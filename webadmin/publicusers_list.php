<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];
$sesi_statusbaru = $_SESSION['users_statusbaru'];

 


if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:publicusers_login.php?pesan_error=PLEASE LOGIN FIRST.');
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

 
</script>

<script type="text/javascript">

/* Start Function konfirmasi Delete publicusers */
function JavaScript_Konfirmasi_Item( id ){
	var answer = confirm ("Are you sure want to delete this file.")
	if (answer)
	window.location="publicusers_proses.php?action=publicusers_hapusdata&id=" + id
	else
	window.location="publicusers_list.php?action=publicusers_ViewList"
}
/* End Function */

  
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
include"publicusers_menu.php";?>
                
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
				  
<span class="JudulKanal_box1">   MEMBER LISTS  </span>
<hr class='line_box'>
 
	<?php 
$action = $_GET['action'];
		include"publicusers_list_item.php";
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