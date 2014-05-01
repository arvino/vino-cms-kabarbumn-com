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

	$r_bannersubkategori = Select_SubKategori_banner_By_Id( $tbl_bannerkategorisub, $idsubkategori );
	$bannersubkategori_id = $r_bannersubkategori->id;

if( $idsubkategori == 0 ){ 
	$bannersubkategori_keterangan = "TANPA SUB KATEGORI";
}else{

	$bannersubkategori_keterangan = $r_bannersubkategori->keterangan;
	$bannersubkategori_keterangan = strtoupper($bannersubkategori_keterangan);
}

?>
<b>Sub Kategori banner :</b> 
<select name='idkategorisub'>
<option value='<?php 
echo $bannersubkategori_id  ?>'> -- <?php 
echo $bannersubkategori_keterangan ?> -- </option>
<?php 
$result_subkanal = Select_All_SubKategori_banner_By_NOTIDSUB( $tbl_bannerkategorisub, $idkategori, $idkategorisub );
while($rows_subkanal = mysql_fetch_object($result_subkanal)){
?>
<option value='<?php 
echo $rows_subkanal->id  ?>'><?php 
echo strtoupper($rows_subkanal->keterangan) ?> </option>
<?php 
} ?>
</select>
