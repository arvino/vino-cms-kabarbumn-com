<?php 
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];

include"kelas_function.php";

/**************** PROSES USERS LOGIN Pthere is halaman  ADMIN ***********************/
if( $action == "users_login" ){ /* Proses Users Login  */

$username = antiinjeksi($_POST['email']);
$password = antiinjeksi($_POST['password']);
	 
$username = strtolower($username);
$password = CryptPass( $password );
	 
$Auth_Result = list_users_login( $tbl_users, $username, $password ); /* Check data users */

// Populate session variables with data base results
if (mysql_num_rows($Auth_Result) == 0){

header('location:users_login.php?pesan_error=LOGIN FAILED,  PLEASE TRY AGAIN.');
			
}else{
			
$myObject = mysql_fetch_object($Auth_Result);
			
$_SESSION['users_id']  				= $myObject->id;
$_SESSION['users_idpegawai'] 		= $myObject->idpegawai;
$_SESSION['users_username'] 		= $myObject->username;
$_SESSION['users_email'] 			= $myObject->email;
$_SESSION['users_password'] 		= $myObject->password;
$_SESSION['users_statusinternal'] 	= $myObject->statusinternal;
$_SESSION['users_aksesmodul'] 		= $myObject->aksesmodul;
$_SESSION['users_aksesproses'] 		= $myObject->aksesproses;
$_SESSION['users_status'] 			= $myObject->status;
$_SESSION['users_statusbaru'] 		= $myObject->statusbaru;
$_SESSION['users_loginterakhir'] 	= $myObject->loginterakhir;
$_SESSION['users_updateterakhir'] 	= $myObject->updateterakhir;
$_SESSION['users_kodeaktifasi'] 	= $myObject->kodeaktifasi;
				
				
Users_UpdateTeraktif( $tbl_users , $myObject->id ); /* Fungsi update teraktif */
				
$H_userid = $_SESSION['users_id'];
$H_email = $_SESSION['users_email'];
$sesiakseslevel = $_SESSION['users_aksesmodul'];
$_SESSION['halamandiizinkan'] = array();
			
$kunjunganterakhir 	= date("Y-m-d H:i:s");
$username = mysql_escape_string($username);
			
$Auth_Result = update_users_login_log( $tbl_users, $kunjunganterakhir, $kunjunganterakhir, $username );

$tanggallogin 	= date("Y-m-d");
$jamlogin 		= date("H:i:s");

$_SESSION['users_historiid'] = usershistoriakses_createid( $tbl_usershistoriakses );
			
TambahData_UsersHistoriAkses(
$tbl_usershistoriakses,
$cr_idhistori, $H_userid, $H_email, $REMOTE_ADDR, $tanggallogin, $jamlogin
);


$Sec_Result = select_all_usersgroup_by_roleid( $tbl_usersgroups, $sesiakseslevel );
 			
$i=0;
while ($myrow = mysql_fetch_row($Sec_Result)){
$_SESSION['halamandiizinkan'][$i] = $myrow[0];
$i++;
}

header("location:home.php?pesan_error=WELCOME TO ADMINISTRATOR PAGE ");

}} 

/********** End Users Login *************/
/***************************************/




