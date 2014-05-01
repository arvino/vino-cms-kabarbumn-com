<?php 
$KodeKeamananhalaman  = "token_guestbook";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( isset($_POST['guestbook_search']) ){
	$cari = $_POST['guestbook_search'];
}else{
	$cari = $_GET['cari'];
}
?>


<?php 
$idkategori = $_GET["idkategori"];
$idsubkategori = $_GET["idsubkategori"];
$idkategorisub = $_GET["idsubkategori"];
?>


<?php 
if($action=="search"){
$Hitung_Pencarianguestbook = guestbook_item_count_all_search_data( $tbl_guestbook, $cari ); /* Hitung Data Item */
?>
<div class='text_pencarian'>
Ditemukan <?php 
echo $Hitung_Pencarianguestbook ?> item dengan kata kunci "<?php 
echo $cari ?>" .
</div>
<br>
<?php 
}
?>

<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "search" ){
	$List_JumlahDataguestbook =  guestbook_item_count_all_search_data( $tbl_guestbook, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	$QryNumItemguestbook = modeling_guestbook_item_all_data( $tbl_guestbook );
	$List_JumlahDataguestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemguestbook = guestbookItem_BacaDataListing_Terpopuler_All( $tbl_guestbook );
	$List_JumlahDataguestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );
}
 
?>

<?php 
if($List_JumlahDataguestbook == 0){

?>

<?php 
}else{
?>

<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 
	  
	  LIST DATA 
	    <?php 
if(!isset($action)){
echo "SORT BY MOST POPULAR";

}	  
?>
	  
<?php 
echo $guestbookkategori_keterangan ?>  
	  
<?php 
echo $guestbooksubkategori_keterangan ?> 
	  
	  </td>
</tr>
<tr class='kontenform'>
  <td height='35' align='center'>
  
<?php 
$_SESSION['item_data_perhalaman'] = $_GET['data_perhalaman'];
		if( $_SESSION['item_data_perhalaman'] == ''){
			$dataPerhalaman = 10;
			$_SESSION['item_data_perhalaman']	= "10";
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



if( $action == "search" ){  
	$QryNumItemguestbook = modeling_guestbook_item_search_all_data($tbl_guestbook, $cari );
} 

if( $action == "ViewList" ){ 
	$QryNumItemguestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );
}

if( !isset($action)){
	$QryNumItemguestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );
	
}
		
		$HitungJumlahItemguestbook  = modeling_guestbook_item_all_data_count( $tbl_guestbook );
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;

if($action == "search" ){
	$posisihalaman  = "guestbook_item.php?cari=$cari&action=search&$dataperhalaman_x";
}

if($action == "ViewList" ){
	$posisihalaman  = "guestbook_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
}

if( !isset($action) ){
	$posisihalaman  = "guestbook_main.php?$dataperhalaman_x";
}

$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItemguestbook ,$dataPerhalaman, $nohalaman, $halaman );

?>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "search" ){
	$Qry_ListData_guestbook = modeling_guestbook_item_search_all_data_byhalaman($tbl_guestbook, $cari , $offset , $dataPerhalaman );
	$List_JumlahDataguestbook =  modeling_guestbook_item_count_all_search_data( $tbl_guestbook, $cari ); 
}

if( $action == "ViewList" ){
	$Qry_ListData_guestbook = modeling_guestbook_item_all_data_byhalaman( $tbl_guestbook , $offset , $dataPerhalaman); 
	$List_JumlahDataguestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );
}

if( !isset($action)){  
	$Qry_ListData_guestbook = modeling_guestbook_item_all_data_byhalaman( $tbl_guestbook , $offset , $dataPerhalaman); 
	$List_JumlahDataguestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );
}

?>

