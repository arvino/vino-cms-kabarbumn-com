						 <div id="content_side_left_2_row2_wrapper"> 
							 <div id="content_side_left_2_row2_titleberitasebelumnya"> Berita sebelumnya </div>
                             <div id="content_side_left_2_row2_description"> 
                             
<?php 
/* newsItem_beritakemarin */

function  newsItem_PageLimit_Kemarin_All_Publik( $tbl_news, $time_now, $id_excp1, $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			id NOT IN ( $id_excp1 ) AND
			 
			statustampil = '1' AND
			timeunix <='$time_now' 
			
		ORDER BY timeunix DESC LIMIT $dataPerPage");  
  		return $sql;
}

?>

<?php 
$id_excp1x = substr($id_excp1,0,-1);
if($id_excp1x==""){ echo "Belum ada data.."; }else{

$dataPerPage = 5;
$sqlkemarin = newsItem_PageLimit_Kemarin_All_Publik( $tbl_news, $time_now, $id_excp1x, $dataPerPage );


?>



							 
							 <ul>
<?php 
while($row_berita_kemarin = mysql_fetch_object($sqlkemarin)){
	$Link_Judul = potong_judul($row_berita_kemarin->judul);
	$id = $row_berita_kemarin->id;
	
	$judul_substr_item = potong_judul($row_berita_kemarin->judul);
	$link_news_item = "$link_host"."read-news-$row_berita_kemarin->idkategori-$row_berita_kemarin->idkategorisub-$row_berita_kemarin->id-$judul_substr_item"."$extention";


?>							 
							 	<li> 
								 
									<a href="<?php echo $link_news_item?>" id="content_side_left_2_row2_item_title"> <?php echo $row_berita_kemarin->judul?>... </a> 
								</li>
<?php 
}
?>
 

							 </ul>
							 
							 
						

<?php 
} ?>
    </div>
</div>