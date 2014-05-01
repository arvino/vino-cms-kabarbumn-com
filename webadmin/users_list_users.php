<?php 
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
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
if($action=="Users_Search"){
	$Hitung_PencarianUsers =  GetJML_Search_Users_Account_ALL( $tbl_users, $cari );  
?>
<div class='text_pencarian'>
	Found <?php 
echo $Hitung_PencarianUsers ?> users with keyword "<?php 
echo $cari ?>" .
</div>
<br>
<?php 
}
?>

<?php 
if( $action == "Users_Search" ){
	$List_JumlahDataUsers =  GetJML_Search_Users_Account_ALL( $tbl_users, $cari );   /* Hitung Data Item */
}

if( $action == "Users_ViewList" ){
	$QryNumItemUsers = Users_ListData_ViewByGroupUsers( $tbl_users );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}


if( $action == "Users_ViewList_Aktif" ){ /* List Users Aktif */
	$QryNumItemUsers = Users_ListData_ViewByGroupUsers_Statusbaru( $tbl_users );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
 
}


if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemUsers = Users_ListData_ViewByGroupUsers( $tbl_users );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}
 
?>

<?php 
if($List_JumlahDataUsers == 0){

// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
?>


<?php 
}else{
?>

<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "Users_Search" ){ /* Query All Users */
	$List_JumlahDataUsers = List_Search_Users_Account_ALL($tbl_users, $cari  ); /* Hitung Data Item */
}

if( $action == "Users_ViewList" ){  /* Query All Users */
	$QryNumItemUsers = ListUsers_All( $tbl_users );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}


if( $action == "Users_ViewList_Aktif" ){  /* Query All Users */
	$QryNumItemUsers = ListUsers_All_Aktif( $tbl_users );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}




if( !isset($action) ){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemUsers = ListUsers_All( $tbl_users );
	$List_JumlahDataUsers = mysql_num_rows($QryNumItemUsers);
}

?> 
 
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 
	  LIST DATA USERS ACCOUNT
	  
<?php 
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


if( $action == "Users_Search" ){ /* If Action */
	$QryNumUsers = List_Search_Users_Account_ALL( $tbl_users, $cari  );
} 

if( $action == "Users_ViewList" ){ /* Internal - Jika Action sama dengan view list */
	$QryNumUsers = ListUsers_All( $tbl_users );
	
}

if( $action == "Users_ViewList_Aktif" ){  
	$QryNumUsers = ListUsers_All_Aktif( $tbl_users );
	
}


if( !isset($action) ){
	$QryNumUsers = ListUsers_All( $tbl_users );
}

		$HitungJumlahUsers  = mysql_num_rows( $QryNumUsers );
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;
		
		
if($action == "Users_Search" ){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?cari=$cari&action=Users_Search&$dataperhalaman_x";
}

if($action == "Users_ViewList" ){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?action=Users_ViewList&$dataperhalaman_x";
}


if($action == "Users_ViewList_Aktif" ){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?action=Users_ViewList_Aktif&$dataperhalaman_x";
}


if( !isset($action)){
	$posisihalaman  = $_SERVER['PHP_SELF'] . "?$dataperhalaman_x";
}

		$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahUsers ,$dataPerhalaman, $nohalaman, $halaman );

?>


<?php 
if( $action == "Users_Search" ){
 
	$Qry_ListData_Users = Search_Users_Account_ALL($tbl_users, $cari , $offset , $dataPerhalaman );
	$List_JumlahData_Users =  GetJML_Search_Users_Account_ALL( $tbl_users, $cari ); /* Hitung Data Item */
	
}


if( $action == "Users_ViewList" ){
	$Qry_ListData_Users = ListUsers_All_By_page( $tbl_users , $offset , $dataPerhalaman ); 
	$List_JumlahDataUsers = mysql_num_rows($Qry_ListData_Users);
}



if( $action == "Users_ViewList_Aktif" ){
	$Qry_ListData_Users = ListUsers_All_Aktif_By_halaman( $tbl_users , $offset , $dataPerhalaman ); 
	$List_JumlahDataUsers = mysql_num_rows($Qry_ListData_Users);
}



