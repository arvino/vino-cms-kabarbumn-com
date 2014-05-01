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
if( $action=='item_tambahdata' ){ /* item news TAMBAH DATA */

$idkategori = $_POST['idkategori'];
if($idkategori ==""){
$idkategori = "0";
}


$idkategorisub = $_POST['idkategorisub'];
if($idkategorisub ==""){
$idkategorisub = "0";
}

if( $judul=='' ){

	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=FormEntry&pesan_error=PLEASE FILL THE TITLE."); /* Kembali ke halaman  sebelumnya */
	
}else{

$id = newsItem_CreateID( $tbl_news ); 

$idupline = $idkategori . $idkategorisub;
$kodekategori = $_POST['kodekategori'];

$bahasa = $_POST['bahasa'];

$judul = htmlspecialchars($_POST['judul']);
$subjudul = htmlspecialchars($_POST['subjudul']);
$preview = htmlspecialchars($_POST['preview']);
$deskripsi  = htmlspecialchars($_POST['deskripsi']);

$tglpost = $tanggalhariini;
$jampost = $jamsaatini;

	$Tanngal = $_POST['tgltampil'];
	$arrTgl = explode("-",$Tanngal);

	$tahun_array = $arrTgl['2'];
	if($tahun_array=='1')$tahun_array="01";
	if($tahun_array=='2')$tahun_array="02";
	if($tahun_array=='3')$tahun_array="03";
	if($tahun_array=='4')$tahun_array="04";
	if($tahun_array=='5')$tahun_array="05";
	if($tahun_array=='6')$tahun_array="06";
	if($tahun_array=='7')$tahun_array="07";
	if($tahun_array=='8')$tahun_array="08";
	if($tahun_array=='9')$tahun_array="09";

	
	$bulan_array = $arrTgl['1'];
	if($bulan_array=='1')$bulan_array="01";
	if($bulan_array=='2')$bulan_array="02";
	if($bulan_array=='3')$bulan_array="03";
	if($bulan_array=='4')$bulan_array="04";
	if($bulan_array=='5')$bulan_array="05";
	if($bulan_array=='6')$bulan_array="06";
	if($bulan_array=='7')$bulan_array="07";
	if($bulan_array=='8')$bulan_array="08";
	if($bulan_array=='9')$bulan_array="09";

	$tanggal_array = $arrTgl['0'];
	if($tanggal_array=='1')$tanggal_array="01";
	if($tanggal_array=='2')$tanggal_array="02";
	if($tanggal_array=='3')$tanggal_array="03";
	if($tanggal_array=='4')$tanggal_array="04";
	if($tanggal_array=='5')$tanggal_array="05";
	if($tanggal_array=='6')$tanggal_array="06";
	if($tanggal_array=='7')$tanggal_array="07";
	if($tanggal_array=='8')$tanggal_array="08";
	if($tanggal_array=='9')$tanggal_array="09";
	
$tgltampil =  $tahun_array .'-'.  $bulan_array  .'-'.  $tanggal_array;
$jamtampil  = $_POST['jamtampil'];

$timeunix = $tahun_array . $bulan_array . $tanggal_array . str_replace(':','',$_POST['jamtampil']); ;

	$Tglselesai_tampil = $_POST['tglselesai'];
	$arrTglselesaitampil = explode("-", $Tglselesai_tampil);

	$tahun_array_selesaitampil = $arrTglselesaitampil['2'];
	if($tahun_array_selesaitampil=='1')$tahun_array_selesaitampil="01";
	if($tahun_array_selesaitampil=='2')$tahun_array_selesaitampil="02";
	if($tahun_array_selesaitampil=='3')$tahun_array_selesaitampil="03";
	if($tahun_array_selesaitampil=='4')$tahun_array_selesaitampil="04";
	if($tahun_array_selesaitampil=='5')$tahun_array_selesaitampil="05";
	if($tahun_array_selesaitampil=='6')$tahun_array_selesaitampil="06";
	if($tahun_array_selesaitampil=='7')$tahun_array_selesaitampil="07";
	if($tahun_array_selesaitampil=='8')$tahun_array_selesaitampil="08";
	if($tahun_array_selesaitampil=='9')$tahun_array_selesaitampil="09";

	
	$bulan_array_selesaitampil = $arrTglselesaitampil['1'];
	if($bulan_array_selesaitampil=='1')$bulan_array_selesaitampil="01";
	if($bulan_array_selesaitampil=='2')$bulan_array_selesaitampil="02";
	if($bulan_array_selesaitampil=='3')$bulan_array_selesaitampil="03";
	if($bulan_array_selesaitampil=='4')$bulan_array_selesaitampil="04";
	if($bulan_array_selesaitampil=='5')$bulan_array_selesaitampil="05";
	if($bulan_array_selesaitampil=='6')$bulan_array_selesaitampil="06";
	if($bulan_array_selesaitampil=='7')$bulan_array_selesaitampil="07";
	if($bulan_array_selesaitampil=='8')$bulan_array_selesaitampil="08";
	if($bulan_array_selesaitampil=='9')$bulan_array_selesaitampil="09";


	$tanggal_array_selesaitampil = $arrTglselesaitampil['0'];
	if($tanggal_array_selesaitampil=='1')$tanggal_array_selesaitampil="01";
	if($tanggal_array_selesaitampil=='2')$tanggal_array_selesaitampil="02";
	if($tanggal_array_selesaitampil=='3')$tanggal_array_selesaitampil="03";
	if($tanggal_array_selesaitampil=='4')$tanggal_array_selesaitampil="04";
	if($tanggal_array_selesaitampil=='5')$tanggal_array_selesaitampil="05";
	if($tanggal_array_selesaitampil=='6')$tanggal_array_selesaitampil="06";
	if($tanggal_array_selesaitampil=='7')$tanggal_array_selesaitampil="07";
	if($tanggal_array_selesaitampil=='8')$tanggal_array_selesaitampil="08";
	if($tanggal_array_selesaitampil=='9')$tanggal_array_selesaitampil="09";
	
	 
 
	if($_POST['withoutend']=="" || $_POST['withoutend']=="none"){
		$tglselesai =  $tahun_array_selesaitampil .'-'. $bulan_array_selesaitampil .'-'. $tanggal_array_selesaitampil ;
		$jamselesai = $_POST['jamselesai'];
	}else{
		$tglselesai =  "9999-12-30";
		$jamselesai  = "00:00";
	}


$judulgambar  = $_POST['judulgambar'];
$imagelogo  = "";

$dikomentari  = $_POST['dikomentari'];
$dilampirkan  = $_POST['dilampirkan'];
$dilihat  = $_POST['dilihat'];

$keterangangambar = $_POST['keterangangambar'];

$statustampil  = $_POST['statustampil']; /* STATUS TAMPIL */
if( $statustampil == "" || $statustampil == "none"){
	$statustampil = 0;
}else{
	$statustampil = 1;
}
$statustampil = $statustampil;
$statustampil = 1;

$pilihan  = $_POST['pilihan']; /* PILIHAN */
if( $pilihan == "" || $pilihan == "none"){
	$pilihan = 0;
}else{
	$pilihan = 1;
}
$pilihan = $pilihan;

$headline  = $_POST['headline']; /* HEADLINE */
if( $headline == "" || $headline == "none"){
	$headline = 0;
}else{
	$headline = 1;
}
$headline = $headline;


$headlinesection  = $_POST['headlinesection']; /* HEADLINE SECTION */
if( $headlinesection == "" || $headlinesection == "none"){
	$headlinesection = 0;
}else{
	$headlinesection = 1;
}
$headlinesection = $headlinesection;


$hotspot  = $_POST['hotspot']; /* HOTSPOT */
if( $hotspot == "" || $hotspot == "none"){
	$hotspot = 0;
}else{
	$hotspot = 1;
}
$hotspot = $hotspot;



$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];


$linkjudul = potong_judul( $judul ); 
$linkjudul = $linkjudul . ".html";
$wordtag = htmlspecialchars($_POST['wordtag']); 
$keyword = htmlspecialchars($_POST['keyword']); 
  
	
$hit = 1;


$sql_hitungdata = newsItem_PeriksaJudul( $tbl_news, $judul, $judulinggris ); /* Periksa Judul Kategori news, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 0 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=FormEntry&pesan_error=FAILED SUBMIT DATA, THE TITLE ALREADY EXIST."); /* Kembali ke halaman  sebelumnya */
		
}else{



	$nama_file = $_FILES['file123']['name'];
	$temp_file = $_FILES['file123']['tmp_name']; 
	$ukuran_file = $_FILES['file123']['size'];
	$tipe_file = $_FILES['file123']['type'];
	
	
if( $file123 == "" ){

	$gambarbesar = "";
	$gambarkecil = "";
	$direktorigambar = "";

}else{



	$loc_root = "../";	
	$loc_file = "filemodul/news/file_item-$idkategori-$idkategorisub-$tanggalhariini/";
	$location_dir =  $loc_root . $loc_file;
	
		
	if (!is_dir( $location_dir )) {  
			//Create_Direktori( $location_dir );
		mkdir( $location_dir, 0777 ,true); 
		chmod( $location_dir, 0755);
	}

	$uploaddir = $location_dir;
  	 
	/* DELETE FILE lama */
	$Delete_gambaritem_kecil = $loc_root . $direktorigambar . $gambarkecil;
	$Delete_gambaritem_besar = $loc_root . $direktorigambar . $gambarbesar;
	
	$new_name_gk =  $id . "_small_";
	
	$gambarkecil = cropImage( $new_name_gk, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $nw=120, $nh=120 );
	
	$new_name_gg =  $id . "_big_";
	
	$direktorigambar = $loc_file;

	$gambarbesar = Resize_Gambar( $new_name_gg, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize=300 );


}

$penulis = $_POST['penulis'];

 
newsItem_TambahData(
		$tbl_news,
		$id, $idupline, $idkategori, $idkategorisub,
		$judul, $judulinggris, $subjudul, $subjudulinggris,
		$preview, $previewinggris, $deskripsi, $deskripsiinggris, $penulis,
		$tglpost, $jampost, $tgltampil, $jamtampil, $tglselesai, $jamselesai,
		$timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari,
		$dilampirkan, $dilihat, $statustampil, $headline, $headlinesection, 
		$idusers, $idadmin, $direktorigambar,
		$linkjudul, $wordtag, $keyword
	);
	 
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&pesan_error=SUCCESS ADD DATA !"); /* Kembali ke halaman  sebelumnya */ 
}}} /* END TAMBAH ITEM news */




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

	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=FormEntry&pesan_error=PLEASE FILL THE TITLE."); /* Kembali ke halaman  sebelumnya */
	
}else{


	

$idupline = $idkategori . $idkategorisub;
$kodekategori = $_POST['kodekategori'];

$bahasa = $_POST['bahasa'];

$judul = htmlspecialchars($_POST['judul']);

$subjudul = htmlspecialchars($_POST['subjudul']);

$preview = htmlspecialchars($_POST['preview']);

$deskripsi  = htmlspecialchars($_POST['deskripsi']);


$tglpost = $tanggalhariini;
$jampost = $jamsaatini;

	$Tanngal = $_POST['tgltampil'];
	$arrTgl = explode("-",$Tanngal);

	$tahun_array = $arrTgl['2'];
	if($tahun_array=='1')$tahun_array="01";
	if($tahun_array=='2')$tahun_array="02";
	if($tahun_array=='3')$tahun_array="03";
	if($tahun_array=='4')$tahun_array="04";
	if($tahun_array=='5')$tahun_array="05";
	if($tahun_array=='6')$tahun_array="06";
	if($tahun_array=='7')$tahun_array="07";
	if($tahun_array=='8')$tahun_array="08";
	if($tahun_array=='9')$tahun_array="09";

	
	$bulan_array = $arrTgl['1'];
	if($bulan_array=='1')$bulan_array="01";
	if($bulan_array=='2')$bulan_array="02";
	if($bulan_array=='3')$bulan_array="03";
	if($bulan_array=='4')$bulan_array="04";
	if($bulan_array=='5')$bulan_array="05";
	if($bulan_array=='6')$bulan_array="06";
	if($bulan_array=='7')$bulan_array="07";
	if($bulan_array=='8')$bulan_array="08";
	if($bulan_array=='9')$bulan_array="09";

	$tanggal_array = $arrTgl['0'];
	if($tanggal_array=='1')$tanggal_array="01";
	if($tanggal_array=='2')$tanggal_array="02";
	if($tanggal_array=='3')$tanggal_array="03";
	if($tanggal_array=='4')$tanggal_array="04";
	if($tanggal_array=='5')$tanggal_array="05";
	if($tanggal_array=='6')$tanggal_array="06";
	if($tanggal_array=='7')$tanggal_array="07";
	if($tanggal_array=='8')$tanggal_array="08";
	if($tanggal_array=='9')$tanggal_array="09";
	
$tgltampil =  $tahun_array .'-'.  $bulan_array  .'-'.  $tanggal_array;
$jamtampil  = $_POST['jamtampil'];

$timeunix = $tahun_array . $bulan_array . $tanggal_array . str_replace(':','',$_POST['jamtampil']); ;


	$Tglselesai_tampil = $_POST['tglselesai'];
	$arrTglselesaitampil = explode("-", $Tglselesai_tampil);

	$tahun_array_selesaitampil = $arrTglselesaitampil['2'];
	if($tahun_array_selesaitampil=='1')$tahun_array_selesaitampil="01";
	if($tahun_array_selesaitampil=='2')$tahun_array_selesaitampil="02";
	if($tahun_array_selesaitampil=='3')$tahun_array_selesaitampil="03";
	if($tahun_array_selesaitampil=='4')$tahun_array_selesaitampil="04";
	if($tahun_array_selesaitampil=='5')$tahun_array_selesaitampil="05";
	if($tahun_array_selesaitampil=='6')$tahun_array_selesaitampil="06";
	if($tahun_array_selesaitampil=='7')$tahun_array_selesaitampil="07";
	if($tahun_array_selesaitampil=='8')$tahun_array_selesaitampil="08";
	if($tahun_array_selesaitampil=='9')$tahun_array_selesaitampil="09";

	
	$bulan_array_selesaitampil = $arrTglselesaitampil['1'];
	if($bulan_array_selesaitampil=='1')$bulan_array_selesaitampil="01";
	if($bulan_array_selesaitampil=='2')$bulan_array_selesaitampil="02";
	if($bulan_array_selesaitampil=='3')$bulan_array_selesaitampil="03";
	if($bulan_array_selesaitampil=='4')$bulan_array_selesaitampil="04";
	if($bulan_array_selesaitampil=='5')$bulan_array_selesaitampil="05";
	if($bulan_array_selesaitampil=='6')$bulan_array_selesaitampil="06";
	if($bulan_array_selesaitampil=='7')$bulan_array_selesaitampil="07";
	if($bulan_array_selesaitampil=='8')$bulan_array_selesaitampil="08";
	if($bulan_array_selesaitampil=='9')$bulan_array_selesaitampil="09";


	$tanggal_array_selesaitampil = $arrTglselesaitampil['0'];
	if($tanggal_array_selesaitampil=='1')$tanggal_array_selesaitampil="01";
	if($tanggal_array_selesaitampil=='2')$tanggal_array_selesaitampil="02";
	if($tanggal_array_selesaitampil=='3')$tanggal_array_selesaitampil="03";
	if($tanggal_array_selesaitampil=='4')$tanggal_array_selesaitampil="04";
	if($tanggal_array_selesaitampil=='5')$tanggal_array_selesaitampil="05";
	if($tanggal_array_selesaitampil=='6')$tanggal_array_selesaitampil="06";
	if($tanggal_array_selesaitampil=='7')$tanggal_array_selesaitampil="07";
	if($tanggal_array_selesaitampil=='8')$tanggal_array_selesaitampil="08";
	if($tanggal_array_selesaitampil=='9')$tanggal_array_selesaitampil="09";
	
 
	if($_POST['withoutend']=="" || $_POST['withoutend']=="none"){
		$tglselesai =  $tahun_array_selesaitampil .'-'. $bulan_array_selesaitampil .'-'. $tanggal_array_selesaitampil ;
		$jamselesai = $_POST['jamselesai'];
	}else{
		$tglselesai =  "9999-12-30";
		$jamselesai  = "00:00";
	}

 
$judulgambar  = $_POST['judulgambar'];
$imagelogo  = "";

$dikomentari  = $_POST['dikomentari'];
$dilampirkan  = $_POST['dilampirkan'];
$dilihat  = $_POST['dilihat'];

$keterangangambar = $_POST['keterangangambar'];


$statustampil  = $_POST['statustampil']; /* STATUS TAMPIL */
if( $statustampil == "" || $statustampil == "none"){
	$statustampil = 0;
}else{
	$statustampil = 1;
}
$statustampil = $statustampil;

$pilihan  = $_POST['pilihan']; /* PILIHAN */
if( $pilihan == "" || $pilihan == "none"){
	$pilihan = 0;
}else{
	$pilihan = 1;
}
$pilihan = $pilihan;

$headline  = $_POST['headline']; /* HEADLINE */
if( $headline == "" || $headline == "none"){
	$headline = 0;
}else{
	$headline = 1;
}
$headline = $headline;


$headlinesection  = $_POST['headlinesection']; /* HEADLINE */
if( $headlinesection == "" || $headlinesection == "none"){
	$headlinesection = 0;
}else{
	$headlinesection = 1;
}
$headlinesection = $headlinesection;



$hotspot  = $_POST['hotspot']; /* HOTSPOT */
if( $hotspot == "" || $hotspot == "none"){
	$hotspot = 0;
}else{
	$hotspot = 1;
}
$hotspot = $hotspot;


$idusers  = $_POST['idusers'];
$idadmin  = $_POST['idadmin'];


$linkjudul = potong_judul( $judul ); 
$linkjudul = $linkjudul . ".html";
$keyword = htmlspecialchars($_POST['keyword']); 
  
	
$hit = 1;

$sql_hitungdata = newsItem_PeriksaJudul( $tbl_news, $judul, $judulinggris ); /* Periksa Judul Kategori news, Apakah masih tersedia. */
$hitung_data = mysql_num_rows($sql_hitungdata);
if( $hitung_data > 1 ){ /* Jika judul sudah pernah there is CANCELkan proses tambah data. */

	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=FormEntry&pesan_error=FAILED ! TITLE ALREADY EXIST"); /* Kembali ke halaman  sebelumnya */
		
}else{

	$nama_file = $_FILES['file123']['name'];
	$temp_file = $_FILES['file123']['tmp_name']; 
	$ukuran_file = $_FILES['file123']['size'];
	$tipe_file = $_FILES['file123']['type'];

if( $file123 == "" ){ /* Jika tida ada upload file jangan there is perubahan */
	
	$imagefile = $file;
	$direktorigambar = $_POST['direktorigambar'];
	
}else{

	$loc_root = "../";	
	$loc_file = "filemodul/news/file_item-$idkategori-$idkategorisub-$tanggalhariini/";
	$location_dir =  $loc_root . $loc_file;
	
	
		if (!is_dir( $location_dir )){ 
			//Create_Direktori( $location_dir );
			mkdir( $location_dir, 0777 ,true); 
			chmod( $location_dir, 0755);
		}

	
	$uploaddir = $location_dir;
	 
	/* DELETE FILE lama */
	$Delete_gambaritem_kecil = $loc_root . $direktorigambar . $gambarkecil;
	$Delete_gambaritem_besar = $loc_root . $direktorigambar . $gambarbesar;


	$new_name_gk =  $id . "_small_";
	
	$gambarkecil = cropImage( $new_name_gk, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $nw=120, $nh=120 );
	
	$new_name_gg =  $id . "_big_";
	
	$direktorigambar = $loc_file;

	$gambarbesar = Resize_Gambar( $new_name_gg, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize=300 );
	
	
}
	//Upload_File( $new_name, $location_dir, $temp_file, $ukuran_file, $nama_file );
$penulis = $_POST['penulis'];

newsItem_UpdateData(
		$tbl_news,
		$id, $idupline, $idkategori,
		$idkategorisub, $judul, $judulinggris,
		$subjudul, $subjudulinggris,
		$preview, $previewinggris,
		$deskripsi, $deskripsiinggris, $penulis,
		$tglpost, $jampost,
		$tgltampil, $jamtampil, $tglselesai, $jamselesai, $timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari, $dilampirkan, $dilihat,
		$statustampil, $headline, $headlinesection, $idusers, $idadmin, $direktorigambar, $linkjudul, $wordtag, $keyword
		);
	 
	 	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); /* Kembali ke halaman  sebelumnya */

}}}/* END item UPDATE */
/* End Update Item Data */
	
	

	
	
