<?php 
if($sesi_modul_search==""){

	$opsi_pilihan_modul_cari = "

		<label> <input type='radio' name='RadioGroup_FormSearch' value='News' checked> News </label> | 
		<label> <input type='radio' name='RadioGroup_FormSearch' value='Otherpage' > Others </label>   

	";

}else{

if($sesi_modul_search=="News"){

	$opsi_pilihan_modul_cari = "

		<label> <input type='radio' name='RadioGroup_FormSearch' value='News' checked> News </label>  | 
		<label> <input type='radio' name='RadioGroup_FormSearch' value='Otherpage' > Others </label>  


	";

}


if($sesi_modul_search=="Otherpage"){

	$opsi_pilihan_modul_cari = "
		<label> <input type='radio' name='RadioGroup_FormSearch' value='News' > News </label>  | 
		<label> <input type='radio' name='RadioGroup_FormSearch' value='Otherpage' checked> Others </label>  
	";
}

}

?>
<table width="100%" height="10"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0" >
      <tr valign="middle">
        <td valign="middle">

<div align="center">

<form name="form_search_detail" method="post" action="<?php 
echo $link_host ?>search-data<?php 
echo $extention ?>" class="form">
 <?php 
echo $opsi_pilihan_modul_cari ?>
 
<input name="form_search" type="text"  value="Search Data..." size="45" maxlength="20" 
onfocus="if (this.value == 'Search Data...') this.value = '';" onBlur="if (this.value == '') this.value = 'Search Data...';">
                
                
<input type="submit" name="Submit"  class="submit" value="Go..">
<br>


 
</form>
 
</div>



		</td>
      </tr>
</table>	
 
<div id="separator"></div>