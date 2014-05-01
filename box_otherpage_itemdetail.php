
<?php 
$otherpageHitKategori = otherpageKanalDiLihat( $tbl_otherpagekategori, $idkategori );
$otherpageHitKategoriSub = otherpageSubKanalDiLihat( $tbl_otherpagekategorisub, $idkategorisub );
$otherpageHitItem = otherpageDiLihat( $tbl_otherpage, $id );

?>
<?php 
while( $row_otherpage_item = mysql_fetch_object($detail_otherpage_item123) ){
?>
 
<?php 
if($row_otherpage_item->gambarbesar==''){
	$show_gambar = " ";
}else{
	$show_gambar1 = $link_host . $row_otherpage_item->direktorigambar . $row_otherpage_item->gambarbesar;
	$show_gambar = "<img src='$show_gambar1' width='200' hspace='5' vspace='5' border='0' align='left'>";
	
$gambar_itemberita = "
 
	$show_gambar
 
 
";

}

?>
<?php 
echo $gambar_itemberita ?>
<div class="item_description_pagedetail">
<p>
<?php 
echo htmlspecialchars_decode($row_otherpage_item->deskripsi) ?>
</p>
<br />
</div>


<?php 
include('box_otherpage_itemlampiran.php'); ?>

<br>
 <?php 
}
?>

