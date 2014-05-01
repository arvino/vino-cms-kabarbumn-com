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

/* 

  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `email` text character set latin1 NOT NULL,
  `ip` varchar(255) character set latin1 NOT NULL,
  `login` date NOT NULL,
  `logout` date NOT NULL,
  `timelogin` varchar(12) character set latin1 NOT NULL,
  `timelogout` varchar(12) character set latin1 NOT NULL,

*/

/* PROSES SUB KANAL */
if( $action=="usersgroups_tambahdata" ){ /* Proses Tambah Data Sub Kanal */
$trs = new GoogleTranslate; 
$trs->langIn = 'id'; 
$trs->langOut = 'en'; 

$idkategori = $_POST['txt_userssubkategori_idkategori'];
/*
txt_userssubkategori_idkategori
txt_userssubkategori_keterangan
txt_userssubkategori_posisi
txt_userssubkategori_urutan
txt_userssubkategori_statustampil
txt_userssubkategori_homehalamantampil
txt_userssubkategori_menutampil
txt_userssubkategori_fileimage
*/

if( $txt_userssubkategori_keterangan=='' ){

	header("location:users_groups.php?idkategori=$idkategori&pesan_error=PLEASE FILL TITLE"); /* Kembali ke halaman  sebelumnya */
	
}else{

$id = usersKategoriSub_CreateID( $tbl_userskategorisub ); 
$idupline = $idkategori;
$keterangan = $txt_userssubkategori_keterangan;
$keteranganinggris = $keterangan; /* Translate Ke Inggris */
$urutan = $txt_userssubkategori_urutan;
$posisi = $txt_userssubkategori_posisi;



	/* STATUS TAMPIL SUB KATEGORI users */
	if( $txt_userssubkategori_statustampil == "" || $txt_userssubkategori_statustampil == "none"){
		$txt_userssubkategori_statustampil = 0;
	}else{
		$txt_userssubkategori_statustampil = 1;
	}
	$statustampil = $txt_userssubkategori_statustampil;
	
	/* HOMEhalaman TAMPIL SUB KATEGORI users  */
	if( $txt_userssubkategori_homehalamantampil == "" || $txt_userssubkategori_homehalamantampil == "none"){
		$txt_userssubkategori_homehalamantampil = 0;
	}else{
		$txt_userssubkategori_homehalamantampil = 1;
	}	
	$homehalamantampil = $txt_userssubkategori_homehalamantampil;
	
	/* MENU TAMPIL KATEGORI users  */
	if( $txt_userssubkategori_menutampil == "" || $txt_userssubkategori_menutampil == "none"){
		$txt_userssubkategori_menutampil = 0;
	}else{
		$txt_userssubkategori_menutampil = 1;
	}		
	$menutampil =  $txt_userssubkategori_menutampil;

	$hit = 1;

$sql_hitungdata = usersKategoriSub_PeriksaJudul( $tbl_userskategorisub, $idkategori, $keterangan, $keteranganinggris ); /* Periksa Judul Sub Kategori users, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:users_groups.php?idkategori=$idkategori&pesan_error=FAILED !,THE TITLE IS ALREADY EXIST !"); /* Kembali ke halaman  sebelumnya */
	
}else{



//$fileimageusersgroups = $_POST['fileimageusersgroups'];

if($fileimageusersgroups==""){

$imagefile = "";
$imagelogo = "";

}else{

	$nama_file = $_FILES['fileimageusersgroups']['name'];
	$temp_file = $_FILES['fileimageusersgroups']['tmp_name']; 
	$ukuran_file = $_FILES['fileimageusersgroups']['size'];


	$loc_root = "../";	
	$loc_file = "filemodul/users/file_usersgroups/";
	$location_dir =  $loc_root . $loc_file;
	
	  	if (!is_dir( $location_dir )) 
	  	{  
			Create_Direktori( $location_dir );
		}

	 
	$imagefile =  $loc_file;
	$uploaddir = $location_dir;
	$new_name = $keterangan;

	$imagelogo = Upload_File( $new_name, $uploaddir, $temp_file, $ukuran_file, $nama_file );
	//Upload_File( $new_name, $location_dir, $temp_file, $ukuran_file, $nama_file );
	
}


	usersKategoriSub_TambahData(
		$tbl_userskategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menutampil,
		$homehalamantampil, $posisi, $urutan,
		$imagefile, $imagelogo, $hit
	); /* Proses tambah data ke database. */
	 
	header("location:users_groups.php?idkategori=$idkategori&pesan_error=SUCCESS ADD DATA !"); /* Kembali ke halaman  sebelumnya */
}}} /* END SUB KANAL TAMBAH DATA */

