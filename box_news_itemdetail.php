

<div class="item_judul_pagedetail">
	<h2 class="item_judul_pagedetail"> <?php 
echo $detail_news_item->judul ?>  </h2>
</div>
<div class="item_subjudul_pagedetail">
	<?php 
echo $detail_news_item->subjudul ?>
</div>
 
<div class="item_date_pagedetail">
	<?php 
echo hariindo($detail_news_item->tgltampil) ?>, <?php 
echo bulanindo($detail_news_item->tgltampil) ?> / <?php 
echo strtolower($detail_news_kanal->keterangan) ?> <?php 
if($detail_news_item->penulis!=""){echo"/";} ?> <?php 
echo strtolower($detail_news_item->penulis) ?>
</div>
 


		<div class="item_description_pagedetail">
		

<div id="item_description_pagedetail_image">
 		<?php 
/* Jika data file extra tidak ada tampilkan satu foto aja */
		if($detail_news_item->gambarbesar==''){
			$show_gambar = " ";
		}else{
			$show_gambar1 = $link_host . $detail_news_item->direktorigambar . $detail_news_item->gambarbesar;
		?>
		
			<img src="<?php 
echo $show_gambar1 ?>" align="right" border="0" width="300px" title="<?php echo $detail_news_item->judul ?>" alt="<?php echo $detail_news_item->judul ?>"> 
			<div id="pagedetail_news_captionfoto"> <?php echo $detail_news_item->keterangangambar?>  </div>
		
		<?php 
}
		?>
<div> 
 
<?php 
/* Hitung berita terkait : cari pada judul, subjudul, deskripsi yang berisi wordtag */ 
$wordtag = $detail_news_item->wordtag;
if($wordtag==""){
}else{
$hitung_terkait = newsItem_Count_BeritaTerkait_Detailpage( $tbl_news, $time_now, $detail_news_item->id, $detail_news_item->wordtag , $dataPerPage=3 );
 
?>
						<div id="pagedetail_berita_terkait_wrapper">
							<div id="pagedetail_berita_terkait_title">  Terkait :   </div>
							<ul>
							<?php 
$result_news_terkait = newsItem_PageLimit_BeritaTerkait_Headline_Detailpage( $tbl_news, $time_now, $detail_news_item->id, $detail_news_item->wordtag , $dataPerPage=3 );
							while($row_news_terkait_detail = mysql_fetch_object($result_news_terkait)){ 
							$judul_substr_item = potong_judul($row_news_terkait_detail->judul);
							$link_news_terkait = "$link_host"."read-news-$row_news_terkait_detail->idkategori-$row_news_terkait_detail->idkategorisub-$row_news_terkait_detail->id-$judul_substr_item"."$extention";
							?>
								<li> <a id="pagedetail_berita_terkait_item" href="<?php echo $link_news_terkait?>"> <?php echo $row_news_terkait_detail->judul?> </a> </li>
							<?php 
} ?>
							</ul>
						</div>
<?php 
}
?>
</div>
</div>

			<?php 
echo htmlspecialchars_decode($detail_news_item->deskripsi) ?>
		</div>


<?php 
if( $detail_news_item->dilihat >= "50" ){
?>
<div id="hitcounter_wrapper"> 
Dibaca : <?php 
echo $detail_news_item->dilihat ?> kali 
</div>
<?php 
}
?>


<div id="addthis_wrapper">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-505878590c5aa6d2"></script>
<!-- AddThis Button END -->

</div>


<div id="disqus_wrapper">

        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'kabarbumncom'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>


</div>

  
	
	 