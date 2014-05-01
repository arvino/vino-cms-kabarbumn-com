
 
	<div id="content_wrapper">
	 
		<div id="content_side_center_subrubrik"> 
				
		 
				 


<?php 
$submit_kategori = $_GET['submit_kategori'];
if(!isset($submit_kategori) OR $submit_kategori==""){

		$dataPerPage = 9;
		$noPage = 1;
		$dataperhalamanX = "";
		$offset = ($noPage - 1) * $dataPerPage;
	
		$judul_indeks = "NEWS INDEX";
	
		$idkategori = $_GET['id'];
		
		$sql_indeks = List_Indeks_news_Item_all_public( $tbl_news, $time_now );
		$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);


		$opsetr = offsethalaman($halaman,$dataPerPage);
		$offset = $opsetr[0];
		$noPage = $opsetr[1];
					
		$no = $offset + 1;


		$kategori_halaman = "indeks-newspage-allarticle-";
		$idkategori = $_GET['id'];		  	

		$posisihalaman = "$dataperhalamanX-0-indeks" . "$extention";

		$result_news_item = List_Indeks_news_Item_public($tbl_news, $time_now, $offset , $dataPerPage );
		$Total_Item_News =  Total_Indeks_news_Item_public( $tbl_news, $time_now ); 

	$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_indeks( $posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman );
	$navigasi_halaman = "<div class='pagination'> $TAMPILKANHALAMANNYA </div>";

?>

	<div id="indeks_boxtitle_wrapper"> 
		<div id="indeks_boxtitle_item"> 
			<?php 
echo $judul_indeks ?> 
		</div>
		<div id="indeks_boxtitle_search"> 
			<?php include('box_news_form_indeks.php');?>
		</div>
	</div>
	
	 
	
	<div id="content_side_left_2_indeks_wrapper"> 
	 
 
	<?php 
include"box_news_list_item.php" 
	?>
	
	<?php 
echo $navigasi_halaman ?> 
	
	</div>

	
<?php 
}else{  ?>



<?php 
$idkategori = $_GET['id'];
	$dataPerPage = 9;
	$noPage = 1;
	$dataperhalamanX = "";
	$offset = ($noPage - 1) * $dataPerPage;

	if($submit_kategori=="kategori"){
		$idkategori = $_GET['id'];
		$sql_indeks = list_all_publish_item_news_bykategori_list($tbl_news, $tanggalhariini, $idkategori );
		$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);
			
		$kategori_halaman = "index-newspage-kategori-";
		$idkategori = $_GET['id'];		  	
		$detail_kanal_news = Detail_Kanalnews_Publish( $tbl_newskategori , $idkategori );
		$KETERANGAN_JUDUL = strtoupper($detail_kanal_news->keterangan);
		$KETERANGAN_LINKJUDUL = potong_judul($detail_kanal_news->keterangan);
		$posisihalaman = "$dataperhalamanX-$idkategori-$KETERANGAN_LINKJUDUL" . "$extention";
		
		$result_news_item = List_Indeks_News_Item_Kategori_ByPage($tbl_news, $tanggalhariini, $idkategori , $offset , $dataPerPage   );
		$Total_Item_News =  Total_LIST_ALL_PUBLISH_Indeks_News_Item_ByKategori( $tbl_news, $tanggalhariini, $idkategori ); 

	}
	
	if($submit_kategori=="subkategori"){
		$idkategori = $_GET['id'];
		$sql_indeks = list_all_publish_item_news_bysubkategori_list($tbl_news, $tanggalhariini, $idkategori );
		$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);
			
		$kategori_halaman = "index-newspage-subkategori-";
		$idkategori = $_GET['id'];
		$detail_subkanal_news = Detail_SubKanalnews_Publish( $tbl_newskategorisub , $idkategori );
		$KETERANGAN_JUDUL = strtoupper($detail_subkanal_news->keterangan);
		$KETERANGAN_LINKJUDUL = potong_judul($detail_subkanal_news->keterangan);
		$posisihalaman = "$dataperhalamanX-$idkategori-$KETERANGAN_LINKJUDUL" . "$extention";
		
		$result_news_item = List_Indeks_news_Item_SubKategori_ByPage($tbl_news, $tanggalhariini, $idkategori , $offset , $dataPerPage   );
		$Total_Item_News =  Total_LIST_ALL_PUBLISH_Indeks_News_Item_ByKategori( $tbl_news, $tanggalhariini, $idkategori ); 
		
	}
			
	$opsetr = offsethalaman($halaman,$dataPerPage);
	$offset = $opsetr[0];
	$noPage = $opsetr[1];
				
	$no = $offset + 1;

	if($submit_kategori=="kategori"){
		$idkategori = $_GET['id'];
							 
		$result_news_item = List_Indeks_News_Item_Kategori_ByPage($tbl_news, $tanggalhariini, $idkategori , $offset , $dataPerPage   );
		$Total_Item_News =  Total_LIST_ALL_PUBLISH_Indeks_News_Item_ByKategori( $tbl_news, $tanggalhariini, $idkategori ); 
	}
	
	if($submit_kategori=="subkategori"){
		$idkategori = $_GET['id'];
	
		$result_news_item = List_Indeks_news_Item_SubKategori_ByPage($tbl_news, $tanggalhariini, $idkategori , $offset , $dataPerPage   );
		$Total_Item_News =  Total_LIST_ALL_PUBLISH_Indeks_News_Item_ByKategori( $tbl_news, $tanggalhariini, $idkategori ); 
	}

	$judul_indeks = "FOUND $HitungJumlahItemnews NEWS ";
	$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_indeks($posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman);
	$navigasi_halaman = "<div class='pagination'>$TAMPILKANHALAMANNYA</div>";

?>

	<div id="indeks_boxtitle_wrapper"> 
		<div id="indeks_boxtitle_item"> 
			<?php 
echo $judul_indeks ?> 
		</div>
		<div id="indeks_boxtitle_search"> 
			<?php include('box_news_form_indeks.php');?>
		</div>
	</div>
	


	<div id="content_side_left_2_indeks_wrapper"> 
	 
 
	<?php 
include"box_news_list_item.php" 
	?>
	
	<?php 
echo $navigasi_halaman ?> 
	
	</div>

	

<?php 
}
?>
 
 
		 


		</div>
		 
		
		 
		<div id="content_side_right">

<?php 
include"box_news_kategori_indeks.php"; ?>
 
 

		</div>
		 
		
	</div>
 