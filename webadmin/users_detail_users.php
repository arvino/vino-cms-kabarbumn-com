<?php 
$KodeKeamananhalaman  = "token_usersadmin";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
$id = $_GET['id'];
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];

$row_kanal = Select_Detail_Kategori_sop( $tbl_sopkategori, $idkategori );
$row_subkanal = Select_Detail_KategoriSub_sop( $tbl_sopkategorisub, $idsubkategori );
$row_item = Select_Detail_Item_sop($tbl_sop, $id);
$row_user_posting = Users_Select_Detail( $tbl_users, $row_item->idusers );
$row_itemkomentar = "";
$row_itemlampiran = "";


$SopHitKategori = sopKanalDiLihat( $tbl_sopkategori, $idkategori );
$SopHitKategoriSub = sopSubKanalDiLihat( $tbl_sopkategorisub, $idkategorisub );

$detail_item_sop = Select_Detail_Item_sop($tbl_sop, $id);
$Link_Judul = potong_judul($data_terkait->judul);
//if($_COOKIE["sopitemdilihat"]=="sophitcounter_$Link_Judul"){ /* Counter Item Berita */

//}else{
$SopHitItem = sopDiLihat( $tbl_sop, $id );
 	// Simpan Cookies Hit Item
 	//$values = "sophitcounter_$Link_Judul";
 	//$durasiCokies = 500 + time(); // 5000 Detik
 	//setcookie( "sopitemdilihat", $values, $durasiCokies );
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


<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> DETAIL ITEM SOP</td>
  </tr>
  <tr class='kontenform'>
    <td>
      <div align='center'>


          <table width='100%'  align='center' cellpadding='1' cellspacing='1' class='footerform'>
            <tr>
              <td width='98%'> 




<?php 
if( $idkategori == 0 ){ 
$sopkategori_id = 0;
$sopkategori_keterangan = "<font color='red'> TANPA KATEGORI </font>";
}else{

$sopkategori_keterangan = $row_kanal->keterangan;
$sopkategori_keterangan = strtoupper($sopkategori_keterangan);

}
?>
<?php 
echo $sopkategori_keterangan ?>


&nbsp; | &nbsp;

<?php 
if( $idsubkategori == 0 ){ 

	$sopsubkategori_id = 0;
	$sopsubkategori_keterangan = "<font color='red'> TANPA SUB KATEGORI </font>";

}else{

	$sopsubkategori_keterangan = $row_subkanal->keterangan;
	$sopsubkategori_keterangan = strtoupper($sopsubkategori_keterangan);
}
?>

<?php 
echo $sopsubkategori_keterangan ?>

<?php 
if( $row_item->gambarbesar == "" ){
$gambar_itemsop = " ";
}else{
$root_file = "../";
$show_gambar = $root_file . $row_item->direktorigambar . $row_item->gambarbesar;
$gambar_itemsop = "<img src='$show_gambar' border='0' width='400' height='300'>";
}
?>
<div class="Font_Item_Judul">
<?php 
echo stripslashes($row_item->judul) ?>
</div>
  
<div class='isisop'>
<?php 
echo htmlspecialchars_decode($row_item->deskripsi) ?>
</div>
<br>
Hit  :  <?php 
echo $row_item->dilihat ?> 
 


</td>
</tr>
</table>


      </div></td>
</tr>
</table>
<?php 
} ?>