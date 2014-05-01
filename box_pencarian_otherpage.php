<?php 
$jumlah_otherpage = GetJML_Search_Item_otherpage_Publish( $tbl_otherpage, $form_search );
?>

SEARCH RESULT  

<hr class='line_box'>

<b><u> Keyword  </u></b> " <?php 
echo $form_search ?> " found " <?php 
echo $jumlah_otherpage ?> " item content.

<hr class='line_box'>
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

		$sql_search = Search_Item_otherpage_Publish($tbl_otherpage, $form_search );
		
		$HitungJumlahItemotherpage  = mysql_num_rows($sql_search);
		$opsetr = offsethalaman($halaman,$dataPerPage);
		$offset = $opsetr[0];
		$noPage = $opsetr[1];
		
		$no = $offset + 1;

		$kategori_halaman = "search-data-$modul-$form_search-";
		
		
$Link_Keyword_Search = potong_judul($form_search);
$posisihalaman = "$dataperhalamanX-$Link_Keyword_Search" . "$extention";

$result_otherpage_item = Search_Item_otherpage_Publish_ByPage( $tbl_otherpage, $form_search , $offset , $dataPerPage );

$TAMPILKANHALAMANNYA =  tampilkanhalaman_hasil_pencarian( $posisihalaman, $HitungJumlahItemotherpage ,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman );
$navigasi_halaman = "<div class='pagination'>	$TAMPILKANHALAMANNYA	</div>";
$jml_item_line1 = "4";
$lebar_box = "25%";



?>

<?php 
echo $navigasi_halaman ?>
<?php 
include"box_otherpage_list_item.php";?>
<?php 
echo $navigasi_halaman ?>
