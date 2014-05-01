<?php 
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];

/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
if( $sesi_id == "" ){
	
	header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');

}else{
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
include"kelas_function.php";


/* PROSES UPDATE DATA... USERS GANTI PASSWORD *//***************************************/
if( $action == "users_gantipassword" ){

	$Kode_UsersGantiPassword = $_SESSION['Kode_GantiPassword'];
	$email = antiinjeksi($email);
	$email = strtolower($email);
	$password = antiinjeksi($password);
	$pass1 = antiinjeksi($pass1);
	$pass2 = antiinjeksi($pass2);



if( $pass1 != $pass2 ){
header('location:users_account.php?action=Users_UpdatePassword&pesan_error=PASSWORD NOT SAME');
}else{
if( $email == "" ){
header('location:users_account.php?action=Users_UpdatePassword&pesan_error=PLEASE FILL PIN');
}else{

/*
if(!check_email($email)) {

$pesan_error = "there are errors in the writing of an email address";
header('location:users_account.php?action=Users_UpdatePassword&pesan_error=there are errors in the writing of an email address');
}else{
*/



if( $kodeverifikasi == '' ){
header('location:users_account.php?action=Users_UpdatePassword&pesan_error=PLEASE FILL VERIFICATION CODE');	
}else{
if( $kodeverifikasi != $Kode_UsersGantiPassword ){
header('location:users_account.php?action=Users_UpdatePassword&pesan_error=KODE VERIFIKASI TIDAK SESUAI.');
}else{
/* Syarat ganti password harus status = 1 dan status internal = 1*/
			$sql = "SELECT *

			FROM $tbl_users
			
			WHERE email = '$email'  
			AND  status = '1'
			AND statusinternal = '1'
			
	        ";
			$Auth_Result = mysql_query($sql);


// Populate session variables with data base results
if (mysql_num_rows($Auth_Result) == 0) {
 
header('location:users_account.php?action=Users_UpdatePassword&pesan_error=YOU CAN NOT CHANGE PASSWORD, YOUR STATUS NOT ACTIVE');


}else{

$cek_pass = md5($password);
/* Syarat ganti password 2 harus username dan password sama */
			$sql = "SELECT *

			FROM $tbl_users
			
			WHERE email = '$email'  
			AND  status = '1'
			AND statusinternal = '1'
			AND password = '$cek_pass'
			
	        ";
			$Auth_Result = mysql_query($sql);


if (mysql_num_rows($Auth_Result) == 0) {

header('location:users_account.php?action=Users_UpdatePassword&pesan_error=NIK DAN PASSWORD TIDAK SESUAI.');


}else{

$myObject = mysql_fetch_object($Auth_Result);
			
$password_reset = $pass2;

					/* Ambil Data */
					$Detail_Users_Change_Password = Users_Select_Detail_For_ChangePassword( $tbl_users, $email );
					$users_id = $Detail_Users_Change_Password->id;
					$users_email = $Detail_Users_Change_Password->email;
					$users_nama = $Detail_Users_Change_Password->username;
					$users_nik = $Detail_Users_Change_Password->idpegawai;
					$users_status = $Detail_Users_Change_Password->status;

					/* Kirim Email */

					$headeremail = "$Config_CompanyName";
					$footeremail = "Copyright (c) 2010";			
				
					$tipeemail = "UsersKirimGantiPassword";
					$JudulEmail = "Ganti Password $Config_CompanyName";
				
					$namapenerima = $myObject->username;
					$emailpenerima = $myObject->email;

					$namapengirim = "Mail System $Config_CompanyName";
					$emailpengirim = "webmaster@$Config_Domain";

					$namaperusahaan = "$Config_Domain";
					$namasitus = "www.$Config_Domain";


					/* Kirim Email Aktifasi Pendaftaran Ke Users */
					/*
					Users_KirimEmail( 
				
						$lokasiurl, $tipeemail, $tanggalhariini, $jamsaatini, $namasitus, 
						$headeremail, $footeremail, $JudulEmail, $namapenerima, $emailpenerima, 
						$namapengirim, $emailpengirim, $namaperusahaan, $password_reset
				
					);
				*/
				
$pengirim	=	"$namapengirim <$emailpengirim>";
$penerima	=	"$namapenerima <$emailpenerima>";
$subject	=	"$JudulEmail ";
$headers	=	"From: $namapengirim <$emailpengirim>\n";

$NamaFileEmail	=	"function/kirim_email_users_ganti_password.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);
	
/* VARIABEL Pthere is TEMPLATES EMAIL PENDAFTARAN */
$dataemail = ereg_replace("{HEADERMAIL}", $headeremail, $dataemail);  	  		
$dataemail = ereg_replace("{NAMAPERUSAHAAN}", $namaperusahaan, $dataemail);
$dataemail = ereg_replace("{NAMASITUS}", $namasitus, $dataemail);
$dataemail = ereg_replace("{LOKASIURL}", $lokasiurl, $dataemail);  	
$dataemail = ereg_replace("{TANGGALHARIINI}", $tanggalhariini, $dataemail);  
$dataemail = ereg_replace("{JAMSAATINI}", $jamsaatini, $dataemail);  		  		
$dataemail = ereg_replace("{USERSNAMA}", $namapenerima, $dataemail);	

/* VARIABEL Pthere is TEMPLATES EMAIL PENDAFTARAN */
$dataemail = ereg_replace("{LINKAKTIFASI}", $linkaktifasi, $dataemail); 	
$dataemail = ereg_replace("{LINKALTERNATIFAKTIFASI}", $linkalternatifaktifasi, $dataemail);
$dataemail = ereg_replace("{USERSEMAIL}", $emailpenerima, $dataemail);
$dataemail = ereg_replace("{NIKUSERS}", $users_nik, $dataemail);
$dataemail = ereg_replace("{USERSPASSWORD}", $password_reset, $dataemail);
$dataemail = ereg_replace("{NOMORAKTIFASI}", $idrandom, $dataemail);
				
$dataemail = ereg_replace("{FOOTERMAIL}", $footeremail, $dataemail);  	
	
$message	=	$dataemail; 
	
$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers) ;
$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers) ;

/* UPDATE DATA... */
$password_reset2 = $password_reset;
$password_reset = md5($password_reset);
			
Users_Update_Detail_For_ChangePassword( $tbl_users, $email, $password_reset , $tanggalhariini, $jamsaatini  );

$statustampil = "7";
Users_StatusBaruAktif( $tbl_users , $statustampil, $users_id );


/* Simpan Tanggal Aktifasi Users */
if( $Detail_Users_Change_Password->statusbaru=="0" || $Detail_Users_Change_Password->statusbaru=="" ){
	 
	update_users_aktif_log( $tbl_users, $tanggalhariini , $jamsaatini , $users_id );
	
} 


//session_destroy();
header('location:users_logout.php?pesan_error=SUCCESS CHANGE PASSWORD  , PLEASE LOGIN AGAIN.');

}
}}}}}} 
/* End Users Ganti Password */





	/* Proses Internal Users Status Internal  *//* Proses Users Internal STATUS */
	if( $action=="usersaccount_statusinternal" ){ 

			$id = $_GET['id'];
			$statustampil = $_GET['status'];
			Users_StatusInternal( $tbl_users, $statustampil, $id );
			header("location:users_main.php?pesan_error=SUCCESS ACTIVATION USERS"); 
	
	}


	/* Proses Internal Users Status Aktif */
	if( $action=="usersaccount_statusaktif" ){ 

			$id = $_GET['id'];
			$statustampil = $_GET['status'];
			Users_StatusAktif( $tbl_users, $statustampil, $tanggalhariini, $jamsaatini, $id );
			header("location:users_main.php?pesan_error=SUCCESS ACTIVATION USER"); 

	}
	
	
	
	/* Proses Internal Users Status Baru */
		if( $action=="usersaccount_statusbaru" ){ 

			$id = $_GET['id'];
			$statustampil = $_GET['status'];
			Users_StatusBaruAktif( $tbl_users , $statustampil, $id );
			header("location:users_main.php?pesan_error=SUCCESS ACTIVATION NEW USER"); 

	}





