<?php 
/*
RewriteRule ^indeks_news/([0-9]+)/(.*)\.html$ indeks.php?id=$1&keterangan=$2

*/

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr valign="top">
                  <td> </td>
                  <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>

<div class="JudulKanal_box1"> INDEKS RUBRIKASI </div>
<hr class='line_box'>
<ul>
<?php 
$sql_kanal_menu = Select_All_Publish_Berita_Kategori( $tbl_beritakategori );
		  while($result_kanal_menu = mysql_fetch_object( $sql_kanal_menu)){
		  
		  
		  	if( $SESI_BAHASA !="ENGLISH" ){
		  		$KET_MENU = $result_kanal_menu->keterangan;
				$LINKJUDUL_KANAL_MENU = potong_judul( $KET_MENU );
		  	}else{
		  		$KET_MENU = $result_kanal_menu->keteranganinggris;
				$LINKJUDUL_KANAL_MENU = potong_judul( $KET_MENU );
		  	}
			
			$Link_Indeks = $link_host ."indeks_news/kanal/" . $result_kanal_menu->id ."/". $LINKJUDUL_KANAL_MENU . $extention;

$idkategori = $result_kanal_menu->id;
$HitungSubKategori = Count_KategoriSub_ByKategori( $tbl_beritakategorisub, $idkategori);
if($HitungSubKategori==0){/* Jika tidak ada sub kanal berita arahkan ke subkanal langsung */

		?>
			<li><a href="<?php 
echo $Link_Indeks ?>" class="BoxJudul_listmenuindeks"><?php 
echo $KET_MENU ?></a></li>
		<?php 
}else{
		?>
			<li><a href="<?php 
echo $Link_Indeks ?>" class="BoxJudul_listmenuindeks"><?php 
echo $KET_MENU ?></a>
				<ul>
				<?php 
$result_news_subkanal = Select_All_Publish_SubKategori_Desc_Urutan( $tbl_beritakategorisub , $idkategori);
				while($data_subkanal = mysql_fetch_object($result_news_subkanal)){
				
				
				if( $SESI_BAHASA !="ENGLISH" ){
		  			$KET_MENU = $data_subkanal->keterangan;
					$LINKJUDUL_SUBKANAL_MENU = potong_judul( $KET_MENU );
				}else{
		  			$KET_MENU = $data_subkanal->keteranganinggris;
					$LINKJUDUL_SUBKANAL_MENU = potong_judul( $KET_MENU );
		  		}
				$Link_Indeks = $link_host ."indeks_news/subkanal/" . $data_subkanal->id  ."/".  $LINKJUDUL_SUBKANAL_MENU . $extention;;
				?>
<li>
<a href="<?php 
echo $Link_Indeks ?>" class="BoxJudul_listmenuindeks"><?php 
echo $KET_MENU ?></a>
</li>
				<?php 
}
				?>
				</ul>
			</li>	
		<?php 
}

?>
     		
<?php 
} ?>
</ul>



                          <p>&nbsp;</p></td>
                      </tr>
                  </table>
				  
				  </td>
                  <td> </td>
                </tr>
              </table>
