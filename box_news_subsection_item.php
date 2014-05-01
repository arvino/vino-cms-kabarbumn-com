<div id="content_side_left_2_subsection_wrapper"> <!-- START BOX SUBSECTION NEWS  -->

<?php 
$idkategori = $_GET['idkategori'];
?>

<?php 
$result_box_subkanal = Select_All_SubKategori_otherpage_By_Urutan( $tbl_newskategorisub, $idkategori );
$jml_item_line_subkanal = "1";  
$lebar_box_subkanal = "100%";
?>





<?php 
$kolom_subkanal=1;
while($row_box_subkanal = mysql_fetch_object($result_box_subkanal))	{

	$SubKanal_Id = $row_box_kanal->id;
 
	$SubKanal_Keterangan = $row_box_subkanal->keterangan;
	$SubKanal_Keterangan  = strtoupper($SubKanal_Keterangan);
	$LINKJUDUL_SUBKANAL_MENU = potong_judul( $SubKanal_Keterangan );
 

 
	$LinkKanalNya  = "$link_host" . "news-subchannel-$row_box_subkanal->idkategori-$row_box_subkanal->id-$LINKJUDUL_SUBKANAL_MENU"."$extention";
 	
	

?>

<div id="content_side_left_2_subsection_title_wrapper">  

	<a href="<?php echo $LinkKanalNya ?>" id="content_side_left_2_subsection_title">  <?php 
echo $SubKanal_Keterangan;?>  </a>
	<a href="<?php echo $LinkKanalNya?>" id="content_side_left_2_subsection_indeks"> Index </a>

</div>

<?php 
$dataPerPage = 1;
			
$noPage = 1;

$dataperhalamanX = "";
 
$offset = ($noPage - 1) * $dataPerPage;

$submit_kategori = $_GET['submit_kategori'];

$idkategori = $row_box_subkanal->idkategori;

$idkategorisub = $row_box_subkanal->id;

$sql_indeks = list_all_publish_item_news_bykategorijugasubkategori( $tbl_news, $idkategori, $idkategorisub );

$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);

$opsetr = offsethalaman($halaman,$dataPerPage);
$offset = $opsetr[0];
$noPage = $opsetr[1];
		
$no = $offset + 1;

$kategori_halaman = "news-channel-";

$idkategori = $row_box_subkanal->idkategori;

$idkategorisub = $row_box_subkanal->id;


$detail_kanal_news = Detail_Kanalnews_Publish( $tbl_newskategori, $idkategori );
$KETERANGAN_JUDUL = strtoupper($detail_kanal_news->keterangan);
$KETERANGAN_LINKJUDUL = potong_judul($detail_kanal_news->keterangan);

$posisihalaman = "$dataperhalamanX-$idkategori-$KETERANGAN_LINKJUDUL" . "$extention";

$idkategori = $row_box_subkanal->idkategori;

$idkategorisub = $row_box_subkanal->id;


$result_news_item = List_Indeks_news_Item_KategoriJugaSubKategori_ByPage( $tbl_news,  $idkategori, $idkategorisub, $offset , $dataPerPage );
$Total_Item_news =  total_list_all_publish_indeks_news_item_bykategorijugasubkategori( $tbl_news,  $idkategori , $idkategorisub ); 

?>
<?php 
$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_indeks( $posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman );
$navigasi_halaman = "<div class='pagination'>$TAMPILKANHALAMANNYA</div>";
?>

<?php 
$kolom=1;
$jml_item_line1 = "1"; /* Jumlah  perbaris */
?>
              
<?php include('box_news_item_subsection.php'); ?>

 		
 
<?php 
$kolom_subkanal++;
}
?>

</div><!-- END BOX SUBSECTION NEWS -->