/* PROSES UPDATE DATA... USERS GANTI PASSWORD */
/***************************************/
if( $action == "users_gantipassword" ){

	$Kode_UsersGantiPassword = $_SESSION['Kode_GantiPassword'];
	$email = antiinjeksi($email);
	$email = strtolower($email);
	$password = antiinjeksi($password);
	$pass1 = antiinjeksi($pass1);
	$pass2 = antiinjeksi($pass2);



if( $pass1 != $pass2 ){
header('location:users_ganti_password.php?pesan_error=PASSWORD NOT SAME');
}else{
if( $email == "" ){
header('location:users_ganti_password.php?pesan_error=PLEASE FILL EMAIL.');
}else{

/*
if(!check_email($email)) {

$pesan_error = "there are errors in the writing of an email address";
header('location:users_ganti_password.php?pesan_error=there are errors in the writing of an email address');
}else{
*/



if( $kodeverifikasi == '' ){
header('location:users_ganti_password.php?pesan_error=PLEASE FILL VERIFICATION CODE');	
}else{
if( $kodeverifikasi != $Kode_UsersGantiPassword ){
header('location:users_ganti_password.php?pesan_error=VERIFICATION CODE NOT SAME');
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
 
header('location:users_ganti_password.php?pesan_error=YOU CANNOT CHANGE PASSWORD , YOUR STATUS STILL NOT ACTIVATE');


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

header('location:users_ganti_password.php?pesan_error=PASSWORD NOT SAME');


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
					$footeremail = "Copyright (c) 2011";			
				
					$tipeemail = "UsersKirimGantiPassword";
					$JudulEmail = "Email for change password $Config_CompanyName";
					//$JudulEmail = strtoupper($JudulEmail);
					$namapenerima = $users_nama;
					$emailpenerima = $users_email;

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

$NamaFileEmail	=	"../email/kirim_email_users_ganti_password.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);

$lokasiurl = $link_host . $dir_admin;

$tanggalhariini = harienglish($tanggalhariini) . ", " . bulanenglish($tanggalhariini);
	
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
$dataemail = ereg_replace("{EMAILFOOTER}", $footeremail, $dataemail);  	
	
$message	=	$dataemail; 
	
$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers) ;
$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers) ;

/* UPDATE DATA... */
$password_reset2 = $password_reset;
$password_reset = md5($password_reset);
			
Users_Update_Detail_For_ChangePassword( $tbl_users, $email, $password_reset , $tanggalhariini, $jamsaatini  );

$statustampil = "7";
Users_StatusBaruAktif( $tbl_users , $statustampil, $users_id );

//session_destroy();
header('location:users_ganti_password.php?pesan_error=SUCCESS CHANGE PASSWORD');

}
}}}}}} 
/* End Users Ganti Password */





/* Proses Users Lupa Password / reset password  */
if( $action == "lupapassword" ){

		$Kode_LupaPassword = $_SESSION['lupapassword_code'];
		$email = antiinjeksi($email);
		$email = strtolower($email);
		$kodeverifikasi = antiinjeksi($kodeverifikasi);

if($email == "" ){

header('location:users_lupa_password.php?pesan_error=PLEASE FILL OUT YOUR EMAIL');


}else{
 
       	if(!check_email($email)) {

header('location:users_lupa_password.php?pesan_error=there are errors in the writing of an email address');

		}else{
 


if( $kodeverifikasi == "" ){
			
header('location:users_lupa_password.php?pesan_error=PLEASE FILL VERIFICATION CODE');

}else{

if( $kodeverifikasi != $Kode_LupaPassword ){

header('location:users_lupa_password.php?pesan_error=KODE VERIFIKASI TIDAK SESUAI.');

}else{

/* Syarat reset password harus status = 1 dan status internal = 1*/
			$sql = "SELECT *

			FROM $tbl_users
			
			WHERE email ='$email'  
			
			AND  status = '1'
			AND statusinternal = '1'
			
	        ";
			$Auth_Result = mysql_query($sql);


// Populate session variables with data base results
if (mysql_num_rows($Auth_Result) == 0) {

header('location:users_lupa_password.php?pesan_error=ANDA TIDAK DAPAT RESET PASSWORD, STATUS ANDA BELUM AKTIF.');
}else{

					$password_reset = lostnumber();

					/* Ambil Data */
					$Detail_Users_Lost_Password = Users_Select_Detail_For_LostPassword( $tbl_users, $email );
					$users_email = $Detail_Users_Lost_Password->email;
					$users_nama = $Detail_Users_Lost_Password->username;
					$users_status = $Detail_Users_Lost_Password->status;
					$users_nik = $Detail_Users_Lost_Password->idpegawai;
					/* Kirim Email */
					

					$headeremail = "$Config_CompanyName";
					$footeremail = "Copyright (c) 2011 | $Config_Domain";			
				
					$tipeemail = "UsersKirimResetPassword";
					$JudulEmail = "Reset Password $Config_CompanyName";
					//$JudulEmail = strtoupper($JudulEmail);
					$namapenerima = $users_nama;
					$emailpenerima = $users_email;

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

$NamaFileEmail	=	"../email/kirim_email_users_reset_password.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);

$lokasiurl = $link_host . $dir_admin;

$tanggalhariini = harienglish($tanggalhariini) . ", " . bulanenglish($tanggalhariini);

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
				
$dataemail = ereg_replace("{EMAILFOOTER}", $footeremail, $dataemail);  	
	
$message	=	$dataemail; 
	
$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers); /* Kirim Email Ke Users */
$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers); /* Kirim Email Ke Admin */

/* UPDATE DATA... */
$password_reset2 = $password_reset;
$password_reset = md5($password_reset);
			
Users_Update_Detail_For_LostPassword( $tbl_users, $email, $password_reset , $tanggalhariini, $jamsaatini  );

header('location:users_lupa_password.php?pesan_error=Your password has been reset, please check your email.' );

}}}}}}
/* ************************** END USERS LUPA PASSWOR ************************************************* */




