<?php 
$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub=28 );
	$keterangan_subkanal = potong_judul($detail_subkanal->keterangan);

	$link_subkanal = $link_host . "news-subchannel-" . $detail_subkanal->idkategori . "-" . $detail_subkanal->idkategori . "-" . $keterangan_subkanal . $extention ;
	$link_subkanal_indeks = $link_host . "indeks-news-subkategori-" . $detail_subkanal->id . "-" . $keterangan_subkanal . $extention ;
?>

			<!-- START CONTENT SIDE RIGHT - KOLUMNIS PHOTO GALLERY -->
			<div id="content_side_right_kolumnis_wrapper">



<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	tgltampil <='$tanggalhariini' AND
	idkategorisub = '28' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 1");
?>

<?php 
while( $row_news_item = mysql_fetch_object( $result_news_item )){

	$Link_Judul = potong_judul($row_news_item->judul);
	$id = $row_news_item->id;
	$id_excp = $row_news_item->id;
	
	$idkategori = $row_news_item->idkategori;
	$idkategorisub = $row_news_item->idkategorisub;

	$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
	$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub );
	$link_news_kanal = "#";

	$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );

	$judul_substr_item = potong_judul($row_news_item->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";

?>

				<div id="content_side_right_innerbox">


  
					 <a href="<?php echo $link_subkanal?>" id="content_side_right_kolumnis_judul"> <?php echo $detail_subkanal->keterangan?> </a> 


					 <div id="content_side_right_kolumnis_image"> <img src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarbesar?>" width="130px"> </div>
 
					 <a href="<?php echo $link_news_item?>"  id="content_side_right_kolumnis_description">  <?php echo $row_news_item->judul?>  </a> 


	 
				 </div>
				 <div id="content_side_right_kolumnis_preview_innerbox">
				 




<?php 
$result_news_item_line = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	tgltampil <='$tanggalhariini' AND
	idkategorisub = '28' AND 
	id != '$id_excp' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 7");
?>

<?php 
while( $row_news_item_line = mysql_fetch_object( $result_news_item_line )){
	$judul_substr_item = potong_judul($row_news_item_line->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item_line->idkategori-$row_news_item_line->idkategorisub-$row_news_item_line->id-$judul_substr_item"."$extention";

?>
				 
					 <a href="<?php echo $link_news_item?>" id="content_side_right_kolumnis_preview_image"> 
					 	<img src="<?php echo $link_host?><?php echo $row_news_item_line->direktorigambar?><?php echo $row_news_item_line->gambarkecil?>" width="60px" height="60px"> 
					 </a>
					  

<?php 
} ?>			

				 </div>
				 
				 
<?php 
} ?>		
		 
			</div>
			<!-- END START CONTENT SIDE RIGHT -- KOLUMNIS - PHOTO GALLERY -->
