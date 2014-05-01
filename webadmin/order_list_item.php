<?php 
/*
token_home
token_konfigurasi
token_usersadmin
token_usersgroup
token_order
token_publicusers
token_booking
token_news
token_gallery
token_otherhalaman
token_statistik
token_frontpage
token_help
*/
$KodeKeamananhalaman  = "token_order";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( isset($_POST['order_search']) ){
	$cari = $_POST['order_search'];
}else{
	$cari = $_GET['cari'];
}
?>


<?php 
$idkategori = $_GET["idkategori"];
$r_dataorder_kategori = Select_Kategori_order_By_Id( $tbl_orderkategori, $idkategori );
$r_orderkategori = mysql_fetch_object($r_dataorder_kategori);

$orderkategori_id = $r_orderkategori->id;

if( $idkategori == 0 ){ 
	$orderkategori_id = 0;
	$orderkategori_keterangan = "<font color='red'>   </font>";
}else{

	$orderkategori_keterangan = $r_orderkategori->keterangan;
	$orderkategori_keterangan = strtoupper($orderkategori_keterangan);

}


	$idsubkategori = $_GET["idsubkategori"];
	$idkategorisub = $_GET["idsubkategori"];
	
	
	$r_ordersubkategori = Select_SubKategori_order_By_Id( $tbl_orderkategorisub, $idsubkategori );
	 
	$ordersubkategori_id = $r_ordersubkategori->id;

if( $idsubkategori == 0 ){ 
	$ordersubkategori_id = 0;
	$ordersubkategori_keterangan = "<font color='red'>  </font>";
}else{

	$ordersubkategori_keterangan = $r_ordersubkategori->keterangan;
	$ordersubkategori_keterangan = strtoupper($ordersubkategori_keterangan);
}



if( $idsubkategori == 0 ){ 
$ordersubkategori_id = 0;
$ordersubkategori_keterangan = "";
}

?>


<?php 
if($action=="search"){
$Hitung_Pencarianorder =  GetJML_Search_Item_order_ALL( $tbl_order, $cari ); /* Hitung Data Item */
?>
<div class='text_pencarian'>
Ditemukan <?php 
echo $Hitung_Pencarianorder ?> item dengan kata kunci "<?php 
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
	$List_JumlahDataorder =  GetJML_Search_Item_order_ALL( $tbl_order, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	$QryNumItemorder = orderItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_order , $idkategori, $idkategorisub );
	$List_JumlahDataorder = mysql_num_rows($QryNumItemorder);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemorder = orderItem_BacaDataListing_Terpopuler_All( $tbl_order );
	$List_JumlahDataorder = mysql_num_rows($QryNumItemorder);
}
 
?>

<?php 
if($List_JumlahDataorder == 0){

// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
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
echo $orderkategori_keterangan ?>  
	  
<?php 
echo $ordersubkategori_keterangan ?> 
	  
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



if( $action == "search" ){ /* If Action */
	$QryNumItemorder = Search_Item_order_All_data($tbl_order, $cari );
} 

if( $action == "ViewList" ){ /* Internal - Jika Action sama dengan view list */
	$QryNumItemorder = orderItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_order , $idkategori, $idkategorisub );
}

if( !isset($action)){
	$QryNumItemorder = orderItem_BacaDataListing_Terpopuler_All( $tbl_order );
	
}
		
		$HitungJumlahItemorder  = mysql_num_rows($QryNumItemorder);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;

if($action == "search" ){
	$posisihalaman  = "order_item.php?cari=$cari&action=search&$dataperhalaman_x";
}

if($action == "ViewList" ){
	$posisihalaman  = "order_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
}

if( !isset($action) ){
	$posisihalaman  = "order_main.php?$dataperhalaman_x";
}


$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItemorder ,$dataPerhalaman, $nohalaman, $halaman );


