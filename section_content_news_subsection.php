
<!-- START CONTENT SECTION -->
	<div id="content_wrapper">
 
		
 
		<div id="content_side_center_subrubrik"> 
        

<?php include('box_news_slider_subsection.php'); ?>
    
<?php 
$id_excp1x = substr($id_excp1,0,-1);
if($id_excp1x==""){ echo "Data Not Available..."; }else{
?>

<?php 
$idkategori = $_GET['idkategori'];
$idkategorisub = $_GET['idkategorisub'];



$HitungSubKategori = AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori );
if($HitungSubKategori==0){
	$detail_kanal_news = Detail_Kanalnews_Publish( $tbl_newskategori , $idkategori );
	$SubKanal_Keterangan = strtoupper($detail_kanal_news->keterangan);
}else{
	$detail_subkanal_news = Detail_SubKanalnews_Publish( $tbl_newskategorisub , $idkategorisub );
	$SubKanal_Keterangan = strtoupper($detail_subkanal_news->keterangan);
}

?>

<?php 
$id_excp1x = substr($id_excp1,0,-1);

$dataPerPage = 8;
			
$noPage = 1;

$dataperhalamanX = "";
 
$offset = ($noPage - 1) * $dataPerPage;

 
$idkategori = $_GET['idkategori'];

$idkategorisub = $_GET['idkategorisub'];

$sql_indeks = list_all_publish_item_news_bysubkategori_list_idexception($tbl_news, $tanggalhariini, $idkategori, $idkategorisub, $id_excp1x="$id_excp1x"   );

$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);

$opsetr = offsethalaman($halaman,$dataPerPage);
$offset = $opsetr[0];
$noPage = $opsetr[1];
		
$no = $offset + 1;

$kategori_halaman = "news-subchannel-";

$idkategori = $_GET['idkategori'];
$idkategorisub = $_GET['idkategorisub'];

$detail_kanal_news = Detail_Kanalnews_Publish( $tbl_newskategori, $idkategori );

$KETERANGAN_JUDUL = strtoupper($detail_kanal_news->keterangan);
$KETERANGAN_LINKJUDUL = potong_judul($detail_kanal_news->keterangan);

$posisihalaman = "$dataperhalamanX-$idkategori-$idkategorisub-$KETERANGAN_LINKJUDUL" . "$extention";

$idkategori = $_GET['idkategori'];
$idkategorisub = $_GET['idkategorisub'];

$result_news_item = List_Indeks_news_Item_SubKategori_ByPage_idexception($tbl_news, $tanggalhariini, $idkategori , $id_excp1x="$id_excp1x"  , $idkategorisub, $offset , $dataPerPage );

$Total_Item_news =  total_list_all_publish_indeks_news_item_bysubkategori_idexception( $tbl_news, $tanggal, $idkategori, $idkategorisub, $id_excp1x="$id_excp1x"  ); 

?>
<?php 
$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_indeks( $posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman );
$navigasi_halaman = "<div class='pagination'> Page :  $TAMPILKANHALAMANNYA</div>";
?>
<?php 
$kolom=1;
$jml_item_line1 = "3"; /* Jumlah  perbaris */
$lebar_box = "25%";

?>
              
<?php include('box_news_item.php'); ?>

<?php 
echo $navigasi_halaman  ?>
        
 
<?php 
} ?>
        
        
        </div>
		<!-- END SPARATOR CONTENT -->
		
		
		 
		<div id="content_side_right">
		

			<?php include('box_news_infokerja.php');?>

			<?php include('box_news_mostread_homepage.php');?>
			
            <?php include('box_banner_right_sidebar1.php');?>
            
            <?php include('box_news_kolompakar.php');?> 
            
            <?php include('box_newsletter.php');?> 

			<?php include('box_banner_right_sidebar2.php');?>
			
            <?php include('box_socialmedia.php');?>	


		</div>
		 
		
	</div>
 