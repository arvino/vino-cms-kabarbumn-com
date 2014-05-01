<?php 
$idkategori=10;


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

 

			<div id="box_infokerja_wrapper">
			
				<div id="box_infokerja_title_wrapper">
					 <a href="<?php echo $link_kanal?>" id="box_infokerja_title"> <?php echo $detail_kanal->keterangan?> BUMN </a> 
					 <a href="<?php echo $link_kanal_indeks?>" id="box_infokerja_indeks"> <img src="<?php echo $link_host?>images/icon-indeks.png" /> </a>
				</div>

 
 
 
<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
	timeunix <='$time_now' AND
	idkategori = '$idkategori' AND 
	statustampil = '1' 
ORDER BY timeunix DESC LIMIT 8");
?>


<div id="box_infokerja_description_wrapper">



<div id="box_infokerja_item_preview">    
<ul> 
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



		   

<li style="float:left; margin: 0pt; margin-left:10px; border-bottom:1px dashed #CCC; 
background-image: url(images/ic_list.png);
background-repeat: no-repeat;
background-position: 0px 5px;
padding-left: 14px; 

padding: 0pt; width:280px; height: 45px; display: list-item;">
 
<a id="box_infokerja_item_title" href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a> 

             
</li>                                    
 
						 

<?php 
} ?>			
</ul>
</div>

				</div>
			
 	
<!-- BOX NEWS SUB SECTION -->
</div>