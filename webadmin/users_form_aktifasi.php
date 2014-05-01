<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>
    							<tr class='judulform'>
      								<td width='100%' height='30'>
	  
										FORM  ACTIVATION FOR REGISTRATION
			
									</td>
   								</tr>
	
	
    							<tr class='kontenform'>
      								<td>
		
		
										<form action='proses_users.php?action=aktifasi' method='post' name='FormUsersAktifasi'>
											
											<table  width='100%'  align='center'  cellpadding='1' cellspacing='1' class='tabelform'>
  												<tr class='kontenform' >
    												
													<td width='32%'>
      					
														<div align='right'><b> Email </b></div>
					
													</td>
    												
													<td width='2%'>
														<div align='center'> <b> : </b> </div>
													</td>
    												
													<td width='66%'>
      													<input name='email' type='text' id='email' size='25' >
													</td>
  												</tr>
  
  
  												<tr class='kontenform' >
    												<td>
														<div align='right'><b>Activation Code</b></div>
													</td>


    												<td>
															<div align='center'><b>:</b></div></td>
    												<td>
																<input name='kodeaktifasi' type='text' id='kodeaktifasi' size='25'>
													</td>
  												</tr>
  
  												<tr class='kontenform' >
    												<td> </td>
    												<td valign='top'> </td>
    												<td valign='top'>
													<img src='../function/Function.Konfirmasi.CaptchaSecurityImages.php?width=100&height=20&characters=5'>
													</td>
  												</tr>
												

  												<tr class='kontenform' >
    												<td><div align='right'></div></td>
    												<td valign='top'> </td>
    												<td valign='top'>
      												<input name='kodeverifikasi' type='text' id='kodeverifikasi'  size='25'>
      												<br>
     												* Must fill out the verification code 
													</td>
  												</tr>
  												
												
												<tr class='kontenform' >
    												<td><div align='right'></div></td>
    												<td valign='top'><div align='center'></div></td>
    												<td valign='top'>
      													<input  name='Submit' type='submit'  class='button' id='Submit' value='Submit'>
    												</td>
  												</tr>
										</table>						
									</form>		
		
		
		
		
									</td>
								</tr>
							</table>