if($action == "usersaccount_hapusdata"){
		$id = $_GET['id'];
		Users_hapusaccount( $tbl_users , $id );
		header("location:users_list.php?action=Users_ViewList&pesan_error=SUCCESS DELETE DATA"); 
}








/* Users Account Update Profile  / List users update account */
if($action == "usersaccount_updateprofile"){
 
	$nama_file = $_FILES['image_foto']['name'];
	$temp_file = $_FILES['image_foto']['tmp_name']; 
	$ukuran_file = $_FILES['image_foto']['size'];
	$tipe_file = $_FILES['image_foto']['type'];

	$username_pot = potong_judul( $username );
	
	if( $image_foto == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	
		
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
	
	if( $newpass1=="" AND $newpass2=="" ){ /* Jika text input password kosong lakukan perintah ini */
		$password = $passwordlama;
	}else{
	/* Cek kesamaan password baru */
	 
		if( $newpass1 != $newpass2 ){ /* Jika password tidak sama */
			header("location:users_account.php?id=". $id ."&action=Users_FormEntry&pesan_error=GAGAL UPDATE DATA... USERS , PASSWORD TIDAK SAMA !"); 
		}else{
		
			/* Jika password SUCCESS lakukan perintah ini */
			$newpass2 = strtolower($newpass2);
			$password = md5($newpass2);
			header('location:users_logout.php?pesan_error=SUCCESS CHANGE PASSWORD , PLEASE LOGIN AGAIN');
			/* Jika SUCCESS ganti password pthere is saat update profile logout */
				
		}
	}
	/* Jika password terisi maka ganti password */
	Users_EditProfile(
	
		$tbl_users , 
		$id, $idupline, $idfb, $idpegawai,
		$username, $email, $password,
		$noponsel, $gambarkecil, $gambarbesar,
		$im, $namaperusahaan, $kantorcabang,
		$jabatan, $divisi, $alamat,
		$statusinternal, $aksesmodul, $aksesproses,
		$status, $tanggaldaftar, $tanggalaktif,
		$loginterakhir, $updateterakhir, $updateusers,
		$kodeaktifasi, $teraktif, $terpopuler,
		$direktori, $hit
	
	);

	header("location:users_account.php?id=". $id ."&action=Users_FormEntry&pesan_error=UPDATE SUCCESSFULLY... !");  

} /* Selesai proses users edit profile */





/* Users yang sedang login ganti profile */
if($action == "user_editprofile"){

	$nama_file = $_FILES['image_foto']['name'];
	$temp_file = $_FILES['image_foto']['tmp_name']; 
	$ukuran_file = $_FILES['image_foto']['size'];
	$tipe_file = $_FILES['image_foto']['type'];

	$username_pot = potong_judul( $username );
	
	if( $image_foto == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	
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
			header("location:users_account.php?action=Users_UpdateProfile&pesan_error=GAGAL UPDATE DATA... USERS , PASSWORD TIDAK SAMA !"); 
		}else{
		
			/* Jika password SUCCESS lakukan perintah ini */
			$newpass2 = strtolower($newpass2);
			$password = md5($newpass2);
			
			header("location:users_logout.php?pesan_error=SUCCESS CHANGE PASSWORD , PLEASE LOGIN AGAIN.");
			/* Jika SUCCESS ganti password pthere is saat update profile logout */

		}
		
	}else{
	
		$password = $passwordlama;
	}
	
	 
	/* Jika password terisi maka ganti password */
 
	Users_EditProfile( /* UPDATE DATA... profile */
		$tbl_users , 
		$id, $idupline, $idfb, $idpegawai,
		$username, $email, $password,
		$noponsel, $gambarkecil, $gambarbesar,
		$im, $namaperusahaan, $kantorcabang,
		$jabatan, $divisi, $alamat,
		$statusinternal, $aksesmodul, $aksesproses,
		$status, $tanggaldaftar, $tanggalaktif,
		$loginterakhir, $updateterakhir, $updateusers,
		$kodeaktifasi, $teraktif, $terpopuler,
		$direktori, $hit
	);

	header("location:users_account.php?action=Users_UpdateProfile&pesan_error=UPDATE SUCCESSFULLY... !"); 
	/*  header("location:users_account.php?id=". $id ."&action=Users_FormEntry");   */
} 	/* Proses Users Edit Profile */






