<?php 
$dataPerPage = 1;
$no_banner = 1;
$result_banner_item = Show_banner($tbl_banner, $idkategori=7, $idkategorisub=0, $dataPerPage );
while($row_banner_item = mysql_fetch_object($result_banner_item)){
$judul_substr_item = potong_judul($row_banner_item->judul);
$link_banner = "$link_host"."banner-$row_banner_item->id-detail"."$extention";
?>
	 
     <a target="<?php 
echo $row_banner_item->target ?>" href="<?php 
echo $link_banner ?>">
         <img  src="<?php 
echo $link_host ?><?php 
echo $row_banner_item->direktorigambar ?><?php 
echo $row_banner_item->namafile ?>" alt="<?php 
echo $row_banner_item->judul ?>">
     </a>

<?php 
} 
?>



