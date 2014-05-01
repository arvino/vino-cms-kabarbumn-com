<?php 
/*
token_usersadmin
token_usersgroup
*/


$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

 
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 
	  LIST DATA USERS ACCOUNT</td>
</tr>
<tr class='kontenform'>
  <td height='35' align='center'>
  
<?php 
$dataPerhalaman = 7;
$_SESSION['item_data_perhalaman']	= "7";
		 
if(isset($_GET['data_perhalaman'])){
 	$nohalaman = $_GET['data_perhalaman'];
 	$dataperhalaman_x = "data_perhalaman=" . $_GET['data_perhalaman'];
}else{
 	$nohalaman = 1;
 	$dataperhalaman_x = "";
}
$offset = ($nohalaman - 1) * $dataPerhalaman;

		$QryNumUsers = ListUsers_All( $tbl_users );
		
		$HitungJumlahUsers  = mysql_num_rows($QryNumUsers);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;
		
		$posisihalaman  = $_SERVER['PHP_SELF'] . "?action=ViewList&$dataperhalaman_x";
		
		$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahUsers ,$dataPerhalaman, $nohalaman, $halaman );

?>

<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="2%">&nbsp;</td>
                       <td width="8%"><span class="style9">page  </span></td>
                       <td width="2%"><div align="center"><span class="style9">:</span></div></td>
                       <td width="56%">
					   
<div class="pagination"><?php 
echo $tampilkanhalamannya?>  </div>

					   </td>
                     </tr>
      </table>




  
<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
	<td width='7%' height='35' class='judulform'>  <div align="center">No. </div></td>
		
	<td colspan='3' class='judulform'> <div align="center"> USERS </div> 
	  <div align="center"></div></td>
  </tr>

<?php 
$Qry_ListData_Users = ListUsers_All_By_page( $tbl_users , $offset , $dataPerhalaman );

$List_JumlahDataUsers = mysql_num_rows($Qry_ListData_Users);

if($List_JumlahDataUsers == 0){

// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
?>

<tr class='kontenform'>
	<td colspan='4' class='kontenform'> DATA NOT FOUND </td>
</tr>


<?php 
}else{
											
							
while( $row = mysql_fetch_object($Qry_ListData_Users)){
  
$detail_roles = Select_Detail_Users_Roles( $tbl_usersroles, $row->aksesmodul );


if( $row->status == 0){
 	$Status_Publish = "<a href='proses_users.php?action=usersaccount_status&id=$row->id&status=1'>  Ya  </a>";
 	$Status_Unpublish = "<b> Tidak </b>";
 } else {
 	$Status_Publish = "<b> Ya </b>";
 	$Status_Unpublish = "<a href='proses_users.php?action=usersaccount_status&id=$row->id&status=0'> Tidak </a>";
}
$Button_Status = "$Status_Publish | $Status_Unpublish";


if( $row->aksesproses == 0){
 	$AksesProses_Publish = "<a href='proses_users.php?action=usersaccount_aksesproses&id=$row->id&status=1'> Ya </a>";
 	$AksesProses_Unpublish = "<b> Tidak </b>";
 } else {
 	$AksesProses_Publish = "<b> Ya </b>";
 	$AksesProses_Unpublish = "<a href='proses_users.php?action=usersaccount_aksesproses&id=$row->id&status=0'> Tidak </a>";
}
$Button_AksesProses = "$AksesProses_Publish | $AksesProses_Unpublish";


if( $row->statusinternal == 0){
 	$StatusInternal_Publish = "<a href='proses_users.php?action=usersaccount_statusinternal&id=$row->id&status=1'> Ya </a>";
 	$StatusInternal_Unpublish = "<b> Tidak </b>";
 } else {
 	$StatusInternal_Publish = "<b> Ya </b>";
 	$StatusInternal_Unpublish = "<a href='proses_users.php?action=usersaccount_statusinternal&id=$row->id&status=0'> Tidak </a>";
}
$Button_StatusInternal = "$StatusInternal_Publish | $StatusInternal_Unpublish";
	
	
	
	
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
?>

<tr  valign='top' bgcolor='<?php 
echo $BG ?>' onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
echo $BG ?>'">

<td width='7%'>   
 <div align="center"><?php 
echo $no  ?>.
</div></td>
 
<td width="21%">
<b><?php 
echo strtoupper($row->username) ?></b>

<br><br>

 <?php 
echo $detail_roles->secrolename ?> 
</td>
<td width="45%">

<?php 
echo $row->email ?>
<hr class='line_box'>
Activation status :
<?php 
echo $Button_Status ?>

<hr class='line_box'>
Internal users status :
<?php 
echo $Button_StatusInternal ?>

<hr class='line_box'>
Access proses status :
<?php 
echo $Button_AksesProses ?>
<hr class='line_box'></td>
<td width="27%"> 

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="82%">
      <div class="link_action" align="center">
        <ul class="link_action">
          <li class="link_action"> <a href='users_account.php?id=<?php 
echo $row->id ?>&action=EditData' class="link_action"> Edit Users</a> </li>
        </ul>
    </div></td>
    <td width="18%">
      <div class="link_delete" align="center">
        <ul class='link_delete'>
          <li class='link_delete'> <a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row->idkategori ?>, <?php 
echo $row->idkategorisub ?>, <?php 
echo $row->id ?> )" class="link_delete"> Delete </a> </li>
        </ul>
    </div></td>
  </tr>
</table>
<u> </u></td>
<?php 
/* */		  
?>
</tr>
<?php 
$no ++;
}
}

?>

</table>
  
  
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="2%">&nbsp;</td>
                       <td width="8%"><span class="style9">page  </span></td>
                       <td width="2%"><div align="center"><span class="style9">:</span></div></td>
                       <td width="56%">
					   
<div class="pagination"><?php 
echo $tampilkanhalamannya?>  </div>

					   </td>
                     </tr>
      </table>
  
  
  </td>
</tr>
</table>

 <?php 
} ?>