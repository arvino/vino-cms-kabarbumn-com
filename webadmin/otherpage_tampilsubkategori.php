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

	$r_otherpagesubkategori = Select_SubKategori_otherpage_By_Id( $tbl_otherpagekategorisub, $idsubkategori );
	$otherpagesubkategori_id = $r_otherpagesubkategori->id;

if( $idsubkategori == 0 ){ 
	$otherpagesubkategori_keterangan = "WITHOUT SUB SECTION";
}else{

	$otherpagesubkategori_keterangan = $r_otherpagesubkategori->keterangan;
	$otherpagesubkategori_keterangan = strtoupper($otherpagesubkategori_keterangan);
}

?>
<b>SUB SECTION :</b> 
<select name='idkategorisub'>
<option value='<?php 
echo $otherpagesubkategori_id  ?>'> -- <?php 
echo $otherpagesubkategori_keterangan ?> -- </option>
<?php 
$result_subkanal = Select_All_SubKategori_otherpage_By_NOTIDSUB( $tbl_otherpagekategorisub, $idkategori, $idkategorisub );
while($rows_subkanal = mysql_fetch_object($result_subkanal)){
?>
<option value='<?php 
echo $rows_subkanal->id  ?>'><?php 
echo strtoupper($rows_subkanal->keterangan) ?> </option>
<?php 
} ?>
</select>
