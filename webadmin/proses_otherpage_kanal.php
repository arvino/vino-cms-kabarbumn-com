<?php
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];


if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN.');
}else{

include"kelas_function.php";

/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */

if( $action=='kanal_tambahdata' ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	header("location:otherpage_kanal.php?pesan_error=ERROR !, YOU CAN'T DO THAT.");  
	
}else{


if( $keterangan =='' ){

	header("location:otherpage_kanal.php?pesan_error=PLEASE COMPLETE FILL THE TEXT BOX.");  
	
}else{

$id = otherpageKategori_CreateID( $tbl_otherpagekategori ); 
$idupline = $idupline;
$keterangan = $keterangan;
$keteranganinggris = $keterangan;  
$urutan = $urutan;
$posisi = $posisi;

	/* STATUS TAMPIL SUB KATEGORI */
	if( $statustampil == "" || $statustampil == "none"){
		$statustampil = 0;
	}else{
		$statustampil = 1;
	}
	$statustampil = $statustampil;
	
	/* HOMEhalaman TAMPIL SUB KATEGORI */
	if( $homehalamantampil == "" || $homehalamantampil == "none"){
		$homehalamantampil = 0;
	}else{
		$homehalamantampil = 1;
	}	
	$homehalamantampil = $homehalamantampil;
	
	/* MENU ATAS 1 SUB KATEGORI  */
	if( $menuatas1 == "" || $menuatas1 == "none"){
		$menuatas1 = 0;
	}else{
		$menuatas1 = 1;
	}		
	$menuatas1 =  $menuatas1;

	/* MENU ATAS 2 SUB KATEGORI  */
	if( $menuatas2 == "" || $menuatas2 == "none"){
		$menuatas2 = 0;
	}else{
		$menuatas2 = 1;
	}		
	$menuatas2 =  $menuatas2;

	/* MENU BAWAH 1 SUB KATEGORI  */
	if( $menubawah1 == "" || $menubawah1 == "none"){
		$menubawah1 = 0;
	}else{
		$menubawah1 = 1;
	}		
	$menubawah1 =  $menubawah1;

	/* MENU BAWAH 2 SUB KATEGORI  */
	if( $menubawah2 == "" || $menubawah2 == "none"){
		$menubawah2 = 0;
	}else{
		$menubawah2 = 1;
	}		
	$menubawah2 =  $menubawah2;


	$hit = 1;

$sql_hitungdata = otherpageKategori_Periksaketerangan( $tbl_otherpagekategori, $keterangan, $keteranganinggris );  
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ 

	header("location:otherpage_kanal.php?pesan_error=ERROR !, DUPLICATE NAME."); 
		
}else{


$nama_file_logo = $_FILES['image_file_logo']['name'];
$temp_file_logo = $_FILES['image_file_logo']['tmp_name'];
$size_file_logo = $_FILES['image_file_logo']['size'];

//$imagefile = "";
//$imagelogo = "";
//$imageheader = "";
//$imagebackground = "";

if( $image_file_logo == "" ){ /* JIka tida ada upload file logo */
	$imagelogo = "";
}else{ /* Jika there is upload file logo */
	$loc_root = "../";	
	$loc_file = "filemodul/otherpage/file_kanal/";
	$location_dir =  $loc_root . $loc_file;
		if (!is_dir( $location_dir )) {  
			Create_Direktori( $location_dir );
		}
		$uploaddir = $location_dir;
		$new_name = "otherpage_img_logo_" . $keterangan;
		$imagefile =  $loc_file;
		$imagelogo = Upload_File( $new_name, $uploaddir, $temp_file_logo, $size_file_logo, $nama_file_logo );
} /* End Upload File Logo Kanal */



$nama_file_header = $_FILES['image_file_header']['name'];
$temp_file_header = $_FILES['image_file_header']['tmp_name'];
$size_file_header = $_FILES['image_file_header']['size'];

if( $image_file_header == "" ){ /* JIka tida ada upload file header */
	$imageheader = "";
}else{ /* Jika there is upload file header */
	$loc_root = "../";	
	$loc_file = "filemodul/otherpage/file_kanal/";
	$location_dir =  $loc_root . $loc_file;
		if (!is_dir( $location_dir )) {  
			Create_Direktori( $location_dir );
		}
		$uploaddir = $location_dir;
		$new_name = "otherpage_img_header_" . $keterangan;
		$imagefile =  $loc_file;
		$imageheader = Upload_File( $new_name, $uploaddir, $temp_file_header, $size_file_header, $nama_file_header );
} /* End Upload File header Kanal */
	 


$nama_file_background = $_FILES['image_file_background']['name'];
$temp_file_background = $_FILES['image_file_background']['tmp_name'];
$size_file_background  = $_FILES['image_file_background']['size'];
 
if( $image_file_background == "" ){ /* JIka tida ada upload file background */
	$imagebackground = "";
}else{ /* Jika there is upload file background */
	$loc_root = "../";	
	$loc_file = "filemodul/otherpage/file_kanal/";
	$location_dir =  $loc_root . $loc_file;
		if (!is_dir( $location_dir )) {  
			Create_Direktori( $location_dir );
		}
		$uploaddir = $location_dir;
		$new_name = "otherpage_img_background_" . $keterangan;
		$imagefile =  $loc_file;
		$imagebackground = Upload_File( $new_name, $uploaddir, $temp_file_background, $size_file_background, $nama_file_background );
} /* End Upload File header Kanal */


	 
/* Simpan data ke database */
	otherpageKategori_TambahData( 
		$tbl_otherpagekategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homehalamantampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword
	); 
	 
	header("location:otherpage_kanal.php?pesan_error=SUCCESS SUBMIT DATA !.");  
}}}  
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
/* End Tambah data Kategori */



