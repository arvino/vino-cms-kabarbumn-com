<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
$id = $_GET['id'];
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];

$row_kanal = Select_Detail_Kategori_banner( $tbl_bannerkategori, $idkategori );
$row_subkanal = Select_Detail_KategoriSub_banner( $tbl_bannerkategorisub, $idsubkategori );
$row_item = Select_Detail_Item_banner($tbl_banner, $id);
$row_user_posting = Users_Select_Detail( $tbl_users, $row_item->idusers );
$row_itemkomentar = "";
$row_itemlampiran = "";


$bannerHitKategori = bannerKanalDiLihat( $tbl_bannerkategori, $idkategori );
$bannerHitKategoriSub = bannerSubKanalDiLihat( $tbl_bannerkategorisub, $idkategorisub );

$detail_item_banner = Select_Detail_Item_banner($tbl_banner, $id);
$Link_Judul = potong_judul($data_terkait->judul);
//if($_COOKIE["banneritemdilihat"]=="bannerhitcounter_$Link_Judul"){ /* Counter Item Berita */

//}else{
$bannerHitItem = bannerDiLihat( $tbl_banner, $id );
 	// Simpan Cookies Hit Item
 	//$values = "bannerhitcounter_$Link_Judul";
 	//$durasiCokies = 500 + time(); // 5000 Detik
 	//setcookie( "banneritemdilihat", $values, $durasiCokies );
//}


	if( $row_item->statustampil == "1"){ /* Status Tampil */
		$cek_statustampil = "Tampil";
	}else{
		$cek_statustampil = "Tidak Tampil";
	}
	
	if( $row_item->pilihan  == "1"){ /* Status Tampil di Pilihan */
		$cek_menutampil = "Tampil Di Pilihan";
	}else{
		$cek_menutampil = "Tidak Tampil Di Pilihan";
	}
	
	
	if( $row_item->headline  == "1"){ /* Status Tampil di Headline */
		$cek_homehalamantampil = "Tampil Di Headline";
	}else{
		$cek_homehalamantampil = "Tidak Tampil Di Headline";
	}
	
	
	if( $row_item->hotspot   == "1"){ /* Status Tampil di Hotspot */
		$cek_homehalamantampil = "Tampil Di Hotspot";
	}else{
		$cek_homehalamantampil = "Tidak Tampil Di Hotspot";
	}

$e_idusers = $row_item->idusers;
$e_idadmin = $row_item->idadmin;

?>
<hr>
<div class="Font_Item_Judul">
Detail  <?php 
echo stripslashes($row_item->judul) ?>
</div>

<?php 
echo harienglish($row_item->tglpost) ?>, <?php 
echo bulanenglish($row_item->tglpost) ?> | <?php 
echo $row_item->jampost ?>

<hr>

<div class='isibanner'>
<?php 
echo htmlspecialchars_decode($row_item->deskripsi) ?>
</div>

<?php 
if( $idkategori == 0 ){ 
$bannerkategori_id = 0;
$bannerkategori_keterangan = "<font color='red'> TANPA KATEGORI </font>";
}else{

$bannerkategori_keterangan = $row_kanal->keterangan;
$bannerkategori_keterangan = strtoupper($bannerkategori_keterangan);

}
?>
<?php 
echo $bannerkategori_keterangan ?>


&nbsp; | &nbsp;

<?php 
if( $idsubkategori == 0 ){ 

	$bannersubkategori_id = 0;
	$bannersubkategori_keterangan = "<font color='red'> NO SUB SECTION </font>";

}else{

	$bannersubkategori_keterangan = $row_subkanal->keterangan;
	$bannersubkategori_keterangan = strtoupper($bannersubkategori_keterangan);
}
?>

<br>

<?php 
echo $bannersubkategori_keterangan ?>

<?php 
if( $row_item->gambarbesar == "" ){
$gambar_itembanner = " ";
}else{
$root_file = "../";
$show_gambar = $root_file . $row_item->direktorigambar . $row_item->gambarbesar;
$gambar_itembanner = "<img src='$show_gambar' border='0' width='400' height='300'>";
}
?>
<br>
Hit  :  <?php 
echo $row_item->dilihat ?> 

<br>

<?php 
} ?>