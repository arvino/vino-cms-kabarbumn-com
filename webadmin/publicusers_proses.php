<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){

	header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');

}else{

include"kelas_function.php";


if( $action=="publicusers_register" ){  

	$gender = $_POST['gender'];
	$gender = antiinjeksi($gender);
	
	$firstname = $_POST['firstname'];
	$firstname = antiinjeksi($firstname);
	
	$lastname = $_POST['lastname'];
	$lastname = antiinjeksi($lastname);

	$nickname = $_POST['nickname'];
	$nickname = antiinjeksi($nickname);
	
	$email = $_POST['email'];
	$email = antiinjeksi($email);
	
	$ponsel = $_POST['ponsel'];
	$ponsel = antiinjeksi($ponsel);

	$country = $_POST['country'];
	$country = antiinjeksi($country);
	
	$city = $_POST['city'];
	$city = antiinjeksi($city);

	$address = $_POST['address'];
	$address = antiinjeksi($address);
	
	$newsletter = $_POST['newsletter'];
	$newsletter = antiinjeksi($newsletter);

	$status = $_POST['status'];
	$status = antiinjeksi($status);
	
	$statusbaru = $_POST['statusbaru'];
	$statusbaru = antiinjeksi($statusbaru);

	if( $newsletter == "" || $newsletter == "none"){ 
		$newsletter = 0;
	}else{
		$newsletter = 1;
	}		

	if( $status == "" || $status == "none"){ 
		$status = 0;
	}else{
		$status = 1;
	}		

	if( $statusbaru == "" || $statusbaru == "none"){ 
		$statusbaru = 0;
	}else{
		$statusbaru = 1;
	}		

	$agreetos = $_POST['agreetos'];
	$agreetos = antiinjeksi($agreetos);

	if( $agreetos == "" || $agreetos == "none"){ 
		$agreetos = 0;
	}else{
		$agreetos = 1;
	}		

if($gender == ""  || $gender == "none"){
		header('location:publicusers_account.php?pesan_error=Sorry, how do we call you ? Mr OR Mrs ?');
}else{
		
}		

$pass1 = $_POST['pass1'];
$pass1 = antiinjeksi($pass1);

$pass2 = $_POST['pass2'];
$pass2 = antiinjeksi($pass2);

$kodeverifikasi = $_POST['kodeverifikasi'];

$Kode_Verifikasi_Registrasi = $_SESSION['kode_registrasi'];
						
$username = $firstname;

$email = antiinjeksi($email);
$email = strtolower($email);
		
$noponsel = antiinjeksi($ponsel);


if($pass1!=$pass2){
	header('location:publicusers_account.php?pesan_error=password does not match.');
}else{


if (!strlen($username)) {

	header('location:publicusers_account.php?pesan_error=please fill your name');
	
}else{

if (strlen($username) < 3){
	header('location:publicusers_account.php?pesan_error=please fill out the names of more than 3 characters');

}else{

if (eregi('[0-9]', $username)){
	header('location:publicusers_account.php?pesan_error=please fill in your name does not use numbers');

}else{

if (eregi('[!@#$%^&*()_+|=-?>~`/"\"]', $username)){
	header('location:publicusers_account.php?pesan_error=please fill in your name does not use the unique character.');

}else{

																														
if (!strlen($noponsel)){
		header('location:publicusers_account.php?pesan_error=please fill out your phone number.');
}else{

		
if (strlen($noponsel) < 6){										
		header('location:publicusers_account.php?pesan_error=please fill out the phone numbers of more than 6 characters with country code.');
}else{


if (strlen($noponsel) > 18){
		header('location:publicusers_account.php?pesan_error=please fill out one phone number only');
}else{


if (!eregi("[0-9]", $noponsel)){
		header('location:publicusers_account.php?pesan_error=please fill out your phone number with no spaces and unique character');
}else{


if (eregi("[!@#$%^&*()_+|=-?>~`/'\']", $noponsel)){ /* nomor ponsel tidak menggunakan karakter unik */
		header('location:publicusers_account.php?pesan_error=please fill in your phone number does not use the unique character.');
}else{


if (eregi(' ', $noponsel)){ /* nomor ponsel tidak menggunakan spasi */
		header('location:publicusers_account.php?pesan_error=please fill out the phone number does not use spaces');
}else{


if( $email =="" ){ /* email tidak boleh kosong */


}else{ 


	$publicusers_available = modeling_publicusers_checkjumlahemail($tbl_publicusers, $email);

	if($publicusers_available!=0){ /* email tidak boleh sudah pernah terdaftar */

		header('location:publicusers_account.php?pesan_error=This email account has been registered before.');

	}
}

$namadepan = $firstname;
$namabelakang = $lastname;
$namapanggilan = $nickname;
$jeniskelamin = $gender;
$negara = $country;
$kota = $city;
$alamat = $address;

$username = strtolower(potong_judul($firstname));

$username = $username . random_number();

$PUBLICUSERS_ID = modeling_publicusers_createid($tbl_publicusers); /* publik users create id */
				
$id = $PUBLICUSERS_ID; 

$username = strtolower($username);

$email = strtolower($email);

$password = md5($pass2);

$nomoraktifasi = nomoraktifasi();
						
	$idupline = 0; 
	$statusinternal = 0;
	$aksesmodul = "PUBLICUSERS"; 
	$aksesproses = 0; 
	$status = 0; 
	$tanggalaktif = 0;
	$loginterakhir = 0;
	$updateterakhir = 0; 
	$updateusers = 0;
	$kodeaktifasi = $nomoraktifasi; 
	$teraktif = 0; 
	$terpopuler = 0; 
	$hit = 0;

$tanggaldaftar = $tanggalhariini . " , " . $jamsaatini;

$userid = $id;

	$nama_file = $_FILES['file_foto']['name'];
	$temp_file = $_FILES['file_foto']['tmp_name']; 
	$ukuran_file = $_FILES['file_foto']['size'];
	$tipe_file = $_FILES['file_foto']['type'];

	if( $nama_file == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	
		$direktori = $_POST['direktori'];
		$gambarkecil = $_POST['gambarkecil']; 
		$gambarbesar = $_POST['gambarbesar'];
	
	}else{

		$loc_root = "../";	
		$loc_file = "filemodul/publicusers/$username/";
		$location_dir =  $loc_root . $loc_file;
	
		if (!is_dir( $location_dir )){ 
			//Create_Direktori( $location_dir );
			mkdir( $location_dir, 0777 ,true); 
			chmod( $location_dir, 0755);
		}

	
		$uploaddir = $location_dir;
	 
		$Delete_gambaritem_kecil = $loc_root . $direktori . $gambarkecil;
		$Delete_gambaritem_besar = $loc_root . $direktori . $gambarbesar;
	
		$new_name_gg = potong_judul( $username )  . "_big_";
		$new_name_gk = potong_judul( $username )  . "_small_";
	
		$direktori = $loc_file;
	
		$gambarbesar = Resize_Gambar( $new_name_gg, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize=800 );
	
		$gambarkecil = Resize_Gambar( $new_name_gk, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize=400 );

	}


modeling_publicusers_insertdata(
		$tbl_publicusers,
		$id, $idupline, $idfb, $userid, $username,
		$email, $password, $namadepan, $namabelakang, $namapanggilan,
		$jeniskelamin, $noponsel, $gambarkecil, $gambarbesar, $negara,
		$kota, $alamat, $newsletter, $agreetos, $im,
		$aksesmodul, $aksesproses, $status, $statusbaru, $tanggaldaftar,
		$tanggalaktif, $loginterakhir, $updateterakhir, $updateusers, $kodeaktifasi,
		$teraktif, $terpopuler, $direktori, $hit
	);
	
				
				$USERS_IP =	$_SERVER['REMOTE_ADDR'];
				$USERS_BROWSER = $_SERVER['HTTP_USER_AGENT'];
				$USERS_REFERER = $_SERVER['HTTP_REFERER'];
				$USERS_NAMAHOST = $_SERVER['HTTP_HOST'];
				$USERS_PORT = $_SERVER['REMOTE_PORT'];
				$USERS_KONEKSI = $_SERVER['HTTP_CONNECTION'];
				
				$USERS_NAME = $username;
				$USERS_NAME = strtolower($USERS_NAME);
				$USERS_NAME = trim ( str_replace ( $PotongJudul, '_', $USERS_NAME) );
			
				$noponsel =  trim ( str_replace ( $PotongJudul, '', $noponsel) );
				
				$USERS_EMAIL = $email;
				
/* Buat direktori untuk publik users */
controling_publicusers_createdirektori(  
		$direktoribuat
	);				
					$headeremail = "$Config_CompanyName";
					$footeremail = "Copyright (c) 2011";			
				
					$tipeemail = "UsersKirimRegistrasi";
					$JudulEmail = "Registrasi Member Web Site $Config_CompanyName";
					//$JudulEmail = strtoupper($JudulEmail);

					$namapengirim = "Mail System ";
					$emailpengirim = "webmaster@$Config_Domain";

					$namaperusahaan = "$Config_Domain";
					$namasitus = "www.$Config_Domain";

/* Kirim email ke administrator untuk mendapatkan informasi login */
$namapenerima = $firstname;
$emailpenerima = $email;

$pengirim	=	"$namapengirim <$emailpengirim>";
$penerima	=	"$namapenerima <$emailpenerima>";
$subject	=	"$JudulEmail ";
$headers	=	"From: $namapengirim <$emailpengirim>\n";

$NamaFileEmail	=	$link_host . "email/kirim_email_publicusers_pendaftaran.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);
		
$tanggalhariini = harienglish($tanggalhariini) . ", " . bulanenglish($tanggalhariini);	

if( $gender == "male"){ 
		$gender = "Mr.";
}
	
if( $gender == "female"){ 
		$gender = "Mrs.";
}		

$message	=	$dataemail; 

$linkkonfirmasi = $link_host . "public-users-confirm-publicusers_activation" . "-" . $kodeaktifasi . $extention;

$dataemail = ereg_replace("{NAMADOMAIN}", $namasitus, $dataemail);
$dataemail = ereg_replace("{GENDER}", $gender, $dataemail);
$dataemail = ereg_replace("{FIRSTNAME}", $firstname, $dataemail);
$dataemail = ereg_replace("{LASTNAME}", $lastname, $dataemail); 
$dataemail = ereg_replace("{NICKNAME}", $nickname, $dataemail);
$dataemail = ereg_replace("{TANGGALDAFTAR}", $tanggalhariini, $dataemail);
$dataemail = ereg_replace("{USERID}", $PUBLICUSERS_ID, $dataemail);
$dataemail = ereg_replace("{EMAIL}", $email, $dataemail);
$dataemail = ereg_replace("{PASSWORD}", $pass2, $dataemail);
$dataemail = ereg_replace("{LINKKONFIRMASI}", $linkkonfirmasi, $dataemail);
$dataemail = ereg_replace("{NAMAPERUSAHAAN}", $namaperusahaan, $dataemail);
$dataemail = ereg_replace("{EMAILFOOTER}", $footeremail, $dataemail);
$message = $dataemail; 

$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers) ;
$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers);

header('location:publicusers_account.php?pesan_error=Thank you for your registration, please check your email address shortly.');


}
}}}}}}}}}}} /* selesai script php pendaftaran member / public users di halaman  administrator */




