		 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
               <td background="images/box/B2_Batas_Atas.png"> </td>
               <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
             </tr>
             <tr valign="top">
               <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
               <td background="images/box/B2_Latar.png">
                  
<span class="JudulKanal_box1"> LAST COMMMENT </span>


<hr class='line_box'>

<?php 
$result = LihatDataprodukKomentarLimited( $tbl_produkkomentar );
$hitungdata = HitungTotalAllDataprodukKomentar( $tbl_produkkomentar );
?>
<?php 
if($hitungdata == 0){
?>
 NO COMMENT<?php 
}else{
?>
<?php 
$no = 1;
while( $row_komentar = mysql_fetch_object($result) ){
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

$detail_user = Users_Select_Detail( $tbl_users, $row_komentar->idusers );
$detail_produk_item = Select_Detail_Item_produk($tbl_produk, $row_komentar->idkonten);

?>

<?php 
echo $no ?>. 
<?php 
echo $detail_produk_item->judul ?><br> 

<?php 
echo $detail_user->username ?> :
<a href='produk_item.php?idkategori=<?php 
echo $detail_produk_item->idkategori ?>&idsubkategori=<?php 
echo $detail_produk_item->idkategorisub ?>&id=<?php 
echo $detail_produk_item->id ?>&action=ViewDetail'>
<?php 
echo substr($row_komentar->pesan,0,20); ?>...
</a>
<hr class='line_box'>

<?php 
$no++;
} 
}
?>
               </td>
               <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
             </tr>
             <tr>
               <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
               <td background="images/box/B2_Batas_Bawah.png"> </td>
               <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
             </tr>
         </table>
		 
		 
