<?php 
session_name("CUST");
session_start();
include "sc_session.php";
include("kelas_function.php");
?>

<?php 
$id = $_GET['id']; /* periksa id item */
$idkategori = $_GET['idkategori']; /* periksa id kategori */
$idkategorisub = $_GET['idkategorisub']; /* periksa id sub kategori */
$detail_news_kanal = Detail_Kanalnews_Publish( $tbl_newskategori , $idkategori );
$detail_news_subkanal = Detail_SubKanalnews_Publish( $tbl_newskategorisub , $idkategorisub );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$titlewebsites =  $titlewebsites . " | " . $detail_news_kanal->keterangan ; ?>
<?php 
$META_DESCRIPTION = $Config_Domain . ", " . $detail_news_kanal->keterangan . ", " . $detail_news_subkanal->keterangan; ?>
<?php 
$META_KEYWOARD = $Config_Domain . ", " .  $detail_news_kanal->keterangan . ", " . $detail_news_subkanal->keterangan; ?>

<?php 
include('head_meta_tags.php'); ?>
<?php 
include('head_subsection.php'); ?>
</head>
<!-- START BODY WRAPPER -->
<div id="body_wrapper">
<?php include('section_header.php');?>
<?php include('menu_navigasi_utama.php');  ?>
<?php include('section_content_news_subsection.php');?>
<?php include('section_footer.php');?>
</div>
</body>
</html>