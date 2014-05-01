<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$idkategorisub = $_GET['idsubkategori'];

$_SESSION['item_data_perhalaman'] = $_GET['data_perhalaman'];
		if( $_SESSION['item_data_perhalaman'] == ''){
			$dataPerhalaman = 8;
			$_SESSION['item_data_perhalaman']	= "8";
		}else{
			$dataPerhalaman = $_SESSION['item_data_perhalaman'];
		}

if(isset($_GET['data_perhalaman'])){
 	$nohalaman = $_GET['data_perhalaman'];
 	$dataperhalaman_x = "data_perhalaman=" . $_GET['data_perhalaman'];
}else{
 	$nohalaman = 1;
 	$dataperhalaman_x = "";
}
$offset = ($nohalaman - 1) * $dataPerhalaman;

		$QryNumItemBerita = BeritaItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_berita , $idkategori, $idkategorisub );
		
		$HitungJumlahItemBerita  = mysql_num_rows($QryNumItemBerita);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;


		  $kategori_halaman  = "otherpage_subkanal/";

		  $HitungSubKategori = Count_KategoriSub_ByKategori( $tbl_beritakategorisub, $idkategori);
		  if($HitungSubKategori==0){/* Jika tida ada sub kanal berita arahkan ke subkanal langsung */
		  	
			$detail_kanal_otherpage = Detail_KanalBerita_Publish( $tbl_beritakategori , $idkategori );
			$posisihalaman  = "$dataperhalaman_x/$idkategori/$idkategorisub/" . strtolower($detail_kanal_otherpage->keterangan) . "$extention";

		  }else{
		  	 
			$detail_subkanal_otherpage = Detail_SubKanalBerita_Publish( $tbl_beritakategorisub , $idkategorisub );
			$posisihalaman  = "$dataperhalaman_x/$idkategori/$idkategorisub/" . strtolower($detail_subkanal_otherpage->keterangan) . "$extention";

		  }

		
		$tampilkanhalamannya = tampilkanhalaman _dihome($posisihalaman , $HitungJumlahItemBerita ,$dataPerhalaman, $nohalaman, $halaman , $link_host, $kategori_halaman );

?>
		  
		  
<div class="pagination"><?php 
echo $tampilkanhalamannya?> </div>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$idkategorisub = $_GET['idsubkategori'];

$result_otherpage_item = List_Item_Berita_Publish_view_halaman ( $tbl_berita, $idkategori, $idsubkategori,$offset, $dataPerhalaman );

?>
<?php 
$jml_item_line1 = "2";
$lebar_box = "50%";
?>

<table width='100%' height='100%' align='center' cellpadding=0 cellspacing=0 >
<tr height='100%'>
<?php 
$kolom=1;
while($row_otherpage_item = mysql_fetch_object($result_otherpage_item)){

$SubKanal_Keterangan = strtolower($SubKanal_Keterangan);
$Link_Judul = potong_judul($row_otherpage_item->judul);
$id = $row_otherpage_item->id;
$idkategori = $row_otherpage_item->idkategori;
$idkategorisub = $row_otherpage_item->idkategorisub;

$HitungSubKategori = Count_KategoriSub_ByKategori( $tbl_beritakategorisub, $idkategori);
if($HitungSubKategori==0){/* Jika tida ada sub kanal berita arahkan ke subkanal langsung */
		  	
$detail_kanal_otherpage = Detail_KanalBerita_Publish( $tbl_beritakategori , $idkategori );
$SubKanal_Keterangan = strtolower($detail_kanal_otherpage->keterangan);

}else{
		  	 
$detail_subkanal_otherpage = Detail_SubKanalBerita_Publish( $tbl_beritakategorisub , $idkategorisub );
$SubKanal_Keterangan = strtolower($detail_subkanal_otherpage->keterangan);

}
?>
<td width='<?php 
echo $lebar_box ?>' height='100%' valign='top' onmouseover=\"javascript:style.backgroundColor='#FFFFDD'\" onmouseout=\"javascript:style.backgroundColor=''\" >

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9" height="10"><img name="<?php 
echo $link_host ?>Sudut_KiriAtas" src="<?php 
echo $link_host ?>images/box/Sudut_KiriAtas.png" width="9" height="10" border="0" alt=""></td>
    <td background="<?php 
echo $link_host  ?>images/box/Batas_Atas.png"> </td>
    <td width="8" height="10"><img name="<?php 
echo $link_host ?>Sudut_KananAtas" src="<?php 
echo $link_host ?>images/box/Sudut_KananAtas.png" width="8" height="10" border="0" alt=""></td>
  </tr>
  <tr valign="top">
    <td background="<?php 
echo $link_host  ?>images/box/Batas_Kiri.png" width="9"> </td>
    <td background="<?php 
echo $link_host  ?>images/box/Latar.png">
	

<div class="wrap_preview_berita">
<div class="item_textjudul">
								
<a href='<?php 
echo $link_host ?>baca/otherpage/<?php 
echo $idkategori ?>/<?php 
echo $idkategorisub ?>/<?php 
echo $id ?>/<?php 
echo $SubKanal_Keterangan ?>/<?php 
echo $Link_Judul?><?php 
echo $extention ?>' class="item_textjudul">
<?php 
echo  $row_otherpage_item->judul ?>
</a>

</div>
								
								
<div class="item_texttanggalberita">
<?php 
$hari_berita = harienglish($row_otherpage_item->tgltampil);
$tanggal_berita = bulanenglish($row_otherpage_item->tgltampil);
$tanggal_itemberita = $hari_berita . ", " . $tanggal_berita;
?>
							
<?php 
echo $tanggal_itemberita  ?>  |  <?php 
echo $row_otherpage_item->jamtampil ?> WIB 
							
</div>
<?php 
if($row_otherpage_item->gambarbesar !=''){
?>
							
<a href="<?php 
echo $link_host ?>baca/otherpage/<?php 
echo $idkategori ?>/<?php 
echo $idkategorisub ?>/<?php 
echo $id ?>/<?php 
echo $SubKanal_Keterangan ?>/<?php 
echo $Link_Judul?><?php 
echo $extention ?>"> 
<img src="<?php 
echo $link_host ?><?php 
echo $row_otherpage_item->direktorigambar ?><?php 
echo $row_otherpage_item->gambarkecil ?>" width="150" height="100" hspace="5" vspace="5" border="0" align="left"> 
</a>
							<?php 
}else{
							
							}
							?>

                            <div class="item_textpreview">
							<?php 
echo substr($row_otherpage_item->preview,0,200); ?>...
							</div>
							 
            </div>
						


					 

</td>
    <td background="<?php 
echo $link_host  ?>images/box/Batas_Kanan.png" width="8"> </td>
  </tr>
  <tr>
    <td  width="9" height="10"><img name="<?php 
echo $link_host ?>Sudut_KiriBawah" src="<?php 
echo $link_host ?>images/box/Sudut_KiriBawah.png" width="9" height="10" border="0" alt=""></td>
    <td background="<?php 
echo $link_host  ?>images/box/Batas_Bawah.png"> </td>
    <td width="8" height="10"><img name="<?php 
echo $link_host ?>Sudut_KananBawah" src="<?php 
echo $link_host ?>images/box/Sudut_KananBawah.png" width="8" height="10" border="0" alt=""></td>
  </tr>
</table>
				  
				  
				  
<?php 
if($kolom==$jml_item_line1)
    {
	
?>

	</td>
</tr>
 
<?php 
$kolom=1;
    }  
    else
    $kolom++;
    
    
}

?>

</table>	

<div class="pagination"><?php 
echo $tampilkanhalamannya ?> </div>
				  