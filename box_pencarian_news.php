<div id="content_column_right_wrapper">


<?php 
$jumlah_news = GetJML_Search_Item_news_Publish( $tbl_news, $form_search );
?>



<div> 

SEARCH RESULT   <b><u> Keyword  </u></b> " <?php 
echo $form_search ?> " found " <?php 
echo $jumlah_news ?> " news content.

</div>


<?php 
$_SESSION['item_data_perhalaman'] = $_GET['data_perhalaman'];
		if( $_SESSION['item_data_perhalaman'] == ''){
			$dataPerPage = 10;
			$_SESSION['item_data_perhalaman']	= "10";
		}else{
			$dataPerPage = $_SESSION['item_data_perhalaman'];
		}

if(isset($_GET['data_perhalaman'])){
 	$noPage = $_GET['data_perhalaman'];
 	$dataperhalamanX = "data_perhalaman=" . $_GET['data_perhalaman'];
}else{
 	$noPage = 1;
 	$dataperhalamanX = "";
}
$offset = ($noPage - 1) * $dataPerPage;

		$sql_search = Search_Item_news_Publish($tbl_news, $form_search );
		
		$HitungJumlahItemnews  = mysql_num_rows($sql_search);
		$opsetr = offsethalaman($halaman,$dataPerPage);
		$offset = $opsetr[0];
		$noPage = $opsetr[1];
		
		$no = $offset + 1;

		$kategori_halaman = "search-data-$modul-$form_search-";

		
$Link_Keyword_Search = potong_judul($form_search);
$posisihalaman = "$dataperhalamanX-$Link_Keyword_Search" . "$extention";

$result_news_item = Search_Item_news_Publish_ByPage( $tbl_news, $form_search , $offset , $dataPerPage );

$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_pencarian( $posisihalaman, $HitungJumlahItemnews ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman );
$navigasi_halaman = "<div class='pagination'>	$TAMPILKANHALAMANNYA	</div>";
$jml_item_line1 = "3";
$lebar_box = "25%";



?>


<?php 
include"box_news_list_item.php";?>

</div>
<?php 
echo $navigasi_halaman ?>
