<?php 
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
<tr class='judulform'>
<td width='43' height="27" class='judulform'> No. </td>
<td width="671" colspan="5" class='judulform'> List Item Users Groups</td>
</tr>
<?php 
$idkategori = $_GET["idkategori"];
$result = mysql_query("SELECT * FROM $tbl_userskategorisub WHERE idkategori = '$idkategori' ORDER BY id ");

?>
<?php 
$no = 1;
while($row = mysql_fetch_object($result))
{

$users_kategori_id = $row->id;
$users_kategori_idupline = $row->idupline;
$users_kategori_keterangan = $row->keterangan;
$users_kategori_keteranganinggris = $row->keteranganinggris;
$users_kategori_urutan = $row->posisi;
$users_kategori_urutan = $row->urutan;
$users_kategori_homehalamantampil = $row->homehalamantampil;
$users_kategori_menutampil = $row->menutampil;
$users_kategori_statustampil = $row->statustampil;
$users_kategori_imagefile = $row->imagefile;
$users_kategori_imagelogo = $row->imagelogo;
$users_kategori_hit = $row->hit;

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
	$image_usersgroups = $location_dir . $row->imagelogo;

	$Preview_Image = "<img src='$image_usersgroups' width='100' border='0'>";
	$showImg = "../images/ok.png";
}
?>

  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="13%">
	  <div align='center'>
	  <a href='users_groups.php?idkategori=<?php 
echo $idkategori ?>&id=<?php 
echo $row->id ?>&action=EditData'>
	  <?php 
echo $Preview_Image ?>
	  </a>
	  </div>
<div class="link_action">
  <ul>
	<li> <a href='users_groups.php?idkategori=<?php 
echo $idkategori ?>&id=<?php 
echo $row->id ?>&action=EditData' class='link_action'> EDIT </a> </li>
  </ul>
</div>
	  </td>
      <td width="29%">
	  
<div class="Font_Item_Judul">  
<?php 
echo $row->keterangan ?>
</div>
<br>
<br>

Posisi : <?php 
echo $row->posisi ?>
<br>
Order : <?php 
echo $row->urutan ?>
<br>  
Images : 
<img src='<?php 
echo $showImg  ?>' width='15'>
	  
	  
	  
	  
	  </td>
      <td width="43%">
	  

<?php 
if($row->statustampil == 0){
	$Publish = "<a href='proses_users_groups.php?action=usersgroups_statustampil&idkategori=$row->idkategori&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_users_groups.php?action=usersgroups_statustampil&idkategori=$row->idkategori&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>
Status Tampil : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'> 
<?php 
if($row->homehalamantampil == 0){
	$Publish = "<a href='proses_users_groups.php?action=usersgroups_homehalamantampil&idkategori=$row->idkategori&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_users_groups.php?action=usersgroups_homehalamantampil&idkategori=$row->idkategori&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>
Tampil Di Homehalaman : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'> 
<?php 
if($row->menutampil == 0){
	$Publish = "<a href='proses_users_groups.php?action=usersgroups_menutampil&idkategori=$row->idkategori&id=$row->id&status=1' class='link_action'> Publish </a>";
	$Unpublish = "Unpublish";
}else{
	$Publish = "Publish";
	$Unpublish = "<a href='proses_users_groups.php?action=usersgroups_menutampil&idkategori=$row->idkategori&id=$row->id&status=0' class='link_action'> Unpublish </a>";
}
?>
Tampil Di Menu : <?php 
echo $Publish ?> | <?php 
echo $Unpublish ?>
<hr class='line_box'>   


	  
	  </td>
      <td width="15%">
<div class="link_delete">
  	<ul class="link_delete">
  		<li class="link_delete"><a href='#' onClick="JavaScript_Konfirmasi( <?php 
echo $row->idkategori ?>,<?php 
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