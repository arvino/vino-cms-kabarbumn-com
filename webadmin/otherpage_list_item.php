<?php 
$KodeKeamananhalaman  = "token_otherpage";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( isset($_POST['otherpage_search']) ){
	$cari = $_POST['otherpage_search'];
}else{
	$cari = $_GET['cari'];
}
?>


<?php 
$idkategori = $_GET["idkategori"];
$r_dataotherpage_kategori = Select_Kategori_otherpage_By_Id( $tbl_otherpagekategori, $idkategori );
$r_otherpagekategori = mysql_fetch_object($r_dataotherpage_kategori);

$otherpagekategori_id = $r_otherpagekategori->id;

if( $idkategori == 0 ){ 
	$otherpagekategori_id = 0;
	$otherpagekategori_keterangan = "<font color='red'>   </font>";
}else{

	$otherpagekategori_keterangan = $r_otherpagekategori->keterangan;
	$otherpagekategori_keterangan = strtoupper($otherpagekategori_keterangan);

}


	$idsubkategori = $_GET["idsubkategori"];
	$idkategorisub = $_GET["idsubkategori"];
	
	
	$r_otherpagesubkategori = Select_SubKategori_otherpage_By_Id( $tbl_otherpagekategorisub, $idsubkategori );
	 
	$otherpagesubkategori_id = $r_otherpagesubkategori->id;

if( $idsubkategori == 0 ){ 
	$otherpagesubkategori_id = 0;
	$otherpagesubkategori_keterangan = "<font color='red'>  </font>";
}else{

	$otherpagesubkategori_keterangan = $r_otherpagesubkategori->keterangan;
	$otherpagesubkategori_keterangan = strtoupper($otherpagesubkategori_keterangan);
}

if( $idsubkategori == 0 ){ 
$otherpagesubkategori_id = 0;
$otherpagesubkategori_keterangan = "";

}

?>


<?php 
if($action=="search"){
$Hitung_Pencarianotherpage =  GetJML_Search_Item_otherpage_ALL( $tbl_otherpage, $cari ); /* Hitung Data Item */
?>
<div class='text_pencarian'>
Found <?php 
echo $Hitung_Pencarianotherpage ?> item for keyword "<?php 
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
	$List_JumlahDataotherpage =  GetJML_Search_Item_otherpage_ALL( $tbl_otherpage, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){

	if(!isset($idsubkategori)){
		$QryNumItemotherpage = otherpageItem_BacaDataListing_ByKategori_Terkini_All( $tbl_otherpage , $idkategori ); 
	}else{
		$QryNumItemotherpage = otherpageItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_otherpage , $idkategori, $idkategorisub );
	}

	$List_JumlahDataotherpage = mysql_num_rows($QryNumItemotherpage);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemotherpage = otherpageItem_BacaDataListing_Terkini_All( $tbl_otherpage );
	$List_JumlahDataotherpage = mysql_num_rows($QryNumItemotherpage);
}
 
?>

<?php 
if($List_JumlahDataotherpage == 0){

// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
?>



<?php 
}else{
?>


 
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 
	  
	  LIST ITEM OTHERPAGE <?php 
if(!isset($action)){
echo "SORT BY LATEST";

}	  
?>
	  
<?php 
echo $otherpagekategori_keterangan ?>  
	  
<?php 
echo $otherpagesubkategori_keterangan ?> </td>
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
	$QryNumItemotherpage = Search_Item_otherpage_All_data($tbl_otherpage, $cari );
} 

if( $action == "ViewList" ){ /* Internal - Jika Action sama dengan view list */
 
	if(!isset($idsubkategori)){
		$QryNumItemotherpage = otherpageItem_BacaDataListing_ByKategori_Terkini_All( $tbl_otherpage , $idkategori ); 
	}else{
		$QryNumItemotherpage = otherpageItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_otherpage , $idkategori, $idkategorisub );
	}


}

if( !isset($action)){
	$QryNumItemotherpage = otherpageItem_BacaDataListing_Terkini_All( $tbl_otherpage );
	
}
		
		$HitungJumlahItemotherpage  = mysql_num_rows($QryNumItemotherpage);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;

