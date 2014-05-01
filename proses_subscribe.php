<?php 
session_start();
include('kelas_function.php');
/* proses kirim email */




$SubmitButton = $_POST['SubmitButton'];

if(isset($SubmitButton)){

$id = subscriptionItem_CreateID( $tbl_subscription ); 

$subscribe = htmlspecialchars($_POST['subscribe']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$company = htmlspecialchars($_POST['company']);
$category = htmlspecialchars($_POST['category']);
$jobtitle = htmlspecialchars($_POST['jobtitle']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zipcode = htmlspecialchars($_POST['zipcode']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);

/* Filter INPUT DATA */

	if($subscribe == ""){
		$pesan_error = "Failed sending Messages, please fill your subscribe option.";
		header('location:subscribe-'. $pesan_error . '-msg'. $extention .'');
	}else{
	 
		if($firstname==""){
			$pesan_error = "Failed sending Messages, please enter your name correctly.";
			header('location:subscribe-'. $pesan_error . '-msg'. $extention .'');
		}else{
			 
			if($email==""){
				$pesan_error = "Failed sending Messages, please enter your email correctly.";
				header('location:subscribe-'. $pesan_error . '-msg'. $extention .'');
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
	 
$message = "
subscribe for $subscribe,
name $firstname $lastname, company $company, $category,
Job title $jobtitle, Address $address, city $city, state $state,
postal code $zipcode & phone $phone
"; 


/* KIRIM EMAIL */			
//$penerima_admin = "postmaster@$Config_Domain";

$penerima_admin = "arvinozulka@gmail.com";

$nama = $firtsname . $lastname ;
$email = antiinjeksi($email);

$subject = "Subscribe Magazine" . $Config_CompanyName . subscribe;
$message = antiinjeksi($message);

$pengirim =	"$nama <$email>";

$subject = "$subject";

$headers = "From: $nama <$email>\n";

$NamaFileEmail = "email/kirim_email_subscribe_book.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");

$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));

fclose($fpFILEEMAIL);


$dataemail = ereg_replace("{NAMA}", $nama, $dataemail);  	  		

$dataemail = ereg_replace("{EMAIL}", $email, $dataemail);
$dataemail = ereg_replace("{SUBJECT}", $subject, $dataemail);  	
$dataemail = ereg_replace("{MESSAGE}", $message, $dataemail);  

$dataemail = ereg_replace("{TANGGALHARIINI}", $tanggalhariini, $dataemail);  		
$dataemail = ereg_replace("{JAMSAATINI}", $jamsaatini, $dataemail); 
 		  		
$dataemail = ereg_replace("{CONFIG_COMPANYNAME}", $Config_CompanyName, $dataemail);  
$dataemail = ereg_replace("{CONFIG_SYSTEMURL}", $Config_SystemUrl, $dataemail);  		
$dataemail = ereg_replace("{CONFIG_DOMAIN}", $Config_Domain, $dataemail);  		

$message = $dataemail; 
	
/* Proses Kirim Email Ke pengirim surat dan Administrator */	
$KirimEmailKeAdmin = @mail($penerima_admin, $subject, $message, $headers) ;
$KirimEmailKePengirim = @mail($pengirim_surat, $subject, $message, $headers) ;

 

$pesan_error = "Thank you , we will immediately process your request";
header('location:subscribe-'. $pesan_error . '-msg'. $extention .'');


}}} 
	
}else{

$pesan_error = "Failed Sending Email !, Please Try Again.";
header('location:subscribe-'. $pesan_error . '-msg'. $extention .'');

}

/*
Web Development By Arvino Zulka Harahap
Copyright (c) 2011
*/
?>