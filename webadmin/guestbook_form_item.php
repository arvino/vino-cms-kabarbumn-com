<?php 
$KodeKeamananhalaman  = "token_guestbook";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( $action=="EditData" ){       

$FormguestbookDataItem = "guestbook_proses_item.php?action=item_updatedata";
$SubmitButtonItemguestbook = "UPDATE DATA......";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('guestbook_item.php?id=$id&action=EditData')\" >";

$id = $_GET['id'];

$row_item = modeling_guestbook_item_lihatdetail( $tbl_guestbook, $id );


	if( $row_item->statustampil == "1"){ /* Status Tampil */
		$cek_statustampil = "checked";
	}else{
		$cek_statustampil = "";
	}
		
	
	$e_idusers = $row_item->idusers;
	$e_idadmin = $row_item->idadmin;

 
}


if( $action=="FormEntry" ){

$FormguestbookDataItem = "guestbook_proses_item.php?action=item_tambahdata";
$SubmitButtonItemguestbook = "ADD DATA...";
$Tombol_CANCEL = "<input type='reset' name='reset' value='CANCEL' class='button' onClick=\"javascript:location.replace('guestbook_item.php?action=FormEntry')\" >";

$e_idusers = $sesi_id;
$e_idadmin = $sesi_id;

}
?>
<br>
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
  <tr class='judulform'>
    <td width='100%' height='30'> FORM ENTRY GUEST BOOK / TESTIMONIAL </td>
  </tr>
  <tr class='kontenform'>
    <td>
      <div align='center'>
        <form action='<?php 
echo $FormguestbookDataItem ?>' method='post' enctype="multipart/form-data">
          <table width='100%'  align='center' cellpadding='1' cellspacing='1' class='footerform'>
            <tr>
              <td width='98%'>

 
 
 
<b> Judul : </b> <input name='judul' type='text' id="judul"  value='<?php 
echo strip_tags($row_item->judul) ?>' size='100%'>
(*)<br>
 
 
                    <br>
                  <br>
                  <b> Deskripsi : </b> (*)<br>


                  <textarea name='deskripsi' cols='99%' rows='10' id="content"> <?php 
echo strip_tags($row_item->deskripsi) ?> </textarea>
                  <br>

 
            </p></td>
            </tr>
          </table>
          <hr class='line_box'>
          <table width='98%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td>URUTAN</td>
              <td align="center">:</td>
              <td>


<?php 
$hitung_guestbook = modeling_guestbook_item_all_data_count( $tbl_guestbook );

 if( $action=="EditData" ){
	$urutan_guestbook = $row_item->urutan;
}else{
	$urutan_guestbook = $hitung_guestbook + 1;
}

?>
                <select name='urutan'>
                  <option value='<?php 
echo $urutan_guestbook; ?>'> <?php 
echo $urutan_guestbook; ?></option>
					<?php 
for($i=0; $i<=$hitung_guestbook; $i++){
					?>
                  <option value='<?php 
echo $i ?>'><?php 
echo $i ?></option>
<?php 
}
?>
                </select>


				
              </td>
            </tr>
            <tr>
              <td width="13%">MEMBER</td>
              <td width="4%"><div align="center">:</div></td>
              <td width="83%">
			  
			  
			  
<?php 
if( $action=="EditData" ){
$detail_member = PublicUsers_Select_Detail( $tbl_publicusers, $row_item->idusers );
?>
<select name='idusers'>
<option value='<?php 
echo $detail_member->id ?>'>-- <?php 
echo strtoupper($detail_member->namadepan); ?> <?php 
echo strtoupper($detail_member->namabelakang); ?>  ( <?php 
echo strtoupper($detail_member->namapanggilan); ?> ) ,  <?php 
echo strtolower($detail_member->email); ?>  --</option>
<?php 
$query_member = ListPublicUsers_All( $tbl_publicusers );
while($row_member = mysql_fetch_object( $query_member )){
?>
<option value='<?php 
echo $row_member->id ?>'><?php 
echo strtoupper($row_member->namadepan); ?> <?php 
echo strtoupper($row_member->namabelakang); ?> ( <?php 
echo strtoupper($row_member->namapanggilan); ?> )  ,  <?php 
echo strtolower($row_member->email); ?> </option>
<?php 
}
?>
</select>
<?php 
} else { ?>

<select name='idusers'>
<option value='0'>-- PILIH MEMBER --</option>
<?php 
$query_member = ListPublicUsers_All( $tbl_publicusers );
while($row_member = mysql_fetch_object( $query_member )){
?>
<option value='<?php 
echo $row_member->id ?>'><?php 
echo strtoupper($row_member->namadepan); ?> <?php 
echo strtoupper($row_member->namabelakang); ?> ( <?php 
echo strtoupper($row_member->namapanggilan); ?> )  ,  <?php 
echo strtolower($row_member->email); ?> </option>
<?php 
}
?>
</select>


<?php 
} ?>
(*)			  
			  
			  
			  </td>
            </tr>
             
 
          </table>
          <table width='98%'  border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td>
                <div align='left'>
                  <hr class='line_box'>
              </div></td>
            </tr>
            <tr>
              <td>
                
                   
 
 </td>
            </tr>
          </table>
          <table width='98%'  cellpadding='2' cellspacing='0' border='0'>
            <tr>
              <td>
                <p align='left'>
                  <input type='submit' name='Submit2' value='<?php 
echo $SubmitButtonItemguestbook ?>'>
                  <?php 
echo $Tombol_CANCEL ?> </p></td>
            </tr>
            <tr>
              <td>
                <input name='id' type='hidden'  value='<?php 
echo $row_item->id ?>'>
                <input name='idupline' type='hidden'  value='<?php 
echo $row_item->idupline ?>'>
                <input name='idadmin' type='hidden'  value='<?php 
echo $e_idadmin ?>'>
                <input name="statustampil" type="hidden" value="1">
              </td>
            </tr>
          </table>
          <br>
        </form>
    </div></td>
  </tr>
</table>
<!-- END FORM ITEM -->
               

<?php 
} ?>