?>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "search" ){
	$Qry_ListData_order = Search_Item_order_ALL($tbl_order, $cari , $offset , $dataPerhalaman );
	$List_JumlahDataorder =  GetJML_Search_Item_order_ALL( $tbl_order, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	$Qry_ListData_order = List_order_File_Group_With_Limitpage( $tbl_order, $idkategori, $idsubkategori , $offset, $dataPerhalaman); 
	$List_JumlahDataorder = mysql_num_rows($Qry_ListData_order);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$Qry_ListData_order = orderItem_BacaDataListing_Terpopuler_All_Bypage( $tbl_order , $offset , $dataPerhalaman ); 
	$List_JumlahDataorder = mysql_num_rows($Qry_ListData_order);
}

?>

<?php 
if($List_JumlahDataorder == 0){
// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
?>

<?php 
}else{
?>
 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="1%">&nbsp;</td>
                       <td width="10%"><span class="style9">halaman  </span></td>
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
		
	<td colspan='2' class='judulform'> <div align="center">KONTEN ITEM</div> 
	  <div align="center"></div></td>
  </tr>
<?php 
while( $row = mysql_fetch_object($Qry_ListData_order)){

$listdata_itemorder_id = $row->id;

$listdata_itemorder_idupline = $row->idupline;
 
$listdata_itemorder_idkategori = $row->idkategori;

$listdata_itemorder_idkategorisub = $row->idkategorisub;

$listdata_itemorder_judul = $row->judul;

$listdata_itemorder_judul = substr($listdata_itemorder_judul,0,150);

$listdata_itemorder_judulinggris = $row->judulinggris;

$listdata_itemorder_subjudul = $row->subjudul;

$listdata_itemorder_subjudul = substr($listdata_itemorder_subjudul,0,150);

$listdata_itemorder_subjudulinggris = $row->subjudulinggris;

$listdata_itemorder_preview = $row->deskripsi;

$listdata_itemorder_preview = substr($listdata_itemorder_preview,0,150);

$listdata_itemorder_tglpost = $row->tglpost;

$listdata_itemorder_jampost = $row->jampost;

$listdata_itemorder_tgltampil = $row->tgltampil;

$listdata_itemorder_jamtampil = $row->jamtampil;

$listdata_itemorder_dilihat = $row->dilihat;

$listdata_itemorder_statustampil = $row->statustampil;
 
$listdata_itemorder_idusers = $row->idusers;

$listdata_itemorder_idadmin = $row->idadmin;

$listdata_itemorder_direktorigambar = $row->direktorigambar;				





$row_kanal = Select_Detail_Kategori_order( $tbl_orderkategori, $row->idkategori ); /* Select Detail Kanal */

$row_subkanal = Select_Detail_KategoriSub_order( $tbl_orderkategorisub, $row->idkategorisub ); /* Select Detail Sub Kanal */

$row_user_posting = Users_Select_Detail( $tbl_users, $row->idusers ); /* Select Detail Users */




$link_itemorder_lihatdata = "order_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemorder_id&action=ViewDetail";

$link_itemorder_editdata = "order_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemorder_id&action=EditData";

$link_itemorder_hapusdata = "order_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemorder_id&action=DeleteData";

$link_komentarorder_lihatdata = "
javascript:MM_openBrWindow('?Sec=order&SubSec=AdminorderKomentar&iditem=$listdata_itemorder_id','OpenWindow_order_Komentar','scrollbars=yes,width=600,height=600')
";

$link_fileorder_lihatdata = "
javascript:MM_openBrWindow('?Sec=order&SubSec=AdminorderItem&iditem=$listdata_itemorder_id','OpenWindow_order_FileLampiran','scrollbars=yes,width=600,height=600')
";


  
if( $listdata_itemorder_statustampil == 0){

 $Publish = "<a href='order_proses.php?action=item_updatestatus&id=$row->id&&status=1'>Publish</a>";
 $Unpublish = "Unpublish";
 } else {
 $Publish = "Publish";
 $Unpublish = "<a href='admin-order-statuspublikasi.php?id=$row->id&&status=0'>Unpublish</a>";

}

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

//$query_orderitem = TotalAllDataorderItemLampiran( $tbl_order, $row->id );
//$hitungdata_orderitem = mysql_num_rows($query_orderitem);
$hitungdata_orderitemlampiran = TotalAllDataorderItemLampiran( $tbl_orderfile, $row->id );
 

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

 
<div class="Font_Item_Judul">
<a href='order_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=ViewDetail' class='Font_Item_Judul'>
<?php 
echo $listdata_itemorder_judul ?>
</a>
</div>

<br>

<b> <?php 
echo $row_kanal->keterangan ?> <?php 
echo $row_subkanal->keterangan ?> </b>
&nbsp; &nbsp;
<br>
<br>
<?php 
if( $sesi_aksesmodul == "admin_system" ){
?>
<?php 
echo harienglish($row->tglpost) ?>, <?php 
echo bulanenglish($row->tglpost) ?> | <?php 
echo $row->jampost ?>
<?php 
} ?>
<?php 
if($row->headline == 0){
	$Publish = "<a href='proses_order_item.php?action=item_headlinetampil&idkategori=$row->idkategori&idkategorisub=$row->idkategorisub&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_order_item.php?action=item_headlinetampil&idkategori=$row->idkategori&idkategorisub=$row->idkategorisub&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>

<br>
<br>
 
<?php 
echo htmlspecialchars_decode($row->deskripsi) ?>
<br>
<br>

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>


<?php 
if( $row->gambarbesar == "" ){
$gambar_itemorder = "<b> <font color='red'> NO PICTURE <br> AVAILABLE </font> </b>";
}else{
$root_file = "../";
$show_gambar = $root_file . $row->direktorigambar . $row->gambarbesar;
$gambar_itemorder = "<img src='$show_gambar' border='0' width='250'>";
}
?>
<?php 
echo $gambar_itemorder ?> 

<br>
<br>
Hit Counter  :  <?php 
echo $listdata_itemorder_dilihat ?> 
    
     </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> </td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="82%">
	
	
<?php 
/* Action Modul order */ ?>
<div  id='link_action' class='link_action'>

<ul>
<?php 
if( $sesi_aksesmodul == "anggota_biasa" ){
}else{
?>
<li> <a href='order_item_lampiran.php?iditem=<?php 
echo $row->id ?>'> File [ <?php 
echo $hitungdata_orderitemlampiran ?> ] </a> </li>
 
<?php 
} ?>
<?php 
if( $sesi_aksesmodul == "anggota_biasa" ){
}else{
?>
 
</li>
<?php 
} ?>
<li> <a href='order_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=ViewDetail'> View Detail </a> </li>
<?php 
if( $sesi_aksesmodul == "anggota_biasa" ){
}else{
?>
<li> <a href='order_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=EditData'> 
Edit Item </a> 
</li>
<?php 
}
?>
</ul>	 
</div>





</td>
<td width="18%">
<?php 
if( $sesi_aksesmodul == "anggota_biasa" ){
}else{
?>
<span class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row->idkategori ?>, <?php 
echo $row->idkategorisub ?>, <?php 
echo $row->id ?> )" class="link_delete"> Delete </a>
	</li>
</ul>	 
</span>
<?php 
}
?>
	
	</td>
  </tr>
</table>
<br>
<br>

</td>
<?php 
/* */		  
?>
</tr>
<?php 
$no ++;
}
?>

</table>
  
  
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="10%"><span class="style9">halaman  </span></td>
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