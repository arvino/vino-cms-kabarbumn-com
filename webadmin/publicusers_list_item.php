<?php 
/* 
token_publicusers
*/
$KodeKeamananhalaman  = "token_publicusers";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	include"access_denied.php";
}else{
?>
<?php 
$action = $_GET['action'];

if( isset($_POST['users_search']) ){
	$cari = $_POST['users_search'];
}else{
	$cari = $_GET['cari'];
}
?>
<?php 
if($action=="publicusers_search"){
	$Hitung_PencarianUsers =  modeling_GetJML_Search_PublicUsers_Account_ALL( $tbl_publicusers, $cari );  
?>
<div class='text_pencarian'>
	Found <?php 
echo $Hitung_PencarianUsers ?> member's with keyword "<?php 
echo $cari ?>" .
</div>
<br>
<?php 
}
?>

<?php 
if( $action == "publicusers_search" ){
	$List_JumlahDataUsers =  modeling_GetJML_Search_PublicUsers_Account_ALL( $tbl_publicusers, $cari );   /* Hitung Data Item */
}

if( $action == "publicusers_viewall" ){
	$QryNumItemUsers = modeling_ListPublicUsers_All( $tbl_publicusers );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}


if( $action == "publicusers_viewactive" ){  
	$QryNumItemUsers = modeling_PublicUsers_ListData_ViewByGroupUsers_Statusbaru( $tbl_publicusers );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
 
}


if( !isset($action)){  
	$QryNumItemUsers = modeling_ListPublicUsers_All( $tbl_publicusers );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}
 
?>

<?php 
if($List_JumlahDataUsers == 0){
?>
<?php 
}else{
?>

<?php 
$action = $_GET['action'];

if( $action == "publicusers_search" ){ /* Query All Users */
	$List_JumlahDataUsers = modeling_List_Search_PublicUsers_Account_ALL( $tbl_publicusers, $cari  ); /* Hitung Data Item */
}

if( $action == "publicusers_viewall" ){  /* Query All Users */
	$QryNumItemUsers = modeling_ListPublicUsers_All( $tbl_publicusers );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}

if( $action == "publicusers_viewaktif" ){  /* Query All Users */
	$QryNumItemUsers = modeling_ListPublicUsers_All_Aktif( $tbl_publicusers );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}

if( !isset($action) ){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemUsers = modeling_ListPublicUsers_All( $tbl_publicusers );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}

?> 
 
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 

LIST MEMBER <?php 
if(!isset($action)){
echo "SORT BY MOST POPULAR";

}	  
?>
	  
<?php 
echo $Userskategori_keterangan ?>  
	  
<?php 
echo $Userssubkategori_keterangan ?> 
	  
	  </td>
</tr>
<tr class='kontenform'>
  <td height='35' align='center'>
  
<?php 
$dataPerhalaman = 10;
$_SESSION['item_data_perhalaman']	= "10";
		 
if(isset($_GET['data_perhalaman'])){
 	$nohalaman = $_GET['data_perhalaman'];
 	$dataperhalaman_x = "data_perhalaman=" . $_GET['data_perhalaman'];
}else{
 	$nohalaman = 1;
 	$dataperhalaman_x = "";
}
$offset = ($nohalaman - 1) * $dataPerhalaman;


if( $action == "publicusers_search" ){ /* If Action */
	$QryNumUsers = modeling_List_Search_PublicUsers_Account_ALL( $tbl_publicusers, $cari  );
} 

if( $action == "publicusers_viewall" ){ /* Internal - Jika Action sama dengan view list */
	$QryNumUsers = modeling_ListPublicUsers_All( $tbl_publicusers );
}

if( $action == "publicusers_viewaktif" ){  
	$QryNumUsers = modeling_ListPublicUsers_All_Aktif( $tbl_publicusers );
}


if( !isset($action) ){
	$QryNumUsers = modeling_ListPublicUsers_All( $tbl_publicusers );
}

		$HitungJumlahUsers  = mysql_num_rows( $QryNumUsers );
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;
		
		
if($action == "publicusers_search" ){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?cari=$cari&action=Users_Search&$dataperhalaman_x";
}

if($action == "publicusers_viewall" ){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?action=Users_ViewList&$dataperhalaman_x";
}


if($action == "publicusers_viewaktif" ){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?action=Users_ViewList_Aktif&$dataperhalaman_x";
}


if( !isset($action)){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?$dataperhalaman_x";
}

		$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahUsers ,$dataPerhalaman, $nohalaman, $halaman );

?>


<?php 
if( $action == "publicusers_search" ){
 
	$Qry_ListData_Users = modeling_Search_PublicUsers_Account_ALL($tbl_publicusers, $cari , $offset , $dataPerhalaman );
	$List_JumlahData_Users =  modeling_GetJML_Search_PublicUsers_Account_ALL( $tbl_publicusers, $cari ); /* Hitung Data Item */
	
}


if( $action == "publicusers_viewall" ){
	$Qry_ListData_Users = modeling_ListPublicUsers_All_By_page( $tbl_publicusers , $offset , $dataPerhalaman ); 
	$List_JumlahDataUsers = mysql_num_rows($Qry_ListData_Users);
}

if( $action == "publicusers_viewaktif" ){
	$Qry_ListData_Users = modeling_ListPublicUsers_All_Aktif_By_halaman( $tbl_publicusers , $offset , $dataPerhalaman ); 
	$List_JumlahDataUsers = mysql_num_rows($Qry_ListData_Users);
}

if( !isset($action)){ 
	$Qry_ListData_Users = modeling_ListPublicUsers_All_By_page( $tbl_publicusers , $offset , $dataPerhalaman );
	$List_JumlahDataUsers = mysql_num_rows($Qry_ListData_Users);
}

?>


<table width="100%"  border="0" cellpadding="0" cellspacing="0">

<tr>
<td width="2%">&nbsp;</td>
<td width="8%"><span class="style9"> page  </span></td>
<td width="2%"><div align="center"><span class="style9">:</span></div></td>
<td width="56%">
					   
<div class="pagination"> <?php 
echo $tampilkanhalamannya?>  </div>

</td>
</tr>

</table>
  
<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
<td width='7%' height='35' class='judulform'>  <div align="center">NO. </div></td>
<td colspan='3' class='judulform'> <div align="center"> DESCRIPTION </div> 

</td>
  </tr>

<?php 
while( $row = mysql_fetch_object($Qry_ListData_Users)){
  
 
if( $row->status == 0){
 	$Status_Publish = "<a href='publicusers_proses.php?action=publicusers_statusaktif&id=$row->id&status=1'>  Ya  </a>";
 	$Status_Unpublish = "<b> Tidak </b>";
 } else {
 	$Status_Publish = "<b> Ya </b>";
 	$Status_Unpublish = "<a href='publicusers_proses.php?action=publicusers_statusaktif&id=$row->id&status=0'> Tidak </a>";
}
$Button_Status = "$Status_Publish | $Status_Unpublish";

 

if( $row->statusbaru == 0){
 	$StatusInternal_Publish = "<a href='publicusers_proses.php?action=publicusers_statusbaru&id=$row->id&status=1'> Ya </a>";
 	$StatusInternal_Unpublish = "<b> Tidak </b>";
 } else {
 	$StatusInternal_Publish = "<b> Ya </b>";
 	$StatusInternal_Unpublish = "<a href='publicusers_proses.php?action=publicusers_statusbaru&id=$row->id&status=0'> Tidak </a>";
}
$Button_StatusBaru = "$StatusInternal_Publish | $StatusInternal_Unpublish";

	
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
?>

<tr  valign='top' bgcolor='<?php 
echo $BG ?>' onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
echo $BG ?>'">

<td width='7%'>   
 <div align="center"><?php 
echo $no  ?>.
</div></td>
 
<td width="23%">
<div align="center">
<?php 
if( $row->gambarbesar != "" ){
?>
<img src="../<?php 
echo $row->direktori ?><?php 
echo $row->gambarkecil ?>" width="100">
<?php 
}else{
?>
<img src="images/no_image.png" width="80">
<?php 
}
?>
</div>

  <p><b><?php 
echo strtoupper($row->username) ?></b>
  
    <br>
  
 
  
 

  </p>
  <p><br>
    <br>
    <br>
    
</p></td>
<td width="57%">

<?php 
echo $row->email ?>

<hr class='line_box'>
Active status :
<?php 
echo $Button_Status ?>

<hr class='line_box'>

New status :
<?php 
echo $Button_StatusBaru ?>
<hr class='line_box'>

   
	
	<div class="link_action" align="center">
        <ul class="link_action">
		  <li class="link_action"> <a href='publicusers_account.php?id=<?php 
echo $row->id ?>&action=publicusers_viewdetail' class="link_action"> View detail </a> </li>
          <li class="link_action"> <a href='publicusers_account.php?id=<?php 
echo $row->id ?>&action=publicusers_updateprofile' class="link_action"> Edit profile </a> </li>
		  <li class="link_action"> <a href='publicusers_account.php?id=<?php 
echo $row->id ?>&action=publicusers_updatepassword' class="link_action"> Change password </a> </li>
        </ul>
    </div>
	


</td>
<td width="13%"> 






<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td width="18%">
    
	
	<div class="link_delete" align="center">
        <ul class='link_delete'>
          <li class='link_delete'> <a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row->id ?> )" class="link_delete"> Delete </a> </li>
        </ul>
    </div>
	
	</td>
  </tr>
</table>


</td>


</tr>
<?php 
$no ++;
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
}} ?>