<?php 
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
}else{

include"kelas_function.php";



if( $action=='item_tambahdata' ){  

	$email = check_email($email);

	if( $email=='' ){
	
		header("location:newsletter_main.php?action=FormEntry&pesan_error=PLEASE FILL EMAIL");  
		
	}else{

			$id = newsletterItem_CreateID( $tbl_newsletter ); 
			
			$email = htmlspecialchars($_POST['email']);
			
			
			$tglpost = $tanggalhariini;
			$jampost = $jamsaatini;
			
			$idusers  = $_POST['idusers'];
			$idadmin  = $_POST['idadmin'];
			
			$sql_hitungdata = model_newsletter_periksa_email( $tbl_newsletter, $email );  
			$hitung_data = mysql_num_rows($sql_hitungdata);
			if( $hitung_data > 0 ){  
			
				header("location:newsletter_main.php?action=FormEntry&pesan_error=FAILED ADD DATA , EMAIL ALREADY EXIST !."); 
					
			}else{
			


				newsletterItem_TambahData(
						$tbl_newsletter,
						$id,$email,
						$tglpost,$jampost,
						$tgltampil,$jamtampil,
						$timeunix,$idusers,
						$idadmin
					);
	 
		header("location:newsletter_main.php?action=FormEntry&pesan_error=SUCCESS ADD DATA !."); /* Kembali ke halaman  sebelumnya */ 
}}}  




if( $action=="item_updatedata" ){  

$id = $_POST['id'];

if( $email=='' ){

	header("location:newsletter_main.php?id=$id&action=FormEntry&pesan_error=PLEASE FILL EMAIL"); /* Kembali ke halaman  sebelumnya */
	
}else{

$email= htmlspecialchars($_POST['email']);
$tglpost = $tanggalhariini;
$jampost = $jamsaatini;
$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];

$sql_hitungdata = model_newsletter_periksa_email( $tbl_newsletter, $email ); 
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ 

	header("location:newsletter_main.php?id=$id&action=FormEntry&pesan_error=FAILED ADD DATA, EMAIL ALREADY EXIST !."); /* Kembali ke halaman  sebelumnya */
		
}else{

 
newsletterItem_UpdateData( $tbl_newsletter, $id,$email );
	 
	 
	 	header("location:newsletter_main.php?id=$id&action=EditData&pesan_error=SUCCESS UPDATE DATA... !."); /* Kembali ke halaman  sebelumnya */

}}}/* END item UPDATE */



if( $action=="item_hapusdata" ){ /* Proses Update item*/
	$id = $_GET['id'];
	model_newsletter_Delete( $tbl_newsletter, $id);
	header("location:newsletter_main.php?action=FormEntry&pesan_error=SUCCESS DELETE DATA !."); /* Kembali ke halaman  sebelumnya */
} 
	
 
} 
?>