/* ---- */

if( $action=="usersgroups_updatedata"){ /* UPDATE SUB KANAL */


$trs = new GoogleTranslate; 
$trs->langIn = 'id'; 
$trs->langOut = 'en'; 

$id = $_POST['txt_userssubkategori_id'];
$idkategori = $_POST['txt_userssubkategori_idkategori'];
/*
txt_userssubkategori_id
txt_userssubkategori_idkategori
txt_userssubkategori_keterangan
txt_userssubkategori_posisi
txt_userssubkategori_urutan
txt_userssubkategori_statustampil
txt_userssubkategori_homehalamantampil
txt_userssubkategori_menutampil
txt_userssubkategori_fileimage

txt_userssubkategori_gambar
txt_userssubkategori_file
*/

	if( $txt_userssubkategori_keterangan=='' ){

		header("location:users_groups.php?idkategori=$idkategori&id=$id&action=EditData&pesan_error=PLEASE FILL THE TITLE"); /* Kembali ke halaman  sebelumnya */

	}else{ 
	


$idupline = $idkategori;
$keterangan = $txt_userssubkategori_keterangan;
$keteranganinggris = $keterangan; /* Translate Ke Inggris */
$urutan = $txt_userssubkategori_urutan;
$posisi = $txt_userssubkategori_posisi;

	/* STATUS TAMPIL SUB KATEGORI users */
	if( $txt_userssubkategori_statustampil == "" || $txt_userssubkategori_statustampil == "none"){
		$txt_userssubkategori_statustampil = 0;
	}else{
		$txt_userssubkategori_statustampil = 1;
	}
	$statustampil = $txt_userssubkategori_statustampil;
	
	/* HOMEhalaman TAMPIL SUB KATEGORI users  */
	if( $txt_userssubkategori_homehalamantampil == "" || $txt_userssubkategori_homehalamantampil == "none"){
		$txt_userssubkategori_homehalamantampil = 0;
	}else{
		$txt_userssubkategori_homehalamantampil = 1;
	}	
	$homehalamantampil = $txt_userssubkategori_homehalamantampil;
	
	/* MENU TAMPIL SUB KATEGORI users  */
	if( $txt_userssubkategori_menutampil == "" || $txt_userssubkategori_menutampil == "none"){
		$txt_userssubkategori_menutampil = 0;
	}else{
		$txt_userssubkategori_menutampil = 1;
	}		
	$menutampil =  $txt_userssubkategori_menutampil;

	$hit = 1;

$sql_hitungdata = usersKategoriSub_PeriksaJudul( $tbl_userskategorisub, $idkategori, $keterangan, $keteranganinggris ); /* Periksa Judul Sub Kategori users, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:users_groups.php?idkategori=$idkategori&pesan_error=FAILED ADD SUB SECTION  ! , THE TITLE IS ALREADY EXIST !"); /* Kembali ke halaman  sebelumnya */
	
}else{


//$fileimageusersgroups = $_POST['fileimageusersgroups'];

if( $fileimageusersgroups == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	$imagelogo = $txt_userssubkategori_gambar;
	
}else{

	$nama_file = $_FILES['fileimageusersgroups']['name'];
	$temp_file = $_FILES['fileimageusersgroups']['tmp_name']; 
	$ukuran_file = $_FILES['fileimageusersgroups']['size'];
	
	$loc_root = "../";	
	$loc_file = "filemodul/users/file_usersgroups/";
	$location_dir =  $loc_root . $loc_file;
	
	Create_Direktori( $location_dir ); /* Buat direktori untuk file image users kategori. */
	$imagefile =  $loc_file;
	
	$uploaddir = $location_dir;

	$new_name = $keterangan;

	/* DELETE FILE lama */
	$Delete_gambarusersgroups = $loc_root . $txt_userssubkategori_file . $txt_userssubkategori_gambar;
	unlink($Delete_gambarusersgroups);
	
	$imagelogo = Upload_File( $new_name, $uploaddir, $temp_file, $ukuran_file, $nama_file );

}
	 
usersKategoriSub_UpdateData(
		$tbl_userskategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menutampil,
		$homehalamantampil, $posisi, $urutan,
		$imagefile, $imagelogo, $hit
	);

	 	header("location:users_groups.php?idkategori=" . $idkategori . "&id=" . $id . "&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); /* Kembali ke halaman  sebelumnya */

}}} /* END UPDATE SUB KANAL  */

