<?php
session_name("CUST");
session_start(); /* CEK SESSION LOGIN */
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
	
		header("location:subscription_main.php?action=FormEntry&pesan_error=PLEASE FILL EMAIL");  
		
	}else{
	
		if( $subscribe == '' ){
		
			header("location:subscription_main.php?action=FormEntry&pesan_error=PLEASE FILL SUBSCRIBE OPTION");  
		
		}else{

			$id = subscriptionItem_CreateID( $tbl_subscription ); 
			
			$subscribe = htmlspecialchars($_POST['subscribe']);
			$firstname = htmlspecialchars($_POST['firstname']);
			$lastname = htmlspecialchars($_POST['lastname']);
				
			$email = htmlspecialchars($_POST['email']);
			
			$tglpost = $tanggalhariini;
			$jampost = $jamsaatini;
			
			$idusers  = $_POST['idusers'];
			$idadmin  = $_POST['idadmin'];
			
			$sql_hitungdata = model_subscription_periksa_email( $tbl_subscription, $email );  
			$hitung_data = mysql_num_rows($sql_hitungdata);
			if( $hitung_data > 0 ){  
			
				header("location:subscription_main.php?action=FormEntry&pesan_error=FAILED ADD DATA , EMAIL ALREADY EXIST !."); 
					
			}else{
			

		subscriptionItem_TambahData(
				$tbl_subscription,
				$id,$subscribe,
				$firstname,$lastname,
				$company,$category,
				$jobtitle,$address,
				$city,$state,
				$zipcode,$phone,
				$email,$tglpost,
				$jampost,$tgltampil,
				$jamtampil,$timeunix,
				$idusers,$idadmin
		);
	 
		header("location:subscription_main.php?action=FormEntry&pesan_error=SUCCESS ADD DATA !."); /* Kembali ke halaman  sebelumnya */ 
}}}}



if( $action=="item_updatedata" ){  

$id = $_POST['id'];

if( $email=='' ){

	header("location:subscription_main.php?id=$id&action=FormEntry&pesan_error=PLEASE FILL EMAIL"); /* Kembali ke halaman  sebelumnya */
	
}else{


			$subscribe = htmlspecialchars($_POST['subscribe']);
			$firstname = htmlspecialchars($_POST['firstname']);
			$lastname = htmlspecialchars($_POST['lastname']);
				
 

			$email= htmlspecialchars($_POST['email']);
			$tglpost = $tanggalhariini;
			$jampost = $jamsaatini;
			$idusers  = $_POST['idusers'];
			$idadmin  = $_POST['idadmin'];

$sql_hitungdata = model_subscription_periksa_email( $tbl_subscription, $email ); 
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ 

	header("location:subscription_main.php?id=$id&action=FormEntry&pesan_error=FAILED ADD DATA, EMAIL ALREADY EXIST !."); /* Kembali ke halaman  sebelumnya */
		
}else{

 
		subscriptionItem_UpdateData( 
		
				$tbl_subscription,
				$id,$subscribe,
				$firstname,$lastname,
				$company,$category,
				$jobtitle,$address,
				$city,$state,
				$zipcode,$phone,
				$email,$tglpost,
				$jampost,$tgltampil,
				$jamtampil,$timeunix,
				$idusers,$idadmin
		
		);
	 
	 
	 	header("location:subscription_main.php?id=$id&action=EditData&pesan_error=SUCCESS UPDATE DATA... !."); /* Kembali ke halaman  sebelumnya */

}}} 



if( $action=="item_hapusdata" ){ 
	$id = $_GET['id'];
	model_subscription_Delete( $tbl_subscription, $id);
	header("location:subscription_main.php?action=FormEntry&pesan_error=SUCCESS DELETE DATA !."); /* Kembali ke halaman  sebelumnya */
} 
	
 
} 
?>