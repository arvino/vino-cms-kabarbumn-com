<?php 
$jml_item_line1_lampiran = "2"; /* Jumlah  perbaris */
$lebar_box_lampiran = "50%";
?>

<?php 
$iditem = $row_otherpage_item->id;
$hitungdata = TotalAllDataotherpageItemLampiran( $tbl_otherpagefile, $iditem ); 
?>

<?php 
if($hitungdata == 0){
?>
<?php 
}else{
?>

<table class='tabelform'  align='center'  width='99%'  cellpadding='1' cellspacing='1'>
<tr valign='top'>
<?php 
$result_itemlampiran = ViewAll_otherpageItemLampiran_ByItem( $tbl_otherpagefile, $iditem );
?>

<?php 
$kolom_lampiran = 1;
while( $row_filelampiran = mysql_fetch_object($result_itemlampiran) ){
if( $kolom % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
$TipeFile = $row_filelampiran->tipefile;
?>
<?php 
/* Tipe File Gambar */
if($TipeFile=="jpg" || $TipeFile=="JPG" || $TipeFile=="jpeg" || $TipeFile=="JPEG" || $TipeFile=="png" || $TipeFile=="PNG" || $TipeFile=="bmp" || $TipeFile=="BMP" 
 || $TipeFile=="gif" || $TipeFile=="GIF"){
$gambarpreview = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$ukuran_popup_lampiran = "width=650,height=650";
$scrollbar = "scrollbars=yes";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$link_host" . "page_otherpage_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}

/* Tipe File Audio */
if($TipeFile=="mp3" || $TipeFile=="MP3" || $TipeFile=="midi" || $TipeFile=="MIDI" || $TipeFile=="wav" || $TipeFile=="WAV" ){
$gambarpreview = "$link_host"."images/icon/icon_mp3.png";
$ukuran_popup_lampiran = "width=400,height=100";
$scrollbar = "scrollbars=no";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$link_host" . "page_otherpage_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}
	
/* Tipe File Video */
if($TipeFile=="mp4" || $TipeFile=="MP4" || $TipeFile=="flv" || $TipeFile=="FLV" || $TipeFile=="wmv" || $TipeFile=="WMV" ){
$gambarpreview = "$link_host"."images/icon/icon_flv.png";
//$ukuran_popup_lampiran = "width=850,height=800";
$ukuran_popup_lampiran = "width=550,height=500";
$scrollbar = "scrollbars=yes";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$link_host" . "page_otherpage_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}
	
/* Tipe File Dokumen PDF */
if($TipeFile=="pdf" || $TipeFile=="PDF" ){
$gambarpreview = "$link_host"."images/icon/icon_pdf.png";
$ukuran_popup_lampiran = "width=900,height=650";
$scrollbar = "scrollbars=yes";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
//$view_detail_lampiran_otherpage = "$LokasiFile";
$view_detail_lampiran_otherpage = "$link_host" . "page_otherpage_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}

/* Tipe File Dokumen PPT */
if($TipeFile=="ppt" || $TipeFile=="PPT" ){
$gambarpreview = "$link_host"."images/icon/icon_ppt.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$LokasiFile";

}

/* Tipe File Dokumen XLS */
if($TipeFile=="xls" || $TipeFile=="XLS" || $TipeFile=="xlsx" ){
$gambarpreview = "$link_host"."images/icon/icon_xls.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$LokasiFile";
}

/* Tipe File Dokumen DOC / WORD */
if($TipeFile=="doc" || $TipeFile=="DOC" || $TipeFile=="txt" || $TipeFile=="TXT" || $TipeFile=="rtf" || $TipeFile=="RTF" || $TipeFile=="docx" || $TipeFile=="DOCX" ){
$gambarpreview = "$link_host"."images/icon/icon_doc.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$LokasiFile";
}

/* Tipe File Lainnya */
if($TipeFile=="exe" || $TipeFile=="EXE" ){
$gambarpreview = "$link_host"."images/icon/icon_otherfile.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$LokasiFile";
}

/* Tipe File Dokumen ZIP  & ISO */
if($TipeFile=="zip" || $TipeFile=="ZIP" || $TipeFile=="rar" || $TipeFile=="RAR" || $TipeFile=="iso" || $TipeFile=="ISO" ){
$gambarpreview = "$link_host"."images/icon/icon_zip.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "$link_host" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_otherpage = "$LokasiFile";
}

?>


<td height="75" bgcolor="<?php 
echo $BG ?>" onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
print $BG ?>'" align='left'>


<br>
<div align='center'>
<div class="txt_item_judul">
 <?php 
echo $row_filelampiran->judul ?>
</div>
<br>
 
<img src="<?php 
echo $gambarpreview ?>" width="250"  align="center" border="0">
 
</div>
<br>

<?php 
if($kolom_lampiran==$jml_item_line1_lampiran)
{
?>
</td>
</tr>
<?php 
$kolom_lampiran=1;
}  
else
$kolom_lampiran++;
}

?>
</table>

<?php 
} ?>