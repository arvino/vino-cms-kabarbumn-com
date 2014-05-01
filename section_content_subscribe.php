

<div id="Left">

 
        
<?php include('sidebar-left.php'); ?>
        
<div id="Content">


<?php 
include('pesan_error.php'); ?>
		
		<div class="kategori_title"> SUBSCRIBE TODAY AND SAVE 25% OFF NEWS STAND PRICE </div>
		<hr class="line_box">

		<div class="item_description_pagedetail">
	
		 
		</div>
	
	
	
          <hr>


 
			  
			   FORM SUBSCRIPTION FOR MAGAZINE
			  
			  <hr>
			  
                <form action='<?php 
echo $link_host ?>process-subscribe<?php 
echo $extention ?>' method='post' name='FormUsersRegister' id='FormUsersRegister'>
				
				
                  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="25%">&nbsp;</td>
                      <td width="3%">&nbsp;</td>
                      <td width="72%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>
                        <div align="right"><span class="form_element cf_dropdown">
                          <label>Please select subscription</label>
                      </span></div></td>
                      <td>
                        <div align="center">:</div></td>
                      <td>
                        <select name="subscribe" title="" size="1">
                           
                          <option value="">Choose Option</option>
                          
                          <option value="Subscribe_Magazine"> Subscribe Magazine </option>
                        </select>
					    </td>
                    </tr>
                    <tr>
                      <td><div align="right">Firstname</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="firstname" type="text"  id="firstname" title="" value="<?php 
echo $row_item->firstname ?>" size="30" maxlength="150" />
                      </span>
					  
					   </td>
                    </tr>
                    <tr>
                      <td><div align="right">Lastname</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="lastname" type="text"  id="lastname" title="" value="<?php 
echo $row_item->lastname ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">Company</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="company" type="text"  id="company" title="" value="<?php 
echo $row_item->company ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">Category</div></td>
                      <td><div align="center">:</div></td>
                      <td>
                        <select name="category">
                           
                          <option value="">Choose Option</option>
                           
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
                        </select>                        </td>
                    </tr>
                    <tr>
                      <td><div align="right">Job Title </div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="jobtitle" type="text"  id="jobtitle2" title="" value="<?php 
echo $row_item->jobtitle ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">Address</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="address" type="text"  id="address2" title="" value="<?php 
echo $row_item->address ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">City</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="city" type="text"  id="city2" title="" value="<?php 
echo $row_item->city ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">State</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="state" type="text"  id="state" title="" value="<?php 
echo $row_item->state ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">Zip/Postal Code </div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="zipcode" type="text"  id="zipcode" title="" value="<?php 
echo $row_item->zipcode ?>" size="30" maxlength="150" />
                        </span></td>
                    </tr>
                    <tr>
                      <td><div align="right">Phone Number </div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="phone" type="text"  id="phone" title="" value="<?php 
echo $row_item->phone ?>" size="30" maxlength="150" />
                        <span style="padding-left:2px;color:#666;">Eg. country code &ndash; area code &ndash; phone number</span> 
						
						</span>						</td>
                    </tr>
                    <tr>
                      <td><div align="right">Email</div></td>
                      <td><div align="center">:</div></td>
                      <td><span class="form_element cf_textbox">
                        <input name="email" type="text"  id="email" title="" value="<?php 
echo $row_item->email ?>" size="30" maxlength="150" />
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
                        <input name='SubmitButton' type='submit' id="SubmitButton" value='Submit' class="button">
                       
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                </form>
			  
			
</div>
</div>
<?php include('sidebar-right.php'); ?>