/* Start Update Kategori */
if( $action=="kanal_updatedata" ){ 

$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{



$id = $_POST['id'];

if( $keterangan=='' ){

	header("location:otherpage_kanal.php?action=EditData&idkategori=" . $idkategori . "&pesan_error=PLEASE FILL THE FORM COMPLETELY."); 

}else{ 

$idupline = $idupline;
$keterangan = $keterangan;
$keteranganinggris = $keterangan;  
$urutan = $urutan;
$posisi = $posisi;

	/* STATUS TAMPIL SUB KATEGORI */
	if( $statustampil == "" || $statustampil == "none"){
		$statustampil = 0;
	}else{
		$statustampil = 1;
	}
	$statustampil = $statustampil;
	
	/* HOMEhalaman TAMPIL SUB KATEGORI */
	if( $homehalamantampil == "" || $homehalamantampil == "none"){
		$homehalamantampil = 0;
	}else{
		$homehalamantampil = 1;
	}	
	$homehalamantampil = $homehalamantampil;
	
	/* MENU ATAS 1 SUB KATEGORI  */
	if( $menuatas1 == "" || $menuatas1 == "none"){
		$menuatas1 = 0;
	}else{
		$menuatas1 = 1;
	}		
	$menuatas1 =  $menuatas1;

	/* MENU ATAS 2 SUB KATEGORI  */
	if( $menuatas2 == "" || $menuatas2 == "none"){
		$menuatas2 = 0;
	}else{
		$menuatas2 = 1;
	}		
	$menuatas2 =  $menuatas2;

	/* MENU BAWAH 1 SUB KATEGORI  */
	if( $menubawah1 == "" || $menubawah1 == "none"){
		$menubawah1 = 0;
	}else{
		$menubawah1 = 1;
	}		
	$menubawah1 =  $menubawah1;

	/* MENU BAWAH 2 SUB KATEGORI  */
	if( $menubawah2 == "" || $menubawah2 == "none"){
		$menubawah2 = 0;
	}else{
		$menubawah2 = 1;
	}		
	$menubawah2 =  $menubawah2;

	$hit = 1;

$sql_hitungdata = otherpageKategori_Periksaketerangan( $tbl_otherpagekategori, $keterangan, $keteranganinggris ); 
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){  

	header("location:otherpage_kanal.php?id=$id&action=EditData&pesan_error=FAILED !, DUPLICATE DATA.");  
		
}else{


$nama_file_logo = $_FILES['image_file_logo']['name'];
$temp_file_logo = $_FILES['image_file_logo']['tmp_name'];
$size_file_logo = $_FILES['image_file_logo']['size'];

//$imagefile = "";
//$imagelogo = "";
//$imageheader = "";
//$imagebackground = "";

if( $image_file_logo == "" ){  /* Update Upload File Logo */
	$imagelogo = $_POST['imagelogo'];
}else{
	$loc_root = "../";	
	$loc_file = "filemodul/otherpage/file_kanal/";
	$location_dir =  $loc_root . $loc_file;
	if (!is_dir( $location_dir )){
			Create_Direktori( $location_dir );
	}
	$imagefile =  $loc_file;
	$uploaddir = $location_dir;
	$new_name = "otherpage_img_logo_".$keterangan;
	$Delete_image_logo = $imagefile . $imagelogo;
	//@//@//unlink($Delete_image_logo);
	$imagefile = $loc_file;
	$imagelogo = Upload_File( $new_name, $uploaddir, $temp_file_logo, $size_file_logo, $nama_file_logo );
}


$nama_file_header = $_FILES['image_file_header']['name'];
$temp_file_header = $_FILES['image_file_header']['tmp_name'];
$size_file_header = $_FILES['image_file_header']['size'];

if( $image_file_header == "" ){  
	$imageheader = $_POST['imageheader'];
}else{
	$loc_root = "../";	
	$loc_file = "filemodul/otherpage/file_kanal/";
	$location_dir =  $loc_root . $loc_file;
	if (!is_dir( $location_dir )){
			Create_Direktori( $location_dir );
	}
	$imagefile =  $loc_file;
	$uploaddir = $location_dir;
	$new_name = "otherpage_img_header_".$keterangan;
	$Delete_image_header = $imagefile . $imageheader;

	$imagefile = $loc_file;
	$imageheader = Upload_File( $new_name, $uploaddir, $temp_file_header, $size_file_header, $nama_file_header );
}



$nama_file_background = $_FILES['image_file_background']['name'];
$temp_file_background = $_FILES['image_file_background']['tmp_name'];
$size_file_background  = $_FILES['image_file_background']['size'];

if( $image_file_background == "" ){  /* Update upload file background kategori */
	$imagebackground = $_POST['imagebackground'];
}else{
	$loc_root = "../";	
	$loc_file = "filemodul/otherpage/file_kanal/";
	$location_dir =  $loc_root . $loc_file;
	if (!is_dir( $location_dir )){
			Create_Direktori( $location_dir );
	}
	$imagefile = $loc_file;
	$uploaddir = $location_dir;
	$new_name = "otherpage_img_background_".$keterangan;
	$Delete_image_background = $imagefile . $imagebackground;
	//@//@//unlink($Delete_image_background);
	$imagefile = $loc_file;
	$imagebackground = Upload_File( $new_name, $uploaddir, $temp_file_background, $size_file_background, $nama_file_background );
}




/* Simpan data */
otherpageKategori_UpdateData(
		$tbl_otherpagekategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homehalamantampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword
	);
	 
	 	header("location:otherpage_kanal.php?id=$id&action=EditData&pesan_error=SUCCESS SUBMIT DATA !."); 

}}} 
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
/* END UPDATE DATA... KATEGORI */	
	
	
	
	
/* Image Logo Update */
if( $action=="kanal_updateimage_logo" ){

$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$root_image = "../";
	$id = $row_kanal->id;
	$imagefile = $row_kanal->imagefile;
	$imagelogo = $row_kanal->imagelogo;
	$image_kanal = $root_image . $imagefile . $imagelogo;
	//@//unlink($image_kanal);
	otherpageKategori_update_image_logo( $tbl_otherpagekategori, $id );
	header("location:otherpage_kanal.php?action=EditData&id=$id&pesan_error=SUCCESS DELETE IMAGE !."); 
}
}


	
/* Image Header Update */
if( $action=="kanal_updateimage_header" ){

$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED");  
}else{
	$id = $_GET['id'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$root_image = "../";
	$id = $row_kanal->id;
	$imagefile = $row_kanal->imagefile;
	$imageheader = $row_kanal->imageheader;
	$image_kanal = $root_image . $imagefile . $imageheader;
	//@//unlink($image_kanal);
	otherpageKategori_update_image_header( $tbl_otherpagekategori, $id );
	header("location:otherpage_kanal.php?action=EditData&id=$id&pesan_error=SUCCESS DELETE IMAGE."); 
}
}



