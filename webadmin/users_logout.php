<?php
session_name("CUST");
session_start();

include"kelas_function.php";




			$usernameentryfield = $_SESSION['users_email'];
			$sql = "UPDATE $tbl_users SET 
					updateterakhir = '$kunjunganterakhir'
					WHERE email='$usernameentryfield'";
					
			$Auth_Result = mysql_query($sql);
			
			
			$tanggallogout 	= date("Y-m-d");
			$jamlogout 		= date("H:i:s");
			$HISTORY_ID_SES = $_SESSION['users_historiid'];
			
			$qryHistori = mysql_query("
					UPDATE  $tbl_usershistoriakses  SET 
					logout 		= '$tanggallogout',
					timelogout 	= '$jamlogout'
						WHERE 		
					id='$HISTORY_ID_SES'
					");
					
session_destroy();
//$pesan_error = "LOG OUT SUCCESS !";

$pesan_error = $_GET['pesan_error'];

header("location:index.php?pesan_error=$pesan_error");
?>