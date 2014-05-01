<?php 
if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
}else{

}
/*

				$_SESSION['users_password'] 		= $myObject->password;
				$_SESSION['users_statusinternal'] 	= $myObject->statusinternal;
				$_SESSION['users_aksesmodul'] 		= $myObject->aksesmodul;
				$_SESSION['users_aksesproses'] 		= $myObject->aksesproses;
				$_SESSION['users_status'] 			= $myObject->status;
				$_SESSION['users_loginterakhir'] 	= $myObject->loginterakhir;
				$_SESSION['users_updateterakhir'] 	= $myObject->updateterakhir;
				$_SESSION['users_kodeaktifasi'] 	= $myObject->kodeaktifasi;

*/

?>