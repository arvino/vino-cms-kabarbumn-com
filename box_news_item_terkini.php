<div id="box_terkini_wrapper">  
<div id="box_terkini_title"> Terkini </div>
							 
<div id="box_terkini_description"> 
<?php 
$dataPerPage = 7;
$except_category = "9,11,12,14,15,16,18,19,";
$result_news_item = newsItem_PageLimit_Terkini_All_Publik( $tbl_news, $time_now, $dataPerPage, $except_category );
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
								 
<img id="box_terkini_item_arrow" src="<?php echo $link_host?>images/ic_list_square_red.png">

<div id="box_terkini_item_preview">    

<h2 id="box_terkini_item_title"> 
<a id="box_terkini_item_title" href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a> 
</h2>
                                        
</div>
									
									
<?php 
}
?>
</div>
</div>