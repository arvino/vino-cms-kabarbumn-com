<?php 
if($action=="publicusers_updateprofile"){

	$form_users = 	"publicusers_proses.php?action=publicusers_updateprofile";
	$tombol_submit = "UPDATE MEMBER...";
	$tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('publicusers_account.php?id=$id&action=publicusers_updateprofile')\" >";



	$get_id = $_GET['id'];
	$detail_publicusers = modeling_PublicUsers_Select_Detail( $tbl_publicusers, $get_id );

	if($detail_publicusers->jeniskelamin == "male" ){
		$form_option_gender = "
			<label > 
			<input name='gender' type='radio' value='male' checked >  
				Mr.
			</label>
			<label> 
			<input name='gender' type='radio' value='female'>  
				Mrs.
			</label>
			(*)
		";
	
	}else{
	
		$form_option_gender = "
			<label > 
			<input name='gender' type='radio' value='male'>  
				Mr.
			</label>
			<label> 
			<input name='gender' type='radio' value='female' checked >  
				Mrs.
			</label>
			(*)
		";

	}

	if( $detail_publicusers->newsletter == "1"){  
		$cek_newsletter = "checked";
	}else{
		$cek_newsletter = "";
	}
	
	if( $detail_publicusers->status == "1"){ 
		$cek_status = "checked";
	}else{
		$cek_status = "";
	}

	if( $detail_publicusers->statusbaru == "1"){ 
		$cek_statusbaru = "checked";
	}else{
		$cek_statusbaru = "";
	}

	
$src_image_users = $link_host .	$detail_publicusers->direktori . $detail_publicusers->gambarkecil;

if($detail_publicusers->gambarkecil == "" ){
	$form_image_users = "";
}else{
	$form_image_users = "
	<img src='$src_image_users' width='100'>
	<br>
	<a href='publicusers_proses.php?action=publicusers_updateimage&id=$detail_publicusers->id&status=1'' style='text-decoration:none;color:#000000;'> [ Delete Image ] </a>
	<br>
	<br>
	";
}


}




if(!isset($action)){

	$form_users = 	"publicusers_proses.php?action=publicusers_register";
	$tombol_submit = "ADD MEMBER...";
	$tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('publicusers_account.php?id=$id&action=publicusers_register')\" >";

$form_option_gender = "
	<label > 
	<input name='gender' type='radio' value='male'>  
	Mr.
	</label>
	<label> 
	<input name='gender' type='radio' value='female'>  
	Mrs.</label>
	(*)
";

$form_image_users = "";

}


?>


<table class='tabelform' width='98%' cellpadding='1' cellspacing='1' align='center'>	

    							<tr class='judulform' >
      								<td width='100%' height='30'>
	  
										FORM  REGISTRASI MEMBER
			
									</td>
   								</tr>
									
									
    							<tr class='kontenform'>
      								<td>
									
<form action='<?php 
echo $form_users ?>' method='post' enctype="multipart/form-data" name='form_users' id='form_users'>
  							
<table width='100%' cellpadding='1' cellspacing='1'>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td><strong>
							  
<?php 
echo $form_option_gender ?>
							  
							  
							  </strong></td>
  						  </tr>
    						<tr class='kontenform' >
      							<td width='32%'>
        							<div align='right'><strong>
					          First Name									</strong></div>								</td>
								
      							<td width='2%'>
									<div align="center"><strong> :  </strong></div></td>
							  <td width='66%'>
	  								<div align='left' >
          								<input name='firstname' type='text' id='firstname' value="<?php 
echo $detail_publicusers->namadepan ?>" size='25' maxlength='255'>
      								(*)</div>

                              </td>
</tr>
								
  							 <tr class='kontenform' >
  							   <td><div align="right"><strong>  Last Name  </strong></div></td>
  							   <td> <div align="center"><strong>: </strong></div></td>
  							   <td> 
<input name='lastname' type='text' id='lastname' value="<?php 
echo $detail_publicusers->namabelakang ?>" size='25' maxlength='255'>
(*)                               </td>
	      </tr>
  							 <tr class='kontenform' >
  							   <td><div align="right"><strong>Nick Name </strong></div></td>
  							   <td><div align="center"><strong>:</strong></div></td>
  							   <td><input name='nickname' type='text' id='nickname' value="<?php 
