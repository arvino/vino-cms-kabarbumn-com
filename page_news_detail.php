<?php 
session_name("CUST");
session_start();
include "sc_session.php";
include("kelas_function.php");
?>
<?php 
$id = $_GET['id']; /* periksa id item news*/
$idkategori = $_GET['idkategori']; /* periksa id kategori news */
$idkategorisub = $_GET['idkategorisub']; /* periksa id sub kategori news*/

$detail_news_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
$detail_news_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idkategorisub );
$detail_news_item = Select_Detail_Item_news($tbl_news, $id);

$newsHitKategori = newsKanalDiLihat( $tbl_newskategori, $idkategori );
$newsHitKategoriSub = newsSubKanalDiLihat( $tbl_newskategorisub, $idkategorisub );
$newsHitItem = newsDiLihat( $tbl_news, $id );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$titlewebsites =  $detail_news_item->judul; ?>
<?php 
$META_DESCRIPTION = $detail_news_item->preview; ?>
<?php 
$META_KEYWOARD = $detail_news_item->keyword; ?>
<?php 
$META_IMAGESRC = $link_host . $detail_news_item->direktorigambar . $detail_news_item->gambarkecil; ?>

<?php 
include('head_meta_tags.php'); ?>
<?php 
include("head_detail.php"); ?>
</head>
<!-- START BODY WRAPPER -->
<div id="body_wrapper">
<?php include('section_header.php');?>
<?php include('menu_navigasi_utama.php');  ?>
<?php include('section_content_news_detail.php');?><!-- PAGE DETAIL FOR NEWS -->
<?php include('section_footer.php');?>
</div>
<!--END WRAPPER BODY -->
</body>
</html>