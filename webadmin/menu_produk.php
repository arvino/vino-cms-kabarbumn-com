<?php 
include"produk_form_search.php";?>
<br>
<br>
<?php 
$KodeKeamananhalaman  = "token_produk";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
		
}else{

?>
<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	
	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
		<li><a href='produk_kanal.php'> ENTRY SECTION</a></li>
	</ul>
	</div>
	
	</td>
  </tr>
</table>
<br>
<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
<tr class='judulform'>
    <td class='judulform'> SECTION</td>
</tr>

  <tr>
    <td>
<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
	
<?php 
$resultkategoriproduk = Select_All_Kategori_produk_By_Urutan( $tbl_produkkategori );
while ($datakategoriproduk = mysql_fetch_array($resultkategoriproduk)){

$idkategori = $datakategoriproduk['id'];
$namakategori = $datakategoriproduk['keterangan'];
$namakategori = strtoupper($namakategori);
?>
<li><a href='produk_subkanal.php?idkategori=<?php 
echo $idkategori ?>'> <?php 
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
<?php 
} 
?>
