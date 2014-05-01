<!-- START HEADLINE HOMEPAGE -->
 
<div id="box_headlinesection_pagination">
<div class="pagination_headline_section" id="paginate-slider1">
<a class="prev" href="#prev">Previous</a> <a class="toc" href="#1" rel="1">1</a> <a class="toc" href="#2" rel="2">2</a> <a class="toc" href="#3" rel="3">3</a> <a class="toc selected" href="#4" rel="4">4</a> <a class="next" href="#next">Next</a>
</div>
</div>

<div class="sliderwrapper" id="slider1">


<?php 
$dataPerPage = 2;
$idkategori = $_GET['idkategori']; 
$idkategorisub = $_GET['idkategorisub'];

$result_news_item = mysql_query("SELECT * FROM $tbl_news WHERE 
idkategori = '$idkategori' AND idkategorisub = '$idkategorisub' AND 
statustampil = '1' 
ORDER BY timeunix DESC LIMIT $dataPerPage");



while($row_news_item = mysql_fetch_object($result_news_item)){
$judul_substr_item = potong_judul($row_news_item->judul);
	$id = $row_news_item->id;
	$id_excp1 .= "'$row_news_item->id'" . ",";
	
	$idkategori = $row_news_item->idkategori;
	$idkategorisub = $row_news_item->idkategorisub;

	$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );
	if($HitungSubKategori==0){
		$detail_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
		$section_name = $detail_kanal->keterangan;
		//$link_section = $link_host . "news-channel-$detail_kanal->id-" . potong_judul($section_name) . $extention;
		$link_section = $link_host . "news-subchannel-$idkategori-$idkategorisub-"  . potong_judul($section_name) . $extention;
	}else{
		$detail_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub );
		$section_name = $detail_subkanal->keterangan;
		$link_section = $link_host . "news-subchannel-$idkategori-$detail_subkanal->id-"  . potong_judul($section_name) . $extention;
	}

	$judul_substr_item = potong_judul($row_news_item->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";


?>


		<div class="contentdiv">
					<div class="slide-thumbnail">
						<img src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarbesar?>" alt="<?php echo $row_news_item->judul?>"/>
					</div>
					
						<div class="slide-details">
						 
                            
							<h1><a href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a></h1>
							<p><?php echo $row_news_item->preview?></p>			 			 
						 </div>

						
					<div class="clear"></div>
		</div>


<?php 
} 
?>

</div>

 
<script type="text/javascript">

featuredcontentslider.init({
	id: "slider1",  //id of main slider DIV
	contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
	toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
	nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
	revealtype: "mouseover", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
	enablefade: [true, 0.2],  //[true/false, fadedegree]
	autorotate: [true, 3000],  //[true/false, pausetime]
	onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
		//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
		//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
	}
})

</script>
<!-- END HEADLINE HOMEPAGE -->