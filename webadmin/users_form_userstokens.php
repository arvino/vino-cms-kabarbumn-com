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
				FORM ENTRY USERS TOKENS
				
				</td>
		</tr>
    	<tr class='kontenform'>
      		<td>

<div align='center'>

<form action="<?php 
echo $FormProses ?>" method="post">

<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>


  <tr class='kontenform' >
    <td><div align="right">Token's ID </div></td>
    <td><div align="center">:</div></td>
    <td><input name="tokenid" type="text" id="tokenid" value="<?php 
echo $detail_token->tokenid ?>" size="50"></td>
  </tr>
  <tr class='kontenform' >
    <td><div align="right">Token's Name </div></td>
    <td><div align="center">:</div></td>
    <td><input name="tokenname" type="text" id="tokenname" value="<?php 
echo $detail_token->tokenname ?>" size="50"></td>
  </tr>
  <tr class='kontenform' >
    <td width='32%'>&nbsp;</td>
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