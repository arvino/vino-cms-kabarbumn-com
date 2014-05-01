<?php 
$idkategori=11;
	$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
	$keterangan_kanal = potong_judul($detail_kanal->keterangan);

	//$link_kanal = $link_host . "news-channel-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;
	$link_kanal = $link_host . "news-subchannel-" . $detail_kanal->id . "-0-" . $keterangan_kanal . $extention ;
	$link_kanal_indeks = $link_host . "indeks-news-kategori-" . $detail_kanal->id . "-" . $keterangan_kanal . $extention ;

?>

 

			<div id="box_news_agenda_wrapper">
			
				<div id="box_news_agenda_title_wrapper">
					 <a href="<?php echo $link_kanal?>" id="box_news_agenda_title_section"> <?php echo $detail_kanal->keterangan?> </a> 
					 <a href="<?php echo $link_kanal_indeks?>" id="box_news_agenda_indeks"> <img src="<?php echo $link_host?>images/icon-indeks.png" /> </a>
				</div>


				<div id="box_news_agenda_description_wrapper">



<?php 
include('kalendar-box.php');?>

<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	timeunix <='$time_now' AND
	idkategori = '$idkategori' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 2");
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


<img id="box_news_agenda_item_arrow" src="<?php echo $link_host?>images/ic_list_square_blue.png">

<div id="box_news_agenda_item_preview">    

<h2 id="box_news_agenda_item_title"> 
<a id="box_news_agenda_item_title" href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a> 
</h2>
                                        
</div>





 			
<?php 
} ?>			
				</div>
</div>