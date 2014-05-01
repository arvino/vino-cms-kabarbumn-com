<?php 
$KodeKeamananhalaman  = "token_news";
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
	$FormnewsDataItem = "proses_news_item.php?action=item_updatedata";
	$SubmitButtonItemnews = "UPDATE DATA......";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('news_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$id&action=EditData')\" >";
	
	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idsubkategori = $_GET['idsubkategori'];
	$row_kanal = Select_Detail_Kategori_news( $tbl_newskategori, $idkategori );
	$row_subkanal = Select_Detail_KategoriSub_news( $tbl_newskategorisub, $idsubkategori );
	
	
	$row_item = Select_Detail_Item_news($tbl_news, $id);


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
	

	if( $row_item->headlinesection  == "1"){ /* Status Tampil di Headline Section */
		$cek_headlinesection = "checked";
	}else{
		$cek_headlinesection = "";
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

$FormnewsDataItem = "proses_news_item.php?action=item_tambahdata";
$SubmitButtonItemnews = "Add Data...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='Cancel' class='button' onClick=\"javascript:location.replace('news_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&action=FormEntry')\" >";

$e_idusers = $sesi_id;
$e_idadmin = $sesi_id;
}
?>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> FORM ENTRY NEWS ARTICLE </td>
  </tr>
  <tr class='kontenform'>
    <td>
      <div align='center'>
        <form action='<?php 
echo $FormnewsDataItem ?>' method='post' enctype="multipart/form-data">
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
$result_kanalnews = Select_All_Kategori_news_By_Urutan( $tbl_newskategori );
while($row_kanalnews = mysql_fetch_object( $result_kanalnews )){
?>
<option value='<?php 
echo $row_kanalnews->id ?>' onClick="Ambil_SubKategori(<?php 
echo $row_kanalnews->id ?>,<?php 
echo $idsubkategori ?>)"><?php 
echo strtoupper($row_kanalnews->keterangan); ?></option>
<?php 
}
?>
</select>
<?php 
} ?>



<?php 
if( $action=="FormEntry"){ /* Jika tida ada action */

$idkategori = $_GET["idkategori"];
$r_datanews_kategori = Select_Kategori_news_By_Id( $tbl_newskategori, $idkategori );
$r_newskategori = mysql_fetch_object($r_datanews_kategori);

$newskategori_id = $r_newskategori->id;

if( $idkategori == 0 ){ 
$newskategori_id = 0;
$newskategori_keterangan = "<font color='red'> WITHOUT SECTION </font>";
}else{

$newskategori_keterangan = $r_newskategori->keterangan;
$newskategori_keterangan = strtoupper($newskategori_keterangan);

}
?>
<?php 
echo $newskategori_keterangan ?>
<input name='idkategori' type='hidden'  value='<?php 
echo $newskategori_id ?>'>
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
	$r_newssubkategori = Select_SubKategori_news_By_Id( $tbl_newskategorisub, $idsubkategori );
	 
	$newssubkategori_id = $r_newssubkategori->id;

if( $idsubkategori == 0 ){ 
	$newssubkategori_id = 0;
	$newssubkategori_keterangan = "<font color='red'> WITHOUT SUB SECTION </font>";
}else{

	$newssubkategori_keterangan = $r_newssubkategori->keterangan;
	$newssubkategori_keterangan = strtoupper($newssubkategori_keterangan);
}
?>
<b>SUB SECTION  :</b> <?php 
echo $newssubkategori_keterangan ?>
<input name='idkategorisub' type='hidden'  value='<?php 
echo $newssubkategori_id ?>'>
<?php 
}
?>
                    <input name='kodekategori' type='hidden' id="kodekategori"  value='N/A' size='10'>
                    <br>
                    <b> </b><br>
                    <input name='bahasa' type='hidden' value='IND'>
                    <b> Title : </b><br>
                    <input name='judul' type='text' id="judul"  value="<?php 
echo strip_tags($row_item->judul) ?>" size='80'>
                    <br>
                  * Max. 15 Word. <br>
                  <br>
                  <b> </b><b> Sub Title : </b><br>
                  <textarea name="subjudul" cols="98%" id="textarea"><?php 
echo  trim(strip_tags($row_item->subjudul)) ?></textarea>
                 
                <br>
				<br>

                    <b> Preview Description : </b><br>
                    <textarea name='preview' cols='98%' rows='5' id="preview"><?php 
echo  trim(strip_tags($row_item->preview)) ?></textarea>
                    <br>
                  * Max. : 25 Word. <br>
                  <br>
                  <b> Description : </b> <br>


