<?php 
$KodeKeamananhalaman  = "token_guestbook";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
$id = $_GET['id'];
 
$row_item = modeling_guestbook_item_lihatdetail( $tbl_guestbook, $id );
$row_user_posting = Users_Select_Detail( $tbl_users, $row_item->idusers );

$detail_item_guestbook = modeling_guestbook_item_lihatdetail( $tbl_guestbook, $id );
$Link_Judul = potong_judul($data_terkait->judul);
 
	if( $row_item->statustampil == "1"){ /* Status Tampil */
		$cek_statustampil = "Tampil";
	}else{
		$cek_statustampil = "Tidak Tampil";
	}
	
$e_idusers = $row_item->idusers;
$e_idadmin = $row_item->idadmin;

?>

 <span class="JudulKanal_box1">DETAIL  TESTIMONIAL / GUEST BOOK  </span>
                    <hr class='line_box'>
					<br>

<div class="Font_Item_Judul"><?php 
echo stripslashes($row_item->judul) ?>
</div>


<?php 
echo harienglish($row_item->tglpost) ?>, <?php 
echo bulanenglish($row_item->tglpost) ?> | <?php 
echo $row_item->jampost ?>



<div class='isiguestbook'>
<?php 
echo htmlspecialchars_decode($row_item->deskripsi) ?>
</div>

 

 

 

<?php 
} ?>