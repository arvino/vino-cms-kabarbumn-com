<?php 
session_name("CUST");
session_start();
include "sc_session.php";
include("kelas_function.php");
/* proses kirim email */



if(isset($_POST['email'])){

			$id = newsletterItem_CreateID( $tbl_newsletter ); 
			
			$email = htmlspecialchars($_POST['email']);
			$name = $_POST['namadepan'];
			
			$namadepan = $_POST['namadepan'];
			$namabelakang = $_POST['namabelakang'];
			$negara = $_POST['negara'];
			
			if($email == "" ){
				
				$pesan_error = "Please fill your email address.";
				header('location: newsletter-'. $pesan_error . '-msg'. $extention );

			}else{ 
			
			$tglpost = $tanggalhariini;
			$jampost = $jamsaatini;
			
			$idusers  = $_POST['idusers'];
			$idadmin  = $_POST['idadmin'];
			
			$sql_hitungdata = model_newsletter_periksa_email( $tbl_newsletter, $email );  
			$hitung_data = mysql_num_rows($sql_hitungdata);
			if( $hitung_data > 0 ){  
			
				$pesan_error = "You are already subscribed.";
				header('location:newsletter-'. $pesan_error . '-msg'. $extention );
				
			}else{


			newsletterItem_TambahData(
					$tbl_newsletter,
					$id, $email, $namadepan, $namabelakang, $negara,
					$tglpost,$jampost,
					$tgltampil,$jamtampil,
					$timeunix,$idusers,
					$idadmin
				);
				
	 
		$message = "
		By subscribing to newsletters on this page you may receive commercial messages from $Config_CompanyName. Commercial messages may be promoting services, events 
		or new products targeting the executives in the region at the discretion of $Config_CompanyName.
		
		Commercial messages will however always be from reputed companies and only offering services that have been verified to actually exist by $Config_CompanyName at the time of sending the message.
		
		Your contact details or your email address will not be made available to any third party, please consult our Privacy Policy for additional information.
		
		If you wish to unsubscribe please contact us on our contact page, please include your reasons.
		"; 


/* KIRIM EMAIL */			
//$penerima_admin = "postmaster@$Config_Domain";

$penerima_admin = "arvinozulka@gmail.com";

$nama = "Guest ". $email;
$email = antiinjeksi($email);

$subject = "Subcribe Newsletter ";
$message = antiinjeksi($message);

$pengirim =	"$name <$email>";

$subject = "$subject";

$headers = "From: $name <$email>\n";

$NamaFileEmail = "email/kirim_email_subscribe_newsletter.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");

$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));

fclose($fpFILEEMAIL);




$dataemail = ereg_replace("{NAMA}", $name, $dataemail);  	  		

$dataemail = ereg_replace("{EMAIL}", $email, $dataemail);
$dataemail = ereg_replace("{SUBJECT}", $subject, $dataemail);  	
$dataemail = ereg_replace("{MESSAGE}", $message, $dataemail);  

$dataemail = ereg_replace("{TANGGALHARIINI}", bulanenglish($tanggalhariini), $dataemail);  		
$dataemail = ereg_replace("{JAMSAATINI}", $jamsaatini, $dataemail); 
 		  		
$dataemail = ereg_replace("{CONFIG_COMPANYNAME}", $Config_CompanyName, $dataemail);  
$dataemail = ereg_replace("{CONFIG_SYSTEMURL}", $Config_SystemUrl, $dataemail);  		
$dataemail = ereg_replace("{CONFIG_DOMAIN}", $Config_Domain, $dataemail);  		

$message = $dataemail; 
	
/* Proses Kirim Email Ke pengirim surat dan Administrator */	
$KirimEmailKeAdmin = @mail($penerima_admin, $subject, $message, $headers) ;
$KirimEmailKePengirim = @mail($pengirim_surat, $subject, $message, $headers) ;

 

$pesan_error = "Thank you , we will immediately process your request";
header('location:newsletter-'. $pesan_error . '-msg'. $extention .'');


}}
	
}else{

$pesan_error = "Failed Sending Email !, Please Try Again.";
header('location:newsletter-'. $pesan_error . '-msg'. $extention );

}

/*
Web Development By Arvino Zulka Harahap
Copyright (c) 2011
*/
?>