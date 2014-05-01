<?php 
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST ');
}else{
?>



<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
include"kelas_function.php";

$id = $_GET['id'];
$iditem = $_GET['iditem'];

$detail_itemlampiran = ViewDetail_bannerFileLampiran( $tbl_bannerfile, $id );

$TipeFile =  $detail_itemlampiran->tipefile;
//$LokasiFile = "../" . $detail_itemlampiran->direktorifile . $detail_itemlampiran->namafile;
$LokasiFile = $link_host . $detail_itemlampiran->direktorifile . $detail_itemlampiran->namafile;
/* hitung hit counter file lampiran */
$bannerFileHit = bannerfileDiLihat( $tbl_bannerfile, $id );
 

$_SESSION['filelampiran_$id_bannerlog'] = $id_bannerlog;
$_SESSION['id_bannerlog'] = $id_bannerlog;


?>
<?php 
/* Tipe File Gambar */
if($TipeFile=="jpg" || $TipeFile=="JPG" || $TipeFile=="jpeg" || $TipeFile=="JPEG" || $TipeFile=="png" || $TipeFile=="PNG" || $TipeFile=="bmp" || $TipeFile=="BMP" 
 || $TipeFile=="gif" || $TipeFile=="GIF"){

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<img src='<?php 
echo $LokasiFile ?>'>
</body>
</html>
<?php 
}

/* Tipe File Audio */
if($TipeFile=="mp3" || $TipeFile=="MP3" || $TipeFile=="midi" || $TipeFile=="MIDI" || $TipeFile=="wav" || $TipeFile=="WAV" ){


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail_itemlampiran->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/css_textbody.css">
<link rel="stylesheet" type="text/css" href="css/css_body.css">
</head>
<body>


<div class="link_action" align="center">
<ul class="link_action">
	<li class="link_action"> <a href="javascript:location.reload(true)" class="link_action"> Refresh halaman  </a> </li>
	<li class="link_action"> <a href="javascript:window.close()" class="link_action"> Tutup Window </a> </li>
</ul>
</div>


<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
<td width='100%' height='30'>
* Harap Refresh halaman  atau Tutup jendela Jika Dokumen tidak tampil.
</td>
</tr>
<tr class='kontenform'>
<td>



<div align='center'>
<span id="music1">
<embed type="application/x-mplayer2" id="music1"
pluginshalaman="http://www.microsoft.com/Windows/MediaPlayer/" 
src="../<?php 
echo $detail_itemlampiran->direktorifile ?><?php 
echo $detail_itemlampiran->namafile ?>" 
name="MediaPlayer1" 
width="400"
height="400"
controltype="2" 
showcontrols="1"
showstatusbar="1"
AutoStart="true">
</embed></span>
</div>


</td>
</tr>
</table>




</body>
</html>

<?php 
}
	
/* Tipe File Video */
if($TipeFile=="mp4" || $TipeFile=="MP4" || $TipeFile=="flv" || $TipeFile=="FLV" || $TipeFile=="wmv" || $TipeFile=="WMV" ){

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail_itemlampiran->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/css_textbody.css">
<link rel="stylesheet" type="text/css" href="css/css_body.css">
</head>
<body>

<div class="link_action" align="center">
<ul class="link_action">
	<li class="link_action"> <a href="javascript:location.reload(true)" class="link_action"> Refresh halaman  </a> </li>
	<li class="link_action"> <a href="javascript:window.close()" class="link_action"> Tutup Window </a> </li>
</ul>
</div>


<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='kontenform'>
<td>


<div align='center'>
<span id="music1">
<embed type="application/x-mplayer2" id="music1"
pluginshalaman="http://www.microsoft.com/Windows/MediaPlayer/" 
src="../<?php 
echo $detail_itemlampiran->direktorifile ?><?php 
echo $detail_itemlampiran->namafile ?>" 
name="MediaPlayer1" 
width="500"
height="450"
controltype="2" 
showcontrols="1"
showstatusbar="1"
AutoStart="true">
</embed></span>
</div>

</td>
</tr>
</table>



</body>
</html>

<?php 
}
	
/* Tipe File Dokumen PDF */
if($TipeFile=="pdf" || $TipeFile=="PDF" ){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail_itemlampiran->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link rel="stylesheet" type="text/css" href="css/css_textbody.css">
<link rel="stylesheet" type="text/css" href="css/css_body.css">
 
</head>
<body>


<span class="link_action"> 


<ul class="link_action">
	<li class="link_action"> <a href="javascript:location.reload(true)" class="link_action"> Refresh halaman  </a> </li>
	<li class="link_action"> <a href="banner_filelampiran.php" class="link_action"> Tutup Window </a> </li>
</ul> </span>
<?php 
/* Ketika Tutup jendela simpan log */


?>


<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
<td width='100%' height='30'>
* Harap Refresh halaman  atau Tutup jendela Jika Dokumen tidak tampil.
</td>
</tr>
<tr class='kontenform'>
<td>
<iframe src="<?php 
echo $LokasiFile ?>" width="100%" height="500" oncontextmenu="return false"></iframe>
</td>
</tr>
</table>

</body>
</html>
<?php 
}

/* Tipe File Dokumen PPT */
if($TipeFile=="ppt" || $TipeFile=="PPT" ){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
echo $LokasiFile ?>
</body>
</html>
<?php 
}

/* Tipe File Dokumen XLS */
if($TipeFile=="xls" || $TipeFile=="XLS" || $TipeFile=="xlsx" ){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
echo $LokasiFile ?>
</body>
</html>
<?php 
}

/* Tipe File Dokumen DOC / WORD */
if($TipeFile=="doc" || $TipeFile=="DOC" || $TipeFile=="txt" || $TipeFile=="TXT" || $TipeFile=="rtf" || $TipeFile=="RTF" || $TipeFile=="docx" || $TipeFile=="DOCX" ){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
echo $LokasiFile ?>
</body>
</html>
<?php 
}

/* Tipe File Lainnya */
if($TipeFile=="exe" || $TipeFile=="EXE" ){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
echo $LokasiFile ?>
</body>
</html>
<?php 
}

/* Tipe File Dokumen ZIP  & ISO */
if($TipeFile=="zip" || $TipeFile=="ZIP" || $TipeFile=="rar" || $TipeFile=="RAR" || $TipeFile=="iso" || $TipeFile=="ISO" ){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php 
echo $detail->judul ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
echo $LokasiFile ?>
</body>
</html>
<?php 
}

?>

<?php 
} ?>
<?php 
} ?>