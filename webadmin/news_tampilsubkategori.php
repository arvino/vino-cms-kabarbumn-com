<?php 
include"kelas_function.php";

$idkategori=$_GET["idkategori"];
$idsubkategori = $_GET["idkategorisub"];
$idkategorisub = $_GET["idkategorisub"];


if($idkategori=="" || $idkategori=="none"){
$idkategori = 0;
}

if( $idsubkategori =="" ){
$idsubkategori = 0;
}

	$r_newssubkategori = Select_SubKategori_news_By_Id( $tbl_newskategorisub, $idsubkategori );
	$newssubkategori_id = $r_newssubkategori->id;

if( $idsubkategori == 0 ){ 
	$newssubkategori_keterangan = "WITHOUT SUB SECTION";
}else{

	$newssubkategori_keterangan = $r_newssubkategori->keterangan;
	$newssubkategori_keterangan = strtoupper($newssubkategori_keterangan);
}

?>
<b>SUB SECTION :</b> 
<select name='idkategorisub'>
<option value='<?php 
echo $newssubkategori_id  ?>'> -- <?php 
echo $newssubkategori_keterangan ?> -- </option>
<?php 
$result_subkanal = Select_All_SubKategori_news_By_NOTIDSUB( $tbl_newskategorisub, $idkategori, $idkategorisub );
while($rows_subkanal = mysql_fetch_object($result_subkanal)){
?>
<option value='<?php 
echo $rows_subkanal->id  ?>'><?php 
echo strtoupper($rows_subkanal->keterangan) ?> </option>
<?php 
} ?>
</select>
