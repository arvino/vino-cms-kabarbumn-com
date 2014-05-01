<?php 
$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub=21 );
	$keterangan_subkanal = potong_judul($detail_subkanal->keterangan);

	$link_subkanal = $link_host . "news-subchannel-" . $detail_subkanal->idkategori . "-" . $detail_subkanal->idkategori . "-" . $keterangan_subkanal . $extention ;
	$link_subkanal_indeks = $link_host . "indeks-news-subkategori-" . $detail_subkanal->id . "-" . $keterangan_subkanal . $extention ;
?>

<?php 
$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori=5 );
?>

 			<div id="content_side_left_1_newschannel_itembox_wrapper">
			
				<div id="content_side_left_1_newschannel_item_title_box">
					<div id="content_side_left_1_newschannel_item_titlekanal"> RUMOR'S </div>  <div id="content_side_left_1_newschannel_item_indeks"> Indeks </div>
				</div>
				
				<div id="content_side_left_1_newschannel_item_box1">

						  <img id="content_side_left_1_newschannel_item_image" src="images/no_image.png"> 
						 <div id="content_side_left_1_newschannel_item_tanggal"> Senin, 01/01/2012 | 12:00 WIB </div>
						 <h2 id="content_side_left_1_newschannel_item_judul"> Lorem ipsum lorem ipsum lorem ipsum </h2>
				</div>
				
			</div>