echo $detail_publicusers->namapanggilan ?>" size='25' maxlength='255'>
						       (*)</td>
	      </tr>
  							 <tr class='kontenform' >
      							<td>
       						   <div align='right'><strong>Email</strong></div></td>
      							<td>
									<div align="center"><strong>:</strong></div></td>
      							<td>
	  								<input name='email' type='text' id='email' value="<?php 
echo $detail_publicusers->email ?>" size='30' maxlength="255" >
	  								(*) Primary Email </td>
    						</tr>
	
    						<tr class='kontenform' >
    						  <td><div align='right'><strong>
						      Ponsel 
								  </strong></div></td>
    						  <td><div align="center"><strong>:</strong></div></td>
    						  <td>    						    <p>
   						        <input name='ponsel' type='text' id='ponsel' value="<?php 
echo $detail_publicusers->noponsel ?>" size='25' maxlength='25'>
    						    (*) With country code</p>    						    </td>
  						  </tr>


<tr class='kontenform' >
    						  <td><div align="right"><strong>Country</strong></div></td>
    						  <td><div align="center"><strong>:</strong></div></td>
    						  <td>
							  

							  

<select name="country" id="country">
<?php 
if($action=="publicusers_updateprofile"){
?>
			<option value="<?php 
echo $detail_publicusers->negara ?>"> <?php 
echo $detail_publicusers->negara ?> </option>
<?php 
}else{
?>
			<option value="0"> Select Country </option>
<?php 
} ?>
			<option value="Albania">Albania</option>
			<option value="Algeria">Algeria</option>

			<option value="Andorra">Andorra</option>
			<option value="Antigua Barbuda">Antigua &amp; Barbuda</option>
			<option value="Argentina">Argentina</option>
			<option value="Armenia">Armenia</option>
			<option value="Aruba">Aruba</option>

			<option value="Australia">Australia</option>
			<option value="Austria">Austria</option>
			<option value="Azerbaijan">Azerbaijan</option>
			<option value="Bahamas">Bahamas</option>
			<option value="Bahrain">Bahrain</option>
			<option value="Bangladesh">Bangladesh</option>

			<option value="Barbados">Barbados</option>
			<option value="Belarus">Belarus</option>
			<option value="Belgium">Belgium</option>
			<option value="Belize">Belize</option>
			<option value="Bermuda">Bermuda</option>
			<option value="Bhutan">Bhutan</option>


			<option value="Bolivia">Bolivia</option>
			<option value="Bosnia Herzegovina">Bosnia Herzegovina</option>
			<option value="Brazil">Brazil</option>
			<option value="Brunei Darussalam">Brunei Darussalam</option>
			<option value="Bulgaria">Bulgaria</option>
			<option value="Burma">Burma</option>

			<option value="Cambodia">Cambodia</option>
			<option value="Cameroon">Cameroon</option>
			<option value="Canthere is ">Canthere is </option>
			<option value="Cayman Islands">Cayman Islands</option>
			<option value="Chad">Chad</option>
			<option value="Chile">Chile</option>

			<option value="China">China</option>
			<option value="Colombia">Colombia</option>
			<option value="Cook Islands">Cook Islands</option>
			<option value="Costa Rica">Costa Rica</option>
			<option value="Croatia">Croatia</option>
			<option value="Cyprus">Cyprus</option>

			<option value="Czech Republic">Czech Republic</option>
			<option value="Denmark">Denmark</option>
			<option value="Djibouti">Djibouti</option>
			<option value="Dominican Republic">Dominican Republic</option>
			<option value="Ecuador">Ecuador</option>
			<option value="Egypt">Egypt</option>

			<option value="El Savador">El Salvador</option>
			<option value="Estonia">Estonia</option>
			<option value="Ethiopia">Ethiopia</option>
			<option value="Faroe Islands">Faroe Islands</option>
			<option value="Fiji">Fiji</option>
			<option value="Finland">Finland</option>

			<option value="France">France</option>
			<option value="French Guiana">French Guiana</option>
			<option value="French Polynesia">French Polynesia</option>
			<option value="Georgia">Georgia</option>
			<option value="Germany">Germany</option>
			<option value="Ghana">Ghana</option>

			<option value="Gibraltar">Gibraltar</option>
			<option value="Greece">Greece</option>
			<option value="Greenland">Greenland</option>
			<option value="Grenthere is ">Grenthere is </option>
			<option value="Guadeloupe">Guadeloupe</option>
			<option value="Guam">Guam</option>

			<option value="Guatemala">Guatemala</option>
			<option value="Honduras">Honduras</option>
			<option value="Hong kong">Hong Kong</option>
			<option value="Hungary">Hungary</option>
			<option value="Iceland">Iceland</option>
			<option value="India">India</option>

			<option value="Indonesia">Indonesia</option>
			<option value="Ireland">Ireland</option>
			<option value="Israel">Israel</option>
			<option value="Italy">Italy</option>
			<option value="Jamaica">Jamaica</option>
			<option value="Japan">Japan</option>

			<option value="Jordan">Jordan</option>
			<option value="Kazakhstan">Kazakhstan</option>
			<option value="Kenya">Kenya</option>
			<option value="Korea, South">Korea, South-</option>
			<option value="Kuwait">Kuwait</option>
			<option value="Laos">Laos</option>

			<option value="Latvia">Latvia</option>
			<option value="Lebanon">Lebanon</option>
			<option value="Liechtenstein">Liechtenstein</option>
			<option value="Lithuania">Lithuania</option>
			<option value="Luxembourg">Luxembourg</option>
			<option value="Macau">Macau</option>

			<option value="Macedonia">Macedonia</option>
			<option value="Madagascar">Madagascar</option>
			<option value="Malaysia">Malaysia</option>
			<option value="Maldives">Maldives</option>
			<option value="Malta">Malta</option>
			<option value="Martinique">Martinique</option>

			<option value="Mauritius Island">Mauritius Island</option>
			<option value="Mexico">Mexico</option>
			<option value="Moldova">Moldova</option>
			<option value="Monaco">Monaco</option>
			<option value="Mongolia">Mongolia</option>
			<option value="Montenegro">Montenegro</option>

			<option value="Morocco">Morocco</option>
			<option value="Mozambique">Mozambique</option>
			<option value="Myanmar">Myanmar</option>
			<option value="Namibia">Namibia</option>
			<option value="Nepal">Nepal</option>
			<option value="Netherlands">Netherlands</option>

			<option value="Netherlands Antilles">Netherlands Antilles</option>
			<option value="New Caledonia">New Caledonia</option>
			<option value="New Zealand">New Zealand</option>
			<option value="Nicaragua">Nicaragua</option>
			<option value="Nigeria">Nigeria</option>
			<option value="Northern Mariana Islands">Northern Mariana Islands</option>

			<option value="Norway">Norway</option>
			<option value="Oman">Oman</option>
			<option value="Pakistan">Pakistan</option>
			<option value="Palau">Palau</option>
			<option value="Panama">Panama</option>
			<option value="Papua New Guinea">Papua New Guinea</option>

			<option value="Paraguay">Paraguay</option>
			<option value="Peru">Peru</option>
			<option value="Philippines">Philippines</option>
			<option value="Poland">Poland</option>
			<option value="Portugal">Portugal</option>
			<option value="Puerto Rico">Puerto Rico</option>

			<option value="Qatar">Qatar</option>
			<option value="Reunion Island">Reunion Island</option>
			<option value="Romania">Romania</option>
			<option value="Russia">Russia</option>
			<option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
			<option value="Saint Lucia">Saint Lucia</option>

			<option value="Samoa">Samoa</option>
			<option value="San Marino">San Marino</option>
			<option value="Saudi Arabia">Saudi Arabia</option>
			<option value="Senegal">Senegal</option>
			<option value="Serbia">Serbia</option>
			<option value="Seychelles">Seychelles</option>

			<option value="Singapore">Singapore</option>
			<option value="Slovakia">Slovakia</option>
			<option value="Slovenia">Slovenia</option>
			<option value="South Africa">South Africa</option>
			<option value="South Korea">South Korea</option>
			<option value="Spain">Spain</option>

			<option value="Sri Lanka">Sri Lanka</option>
			<option value="Swaziland">Swaziland</option>
			<option value="Sweden">Sweden</option>
			<option value="Switzerland">Switzerland</option>
			<option value="Syria">Syria</option>
			<option value="Taiwan">Taiwan</option>

			<option value="Tanzania">Tanzania</option>
			<option value="Thailand">Thailand</option>
			<option value="Tonga">Tonga</option>
			<option value="Trinidad Tobago">Trinidad &amp; Tobago</option>
			<option value="Tunisia">Tunisia</option>

			<option value="Turkey">Turkey</option>
			<option value="Turks Caicos Islands">Turks &amp; Caicos Islands</option>
			<option value="Uganda">Uganda</option>
			<option value="Ukraine">Ukraine</option>
			<option value="United Arab Emirates">United Arab Emirates</option>

			<option value="United Kingdom">United Kingdom</option>
			<option value="United States">United States</option>
			<option value="Uruguay">Uruguay</option>
			<option value="Uzbekistan">Uzbekistan</option>
			<option value="Vanuatu">Vanuatu</option>
			<option value="Venezuela">Venezuela</option>

			<option value="Vietnam">Vietnam</option>
			<option value="Virgin Islands British">Virgin Islands (British)</option>
			<option value="Virgin Islands US">Virgin Islands (U.S.)</option>
			<option value="Yemen">Yemen</option>
			<option value="Zambia">Zambia</option>
			<option value="Zimbabwe">Zimbabwe</option>


		</select>  
							  
							  
		    &nbsp;(*)Choose your country </td>
		  </tr>
    						<tr class='kontenform' >
    						  <td><div align="right"><strong>City</strong></div></td>
    						  <td><div align="center"><strong>:</strong></div></td>
    						  <td><input name="city" type="text" id="city" value="<?php 
