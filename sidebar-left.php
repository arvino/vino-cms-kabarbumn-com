<div style="float:left;width:160px;overflow:hidden;">
<div id="Side">
		
		
<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
idkategori = '10'
AND statustampil = '1' 
ORDER BY timeunix DESC LIMIT 1");
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
<div id="SideBestDressed">
<a href="<?php 
echo $link_news_item ?>"><img width="131" src="<?php 
echo $link_host ?><?php 
echo $row_news_item->direktorigambar ?><?php 
echo $row_news_item->gambarbesar ?>" class="BestDressed" /></a>
</div>

<?php 
} ?>





<div id="SideDivider">
</div>






<div id="SideMostRead">


<?php 
$result_news_item = mysql_query("SELECT * FROM $tbl_news 
WHERE 
statustampil = '1' 
ORDER BY dilihat DESC LIMIT 5");

?>
<ul>
<?php 
while( $row_news_item = mysql_fetch_object( $result_news_item )){

	$Link_Judul = potong_judul($row_news_item->judul);
	$id = $row_news_item->id;
	$id_excp = $row_news_item->id;
	

	$judul_substr_item = potong_judul($row_news_item->judul);
	$link_news_item = "$link_host"."read-news-$row_news_item->idkategori-$row_news_item->idkategorisub-$row_news_item->id-$judul_substr_item"."$extention";

?>

<li><a href="<?php echo $link_news_item?>"> <?php echo $row_news_item->judul?> </a></li>

<?php 
} ?>
</ul>


</div>
<div class="Clear">
</div>





</div>


<div style="float:left;margin-top:20px;">
<?php include('box_banner_left_sidebar.php');?>
</div>

</div>