if( $action == "aktifasi" ){

$Kode_Aktifasi_Registrasi = $_SESSION['aktifasipendaftaran_code'];
$email = antiinjeksi($email);
$email = strtolower($email);
$kodeaktifasi = antiinjeksi($kodeaktifasi);
$kodeverifikasi = antiinjeksi($kodeverifikasi);

if( $kodeverifikasi == '' ){

$pesan_error .= "PLEASE FILL VERIFICATION CODE";
header('location:users_aktifasi.php?pesan_error=PLEASE FILL VERIFICATION CODE');

}else{

if( $kodeverifikasi != $Kode_Aktifasi_Registrasi ){
		
$pesan_error = "KODE VERIFIKASI YANG ANDA MASUKKAN TIDAK SESUAI.";
header('location:users_aktifasi.php?pesan_error=KODE VERIFIKASI YANG ANDA MASUKKAN TIDAK SESUAI.');

		
			}
			else
			{


if (!strlen( $email)) {

header('location:users_aktifasi.php?pesan_error=HARAP ISI ALAMAT EMAIL ANDA.');

}else{
		 
		
												if (strlen($email) < 7) // Jika email kurang dari 7
												{

$pesan_error = "Please fill email address correctly.";
header('location:users_aktifasi.php?pesan_error=Please fill email address correctly.');



												}
												else
												{
		
														if (strlen($email) > 200)
														{

$pesan_error = "HARAP ISI EMAIL KURANG DARI 200 KARAKTER.";
header('location:users_aktifasi.php?pesan_error=HARAP ISI EMAIL KURANG DARI 200 KARAKTER.');

		
														}
														else
														{
																
		
		
																if (eregi(" ", $email))
																{

header('location:users_aktifasi.php?pesan_error=HARAP MASUKKAN EMAIL TANPA SPASI.');
}else{

if(!check_email($email)) {

header('location:users_aktifasi.php?pesan_error=there are errors in the writing of an email address');

}else{

											
$Jumlah_Users_Aktifasi = Jumlah_Users_For_Aktifasi( $tbl_users, $email, $kodeaktifasi );
/* Hitung Jumlah Users , Jika Users Yang tida ada */
if($Jumlah_Users_Aktifasi==0){
header('location:users_aktifasi.php?pesan_error=Your email not found in our database.');
}else{

			/*  Periksa Detail Status Apakah Sudah Aktif Atau Belum */
			$Detail_Users_For_Aktifasi = Users_Select_Detail_For_Aktifasi( $tbl_users, $email, $kodeaktifasi  );
			$StatusAktifasiUsers = $Detail_Users_For_Aktifasi->status;
			if($StatusAktifasiUsers=='1'){
				/* Jika Users Sudah Aktif	 */
header('location:users_aktifasi.php?pesan_error=Users already active');
			}else{
				

				$Detail_Users_For_Aktifasi = Users_Select_Detail_For_Aktifasi( $tbl_users, $email, $kodeaktifasi  );
					$users_email = $Detail_Users_For_Aktifasi->email;
					$users_nama = $Detail_Users_For_Aktifasi->username;
					$users_status = $Detail_Users_For_Aktifasi->status;

				/* Update Status Users */
				Users_Update_Detail_For_Aktifasi( $tbl_users, $email, $kodeaktifasi, $tanggalhariini, $jamsaatini  );
				


				/* Kirim Email

				$headeremail = "$Config_CompanyName";
				$footeremail = "Copyright (c) 2010";			
				
				$tipeemail = "UsersKirimRegisterAktifasi";
				$JudulEmail = "Activation Registration At $Config_CompanyName";
				
				$namapenerima = $users_nama;
				$emailpenerima = $users_email;

				$namapengirim = "Mail System ( $Config_CompanyName )";
				$emailpengirim = "postmaster@$Config_Domain";

				
				$namaperusahaan = "$Config_CompanyName";
				$namasitus = "www.$Config_Domain";

 				*/
				/* Kirim Email Aktifasi Pendaftaran Ke Users 
				Users_KirimEmail( 
				
					$lokasiurl, $tipeemail, $tanggalhariini, $jamsaatini, $namasitus, 
					$headeremail, $footeremail, $JudulEmail, $namapenerima, $emailpenerima, 
					$namapengirim, $emailpengirim, $namaperusahaan
				
				);
				*/
				/* Pesan SUCCESS Aktif	 */

header('location:users_aktifasi.php?pesan_error=USERS SUCCESS ACTIVATED. PLEASE LOGIN TO START');
			
			}}}}}}}}

		}
}




