<?php 
$KodeKeamananhalaman  = "token_banner";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
<tr class='judulform'>
<td width='43' height="27" class='judulform'> No. </td>
<td width="671" colspan="5" class='judulform'> LIST SECTION </td>
</tr>
<?php 
$result = mysql_query("SELECT * FROM $tbl_bannerkategori ORDER BY urutan");

?>
<?php 
$no = 1;
while($row = mysql_fetch_object($result))
{

$banner_kategori_id = $row->id;
$banner_kategori_idupline = $row->idupline;
$banner_kategori_keterangan = $row->keterangan;
$banner_kategori_keteranganinggris = $row->keteranganinggris;
$banner_kategori_urutan = $row->posisi;
$banner_kategori_urutan = $row->urutan;
$banner_kategori_homehalamantampil = $row->homehalamantampil;
$banner_kategori_menutampil = $row->menutampil;
$banner_kategori_statustampil = $row->statustampil;
$banner_kategori_imagefile = $row->imagefile;
$banner_kategori_imagelogo = $row->imagelogo;
$banner_kategori_hit = $row->hit;

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

?>

<tr  valign='top' bgcolor="<?php 
echo $BG ?>" onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
print $BG ?>'">

<td width='43'><div align="center"><?php 
echo $no ?>.</div></td>
<td colspan="5"> 


<?php 
if( $row->imagelogo == "" || $row->imagelogo == "none" )
{
	$Preview_Image = "<img src='../images/cancel.png' border='0'>";
	$showImg = "../images/cancel.png";
}
else
{

	$loc_root = "../";	
	$location_dir =  $loc_root . $row->imagefile;
	$image_subkanal = $location_dir . $row->imagelogo;

	$Preview_Image = "<img src='$image_subkanal' width='100' border='0'>";
	$showImg = "../images/ok.png";
}
?>

  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr valign="top">
      <td width="13%">

<div class="link_action">
  <ul>
	<li> <a href='banner_kanal.php?id=<?php 
echo $row->id ?>&action=EditData' class='link_action'> EDIT </a> </li>
  </ul>
</div>
	  </td>
      <td>
	  
<div class="Font_Item_Judul">  
<?php 
echo $row->keterangan ?>
</div>
Order : <?php 
echo $row->urutan ?>
<?php 
/*


	  <div align='center'>
	  <a href='banner_kanal.php?id=<?php 
echo $row->id ?>&action=EditData'>
	  <?php 
echo $Preview_Image ?>
	  </a>
	  </div>
<br>  
<br>

Posisi : <?php 
echo $row->posisi ?>
<br>

Images : 
<img src='<?php 
echo $showImg  ?>' width='15'>
*/


?>	  
	  <?php 
/*

 if($row->statustampil == 0){
	$Publish = "<a href='proses_banner_kanal.php?action=kanal_statustampil&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_banner_kanal.php?action=kanal_statustampil&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
 
Status Tampil : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'> 
														  
if($row->menutampil == 0){
	$Publish = "<a href='proses_banner_kanal.php?action=kanal_menutampil&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_banner_kanal.php?action=kanal_menutampil&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>
Tampil Di Menu 1 : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'> 
<?php 
if($row->menutampil2 == 0){
	$Publish = "<a href='proses_banner_kanal.php?action=kanal_menutampil2&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_banner_kanal.php?action=kanal_menutampil2&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>
Tampil Di Menu 2 : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'> 
<?php 
if($row->homehalamantampil == 0){
	$Publish = "<a href='proses_banner_kanal.php?action=kanal_homehalamantampil&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_banner_kanal.php?action=kanal_homehalamantampil&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
 
Tampil Di Homehalaman : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'>
*/


?> 
	  
	  
	  </td>
      <td width="15%">
<div class="link_delete">
  	<ul class="link_delete">
  		<li class="link_delete"><a href='#' onClick="JavaScript_Konfirmasi( <?php 
echo $row->id ?> )" class="link_delete"> Delete </a></li>
	</ul>
</div>
	  </td>
    </tr>
  </table>



<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	
	

  

	
	
	</td>
  </tr>
<tr><td>
<hr class='line_box'>
</td></tr>  

</table></td>
</tr>


<?php 
$no ++;
}
?>

</table>
<?php 
} ?>