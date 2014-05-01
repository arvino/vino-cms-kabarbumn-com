<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

if($action=="EditData"){ 
 	
	if( $row_kanal->statustampil == "1"){ /* Status Tampil */
		$cek_statustampil = "checked";
	}else{
		$cek_statustampil = "";
	}
	
	if( $row_kanal->homehalamantampil == "1"){ /* Status Tampil di Homehalaman */
		$cek_homehalamantampil = "checked";
	}else{
		$cek_homehalamantampil = "";
	}
	
	if( $row_kanal->menuatas1 == "1"){ /* Status Tampil di Menu Atas 1 */
		$cek_menuatas1 = "checked";
	}else{
		$cek_menuatas1 = "";
	}

	if( $row_kanal->menuatas2 == "1"){ /* Status Tampil di Menu Atas 2 */
		$cek_menuatas2 = "checked";
	}else{
		$cek_menuatas2 = "";
	}

	if( $row_kanal->menubawah1 == "1"){ /* Status Tampil di Menu Bawah 1 */
		$cek_menubawah1 = "checked";
	}else{
		$cek_menubawah1 = "";
	}

	if( $row_kanal->menubawah2 == "1"){ /* Status Tampil di Menu Bawah 2 */
		$cek_menubawah2 = "checked";
	}else{
		$cek_menubawah2 = "";
	}

}

?>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='judulform'>
			<td width='100%' height='30'>
				FORM ENTRY GRUP</td>
  </tr>
    	<tr class='kontenform'>
      		<td>

<div align='center'>

<form action="<?php 
echo $FormbannerKategori_Action ?>" method="post" enctype="multipart/form-data" name="FormKanal" target="_self" id="FormKanal">

  <table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>
    <tr class='kontenform'>
      <td width="32%"><div align='right'> JUDUL </div></td>
      <td width="1%"><div align='center'> : </div></td>
      <td width="67%"><input name='keterangan' type='text' id='keterangan' value='<?php 
echo $row_kanal->keterangan ?>' size='50'>
      </td>
    </tr>
    <tr class='kontenform' >
      <td><div align='right'> URUTAN </div></td>
      <td><div align='center'> : </div></td>
      <td>
        <select name='urutan'>
          <option value='<?php 
echo $row_kanal->urutan; ?>'> <?php 
echo $row_kanal->urutan; ?></option>
          <?php 
for($i=0; $i<=20; $i++)	{
?>
          <option value='<?php 
echo $i ?>'><?php 
echo $i ?></option>
          <?php 
}
?>
        </select>
      </td>
    </tr>
    <tr class='kontenform' >
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
	  
	  <label>
	  <input name="statustampil" type="checkbox" id="statustampil" value="1" <?php 
echo $cek_statustampil ?>>
      STATUS TAMPIL 
	  </label>
	  
	  </td>
    </tr>
    <tr class='kontenform' >
      <td>
      <div align='right'> 
	  <b>
          <input name="idupline" type="hidden" value="<?php 
echo $row_kanal->idupline  ?>">
          <input name='id' type='hidden' value='<?php 
echo $row_kanal->id  ?>'>
		  
          <input name='imagelogo' type='hidden' value='<?php 
echo $row_kanal->imagelogo  ?>'>
          <input name='imageheader' type='hidden' value='<?php 
echo $row_kanal->imageheader  ?>'>
          <input name='imagebackground' type='hidden' value='<?php 
echo $row_kanal->imagebackground  ?>'>
		  
          <input name='imagefile' type='hidden' value='<?php 
echo $row_kanal->imagefile  ?>'>
		  
          <input name='keteranganinggris' type='hidden' value='<?php 
echo $row_kanal->keteranganinggris ?>' size='50'>
      </b> 
	  </div>
	  
	  
	  </td>
      <td>
        <div align='center'> <b> </b> </div></td>
      <td>
        <div align='left'>
          <input name='btn_bannerkategori' type='submit' class='button' value='<?php 
echo $bannerkategori_submitbutton ?>'>
          <?php 
echo  $Tombol_CANCEL ?> </div></td>
    </tr>
  </table>
</form>

</div>
	  
	  		</td>
  		</tr>
  
</table>

<?php 
}
?>