<?php 
include("kelas_function.php");
?>
<?php 
$id = $_GET['id']; /* periksa id banner*/
$detail_banner = Select_Detail_Item_banner($tbl_banner, $id);

/* Simpan histori akses */
 
$hitung_web_Banner = cekHitsBannerLog( $tbl_bannerlog, $detail_banner->id, $REMOTE_ADDR, $tanggalhariini );

 	if( $hitung_web_Banner == 0){
		
		$id = BuatIDBannerlog( $tbl_bannerlog );

		$hit = 1;
		
		addHitsBannerlog(
			$tbl_bannerlog,
			$id,
			$detail_banner->idkategori,
			$detail_banner->idkategorisub,
			$detail_banner->id,
			$REMOTE_ADDR, $tanggalhariini,
			$jamsaatini, $BROWSER_UO, $REFERER_UO,
			$fileygdiakses, $hit 

		);

 
 		}else{
		
			updateHitsBannerLog( $tbl_bannerlog, $detail_banner->id, $REMOTE_ADDR, $tanggalhariini, $hits);
				 
 	
	}
 

?>

<script> 
location.replace('<?php 
echo $detail_banner->linkurl ?>');
</script>