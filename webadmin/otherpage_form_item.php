<?php 
$KodeKeamananhalaman  = "token_otherpage";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<!--- FORM ITEM --->
<?php 
/* Jika Edit Data  */
if( $action=="EditData" ){       

	if($idsubkategori == ""){
	$idsubkategori=0;
	}                                               
	$FormotherpageDataItem = "proses_otherpage_item.php?action=item_updatedata";
	$SubmitButtonItemotherpage = "UPDATE DATA......";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('otherpage_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$id&action=EditData')\" >";
	
	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idsubkategori = $_GET['idsubkategori'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $idkategori );
	$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $idsubkategori );
	
	
	$row_item = Select_Detail_Item_otherpage($tbl_otherpage, $id);


	if( $row_item->statustampil == "1"){ /* Status Tampil */
		$cek_statustampil = "checked";
	}else{
		$cek_statustampil = "";
	}

 
	if( $row_item->pilihan  == "1"){ /* Status Tampil di Pilihan */
		$cek_pilihan = "checked";
	}else{
		$cek_pilihan = "";
	}
	
 
	
	if( $row_item->headline  == "1"){ /* Status Tampil di Headline */
		$cek_headline = "checked";
	}else{
		$cek_headline = "";
	}
	
	
	if( $row_item->hotspot   == "1"){ /* Status Tampil di Hotspot */
		$cek_hotspot = "checked";
	}else{
		$cek_hotspot = "";
	}

	if( $row_item->tglselesai   == "9999-12-30"){ /* Tanpa batas tampil */
		$ck_withoutend = "checked";
	}else{
		$ck_withoutend = "";
	}





$e_idusers = $row_item->idusers;
$e_idadmin = $row_item->idadmin;

if($row_item->bahasa=="IND"){
$Ket_Bahasa = "Indonesia";
}else{
$Ket_Bahasa = "Inggris";
}

}



if( $action=="FormEntry" ){

$FormotherpageDataItem = "proses_otherpage_item.php?action=item_tambahdata";
$SubmitButtonItemotherpage = "Add Data...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('otherpage_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&action=FormEntry')\" >";

$e_idusers = $sesi_id;
$e_idadmin = $sesi_id;
}
?>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> FORM ENTRY ITEM OTHERPAGE</td>
  </tr>
  <tr class='kontenform'>
    <td>
      <div align='center'>
        <form action='<?php 
echo $FormotherpageDataItem ?>' method='post' enctype="multipart/form-data">
          <table width='100%'  align='center' cellpadding='1' cellspacing='1' class='footerform'>
            <tr>
              <td width='98%'>
			  
<b> SECTION : </b>
<?php 
if( $action=="EditData" ){
?>
<select name='idkategori'>
<option value='<?php 
echo $row_kanal->id ?>' onClick="Ambil_SubKategori(<?php 
echo $row_kanal->id ?>,<?php 
echo $idsubkategori ?>)">-- <?php 
echo strtoupper($row_kanal->keterangan); ?> --</option>
<?php 
$result_kanalotherpage = Select_All_Kategori_otherpage_By_Urutan( $tbl_otherpagekategori );
while($row_kanalotherpage = mysql_fetch_object( $result_kanalotherpage )){
?>
<option value='<?php 
echo $row_kanalotherpage->id ?>' onClick="Ambil_SubKategori(<?php 
echo $row_kanalotherpage->id ?>,<?php 
echo $idsubkategori ?>)"><?php 
echo strtoupper($row_kanalotherpage->keterangan); ?></option>
<?php 
}
?>
</select>
<?php 
} ?>



<?php 
if( $action=="FormEntry"){ /* Jika tida ada action */

$idkategori = $_GET["idkategori"];
$r_dataotherpage_kategori = Select_Kategori_otherpage_By_Id( $tbl_otherpagekategori, $idkategori );
$r_otherpagekategori = mysql_fetch_object($r_dataotherpage_kategori);

$otherpagekategori_id = $r_otherpagekategori->id;

if( $idkategori == 0 ){ 
$otherpagekategori_id = 0;
$otherpagekategori_keterangan = "<font color='red'> WITHOUT SECTION </font>";
}else{

$otherpagekategori_keterangan = $r_otherpagekategori->keterangan;
$otherpagekategori_keterangan = strtoupper($otherpagekategori_keterangan);

}
?>
<?php 
echo $otherpagekategori_keterangan ?>
<input name='idkategori' type='hidden'  value='<?php 
echo $otherpagekategori_id ?>'>
<?php 
}
?>
<br>
<br>



<?php 
if( $action=="EditData" ){

echo "<div id='output_subkategori'></div>";
	
}
?>

