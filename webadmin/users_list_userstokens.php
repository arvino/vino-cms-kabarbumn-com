<?php 
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
<tr class='judulform'>
<td width='56' height="33" class='judulform'> No. </td>
<td colspan="4" class='judulform'> List  Tokens</td>
</tr>
<?php 
$result = Select_All_Users_Tokens_By_Urutan( $tbl_userstokens );
?>
<?php 
$no = 1;
while($row = mysql_fetch_object($result)){

if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

?>

<tr  valign='top' bgcolor="<?php 
echo $BG ?>" onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
print $BG ?>'">

<td height="75"  align='center'> <?php 
echo $no ?> </td>

<td width="121"  align='left'>

<div align='center'>
<a href='users_roles.php?action=EditData&id=<?php 
echo $row->tokenid ?>'>

</a>
</div>

<div class="link_action" align="center">
<ul class="link_action">
	<li class="link_action">
<a href='users_tokens.php?action=EditData&id=<?php 
echo $row->tokenid ?>' class="link_action"> Edit </a> 
	</li>
</ul>	 
</div>

</td>
<td width="183"  align='left'> 
<u>Tokens ID : </u>
<br>

<div class="Font_Item_Judul">
<?php 
echo $row->tokenid ?>
</div>
</td>
<td width="548">
<u>Tokens Name : </u>
<br>
<div class="Font_Item_Judul">
<?php 
echo $row->tokenname ?>
</div></td>
<td width="191">





<div class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#'  onClick="JavaScript_Konfirmasi_Delete( <?php 
echo $row->id ?> )" class="link_delete"> Delete </a>
	</li>
</ul>	 
</div>

</td>
</tr>
<?php 
$no ++;
}


?>

</table>
<?php 
} ?>