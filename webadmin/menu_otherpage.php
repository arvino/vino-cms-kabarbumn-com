<?php 
include"otherpage_form_search.php";?>
<br>
<br>


<table class='tabelform' width='215px' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	
	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
		<li><a href='otherpage_kanal.php'> MANAGE SECTION </a></li>
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
$resultkategoriotherpage = Select_All_Kategori_otherpage_By_Urutan( $tbl_otherpagekategori );
while ($datakategoriotherpage = mysql_fetch_array($resultkategoriotherpage)){

$idkategori = $datakategoriotherpage['id'];
$namakategori = $datakategoriotherpage['keterangan'];
$namakategori = strtoupper($namakategori);
$CountSubkanal = otherpageCount_KategoriSub_ByKategori( $tbl_otherpagekategorisub, $idkategori);

?>

		<?php 
if($CountSubkanal == 0){ ?>
		<li> <a href='otherpage_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=0&action=ViewList'> <?php 
echo $namakategori ?> </a> </li>
		<?php 
}else{ ?>
		<li> <a href='otherpage_subkanal.php?idkategori=<?php 
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

