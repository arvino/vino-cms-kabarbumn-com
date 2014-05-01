
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
$titlewebsites = "PRINT USERS SUDAH AKTIFASI ";
?>


<html>
<head>

<?php 
include"head.php"; ?>
</head>
 
<body>


 
<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];
  
?>



<table width="100%"  border="0" cellpadding="0" cellspacing="0">

<tr valign="middle">
  <td>&nbsp;</td>
  <td colspan="4">
  
  
  
<div class="link_action">
<ul class="link_action">
<li class="link_action"> 
<a class="link_action" href="#" onClick="window.print();return false">
Print This halaman
</a>
</li>
	  
<li class="link_action"> 
<a class="link_action" href="#" onClick="window.close();return false">
Close
</a>
</li>
	  
</ul>
</div>







</td>
  </tr>
</table>


<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
 
<tr class='judulform'>
  <td width="91" height="27" align='center'>No.</td>
  <td width="342" align='left'>Waktu Aktifasi</td>
  <td width="658">Nama &amp; Email  </td>
  </tr>

<?php 
$result = ListUsers_All_Aktif( $tbl_users );
 
?>
 
<?php 
$no = 1;
while( $row_users_detail = mysql_fetch_object($result) ){
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
$row_users_detail->tanggalaktif
?>


<tr  valign='top' bgcolor="<?php 
echo $BG ?>" onMouseOver="this.bgColor='#FFFFD7'" onMouseOut="this.bgColor='<?php 
print $BG ?>'">

<td height="59" align='center'> <?php 
echo $no ?> </td>
<td align='left'>
<?php 
echo harienglish(substr($row_users_detail->tanggalaktif,0,10))  ?>, <?php 
echo bulanenglish(substr($row_users_detail->tanggalaktif,0,10))  ?> 
<br>
Pukul : <?php 
echo substr($row_users_detail->tanggalaktif,12,8) ?></td>
<td>

<div class="Font_Item_Judul">
<?php 
echo $row_users_detail->username ?>
</div>
<br>
<?php 
echo $row_users_detail->email  ?></td>
</tr>
<?php 
$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
<div class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#' onClick="JavaScript_Konfirmasi_Itemsoplog( <?php 
echo $row_soplog->id ?> , <?php 
echo $iditem ?> )" class="link_delete"> Delete </a>	</li>
</ul>	 
</div>
<?php 
} ?>


<?php 
$no++;
}
?>
</table>
 

</body>
</html>

<?php 
} ?>


