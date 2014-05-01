<?php 
$counter=count($ID_PRODUK);
if($counter == 0){
$pesan_error = "You have not already booked anything.";
?>
<?php 
include('pesan_error.php');?>
<?php 
}else{
	$Checkout=1;
?>

<form action="">
<hr class="line_box">
<div class="box_title_1"> Booking Detail </div> 
<hr class="line_box">
<table width="100%" class="tabelform">
  <tr class="judulform">
    <td width="8%" height="36">No</td>
    <td width="42%">Description</td>
    <td width="14%">Price</td>
    <td width="15%">Qty</td>
    <td width="21%">Amount</td>
  </tr>
<?php 
$counter=count($ID_PRODUK);
  $no=0;
  $totalharga=0;

  for($i=0;$i<$counter;$i++){
  


    $no=$i + 1;
    $totalharga=$totalharga + $JUMLAH_HARGA[$i];
    $produk_qty=$QTY_PRODUK[$i];
    $rp_Harga_Produk=Dollar($HARGA_PRODUK[$i]);
    $rp_Jumlah_Harga=Dollar($JUMLAH_HARGA[$i]);
	
	
	
          $form="<form method='post' action='sc_editpesanitem.php'>";
	  
		  $form.=" <input type='hidden' name='produk_pesan' value='$PESAN_PRODUK[$i]'>";
		  
          $form.="<input type='hidden' name='index' value='$i'>";
		  
		  $form.="<input type='hidden' name='proses' value='edit'>";
		   
		  $form.="<input type='text' size='2' name='produk_qty' value='$QTY_PRODUK[$i]' class='tombol' maxlength='3'>";
          
		  $form.="<input type='submit' name='submit' value='Edit' class='book_submit'>";
                  
          $form.="</form>";
		  


 
?>


  <tr class="kontenform" valign="top">
    <td> 
    	<div align="center"> <?php 
echo $no ?>. </div>
	</td>
    <td> 
		 
		<?php 
echo strtoupper($JUDUL_PRODUK[$i]) ?>
		
	</td>
    <td>  <div align="center"> <?php 
echo $rp_Harga_Produk ?> </div></td>
    <td>  <div align="center"> <?php 
echo $form ?> </div> </td>
    <td>  <div align="right"> <?php 
echo $rp_Jumlah_Harga ?> </div> </td>
  </tr>

<?php 
}
$rp_totalharga=Dollar($totalharga);
?>
  <tr class="kontenform" valign="top">
    <td>  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td> <b> <div align="center"> Total : </div>  </b> </td>
    <td> <b> <div align="right"> <?php 
echo $rp_totalharga ?> </div> </b></td>
  </tr>

</table>

<hr class="line_box">
  
<?php 
}
?>

<?php 
/* Wajib login */ ?>
<?php 
if($sesi_id=="" || $sesi_email=="none"){
?>
<?php 
$pesan_error = "You are required to login to be able to continue the transaction,
or register first if you have not registered.";
include('pesan_error.php');
?>
<br>
<div align="right">
Click here for <a href="<?php 
echo $link_host ?>public-users-login<?php 
echo $extention ?>" class="link_text"> login </a> or click here for <a href="<?php 
echo $link_host ?>public-users-registrasi<?php 
echo $extention ?>" class="link_text"> register </a>.
</div>
<br>
 
<?php 
}else{
?>
<?php 
include('box_form_order.php');?> 
<input name="" type="submit" value="Continue process...">


<?php 
} ?>
</form>
<br>
<br>