if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$Qry_ListData_Users = ListUsers_All_By_page( $tbl_users , $offset , $dataPerhalaman );
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
<td width='7%' height='35' class='judulform'>  <div align="center">No. </div></td>
<td colspan='3' class='judulform'> <div align="center"> USERS </div> 

</td>
  </tr>

<?php 
while( $row = mysql_fetch_object($Qry_ListData_Users)){
  
$detail_roles = Select_Detail_Users_Roles( $tbl_usersroles, $row->aksesmodul );


if( $row->status == 0){
 	$Status_Publish = "<a href='proses_users_internal.php?action=usersaccount_statusaktif&id=$row->id&status=1'>  Ya  </a>";
 	$Status_Unpublish = "<b> Tidak </b>";
 } else {
 	$Status_Publish = "<b> Ya </b>";
 	$Status_Unpublish = "<a href='proses_users_internal.php?action=usersaccount_statusaktif&id=$row->id&status=0'> Tidak </a>";
}
$Button_Status = "$Status_Publish | $Status_Unpublish";


if( $row->statusinternal == 0){
 	$StatusInternal_Publish = "<a href='proses_users_internal.php?action=usersaccount_statusinternal&id=$row->id&status=1'> Ya </a>";
 	$StatusInternal_Unpublish = "<b> Tidak </b>";
 } else {
 	$StatusInternal_Publish = "<b> Ya </b>";
 	$StatusInternal_Unpublish = "<a href='proses_users_internal.php?action=usersaccount_statusinternal&id=$row->id&status=0'> Tidak </a>";
}
$Button_StatusInternal = "$StatusInternal_Publish | $StatusInternal_Unpublish";


if( $row->statusbaru == 0){
 	$StatusInternal_Publish = "<a href='proses_users_internal.php?action=usersaccount_statusbaru&id=$row->id&status=1'> Ya </a>";
 	$StatusInternal_Unpublish = "<b> Tidak </b>";
 } else {
 	$StatusInternal_Publish = "<b> Ya </b>";
 	$StatusInternal_Unpublish = "<a href='proses_users_internal.php?action=usersaccount_statusbaru&id=$row->id&status=0'> Tidak </a>";
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
 
<td width="33%">

<b><?php 
echo strtoupper($row->username) ?></b>

<br>
<?php 
if( $sesi_aksesmodul == "ANGGOTA" ){
}else{
?>
ID : <?php 
echo $row->idpegawai ?>
<br>
<?php 
} ?>


<?php 
echo $detail_roles->secrolename ?> 

<br>
<br>
<?php 
if($row->tanggalaktif !=""){
?> Activate date : 
<br />
<?php 
echo harienglish(substr($row->tanggalaktif,0,10)) ?>, <?php 
echo bulanenglish(substr($row->tanggalaktif,0,10)) ?> | 
<?php 
echo substr($row->tanggalaktif,12,8)?>


<?php 
}else{ ?>

Activation date not recorded.

<?php 
} ?>


</td>
<td width="33%">

<?php 
echo $row->email ?>


<?php 
$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<hr class='line_box'>
Activation status :
<?php 
echo $Button_Status ?>

<hr class='line_box'>

Internal status :
<?php 
echo $Button_StatusInternal ?>
<hr class='line_box'>


New status :
<?php 
echo $Button_StatusBaru ?>
<hr class='line_box'>
Access modul :
<?php 
echo $row->aksesmodul ?>
<hr class='line_box'>


<?php 
} 
?>


</td>
<td width="27%"> 


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


<?php 
$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{
?>

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="82%">
      <div class="link_action" align="center">
        <ul class="link_action">
          <li class="link_action"> <a href='users_account.php?id=<?php 
echo $row->id ?>&action=Users_FormEntry' class="link_action"> Edit Users </a> </li>
        </ul>
    </div></td>
    <td width="18%">
      <div class="link_delete" align="center">
        <ul class='link_delete'>
          <li class='link_delete'> <a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row->id ?> )" class="link_delete"> Delete </a> </li>
        </ul>
    </div></td>
  </tr>
</table>

<?php 
} ?>

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
                       <td width="8%">page</td>
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