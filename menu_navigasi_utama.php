<!-- MAIN MENU SECTION -->	
<div id="mainmenu_wrapper">
<?php 
$modul = $_GET['modul'];
$request_uri = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<!-- MENU CONTAINER -->
<div id="mainmenu">	

<?php
	if ( $request_uri == $link_host . "homepage". $extention OR $request_uri == $link_host ){
		$homepage_class='class="home_menu_aktif"';
	} else {
		$homepage_class='class="home_menu"';
	}
?>
	 
	<div <?php echo $homepage_class?>><a href="<?php 
echo $link_host ?>homepage<?php 
echo $extention ?>"><img width="12" height="12" src="<?php echo $link_host?>images/home_img_menu.png" style="margin-top:10px;"></a></div>

<ul id="topnav">

<?php 
$sql_kanal_menu = List_MenuAtas1_Kanalnews( $tbl_newskategori );
while($result_kanal_menu = mysql_fetch_object( $sql_kanal_menu)){

$KET_MENU = $result_kanal_menu->keterangan;
$LINKJUDUL_KANAL_MENU = potong_judul( $KET_MENU );

$idkategori = $result_kanal_menu->id;
$HitungSubKategori = newsCount_KategoriSub_ByKategori( $tbl_newskategorisub, $idkategori);
if($HitungSubKategori==0){/* Tidak ada sub kanal */
$LinkSubNya  = "$link_host" . "news-subchannel-$result_kanal_menu->id-0-$LINKJUDUL_KANAL_MENU$extention";
?>
						<?php 
if ( ($result_kanal_menu->id==$_GET[idkategori]) ||
							($result_kanal_menu->id==$_GET[idkategori]) AND $modul=="news"){
							$libg='class="news_kanal_aktif"' ;
							
						} else {
						
							$libg='' ;
						}

						?>
						
							<li> 
								<a href="<?php 
echo $LinkSubNya ?>" <?php echo $libg?>>
									<?php echo $KET_MENU?> 
								</a> 
							</li>

<?php 
}else{ /* Ada sub kanal */
$LinkSubNya  = "$link_host" . "news-channel-$result_kanal_menu->id-$LINKJUDUL_KANAL_MENU$extention";
?>

						<?php 
if ( ($result_kanal_menu->id==$_GET[idkategori]) ||
							($result_kanal_menu->id==$_GET[idkategori]) AND $modul=="news"){
							$libg='class="news_kanal_aktif"' ;
							
						} else {
						
							$libg='' ;
						}

						?>
						
							<li> 
								<a href="<?php 
echo $LinkSubNya ?>" <?php echo $libg?>> <?php echo $KET_MENU?> </a> 
								<span>
								<?php 
$sql_subkanal_menu = Select_All_SubKategori_news_By_Kategori( $tbl_newskategorisub, $idkategori );
									while($result_subkanal_menu = mysql_fetch_object( $sql_subkanal_menu)){
																		$KET_SUBMENU = $result_subkanal_menu->keterangan;
								 	$LINKJUDUL_SUBKANAL_MENU = potong_judul( $KET_SUBMENU );

									$LinkSubNya  = "$link_host" . "news-subchannel-$result_subkanal_menu->idkategori-$result_subkanal_menu->id-$LINKJUDUL_SUBKANAL_MENU$extention";

								?>
										<a href="<?php echo $LinkSubNya?>"> <?php echo $result_subkanal_menu->keterangan?> </a> |
								 <?php 
} ?>
            					 </span>
			
							</li>



<?php 
}} ?>

    </ul>

<?php
	if ( $request_uri == $link_host . "indeks". $extention OR $request_uri == $link_host ){
		$indeks_class='class="indeks_menu_aktif"';
	} else {
		$indeks_class='class="indeks_menu"';
	}
?>

<div <?php echo $indeks_class?>> <a href="<?php echo $link_host?>indeks<?php echo $extention?>"> INDEKS </a></div>
	




<div style="float:left;overflow:hidden;width:985px;background-color:#6D6E72;height:38px;">
 

<?php
	if ( $request_uri == $link_host . "homepage". $extention OR $request_uri == $link_host ){
?>
<style>
#newsflash_left{
    background-color: #0066CC;
    color: #FFFFFF;
    float: left;
    font-size: 11px;
    font-weight: bold;
    height: 15px;
    margin-top: 2px;
    padding: 10px;
    text-align: center;
    width: 90px;
}
#newsflash_arrow{
    float: left;
    height: 35px;
    margin-top: 2px;
    width: 13px;	
}

#newsflash_right{
    float: left;
    height: 35px;
    overflow: hidden;
    width: 850px;	
}

#newsflash_content{
    color: #FFFFFF;
    float: left;
    font-weight: bold;
    height: 15px;
    margin-right: 20px;
    padding: 10px;
    text-decoration: underline;
	font-style:italic;
}
</style>
<div id="newsflash_left">
NEWSFLASH
</div>
 
<img src="images/newsflash_arrow.png" / id="newsflash_arrow">


<div id="newsflash_right">
<?php 
include('box_news_newsflash.php');?>
</div>
<?php 
} else {
?>

								 
								 
								 
								<?php 
$idkategori = $_GET['idkategori'];
									$sql_subkanal_menu = Select_All_SubKategori_news_By_Kategori( $tbl_newskategorisub, $idkategori );
									while($result_subkanal_menu = mysql_fetch_object( $sql_subkanal_menu)){
									$KET_SUBMENU = $result_subkanal_menu->keterangan;
								 	$LINKJUDUL_SUBKANAL_MENU = potong_judul( $KET_SUBMENU );

									$LinkSubNya  = "$link_host" . "news-subchannel-$result_subkanal_menu->idkategori-$result_subkanal_menu->id-$LINKJUDUL_SUBKANAL_MENU$extention";
									 
								?>
								<?php 
if ( ($result_subkanal_menu->id==$_GET['idkategorisub']) ||($result_subkanal_menu->id==$_GET['idkategorisub']) AND $modul=="news"){
								$libg2=' class="news_submenu_breadcrumb_item_aktif"' ;
							
								} else {
						
								$libg2=' class="news_submenu_breadcrumb_item"' ;
								}
								?>
										  <div class="news_submenu_breadcrumb_item_wrapper"> <a href="<?php echo $LinkSubNya?>" <?php echo $libg2?>> <?php echo $result_subkanal_menu->keterangan?> </a>  | </div> 
								 <?php 
} ?>

 

<?php 
}
?>
							 
  



 </div>
	

</div>

	</div>
<!-- END MAIN MENU SECTION -->

