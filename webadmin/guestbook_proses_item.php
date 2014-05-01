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


if( $action=='item_tambahdata' ){  


if( $judul=='' ){

	header("location:guestbook_item.php?action=FormEntry&pesan_error=FAILED ! PLEASE FILL THE TITLE"); /* Kembali ke halaman  sebelumnya */
	
}else{

$id = modeling_guestbook_item_createid( $tbl_guestbook ); 

$idupline = "";

$judul = antiinjeksi(($_POST['judul']));
$deskripsi  = antiinjeksi(($_POST['deskripsi']));
$deskripsi = nl2br($deskripsi);

$tglpost = $tanggalhariini;
$jampost = $jamsaatini;

$tgltampil =  $_POST['tgltampil'];
$jamtampil  = $_POST['jamtampil'] . ":" . $_POST['menittampil'] . ":00";

$timeunix = $tahun_array . $tanggal_array . $bulan_array . $_POST['jamtampil'] . $_POST['menittampil'] . "00";

$statustampil  = $_POST['statustampil'];  
if( $statustampil == "" || $statustampil == "none"){
	$statustampil = 0;
}else{
	$statustampil = 1;
}
$statustampil = $statustampil;
$statustampil = 0;


$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];


$sql_hitungdata = modeling_guestbook_item_periksajudul( $tbl_guestbook, $judul ); 
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ 

	header("location:guestbook_item.php?action=FormEntry&pesan_error=FAILED ! TITLE ALREADY EXIST."); /* Kembali ke halaman  sebelumnya */
		
}else{

modeling_guestbook_item_tambahdata(
		$tbl_guestbook,
		$id,$idupline,$judul,
		$deskripsi,$tglpost,$jampost,
		$tgltampil,$jamtampil,$timeunix,
		$statustampil,$urutan,$idusers,
		$idadmin
	);
	 
	header("location:guestbook_item.php?action=ViewList&pesan_error=SUCCESS ADD DATA !");  
}}}  




if( $action=="item_updatedata" ){  

$id = $_POST['id'];
 
if( $judul=='' ){

	header("location:guestbook_item.php?id=$id&action=FormEntry&pesan_error=PLEASE FILL TITLE"); /* Kembali ke halaman  sebelumnya */
	
}else{


$idupline = "";

$judul = antiinjeksi(($_POST['judul']));
$deskripsi  = antiinjeksi(($_POST['deskripsi']));
$deskripsi = nl2br($deskripsi);
//$tglpost = $tanggalhariini;
//$jampost = $jamsaatini;
	
$tgltampil =  $_POST['tgltampil'];
$jamtampil  = $_POST['jamtampil'];

$timeunix = $tgltampil . $jamtampil;

$statustampil  = $_POST['statustampil']; /* STATUS TAMPIL */
if( $statustampil == "" || $statustampil == "none"){
	$statustampil = 0;
}else{
	$statustampil = 1;
}
$statustampil = $statustampil;

$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];

$sql_hitungdata = modeling_guestbook_item_periksajudul( $tbl_guestbook, $judul );  
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ 

	header("location:guestbook_item.php?id=$id&action=FormEntry&pesan_error=FAILED ! , TITLE EXIST !."); /* Kembali ke halaman  sebelumnya */
		
}else{
 	
 
modeling_guestbook_item_updatedata(
			$tbl_guestbook,
			$id,$idupline,$judul,
			$deskripsi,
			$tgltampil,$jamtampil,$timeunix,
			$statustampil,$urutan,$idusers,
			$idadmin
			);
	 
	 
	 	header("location:guestbook_item.php?id=$id&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); /* Kembali ke halaman  sebelumnya */

}}} 
 

 	
/* ---- */
if( $action=="item_statustampil" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_item = modeling_guestbook_item_lihatdetail( $tbl_guestbook, $id );
	$id = $row_item->id;
	modeling_guestbook_item_statustampil( $tbl_guestbook, $statustampil, $id );
	header("location:guestbook_item.php?id=$id&action=ViewList&pesan_error=UPDATE SUCCESSFULLY."); /* Kembali ke halaman  sebelumnya */
}

 

if( $action=="item_hapusdata" ){ /* Proses Update item*/

	$id = $_GET['id'];
 
	$row_item = modeling_guestbook_item_lihatdetail( $tbl_guestbook, $id );
	$root_image = "../";
	$gambarkecil = $row_item->gambarkecil;
	$gambarbesar = $row_item->gambarbesar;
	$direktorigambar = $row_item->direktorigambar;
	$Delete_gambarkecil = $root_image . $direktorigambar . $gambarkecil ;
	$Delete_gambarbesar = $root_image . $direktorigambar . $gambarbesar;
	//@//unlink($Delete_gambarkecil);
	//@//unlink($Delete_gambarbesar);
	modeling_guestbook_item_hapusdata( $tbl_guestbook, $id);
	header("location:guestbook_item.php?action=ViewList&pesan_error=SUCCESS DELETE DATA."); /* Kembali ke halaman  sebelumnya */
}/* END ITEM Delete DATA */	
	

}/* End Session Filter */
?>