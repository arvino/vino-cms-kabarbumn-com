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
/* ---- */
/* Start Item Tambah Data */
if( $action=='item_tambahdata' ){ /* item banner TAMBAH DATA */

$idkategori = $_POST['idkategori'];
if($idkategori ==""){
$idkategori = "0";
}

$idkategorisub = $_POST['idkategorisub'];
if($idkategorisub ==""){
	$idkategorisub = "0";
}

if( $judul=='' ){

	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=FormEntry&pesan_error=PLEASE FILL TITLE"); /* Kembali ke halaman  sebelumnya */
	
}else{

	$id = bannerItem_CreateID( $tbl_banner ); 
	
	$idupline = $idkategori . $idkategorisub;
	
	$judul = htmlspecialchars($_POST['judul']);
	$deskripsi  = htmlspecialchars($_POST['deskripsi']);
	
	$tglpost = $tanggalhariini;
	$jampost = $jamsaatini;

	$Tanggaltampil = $_POST['tgltampil'];
	$arrTgl = explode("-",$Tanggaltampil);

	$tahun_tampil_array = $arrTgl['2'];
	if($tahun_tampil_array=='1')$tahun_tampil_array="01";
	if($tahun_tampil_array=='2')$tahun_tampil_array="02";
	if($tahun_tampil_array=='3')$tahun_tampil_array="03";
	if($tahun_tampil_array=='4')$tahun_tampil_array="04";
	if($tahun_tampil_array=='5')$tahun_tampil_array="05";
	if($tahun_tampil_array=='6')$tahun_tampil_array="06";
	if($tahun_tampil_array=='7')$tahun_tampil_array="07";
	if($tahun_tampil_array=='8')$tahun_tampil_array="08";
	if($tahun_tampil_array=='9')$tahun_tampil_array="09";

	
	$bulan_tampil_array = $arrTgl['1'];
	if($bulan_tampil_array=='1')$bulan_tampil_array="01";
	if($bulan_tampil_array=='2')$bulan_tampil_array="02";
	if($bulan_tampil_array=='3')$bulan_tampil_array="03";
	if($bulan_tampil_array=='4')$bulan_tampil_array="04";
	if($bulan_tampil_array=='5')$bulan_tampil_array="05";
	if($bulan_tampil_array=='6')$bulan_tampil_array="06";
	if($bulan_tampil_array=='7')$bulan_tampil_array="07";
	if($bulan_tampil_array=='8')$bulan_tampil_array="08";
	if($bulan_tampil_array=='9')$bulan_tampil_array="09";

	$tanggal_tampil_array = $arrTgl['0'];
	if($tanggal_tampil_array=='1')$tanggal_tampil_array="01";
	if($tanggal_tampil_array=='2')$tanggal_tampil_array="02";
	if($tanggal_tampil_array=='3')$tanggal_tampil_array="03";
	if($tanggal_tampil_array=='4')$tanggal_tampil_array="04";
	if($tanggal_tampil_array=='5')$tanggal_tampil_array="05";
	if($tanggal_tampil_array=='6')$tanggal_tampil_array="06";
	if($tanggal_tampil_array=='7')$tanggal_tampil_array="07";
	if($tanggal_tampil_array=='8')$tanggal_tampil_array="08";
	if($tanggal_tampil_array=='9')$tanggal_tampil_array="09";
	
	
	$tgltampil = $tahun_tampil_array .'-'. $bulan_tampil_array  .'-'. $tanggal_tampil_array;
	$jamtampil = $_POST['jamtampil'];
	
	$timeunix = $tahun_array . $tanggal_array . $bulan_array . $_POST['jamtampil'];


	$Tanggalselesai = $_POST['tglselesai'];
	$arrTglselesai = explode("-",$Tanggalselesai);

	$tahun_selesai_array = $arrTglselesai['2'];
	if($tahun_selesai_array=='1')$tahun_selesai_array="01";
	if($tahun_selesai_array=='2')$tahun_selesai_array="02";
	if($tahun_selesai_array=='3')$tahun_selesai_array="03";
	if($tahun_selesai_array=='4')$tahun_selesai_array="04";
	if($tahun_selesai_array=='5')$tahun_selesai_array="05";
	if($tahun_selesai_array=='6')$tahun_selesai_array="06";
	if($tahun_selesai_array=='7')$tahun_selesai_array="07";
	if($tahun_selesai_array=='8')$tahun_selesai_array="08";
	if($tahun_selesai_array=='9')$tahun_selesai_array="09";
	
	$bulan_selesai_array = $arrTglselesai['1'];
	if($bulan_selesai_array=='1')$bulan_selesai_array="01";
	if($bulan_selesai_array=='2')$bulan_selesai_array="02";
	if($bulan_selesai_array=='3')$bulan_selesai_array="03";
	if($bulan_selesai_array=='4')$bulan_selesai_array="04";
	if($bulan_selesai_array=='5')$bulan_selesai_array="05";
	if($bulan_selesai_array=='6')$bulan_selesai_array="06";
	if($bulan_selesai_array=='7')$bulan_selesai_array="07";
	if($bulan_selesai_array=='8')$bulan_selesai_array="08";
	if($bulan_selesai_array=='9')$bulan_selesai_array="09";

	$tanggal_selesai_array = $arrTglselesai['0'];
	if($tanggal_selesai_array=='1')$tanggal_selesai_array="01";
	if($tanggal_selesai_array=='2')$tanggal_selesai_array="02";
	if($tanggal_selesai_array=='3')$tanggal_selesai_array="03";
	if($tanggal_selesai_array=='4')$tanggal_selesai_array="04";
	if($tanggal_selesai_array=='5')$tanggal_selesai_array="05";
	if($tanggal_selesai_array=='6')$tanggal_selesai_array="06";
	if($tanggal_selesai_array=='7')$tanggal_selesai_array="07";
	if($tanggal_selesai_array=='8')$tanggal_selesai_array="08";
	if($tanggal_selesai_array=='9')$tanggal_selesai_array="09";
	
$tglselesai = $tahun_selesai_array .'-'. $bulan_selesai_array .'-'. $tanggal_selesai_array;
$jamselesai = $_POST['jamselesai'];

$dilihat  = $_POST['dilihat'];


$statustampil  = $_POST['statustampil']; /* STATUS TAMPIL */
if( $statustampil == "" || $statustampil == "none"){
	$statustampil = 0;
}else{
	$statustampil = 1;
}
$statustampil = $statustampil;
$statustampil = 1;



$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];

$linkurl = htmlspecialchars($_POST['linkurl']); 
  

$sql_hitungdata = bannerItem_PeriksaJudul( $tbl_banner, $judul ); /* Periksa Judul Kategori banner, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=FormEntry&pesan_error=FAILED ! DATA ALREADY EXIST"); /* Kembali ke halaman  sebelumnya */
		
}else{



	$nama_file = $_FILES['filebanner']['name'];
	$temp_file = $_FILES['filebanner']['tmp_name']; 
	$ukuran_file = $_FILES['filebanner']['size'];
	$tipe_file = $_FILES['filebanner']['type'];
	
	
if( $filebanner == "" ){

	$namafile = "";
	$direktorigambar = "";

}else{



	$loc_root = "../";	
	$loc_file = "filemodul/banner/file_item-$idkategori-$idkategorisub-$tanggalhariini/";
	$location_dir =  $loc_root . $loc_file;
	
		
	if (!is_dir( $location_dir )) {  
		mkdir( $location_dir, 0777 ,true); 
		chmod( $location_dir, 0755);
	}

	
	$uploaddir = $location_dir;
	 
	$Delete_gambaritem_kecil = $loc_root . $direktorigambar . $namafile;
	
	$new_name_gg = potong_judul( $judul )  . "_file_banner_";
	
	$direktorigambar = $loc_file;
	
	$namafile = Upload_File( $new_name_gg, $uploaddir, $temp_file, $ukuran_file, $nama_file );
	

}

bannerItem_TambahData(
		$tbl_banner,
		$id,$idupline,
		$idkategori,$idkategorisub,
		$judul,$deskripsi,$tglpost,
		$jampost,$tgltampil,
		$jamtampil,$tglselesai,
		$jamselesai,$timeunix,
		$dilihat,$statustampil,$urutan,
		$idusers,$idadmin,
		$direktorigambar,$namafile,
		$linkurl, $target
	);
	 
	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&pesan_error=SUCCESS ADD DATA !"); /* Kembali ke halaman  sebelumnya */ 
}}}  