/* Users account Delete image */
if($action == "usersaccount_Deleteimage"){
	$id = $_GET['id']; /* Ambil ID Users */
	$detail_users = Users_Select_Detail( $tbl_users, $id ); /* Ambil data detail users */
		
	$root_image = "../";
	$id = $detail_users->id;
	$direktori = $detail_users->direktori;
	$gambarkecil = $detail_users->gambarkecil;
	$gambarbesar = $detail_users->gambarbesar;
	
	$Delete_gambar_kecil = $root_image . $direktori . $gambarkecil;
	$Delete_gambar_besar = $root_image . $direktori . $gambarbesar;
	
	unlink($Delete_gambar_kecil);
	unlink($Delete_gambar_besar);
	
	Users_hapusimage( $tbl_users , $id ); /* Delete gambarkecil & gambarbesar */
		
	header("location:users_account.php?id=". $id ."&action=Users_FormEntry"); 
}




/* ***** PROSES REGISTRASI USERS *********** */
if( $action=="users_register" ){ /* Proses Registari Users */

$Kode_Verifikasi_Registrasi = $_SESSION['kode_registrasi'];
						
$username = antiinjeksi($username);
$username = strtoupper($username);

$email = antiinjeksi($email);
$email = strtolower($email);
		
$noponsel = antiinjeksi($noponsel);

if( $kodeverifikasi == '' ){

		header('location:users_account.php?pesan_error=PLEASE FILL VERIFICATION CODE');
		
}else{

if( $kodeverifikasi != $_SESSION['kode_registrasi'] )	{
		header('location:users_account.php?pesan_error=CODE VERIFICATION THAT YOU FILL NOT SAME');
}else{

if (!strlen($username)) {

	header('location:users_account.php?pesan_error=PLEASE FILL YOUR NAME');
	
}else{


if (strlen($username) < 3){
	header('location:users_account.php?pesan_error=PLEASE FILL NAME MORE THAN 3 CHARACTERS AND NOT MORE THAN 100 CHARACTERS.');

}else{

if (eregi('[0-9]', $username)){
	header('location:users_account.php?pesan_error=PLEASE NAME WITHOUT NUMERIC CONTENTS');

}else{

if (eregi('[!@#$%^&*()_+|=-?>~`/"\"]', $username)){
	header('location:users_account.php?pesan_error=PLEASE NAME WITHOUT CHARACTER UNIQUE CONTENT LIKE THIS : !@#$%^&*()_+|=-?>~`/\"\"');

}else{
																														
if (!strlen($noponsel)){
		header('location:users_account.php?pesan_error=HARAP ISI NO. PONSEL.');
}else{
		
if (strlen($noponsel) < 6){										
		header('location:users_account.php?pesan_error=HARAP ISI NO PONSEL LEBIH DARI 6 digit angka + Kode Area ( Jika CDMA ).');
}else{

if (strlen($noponsel) > 15){
		header('location:users_account.php?pesan_error=HARAP ISI NO PONSEL 1 ( SATU ) NOMOR SAJA.');
}else{


if (!eregi("[0-9]", $noponsel)){
		header('location:users_account.php?pesan_error=HARAP ISI NO PONSEL DENGAN ANGKA TANPA SPASI / KARAKTER UNIK.');
}else{

if (eregi("[!@#$%^&*()_+|=-?>~`/'\']", $noponsel)){
		header('location:users_account.php?pesan_error=HARAP ISI NO. PONSEL DENGAN ANGKA DAN TIDAK MENGGUNAKAN SPASI. CONTOH : 02171000xxx ');
}else{


if (eregi(' ', $noponsel)){

		header('location:users_account.php?pesan_error=HARAP ISI NO. PONSEL TIDAK MENGGUNAKAN SPASI. CONTOH : 02171000xxx ');

}else{


if( $_POST['email'] =="" ){ /* Jika text input email kosong lakukan perintah ini */
	
	header('location:users_account.php?pesan_error=HARAP ISI EMAIL ANDA ');

}else{ 

$email = $_POST['email'];

$Users_Available = Users_CheckJumlahEmail($tbl_users, $email); /* alamat email tidak boleh lebih dari satu */ 

if($Users_Available!=0){ 

		header('location:users_account.php?pesan_error=USERS WITH THIS EMAIL ALREADY EXIST');

}else{


$Users_Available = Users_CheckKetersediaanIDPegawai($tbl_users, $idpegawai); /* Cek ktersediaan Id Users */ 

if($Users_Available!=0){

		header('location:users_account.php?pesan_error=USERS ALREADY EXIST');
/* */
}else{

$password_reset = lostnumber(); /* Pthere is saat registrasi users mendapatkan password dari sistem */

$USERS_ID = Users_CreateID($tbl_users);
 
$id = $USERS_ID; 

$username = strtolower($username);
$email = strtolower($email);
$password	= md5($password_reset);
						
	$idupline = 0; 
	$idpegawai  = antiinjeksi($idpegawai);  
	$statusinternal = 1;
	$aksesmodul = "anggota_biasa"; 
	$aksesproses = 1; 
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

$direktoribuat =  "../filemodul/users/" . "gambarmember/" . $tanggalhariini . "/";
$direktorimember = $direktoribuat . $USERS_ID . "/";


Users_AddData(
				
	$tbl_users,
	$id, $idupline, $idfb, $idpegawai, 
	$username, $email, $password,
	$statusinternal, $aksesmodul, $aksesproses,
	$status, $tanggaldaftar, $tanggalaktif,
	$loginterakhir, $updateterakhir, $updateusers,
	$kodeaktifasi, $teraktif, $terpopuler, $hit, $direktorimember, $noponsel

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
				
				// Buat Direktori Users
				Users_CreateDirektori( 
				
					$lokasiurl , $tanggalhariini , $jamsaatini , $USERS_ID , $USERS_EMAIL , $USERS_NAME , $USERS_IP ,  $USERS_BROWSER ,
	  				$USERS_REFERER , $USERS_NAMAHOST , $USERS_PORT , $USERS_KONEKSI 
					
				);
				
					$headeremail = "$Config_CompanyName";
					$footeremail = "Copyright (c) 2011";			
				
					$tipeemail = "UsersKirimRegistrasi";
					$JudulEmail = "Registrasi Users Web Site $Config_CompanyName";
					//$JudulEmail = strtoupper($JudulEmail);

					$namapengirim = "Mail System ";
					$emailpengirim = "webmaster@$Config_Domain";

					$namaperusahaan = "$Config_Domain";
					$namasitus = "www.$Config_Domain";

/* USERS HARUS PUNYA ALAMAT EMAIL */
/*
if($email==""){
	$email = "Tidak there is Email Account.";
}else{
	$email = $email;
}
*/
/* Kirim email ke administrator untuk mendapatkan informasi login */

$pengirim	=	"$namapengirim <$emailpengirim>";
$penerima	=	"$namapenerima <$emailpenerima>";
$subject	=	"$JudulEmail ";
$headers	=	"From: $namapengirim <$emailpengirim>\n";

$NamaFileEmail	=	"../email/kirim_email_users_pendaftaran.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);
	
$tanggalhariini = harienglish($tanggalhariini) . ", " . bulanenglish($tanggalhariini);	

/* VARIABEL Pthere is TEMPLATES EMAIL PENDAFTARAN */
$dataemail = ereg_replace("{HEADERMAIL}", $headeremail, $dataemail);  	  		
$dataemail = ereg_replace("{NAMAPERUSAHAAN}", $namaperusahaan, $dataemail);
$dataemail = ereg_replace("{NAMASITUS}", $namasitus, $dataemail);
$dataemail = ereg_replace("{LOKASIURL}", $lokasiurl, $dataemail);  	
$dataemail = ereg_replace("{TANGGALHARIINI}", $tanggalhariini, $dataemail);  
$dataemail = ereg_replace("{JAMSAATINI}", $jamsaatini, $dataemail);  		  		
$dataemail = ereg_replace("{USERSNAMA}", $username, $dataemail);	

/* VARIABEL Pthere is TEMPLATES EMAIL PENDAFTARAN */
$dataemail = ereg_replace("{LINKAKTIFASI}", $linkaktifasi, $dataemail); 	
$dataemail = ereg_replace("{LINKALTERNATIFAKTIFASI}", $linkalternatifaktifasi, $dataemail);
$dataemail = ereg_replace("{USERSEMAIL}", $email, $dataemail);
$dataemail = ereg_replace("{NIKUSERS}", $idpegawai, $dataemail);
$dataemail = ereg_replace("{USERSPASSWORD}", $password_reset, $dataemail);
$dataemail = ereg_replace("{NOMORAKTIFASI}", $idrandom, $dataemail);
				
$dataemail = ereg_replace("{FOOTERMAIL}", $footeremail, $dataemail);  	
	
$message	=	$dataemail; 
	
//$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers) ;
$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers) ;

header('location:users_help.php?pesan_error=THANK YOU FOR YOUR REGISTRATION, PLEASE CONTACT SYSTEM ADMINISTRATOR AFTER YOU RECEIVE AN EMAIL');

}
}}}}}}}}}}}}} }}
/* END USERS REGISTER */





}
?>