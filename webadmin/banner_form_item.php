<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
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
$FormbannerDataItem = "proses_banner_item.php?action=item_updatedata";
$SubmitButtonItembanner = "UPDATE DATA......";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('banner_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$id&action=EditData')\" >";

$id = $_GET['id'];
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$row_kanal = Select_Detail_Kategori_banner( $tbl_bannerkategori, $idkategori );
$row_subkanal = Select_Detail_KategoriSub_banner( $tbl_bannerkategorisub, $idsubkategori );


$row_item = Select_Detail_Item_banner($tbl_banner, $id);


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

$e_idusers = $row_item->idusers;
$e_idadmin = $row_item->idadmin;

if($row_item->bahasa=="IND"){
$Ket_Bahasa = "Indonesia";
}else{
$Ket_Bahasa = "Inggris";
}

}



if( $action=="FormEntry" ){

$FormbannerDataItem = "proses_banner_item.php?action=item_tambahdata";
$SubmitButtonItembanner = "ADD DATA...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('banner_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&action=FormEntry')\" >";

$e_idusers = $sesi_id;
$e_idadmin = $sesi_id;
}
?>
<br>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> FORM ENTRY ITEM </td>
  </tr>
  <tr class='kontenform'>
    <td>
      <div align='center'>
        <form action='<?php 
echo $FormbannerDataItem ?>' method='post' enctype="multipart/form-data">
          <table width='100%'  align='center' cellpadding='1' cellspacing='1' class='footerform'>
            <tr>
              <td width='98%'>
<p><b> Kategori : </b>
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
$result_kanalbanner = Select_All_Kategori_banner_By_Urutan( $tbl_bannerkategori );
while($row_kanalbanner = mysql_fetch_object( $result_kanalbanner )){
?>
<option value='<?php 
echo $row_kanalbanner->id ?>' onClick="Ambil_SubKategori(<?php 
echo $row_kanalbanner->id ?>,<?php 
echo $idsubkategori ?>)"><?php 
echo strtoupper($row_kanalbanner->keterangan); ?></option>
<?php 
}
?>
</select>
<?php 
} ?>



<?php 
if( $action=="FormEntry"){ /* Jika tida ada action */

$idkategori = $_GET["idkategori"];
$r_databanner_kategori = Select_Kategori_banner_By_Id( $tbl_bannerkategori, $idkategori );
$r_bannerkategori = mysql_fetch_object($r_databanner_kategori);

$bannerkategori_id = $r_bannerkategori->id;

if( $idkategori == 0 ){ 
$bannerkategori_id = 0;
$bannerkategori_keterangan = "<font color='red'> TANPA KATEGORI </font>";
}else{

$bannerkategori_keterangan = $r_bannerkategori->keterangan;
$bannerkategori_keterangan = strtoupper($bannerkategori_keterangan);

}
?>
<?php 
echo $bannerkategori_keterangan ?>
<input name='idkategori' type='hidden'  value='<?php 
echo $bannerkategori_id ?>'>
<?php 
}
?>




<?php 
if( $action=="FormEntry" ){

	$idsubkategori = $_GET["idsubkategori"];
	$r_bannersubkategori = Select_SubKategori_banner_By_Id( $tbl_bannerkategorisub, $idsubkategori );
	 
	$bannersubkategori_id = $r_bannersubkategori->id;

if( $idsubkategori == 0 ){ 
	$bannersubkategori_id = 0;
	$bannersubkategori_keterangan = "";
}else{

	$bannersubkategori_keterangan = $r_bannersubkategori->keterangan;
	$bannersubkategori_keterangan = strtoupper($bannersubkategori_keterangan);
}
?>
 
<input name='idkategorisub' type='hidden'  value='<?php 
echo $bannersubkategori_id ?>'>
<?php 
}
?>
                    <input name='kodekategori' type='hidden' id="kodekategori"  value='N/A' size='10'>
                    <br>
                    <b> </b><br>
                    <input name='bahasa' type='hidden' value='IND'>
                    <b> Judul : </b><br>
                    <input name='judul' type='text' id="judul"  value='<?php 
echo strip_tags($row_item->judul) ?>' size='100%'>


                  
				  <br>
<b>Keterangan : </b><br>
<textarea name="deskripsi" cols="98%" id="textarea"><?php 
echo  trim(strip_tags($row_item->deskripsi)) ?></textarea>
<br>
<br>
<b> UPLOAD FILE BANNER : </b>
<br>

<input name="filebanner" type="file" id="filebanner">
<br>
<br>

<b> URL FILE : </b>
<br>
<input name="linkurl" type="text" id="linkurl" value="<?php 
echo  trim(strip_tags($row_item->linkurl)) ?>" size="80">
<br>