/* ---- */
/* Start Update Item Data */
if( $action=="item_updatedata" ){ /* Proses Update item*/

$id = $_POST['id'];
$idkategori = $_POST['idkategori'];
if($idkategori ==""){
$idkategori = "0";
}


$idkategorisub = $_POST['idkategorisub'];
if($idkategorisub ==""){
$idkategorisub = "0";
}

if( $judul=='' ){

	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=FormEntry&pesan_error=PLEASE FILL THE TITLE."); /* Kembali ke halaman  sebelumnya */
	
}else{

$idupline = $idkategori . $idkategorisub;

$judul = htmlspecialchars($_POST['judul']);

$deskripsi  = htmlspecialchars($_POST['deskripsi']);

$tglpost = $tanggalhariini;

$jampost = $jamsaatini;


	$Tanggaltampil = $_POST['tgltampil'];
	$arrTgl = explode("-",$Tanggaltampil);

	$tahun_tampil_array = $arrTgl['2'];
	if($tahun_tampil_array=='1')$tahun_tampil_array="01";
	if($tahun_tampil_array=='2')$tahun_tampil_array="02";
	if($tahun_tampil_array=='3')$tahun_tampil_array="03";
	if($tahun_tampil_array=='4')$tahun_tampil_array="04";
	if($tahun_tampil_array=='5')$tahun_tampil_array="05";
	if($tahun_tampil_array=='6')$tahun_tampil_array="06";
	if($tahun_tampil_array=='7')$tahun_tampil_array="07";
	if($tahun_tampil_array=='8')$tahun_tampil_array="08";
	if($tahun_tampil_array=='9')$tahun_tampil_array="09";

	
	$bulan_tampil_array = $arrTgl['1'];
	if($bulan_tampil_array=='1')$bulan_tampil_array="01";
	if($bulan_tampil_array=='2')$bulan_tampil_array="02";
	if($bulan_tampil_array=='3')$bulan_tampil_array="03";
	if($bulan_tampil_array=='4')$bulan_tampil_array="04";
	if($bulan_tampil_array=='5')$bulan_tampil_array="05";
	if($bulan_tampil_array=='6')$bulan_tampil_array="06";
	if($bulan_tampil_array=='7')$bulan_tampil_array="07";
	if($bulan_tampil_array=='8')$bulan_tampil_array="08";
	if($bulan_tampil_array=='9')$bulan_tampil_array="09";

	$tanggal_tampil_array = $arrTgl['0'];
	if($tanggal_tampil_array=='1')$tanggal_tampil_array="01";
	if($tanggal_tampil_array=='2')$tanggal_tampil_array="02";
	if($tanggal_tampil_array=='3')$tanggal_tampil_array="03";
	if($tanggal_tampil_array=='4')$tanggal_tampil_array="04";
	if($tanggal_tampil_array=='5')$tanggal_tampil_array="05";
	if($tanggal_tampil_array=='6')$tanggal_tampil_array="06";
	if($tanggal_tampil_array=='7')$tanggal_tampil_array="07";
	if($tanggal_tampil_array=='8')$tanggal_tampil_array="08";
	if($tanggal_tampil_array=='9')$tanggal_tampil_array="09";
	
	
	$tgltampil = $tahun_tampil_array .'-'. $bulan_tampil_array  .'-'. $tanggal_tampil_array;
	$jamtampil = $_POST['jamtampil'];
	
	$timeunix = $tahun_array . $tanggal_array . $bulan_array . $_POST['jamtampil'];


	$Tanggalselesai = $_POST['tglselesai'];
	$arrTglselesai = explode("-",$Tanggalselesai);

	$tahun_selesai_array = $arrTglselesai['2'];
	if($tahun_selesai_array=='1')$tahun_selesai_array="01";
	if($tahun_selesai_array=='2')$tahun_selesai_array="02";
	if($tahun_selesai_array=='3')$tahun_selesai_array="03";
	if($tahun_selesai_array=='4')$tahun_selesai_array="04";
	if($tahun_selesai_array=='5')$tahun_selesai_array="05";
	if($tahun_selesai_array=='6')$tahun_selesai_array="06";
	if($tahun_selesai_array=='7')$tahun_selesai_array="07";
	if($tahun_selesai_array=='8')$tahun_selesai_array="08";
	if($tahun_selesai_array=='9')$tahun_selesai_array="09";
	
	$bulan_selesai_array = $arrTglselesai['1'];
	if($bulan_selesai_array=='1')$bulan_selesai_array="01";
	if($bulan_selesai_array=='2')$bulan_selesai_array="02";
	if($bulan_selesai_array=='3')$bulan_selesai_array="03";
	if($bulan_selesai_array=='4')$bulan_selesai_array="04";
	if($bulan_selesai_array=='5')$bulan_selesai_array="05";
	if($bulan_selesai_array=='6')$bulan_selesai_array="06";
	if($bulan_selesai_array=='7')$bulan_selesai_array="07";
	if($bulan_selesai_array=='8')$bulan_selesai_array="08";
	if($bulan_selesai_array=='9')$bulan_selesai_array="09";

	$tanggal_selesai_array = $arrTglselesai['0'];
	if($tanggal_selesai_array=='1')$tanggal_selesai_array="01";
	if($tanggal_selesai_array=='2')$tanggal_selesai_array="02";
	if($tanggal_selesai_array=='3')$tanggal_selesai_array="03";
	if($tanggal_selesai_array=='4')$tanggal_selesai_array="04";
	if($tanggal_selesai_array=='5')$tanggal_selesai_array="05";
	if($tanggal_selesai_array=='6')$tanggal_selesai_array="06";
	if($tanggal_selesai_array=='7')$tanggal_selesai_array="07";
	if($tanggal_selesai_array=='8')$tanggal_selesai_array="08";
	if($tanggal_selesai_array=='9')$tanggal_selesai_array="09";
	
$tglselesai = $tahun_selesai_array .'-'. $bulan_selesai_array .'-'. $tanggal_selesai_array;
$jamselesai = $_POST['jamselesai'];


 $dilihat  = $_POST['dilihat'];


$statustampil  = $_POST['statustampil']; /* STATUS TAMPIL */
if( $statustampil == "" || $statustampil == "none"){
	$statustampil = 0;
}else{
	$statustampil = 1;
}
$statustampil = $statustampil;


$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];

$linkurl = htmlspecialchars($_POST['linkurl']); 


$sql_hitungdata = bannerItem_PeriksaJudul( $tbl_banner, $judul ); /* Periksa Judul Kategori banner, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=FormEntry&pesan_error=GAGAL TAMBAH DATA , JUDUL SUDAH PERNAH there is !."); /* Kembali ke halaman  sebelumnya */
		
}else{

	$nama_file = $_FILES['filebanner']['name'];
	$temp_file = $_FILES['filebanner']['tmp_name']; 
	$ukuran_file = $_FILES['filebanner']['size'];
	$tipe_file = $_FILES['filebanner']['type'];

if( $filebanner == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	
	$imagefile = $file;
	$direktorigambar = $_POST['direktorigambar'];
	
}else{

	$loc_root = "../";	
	$loc_file = "filemodul/banner/file_item-$idkategori-$idkategorisub-$tanggalhariini/";
	$location_dir =  $loc_root . $loc_file;
	
	
		if (!is_dir( $location_dir )){ 
			mkdir( $location_dir, 0777 ,true); 
			chmod( $location_dir, 0755);
		}

	
	$uploaddir = $location_dir;
	 
	$Delete_gambaritem_kecil = $loc_root . $direktorigambar . $namafile;
	
	$new_name_gg = potong_judul( $judul )  . "_file_banner_";
	
	$direktorigambar = $loc_file;
	
	$namafile = Upload_File( $new_name_gg, $uploaddir, $temp_file, $ukuran_file, $nama_file );
	
}

bannerItem_UpdateData(
		$tbl_banner,
		$id,$idupline,
		$idkategori,$idkategorisub,
		$judul,$deskripsi,$tglpost,
		$jampost,$tgltampil,
		$jamtampil,$tglselesai,
		$jamselesai,$timeunix,
		$dilihat,$statustampil,$urutan,
		$idusers,$idadmin,
		$direktorigambar,$namafile,
		$linkurl,$target
		);
	 	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); /* Kembali ke halaman  sebelumnya */

}}}/* END item UPDATE */
/* End Update Item Data */
	
	