/* Proses Registari Users */
/******************************************************************* */
if( $action=="users_register" ){ /* Proses Registari Users */

$Kode_Verifikasi_Registrasi = $_SESSION['kode_registrasi'];
						
$username = antiinjeksi($username);
$username = strtoupper($username);

$email = antiinjeksi($email);
$email = strtolower($email);
		
$noponsel = antiinjeksi($noponsel);

/* 1. Periksa Nama */
if( $kodeverifikasi == '' ){
		header('location:users_register.php?pesan_error=PLEASE FILL VERIFICATION CODE');
}else{


if( $kodeverifikasi != $_SESSION['kode_registrasi'] )	{
		header('location:users_register.php?pesan_error=YOUR VERIFICATION CODE NOT SAME');
}else{

if (!strlen($username)) {

	header('location:users_register.php?pesan_error=FILL YOUR NAME');
	
}else{


if (strlen($username) < 3){
	header('location:users_register.php?pesan_error=HARAP ISI NAMA LEBIH DARI 3 KARAKTER DAN TIDAK LEBIH DARI 100 KARAKTER.');

}else{

if (eregi('[0-9]', $username)){
	header('location:users_register.php?pesan_error=HARAP ISI NAMA TANPA ANGKA.');

}else{

if (eregi('[!@#$%^&*()_+|=-?>~`/"\"]', $username)){
	header('location:users_register.php?pesan_error=HARAP ISI NAMA TANPA KARAKTER UNIK. SEPERTI : !@#$%^&*()_+|=-?>~`/\"\"');

}else{

																														
if (!strlen($noponsel)){
		header('location:users_register.php?pesan_error=HARAP ISI NO. PONSEL.');
}else{

		
if (strlen($noponsel) < 6){										
		header('location:users_register.php?pesan_error=HARAP ISI NO PONSEL LEBIH DARI 6 digit angka + Kode Area ( Jika CDMA ).');
}else{


if (strlen($noponsel) > 15){
		header('location:users_register.php?pesan_error=HARAP ISI NO PONSEL 1 ( SATU ) NOMOR SAJA.');
}else{


if (!eregi("[0-9]", $noponsel)){
		header('location:users_register.php?pesan_error=PLEASE FILL PHONE NUMBERS WITH NO SPACES / UNIQUE CHARACTER.');
}else{


if (eregi("[!@#$%^&*()_+|=-?>~`/'\']", $noponsel)){
		header('location:users_register.php?pesan_error=PLEASE FILL PHONE NUMBER NOT USE SPACES. EXAMPLE : 622171000xxx ');
}else{


if (eregi(' ', $noponsel)){
		header('location:users_register.php?pesan_error=PLEASE FILL PHONE NUMBER NOT USE SPACES. EXAMPLE : 622171000xxx ');
}else{

if( $_POST['email'] =="" ){ /* Jika text input email kosong lakukan perintah ini */

		header('location:users_register.php?pesan_error=HARAP ISI ALAMAT EMAIL ANDA ');
		
}else{ 

$email = $_POST['email'];

$Users_Available = Users_CheckJumlahEmail($tbl_users, $email);

if($Users_Available!=0){ 

		header('location:users_register.php?pesan_error=USERS WITH THIS EMAIL ALREADY EXIST');

}else{

$Users_Available = Users_CheckKetersediaanIDPegawai($tbl_users, $idpegawai); /* Cek ktersediaan Id Users */ 

if($Users_Available!=0){

		header('location:users_register.php?pesan_error=USERS ALREADY EXIST');

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
					$JudulEmail = "Users registration for web site $Config_CompanyName";
					//$JudulEmail = strtoupper($JudulEmail);

					$namapengirim = "Mail System ";
					$emailpengirim = "webmaster@$Config_Domain"; /* Email admin web site */

					$namaperusahaan = "$Config_Domain";
					$namasitus = "www.$Config_Domain";


if($email==""){
	$email = "Tidak there is Email Account.";
}else{
	$email = $email;
}
	
/* Kirim email ke administrator untuk mendapatkan informasi login */

$pengirim	=	"$namapengirim <$emailpengirim>";
$penerima	=	"$username <$email>";
$subject	=	"$JudulEmail ";
$headers	=	"From: $namapengirim <$emailpengirim>\n";

$NamaFileEmail	=	"../email/kirim_email_users_pendaftaran.txt";
	
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);
	
$tanggalhariini = harienglish($tanggalhariini) . ", " . bulanenglish($tanggalhariini);	

/* 
{NAMADOMAIN}
{TANGGALHARIINI}
{USERNAME}
{TANGGALDAFTAR}
{NAMAPERUSAHAAN}
{EMAILFOOTER}
*/

/* VARIABEL Pthere is TEMPLATES EMAIL PENDAFTARAN */

$dataemail = ereg_replace("{NAMAPERUSAHAAN}", $namaperusahaan, $dataemail);
$dataemail = ereg_replace("{NAMADOMAIN}", $namasitus, $dataemail);
$dataemail = ereg_replace("{TANGGALHARIINI}", $tanggalhariini, $dataemail);  
$dataemail = ereg_replace("{TANGGALDAFTAR}", $tanggalhariini, $dataemail); 
$dataemail = ereg_replace("{USERNAME}", $username, $dataemail);	
			
$dataemail = ereg_replace("{EMAILFOOTER}", $footeremail, $dataemail);  	
	
$message	=	$dataemail; 
	
$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers) ;
$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers) ;

header('location:users_help.php?pesan_error=THANK YOU FOR YOUR REGISTRATION');

}
}}}}}}}}}}}}} }}
/* END USERS REGISTER */