if($action == "publicusers_updateprofile"){ /* mulai script php update profile member / publicuser di halaman  administrator */

	$id = $_POST['id'];
	$id = antiinjeksi($id);
	
	$gender = $_POST['gender'];
	$gender = antiinjeksi($gender);
	
	$firstname = $_POST['firstname'];
	$firstname = antiinjeksi($firstname);
	
	$lastname = $_POST['lastname'];
	$lastname = antiinjeksi($lastname);
	
	$nickname = $_POST['nickname'];
	$nickname = antiinjeksi($nickname);
	
	$email = $_POST['email'];
	$email = antiinjeksi($email);
	
	$ponsel = $_POST['ponsel'];
	$ponsel = antiinjeksi($ponsel);
	
	$country = $_POST['country'];
	$country = antiinjeksi($country);
	
	$city = $_POST['city'];
	$city = antiinjeksi($city);
	
	$address = $_POST['address'];
	$address = antiinjeksi($address);
	
	$newsletter = $_POST['newsletter'];
	$newsletter = antiinjeksi($newsletter);

	$status = $_POST['status'];
	$status = antiinjeksi($status);
	
	$statusbaru = $_POST['statusbaru'];
	$statusbaru = antiinjeksi($statusbaru);


	if( $newsletter == "" || $newsletter == "none"){ 
		$newsletter = 0;
	}else{
		$newsletter = 1;
	}		

	if( $status == "" || $status == "none"){ 
		$status = 0;
	}else{
		$status = 1;
	}		

	if( $statusbaru == "" || $statusbaru == "none"){ 
		$statusbaru = 0;
	}else{
		$statusbaru = 1;
	}		


	$agreetos = $_POST['agreetos'];
	$agreetos = antiinjeksi($agreetos);

	if( $agreetos == "" || $agreetos == "none"){ 
		$agreetos = 0;
	}else{
		$agreetos = 1;
	}		



	$nama_file = $_FILES['file_foto']['name'];
	$temp_file = $_FILES['file_foto']['tmp_name']; 
	$ukuran_file = $_FILES['file_foto']['size'];
	$tipe_file = $_FILES['file_foto']['type'];

	$username_pot = potong_judul( $username );
	
	if( $file_foto == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	
		$direktori = $_POST['direktori'];
		$gambarkecil = $_POST['gambarkecil']; 
		$gambarbesar = $_POST['gambarbesar'];
	
	}else{

		$loc_root = "../";	
		$loc_file = "filemodul/users/$tanggalhariini/$username_pot/";
		$location_dir =  $loc_root . $loc_file;
	
		if (!is_dir( $location_dir )){ 
			//Create_Direktori( $location_dir );
			mkdir( $location_dir, 0777 ,true); 
			chmod( $location_dir, 0755);
		}

	
		$uploaddir = $location_dir;
	 
		/* DELETE FILE lama */
		$Delete_gambaritem_kecil = $loc_root . $direktori . $gambarkecil;
		$Delete_gambaritem_besar = $loc_root . $direktori . $gambarbesar;
	
		//@unlink($Delete_gambaritem_kecil);
		//@unlink($Delete_gambaritem_besar);
	
	
		$new_name_gg = potong_judul( $username )  . "_big_";
		$new_name_gk = potong_judul( $username )  . "_small_";
	
		$direktori = $loc_file;
	
		$gambarbesar = Resize_Gambar( $new_name_gg, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize=800 );
	
		$gambarkecil = Resize_Gambar( $new_name_gk, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize=400 );

	}

 	/* Jika password kosong gunakan password yang lama */
	$passwordlama = $_POST['passwordlama'];
	$newpass1 = $_POST['newpass1'];
	$newpass2 = $_POST['newpass2'];

	if( $newpass1!="" AND $newpass2!="" ){ /* Jika text input password kosong lakukan perintah ini */
		
	/* Cek kesamaan password baru */
	 
		if( $newpass1 != $newpass2 ){ /* Jika password tidak sama */
			header("location:publicusers_account.php?action=publicusers_updateprofile&pesan_error=FAILED UPDATE DATA , PASSWORD NOT SAME !"); 
		}else{
			
			$password = md5($newpass2);
			 
		}
		
	}else{
	
		$password = $passwordlama;
	}
	
	$namadepan = $firstname;
	$namabelakang = $lastname;
	$namapanggilan = $nickname;
	$jeniskelamin = $gender;
	$negara = $country;
	$kota = $city;
	$alamat = $address;
	$noponsel = $ponsel;
	 
 
	modeling_PublicUsers_EditProfile(
			$tbl_publicusers , 
			$id, $idupline, $idfb, $userid, $username,
			$email, $password, $namadepan, $namabelakang, $namapanggilan,
			$jeniskelamin, $noponsel, $gambarkecil, $gambarbesar, $negara,
			$kota, $alamat, $newsletter, $agreetos, $im,
			$aksesmodul, $aksesproses, $status, $statusbaru, $tanggaldaftar,
			$tanggalaktif, $loginterakhir, $updateterakhir, $updateusers, $kodeaktifasi,
			$teraktif, $terpopuler, $direktori, $hit
		);
	header("location:publicusers_account.php?id=$id&action=publicusers_updateprofile&pesan_error=UPDATE SUCCESSFULLY... !"); 
	 
} 	 

