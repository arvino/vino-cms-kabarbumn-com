<?php 
include"function/config_sys.php";

include"function/Function.Image.php";
include"function/Function.Angka.php";
include"function/Function.File.php";
include"function/Function.FilterKonten.php";
include"function/Function.Halaman.php";

/* Function News */

include"function/Function.News_Kanal.php";
include"function/Function.News_SubKanal.php";
include"function/Function.News_Item.php";
include"function/Function.News_ItemLampiran.php";
include"function/Function.News_Komentar.php";
?>
<?php echo '<?xml version="1.0" encoding="US-ASCII"?><rss version="2.0">';?>
	<channel>
	<title> RSS <?php 
echo $titlewebsites ?> </title> 
	<link><?php 
echo $link_host ?></link> 
	<description> </description> 
	<copyright>Copyright  <?php 
echo date('Y') ?><?php 
echo $Config_Domain ?>. All rights reserved.</copyright> 
	<lastBuildDate><?php echo date("D, d M Y H:i:s O");?></lastBuildDate> 
	<docs><?php 
echo $link_host . "rss" ?></docs> 
	<image>

	<title>RSS <?php 
echo strtoupper($Config_Domain) ?></title> 
	<url><?php 
echo $link_host ?></url> 
	<link><?php 
echo $link_host ?></link> 
	<width>215</width> 
	<height>90</height> 
	</image>

<?php 
$result_rss = newsItem_PageLimit_Terkini_All_Publik( $tbl_news, $time_now, $dataPerPage=10 );
while( $rss_news = mysql_fetch_object($result_rss)){
	
$judul_substr_item = potong_judul($rss_news->judul);
$link_news_item = "$link_host"."read-news-$rss_news->idkategori-$rss_news->idkategorisub-$rss_news->id-$judul_substr_item"."$extention";

?>
	<item>
	<title><?php echo $rss_news->judul;?></title>
	<link><?php echo $link_news_item;?></link>
	<description>&lt;img align=left hspace=5 width=100px src=<?php echo $link_host.$rss_news->direktorigambar.$rss_news->gambarkecil;?>&gt; <?php echo ($rss_news->judul);?></description>
	<category>news</category>
	<guid><?php echo $link_news_item;?></guid>
	<pubDate><?php echo date("D, d M Y H:i:s O",strtotime($rss_news->tgltampil));?></pubDate>
	</item>
<?php 
} ?>

	</channel>
</rss>