/* START KIRIM TICKET SUPPORT */
if($action=="usersaction_kirimticket"){

$nama = antiinjeksi($_POST['nama']);
$email = antiinjeksi($_POST['email']);
$pesan = antiinjeksi($_POST['pesan']);


$kodeverifikasi = antiinjeksi($_POST['kodeverifikasi']);

$Kode_Verifikasi_Registrasi = $_SESSION['kode_registrasi'];

if($email==""){/* Jika email kosong */
	header('location:users_help.php?pesan_error=PLEASE FILL EMAIL');
}else{
	$Users_Available = Users_CheckJumlahEmail($tbl_users, $email);
	if($Users_Available==0){ 

	header('location:users_help.php?pesan_error=YOUR EMAIL NOT FOUND IN OUR DATABASE , YOU HAVE TO ALREADY REGISTER BEFORE SEND MESSAGE');

	}else{
	
	if($pesan==""){ /* Jika pesan kosong */
		header('location:users_help.php?pesan_error=PLEASE FILL YOUR MESSAGE');
	}else{

		if($kodeverifikasi==""){ /* Jika kode verifikasi kosong */
			header('location:users_help.php?pesan_error=PLEASE FILL VERIFICATION CODE');
		}else{
			
			if($Kode_Verifikasi_Registrasi != $kodeverifikasi){
				header('location:users_help.php?pesan_error=VERIFICATION CODE NOT SAME');
			}else{
	
	
$namapenerima = "Mail System ";
$emailpenerima = "webmaster@$Config_Domain"; /* Email admin web site */
					
					
/* Kirim email ticket support ke system administrator ( webmaster@vinocms.com ) */
$pengirim	=	"$nama <$email>";
$penerima	=	"$namapenerima <$emailpenerima>";
$subject	=	"Technical support contact email from web $Config_Domain";
$headers	=	"From: $nama <$email>\n";
$NamaFileEmail	=	"../email/kirim_email_users_ticket_support.txt";
$fpFILEEMAIL = fopen($NamaFileEmail, "r");
$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
fclose($fpFILEEMAIL);
$tanggalhariini = harienglish($tanggalhariini) . ", " . bulanenglish($tanggalhariini);	
$dataemail = ereg_replace("{NAMAPERUSAHAAN}", $namaperusahaan, $dataemail);
$dataemail = ereg_replace("{TANGGALHARIINI}", $tanggalhariini, $dataemail);  
$dataemail = ereg_replace("{JAMSAATINI}", $jamsaatini, $dataemail);  		
$dataemail = ereg_replace("{NAMA}", $nama, $dataemail);	
$dataemail = ereg_replace("{EMAIL}", $email, $dataemail);	
$dataemail = ereg_replace("{PESAN}", $pesan, $dataemail);	
$dataemail = ereg_replace("{EMAILFOOTER}", $footeremail, $dataemail);  

$message = $dataemail; 
$KirimEmailKeUsers = @mail($penerima, $subject, $message, $headers) ;
$KirimEmailKeAdmin = @mail($pengirim, $subject, $message, $headers) ;
header('location:users_help.php?pesan_error=THANK YOU FOR CONTACT US, YOUR MESSAGES WILL BE PROCCESS.');

}}}}}}
/* END KIRIM TICKET SUPPORT */
?>