<?php 
$KodeKeamananhalaman  = "token_subscription";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( $action=="EditData" ){       

if($idsubkategori == ""){
	$idsubkategori=0;
}                                               
	$FormSubmit = "subscription_proses_item.php?action=item_updatedata";
	$SubmitButton = "UPDATE DATA......";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('subscription_main.php?id=$id&action=EditData')\" >";
	
	$id = $_GET['id'];
	
	$row_item = subscriptionItem_BacaDataDetil( $tbl_subscription, $id );

	$e_idusers = $row_item->idusers;
	$e_idadmin = $row_item->idadmin;

}


if( $action=="FormEntry" OR !isset($action)  ){

	$FormSubmit = "subscription_proses_item.php?action=item_tambahdata";
	$SubmitButton = "ADD DATA...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('subscription_main.php?action=FormEntry')\" >";
	
	$e_idusers = $sesi_id;
	$e_idadmin = $sesi_id;
	
}
?>
<br>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> FORM SUBSCRIPTION </td>
  </tr>
  <tr class='kontenform'>
    <td height="51">
	
	
	
      <div align='center'>
	  

        <form action='<?php 
echo $FormSubmit ?>' method='post' enctype="multipart/form-data">
		
          <table width='100%'  align='center' cellpadding='1' cellspacing='1' >
            <tr>
              <td width='98%'>
			  
			  
			  
			  
			  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="29%">&nbsp;</td>
                  <td width="4%">&nbsp;</td>
                  <td width="67%">&nbsp;</td>
                </tr>
                <tr>
                  <td>
				  
				  
				  <div align="right"><span class="form_element cf_dropdown">
                    <label>Please select subscription</label>
                  </span></div>
				  
				  
				  </td>
                  <td>
				  
				  <div align="center">:</div>
				  
				  
				  </td>
                  <td> 
                    <select name="subscribe" title="" size="1">
					
					<?php 
if($action=='EditData'){
					?>
					
					<option value="<?php 
echo $row_item->subscribe ?>"><?php 
echo $row_item->subscribe ?></option>
					
					<?php 
}else{
					
					?>
                      <option value="">Choose Option</option>
					  
					 <?php 
} ?> 
                     
					  <option value="Subscription Package 1 Magazine"> Subscription Package 1 Magazine </option>
					  
                    </select>
                
				
				
				</td>
                </tr>
                <tr>
                  <td><div align="right">Firstname</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="firstname" type="text"  id="firstname" title="" value="<?php 
echo $row_item->firstname ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">Lastname</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="lastname" type="text"  id="lastname" title="" value="<?php 
echo $row_item->lastname ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">Company</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="company" type="text"  id="company" title="" value="<?php 
echo $row_item->company ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">Category</div></td>
                  <td><div align="center">:</div></td>
                  <td>
				  
				  
                    <select name="category">
					<?php 
if($action == 'EditData'){
					?>
					
					<option value="<?php 
echo $row_item->category ?>"> <?php 
echo $row_item->category ?> </option>
					
					<?php 
}else{
					
					?>
                      <option value="">Choose Option</option>
					 
					 <?php 
} ?>
					 
                      <option value="Accessories, Jewelry and Watches">Accessories, Jewelry and Watches</option>
                      <option value="Agency/Media Buyer">Agency/Media Buyer</option>
                      <option value="Apparel">Apparel</option>
                      <option value="Art">Art</option>
                      <option value="Auto">Auto</option>
                      <option value="Beauty, Grooming and Fragrances">Beauty, Grooming and Fragrances</option>
                      <option value="Design/Interior/Exterior">Design/Interior/Exterior</option>
                      <option value="Electronics">Electronics</option>
                      <option value="Entertainment/Events">Entertainment/Events</option>
                      <option value="Footwear">Footwear</option>
                      <option value="Gaming">Gaming</option>
                      <option value="Liquor">Liquor</option>
                      <option value="Packaged Goods">Packaged Goods</option>
                      <option value="Retail">Retail</option>
                      <option value="Technology">Technology</option>
                      <option value="Tobacco">Tobacco</option>
                      <option value="Travel">Travel</option>
                      <option value="Other (fill-in)">Other (fill-in)</option>
                    </select>
                 
				 
				 </td>
                </tr>
                <tr>
                  <td><div align="right">Job Title </div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="jobtitle" type="text"  id="jobtitle2" title="" value="<?php 
echo $row_item->jobtitle ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="address" type="text"  id="address2" title="" value="<?php 
echo $row_item->address ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">City</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="city" type="text"  id="city2" title="" value="<?php 
echo $row_item->city ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">State</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="state" type="text"  id="state" title="" value="<?php 
echo $row_item->state ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">Zip/Postal Code </div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="zipcode" type="text"  id="zipcode" title="" value="<?php 
echo $row_item->zipcode ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td><div align="right">Phone Number </div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="phone" type="text"  id="phone" title="" value="<?php 
echo $row_item->phone ?>" size="30" maxlength="150">
                    <span style="padding-left:2px;color:#666;">Eg. country code &ndash; area code &ndash; phone number</span> </span></td>
                </tr>
                <tr>
                  <td><div align="right">Email</div></td>
                  <td><div align="center">:</div></td>
                  <td><span class="form_element cf_textbox">
                    <input name="email" type="text"  id="email" title="" value="<?php 
echo $row_item->email ?>" size="30" maxlength="150">
                  </span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>
				  

<input name='SubmitButton' type='submit' id="SubmitButton" value='<?php 
echo $SubmitButton ?>'> 
<?php 
echo $Tombol_CANCEL ?> 
<input name='id' type='hidden'  value='<?php 
echo $row_item->id ?>'>
<input name='idusers' type='hidden'  value='<?php 
echo $e_idusers ?>'>
<input name='idadmin' type='hidden'  value='<?php 
echo $e_idadmin ?>'>


				  
				  
				  
				  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table> </td>
            </tr>
          </table>
 
        </form>
    </div>	</td>
  </tr>
</table>
<!-- END FORM ITEM -->
               

<?php 
} ?>