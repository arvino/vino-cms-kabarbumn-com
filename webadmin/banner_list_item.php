<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( isset($_POST['banner_search']) ){
	$cari = $_POST['banner_search'];
}else{
	$cari = $_GET['cari'];
}
?>


<?php 
$idkategori = $_GET["idkategori"];
$r_databanner_kategori = Select_Kategori_banner_By_Id( $tbl_bannerkategori, $idkategori );
$r_bannerkategori = mysql_fetch_object($r_databanner_kategori);

$bannerkategori_id = $r_bannerkategori->id;

if( $idkategori == 0 ){ 
	$bannerkategori_id = 0;
	$bannerkategori_keterangan = "<font color='red'>   </font>";
}else{

	$bannerkategori_keterangan = $r_bannerkategori->keterangan;
	$bannerkategori_keterangan = strtoupper($bannerkategori_keterangan);

}


	$idsubkategori = $_GET["idsubkategori"];
	$idkategorisub = $_GET["idsubkategori"];
	
	
	$r_bannersubkategori = Select_SubKategori_banner_By_Id( $tbl_bannerkategorisub, $idsubkategori );
	 
	$bannersubkategori_id = $r_bannersubkategori->id;

if( $idsubkategori == 0 ){ 
	$bannersubkategori_id = 0;
	$bannersubkategori_keterangan = "<font color='red'>  </font>";
}else{

	$bannersubkategori_keterangan = $r_bannersubkategori->keterangan;
	$bannersubkategori_keterangan = strtoupper($bannersubkategori_keterangan);
}



if( $idsubkategori == 0 ){ 
$bannersubkategori_id = 0;
$bannersubkategori_keterangan = "";
}

?>


<?php 
if($action=="search"){
$Hitung_Pencarianbanner =  GetJML_Search_Item_banner_ALL( $tbl_banner, $cari ); /* Hitung Data Item */
?>
<div class='text_pencarian'>
Found <?php 
echo $Hitung_Pencarianbanner ?> item with keyword  "<?php 
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
	$List_JumlahDatabanner =  GetJML_Search_Item_banner_ALL( $tbl_banner, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	$QryNumItembanner = bannerItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_banner , $idkategori, $idkategorisub );
	$List_JumlahDatabanner = mysql_num_rows($QryNumItembanner);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$QryNumItembanner = bannerItem_BacaDataListing_Terpopuler_All( $tbl_banner );
	$List_JumlahDatabanner = mysql_num_rows($QryNumItembanner);
}
 
?>

<?php 
if($List_JumlahDatabanner == 0){

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
echo $bannerkategori_keterangan ?>  
	  
<?php 
echo $bannersubkategori_keterangan ?> 
	  
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
	$QryNumItembanner = Search_Item_banner_All_data($tbl_banner, $cari );
} 

if( $action == "ViewList" ){ /* Internal - Jika Action sama dengan view list */
	$QryNumItembanner = bannerItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_banner , $idkategori, $idkategorisub );
}

if( !isset($action)){
	$QryNumItembanner = bannerItem_BacaDataListing_Terpopuler_All( $tbl_banner );
	
}
		
		$HitungJumlahItembanner  = mysql_num_rows($QryNumItembanner);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;

if($action == "search" ){
	$posisihalaman  = "banner_item.php?cari=$cari&action=search&$dataperhalaman_x";
}

if($action == "ViewList" ){
	$posisihalaman  = "banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&$dataperhalaman_x";
}

if( !isset($action) ){
	$posisihalaman  = "banner_main.php?$dataperhalaman_x";
}


$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItembanner ,$dataPerhalaman, $nohalaman, $halaman );


?>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "search" ){
	$Qry_ListData_banner = Search_Item_banner_ALL($tbl_banner, $cari , $offset , $dataPerhalaman );
	$List_JumlahDatabanner =  GetJML_Search_Item_banner_ALL( $tbl_banner, $cari ); /* Hitung Data Item */
}

if( $action == "ViewList" ){
	$Qry_ListData_banner = List_banner_File_Group_With_Limitpage( $tbl_banner, $idkategori, $idsubkategori , $offset, $dataPerhalaman); 
	$List_JumlahDatabanner = mysql_num_rows($Qry_ListData_banner);
}

if( !isset($action)){ /* Jika tida ada aksi urutkan berdasarkan terpopuler */
	$Qry_ListData_banner = bannerItem_BacaDataListing_Terpopuler_All_Bypage( $tbl_banner , $offset , $dataPerhalaman ); 
	$List_JumlahDatabanner = mysql_num_rows($Qry_ListData_banner);
}

?>

<?php 
if($List_JumlahDatabanner == 0){
// Jika belum there is item konten pthere is kategori dan subkategori yang di maksud.
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
		
	<td colspan='2' class='judulform'> <div align="center">Content Description</div> 
	  <div align="center"></div></td>
  </tr>
<?php 
while( $row = mysql_fetch_object($Qry_ListData_banner)){

$row_kanal = Select_Detail_Kategori_banner( $tbl_bannerkategori, $row->idkategori ); /* Select Detail Kanal */

$row_subkanal = Select_Detail_KategoriSub_banner( $tbl_bannerkategorisub, $row->idkategorisub ); /* Select Detail Sub Kanal */

$row_user_posting = Users_Select_Detail( $tbl_users, $row->idusers ); /* Select Detail Users */
  
if( $row->statustampil == 0){

	 $Publish = "<a href='proses_banner_item.php?action=item_statustampil&id=$row->id&&status=1'>Publish</a>";
	 $Unpublish = "Unpublish";
 } else {
	 $Publish = "Publish";
	 $Unpublish = "<a href='proses_banner_item.php?action=item_statustampil&id=$row->id&&status=0'>Unpublish</a>";

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

 
<div class="Font_Item_Judul">
	<a href='banner_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=EditData' class='Font_Item_Judul'>
		<?php 
echo $row->judul ?>
	</a>
</div>
<?php 
echo $row->deskripsi ?>
<br>

<b> <?php 
echo $row_kanal->keterangan ?> <?php 
echo $row_subkanal->keterangan ?> </b>
&nbsp; &nbsp;
<br>
<br>
Posted date :
<?php 
echo $row->tglpost ?> | <?php 
echo $row->jampost ?>
<br>
Publish date :
<?php 
echo $row->tgltampil ?> | <?php 
echo $row->jamtampil ?>
<br>
Expired date :
<?php 
echo $row->tglselesai ?> | <?php 
echo $row->jamselesai ?>
<br>
Order : <?php 
echo $row->urutan ?>
<br>


<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>


<?php 
if( $row->namafile == "" ){
		$filebanner = " ";
	}else{
		$show_gambar = $link_host . $row->direktorigambar . $row->namafile;
		$filebanner = "<a href='$row->linkurl' target='_blank'> <img src='$show_gambar' border='0' width='250'> </a>
		<br> URL : $row->linkurl
		";
	}
?>

<?php 
echo $filebanner ?> 

<br>
<br>

<?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>

<br>
<br>

HIT  : <?php 
echo $row->dilihat ?> 
    
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
	
	


<div  id='link_action' class='link_action'>

<ul>
	<li> 
	<a href='banner_item.php?idkategori=<?php 
echo $row->idkategori ?>&idsubkategori=<?php 
echo $row->idkategorisub ?>&id=<?php 
echo $row->id ?>&action=EditData'> 
		Edit Data
	</a> 
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