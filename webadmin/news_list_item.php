<?php 
$KodeKeamananhalaman  = "token_news";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( isset($_POST['news_search']) ){
	$cari = $_POST['news_search'];
}else{
	$cari = $_GET['cari'];
}
?>


<?php 
$idkategori = $_GET["idkategori"];
$r_datanews_kategori = Select_Kategori_news_By_Id( $tbl_newskategori, $idkategori );
$r_newskategori = mysql_fetch_object($r_datanews_kategori);

$newskategori_id = $r_newskategori->id;

if( $idkategori == 0 ){ 
	$newskategori_id = 0;
	$newskategori_keterangan = "<font color='red'>   </font>";
}else{

	$newskategori_keterangan = $r_newskategori->keterangan;
	$newskategori_keterangan = strtoupper($newskategori_keterangan);

}


	$idsubkategori = $_GET["idsubkategori"];
	$idkategorisub = $_GET["idsubkategori"];
	
	
	$r_newssubkategori = Select_SubKategori_news_By_Id( $tbl_newskategorisub, $idsubkategori );
	 
	$newssubkategori_id = $r_newssubkategori->id;

if( $idsubkategori == 0 ){ 
	$newssubkategori_id = 0;
	$newssubkategori_keterangan = "<font color='red'>  </font>";
}else{

	$newssubkategori_keterangan = $r_newssubkategori->keterangan;
	$newssubkategori_keterangan = strtoupper($newssubkategori_keterangan);
}



if( $idsubkategori == 0 ){ 
$newssubkategori_id = 0;
$newssubkategori_keterangan = "";
}

?>


<?php 
if($action=="search"){
$Hitung_Pencariannews =  GetJML_Search_Item_news_ALL( $tbl_news, $cari ); /* Hitung Data Item */
?>
<div class='text_pencarian'>
Found <?php 
echo $Hitung_Pencariannews ?> item for keyword "<?php 
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
	$List_JumlahDatanews =  GetJML_Search_Item_news_ALL( $tbl_news, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){

	if(!isset($idsubkategori)){
		$QryNumItemnews = newsItem_BacaDataListing_ByKategori_Terkini_All( $tbl_news , $idkategori ); 
	}else{
		$QryNumItemnews = newsItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_news , $idkategori, $idkategorisub );
	}

	$List_JumlahDatanews = mysql_num_rows($QryNumItemnews);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItemnews = newsItem_BacaDataListing_Terpopuler_All( $tbl_news );
	$List_JumlahDatanews = mysql_num_rows($QryNumItemnews);
}
 
?>

<?php 
if($List_JumlahDatanews == 0){

// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
?>



<?php 
}else{
?>


 
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 
	  
	  LIST SUB SECTION
	  <?php 
if(!isset($action)){
echo "SORT BY POPULAR";

}	  
?>
	  
<?php 
echo $newskategori_keterangan ?>  
	  
<?php 
echo $newssubkategori_keterangan ?> 
	  
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
	$QryNumItemnews = Search_Item_news_All_data($tbl_news, $cari );
} 

if( $action == "ViewList" ){ /* Internal - Jika Action sama dengan view list */
 
	if(!isset($idsubkategori)){
		$QryNumItemnews = newsItem_BacaDataListing_ByKategori_Terkini_All( $tbl_news , $idkategori ); 
	}else{
		$QryNumItemnews = newsItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_news , $idkategori, $idkategorisub );
	}


}

if( !isset($action)){
	$QryNumItemnews = newsItem_BacaDataListing_Terpopuler_All( $tbl_news );
	
}
		
		$HitungJumlahItemnews  = mysql_num_rows($QryNumItemnews);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;

if($action == "search" ){
	$posisihalaman  = "news_item.php?cari=$cari&action=search&$dataperhalaman_x";
}

if($action == "ViewList" ){
	$posisihalaman  = "news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
	if(!isset($idsubkategori)){
		$posisihalaman  = "news_item.php?idkategori=$idkategori&action=ViewList&$dataperhalaman_x";
	}else{
		$posisihalaman  = "news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
	}


}

if( !isset($action) ){
	$posisihalaman  = "news_main.php?$dataperhalaman_x";
}


$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItemnews ,$dataPerhalaman, $nohalaman, $halaman );


?>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];

$action = $_GET['action'];