echo $detail_publicusers->kota ?>">   						      
   						      (*) fill your city </td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td><div align="right"><strong>Address</strong></div></td>
    						  <td><div align="center"><strong>:</strong></div></td>
    						  <td><textarea name="address" cols="50" id="address"><?php 
echo $detail_publicusers->alamat ?></textarea></td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td><div align="center"></div></td>
    						  <td>&nbsp;</td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td><div align="center"></div></td>
    						  <td>
							  <label>
							  	<input name="newsletter" type="checkbox" id="newsletter" <?php 
echo $cek_newsletter ?>>
   						     	 I want to receive email offers and promotions from this web site ( Newsletter )
							    </label>
								 
						      </td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td><div align="right"><strong>Photo</strong></div></td>
    						  <td><div align="center"><strong>:</strong></div></td>
    						  <td>
							  <?php 
echo $form_image_users ?>
							  <input name="file_foto" type="file" id="file_foto">
							  
							  </td>
  						  </tr>


                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>
							  
							  
							  	<label>
									<input name="status" type="checkbox" id="status" <?php 
echo $cek_status ?>>
									 Status Aktif
							    </label>
							  
							  </td>
                            </tr>
                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>
							  
							  	<label>
									<input name="statusbaru" type="checkbox" id="statusbaru" <?php 
