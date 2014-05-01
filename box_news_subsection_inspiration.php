<?php 
$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub=21 );
	$keterangan_subkanal = potong_judul($detail_subkanal->keterangan);

	$link_subkanal = $link_host . "news-subchannel-" . $detail_subkanal->idkategori . "-" . $detail_subkanal->idkategori . "-" . $keterangan_subkanal . $extention ;
	$link_subkanal_indeks = $link_host . "indeks-news-subkategori-" . $detail_subkanal->id . "-" . $keterangan_subkanal . $extention ;
?>

<?php 
$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori=5 );
?>

				<div id="content_side_left_1_newschannel_item_title_box">
					 
					 <a href="<?php echo $link_subkanal?>" id="content_side_left_1_newschannel_item_titlekanal"> <?php echo $detail_subkanal->keterangan?> </a> 
					 <a href="<?php echo $link_subkanal_indeks?>" id="content_side_left_1_newschannel_item_indeks"> Indeks </a>
					
				</div>


<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	tgltampil <='$tanggalhariini' AND
	idkategorisub = '21' AND 
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

				<div id="content_side_left_1_newschannel_item_box1">
						 <a href="<?php echo $link_news_item?>" id="content_side_left_1_newschannel_item_image_wrapper"> 
						 	<img id="content_side_left_1_newschannel_item_image" src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarbesar?>"> 
						 </a>
						 <div id="content_side_left_1_newschannel_item_tanggal"> <?php echo hariindo($row_news_item->tgltampil)?>, <?php echo bulanindo($row_news_item->tgltampil)?>  | <?php echo $row_news_item->jamtampil?>  WIB </div>
						 <h2 id="content_side_left_1_newschannel_item_judul"> <a href="<?php echo $link_news_item?>" id="content_side_left_1_newschannel_item_judul"> <?php echo $row_news_item->judul?> </a> </h2>
				</div>

<?php 
$result_news_item_line = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	tgltampil <='$tanggalhariini' AND
	idkategorisub = '21' AND 
	id != '$id_excp' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 2");
?>


							 <div id="content_side_left_1_newschannel_row2_description"> 
							 <ul>

<?php 
while( $row_news_item_line = mysql_fetch_object( $result_news_item_line )){
	$judul_substr_item = potong_judul($row_news_item_line->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item_line->idkategori-$row_news_item_line->idkategorisub-$row_news_item_line->id-$judul_substr_item"."$extention";

?>
							 	<li> 
									<div id="content_side_left_1_newschannel_row2_item_tanggal"> <?php echo hariindo($row_news_item_line->tgltampil) . ", " . bulanindo($row_news_item_line->tgltampil);?> | <?php echo $row_news_item_line->jamtampil;?> WIB </div>
									<a href="<?php echo $link_news_item?>" id="content_side_left_1_newschannel_row2_item_title"> <?php echo $row_news_item_line->judul?>...</a>
								</li>

<?php 
}
?>

							</ul>
							</div>

<?php 
}
?>