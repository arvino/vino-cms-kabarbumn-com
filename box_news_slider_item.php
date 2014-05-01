<?php 
$iditem = $detail_news_item->id;
	$result_itemlampiran = ViewAll_newsItemLampiran_ByItem( $tbl_newsfile, $iditem );
?>
<?php 
$iditem = $detail_news_item->id;
	$hitungdata = TotalAllDatanewsItemLampiran( $tbl_newsfile, $iditem ); 
?>
<div id="BannerMain">
        <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">



<?php 
if($hitungdata == 0){
?>
		<?php 
/* Jika data file extra tidak ada tampilkan satu foto aja */
		if($detail_news_item->gambarbesar==''){
			$show_gambar = " ";
		}else{
			$show_gambar1 = $link_host . $detail_news_item->direktorigambar . $detail_news_item->gambarbesar;
		?>
			<img src='<?php 
echo $show_gambar1 ?>' border='0' width="675px" height="350px" title='<?php echo $detail_news_item->judul ?>' alt='<?php echo $detail_news_item->judul ?>'> 
		<?php 
}
		?>
<?php 
}else{
?>

 
 
	<?php 
/* Jika data file extra tidak ada tampilkan satu foto aja */
    if($detail_news_item->gambarbesar==''){
        $show_gambar = " ";
    }else{
        $show_gambar1 = $link_host . $detail_news_item->direktorigambar . $detail_news_item->gambarbesar;
    ?>
        <img src='<?php 
echo $show_gambar1 ?>' border='0' width="675px" height="350px"   title='<?php echo $detail_news_item->judul ?>' alt='<?php echo $detail_news_item->judul ?>' >  
    <?php 
}
    ?>



	<?php 
$kolom = 1;
	while( $row_filelampiran = mysql_fetch_object($result_itemlampiran) ){
	$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
	?>
		<img src='<?php echo $LokasiFile ?>' border='0' width="675px" height="350px"   title='<?php echo $row_filelampiran->judul ?>' alt='<?php echo $row_filelampiran->judul ?>' >
		
	<?php 
} ?>
 

<?php 
} ?>


 
            </div>
        </div>
</div>