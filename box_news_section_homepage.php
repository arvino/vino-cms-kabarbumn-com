<?php 
$idkategori=12;

	$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );
	if($HitungSubKategori==0){
		$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
		$keterangan_kanal = potong_judul($detail_kanal->keterangan);
		$link_kanal = $link_host . "news-subchannel-" . $detail_kanal->id . "-" .  "0-" . $keterangan_kanal . $extention ;
		$link_kanal_indeks = $link_host . "indeks-news-kategori-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;
 

	}else{
		$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
		$keterangan_kanal = potong_judul($detail_kanal->keterangan);
		$link_kanal = $link_host . "news-channel-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;
		$link_kanal_indeks = $link_host . "indeks-news-kategori-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;
	}


?>
		<div id="content_bottom_wrapper1_title">
			 <a href="<?php echo $link_kanal?>" id="content_bottom1_item_titlekanal"> <?php echo $detail_kanal->keterangan?> </a> <a href="<?php echo $link_kanal_indeks ?>" id="content_bottom1_item_indeks">  Indeks </a>
		</div> 

<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	tgltampil <='$tanggalhariini' AND 
	idkategori = '$idkategori' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 4");
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

	$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );

	$judul_substr_item = potong_judul($row_news_item->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";

?>
				<div id="content_bottom_wrapper1_boxitem">
					<a href="<?php echo $link_news_item?>" id="content_bottom1_item_image"> 
						<img id="content_bottom1_item_image" src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarbesar?>">
					</a>
					
                    
					<div id="content_bottom1_item_preview">
						<a href="<?php echo $link_news_item?>">  <?php echo $row_news_item->judul?> </a>
					</div>

				</div>
<?php 
} ?>
			
<!-- BOX NEWS SECTION HOMEPAGE -->