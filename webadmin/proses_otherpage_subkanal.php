<?php
session_name("CUST");
session_start();

$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
}else{

include"kelas_function.php";

if( $action=="subkanal_tambahdata" ){ /* Proses Tambah Data Sub Kanal */

$idkategori = $_POST['idkategori'];

if( $keterangan=='' ){

	header("location:otherpage_kanal.php?idkategori=$idkategori&mode=SubSection&pesan_error=PLEASE FILL TITLE"); /* Kembali ke halaman  sebelumnya */
	
}else{

$id = otherpageKategoriSub_CreateID( $tbl_otherpagekategorisub ); 
$idupline = $idkategori;
$keterangan = $keterangan;
$keteranganinggris = $keterangan; /* Translate Ke Inggris */
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

$sql_hitungdata = otherpageKategoriSub_PeriksaJudul( $tbl_otherpagekategorisub, $idkategori, $keterangan, $keteranganinggris ); /* Periksa Judul Sub Kategori otherpage, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:otherpage_kanal.php?idkategori=$idkategori&mode=SubSection&pesan_error=FAILED ADD SUB SECTION  !,THE TITLE IS ALREADY EXIST !"); /* Kembali ke halaman  sebelumnya */
	
}else{

/* Proses Upload File IMAGE */
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
	$loc_file = "filemodul/otherpage/file_subkanal/";
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
	$loc_file = "filemodul/otherpage/file_subkanal/";
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
	$loc_file = "filemodul/otherpage/file_subkanal/";
	$location_dir =  $loc_root . $loc_file;
		if (!is_dir( $location_dir )) {  
			Create_Direktori( $location_dir );
		}
		$uploaddir = $location_dir;
		$new_name = "otherpage_img_background_" . $keterangan;
		$imagefile =  $loc_file;
		$imagebackground = Upload_File( $new_name, $uploaddir, $temp_file_background, $size_file_background, $nama_file_background );
} /* End Upload File header Kanal */

/* End Proses Upload IMAGE */


/* Tambah data ke Database */
	otherpageKategoriSub_TambahData(
		$tbl_otherpagekategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homehalamantampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	); /* Proses tambah data ke database. */
	 
	header("location:otherpage_kanal.php?idkategori=$idkategori&mode=SubSection&pesan_error=SUCCESS ADD DATA !"); /* Kembali ke halaman  sebelumnya */
}}} /* END SUB KANAL TAMBAH DATA */

/* ---- */




/* Start Update Sub Kategori */
if( $action=="subkanal_updatedata"){ /* UPDATE SUB KANAL */

$id = $_POST['id'];
$idkategori = $_POST['idkategori'];
	if( $keterangan=='' ){
		header("location:otherpage_kanal.php?idkategori=$idkategori&mode=SubSection&id=$id&action=EditData&pesan_error=PLEASE FILL THE TITLE"); /* Kembali ke halaman  sebelumnya */
	}else{ 
	
$idupline = $idkategori;
$keterangan = $keterangan;
$keteranganinggris = $keterangan; /* Translate Ke Inggris */
$urutan = $urutan;
$posisi = $posisi;
$keyword = $_POST['keyword'];

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

$sql_hitungdata = otherpageKategoriSub_PeriksaJudul( $tbl_otherpagekategorisub, $idkategori, $keterangan, $keteranganinggris ); /* Periksa Judul Sub Kategori otherpage, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:otherpage_kanal.php?idkategori=$idkategori&mode=SubSection&pesan_error=FAILED ADD SUB SECTION !, THE TITLE IS ALREADY EXIST !"); /* Kembali ke halaman  sebelumnya */
	
}else{


/* Proses Upload IMAGE SUB KATEGORI */
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
	$loc_file = "filemodul/otherpage/file_subkanal/";
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
	$loc_file = "filemodul/otherpage/file_subkanal/";
	$location_dir =  $loc_root . $loc_file;
	if (!is_dir( $location_dir )){
			Create_Direktori( $location_dir );
	}
	$imagefile =  $loc_file;
	$uploaddir = $location_dir;
	$new_name = "otherpage_img_header_".$keterangan;
	$Delete_image_header = $imagefile . $imageheader;
	//@//@//unlink($Delete_image_header);	 
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
	$loc_file = "filemodul/otherpage/file_subkanal/";
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


	 
otherpageKategoriSub_UpdateData(
		$tbl_otherpagekategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homehalamantampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	);

	 	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&id=" . $id . "&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); /* Kembali ke halaman  sebelumnya */

}}} /* END UPDATE SUB KANAL  */




