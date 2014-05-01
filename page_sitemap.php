<?php 
include"function/config_sys.php";

include"function/Function.Image.php";
include"function/Function.Angka.php";
include"function/Function.File.php";
include"function/Function.FilterKonten.php";
include"function/Function.Halaman.php";

/* Function Otherpage */
include"function/Function.Otherpage_Kanal.php";
include"function/Function.Otherpage_SubKanal.php";
include"function/Function.Otherpage_Item.php";
include"function/Function.Otherpage_ItemLampiran.php";

/* Function News */
include"function/Function.News_Kanal.php";
include"function/Function.News_SubKanal.php";
include"function/Function.News_Item.php";
include"function/Function.News_ItemLampiran.php";
include"function/Function.News_Komentar.php";
?>
 
<?php echo  '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
      http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
  <loc><?php echo $link_host;?></loc>
  <changefreq>weekly</changefreq>
  <priority>0.30</priority>
</url>


<?php 
$sql_kanal_menu =  Select_All_Publish_news_Kategori( $tbl_newskategori );
while($result_kanal_menu = mysql_fetch_object( $sql_kanal_menu)){

$KET_MENU = $result_kanal_menu->keterangan;
$LINKJUDUL_KANAL_MENU = potong_judul( $KET_MENU );

$idkategori = $result_kanal_menu->id;
$HitungSubKategori = newsCount_KategoriSub_ByKategori( $tbl_newskategorisub, $idkategori);
 
$LinkSubNya  = "$link_host" . "news-channel-$result_kanal_menu->id-$LINKJUDUL_KANAL_MENU$extention";
?>

<url>
  <loc><?php echo $LinkSubNya?></loc>
  <changefreq>hourly</changefreq>
  <priority>0.80</priority>
</url>

<?php 
} ?>

<?php 
$sql_otherpage_kanal = Select_All_Publish_otherpage_Kategori( $tbl_otherpagekategori );
while( $row_otherpage_kanal = mysql_fetch_object($sql_otherpage_kanal)){
$judul_substr_kanal = potong_judul( $row_otherpage_kanal->keterangan );
$link_otherpage_section = "$link_host"."otherpage-category-$row_otherpage_kanal->id-$judul_substr_kanal"."$extention";
?>
	 
<url>
  <loc><?php echo $link_otherpage_section?></loc>
  <changefreq>hourly</changefreq>
  <priority>0.80</priority>
</url>

<?php 
} ?>

<url>
  <loc><?php echo $link_host ?>rss</loc>
  <changefreq>hourly</changefreq>
  <priority>0.80</priority>
</url>

<url>
  <loc><?php echo $link_host ?>newsletter-<?php 
echo $extention ?></loc>
  <changefreq>hourly</changefreq>
   <priority>0.80</priority>
</url>


	 
</urlset>



