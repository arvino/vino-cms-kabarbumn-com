<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
                <td background="images/box/B2_Batas_Atas.png"> </td>
                <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
              </tr>
              <tr valign="top">
                <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
                <td background="images/box/B2_Latar.png">                
				
<div class="link_action" align="center">
<ul class="link_action">

<?php 
$KodeKeamananhalaman  = "token_produk";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{
?>

<li class="link_action">
<a href='produk_item.php?idkategori=<?php 
echo $row_item->idkategori ?>&idsubkategori=<?php 
echo $row_item->idkategorisub ?>&action=FormEntry' class="link_action"> FORM</a> 
</li>

<?php 
} ?>
	
		<li class="link_action">
<a href='produk_item.php?idkategori=<?php 
echo $row_item->idkategori ?>&idsubkategori=<?php 
echo $row_item->idkategorisub ?>&id=<?php 
echo $row_item->id ?>&action=ViewDetail' class="link_action"> DETAIL</a></li>
	    <li class="link_action">
<a href='produk_item.php?idkategori=<?php 
echo $row_item->idkategori ?>&idsubkategori=<?php 
echo $row_item->idkategorisub ?>&action=ViewList' class="link_action"> LIST</a></li>
</ul>	 
</div>
				
				</td>
                <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
              </tr>
              <tr>
                <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
                <td background="images/box/B2_Batas_Bawah.png"> </td>
                <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
              </tr>
            </table>