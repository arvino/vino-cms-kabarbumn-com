<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="62%">

  <div align="left">
  	<a href="<?php 
echo $link_host ?><?php 
echo $dir_admin ?>">
  		<img src="images/logo-web-site-administrator.png"   border="0">
	</a>	    
  </div>


</td>
<td width="12%">

</td>
<td width="26%" align="right">

<div align="right">
<div id='menunavigasi_horisontal' class='menunavigasi_horisontal'>
<ul>
<?php 
if( $sesi_id == "" ){
}else{
?>




 
 


<?php 
$KodeKeamananhalaman  = "token_frontpage"; /* Token Help ? */
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>
<li><a href="<?php 
echo $link_host ?>" target="_blank" title="Go To The Front Page."> FRONT PAGE </a></li> 
<?php 
} ?>


<li><a href="users_logout.php?pesan_error=LOGOUT SUCCESS."><b><u> LOGOUT </u></b> </a></li>
<?php 
} ?> 
</ul>
</div>	 
</div>
</td>
</tr>
</table>
