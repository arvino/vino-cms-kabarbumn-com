<?php 
include"news_form_search.php";?>
<br>
<br>


<table class='tabelform' width='215px' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	
	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
		<li><a href='news_kanal.php'> MANAGE SECTION </a></li>
	</ul>
	</div>
	
	</td>
  </tr>
</table>
<br>




<table class='tabelform' width='215px' cellspacing='1' cellpadding='1'>
<tr class='judulform'>
    <td class='judulform'>SECTION</td>
</tr>

  <tr>
    <td>
	
	
<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
	
<?php 
$resultkategorinews = Select_All_Kategori_news_By_Urutan( $tbl_newskategori );
while ($datakategorinews = mysql_fetch_array($resultkategorinews)){

$idkategori = $datakategorinews['id'];
$namakategori = $datakategorinews['keterangan'];
$namakategori = strtoupper($namakategori);
$CountSubkanal = newsCount_KategoriSub_ByKategori( $tbl_newskategorisub, $idkategori);

?>

		<?php 
if($CountSubkanal == 0){ ?>
		<li> <a href='news_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=0&action=ViewList'> <?php 
echo $namakategori ?> </a> </li>
		<?php 
}else{ ?>
		<li> <a href='news_subkanal.php?idkategori=<?php 
echo $idkategori ?>&action=ViewList'> <?php 
echo $namakategori ?> </a> </li>
		<?php 
} ?>

<?php 
}
?>
 

	</ul>
</div>
	
	</td>
  </tr>
</table>
<br>

