<?php 
$FormAction_TicketSupport = "proses_users.php?action=usersaction_kirimticket";
?>

<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM TICKET SUPPORT OR CONTACT  ADMINISTRATOR
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>
									

<form action='<?php 
echo $FormAction_TicketSupport ?>' method='post' name='FormUsersTicketSupport' >
  							
							
<table class='tabelform' width='100%' cellpadding='1' cellspacing='1'>
<tr class='kontenform' >
<td>
<div align='right'><b>Name</b></div>
</td>
<td>
<div align='center'><b>:</b></div>                   
                               </td>
  							   <td>
                               
                               
<input name='nama' type='text' id='nama' value="<?php 
echo $sesi_username ?>" size='25' />
                               
                               
                               
                               </td>
						      </tr>



<tr class='kontenform' >
<td width="23%">
<div align='right'><b>Email</b></div>
</td>
<td width="6%">
<div align='center'><b>:</b></div>
</td>
<td width="71%">
<input name='email' type='text' id='email' value="<?php 
echo $sesi_email ?>" size='45' >								</td>
</tr>
							
							
<tr class='kontenform' >
<td></td>
<td></td>
<td>
* Your email address must be already register in our database.</td>
</tr>

<tr class='kontenform' valign="top">
<td >
<div align='right'>
<b>
Message 
</b>
</div>
</td>
<td >
                                
<div align='center'>
<b>
:
</b>
</div>
                                
</td>
<td >
	<textarea name="pesan" id="pesan" cols="55" rows="7"></textarea>
</td>
</tr>
   
<tr class='kontenform' >
<td>
	<div align='right'><b>Verification Code</b></div>
</td>
<td>
<div align='center'><b>:</b></div>								
</td>
<td> 
<img src='../function/Function.Register.CaptchaSecurityImages.php?width=100&height=20&characters=5'>								</td>
</tr>
	
	
  											 <tr class='kontenform' >
      											<td><div align='right'></div></td>
      											<td><div align='center'></div></td>
     										 	<td>
	  												<input name='kodeverifikasi' type='text' id='kodeverifikasi'  size='25' maxlength='25'>
         											<br>
      												* Fill verification code												</td>
   											 </tr>
    										<tr class='kontenform' >
      											<td><div align='right'></div></td>
      											<td valign='top'><div align='center'></div></td>
      											<td valign='top'>
<input class='button' type='submit' value='Submit' name='SubmitUsersRegistrasi'>												</td>
</tr>
</table>
</form>
									
                                    
                                    
									</td>
								</tr>
							</table>