/* Image Background Update */
if( $action=="kanal_updateimage_background" ){
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED!, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$root_image = "../";
	$id = $row_kanal->id;
	$imagefile = $row_kanal->imagefile;
	$imagebackground = $row_kanal->imagebackground;
	$image_kanal = $root_image . $imagefile . $imagebackground;
	//@//unlink($image_kanal);
	otherpageKategori_update_image_background( $tbl_otherpagekategori, $id );
	header("location:otherpage_kanal.php?action=EditData&id=$id&pesan_error=SUCCESS DELETE IMAGE !."); 
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
	
	
	
	
/* TAMPIL KANAL - STATUS TAMPIL */
if( $action=="kanal_statustampil" ){ 
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_StatusTampil( $tbl_otherpagekategori, $statustampil, $id );
	header("location:otherpage_kanal.php?pesan_error=SUCCESS PUBLISH DATA."); 
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */




/* TAMPIL KANAL - HOMEhalaman TAMPIL */
if( $action=="kanal_homehalamantampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_HomehalamanTampil( $tbl_otherpagekategori, $statustampil, $id );
	header("location:otherpage_kanal.php?pesan_error=SUCCESS PUBLISH DATA."); 
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */



/* MENU ATAS 1 TAMPIL */
if( $action=="kanal_menuatas1tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_menuatas1_tampil( $tbl_otherpagekategori, $statustampil, $id );
header("location:otherpage_kanal.php?pesan_error=SUCCESS PUBLISH DATA.");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */




/* MENU ATAS 1 TAMPIL */
if( $action=="kanal_menuatas2tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_MenuTampil2( $tbl_otherpagekategori, $statustampil2, $id );
	header("location:otherpage_kanal.php?pesan_error=SUCCESS PUBLISH DATA.");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */





/* MENU BAWAH 1 TAMPIL */
if( $action=="kanal_menubawah1tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_MenuTampil2( $tbl_otherpagekategori, $statustampil2, $id );
	header("location:otherpage_kanal.php?pesan_error=SUCCESS PUBLISH DATA");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */




/* MENU BAWAH 2 TAMPIL */
if( $action=="kanal_menubawah2tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED !, ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_MenuTampil2( $tbl_otherpagekategori, $statustampil2, $id );
	header("location:otherpage_kanal.php?pesan_error=SUCCESS PUBLISH DATA");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */


/* DELETE DATA KATEGORI */
if( $action=="kanal_hapusdata" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
	
}else{


	$id = $_GET['id'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$root_image = "../";
	$imagefile = $row_kanal->imagefile;
	$imagelogo = $row_kanal->imagelogo;
	$image_kanal = $root_image . $imagefile . $imagelogo;

	otherpageKategori_hapusdata( $tbl_otherpagekategori, $id );
	header("location:otherpage_kanal.php?pesan_error=SUCCESS DELETE DATA."); 
} 
}	
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */

 
} 
?>