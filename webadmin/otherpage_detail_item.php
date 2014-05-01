<?php 
$KodeKeamananhalaman  = "token_otherpage";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
$id = $_GET['id'];
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];

$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $idkategori );
$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $idsubkategori );
$row_item = Select_Detail_Item_otherpage($tbl_otherpage, $id);
$row_user_posting = Users_Select_Detail( $tbl_users, $row_item->idusers );
$row_itemkomentar = "";
$row_itemlampiran = "";


$otherpageHitKategori = otherpageKanalDiLihat( $tbl_otherpagekategori, $idkategori );
$otherpageHitKategoriSub = otherpageSubKanalDiLihat( $tbl_otherpagekategorisub, $idkategorisub );

$detail_item_otherpage = Select_Detail_Item_otherpage($tbl_otherpage, $id);
$Link_Judul = potong_judul($data_terkait->judul);
//if($_COOKIE["otherpageitemdilihat"]=="otherpagehitcounter_$Link_Judul"){ /* Counter Item Berita */

//}else{
$otherpageHitItem = otherpageDiLihat( $tbl_otherpage, $id );
 	// Simpan Cookies Hit Item
 	//$values = "otherpagehitcounter_$Link_Judul";
 	//$durasiCokies = 500 + time(); // 5000 Detik
 	//setcookie( "otherpageitemdilihat", $values, $durasiCokies );
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

				 <span class="JudulKanal_box1">DETAIL OTHERPAGE <?php 
echo stripslashes(strtoupper($row_item->judul)) ?> </span>
				 <hr class='line_box'>
				 
				 
<img src="<?php 
echo $link_host ?><?php 
echo $row_item->direktorigambar ?><?php 
echo $row_item->gambarkecil ?>">


<?php 
echo harienglish($row_item->tglpost) ?>, <?php 
echo bulanenglish($row_item->tglpost) ?> | <?php 
echo $row_item->jampost ?>


 

<div class='isiotherpage'>
<?php 
echo htmlspecialchars_decode($row_item->deskripsi) ?>
</div>

<?php 
if( $idkategori == 0 ){ 
$otherpagekategori_id = 0;
$otherpagekategori_keterangan = "<font color='red'> TANPA KATEGORI </font>";
}else{

$otherpagekategori_keterangan = $row_kanal->keterangan;
$otherpagekategori_keterangan = strtoupper($otherpagekategori_keterangan);

}
?>
<?php 
echo $otherpagekategori_keterangan ?>


&nbsp;  

<?php 
if( $idsubkategori == 0 ){ 

	$otherpagesubkategori_id = 0;
	$otherpagesubkategori_keterangan = "<font color='red'> TANPA SUB KATEGORI </font>";

}else{

	$otherpagesubkategori_keterangan = $row_subkanal->keterangan;
	$otherpagesubkategori_keterangan = strtoupper($otherpagesubkategori_keterangan);
}
?>

<br>

<?php 
echo $otherpagesubkategori_keterangan ?>

<?php 
if( $row_item->gambarbesar == "" ){
$gambar_itemotherpage = " ";
}else{
$root_file = "../";
$show_gambar = $root_file . $row_item->direktorigambar . $row_item->gambarbesar;
$gambar_itemotherpage = "<img src='$show_gambar' border='0' width='400' height='300'>";
}
?>
<br>
Hit  :  <?php 
echo $row_item->dilihat ?> 

<br>

<?php 
} ?>