echo $cek_statusbaru ?>>
									 Status Baru
							    </label>
							  
							  
							   </td>
                            </tr>
                            <tr class='kontenform' >
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
          <tr class='kontenform' >
	<td><div align='right' ><strong>Password</strong></div></td>
    <td><div align="center"><strong>:</strong></div></td>
    <td><div align='left'>
	<input name='pass1' type='password' id='pass1' size='25' maxlength='10'>
    (*) Maks. 10 Character</div></td>
</tr>
	
   							<tr class='kontenform' >
      							<td><div align='right'><strong>Ulangi Password </strong></div></td>
      							<td><div align="center"><strong> : </strong></div></td>
      							<td>
      
	   							<input name='pass2' type='password' id='pass2'  size='25' maxlength='10'>
	   							(*) </td>
		  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
  						  </tr>
    						<tr class='kontenform' >
    						  <td>&nbsp;</td>
    						  <td>&nbsp;</td>
    						  <td><strong>Notes :</strong>							 Input boxes marked with (*) are required
							  </td>
  						  </tr>
    										<tr class='kontenform' >
      											<td><div align='right'>
														 
		
      											  <input name="passwordlama" type="hidden" id="passwordlama" value="<?php 
echo $detail_publicusers->password ?>">
      											  <input name="id" type="hidden" id="id" value="<?php 
echo $detail_publicusers->id ?>">
      											  <input name="direktori" type="hidden" id="direktori" value="<?php 
echo $detail_publicusers->direktori ?>">
      											  <input name="gambarkecil" type="hidden" id="gambarkecil" value="<?php 
echo $detail_publicusers->gambarkecil ?>">
      											  <input name="gambarbesar" type="hidden" id="gambarbesar" value="<?php 
echo $detail_publicusers->gambarbesar ?>">
      											</div></td>
      											<td valign='top'><div align='center'></div></td>
      											<td valign='top'>
												<input class='button' type='submit' value='<?php 
echo $tombol_submit ?>' name='submit_users'>
												<?php 
echo $tombol_CANCEL ?>
												
												</td>
    										</tr>
	    </table>
</form>




									
									</td>
								</tr>
</table>