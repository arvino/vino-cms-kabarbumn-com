<?php 
$KodeKeamananhalaman  = "token_gallery";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
<tr>
<td width=\"100%\"> 

<div id='menunavigasi_horisontal' class='menunavigasi_horisontal'>
	<ul>
<?php 
$idkategori = $_GET["idkategori"];
$idsubkategori = $_GET["idsubkategori"];

$result_subkanal = Select_All_SubKategori_gallery_By_Urutan( $tbl_gallerykategorisub, $idkategori );
while( $row_subkanal = mysql_fetch_object($result_subkanal)){

$idsubkategori = $row_subkanal->id;
$namasubkategori = $row_subkanal->keterangan;
$namasubkategori = strtoupper($namasubkategori);

$action = $_GET['action'];
if( !isset($action) ){
$Hitung_Itemgallery = GetJmlTotalgallery($tbl_gallery, $idkategori, $idsubkategori);

?>
		<li> <a href='gallery_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>'> <?php 
echo $namasubkategori  ?> 
		[ <?php 
echo $Hitung_Itemgallery  ?> ] </a> </li>
		
<?php 
}else{


	switch ($action) {

		case 'FormEntry':  
		$Hitung_Itemgallery = GetJmlTotalgallery($tbl_gallery, $idkategori, $idsubkategori);
?>
		<li> <a href='gallery_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemgallery  ?> ]
		</a> </li>
<?php 
break;
	
		case 'ViewList': 
		$Hitung_Itemgallery = GetJmlTotalgallery($tbl_gallery, $idkategori, $idsubkategori);
?>
		<li> <a href='gallery_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemgallery  ?> ]
		</a> </li>
<?php 
break;
	
		case 'ViewDetail': 
		$Hitung_Itemgallery = GetJmlTotalgallery($tbl_gallery, $idkategori, $idsubkategori);
?>
		<li> <a href='gallery_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemgallery  ?> ]
		</a> </li>
<?php 
break;

		case 'EditData':  
		$Hitung_Itemgallery = GetJmlTotalgallery($tbl_gallery, $idkategori, $idsubkategori);
?>
		<li> <a href='gallery_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=EditData'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemgallery  ?> ]
		</a> </li>
 
		
<?php 
}}
?>


<?php 
}
?>


<li> <a href='gallery_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=0&action=ViewList'> WITHOUT SUB SECTION   </a> </li>
 
	</ul>
</div>
 

</td>
</tr>
</table>		
 
<?php 
} ?>
<br>
