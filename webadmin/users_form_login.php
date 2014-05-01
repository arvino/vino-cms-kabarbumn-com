<?php 
$FormUsersLogin = "proses_users.php?action=users_login";
?>
<table class='tabelform' align='center' width='98%' cellpadding='1' cellspacing='1'>
							
		<tr class='judulform'>
			<td width='100%' height='30'>

			FORM LOGIN USERS 
			
			</td>
		</tr>

	

    	<tr class='kontenform'>
      		<td>


<div align='center'>
	  
<form action='<?php 
echo $FormUsersLogin ?>' method='post' name='FormUsersLogin' id='FormUsersLogin'>
	  
<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>
  
  <tr class='kontenform' >
    <td width='32%'>
		<div align='right'> 
			<b> Email </b> 
		</div>
	</td>
	
    <td width='2%'>
		<div align='center'>
			<b>:</b>
		</div>
	</td>
	
    <td width='66%'>
		<div align='left'>
        	<input name='email' type='TEXT' id='email' size='25'>
    	</div>
	</td>
  </tr>
  
  <tr class='kontenform'>

    <td>
		<div align='right'> 
			<b> Password </b> 
		</div>
	</td>
	
    <td>
		<div align='center'>
			<b>:</b>
		</div>
	</td>
	
    <td>
		<div align='left'>
        	<input name='password' type='PASSWORD' id='password' size='25'>
    	</div>
	</td>

  </tr>
  
  
  <tr class='kontenform' >

    <td>
		<div align='right'> 
			<b> </b> 
		</div>
	</td>
	
    <td>
		<div align='center'>
			<b> </b>
		</div>
	</td>
	
    <td>
		<div align='left'>
        	<input name='SubmitUsersLogin' type='submit' class='button' id='SubmitUsersLogin' value='Submit...'>
    	</div>
	</td>
	
	
  </tr>

</table>
</form>

</div>
	  
	  
	  
	  		</td>
  		</tr>
  
</table>