if( $action=="publicusers_statusaktif" ){ 
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
 	modeling_PublicUsers_StatusAktif( $tbl_publicusers, $statustampil, $tanggalhariini, $jamsaatini, $id );
	header("location:publicusers_account.php?id=". $id ."&action=publicusers_updateprofile&pesan_error=SUCCESS MEMBER ACTIVATION"); 
}
	
if( $action=="publicusers_statusbaru" ){ 
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	modeling_PublicUsers_StatusBaruAktif( $tbl_publicusers , $statustampil, $id );
	header("location:publicusers_account.php?id=". $id ."&action=publicusers_updateprofile&pesan_error=SUCCESS UPDATE MEMBER"); 
}


if($action == "publicusers_updateimage"){
	$id = $_GET['id'];  
	$detail_users = modeling_PublicUsers_Select_Detail( $tbl_publicusers, $id ); 
		
	$root_image = "../";
	$id = $detail_users->id;
	$direktori = $detail_users->direktori;
	$gambarkecil = $detail_users->gambarkecil;
	$gambarbesar = $detail_users->gambarbesar;
	
	$Delete_gambar_kecil = $root_image . $direktori . $gambarkecil;
	$Delete_gambar_besar = $root_image . $direktori . $gambarbesar;
	
	unlink($Delete_gambar_kecil);
	unlink($Delete_gambar_besar);
	
	modeling_PublicUsers_hapusimage( $tbl_publicusers , $id );
	
	header("location:publicusers_account.php?id=". $id ."&action=publicusers_updateprofile&pesan_error=SUCCESS UPDATE IMAGE"); 
}


if($action == "publicusers_hapusdata"){
		$id = $_GET['id'];
		modeling_publicusers_hapusaccount( $tbl_publicusers , $id );
		header("location:publicusers_list.php?action=publicusers_viewall&pesan_error=SUCCESS DELETE DATA"); 
}


if($action == "publicusers_updatepassword"){
		$id = $_POST['id'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		
		if( $pass1 =="" AND $pass2=="" ){
			header("location:publicusers_account.php?id=". $id ."&action=publicusers_updatepassword&pesan_error=PLEASE FILL PASSWORD"); 
		}else{ 
			if($pass1 != $pass2){
				header("location:publicusers_account.php?id=". $id ."&action=publicusers_updatepassword&pesan_error=PASSWORD NOT SAME"); 
			}else{
				$password_reset = md5($pass2);
				modeling_publicusers_update_password_byid( $tbl_publicusers, $id, $password_reset );
				header("location:publicusers_account.php?id=". $id ."&action=publicusers_viewdetail&pesan_error=SUCCESS CHANGE PASSWORD");
			}
		} 
}
 



}
?>