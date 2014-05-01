<?php 
$form_users = "publicusers_proses.php?action=publicusers_updatepassword";
	
	$get_id = $_GET['id'];
	$detail_publicusers = modeling_PublicUsers_Select_Detail( $tbl_publicusers, $get_id );


	
?>

<table width='98%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>
    <tr class='judulform' >
      <td width='100%' height='30'>
	  
			FORM GANTI PASSWORD MEMBER 
	  
	  </td>
    </tr>
	
	
    <tr class='kontenform'>
      <td>
	  
	  
<form action='<?php 
echo $form_users ?>' method='post' enctype='multipart/form-data' name='form_users' id='form_users'>

<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>
                                 
 <tr class='kontenform' >
    <td width='32%'>
		<div align='right'> 
			<b> Email </b></div>
	</td>
	
    <td width='2%'>
		<div align='center'>
			<b>:</b>
		</div>
	</td>
	
    <td width='66%'>
		<div align='left'> <?php 
echo $detail_publicusers->email  ?>    	</div>
	</td>
  </tr>
                                <tr>
                                  		<td> 

<div align='right'> 
 
<b> 
Password Baru 
</b>
 
</div>
										</td>


                                  		<td>
											<div align='center'><b> 
											: 
											</b></div>
										</td>

                                  		<td>
                                    		<input name='pass1' type='password' id='pass1' size='25' maxlength='10'> 
                                    		* Max. Password 10 Character 
                                  		</td>
                                </tr>
                                <tr>
                                  <td> 


<div align='right'> 

<b> 
Ulangi Password Baru 
</b>





</div>



								  </td>
                                  <td> 
									<div align='center'><b> 
									: 
									</b></div>

								  </td>
                                  <td>
                                    <input name='pass2' type='password' id='pass2' size='25' maxlength='10'>
                                  * Max. Password 10 Character                                  </td>
                                </tr>
                                <tr>
                                  <td><input name="id" type="hidden" id="id" value="<?php 
echo $detail_publicusers->id  ?>"></td>
                                  <td></td>
                                  <td>
                                    <input name='Submit'  type='submit' class='button' id='Submit' value='CHANGE PASSWORD..'>
                                  </td>
                                </tr>
   		 					  </table>
		</form>  
	  </td>
    </tr>
</table>