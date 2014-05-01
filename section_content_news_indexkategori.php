
 
	<div id="content_wrapper">
        <div id="content_side_center_subrubrik"> 

 
<?php 
$submit_kategori = $_GET['submit_kategori'];

if( isset($_POST['indeksdate_input']) || $submit_kategori=="searchbydatearticle"){


	if(isset($_POST['indeksdate_input'])){
	
	$Tanngal = $_POST['indeksdate_input'];
	$arrTgl = explode("/",$Tanngal);

	$tahun_array = $arrTgl['2'];
	if($tahun_array=='1')$tahun_array="01";
	if($tahun_array=='2')$tahun_array="02";
	if($tahun_array=='3')$tahun_array="03";
	if($tahun_array=='4')$tahun_array="04";
	if($tahun_array=='5')$tahun_array="05";
	if($tahun_array=='6')$tahun_array="06";
	if($tahun_array=='7')$tahun_array="07";
	if($tahun_array=='8')$tahun_array="08";
	if($tahun_array=='9')$tahun_array="09";

	
	$bulan_array = $arrTgl['0'];
	if($bulan_array=='1')$bulan_array="01";
	if($bulan_array=='2')$bulan_array="02";
	if($bulan_array=='3')$bulan_array="03";
	if($bulan_array=='4')$bulan_array="04";
	if($bulan_array=='5')$bulan_array="05";
	if($bulan_array=='6')$bulan_array="06";
	if($bulan_array=='7')$bulan_array="07";
	if($bulan_array=='8')$bulan_array="08";
	if($bulan_array=='9')$bulan_array="09";

	$tanggal_array = $arrTgl['1'];
	if($tanggal_array=='1')$tanggal_array="01";
	if($tanggal_array=='2')$tanggal_array="02";
	if($tanggal_array=='3')$tanggal_array="03";
	if($tanggal_array=='4')$tanggal_array="04";
	if($tanggal_array=='5')$tanggal_array="05";
	if($tanggal_array=='6')$tanggal_array="06";
	if($tanggal_array=='7')$tanggal_array="07";
	if($tanggal_array=='8')$tanggal_array="08";
	if($tanggal_array=='9')$tanggal_array="09";
	
	
	$tgltampil =  $tahun_array .'-'.  $bulan_array  .'-'.  $tanggal_array;
	
	}else{
	
	$tgltampil =  $_GET['id'];
	 
	}

		$dataPerPage = 9;
		$noPage = 1;
		$dataperhalamanX = "";
		$offset = ($noPage - 1) * $dataPerPage;
	
		$judul_indeks = "INDEKS BERITA PERTANGGAL $tgltampil";
	
		$idkategori = $_GET['id'];
		
		$sql_indeks = List_Indeks_news_Item_all_By_Tanggal( $tbl_news , $time_now , $tgltampil );
		$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);


		$opsetr = offsethalaman($halaman,$dataPerPage);
		$offset = $opsetr[0];
		$noPage = $opsetr[1];
					
		$no = $offset + 1;


		$kategori_halaman = "indeks-newspage-searchbydatearticle-";
		$idkategori = $_GET['id'];		  	

		$posisihalaman = "$dataperhalamanX-$tgltampil-indeks" . "$extention";

		$result_news_item = List_Indeks_news_Item_ByPage_Tanggal($tbl_news,  $time_now , $tgltampil, $offset , $dataPerPage );
		$Total_Item_News = Total_Indeks_news_Item_By_Tanggal( $tbl_news, $time_now , $tgltampil ); 

	$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_indeks( $posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman );
	$navigasi_halaman = "<div class='pagination'> $TAMPILKANHALAMANNYA </div>";

}else{


if( $submit_kategori=="allarticle"){

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

}else{

	$idkategori = $_GET['id'];
	$dataPerPage = 9;
	$noPage = 1;
	$dataperhalamanX = "";
	$offset = ($noPage - 1) * $dataPerPage;

	if($submit_kategori=="kategori"){
		$idkategori = $_GET['id'];
		$sql_indeks = list_all_publish_item_news_bykategori_list($tbl_news, $tanggalhariini, $idkategori );
		$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);
			
		$kategori_halaman = "indeks-newspage-kategori-";
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
		$sql_indeks = list_all_publish_item_news_bysubkategori_list_indexarticle($tbl_news, $tanggalhariini, $idkategori );
		$HitungJumlahItemnews  = mysql_num_rows($sql_indeks);
			
		$kategori_halaman = "indeks-newspage-subkategori-";
		$idkategori = $_GET['id'];
		$detail_subkanal_news = Detail_SubKanalnews_Publish( $tbl_newskategorisub , $idkategori );
		$KETERANGAN_JUDUL = strtoupper($detail_subkanal_news->keterangan);
		$KETERANGAN_LINKJUDUL = potong_judul($detail_subkanal_news->keterangan);
		$posisihalaman = "$dataperhalamanX-$idkategori-$KETERANGAN_LINKJUDUL" . "$extention";
		
		$result_news_item = list_all_publish_item_news_bysubkategori_bypage_indexarticle($tbl_news, $tanggalhariini,  $idkategori, $offset , $dataPerPage   );
		 
		$Total_Item_News =  total_list_all_publish_item_news_bysubkategori_indexarticle( $tbl_news, $tanggalhariini, $idkategorisub ); 
		 
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
	
	$result_news_item = list_all_publish_item_news_bysubkategori_bypage_indexarticle($tbl_news, $tanggalhariini,  $idkategori, $offset , $dataPerPage   );
		 
		$Total_Item_News =  total_list_all_publish_item_news_bysubkategori_indexarticle( $tbl_news, $tanggalhariini, $idkategorisub ); 
		  
	}

	$judul_indeks = "DITEMUKAN $HitungJumlahItemnews BERITA ";
	$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_indeks($posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman);
	$navigasi_halaman = "<div class='pagination'>$TAMPILKANHALAMANNYA</div>";

?>

<?php 
}} ?>

	<div id="indeks_boxtitle_wrapper"> 
		<div id="indeks_boxtitle_item"> 
			<?php 
echo $judul_indeks ?> 
		</div>
		<div id="indeks_boxtitle_search"> 
			<?php include('box_news_form_indeks.php');?>
		</div>
	</div>
	
	 
	
 
	 
 
	<?php 
include"box_news_list_item.php" 
	?>
	
	<?php 
echo $navigasi_halaman ?> 
	
 

		</div>
 
		<div id="content_side_right">

<?php 
include"box_news_kategori_indeks.php"; ?>
 
 

		</div>
	 
	</div>
 