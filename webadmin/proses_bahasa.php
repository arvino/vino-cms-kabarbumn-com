<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];

/* halaman  PROSES KONFIGURASI BAHASA */
/*  halaman  ini berfungsi untuk memproses data kiriman seperti tambah data, UPDATE DATA... & Delete data.
/* --------------------------------- */

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
}else{

include"kelas_function.php";

/* Bahasa tambah data */
if( $action=='bahasa_tambahdata' ){  /* Tambah data */
$KodeKeamananhalaman  = "token_konfigurasi";

if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	header("location:konfigurasi_bahasa.php?pesan_error=FAILED ! ACCESS DENIED.");  
	
}else{

if( $nama =='' ){

	header("location:konfigurasi_bahasa.php?pesan_error=FILL NAME.");  
	
}else{

$id = bahasa_createid( $tbl_bahasa ); 
$nama = $_POST['nama'];
$nama = antiinjeksi($nama);

$status = $_POST['status'];
$status = antiinjeksi($status);

$kodeiso = $_POST['kodeiso'];
$kodeiso = antiinjeksi($kodeiso);

	/* STATUS AKTIF BAHASA */
	if( $status == "" || $status == "none"){
		$status = 0;
	}else{
		$status = 1;
	}
	$status = $status;

$sql_hitungdata = bahasa_periksanama( $tbl_bahasa, $nama );  
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ 

	header("location:konfigurasi_bahasa.php?pesan_error=FAILED ! DATA ALREADY EXIST"); 
		
}else{

$nama_file_gambar = $_FILES['upload_gambar']['name'];
$temp_file_gambar = $_FILES['upload_gambar']['tmp_name'];
$size_file_gambar = $_FILES['upload_gambar']['size'];

if( $upload_gambar == "" ){ 
	$direktorifile  =  "";
	$gambar = "";
}else{ /* Jika there is upload file logo */

	$loc_root = "../";	
	$loc_file = "filemodul/konfigurasi/bahasa/";
	$location_dir =  $loc_root . $loc_file;
		if (!is_dir( $location_dir )) {  
			Create_Direktori( $location_dir );
		}
		$uploaddir = $location_dir;
		$new_name = "config_bahasa_" . potong_judul($name);
		
		$direktorifile  =  $loc_file;
		$gambar = Upload_File( $new_name, $uploaddir, $temp_file_gambar, $size_file_gambar, $nama_file_gambar );
		
} /* End Upload File Logo Kanal */
	 
/* Simpan data ke database */
	bahasa_tambahdata(
		$tbl_bahasa,
		$id, $nama, $status,
		$kodeiso, $direktorifile, $gambar
	);
	header("location:konfigurasi_bahasa.php?pesan_error=SUCCESS ADD DATA !");  
}}}  
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
/* End Tambah Data */



/* Bahasa UPDATE DATA... */
if( $action=="bahasa_updatedata" ){ 
$KodeKeamananhalaman  = "token_konfigurasi";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:konfigurasi_bahasa.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{

if( $nama=='' ){

	header("location:konfigurasi_bahasa.php?action=EditData&id=" . $id . "&pesan_error=HARAP ISI NAMA."); 

}else{ 

$id = $_POST['id'];
$nama = $_POST['nama'];
$status = $_POST['status'];
$kodeiso = $_POST['kodeiso'];

$sql_hitungdata = bahasa_periksanama( $tbl_bahasa, $nama ); 
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){  

	header("location:konfigurasi_bahasa.php?id=$id&action=EditData&pesan_error=FAILED ! DATA ALREADY EXIST");  
		
}else{


$nama_file_gambar = $_FILES['upload_gambar']['name'];
$temp_file_gambar = $_FILES['upload_gambar']['tmp_name'];
$size_file_gambar = $_FILES['upload_gambar']['size'];

if( $upload_gambar == "" ){ 

	$direktorifile  =  $_POST['direktorifile'];
	$gambar = $_POST['gambar'];
	
}else{

	$loc_root = "../";	
	$loc_file = "filemodul/konfigurasi/bahasa/";
	$location_dir =  $loc_root . $loc_file;
	
		if (!is_dir( $location_dir )) {  
			Create_Direktori( $location_dir );
		}
		
		$uploaddir = $location_dir;
		$new_name = "config_bahasa_" . potong_judul($name);
		
		$direktorifile  =  $loc_file;
		$gambar = Upload_File( $new_name, $uploaddir, $temp_file_gambar, $size_file_gambar, $nama_file_gambar );
}

	bahasa_updatedata(
		$tbl_bahasa,
		$id, $nama,
		$status, $kodeiso,
		$direktorifile, $gambar
	);
	 
	 	header("location:konfigurasi_bahasa.php?id=$id&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); 

}}} 
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
/* END UPDATE */	
	
	
	
	
/* Bahasa update gambar */
if( $action=="bahasa_update_gambar" ){
$KodeKeamananhalaman  = "token_konfigurasi";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:konfigurasi_bahasa.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{

	$id = $_GET['id'];
	$row_data = bahasa_viewdetail( $tbl_bahasa, $id );
	$root_image = "../";
	$direktorifile = $row_data->direktorifile;
	$gambar = $row_data->gambar;
	$filegambar = $root_image . $direktorifile . $gambar;
	
	@unlink($filegambar);

	$direktorifile = "";
	$gambar = "";
	bahasa_updateimage( $tbl_bahasa, $id, $direktorifile, $gambar );
	
	header("location:konfigurasi_bahasa.php?action=EditData&id=$id&pesan_error=SUCCESS DELETE IMAGE DATA"); 
}
}
	

/* Bahasa Delete data */
if( $action=="bahasa_hapusdata" ){  
$KodeKeamananhalaman  = "token_konfigurasi";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	header("location:konfigurasi_bahasa.php?pesan_error=FAILED ! ACCESS DENIED.");  
	
}else{

	$id = $_GET['id'];
	$row_data = bahasa_viewdetail( $tbl_bahasa, $id );
	$root_image = "../";
	$direktorifile = $row_data->direktorifile;
	$gambar = $row_data->gambar;
	$filegambar = $root_image . $direktorifile . $gambar;
	
	@unlink($filegambar);
	
	bahasa_hapusdata( $tbl_bahasa, $id);
	header("location:konfigurasi_bahasa.php?pesan_error=SUCCESS DELETE DATA."); 
} 
}/* Selesai Delete data */

 
} 
?>