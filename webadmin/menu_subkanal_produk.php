<?php 
$KodeKeamananhalaman  = "token_produk";
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

$result_subkanal = Select_All_SubKategori_produk_By_Urutan( $tbl_produkkategorisub, $idkategori );
while( $row_subkanal = mysql_fetch_object($result_subkanal)){

$idsubkategori = $row_subkanal->id;
$namasubkategori = $row_subkanal->keterangan;
$namasubkategori = strtoupper($namasubkategori);

$action = $_GET['action'];
if( !isset($action) ){
$Hitung_Itemproduk = GetJmlTotalproduk($tbl_produk, $idkategori, $idsubkategori);

?>
		<li> <a href='produk_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>'> <?php 
echo $namasubkategori  ?> 
		[ <?php 
echo $Hitung_Itemproduk  ?> ] </a> </li>
		
<?php 
}else{


	switch ($action) {

		case 'FormEntry':  
		$Hitung_Itemproduk = GetJmlTotalproduk($tbl_produk, $idkategori, $idsubkategori);
?>
		<li> <a href='produk_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemproduk  ?> ]
		</a> </li>
<?php 
break;
	
		case 'ViewList': 
		$Hitung_Itemproduk = GetJmlTotalproduk($tbl_produk, $idkategori, $idsubkategori);
?>
		<li> <a href='produk_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemproduk  ?> ]
		</a> </li>
<?php 
break;
	
		case 'ViewDetail': 
		$Hitung_Itemproduk = GetJmlTotalproduk($tbl_produk, $idkategori, $idsubkategori);
?>
		<li> <a href='produk_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemproduk  ?> ]
		</a> </li>
<?php 
break;

		case 'EditData':  
		$Hitung_Itemproduk = GetJmlTotalproduk($tbl_produk, $idkategori, $idsubkategori);
?>
		<li> <a href='produk_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=EditData'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemproduk  ?> ]
		</a> </li>
 
		
<?php 
}}
?>


<?php 
}
?>


<li> <a href='produk_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=0&action=ViewList'> WITHOUT SUB SECTION   </a> </li>
 
	</ul>
</div>
 

</td>
</tr>
</table>		
 
<?php 
} ?>
<br>
