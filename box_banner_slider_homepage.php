<div id="BannerMain">
        <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
			
<?php 
$dataPerPage = 4;
$no_banner = 1;
$result_banner_item = Show_banner($tbl_banner, $idkategori=2, $idkategorisub=0, $dataPerPage );
while($row_banner_item = mysql_fetch_object($result_banner_item)){
$judul_substr_item = potong_judul($row_banner_item->judul);
$link_banner = "$link_host"."banner-$row_banner_item->id-detail"."$extention";
?>
	 
     <a target="<?php 
echo $row_banner_item->target ?>" href="<?php 
echo $link_banner ?>">
         <img  width="675px" height="350px"  src="<?php 
echo $link_host ?><?php 
echo $row_banner_item->direktorigambar ?><?php 
echo $row_banner_item->namafile ?>" alt="<?php 
echo $row_banner_item->judul ?>"  title="<?php 
echo $row_banner_item->judul ?>">
     </a>


<?php 
} 
?>

            </div>
        </div>
</div>
