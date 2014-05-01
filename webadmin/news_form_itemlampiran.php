<?php 
$KodeKeamananhalaman  = "token_news";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='judulform'>
			<td width='100%' height='30'>
				FORM SUBMIT EXTRA FILE</td>
		</tr>
    	<tr class='kontenform'>
      		<td>

<div align='center'>

<form action="<?php 
echo $FormnewsItemLampiran_Action ?>" method="post" enctype="multipart/form-data">

<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>


  <tr class='kontenform' >
    <td width='32%'>&nbsp;</td>
    <td width='2%'>&nbsp;</td>
    <td width='66%'>&nbsp;</td>
  </tr>


  <tr class='kontenform'>
    <td><div align='right'>TITLE</div></td>
    <td><div align='center'> : </div></td>
    <td><input name='judul' type='text' id='judul' value='<?php 
echo $detail_itemlampiran->judul ?>' size='50'>
	</td>
  </tr>
  <tr class='kontenform'  valign="top">
    <td><div align='right'> UPLOAD </div></td>
    <td><div align='center'> : </div></td>
    <td>
<input name="fileupload" type="file" id="fileupload">
<br>
* File Type : .JPG, BMP , MP3 , FLV , PDF , DOC , XLS.<br>	</td>
  </tr>
  <tr class='kontenform' >

    <td>
		<div align='right'> 
			<b>

			
<input name="isi" type="hidden" id="isi2" value="<?php 
echo $detail_itemlampiran->isi  ?>" size="50">
<input name="urutan" type="hidden" id="urutan" value="1">
<input name='id' type='hidden' value='<?php 
echo $detail_itemlampiran->id ?>'>
<input name='idkonten' type='hidden' value='<?php 
echo $iditem ?>'>
<input name='namafile' type='hidden' value='<?php 
echo $detail_itemlampiran->namafile ?>'>
<input name='tipefile' type='hidden' value='<?php 
echo $detail_itemlampiran->tipefile ?>'>
<input name='gambar' type='hidden' value='<?php 
echo $detail_itemlampiran->gambar ?>'>
<input name='gambarpreview' type='hidden' value='<?php 
echo $detail_itemlampiran->gambarpreview ?>'>
<input name='direktorifile' type='hidden' value='<?php 
echo $detail_itemlampiran->direktorifile ?>'>
<input name='linkjudul' type='hidden' value='<?php 
echo $detail_itemlampiran->linkjudul  ?>'>
<input name='keyword' type='hidden' value='<?php 
echo $detail_itemlampiran->keyword ?>'>


            </b> 
		</div>
	</td>
	
    <td>
		<div align='center'>
			<b> </b>
		</div>
	</td>
	
    <td>
		<div align='left'>
        	<input name='btn_newskategori' type='submit' class='button' value='<?php 
echo $newskategori_submitbutton ?>'>
    	   <?php 
echo  $Tombol_CANCEL ?>
		</div>
	</td>
	
	
  </tr>

</table>
</form>

</div>
	  
	  		</td>
  		</tr>
  
</table>
<?php 
} ?>