<textarea name='deskripsi' cols='98%' rows='20' id="content" class="ckeditor" > <?php 
echo strip_tags($row_item->deskripsi) ?> </textarea>
<br>
<b> Writer : </b> <br>
<input name="penulis" type="text" id="penulis" value="<?php 
echo $row_item->penulis ?>" size="80">

<br>
<br>

				
<b> Related Word Tag :  </b><br>
<input name="wordtag" type="text" id="wordtag" value="<?php 
echo $row_item->wordtag ?>" size="80">
<br>
<br>
<b>Keyword Metatag for SEO :</b> <br>
<input name="keyword" type="text" id="keyword" value="<?php 
echo $row_item->keyword ?>" size="80">
<br>
                 
              </td>
            </tr>
          </table>
          <hr class='line_box'>
          <table width='98%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td width="31%" height="32">&nbsp; </td>
              <td width="5%"><div align="center"></div></td>
              <td width="64%">
			  
	  
	  <label>
	  <input name="headline" type="checkbox" id="headline" value="1" <?php 
echo $cek_headline ?>>
      PUBLISH AS HEADLINE	  </label>


	  
			  </td>
            </tr>
 
            <tr>
              <td>DATE START 
              <?php 
if( $action=="EditData" ){

	$tgltampil = $row_item->tgltampil;
	$arr_tgltampil = explode("-",$tgltampil);
	
	$d_tgltampil = $arr_tgltampil[2];
	$m_tgltampil = $arr_tgltampil[1];
	$y_tgltampil = $arr_tgltampil[0];

	$tgl_tampil_item_news = "$d_tgltampil-$m_tgltampil-$y_tgltampil";
	$jam_tampil_item_news = $row_item->jamtampil;




	$tglselesaitampil = $row_item->tglselesai;
	$arr_tglselesaitampil = explode("-",$tglselesaitampil);

	$d_tglselesaitampil = $arr_tglselesaitampil[2];
	$m_tglselesaitampil = $arr_tglselesaitampil[1];
	$y_tglselesaitampil = $arr_tglselesaitampil[0];

	$tgl_selesai_tampil_item_news = "$d_tglselesaitampil-$m_tglselesaitampil-$y_tglselesaitampil";

	$jamselesaitampil = $row_item->jamselesai;
	$jam_selesai_tampil_item_news = $jamselesaitampil;

}else{

	$tgl_tampil_item_news =date("d-m-Y");
	$jam_tampil_item_news = date("H:i");

	$tgl_selesai_tampil_item_news =date("d-m-Y");
	$jam_selesai_tampil_item_news = date("H:i");

}

?></td>
              <td><div align="center">:</div></td>
              <td><input name="tgltampil" type="text" id="tgltampil" value="<?php 
echo $tgl_tampil_item_news ?>" maxlength="11">
              ( DD-MM-YYYY )</td>
            </tr>
            <tr>
              <td>TIME START </td>
              <td><div align="center">:</div></td>
              <td><input name="jamtampil" type="text" id="jamtampil" value="<?php 
echo $jam_tampil_item_news ?>" size="6" maxlength="6"> 
                ( HH:MM ) </td>
            </tr>
            <tr>
              <td>DATE END </td>
              <td><div align="center">:</div></td>
              <td><input name="tglselesai" type="text" id="tglselesai" value="<?php 
echo $tgl_selesai_tampil_item_news ?>" maxlength="11"> 
                ( DD-MM-YYYY )</td>
            </tr>
            <tr>
              <td>TIME END </td>
              <td><div align="center">:</div></td>
              <td><input name="jamselesai" type="text" id="jamselesai" value="<?php 
echo $jam_selesai_tampil_item_news ?>" size="8" maxlength="6"> 
              ( HH:MM ) 
			  
			  
			   <label> 
			    <input name="withoutend" type="checkbox" id="withoutend" value="1" checked="checked" <?php 
echo $ck_withoutend ?>>
				WITHOUT END
				</label>
			    <br>

			  
			  
			  </td>
            </tr>
            <tr>
              <td>IMAGE UPLOAD</td>
              <td><div align="center">:</div></td>
              <td><input name="file123" type="file" id="file123"></td>
            </tr>
            <tr>
              <td>IMAGE CAPTION</td>
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

	if( $row_item->gambarkecil == "" ){

	}else{
	$Delete_gambar_item = "proses_news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=item_updateimage";
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
echo $SubmitButtonItemnews ?>'>
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