<?php 
if( $action=="EditData" ){

	$tgltampil = $row_item->tgltampil;
	$jamtampil = $row_item->jamtampil;
	
	$arr_tgltampil = explode("-",$tgltampil);
	
	$d_tgltampil = $arr_tgltampil[2];
	$m_tgltampil = $arr_tgltampil[1];
	$y_tgltampil = $arr_tgltampil[0];

	$tgltampil = "$d_tgltampil-$m_tgltampil-$y_tgltampil";



	$tglselesai = $row_item->tglselesai;
	$jamselesai = $row_item->jamselesai;
	
	$arr_tglselesai = explode("-",$tglselesai);
	
	$d_tglselesai = $arr_tglselesai[2];
	$m_tglselesai = $arr_tglselesai[1];
	$y_tglselesai = $arr_tglselesai[0];

	$tglselesai = "$d_tglselesai-$m_tglselesai-$y_tglselesai";


}else{

	$tgltampil = date("d-m-Y");
	$jamtampil = date("H:i");
	
	$tglselesai = "30-12-9999";
	$jamselesai = "23:58";
}


?>




            </td>
            </tr>
          </table>
          <hr class='line_box'>
          <table width='100%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td>URUTAN</td>
              <td>: 
			  
			  
        <select name='urutan'>
          <option value='<?php 
echo $row_item->urutan; ?>'> <?php 
echo $row_item->urutan; ?></option>
          <?php 
for($i=0; $i<=5; $i++)	{
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
            <tr>
              <td width="29%">STATUS TAMPIL </td>
              <td width="71%">: 

	  <label>
	  <input name="statustampil" type="checkbox" id="statustampil" value="1" <?php 
echo $cek_statustampil ?>>
      STATUS TAMPIL 
	  </label>			  </td>
            </tr>
            <tr>
              <td>TANGGAL TAMPIL </td>
              <td>: 
                <input name="tgltampil" type="text" id="tgltampil" value="<?php 
echo $tgltampil ?>" size="12"> 
              ( DD-MM-YYYY ) </td>
            </tr>
            <tr>
              <td>JAM TAMPIL </td>
              <td>: 
                <input name="jamtampil" type="text" id="jamtampil" value="<?php 
echo $jamtampil ?>" size="12"> 
              ( HH:MM ) </td>
            </tr>
            <tr>
              <td>TANGGAL SELESAI </td>
              <td>: 
                <input name="tglselesai" type="text" id="tglselesai2" value="<?php 
echo $tglselesai ?>" size="12"> 
              ( DD-MM-YYYY ) </td>
            </tr>
            <tr>
              <td>JAM SELESAI </td>
              <td>: 
                <input name="jamselesai" type="text" id="jamselesai" value="<?php 
echo $jamselesai ?>" size="12"> 
              ( HH:MM ) </td>
            </tr>



          </table>
          <table width='100%'  border='0' cellpadding='0' cellspacing='0'>
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

	if( $row_item->namafile == "" ){

	}else{
	$Delete_gambar_item = "proses_banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=item_updateimage";
?>

<div align='left'> 

<b> Preview Banner : </b>
<br>
<img src='<?php 
echo $link_host ?><?php 
echo $row_item->direktorigambar ?><?php 
echo $row_item->namafile ?>' width='200'> 
<br>
<a href='<?php 
echo $Delete_gambar_item ?>'> <b> DELETE FILE </b> </a>
</div>
<br>
<br>

<?php 
} 
}
?>

			  
			  
			  
			  
			  
			  </td>
            </tr>
          </table>
          <table width='100%'  cellpadding='2' cellspacing='0' border='0'>
            <tr>
              <td>
                <p align='left'>
                  <input type='submit' name='Submit2' value='<?php 
echo $SubmitButtonItembanner ?>'>
                  <?php 
echo $Tombol_CANCEL ?> </p></td>
            </tr>
            <tr>
              <td>
                <input name='id' type='hidden'  value='<?php 
echo $row_item->id ?>'>
				<input name='idkategorisub' type='hidden'  value='0'>
                <input name='idupline' type='hidden'  value='<?php 
echo $row_item->idupline ?>'>
                <input name='idusers' type='hidden'  value='<?php 
echo $e_idusers ?>'>
                <input name='idadmin' type='hidden'  value='<?php 
echo $e_idadmin ?>'>
                <input name='dilihat' type='hidden' value='<?php 
echo $row_item->dilihat ?>'>
                <input name='direktorigambar' type='hidden'  value='<?php 
echo $row_item->direktorigambar ?>'>
				<input name="namafile" type="hidden" id="namafile" value="<?php 
echo $row_item->namafile ?>">
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