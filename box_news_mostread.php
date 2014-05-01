			<div id="content_side_rigth_tab_terpopuler">
				<div id="moving_tab">
					<div class="tabs">
						<div class="lava"></div>
						<span class="item"> Baru dibaca </span>
						<span class="item"> Terpopuler </span>
				 
				
					</div>
									
					<div class="content">						
						<div class="panel">						
							<ul>
							
<?php 
$dataPerPage = 3;
$result_news_item = newsItem_PageLimit_Barudibaca_All_Publik( $tbl_news, $tanggalhariini, $dataPerPage );
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
							 	<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo($row_news_item->tgltampil) . ", " . bulanindo($row_news_item->tgltampil);?> | <?php echo $row_news_item->jamtampil;?> WIB </div>
									<a href="<?php echo $link_news_item?>" id="content_side_left_2_row2_item_title"> <?php echo $row_news_item->judul?>... </a> 
								</li>
<?php 
} ?>
			
							</ul>
							
							
							<ul>

<?php 
$dataPerPage = 3;
$result_news_item = newsItem_PageLimit_Populer_All_Publik( $tbl_news, $tanggalhariini, $dataPerPage );
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

							 	<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo($row_news_item->tgltampil) . ", " . bulanindo($row_news_item->tgltampil);?> | <?php echo $row_news_item->jamtampil;?> WIB </div>
									<a href="<?php echo $link_news_item?>" id="content_side_left_2_row2_item_title"> <?php echo $row_news_item->judul?>... </a> 
								</li>

<?php 
}
?>
							</ul>
							
										
						</div>
				
					</div>	
				</div>
			</div>