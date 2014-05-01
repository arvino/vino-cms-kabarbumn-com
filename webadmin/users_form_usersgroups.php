<?php 
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{


?>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
		<tr class='judulform'>
			<td width='100%' height='30'>
				FORM ENTRY USERS GROUPS </td>
		</tr>
    	<tr class='kontenform'>
      		<td>

<div align='center'>

<form action="<?php 
echo $FormProses ?>" method="post" enctype="multipart/form-data">

<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>


  <tr class='kontenform'>
    <td><div align="right">ROLES</div></td>
    <td><div align="center">:</div></td>
    <td>
	
	
	<?php 
$result_users_roles = Select_All_Users_Roles_By_Urutan( $tbl_usersroles );
	?>
	 
      <select name="secroleid" id="secroleid">
        <option value="0"> Pilih Roles </option>
		<?php 
while($data_users_roles = mysql_fetch_object($result_users_roles)){
		?>
		<option value="<?php 
echo $data_users_roles->secroleid ?>"><?php 
echo strtoupper($data_users_roles->secrolename) ?></option>
		<?php 
}
		?>
      </select>
	  
	  
	  </td>
  </tr>
  <tr class='kontenform'>
    <td><div align="right">TOKEN</div></td>
    <td><div align="center">:</div></td>
    <td> 
	
	<?php 
$result_users_token = Select_All_Users_Tokens_By_Urutan( $tbl_userstokens );
	?>
      <select name="tokenid" id="tokenid">
	   <option value="0"> Pilih Tokens </option>
	   <?php 
while($data_users_token = mysql_fetch_object($result_users_token)){
	   ?>
	   <option value="<?php 
echo $data_users_token->tokenid ?>"> <?php 
echo strtoupper($data_users_token->tokenname) ?> </option>
       <?php 
}
	   ?>
	  </select>
	  
	  
	  </td>
  </tr>
  <tr class='kontenform'>
    <td width='32%'>&nbsp;</td>
    <td width='2%'>&nbsp;</td>
    <td width='66%'><input type="submit" name="Submit" value="Submit"></td>
  </tr>

</table>
</form>

</div>
	  
	  		</td>
  		</tr>
  
</table>
<?php 
} ?>