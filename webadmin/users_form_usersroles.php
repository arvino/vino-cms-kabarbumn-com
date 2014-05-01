<?php 
/*
token_usersadmin
token_usersgroup
*/

$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='judulform'>
			<td width='100%' height='30'>
				FORM ENTRY USERS ROLES 
			</td>
		</tr>
    	<tr class='kontenform'>
      		<td>

<div align='center'>

<form action="<?php 
echo $FormProses ?>" method="post">

<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>


  <tr class='kontenform' >
    <td><p align="right">Roles ID</p>      </td>
    <td><div align="center">:</div></td>
    <td><input name="secroleid" type="text" id="secroleid" value="<?php 
echo $detail_roles->secroleid ?>" size="60"></td>
  </tr>
  <tr class='kontenform' >
    <td><div align="right">Roles Name </div></td>
    <td><div align="center">:</div></td>
    <td><input name="secrolename" type="text" id="secrolename" value="<?php 
echo $detail_roles->secrolename ?>" size="60"></td>
  </tr>
  <tr class='kontenform' >
    <td width='32%'>&nbsp;  </td>
    <td width='2%'>&nbsp;</td>
    <td width='66%'><input type="submit" name="Submit" value="<?php 
echo $Submit_Button ?>"> <?php 
echo $Tombol_CANCEL ?></td>
  </tr>

</table>
</form>

</div>
	  
	  		</td>
  		</tr>
  
</table>

<?php 
}
?>