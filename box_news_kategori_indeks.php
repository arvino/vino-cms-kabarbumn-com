 
<div id="menu_indeks_section"> 
<ul>
<?php 
$sql_kanal_menu = Select_All_Publish_news_Kategori( $tbl_newskategori );
		  $no_menu = 1;
		  while($result_kanal_menu = mysql_fetch_object( $sql_kanal_menu)){
		  
			$KET_MENU = $result_kanal_menu->keterangan;
			$LINKJUDUL_KANAL_MENU = potong_judul( $KET_MENU );

			$Link_Indeks = $link_host ."indeks-news-kategori-" . $result_kanal_menu->id ."-". $LINKJUDUL_KANAL_MENU . $extention;

			$idkategori = $result_kanal_menu->id;
			$HitungSubKategori = newsCount_KategoriSub_ByKategori( $tbl_newskategorisub, $idkategori);
			
			if( $no_menu % 2 ) $class = "menu_section_content_1"; else $class = "menu_section_content_2";
			
			if($HitungSubKategori==0){  

			?>
				 
			  <li> <a href="<?php 
echo $Link_Indeks ?>" class="<?php 
echo $class ?>"><?php 
echo $KET_MENU ?></a>  </li>
				 
			<?php 
}else{
		?>
			
			 <li> <a href="<?php 
echo $Link_Indeks ?>" class="<?php 
echo $class ?>"><?php 
echo $KET_MENU ?></a>  
				<ul>
				<?php 
$result_news_subkanal = Select_All_SubKategori_news_By_Urutan( $tbl_newskategorisub, $idkategori );
				$no_menu2 = 1;
				while($data_subkanal = mysql_fetch_object($result_news_subkanal)){

		  			$KET_MENU = $data_subkanal->keterangan;
					
					$LINKJUDUL_SUBKANAL_MENU = potong_judul( $KET_MENU );

					if( $no_menu2 % 2 ) $class2 = "menu_subsection_content_1"; else $class2 = "menu_subsection_content_2";
					
					$Link_Indeks = $link_host ."indeks-news-subkategori-" . $data_subkanal->id  ."-".  $LINKJUDUL_SUBKANAL_MENU . $extention;
				
				?>
					 
					 <li> <a href="<?php 
echo $Link_Indeks ?>" class="<?php 
echo $class2 ?>"><?php 
echo $KET_MENU ?></a> </li>
					 
				<?php 
$no_menu2++;
				}
				?>
				 </ul>
			</li>
				 
		<?php 
}

?>
     		
<?php 
$no_menu++;
} ?>
</ul>
</div>

 