<?php 
$KodeKeamananhalaman  = "token_order";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{
?>

<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>

<?php 
if( $sesi_aksesmodul == "admin_system" ){

/*
<tr class='judulform'>
<td width='50' height="33" class='judulform'> <div align="center">NO. </div></td>
<td colspan="3" class='judulform'> <div align="center">LIST FILE </div></td>
</tr>
*/

?>

<?php 
} ?>
<?php 
$result_itemlampiran = ViewAll_orderItemLampiran_ByItem( $tbl_orderfile, $iditem );
$hitungdata = TotalAllDataorderItemLampiran( $tbl_orderfile, $iditem );
?>
<?php 
if($hitungdata == 0){
?>
<tr class='kontenform'>
	<td colspan='3' class='kontenform'> NO FILE EXTRA FOUND</td>
</tr>
<?php 
}else{
?>
<?php 
$no = 1;
while( $row_filelampiran = mysql_fetch_object($result_itemlampiran) ){
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
$TipeFile = $row_filelampiran->tipefile;
?>
<?php 
/* Tipe File Gambar */
if($TipeFile=="jpg" || $TipeFile=="JPG" || $TipeFile=="jpeg" || $TipeFile=="JPEG" || $TipeFile=="png" || $TipeFile=="PNG" || $TipeFile=="bmp" || $TipeFile=="BMP" 
 || $TipeFile=="gif" || $TipeFile=="GIF"){
$gambarpreview = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$ukuran_popup_lampiran = "width=650,height=650";
$scrollbar = "scrollbars=yes";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "order_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}

/* Tipe File Audio */
if($TipeFile=="mp3" || $TipeFile=="MP3" || $TipeFile=="midi" || $TipeFile=="MIDI" || $TipeFile=="wav" || $TipeFile=="WAV" ){
$gambarpreview = "../images/icon/icon_mp3.png";
$ukuran_popup_lampiran = "width=400,height=100";
$scrollbar = "scrollbars=no";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "order_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}
	
/* Tipe File Video */
if($TipeFile=="mp4" || $TipeFile=="MP4" || $TipeFile=="flv" || $TipeFile=="FLV" || $TipeFile=="wmv" || $TipeFile=="WMV" ){
$gambarpreview = "../images/icon/icon_flv.png";
//$ukuran_popup_lampiran = "width=850,height=800";
$ukuran_popup_lampiran = "width=550,height=500";
$scrollbar = "scrollbars=yes";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "order_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}
	
/* Tipe File Dokumen PDF */
if($TipeFile=="pdf" || $TipeFile=="PDF" ){
$gambarpreview = "../images/icon/icon_pdf.png";
$ukuran_popup_lampiran = "width=900,height=650";
$scrollbar = "scrollbars=yes";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
//$view_detail_lampiran_order = "$LokasiFile";
$view_detail_lampiran_order = "order_item_detaillampiran.php?iditem=$row_filelampiran->idkonten&id=$row_filelampiran->id";
}

/* Tipe File Dokumen PPT */
if($TipeFile=="ppt" || $TipeFile=="PPT" ){
$gambarpreview = "../images/icon/icon_ppt.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "$LokasiFile";

}

/* Tipe File Dokumen XLS */
if($TipeFile=="xls" || $TipeFile=="XLS" || $TipeFile=="xlsx" ){
$gambarpreview = "../images/icon/icon_xls.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "$LokasiFile";
}

/* Tipe File Dokumen DOC / WORD */
if($TipeFile=="doc" || $TipeFile=="DOC" || $TipeFile=="txt" || $TipeFile=="TXT" || $TipeFile=="rtf" || $TipeFile=="RTF" || $TipeFile=="docx" || $TipeFile=="DOCX" ){
$gambarpreview = "../images/icon/icon_doc.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "$LokasiFile";
}

/* Tipe File Lainnya */
if($TipeFile=="exe" || $TipeFile=="EXE" ){
$gambarpreview = "../images/icon/icon_otherfile.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "$LokasiFile";
}

/* Tipe File Dokumen ZIP  & ISO */
if($TipeFile=="zip" || $TipeFile=="ZIP" || $TipeFile=="rar" || $TipeFile=="RAR" || $TipeFile=="iso" || $TipeFile=="ISO" ){
$gambarpreview = "../images/icon/icon_zip.png";
$ukuran_popup_lampiran = "width=150,height=150";
$scrollbar = "scrollbars=no";
$LokasiFile = "../" . $row_filelampiran->direktorifile . $row_filelampiran->namafile;
$view_detail_lampiran_order = "$LokasiFile";
}

?>
<tr  valign='top' bgcolor="<?php 
echo $BG ?>" onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
print $BG ?>'">

<td height="75"  align='center'> <?php 
echo $no ?> </td>

<td width="100"  align='left'>



<div align='center'>
<a href="javascript:OpenWindow('<?php 
echo $view_detail_lampiran_order ?>','printWindowFileLampiran<?php 
echo $row_filelampiran->idkonten ?><?php 
echo $row_filelampiran->id ?>','<?php 
echo $scrollbar ?>,<?php 
echo $ukuran_popup_lampiran ?>')">
<img src="<?php 
echo $gambarpreview ?>" width="65" height="75" align="center" border="0">
</a>
</div>

<?php 
if( $sesi_aksesmodul == "anggota_biasa" ){
}else{
?>
<hr class="line_box">

<div class="link_action" align="center">
<ul class="link_action">
	<li class="link_action">
<a href='order_item_lampiran.php?iditem=<?php 
echo $row_filelampiran->idkonten ?>&id=<?php 
echo $row_filelampiran->id ?>&action=EditData' class="link_action"> Edit </a> 
	</li>
</ul>	 
</div>
<?php 
} ?>

</td>
<td width="461"  align='left'> 
<div class="Font_Item_Judul">
<a href="javascript:OpenWindow('<?php 
echo $view_detail_lampiran_order ?>','printWindowFileLampiran<?php 
echo $row_filelampiran->idkonten ?><?php 
echo $row_filelampiran->id ?>','<?php 
echo $scrollbar ?>,<?php 
echo $ukuran_popup_lampiran ?>')" class="Font_Item_Judul">
<?php 
echo $row_filelampiran->judul ?>
</a>

</div>
<?php 
if( $sesi_aksesmodul == "admin_system" ){
?>
<?php 
echo harienglish($row_filelampiran->tanggalpost) ?>, <?php 
echo bulanenglish($row_filelampiran->tanggalpost) ?>  | <?php 
echo $row_filelampiran->jampost ?>
<?php 
} ?>
<br>
<b><u> URL File : </u></b>
<br>
<?php 
echo $link_host ?><?php 
echo $row_filelampiran->direktorifile ?><?php 
echo $row_filelampiran->namafile ?>
<br><br>



<div class="Font_Item_Judul">
<a href="javascript:OpenWindow('<?php 
echo $view_detail_lampiran_order ?>','printWindowFileLampiran<?php 
echo $row_filelampiran->idkonten ?><?php 
echo $row_filelampiran->id ?>','<?php 
echo $scrollbar ?>,<?php 
echo $ukuran_popup_lampiran ?>')" class="Font_Item_Judul">

[ CLICK HERE FOR SEE FILE  ]</a>
</div>
<?php 
if( $sesi_aksesmodul == "admin_system" ){
?>
<br>
<br>


<hr class='line_box'>
Order : <?php 
echo $row_filelampiran->urutan ?> | File Type : <b> <?php 
echo $row_filelampiran->tipefile ?> </b><br>

<?php 
} ?>

</td>
<td width="97">


<?php 
if( $sesi_aksesmodul == "anggota_biasa" ){
echo "<div align='center'> 
<br>
Di baca : <br>" . $row_filelampiran->hitcounter . "<br>
kali
<br>
</div>";
}else{
?>

<div class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#' onClick="JavaScript_Konfirmasi_ItemLampiran( <?php 
echo $row_filelampiran->idkonten ?> , <?php 
echo $row_filelampiran->id ?> )" class="link_delete"> Delete </a>
	</li>
</ul>	 
</div>
<?php 
}
?>

</td>
</tr>
<?php 
$no ++;
}
?>
<?php 
} ?>
</table>

<?php 
} ?>