<?php 
if( $action=="FormEntry" ){

	$idsubkategori = $_GET["idsubkategori"];
	$r_otherpagesubkategori = Select_SubKategori_otherpage_By_Id( $tbl_otherpagekategorisub, $idsubkategori );
	 
	$otherpagesubkategori_id = $r_otherpagesubkategori->id;

if( $idsubkategori == 0 ){ 
	$otherpagesubkategori_id = 0;
	$otherpagesubkategori_keterangan = "<font color='red'> WITHOUT SUB SECTION </font>";
}else{

	$otherpagesubkategori_keterangan = $r_otherpagesubkategori->keterangan;
	$otherpagesubkategori_keterangan = strtoupper($otherpagesubkategori_keterangan);
}
?>
<b>SUB SECTION  :</b> <?php 
echo $otherpagesubkategori_keterangan ?>
<input name='idkategorisub' type='hidden'  value='<?php 
echo $otherpagesubkategori_id ?>'>
<?php 
}
?>
                    <input name='kodekategori' type='hidden' id="kodekategori"  value='N/A' size='10'>
                    <br>
                    <b> </b><br>
                    <input name='bahasa' type='hidden' value='IND'>
                    <b> TITLE : </b><br>
                    <input name='judul' type='text' id="judul"  value="<?php 
echo strip_tags($row_item->judul) ?>" size='80'>
                    <br>
                  * Max. 15 Word. <br>
                  
                  <br>
                  <b> DESCRIPTION : </b> <br>

<textarea name='deskripsi' cols='98%' rows='20' id="content" class="ckeditor" > <?php 
echo strip_tags($row_item->deskripsi) ?> </textarea>
<br>
<b> </b><br>
                 
              </td>
            </tr>
          </table>
          <hr class='line_box'>
          <table width='98%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td width="31%">IMAGE THUMB </td>
              <td width="5%"><div align="center">:</div></td>
              <td width="64%"><input name="file_thumb" type="file" id="file_thumb"></td>
            </tr>
            <tr>
              <td>IMAGE DETAIL </td>
              <td><div align="center">:</div></td>
              <td><input name="file_detail" type="file" id="file_detail"></td>
            </tr>
            <tr>
              <td>IMAGE CAPTION </td>
              <td><div align="center">:</div></td>
              <td>
			  
			  
			  <input name="keterangangambar" type="text" id="keterangangambar" value="<?php 
echo $row_item->keterangangambar ?>" size="48">
				
				</td>
            </tr>


 
          </table>
          <table width='98%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td>
                <div align='left'>
                  <hr class='line_box'>
              </div></td>
            </tr>
            <tr>
              <td>
                <?php 
if( $action == "EditData" )
{

	if( $row_item->gambarbesar == ""  ){

	}else{
	$Delete_gambar_item = "proses_otherpage_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=item_updateimage";
?>
                <div align='left'> <img src='../<?php 
echo $row_item->direktorigambar ?><?php 
echo $row_item->gambarbesar ?>' width='300'> <br>
                    <br>
                  IMAGE <br>
                  <br>
                  <img src='../<?php 
echo $row_item->direktorigambar ?><?php 
echo $row_item->gambarkecil ?>' width='100'> <br>
                  <br>
                  IMAGE PREVIEW <br>
                  <br>
                  <a href='<?php 
echo $Delete_gambar_item ?>'> <b>DELETE IMAGE</b> </a>
                  <?php 
} 
			   
 
}
?>
<br>
<br>
<br>
<br>
              </div></td>
            </tr>
          </table>
          <table width='98%'  cellpadding='2' cellspacing='0' border='0'>
            <tr>
              <td>
                <p align='left'>
                  <input type='submit' name='Submit2' value='<?php 
echo $SubmitButtonItemotherpage ?>'>
                  <?php 
echo $Tombol_CANCEL ?> </p></td>
            </tr>
            <tr>
              <td>
                <input name='id' type='hidden'  value='<?php 
echo $row_item->id ?>'>
                <input name='idupline' type='hidden'  value='<?php 
echo $row_item->idupline ?>'>
                <input name='gambarkecil' type='hidden'  value='<?php 
echo $row_item->gambarkecil ?>'>
                <input name='gambarbesar' type='hidden'  value='<?php 
echo $row_item->gambarbesar ?>'>
                <input name='imagelogo' type='hidden'  value='<?php 
echo $row_item->imagelogo ?>'>
                <input name='idusers' type='hidden'  value='<?php 
echo $e_idusers ?>'>
                <input name='idadmin' type='hidden'  value='<?php 
echo $e_idadmin ?>'>
                <input name='dikomentari' type='hidden' value='<?php 
echo $row_item->dikomentari ?>'>
                <input name='dilampirkan' type='hidden' value='<?php 
echo $row_item->dilampirkan ?>'>
                <input name='dilihat' type='hidden' value='<?php 
echo $row_item->dilihat ?>'>
                <input name='direktorigambar' type='hidden'  value='<?php 
echo $row_item->direktorigambar ?>'>
                <input name="statustampil" type="hidden" value="1">
              </td>
            </tr>
          </table>
          <br>
        </form>
    </div></td>
  </tr>
</table>
<!-- END FORM ITEM -->
               

<?php 
} ?>