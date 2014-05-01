<?php 
include"banner_form_search.php";?>
<br>
<br>

<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	
	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
		<li><a href='banner_kanal.php'> ENTRY SECTION </a></li>
	</ul>
	</div>
	
	</td>
  </tr>
</table>
<br>



<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
<tr class='judulform'>
    <td class='judulform'> SECTION </td>
</tr>

  <tr>
    <td>
<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
	
<?php 
$resultkategoribanner = Select_All_Kategori_banner_By_Urutan( $tbl_bannerkategori );
while ($datakategoribanner = mysql_fetch_array($resultkategoribanner)){

$idkategori = $datakategoribanner['id'];
$namakategori = $datakategoribanner['keterangan'];
$namakategori = strtoupper($namakategori);
?>
<li><a href='banner_item.php?idkategori=<?php 
echo $idkategori ?>&idsubkategori=0&action=ViewList'> <?php 
echo $namakategori ?> </a></li>

<?php 
}
?>
 

	</ul>
</div>
	
	</td>
  </tr>
</table>
<br>