/* ---- */
	
if( $action=="item_updateimage" ){ /* Proses Update item / Delete Image item */

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 

	$row_item = Select_Detail_Item_news($tbl_news, $id);
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

	newsItem_DeleteImage( $tbl_news, $id );
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=EditData&pesan_error=IMAGE DELETE SUCCESSFULLY."); /* Kembali ke halaman  sebelumnya */
}/* END Delete IMAGE item / IMAGE UPDATE */
	
/* ---- */
if( $action=="item_statustampil" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 

	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_item = Select_Detail_Item_news($tbl_news, $id);

	$id = $row_item->id;
	$idkategori = $row_item->idkategori;
	$idkategorisub = $row_item->idkategorisub;

	
	newsItem_StatusTampil( $tbl_news, $statustampil, $id );
	
	
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=ViewDetail&pesan_error=SUCCESS PUBLISH DATA."); /* Kembali ke halaman  sebelumnya */
}

/* ---- */

if( $action=="item_pilihantampil" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 

	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_item = Select_Detail_Item_news($tbl_news, $id);

	$id = $row_item->id;
	$idkategori = $row_item->idkategori;
	$idkategorisub = $row_item->idkategorisub;


	newsItem_PilihanTampil( $tbl_news, $statustampil, $id );
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=ViewDetail&pesan_error=SUCCESS PUBLISH DATA"); /* Kembali ke halaman  sebelumnya */
}

