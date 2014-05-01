 
<?php 
$kolom=1;
while($row_news_item = mysql_fetch_object($result_news_item)){

$Link_Judul = potong_judul($row_news_item->judul);
$id = $row_news_item->id;
$idkategori = $row_news_item->idkategori;
$idkategorisub = $row_news_item->idkategorisub;

$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );

if($HitungSubKategori==0){/* Jika tidak ada sub kanal news arahkan ke subkanal langsung */  	
$detail_kanal_news = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
$SubKanal_Keterangan = strtolower($detail_kanal_news->keterangan);
$Keterangan_Kanal = $detail_kanal_news->keterangan;
}else{
$detail_subkanal_news = Detail_SubKanalnews_Publish( $tbl_newskategorisub , $idkategorisub );
$SubKanal_Keterangan = strtolower($detail_subkanal_news->keterangan);
$Keterangan_Kanal = $detail_subkanal_news->keterangan;
}

$judul_substr_item = potong_judul($row_news_item->judul);
$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";

?>
 

				<div id="content_bottom2_item_box1_indeks">
						 <div id="content_bottom2_item_tanggal"> <?php echo hariindo($row_news_item->tgltampil)?>, <?php echo bulanindo($row_news_item->tgltampil)?> | <?php echo $row_news_item->jamtampil?>  WIB </div>
						 	<a href="<?php echo $link_news_item?>" id="content_bottom2_item_judul"> <?php echo $row_news_item->judul?> </a> 
						  	<a href="<?php echo $link_news_item?>">  <img id="content_bottom2_item_image" src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarkecil?>"> </a> 
						 <div id="content_bottom2_item_preview">
							 <?php 
echo wordwrap(potong_kata($row_news_item->preview,$word_count=25), 38, "<br />\n"); ?>...
						 </div>
				</div>



				  
<?php 
$kolom++;
}
?>
 