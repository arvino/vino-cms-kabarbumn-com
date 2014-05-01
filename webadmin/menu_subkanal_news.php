<?php 
$idkategori = $_GET["idkategori"];
$idsubkategori = $_GET["idsubkategori"];
$CountSubkanal = newsCount_KategoriSub_ByKategori( $tbl_newskategorisub, $idkategori);
?>
<?php 
if($CountSubkanal == 0){ ?>
		 
<?php 
}else{  ?>

<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
<tr>
<td width=\"100%\"> 

		
<div id='menunavigasi_horisontal' class='menunavigasi_horisontal'>
	<ul>
<?php 
$result_subkanal = Select_All_SubKategori_news_By_Urutan( $tbl_newskategorisub, $idkategori );
while( $row_subkanal = mysql_fetch_object($result_subkanal)){

$idsubkategori = $row_subkanal->id;
$namasubkategori = $row_subkanal->keterangan;
$namasubkategori = strtoupper($namasubkategori);

$action = $_GET['action'];
if( !isset($action) ){
$Hitung_Itemnews = GetJmlTotalnews($tbl_news, $idkategori, $idsubkategori);

?>
		<li> <a href='news_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>'> <?php 
echo $namasubkategori  ?> 
		[ <?php 
echo $Hitung_Itemnews  ?> ] </a> </li>
		
<?php 
}else{


	switch ($action) {

		case 'FormEntry':  
		$Hitung_Itemnews = GetJmlTotalnews($tbl_news, $idkategori, $idsubkategori);
?>
		<li> <a href='news_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemnews  ?> ]
		</a> </li>
<?php 
break;
	
		case 'ViewList': 
		$Hitung_Itemnews = GetJmlTotalnews($tbl_news, $idkategori, $idsubkategori);
?>
		<li> <a href='news_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'>  <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemnews  ?> ]
		</a> </li>
<?php 
break;
	
		case 'ViewDetail': 
		$Hitung_Itemnews = GetJmlTotalnews($tbl_news, $idkategori, $idsubkategori);
?>
		<li> <a href='news_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=ViewList'>   <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemnews  ?> ]
		</a> </li>
<?php 
break;

		case 'EditData':  
		$Hitung_Itemnews = GetJmlTotalnews($tbl_news, $idkategori, $idsubkategori);
?>
		<li> <a href='news_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=<?php 
echo $idsubkategori ?>&action=EditData'> <?php 
echo $namasubkategori ?> 
		[ <?php 
echo $Hitung_Itemnews  ?> ]
		</a> </li>
 
		
<?php 
}}
?>


<?php 
}
?>


		
	</ul>
</div>

</td>
</tr>
</table>		
<?php 
} ?>