if($action == "search" ){
	$posisihalaman  = "otherpage_item.php?cari=$cari&action=search&$dataperhalaman_x";
}

if($action == "ViewList" ){
	$posisihalaman  = "otherpage_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
	if(!isset($idsubkategori)){
		$posisihalaman  = "otherpage_item.php?idkategori=$idkategori&action=ViewList&$dataperhalaman_x";
	}else{
		$posisihalaman  = "otherpage_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
	}


}

if( !isset($action) ){
	$posisihalaman  = "otherpage_main.php?$dataperhalaman_x";
}


$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItemotherpage ,$dataPerhalaman, $nohalaman, $halaman );


?>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];

$action = $_GET['action'];

if( $action == "search" ){
	$Qry_ListData_otherpage = Search_Item_otherpage_ALL($tbl_otherpage, $cari , $offset , $dataPerhalaman );
	$List_JumlahDataotherpage =  GetJML_Search_Item_otherpage_ALL( $tbl_otherpage, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	if(!isset($idsubkategori)){
		$Qry_ListData_otherpage = List_otherpage_File_GroupBySection_With_LimitPage( $tbl_otherpage, $idkategori, $offset, $dataPerhalaman); 
	}else{
		$Qry_ListData_otherpage = List_otherpage_File_Group_With_Limitpage( $tbl_otherpage, $idkategori, $idsubkategori , $offset, $dataPerhalaman); 
	}
	$List_JumlahDataotherpage = mysql_num_rows($Qry_ListData_otherpage);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$Qry_ListData_otherpage = otherpageItem_BacaDataListing_Terkini_All_ByPage( $tbl_otherpage , $offset , $dataPerhalaman ); 
	$List_JumlahDataotherpage = mysql_num_rows($Qry_ListData_otherpage);
}

?>

<?php 
if($List_JumlahDataotherpage == 0){
// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
?>

<?php 
}else{
?>
 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="1%">&nbsp;</td>
                       <td width="10%"><span class="style9">Page</span></td>
                       <td width="3%"><div align="center"><span class="style9">:</span></div></td>
                       <td width="86%">
					   
<div class="pagination"><?php 
echo $tampilkanhalamannya?>  </div>

					   </td>
                     </tr>
      </table>

<form action="" method="get">

<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
	<td width='5%' height='35' class='judulform'>  <div align="center">No. </div></td>
		
	<td colspan='2' class='judulform'> <div align="center">Description</div> 
	  </td>
  </tr>
<?php 
while( $row_otherpage_item = mysql_fetch_object($Qry_ListData_otherpage)){

$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $row_otherpage_item->idkategori ); /* Select Detail Kanal */

$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $row_otherpage_item->idkategorisub ); /* Select Detail Sub Kanal */

$row_user_posting = Users_Select_Detail( $tbl_users, $row_otherpage_item->idusers ); /* Select Detail Users */

$link_itemotherpage_lihatdata = "otherpage_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$row_otherpage_item->id&action=ViewDetail";

$link_itemotherpage_editdata = "otherpage_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$row_otherpage_item->id&action=EditData";

$link_itemotherpage_hapusdata = "otherpage_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$row_otherpage_item->id&action=DeleteData";

$link_komentarotherpage_lihatdata = "
javascript:MM_openBrWindow('?Sec=otherpage&SubSec=AdminotherpageKomentar&iditem=$row_otherpage_item->id','OpenWindow_otherpage_Komentar','scrollbars=yes,width=600,height=600')
";

$link_fileotherpage_lihatdata = "
javascript:MM_openBrWindow('?Sec=otherpage&SubSec=AdminotherpageItem&iditem=$row_otherpage_item->id','OpenWindow_otherpage_FileLampiran','scrollbars=yes,width=600,height=600')
";
  
if( $listdata_itemotherpage_statustampil == 0){

 $Publish = "<a href='otherpage_proses.php?action=item_updatestatus&id=$row_otherpage_item->id&&status=1'>Publish</a>";
 $Unpublish = "Unpublish";
 
 } else {
 
 $Publish = "Publish";
 $Unpublish = "<a href='admin-otherpage-statuspublikasi.php?id=$row_otherpage_item->id&&status=0'>Unpublish</a>";

}

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

$hitungdata_otherpageitemlampiran = TotalAllDataotherpageItemLampiran( $tbl_otherpagefile, $row_otherpage_item->id );

?>

<tr  valign='top' bgcolor='<?php 
echo $BG ?>' onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
echo $BG ?>'">

<td width='5%'>   
 <div align="center"><?php 
echo $no  ?>.
   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td>&nbsp;</td>
     </tr>
   </table>
 </div>
</td>
 
<td width="0%"> </td>


<td width="95%"> 


<?php 
if( $row_otherpage_item->gambarbesar == "" ){
$gambar_itemotherpage = "";
}else{
$root_file = "../";
$show_gambar = $root_file . $row_otherpage_item->direktorigambar . $row_otherpage_item->gambarkecil;
$gambar_itemotherpage = "<img src='$show_gambar' width='80px' border='0' align='left'>";
}
?>
<?php 
echo $gambar_itemotherpage ?>


<div class="Font_Item_Judul">
<a href='otherpage_item.php?idkategori=<?php 
echo $row_otherpage_item->idkategori ?>&idsubkategori=<?php 
echo $row_otherpage_item->idkategorisub ?>&id=<?php 
echo $row_otherpage_item->id ?>&action=ViewDetail' class='Font_Item_Judul'>
<?php 
echo $row_otherpage_item->judul ?>
</a>
</div>

<?php 
echo harienglish($row_otherpage_item->tglpost) ?>, <?php 
echo bulanenglish($row_otherpage_item->tglpost) ?> | <?php 
echo $row_otherpage_item->jampost ?>

<br>

<?php 
echo $row_kanal->keterangan ?> <?php 
echo $row_subkanal->keterangan ?>
&nbsp; 
 
<?php 
if($row->headline == 0){
	$Publish = "<a href='proses_otherpage_item.php?action=item_headlinetampil&idkategori=$row_otherpage_item->idkategori&idkategorisub=$row_otherpage_item->idkategorisub&id=$row_otherpage_item->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_otherpage_item.php?action=item_headlinetampil&idkategori=$row_otherpage_item->idkategori&idkategorisub=$row_otherpage_item->idkategorisub&id=$row_otherpage_item->id&status=0' class='link_action'> Unpublish </a>";
}
?>
<br>
Hit Counter  :  <?php 
echo $row_otherpage_item->dilihat ?> 
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>


       
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
/* Action Modul otherpage */ ?>
<div  id='link_action' class='link_action'>

<ul>

<li> <a href='otherpage_item_lampiran.php?iditem=<?php 
echo $row_otherpage_item->id ?>'> File Extra [ <?php 
echo $hitungdata_otherpageitemlampiran ?> ] </a> </li>


<li> <a href='otherpage_item.php?idkategori=<?php 
echo $row_otherpage_item->idkategori ?>&idsubkategori=<?php 
echo $row_otherpage_item->idkategorisub ?>&id=<?php 
echo $row_otherpage_item->id ?>&action=ViewDetail'> View Detail </a> </li>

<li> <a href='otherpage_item.php?idkategori=<?php 
echo $row_otherpage_item->idkategori ?>&idsubkategori=<?php 
echo $row_otherpage_item->idkategorisub ?>&id=<?php 
echo $row_otherpage_item->id ?>&action=EditData'> 
Edit Data </a> 
</li>


</ul>	 
</div>





</td>
<td width="18%">



<span class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row_otherpage_item->idkategori ?>, <?php 
echo $row_otherpage_item->idkategorisub ?>, <?php 
echo $row_otherpage_item->id ?> )" class="link_delete"> Delete </a>
	</li>
</ul>	 
</span>

	
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
</form>
  
  
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="10%"><span class="style9">Page</span></td>
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