/* START UPDATE IMAGE FILE */
/* Image Logo Update */
if( $action=="subkanal_updateimage_logo" ){
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $id );
	$root_image = "../";
	$id = $row_subkanal->id;
	$idkategori = $row_subkanal->idkategori;
	$imagefile = $row_subkanal->imagefile;
	$imagelogo = $row_subkanal->imagelogo;
	$image_subkanal = $root_image . $imagefile . $imagelogo;
	//@//unlink($image_subkanal);
	otherpageKategoriSub_DeleteImageLogo( $tbl_otherpagekategorisub, $id );
	header("location:otherpage_kanal.php?action=EditData&idkategori=$idkategori&mode=SubSection&id=$id&pesan_error=SUCCESS DELETE IMAGE DATA"); 
}
}
	
	
	
/* Image Header Update */
if( $action=="subkanal_updateimage_header" ){
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $id );
	$root_image = "../";
	$id = $row_subkanal->id;
	$idkategori = $row_subkanal->idkategori;
	$imagefile = $row_subkanal->imagefile;
	$imageheader = $row_subkanal->imageheader;
	$image_subkanal = $root_image . $imagefile . $imageheader;
	//@//unlink($image_subkanal);
	otherpageKategoriSub_DeleteImageHeader( $tbl_otherpagekategorisub, $id );
	header("location:otherpage_kanal.php?action=EditData&idkategori=$idkategori&mode=SubSection&id=$id&pesan_error=SUCCESS DELETE DATA."); 
}
}



/* Image Background Update */
if( $action=="subkanal_updateimage_background" ){
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $id );
	$root_image = "../";
	$id = $row_subkanal->id;
	$idkategori = $row_subkanal->idkategori;
	$imagefile = $row_subkanal->imagefile;
	$imagebackground = $row_subkanal->imagebackground;
	$image_subkanal = $root_image . $imagefile . $imagebackground;
	//@//unlink($image_subkanal);
	otherpageKategoriSub_DeleteImageBackground( $tbl_otherpagekategorisub, $id );
	header("location:otherpage_kanal.php?action=EditData&idkategori=$idkategori&mode=SubSection&id=$id&pesan_error=SUCCESS DELETE IMAGE DATA"); 
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */
/* END UPDATE IMAGE FILE */
	
	
	
/* TAMPIL KANAL - STATUS TAMPIL */
if( $action=="kanal_statustampil" ){ 
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_StatusTampil( $tbl_otherpagekategori, $statustampil, $id );
	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS PUBLISH DATA."); 
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */


/* TAMPIL KANAL - HOMEhalaman TAMPIL */
if( $action=="kanal_homehalamantampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_HomehalamanTampil( $tbl_otherpagekategori, $statustampil, $id );
	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS PUBLISH DATA"); 
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */




/* MENU ATAS 1 TAMPIL */
if( $action=="kanal_menuatas1tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_menuatas1_tampil( $tbl_otherpagekategori, $statustampil, $id );
header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS PUBLISH DATA");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */



/* MENU ATAS 1 TAMPIL */
if( $action=="kanal_menuatas2tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_MenuTampil2( $tbl_otherpagekategori, $statustampil2, $id );
	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS PUBLISH DATA");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */




/* MENU BAWAH 1 TAMPIL */
if( $action=="kanal_menubawah1tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_MenuTampil2( $tbl_otherpagekategori, $statustampil2, $id );
	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS PUBLISH DATA");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */



/* MENU BAWAH 2 TAMPIL */
if( $action=="kanal_menubawah2tampil" ){  
$KodeKeamananhalaman  = "token_otherpage";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	header("location:otherpage_kanal.php?pesan_error=FAILED ! ACCESS DENIED.");  
}else{
	$id = $_GET['id'];
	$statustampil = $_GET['status'];
	$row_kanal = Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id );
	$idkategori = $row_kanal->id;
	otherpageKategori_MenuTampil2( $tbl_otherpagekategori, $statustampil2, $id );
	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS PUBLISH DATA");  
}
}
/* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- *//* ---- */





/* ---- */

if( $action=="subkanal_hapusdata" ){ /* Proses Update Kanal*/
	$id = $_GET['id'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_subkanal = Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $id );
	$idkategori = $row_subkanal->idkategori;
	$root_image = "../";
	$imagefile = $row_subkanal->imagefile;
	$imagelogo = $row_subkanal->imagelogo;
	$image_subkanal = $root_image . $imagefile . $imagelogo;
	//@//unlink($image_subkanal);
	otherpageKategoriSub_hapusdata( $tbl_otherpagekategorisub, $id );
	header("location:otherpage_kanal.php?idkategori=" . $idkategori . "&mode=SubSection&pesan_error=SUCCESS DELETE DATA."); /* Kembali ke halaman  sebelumnya */
}/* END KANAL Delete DATA */	
/* --------------------------- END SUB KANAL PROSESING ----------------------------------------------------------------------------------- */ 
	




/* END */	
}/* End Session Filter */
?>