if( $action == "search" ){
	$Qry_ListData_news = Search_Item_news_ALL($tbl_news, $cari , $offset , $dataPerhalaman );
	$List_JumlahDatanews =  GetJML_Search_Item_news_ALL( $tbl_news, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	if(!isset($idsubkategori)){
		$Qry_ListData_news = List_news_File_GroupBySection_With_LimitPage( $tbl_news, $idkategori, $offset, $dataPerhalaman); 
	}else{
		$Qry_ListData_news = List_news_File_Group_With_Limitpage( $tbl_news, $idkategori, $idsubkategori , $offset, $dataPerhalaman); 
	}
	$List_JumlahDatanews = mysql_num_rows($Qry_ListData_news);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$Qry_ListData_news = newsItem_BacaDataListing_Terpopuler_All_Bypage( $tbl_news , $offset , $dataPerhalaman ); 
	$List_JumlahDatanews = mysql_num_rows($Qry_ListData_news);
}

?>

<?php 
if($List_JumlahDatanews == 0){
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

<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
	<td width='5%' height='35' class='judulform'>  <div align="center">No. </div></td>
		
	<td colspan='2' class='judulform'> <div align="center">Description</div> 
	  </td>
  </tr>
<?php 
while( $row = mysql_fetch_object($Qry_ListData_news)){

$listdata_itemnews_id = $row->id;

$listdata_itemnews_idupline = $row->idupline;
 
$listdata_itemnews_idkategori = $row->idkategori;

$listdata_itemnews_idkategorisub = $row->idkategorisub;

$listdata_itemnews_judul = $row->judul;

$listdata_itemnews_judul = substr($listdata_itemnews_judul,0,150);

$listdata_itemnews_judulinggris = $row->judulinggris;

$listdata_itemnews_subjudul = $row->subjudul;

$listdata_itemnews_subjudul = substr($listdata_itemnews_subjudul,0,150);

$listdata_itemnews_subjudulinggris = $row->subjudulinggris;

$listdata_itemnews_preview = $row->deskripsi;

$listdata_itemnews_preview = substr($listdata_itemnews_preview,0,150);

$listdata_itemnews_tglpost = $row->tglpost;

$listdata_itemnews_jampost = $row->jampost;

$listdata_itemnews_tgltampil = $row->tgltampil;

$listdata_itemnews_jamtampil = $row->jamtampil;

$listdata_itemnews_dilihat = $row->dilihat;

$listdata_itemnews_statustampil = $row->statustampil;
 
$listdata_itemnews_idusers = $row->idusers;

$listdata_itemnews_idadmin = $row->idadmin;

$listdata_itemnews_direktorigambar = $row->direktorigambar;				



$row_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $row->idkategori ); /* Select Detail Kanal */

$row_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $row->idkategorisub ); /* Select Detail Sub Kanal */

$row_user_posting = Users_Select_Detail( $tbl_users, $row->idusers ); /* Select Detail Users */



$link_itemnews_lihatdata = "news_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemnews_id&action=ViewDetail";

$link_itemnews_editdata = "news_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemnews_id&action=EditData";

$link_itemnews_hapusdata = "news_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$listdata_itemnews_id&action=DeleteData";

$link_komentarnews_lihatdata = "
javascript:MM_openBrWindow('?Sec=news&SubSec=AdminnewsKomentar&iditem=$listdata_itemnews_id','OpenWindow_news_Komentar','scrollbars=yes,width=600,height=600')
";

$link_filenews_lihatdata = "
javascript:MM_openBrWindow('?Sec=news&SubSec=AdminnewsItem&iditem=$listdata_itemnews_id','OpenWindow_news_FileLampiran','scrollbars=yes,width=600,height=600')
";


  
if( $listdata_itemnews_statustampil == 0){

 $Publish = "<a href='news_proses.php?action=item_updatestatus&id=$row->id&&status=1'>Publish</a>";
 $Unpublish = "Unpublish";
 } else {
 $Publish = "Publish";
 $Unpublish = "<a href='admin-news-statuspublikasi.php?id=$row->id&&status=0'>Unpublish</a>";

}

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

$hitungdata_newsitemlampiran = TotalAllDatanewsItemLampiran( $tbl_newsfile, $row->id );

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
<a href='news_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=ViewDetail' class='Font_Item_Judul'>
<?php 
echo $listdata_itemnews_judul ?>
</a>
</div>

<?php 
echo harienglish($row->tglpost) ?>, <?php 
echo bulanenglish($row->tglpost) ?> | <?php 
echo $row->jampost ?>

<br>

<?php 
echo $row_kanal->keterangan ?> <?php 
echo $row_subkanal->keterangan ?>
&nbsp; 
 
<?php 
if($row->headline == 0){
	$Publish = "<a href='proses_news_item.php?action=item_headlinetampil&idkategori=$row->idkategori&idkategorisub=$row->idkategorisub&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_news_item.php?action=item_headlinetampil&idkategori=$row->idkategori&idkategorisub=$row->idkategorisub&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>

<br>
<br>
Hit Counter  :  <?php 
echo $listdata_itemnews_dilihat ?> 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>


<?php 
if( $row->gambarbesar == "" ){
$gambar_itemnews = "";
}else{
$root_file = "../";
$show_gambar = $root_file . $row->direktorigambar . $row->gambarkecil;
$gambar_itemnews = "<img src='$show_gambar' width='80px' border='0'>";
}
?>
<?php 
echo $gambar_itemnews ?>

       
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
/* Action Modul news */ ?>
<div  id='link_action' class='link_action'>

<ul>

<li> <a href='news_item_lampiran.php?iditem=<?php 
echo $row->id ?>'> File Extra [ <?php 
echo $hitungdata_newsitemlampiran ?> ] </a> </li>

<?php 
$judul_substr_item = potong_judul($row->judul);
$link_news_item = "$link_host"."read-news-$row->idkategori-$row->idkategorisub-$row->id-$judul_substr_item"."$extention";
?>
<li> <a href='<?php echo $link_news_item?>' target="_blank"> View Detail </a> </li>

<li> <a href='news_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=EditData'> 
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
echo $row->idkategori ?>, <?php 
echo $row->idkategorisub ?>, <?php 
echo $row->id ?> )" class="link_delete"> Delete</a>
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