/* ---- */
	
if( $action=="usersgroups_updateimage" ){ /* Proses Update Sub Kanal / Delete Image Sub Kanal */
	$id = $_GET['id'];
	$row_usersgroups = Select_Detail_KategoriSub_users( $tbl_userskategorisub, $id );
	$root_image = "../";
	$idkategori = $row_usersgroups->idkategori;
	$imagefile = $row_usersgroups->imagefile;
	$imagelogo = $row_usersgroups->imagelogo;
	$image_usersgroups = $root_image . $imagefile . $imagelogo;
	unlink($image_usersgroups);
	usersKategoriSub_DeleteImage( $tbl_userskategorisub, $id );
	header("location:users_groups.php?action=EditData&idkategori=$idkategori&id=$id&pesan_error=SUCCESS DELETE IMAGE DATA"); /* Kembali ke halaman  sebelumnya */
}/* END Delete IMAGE KANAL / IMAGE UPDATE */
	
/* ---- */
	
if( $action=="usersgroups_statustampil" ){ /* Proses Update Kanal*/
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_usersgroups = Select_Detail_KategoriSub_users( $tbl_userskategorisub, $id );
	$idkategori = $row_usersgroups->idkategori;
	usersKategoriSub_StatusTampil( $tbl_userskategorisub, $statustampil, $id );
	header("location:users_groups.php?idkategori=" . $idkategori . "&pesan_error=SUCCESS PUBLISH DATA"); /* Kembali ke halaman  sebelumnya */
}

/* ---- */

if( $action=="usersgroups_menutampil" ){ /* Proses Update Kanal*/
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_usersgroups = Select_Detail_KategoriSub_users( $tbl_userskategorisub, $id );
	$idkategori = $row_usersgroups->idkategori;
	usersKategoriSub_MenuTampil( $tbl_userskategorisub, $statustampil, $id );
	header("location:users_groups.php?idkategori=" . $idkategori . "&pesan_error=SUCCESS PUBLISH DATA"); /* Kembali ke halaman  sebelumnya */
}

/* ---- */

if( $action=="usersgroups_homehalamantampil" ){ /* Proses Update Kanal*/
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_usersgroups = Select_Detail_KategoriSub_users( $tbl_userskategorisub, $id );
	$idkategori = $row_usersgroups->idkategori;
	usersKategoriSub_HomehalamanTampil( $tbl_userskategorisub, $statustampil, $id );
	header("location:users_groups.php?idkategori=" . $idkategori . "&pesan_error=SUCCESS PUBLISH DATA"); /* Kembali ke halaman  sebelumnya */
}

/* ---- */

if( $action=="usersgroups_hapusdata" ){ /* Proses Update Kanal*/
	$id = $_GET['id'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_usersgroups = Select_Detail_KategoriSub_users( $tbl_userskategorisub, $id );
	$idkategori = $row_usersgroups->idkategori;
	$root_image = "../";
	$imagefile = $row_usersgroups->imagefile;
	$imagelogo = $row_usersgroups->imagelogo;
	$image_usersgroups = $root_image . $imagefile . $imagelogo;
	unlink($image_usersgroups);
	usersKategoriSub_hapusdata( $tbl_userskategorisub, $id );
	header("location:users_groups.php?idkategori=" . $idkategori . "&pesan_error=SUCCESS DELETE DATA."); /* Kembali ke halaman  sebelumnya */
}/* END KANAL Delete DATA */	
/* --------------------------- END SUB KANAL PROSESING ----------------------------------------------------------------------------------- */ 
	




/* END */	
}/* End Session Filter */
?>