/* ---- */
if( $action=="item_headlinetampil" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 
	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_item = Select_Detail_Item_news($tbl_news, $id);

	$id = $row_item->id;
	$idkategori = $row_item->idkategori;
	$idkategorisub = $row_item->idkategorisub;


	newsItem_HeadlineTampil( $tbl_news, $statustampil, $id );
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=ViewDetail&pesan_error=SUCCESS PUBLISH DATA"); /* Kembali ke halaman  sebelumnya */
}

/* ---- */
if( $action=="item_hotspottampil" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 
	$statustampil = $_GET['status'];
	/* Ambil Data Kategori untuk Delete data gambar  */
	$row_item = Select_Detail_Item_news($tbl_news, $id);

	$id = $row_item->id;
	$idkategori = $row_item->idkategori;
	$idkategorisub = $row_item->idkategorisub;


	newsItem_HotspotTampil( $tbl_news, $statustampil, $id );
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&id=$id&action=ViewDetail&pesan_error=SUCCESS TAMPIL DATA DI HOTSPOT !."); /* Kembali ke halaman  sebelumnya */
}


/* ---- */ 

if( $action=="item_hapusdata" ){ /* Proses Update item*/

	$id = $_GET['id'];
	$idkategori = $_GET['idkategori'];
	$idkategorisub = $_GET['idkategorisub'];
 
	$row_item = Select_Detail_Item_news($tbl_news, $id);
	$root_image = "../";
	$gambarkecil = $row_item->gambarkecil;
	$gambarbesar = $row_item->gambarbesar;
	$direktorigambar = $row_item->direktorigambar;
	$Delete_gambarkecil = $root_image . $direktorigambar . $gambarkecil ;
	$Delete_gambarbesar = $root_image . $direktorigambar . $gambarbesar;

	newsItem_hapusdata( $tbl_news, $id);
	header("location:news_item.php?idkategori=$idkategori&idsubkategori=$idkategorisub&action=ViewList&pesan_error=SUCCESS DELETE DATA."); /* Kembali ke halaman  sebelumnya */
}/* END ITEM Delete DATA */	
	
/* ---- */

/* END */	
}/* End Session Filter */
?>