/* ---- */
	
if( $action=="item_updateimage" ){ /* Proses Update item / Delete Image item */

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 

	$row_item = Select_Detail_Item_banner($tbl_banner, $id);
	$root_image = "../";
	$gambarkecil = $row_item->gambarkecil;
	$gambarbesar = $row_item->gambarbesar;
	$direktorigambar = $row_item->direktorigambar;
	$Delete_gambarkecil = $root_image . $direktorigambar . $gambarkecil ;
	$Delete_gambarbesar = $root_image . $direktorigambar . $gambarbesar;
	//@//unlink($Delete_gambarkecil);
	//@//unlink($Delete_gambarbesar);
	
	$id = $row_item->id;
	$idkategori = $row_item->idkategori;
	$idkategorisub = $row_item->idkategorisub;

	bannerItem_DeleteImage( $tbl_banner, $id );
	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=EditData&pesan_error=SUCCESS DELETE IMAGE"); /* Kembali ke halaman  sebelumnya */
}/* END Delete IMAGE item / IMAGE UPDATE */
	
	
/* ---- */
if( $action=="item_statustampil" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 

	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_item = Select_Detail_Item_banner($tbl_banner, $id);

	$id = $row_item->id;
	$idkategori = $row_item->idkategori;
	$idkategorisub = $row_item->idkategorisub;

	
	bannerItem_StatusTampil( $tbl_banner, $statustampil, $id );
	
	
	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&pesan_error=SUCCESS PUBLISH DATA."); /* Kembali ke halaman  sebelumnya */
}


 
if( $action=="item_hapusdata" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 
	$row_item = Select_Detail_Item_banner($tbl_banner, $id);
	$root_image = "../";
	$gambarkecil = $row_item->gambarkecil;
	$gambarbesar = $row_item->gambarbesar;
	$direktorigambar = $row_item->direktorigambar;
	$Delete_gambarkecil = $root_image . $direktorigambar . $gambarkecil ;
	$Delete_gambarbesar = $root_image . $direktorigambar . $gambarbesar;
	//@//unlink($Delete_gambarkecil);
	//@//unlink($Delete_gambarbesar);
	bannerItem_hapusdata( $tbl_banner, $id);
	header("location:banner_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&pesan_error=SUCCESS DELETE DATA."); /* Kembali ke halaman  sebelumnya */
}/* END ITEM Delete DATA */	
	
/* ---- */

/* END */	
}/* End Session Filter */
?>