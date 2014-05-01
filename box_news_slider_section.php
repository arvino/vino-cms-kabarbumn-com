<!-- START HEADLINE HOMEPAGE -->
<div class="sliderwrapper" id="slider1">
<?php 
$dataPerPage = 5;
$idkategori = $_GET['idkategori'];
$result_news_item = newsItem_PageLimit_Headline_By_Kategori_Publik( $tbl_news, $tanggalhariini, $idkategori , $dataPerPage );
while($row_news_item = mysql_fetch_object($result_news_item)){
$judul_substr_item = potong_judul($row_news_item->judul);
$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";
?>


		<div class="contentdiv">
					<div class="slide-thumbnail">
						<img src="<?php echo $link_host?><?php echo $row_news_item->direktorigambar?><?php echo $row_news_item->gambarbesar?>" alt="<?php echo $row_news_item->judul?>"/>
					</div>
					
						<div class="slide-details">
							<div id="slider_headline_tanggal"> <?php echo hariindo($row_news_item->tgltampil) . ", " . bulanindo($row_news_item->tgltampil);?> | <?php echo $row_news_item->jamtampil?> WIB </div>
							<h7><a href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a></h7>
							<p><?php echo $row_news_item->preview?></p>			 			 
						 </div>


<style>
#item-berita-terkait-title{
    color: #666666;
    font-family: Helvetica,Arial,Tahoma;
    font-size: 12px;
    margin-bottom: 1px;
    margin-top: 1px;
    width: 80px;
	text-decoration:none;
}
</style>
<?php 
/* Hitung berita terkait : cari pada judul, subjudul, deskripsi yang berisi wordtag */ 
$wordtag = $row_news_item->wordtag;
if($wordtag==""){
}else{
$hitung_terkait = newsItem_Count_BeritaTerkait_Headline_Homepage( $tbl_news, $tanggalhariini, $row_news_item->id, $row_news_item->idkategori ,  $row_news_item->idkategorisub , $row_news_item->wordtag , $dataPerPage=3 );
?>
						<div id="slider-berita-terkait-wrapper">
							 
							<ul>
							<?php 
$result_news_terkait = newsItem_PageLimit_BeritaTerkait_Headline_Homepage( $tbl_news, $tanggalhariini, $row_news_item->id, $row_news_item->idkategori ,  $row_news_item->idkategorisub , $row_news_item->wordtag , $dataPerPage=3 );
							while($row_news_terkait = mysql_fetch_object($result_news_terkait)){ 
							$judul_substr_item = potong_judul($row_news_terkait->judul);
							$link_news_terkait = "$link_host"."read-news-$row_news_terkait->idkategori-$row_news_terkait->idkategorisub-$row_news_terkait->id-$judul_substr_item"."$extention";
							?>
								<li> <a id="item-berita-terkait-title" href="<?php echo $link_news_terkait?>"> <?php echo $row_news_terkait->judul?> </a> </li>
							<?php 
} ?>
							</ul>
						</div>
<?php 
}
?>
						
						
						
					<div class="clear"></div>
		</div>


<?php 
} 
?>

</div>

<div class="pagination" id="paginate-slider1"><a class="prev" href="#prev">Previous</a> <a class="toc" href="#1" rel="1">1</a> <a class="toc" href="#2" rel="2">2</a> <a class="toc" href="#3" rel="3">3</a> <a class="toc selected" href="#4" rel="4">4</a> <a class="next" href="#next">Next</a></div>

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