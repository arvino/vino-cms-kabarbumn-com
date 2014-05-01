<?php 
while( $row_news_item = mysql_fetch_object( $result_news_item )){

	$Link_Judul = potong_judul($row_news_item->judul);
	$id = $row_news_item->id;

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


				<div id="content_bottom2_item_box1_additional">
						
						 	<a href="<?php echo $link_news_item?>" id="content_bottom2_item_judul"> <?php echo $row_news_item->judul?> </a> 
						  	<a href="<?php echo $link_news_item?>">  <img id="content_bottom2_item_image" src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarkecil?>"> </a> 
                            
                            
                             <div id="content_bottom2_item_tanggal"> <?php echo hariindo($row_news_item->tgltampil)?>, <?php echo bulanindo($row_news_item->tgltampil)?> | <?php echo $row_news_item->jamtampil?>  WIB </div>
                             
						 <div id="content_bottom2_item_preview">
							 <?php 
echo wordwrap(potong_kata($row_news_item->preview,$word_count=25), 38, "<br />\n"); ?>...
						 </div>
				</div>

 				  
<?php 
$kolom++;
}

?>
