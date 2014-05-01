<?php 
$KodeKeamananhalaman  = "token_newsletter";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
/* Jika Edit Data  */
if( $action=="EditData" ){       

if($idsubkategori == ""){
$idsubkategori=0;
}                                               
$FormSubmit = "newsletter_proses_item.php?action=item_updatedata";
$SubmitButton = "UPDATE DATA......";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('newsletter_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&id=$id&action=EditData')\" >";

$id = $_GET['id'];

$row_item = newsletterItem_BacaDataDetil( $tbl_newsletter, $id );

	$e_idusers = $row_item->idusers;
	$e_idadmin = $row_item->idadmin;

}


if( $action=="FormEntry" OR !isset($action)  ){

	$FormSubmit = "newsletter_proses_item.php?action=item_tambahdata";
	$SubmitButton = "ADD DATA...";
	$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('newsletter_item.php?idkategori=$idkategori&idsubkategori=$idsubkategori&action=FormEntry')\" >";
	
	$e_idusers = $sesi_id;
	$e_idadmin = $sesi_id;
	
}
?>
<br>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> FORM ENTRY NEWSLETTER </td>
  </tr>
  <tr class='kontenform'>
    <td height="51">
      <div align='center'>
        <form action='<?php 
echo $FormSubmit ?>' method='post' enctype="multipart/form-data">
          <table width='100%'  align='center' cellpadding='1' cellspacing='1' class='footerform'>
            <tr>
              <td width='98%'>
			  
			  
			  
			  
<p>
<b> Email : </b> <input name='email' type='text' id="email"  value='<?php 
echo strip_tags($row_item->email) ?>' size='50'>
<input type='submit' name='Submit2' value='<?php 
echo $SubmitButton ?>'> <?php 
echo $Tombol_CANCEL ?> 
<input name='id' type='hidden'  value='<?php 
echo $row_item->id ?>'>
<input name='idusers' type='hidden'  value='<?php 
echo $e_idusers ?>'>
<input name='idadmin' type='hidden'  value='<?php 
echo $e_idadmin ?>'>
</p>


</td>
            </tr>
          </table>
 
        </form>
    </div>	</td>
  </tr>
</table>
<!-- END FORM ITEM -->
               

<?php 
} ?>