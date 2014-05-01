<?php 
$KodeKeamananhalaman  = "token_publicusers";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='kontenform'>
  <td width="100%" height='35' align='center'>
  
<?php 
$_SESSION['item_data_perhalaman'] = $_GET['data_perhalaman'];
		if( $_SESSION['item_data_perhalaman'] == ''){
			$dataPerhalaman = 20;
			$_SESSION['item_data_perhalaman']	= "20";
		}else{
			$dataPerhalaman = $_SESSION['item_data_perhalaman'];
		}

if(isset($_GET['data_perhalaman'])){
 	$nohalaman = $_GET['data_perhalaman'];
 	$dataperhalaman_x = "data_perhalaman=" . $_GET['data_perhalaman'];
}else{
 	$nohalaman = 1;
 	$dataperhalaman_x = "";
}
$offset = ($nohalaman - 1) * $dataPerhalaman;

		$QryNumItemusers =  modeling_publicusershistoriakses_listall( $tbl_publicusers_historiakses );
		
		$HitungJumlahItemusers  = mysql_num_rows($QryNumItemusers);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;
		
		$posisihalaman  = $_SERVER['PHP_SELF'] . "?$dataperhalaman_x";
		
		$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItemusers ,$dataPerhalaman, $nohalaman, $halaman );

?>

<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="2%">&nbsp;</td>
                       <td width="8%"><span class="style9">halaman  </span></td>
                       <td width="2%"><div align="center"><span class="style9">:</span></div></td>
                       <td width="56%">
					   
<div class="pagination"><?php 
echo $tampilkanhalamannya?>  </div>

					   </td>
                     </tr>
      </table>




  
<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
  <td height="31" class='judulform'>No.</td>
  <td class='judulform'>Waktu</td>
  <td class='judulform'>Nama</td>
  <td class='judulform'>Email</td>
  <td class='judulform'>IP Address </td>
</tr>

<?php 
$Qry_ListData_users = modeling_publicusershistoriakses_listAll_By_page( $tbl_publicusers_historiakses , $offset , $dataPerhalaman);

$List_JumlahDatausers = mysql_num_rows($Qry_ListData_users);

							
while( $row = mysql_fetch_object($Qry_ListData_users)){
$row_user_posting = modeling_PublicUsers_Select_Detail( $tbl_publicusers, $row->userid );

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
?>
<tr  valign='top' bgcolor='<?php 
echo $BG ?>' onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
echo $BG ?>'">

<td width='3%' height="36">   
 <div align="center"><?php 
echo $no  ?>.
</div></td>
 
<td width="24%"><?php 
echo harienglish($row->login) ?>, <?php 
echo bulanenglish($row->login) ?>

<br>
Start : <?php 
echo $row->timelogin ?>
<br>
End : <?php 
echo $row->timelogout ?>
</td>
<td width="26%"><?php 
echo strtoupper($row_user_posting->namadepan) ?> (<?php 
echo strtoupper($row_user_posting->namapanggilan)?>) </td>
<td width="26%"><?php 
echo $row->email ?></td>
<td width="21%"><?php 
echo $row->ip ?></td>
<?php 
/* 
token_publicusers
*/		  
?>
</tr>
<?php 
$no ++;
}
?>

</table>
  
  
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="2%">&nbsp;</td>
                       <td width="8%"><span class="style9">halaman  </span></td>
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