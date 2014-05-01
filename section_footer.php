<!-- FOOTER SECTION -->
<style>
#footer_menu_utama{
    font-size: 11px;
    font-weight: bold;
    margin-left: 95px;
    margin-top: 10px;
    text-align: center;
    vertical-align: middle;
    width: 475px;	
}

#footer_menu_additional{
    font-size: 9px;
    margin-left: 30px;
    margin-top: 20px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: middle;
    width: 600px;
}
</style>


	<div id="footer_wrapper">

		<div id="footer_side_left"> 
			<div>
			<img src="<?php echo $link_host?>images/<?php echo $Config_Domain?>-logo-fixed-footer.png"> 
			</div>
			<div style="float: left;margin-left: 4px;overflow: hidden;font-size:10px;">
			<?php echo $footer_copyright?>
			</div>
		</div>
		
		<div id="footer_side_center"> &nbsp; </div>
		<div id="footer_side_right">
		
			
			<div id="footer_menu_utama">
			
			
<?php 
$sql_kanal_menu = List_MenuAtas1_Kanalnews( $tbl_newskategori );
while($result_kanal_menu = mysql_fetch_object( $sql_kanal_menu)){

$KET_MENU = $result_kanal_menu->keterangan;
$LINKJUDUL_KANAL_MENU = potong_judul( $KET_MENU );

$idkategori = $result_kanal_menu->id;
$LinkSubNya  = "$link_host" . "news-subchannel-$result_kanal_menu->id-0-$LINKJUDUL_KANAL_MENU$extention";
?>


								<a href="<?php 
echo $LinkSubNya ?>" class="footer_menu">
									<?php echo $KET_MENU?> 
								</a> | 
	 
				
<?php 
} ?>				
				<a class="footer_menu" href="<?php echo $link_host?>indeks<?php echo $extention?>"> INDEKS </a>  
			</div>
			
			<div id="footer_menu_additional">

				

<?php 
$sql_otherpage_kanal = View_Kanalotherpage_Publish_MenuBawah1( $tbl_otherpagekategori );
while( $row_otherpage_kanal = mysql_fetch_object($sql_otherpage_kanal)){
$judul_substr_kanal = potong_judul( $row_otherpage_kanal->keterangan );


/* Hitung Sub Kategori otherpage */
$count_otherpage_subkanal =  AmbilJumlahTotalotherpageKategoriSub_ByKategori( $tbl_otherpagekategorisub, $row_otherpage_kanal->id );
if($count_otherpage_subkanal==0){
	/* Jika tidak ada sub kanal - query item - arahkan ke halaman detail otherpage */
	$idkategorisub_otherpage = "0";
	$detail_otherpage_item = ViewDetail_Item_otherpage_Kategori( $tbl_otherpage, $row_otherpage_kanal->id, $idkategorisub_otherpage );
	$judul_substr_item = potong_judul($detail_otherpage_item->judul);

	$link_otherpage_item = "$link_host"."otherpage-subcategory-$row_otherpage_kanal->id-0-$judul_substr_kanal"."$extention";

	if ( ($row_otherpage_kanal->id==$_GET[idkategori]) AND $_GET['modul'] == "otherpage" ){
			$otherpage_class="";
	} else {
			$otherpage_class="";
	}

}else{

	$judul_substr_item = potong_judul($detail_otherpage_item->judul);
	$link_otherpage_item = "$link_host"."otherpage-category-$row_otherpage_kanal->id-$judul_substr_kanal"."$extention";
	
	if ( ($row_otherpage_kanal->id==$_GET[idkategori]) AND $_GET['modul'] == "otherpage"  ){
			$otherpage_class="";
	} else {
			$otherpage_class="";
	}

}
 
	$judul_kanal = $row_otherpage_kanal->keterangan;
?>
     <a class="footer_menu"  href="<?php 
echo $link_otherpage_item ?>"> <?php 
echo $judul_kanal ?>  </a> |
<?php 
} ?>

				 
				<a class="footer_menu" href="<?php echo $link_host?>mobile"> MOBILE SITE </a>  | 
                <a class="footer_menu" href="<?php echo $link_host?>newsletter<?php echo $extention?>"> NEWSLETTER </a>  | 
                             
              
				<a class="footer_menu" href="<?php echo $link_host?>rss"> RSS </a>
				
				
			</div>
			
		
		
		 </div>
	</div>
<!-- END FOOTER SECTION -->
	
<?php 
include('box_banner_footer.php');?>


        
