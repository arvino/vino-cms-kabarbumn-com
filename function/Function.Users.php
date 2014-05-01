<?php 
/*

id
idupline
idfb
idpegawai
username
email
password
noponsel
gambarkecil
gambarbesar
im
namaperusahaan
kantorcabang
jabatan
divisi
alamat
statusinternal
aksesmodul
aksesproses
status
tanggaldaftar
tanggalaktif
loginterakhir
updateterakhir
updateusers
kodeaktifasi
teraktif
terpopuler
direktori
hit

*/



	/* Buat ID Users. */
	function Users_CreateID($tbl_users){
		$sql = mysql_query("SELECT * FROM $tbl_users ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	
	
	
	// Periksa Ketersediaan Alamat Email.
	function Users_CheckEmail($tbl_users, $txt_usersregister_email){
		$sql = mysql_query("SELECT * FROM $tbl_users WHERE email='$txt_usersregister_email'");  
		$data =	mysql_fetch_object($sql);
		return $data;
	}
	
	
	// Periksa Ketersediaan Alamat Email Berdasarkan Jumlah.
	function Users_CheckJumlahEmail($tbl_users, $email){
		$sql = mysql_query("SELECT * FROM $tbl_users WHERE email='$email'");  
		$data =	mysql_num_rows($sql);
		return $data;
	}


	// Periksa Ketersediaan NIK / ID Pegawai.
	function Users_CheckKetersediaanIDPegawai($tbl_users, $idpegawai){
		$sql = mysql_query("SELECT * FROM $tbl_users WHERE idpegawai='$idpegawai'");
		$data =	mysql_num_rows($sql);
		return $data;
	}

	// Tambah Data Users
	function Users_AddData(
		$tbl_users,
	 	$id, $idupline, $idfb, $idpegawai, 
  		$username, $email, $password,
  		$statusinternal, $aksesmodul, $aksesproses,
  		$status, $tanggaldaftar, $tanggalaktif,
  		$loginterakhir, $updateterakhir, $updateusers,
  		$kodeaktifasi, $teraktif, $terpopuler, $hit , $direktorimember, $txt_usersregister_ponsel

	){
	
	
	$sql = mysql_query("INSERT INTO $tbl_users
	(
	 	id, idupline, idfb, idpegawai, 
  		username, email, password,
  		statusinternal, aksesmodul, aksesproses,
  		status, tanggaldaftar, tanggalaktif,
  		loginterakhir, updateterakhir, updateusers,
  		kodeaktifasi, teraktif, terpopuler, hit , direktori, noponsel
	
	)VALUES(
	
	 	'$id', '$idupline', '$idfb', '$idpegawai', 
  		'$username', '$email', '$password',
  		'$statusinternal', '$aksesmodul', '$aksesproses',
  		'$status', '$tanggaldaftar', '$tanggalaktif',
  		'$loginterakhir', '$updateterakhir', '$updateusers',
  		'$kodeaktifasi', '$teraktif', '$terpopuler', '$hit' , '$direktorimember', '$txt_usersregister_ponsel'
	
	
	)");
	
	return $sql;
	
	}
   

		function Users_KirimEmail(
					$lokasiurl, $tipeemail, $tanggalhariini, $jamsaatini, $namasitus, 
					$headeremail, $footeremail, $linkaktifasi, $linkalternatifaktifasi,
					$JudulEmail, $namapenerima, $emailpenerima, $namapengirim, $emailpengirim, 
					$nomoraktifasi , $password, $namaperusahaan, $idrandom
		){

  			$pengirim	=	"$namapengirim <$emailpengirim>";
			$penerima	=	"$namapenerima <$emailpenerima>";
  			$subject	=	"$JudulEmail ";
  			$headers	=	"From: $namapengirim <$emailpengirim>\n";
  	
	
			if($tipeemail == 'UsersKirimRegister'){	
  				$NamaFileEmail	=	"../email/kirim_email_users_pendaftaran.txt";
			}

			if($tipeemail == 'UsersKirimResetPassword'){	
  				$NamaFileEmail	=	"../email/kirim_email_users_reset_password.txt";
			}

			if($tipeemail == 'UsersKirimBlokirAccount'){	
  				$NamaFileEmail	=	"../email/kirim_email_users_blokir_akun.txt";
			}

			if($tipeemail == 'UsersKirimEditProfile'){	
  				$NamaFileEmail	=	"../email/kirim_email_users_edit_profile.txt";
			}

			if($tipeemail == 'UsersKirimPengumuman'){	
  				$NamaFileEmail	=	"../email/kirim_email_users_pengumuman.txt";
			}
	
			if($tipeemail == 'UsersKirimPrivateMessages'){	
  				$NamaFileEmail	=	"../email/kirim_email_users_privatemessages.txt";
			}
	
	
  				$fpFILEEMAIL = fopen($NamaFileEmail, "r");
  				$dataemail = fread($fpFILEEMAIL, filesize($NamaFileEmail));
  				fclose($fpFILEEMAIL);
	
	
				/* VARIABEL PADA TEMPLATES EMAIL PENDAFTARAN */
  				$dataemail = ereg_replace("{HEADERMAIL}", $headeremail, $dataemail);  	  		
  				$dataemail = ereg_replace("{NAMAPERUSAHAAN}", $namaperusahaan, $dataemail);
  				$dataemail = ereg_replace("{NAMASITUS}", $namasitus, $dataemail);
				$dataemail = ereg_replace("{LOKASIURL}", $lokasiurl, $dataemail);  	
  				$dataemail = ereg_replace("{TANGGALHARIINI}", $tanggalhariini, $dataemail);  
				$dataemail = ereg_replace("{JAMSAATINI}", $jamsaatini, $dataemail);  		  		
  				$dataemail = ereg_replace("{USERSNAMA}", $namapenerima, $dataemail);	


	

				/* VARIABEL PADA TEMPLATES EMAIL PENDAFTARAN */
  				$dataemail = ereg_replace("{LINKAKTIFASI}", $linkaktifasi, $dataemail); 	
  				$dataemail = ereg_replace("{LINKALTERNATIFAKTIFASI}", $linkalternatifaktifasi, $dataemail);
				$dataemail = ereg_replace("{USERSEMAIL}", $emailpenerima, $dataemail);
				$dataemail = ereg_replace("{USERSPASSWORD}", $password, $dataemail);
				$dataemail = ereg_replace("{NOMORAKTIFASI}", $idrandom, $dataemail);
				

				
				$dataemail = ereg_replace("{FOOTERMAIL}", $footeremail, $dataemail);  	
	
				$message	=	$dataemail; 
	
				$KirimEmailKeUsers		=	@mail($penerima, $subject, $message, $headers) ;
				//$KirimEmailKeAdmin		=	@mail($pengirim, $subject, $message, $headers) ;
				/* echo"
				<textarea> 
					$penerima 
					$pengirim
					$subject 
					$headers
					$message 
				</textarea>
				";
				*/
				


		}


function list_users_login( $tbl_users, $username, $password ){ /* Select Data For Login */
	$sql = mysql_query("SELECT * FROM $tbl_users
		WHERE email ='$username'
		AND  password ='$password'
		AND  status = '1'
		AND statusinternal = '1'
	");
	return $sql;
} /* End Fungsi selek data users untuk login */

function update_users_login_log( $tbl_users, $kunjunganterakhir, $kunjunganterakhir, $username ){
$sql = mysql_query("UPDATE $tbl_users SET 
		loginterakhir='$kunjunganterakhir',
		updateterakhir = '$kunjunganterakhir'
	WHERE 
		idpegawai='$username'");
return $sql;
}



function update_users_aktif_log( $tbl_users, $tanggalhariini , $jamsaatini , $id ){
$sql = mysql_query("UPDATE $tbl_users SET 
		tanggalaktif ='$tanggalhariini, $jamsaatini'
	WHERE 
		id ='$id'");
return $sql;
}


function Users_Select_Detail( $tbl_users, $id ){
	$sqlText = "SELECT * FROM $tbl_users WHERE id = '$id'";
	$result = mysql_query($sqlText);
	return mysql_fetch_object($result);
}



function ListUsers_All( $tbl_users ){
	$sql = mysql_query("
		SELECT * FROM $tbl_users 		
		ORDER BY id ASC		
	");
	return $sql;
}


function ListUsers_All_Aktif( $tbl_users ){
	$sql = mysql_query("
		SELECT * FROM $tbl_users WHERE statusbaru='7'		
		ORDER BY tanggalaktif DESC		
	");
	return $sql;
}


function ListUsers_All_By_Page( $tbl_users , $offset , $dataPerPage ){
	$sql = mysql_query("
		SELECT * FROM $tbl_users 		
		ORDER BY id ASC
		LIMIT $offset, $dataPerPage
	");
	return $sql;
}


function ListUsers_All_Aktif_By_Page( $tbl_users , $offset , $dataPerPage ){
	$sql = mysql_query("
		SELECT * FROM $tbl_users WHERE statusbaru = '7' 		
		ORDER BY tanggalaktif DESC
		LIMIT $offset, $dataPerPage
	");
	return $sql;
}


					

	  	function Users_CreateDirektori(  
	  		$lokasiurl , $tanggalhariini , $jamsaatini , $USERS_ID , 
			$USERS_EMAIL , $USERS_NAME , $USERS_IP ,  $USERS_BROWSER ,
	  		$USERS_REFERER, $USERS_NAMAHOST , $USERS_PORT , $USERS_KONEKSI 
	  	){
	
 	  $direktoribuat =  "../filemodul/users/" . "image_users/" . $tanggalhariini . "/";
	  
	  if (is_dir( $direktoribuat )) 
	  {  }
	  else
	  {
			 //mkdir($direktoribuat); 
			 //chmod( $direktoribuat, 0777);
	  }
			

 		$direktorimember			= $direktoribuat . $USERS_ID . "/";
 		$direktorimembergambar 		= $direktoribuat . $USERS_ID . "/fotomember";
		$direktorimemberartikel 	= $direktoribuat . $USERS_ID . "/artikelmember";
		$direktorimemberiklan 		= $direktoribuat . $USERS_ID . "/iklanmember";
		$direktorimembervideo 		= $direktoribuat . $USERS_ID . "/videomember";
	
	 		if (is_dir($direktorimember)) 
	 		{   }
	  		else
	  		{
				//mkdir($direktorimember); 
	  			//chmod($direktorimember, 0777);
	  		}
	  
	   		if(is_dir($direktorimembergambar)) 
	   		{   }
			else
			{
				//mkdir($direktorimembergambar); 
				//chmod($direktorimembergambar, 0777);
			}
			
			if(is_dir($direktorimemberartikel)) 
	   		{  }
			else
			{
				//mkdir($direktorimemberartikel); 
				//chmod($direktorimemberartikel, 0777);
			}
			
			 
			if(is_dir($direktorimemberiklan)) 
	   		{  }
			else
			{
				//mkdir($direktorimemberiklan); 
				//chmod($direktorimemberiklan, 0777);
			}
			
			 
			if(is_dir($direktorimembervideo)) 
	   		{  }
			else
			{
				//mkdir($direktorimembervideo); 
				//chmod($direktorimembervideo, 0777);
			}
			
		 
		
		// Create Users File
		
		//$strlength = strlen($content);  
		//$create = fopen($filename, "w");  
		//$write = fwrite($create, $content, $strlength);  
		//$close = fclose($create);  

		 
		}

 
	function LihatDataMember( $tbl_users ){
	
		$sqlText = "SELECT * FROM $tbl_users ORDER BY id ASC";
		return mysql_query($sqlText);
	}

	function cekLoginMember( $tbl_users ){
		$sql = "SELECT * FROM $tbl_users where username ='$username' and password = '$password' ";
		$query = mysql_query($sql);
		return mysql_num_rows($query);
	}



  

		function Users_Select_Detail_For_Aktifasi( $tbl_users, $email, $kodeaktifasi ){
			$sqlText = "SELECT * FROM $tbl_users WHERE 
				email = '$email' AND
				kodeaktifasi = '$kodeaktifasi'
			";
			$result = mysql_query($sqlText);
			return mysql_fetch_object($result);
		}



		function Users_Select_Detail_For_LostPassword( $tbl_users, $txt_usersresetpassword_email ){
			$sql = "SELECT * FROM $tbl_users WHERE 
				email = '$txt_usersresetpassword_email' 
			";
			$result = mysql_query($sql);
			return mysql_fetch_object($result);
		}/* Function Untuk Select Data  Reset Password */


function Users_Select_Detail_For_ChangePassword( $tbl_users, $email ){ /* Kelas Ganti Password */
			$sql = "SELECT * FROM $tbl_users WHERE 
				email = '$email' 
			";
			$result = mysql_query($sql);
			return mysql_fetch_object($result);
}/* Function Untuk Select Data  Ganti Password */


		function Users_Update_Detail_For_LostPassword( $tbl_users, $txt_usersresetpassword_email, $password_reset , $tanggalhariini, $jamsaatini  ){
			$sql = mysql_query("UPDATE $tbl_users SET  
				password = '$password_reset' , 
				updateterakhir = '$tanggalhariini, $jamsaatini'
					WHERE
				email = '$txt_usersresetpassword_email'
			");
			return $sql;
		} /* Fungsi Update data untuk lost password */

		function Users_Update_Detail_For_ChangePassword( $tbl_users, $email, $password_reset , $tanggalhariini, $jamsaatini  ){
			$sql = mysql_query("UPDATE $tbl_users SET  
				password = '$password_reset' , 
				updateterakhir = '$tanggalhariini, $jamsaatini'
					WHERE
				email = '$email'
			");
			return $sql;
		} /* Fungsi Update data untuk change password */


		function Jumlah_Users_For_Aktifasi( $tbl_users, $txt_usersaktifasi_email, $txt_usersaktifasi_kodeaktifasi ){
			$sql = mysql_query( "SELECT * FROM $tbl_users WHERE 
				email = '$txt_usersaktifasi_email' AND
				kodeaktifasi = '$txt_usersaktifasi_kodeaktifasi'
			");
			
			return mysql_num_rows($sql);
		}


function Users_Update_Detail_For_Aktifasi( $tbl_users, $txt_usersaktifasi_email, $txt_usersaktifasi_kodeaktifasi, $tanggalhariini, $jamsaatini  ){
			$sql = mysql_query("UPDATE $tbl_users SET  
				status = '1' ,	tanggalaktif = '$tanggalhariini, $jamsaatini'
					WHERE
				email = '$txt_usersaktifasi_email' AND
				kodeaktifasi = '$txt_usersaktifasi_kodeaktifasi'
			");
			
			return $sql;
		}


  
	
	function update_usersaccount_status( $tbl_users, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				status = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function update_usersaccount_aksesproses( $tbl_users, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				aksesproses = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}







	function update_usersaccount_statusinternal( $tbl_users, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				statusinternal = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}




/* Pencarian berdasarkan Username , Email, ID Pegawai*/

function GetJML_Search_Users_Account_ALL( $tbl_users, $cari ){ /* Users Search Count */
$sql = mysql_query("SELECT count(id) as jml FROM $tbl_users WHERE 	
			
username LIKE '%$cari%' OR
email LIKE '%$cari%' OR
noponsel LIKE '%$cari%' OR
im LIKE '%$cari%' OR
namaperusahaan LIKE '%$cari%' OR
kantorcabang LIKE '%$cari%' OR
jabatan LIKE '%$cari%' OR
divisi LIKE '%$cari%' OR
alamat LIKE '%$cari%'

		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}



function Users_ListData_ViewByGroupUsers_AksesModul( $tbl_users , $aksesmodul ){
	$sql = mysql_query("SELECT * FROM $tbl_users WHERE aksesmodul = '$aksesmodul' ORDER BY username ASC");
	return $sql;
}




function Users_ListData_ViewByGroupUsers( $tbl_users ){
	$sql = mysql_query("SELECT * FROM $tbl_users ORDER BY username ASC");
	return $sql;
}



function Users_ListData_ViewByGroupUsers_Statusbaru( $tbl_users ){
	$sql = mysql_query("SELECT * FROM $tbl_users WHERE statusbaru='7' ORDER BY tanggalaktif DESC");
	return $sql;
}




function List_Search_Users_Account_ALL($tbl_users, $cari  ){ /* Pencarian Users Search ALL */
		$sql = mysql_query("SELECT * FROM $tbl_users WHERE 
		
			
username LIKE '%$cari%' OR
email LIKE '%$cari%' OR
noponsel LIKE '%$cari%' OR
im LIKE '%$cari%' OR
namaperusahaan LIKE '%$cari%' OR
kantorcabang LIKE '%$cari%' OR
jabatan LIKE '%$cari%' OR
divisi LIKE '%$cari%' OR
alamat LIKE '%$cari%'


			
		ORDER BY username ASC
		
		");
		
		return $sql;
}

function Search_Users_Account_ALL($tbl_users, $cari , $offset , $dataPerPage ){ /* Pencarian Users Search ALL By page */
		$sql = mysql_query("SELECT * FROM $tbl_users WHERE 
		
			
username LIKE '%$cari%' OR
email LIKE '%$cari%' OR
noponsel LIKE '%$cari%' OR
im LIKE '%$cari%' OR
namaperusahaan LIKE '%$cari%' OR
kantorcabang LIKE '%$cari%' OR
jabatan LIKE '%$cari%' OR
divisi LIKE '%$cari%' OR
alamat LIKE '%$cari%'


			
		ORDER BY username ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}




/* Fungsi untuk mengupdate users teraktif  */
	function Users_UpdateTeraktif( $tbl_users , $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				teraktif = teraktif+1
			WHERE
			id = '$id'
		");
	return $sql;
	}


/* Fungsi untuk mengupdate users terpopuler  */
	function Users_UpdateTerpopuler( $tbl_users , $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				terpopuler = terpopuler+1
			WHERE
			id = '$id'
		");
	return $sql;
	}



/* Fungsi untuk mengaktifkan status users internal  */
	function Users_StatusInternal( $tbl_users , $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				statusinternal = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	
	
	}


/* Fungsi status aktif */


	function Users_StatusAktif( $tbl_users, $statustampil, $tanggalhariini, $jamsaatini, $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				status = '$statustampil',
				tanggalaktif = '$tanggalhariini, $jamsaatini'
			WHERE
				id = '$id'
		");
	return $sql;
	
	
	}

/* Fungsi untuk mengaktifkan status users baru  */
	function Users_StatusBaruAktif( $tbl_users , $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_users SET
				statusbaru = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	
	
	}


/* Fungsi untuk hapus users account  */
	function Users_hapusaccount( $tbl_users , $id ){
		$sql = mysql_query("
			DELETE FROM $tbl_users WHERE id='$id'
		");
	return $sql;
	
	
	}






function Users_EditProfile(
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
){


$sql = mysql_query("
UPDATE $tbl_users SET 

	idupline = '$idupline', 
	idfb = '$idfb',
	idpegawai = '$idpegawai',
	username = '$username',
	email =  '$email',
	password = '$password',
	noponsel = '$noponsel',
	gambarkecil = '$gambarkecil',
	gambarbesar = '$gambarbesar',
	im = '$im',
	namaperusahaan = '$namaperusahaan',
	kantorcabang = '$kantorcabang',
	jabatan = '$jabatan',
	divisi = '$divisi',
	alamat = '$alamat',
	statusinternal = '$statusinternal',
	aksesmodul = '$aksesmodul',
	aksesproses = '$aksesproses',
	status = '$status',
	tanggaldaftar = '$tanggaldaftar',
	tanggalaktif = '$tanggalaktif',
	loginterakhir = '$loginterakhir',
	updateterakhir = '$updateterakhir',
	updateusers = '$updateusers',
	kodeaktifasi = '$kodeaktifasi',
	teraktif = '$teraktif',
	terpopuler = '$terpopuler',
	direktori = '$direktori',
	hit = '$hit'


WHERE

	id='$id'

");

return $sql;
}



function Users_hapusimage( $tbl_users , $id ){
$sql = mysql_query("
	UPDATE $tbl_users SET 
		gambarkecil = '',
		gambarbesar = ''
	WHERE
		id = '$id'

");

return $sql;

}



?>