<?php 
$idkategori=13;
	$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
	$keterangan_kanal = potong_judul($detail_kanal->keterangan);

	$link_kanal = $link_host . "news-channel-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;
	$link_kanal_indeks = $link_host . "indeks-news-kategori-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;

?>

 						 <div id="content_side_left_2_row1_wrapper"> <!-- START BERITA TERKINI -->
                         <a href="<?php echo $link_kanal?>" id="content_side_left_2_row1_title"> <?php echo $detail_kanal->keterangan?> </a> 
							 
<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	timeunix <='$time_now' AND
	idkategori = '$idkategori' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 5");
 

while( $row_news_item = mysql_fetch_object( $result_news_item )){

	$Link_Judul = potong_judul($row_news_item->judul);
	$id = $row_news_item->id;
	$id_excp1 .= "'$row_news_item->id'" . ",";
	
	$idkategori = $row_news_item->idkategori;
	$idkategorisub = $row_news_item->idkategorisub;

	$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );
	if($HitungSubKategori==0){
		$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
		$section_name = $detail_kanal->keterangan;
		$link_section = $link_host . "news-channel-$detail_kanal->id-" . potong_judul($section_name) . $extention;

	}else{
		$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub );
		$section_name = $detail_subkanal->keterangan;
		$link_section = $link_host . "news-subchannel-$idkategori-$detail_subkanal->id-"  . potong_judul($section_name) . $extention;
	}

	$judul_substr_item = potong_judul($row_news_item->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";

?>
								 
									
									
									<div id="content_side_left_2_row1_description"> 
										<img id="content_side_left_2_row1_item_arrow" src="<?php echo $link_host?>images/ic_list.png">
										<div id="content_side_left_2_row1_item_preview">    
										<a href="<?php echo $link_news_item?>" id="content_side_left_2_row1_item_image"> <img id="content_side_left_2_row1_item_image" src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarkecil?>">  </a>
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo($row_news_item->tgltampil) . ", " . bulanindo($row_news_item->tgltampil);?> | <?php echo $row_news_item->jamtampil?> WIB </div>
										<h2 id="content_side_left_2_row1_item_title"> <a id="content_side_left_2_row1_item_title" href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a> </h2>
										</div>
									</div>
									
<?php 
}
?>


								  
							 
							 
						 </div><!-- END BERITA TERKINI -->