<?php 
if($List_JumlahDataguestbook == 0){

?>

<?php 
}else{
?>
 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="1%">&nbsp;</td>
                       <td width="10%"><span class="style9">page  </span></td>
                       <td width="3%"><div align="center"><span class="style9">:</span></div></td>
                       <td width="86%">
					   
<div class="pagination"><?php 
echo $tampilkanhalamannya?>  </div>

					   </td>
                     </tr>
      </table>

<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
	<td width='5%' height='35' class='judulform'>  <div align="center">No. </div></td>
		
	<td colspan='2' class='judulform'> <div align="center">Description</div> 
	  </td>
  </tr>
<?php 
while( $row = mysql_fetch_object($Qry_ListData_guestbook)){


$row_user_posting = Users_Select_Detail( $tbl_users, $row->idadmin );

$detail_member = modeling_PublicUsers_Select_Detail( $tbl_publicusers, $row->idusers );

$link_itemguestbook_lihatdata = "guestbook_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemguestbook_id&action=ViewDetail";

$link_itemguestbook_editdata = "guestbook_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemguestbook_id&action=EditData";

$link_itemguestbook_hapusdata = "guestbook_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemguestbook_id&action=DeleteData";

if( $listdata_itemguestbook_statustampil == 0){

 $Publish = "<a href='guestbook_proses.php?action=item_updatestatus&id=$row->id&&status=1'>Publish</a>";
 $Unpublish = "Unpublish";
 } else {
 $Publish = "Publish";
 $Unpublish = "<a href='admin-guestbook-statuspublikasi.php?id=$row->id&&status=0'>Unpublish</a>";

}

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";


?>

<tr  valign='top' bgcolor='<?php 
echo $BG ?>' onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
echo $BG ?>'">

<td width='5%'>   
 <div align="center"><?php 
echo $no  ?>.
</div></td>
 
<td width="0%"> </td>


<td width="95%"> 


<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td width="24%">

<?php 
if($detail_member->gambarkecil == ""){ ?>
	<img src="images/no_image.png" width="80">
<?php 
} else { ?>
	<img src="../<?php 
echo $detail_member->direktori ?><?php 
echo $detail_member->gambarkecil ?>" width="100">
<?php 
} ?>

	</td>
    <td width="76%">
<div class="Font_Item_Judul">
<?php 
echo strtoupper($detail_member->namadepan); ?> <?php 
echo strtoupper($detail_member->namabelakang); ?> (<?php 
echo strtoupper($detail_member->namapanggilan); ?>)
</div>

 hari <?php 
echo strtolower(harienglish($row->tglpost)) ?>, <?php 
echo strtolower(bulanenglish($row->tglpost)) ?> - jam <?php 
echo $row->jampost ?> menulis :

 <div class="Font_Item_Judul">
<a href='guestbook_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=ViewDetail' class='Font_Item_Judul'>
<?php 
echo $row->judul ?>
</a>
</div>

<br>
<?php 
echo htmlspecialchars_decode($row->deskripsi) ?>


<br>
<br>
 

	
	
	</td>
  </tr>
</table>




<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="82%">
	
	
<?php 
if($row->statustampil == 0){
	$Publish = "<a href='guestbook_proses_item.php?action=item_statustampil&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='guestbook_proses_item.php?action=item_statustampil&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>
<?php 
echo $Publish ?> <?php 
echo $Unpublish ?>
<br>
<br>

<div  id='link_action' class='link_action'>
<ul>
<li> <a href='guestbook_item.php?id=<?php 
echo $row->id ?>&action=ViewDetail'> View Detail </a> </li>
<li> <a href='guestbook_item.php?id=<?php 
echo $row->id ?>&action=EditData'> Edit Item </a> </li>
</ul>	 
</div>


</td>
<td width="18%">
 
<span class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row->id ?> )" class="link_delete"> Delete </a>
	</li>
</ul>	 
</span>
 
	
	</td>
  </tr>
</table>
<br>
<br>

</td>

</tr>
<?php 
$no ++;
}
?>

</table>
  
  
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="10%"><span class="style9">page  </span></td>
      <td width="3%"><div align="center"><span class="style9">:</span></div></td>
      <td width="86%">
        <div class="pagination"><?php 
echo $tampilkanhalamannya?> </div></td>
    </tr>
  </table>
  
  
  <?php 
} ?>
   
  </td>
</tr>
</table>

<?php 
} ?>
<?php 
} ?>