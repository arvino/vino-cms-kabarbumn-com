<?php 
$KodeKeamananhalaman  = "token_subscription";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
$id = $_GET['id'];
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];

$row_kanal = Select_Detail_Kategori_subscription( $tbl_subscriptionkategori, $idkategori );
$row_subkanal = Select_Detail_KategoriSub_subscription( $tbl_subscriptionkategorisub, $idsubkategori );
$row_item = Select_Detail_Item_subscription($tbl_subscription, $id);
$row_user_posting = Users_Select_Detail( $tbl_users, $row_item->idusers );
$row_itemkomentar = "";
$row_itemlampiran = "";


$subscriptionHitKategori = subscriptionKanalDiLihat( $tbl_subscriptionkategori, $idkategori );
$subscriptionHitKategoriSub = subscriptionSubKanalDiLihat( $tbl_subscriptionkategorisub, $idkategorisub );

$detail_item_subscription = Select_Detail_Item_subscription($tbl_subscription, $id);
$Link_Judul = potong_judul($data_terkait->judul);
//if($_COOKIE["subscriptionitemdilihat"]=="subscriptionhitcounter_$Link_Judul"){ /* Counter Item Berita */

//}else{
$subscriptionHitItem = subscriptionDiLihat( $tbl_subscription, $id );
 	// Simpan Cookies Hit Item
 	//$values = "subscriptionhitcounter_$Link_Judul";
 	//$durasiCokies = 500 + time(); // 5000 Detik
 	//setcookie( "subscriptionitemdilihat", $values, $durasiCokies );
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
if( $sesi_aksesmodul == "SYSTEM_ADMINISTRATOR" ){
?>
<?php 
echo harienglish($row_item->tglpost) ?>, <?php 
echo bulanenglish($row_item->tglpost) ?> | <?php 
echo $row_item->jampost ?>
<?php 
} ?>
<hr>

<div class='isisubscription'>
<?php 
echo htmlspecialchars_decode($row_item->deskripsi) ?>
</div>

<?php 
if( $idkategori == 0 ){ 
$subscriptionkategori_id = 0;
$subscriptionkategori_keterangan = "<font color='red'> TANPA KATEGORI </font>";
}else{

$subscriptionkategori_keterangan = $row_kanal->keterangan;
$subscriptionkategori_keterangan = strtoupper($subscriptionkategori_keterangan);

}
?>
<?php 
echo $subscriptionkategori_keterangan ?>


&nbsp; | &nbsp;

<?php 
if( $idsubkategori == 0 ){ 

	$subscriptionsubkategori_id = 0;
	$subscriptionsubkategori_keterangan = "<font color='red'> TANPA SUB KATEGORI </font>";

}else{

	$subscriptionsubkategori_keterangan = $row_subkanal->keterangan;
	$subscriptionsubkategori_keterangan = strtoupper($subscriptionsubkategori_keterangan);
}
?>

<br>

<?php 
echo $subscriptionsubkategori_keterangan ?>

<?php 
if( $row_item->gambarbesar == "" ){
$gambar_itemsubscription = " ";
}else{
$root_file = "../";
$show_gambar = $root_file . $row_item->direktorigambar . $row_item->gambarbesar;
$gambar_itemsubscription = "<img src='$show_gambar' border='0' width='400' height='300'>";
}
?>
<br>
Hit  :  <?php 
echo $row_item->dilihat ?> 

<br>

<?php 
} ?>