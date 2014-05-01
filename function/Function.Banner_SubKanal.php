<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL SUB KANAL banner */
/* 


id,
idupline,
idkategori,
keterangan,
keteranganinggris,
statustampil,
menuatas1,
menuatas2,
menubawah1,
menubawah2,
homepagetampil,
posisi,
urutan,
imagefile,
imagelogo,
imageheader,
imagebackground,
hit,
linkjudul,
keyword 
  

$id, 
$idupline,
$idkategori,
$keterangan,
$keteranganinggris,
$statustampil,
$menuatas1,
$menuatas2,
$menubawah1,
$menubawah2,
$homepagetampil,
$posisi,
$urutan,
$imagefile,
$imagelogo,
$hit,
$linkjudul,
$keyword 




'$id', 
'$idupline', 
'$idkategori', 
'$keterangan', 
'$keteranganinggris', 
'$statustampil', 
'$menuatas1', 
'$menuatas2', 
'$menubawah1', 
'$menubawah2', 
'$homepagetampil', 
'$posisi', 
'$urutan', 
'$imagefile', 
'$imagelogo', 
'$hit', 
'$linkjudul', 
'$keyword'


*/
 	/* Fungsi Buat ID Otomatis Untuk banner Kategori Sub . */
	function bannerKategoriSub_CreateID( $tbl_bannerkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 
	/*  Fungsi Periksa Judul banner Sub Kategori */
	function bannerKategoriSub_PeriksaJudul( $tbl_bannerkategorisub, $idkategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE idkategori = '$idkategori' AND 
		keterangan = '$keterangan' AND 
		keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}

	/* Fungsi Tambah Data banner Kategori Sub */
	function bannerKategoriSub_TambahData(
		$tbl_bannerkategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
		$sql = mysql_query("INSERT INTO $tbl_bannerkategorisub
		(

			id, idupline, idkategori,
			keterangan, keteranganinggris,
			statustampil, menuatas1, menuatas2,
			menubawah1, menubawah2, homepagetampil,
			posisi, urutan,
			imagefile, imagelogo, imageheader, imagebackground,
			hit, linkjudul, keyword 

		)VALUES(
	
			'$id', '$idupline', '$idkategori', 
			'$keterangan', '$keteranganinggris', 
			'$statustampil', '$menuatas1', '$menuatas2', 
			'$menubawah1', '$menubawah2', '$homepagetampil', 
			'$posisi', '$urutan', 
			'$imagefile', '$imagelogo', '$imageheader', '$imagebackground',
			'$hit', '$linkjudul', '$keyword'

		)");
		return $sql;
	}


	function bannerKategoriSub_UpdateData(
		$tbl_bannerkategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
	
	$sql = mysql_query("
	UPDATE $tbl_bannerkategorisub SET
 
		idupline = '$idupline',
		idkategori = '$idkategori',
		keterangan = '$keterangan',
		keteranganinggris = '$keteranganinggris',
		statustampil = '$statustampil',
		menuatas1 = '$menuatas1',
		menuatas2 = '$menuatas2',
		menubawah1 = '$menubawah1',
		menubawah2 = '$menubawah2',
		homepagetampil = '$homepagetampil',
		posisi = '$posisi',
		urutan = '$urutan',
		imagefile = '$imagefile',
		imagelogo = '$imagelogo',
		imageheader = '$imageheader',
		imagebackground = '$imagebackground',
		hit = '$hit',
		linkjudul = '$linkjudul',
		keyword = '$keyword'
		
	WHERE
	
		id = '$id'
	
	");
	return $sql;
	}


	function Select_Detail_KategoriSub_banner( $tbl_bannerkategorisub, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}





/* ---------- Start Function Image ------ */

/* Function Hapus Image Location / Path */
	function bannerKategoriSub_HapusImage( $tbl_bannerkategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				imagefile = '' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* Function Hapus Image Logo */
	function bannerKategoriSub_HapusImageLogo( $tbl_bannerkategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
	
/* Function Hapus Image Header  */
	function bannerKategoriSub_HapusImageHeader( $tbl_bannerkategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* Function Hapus Image Background  */
	function bannerKategoriSub_HapusImageBackground( $tbl_bannerkategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
 				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* ---------- End Function Hapus Image */


/* Start status tampil */

	function bannerKategoriSub_StatusTampil( $tbl_bannerkategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				statustampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function bannerKategoriSub_HomepageTampil( $tbl_bannerkategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				homepagetampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function bannerKategoriSub_MenuAtas1Tampil( $tbl_bannerkategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				menuatas1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function bannerKategoriSub_MenuAtas2Tampil( $tbl_bannerkategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				menuatas2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function bannerKategoriSub_MenuBawah1Tampil( $tbl_bannerkategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				menubawah1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function bannerKategoriSub_MenuBawah2Tampil( $tbl_bannerkategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategorisub SET
				menubawah2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


/* End Function tampil */




	/* SUB KANAL banner : hapus sub kanal banner berdasarkan id terpilih */
	function  bannerKategoriSub_HapusData( $tbl_bannerkategorisub, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_bannerkategorisub WHERE id='$id'
		");
		return $sql;
	}
	

	
	/* Buat Direktori Untuk File Sub Kategori banner */
	function bannerKategoriSub_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/banner/" . "subkategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}


 
	
 	function AmbilJumlahTotalbannerKategoriSub()
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_bannerkategorisub";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

 	function AmbilJumlahTotalbannerKategoriSub_ByKategori( $tbl_bannerkategorisub, $idkategori )
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_bannerkategorisub WHERE idkategori='$idkategori'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	


  
	function Select_All_SubKategori_banner_By_Urutan( $tbl_bannerkategorisub, $idkategori ){
		 $sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}

  
	function Select_All_SubKategori_banner_By_NOTIDSUB( $tbl_bannerkategorisub, $idkategori, $idkategorisub ){
		 $sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}



function Box_Subkanal_banner_TampilHomepage($tbl_bannerkategorisub, $posisi){
$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE homepagetampil='1' AND posisi = '$posisi'");
return $sql;
}



/* TAMPILKAN SUB KATEGORI DI MENU 2 */
function List_MenuTampil2_SubKanalbanner( $tbl_bannerkategorisub, $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE idkategori='$idkategori' AND menutampil2 ='1' ORDER BY urutan ");
		return $sql;
}

 

function Select_SubKategori_banner_By_Id( $tbl_bannerkategorisub, $idsubkategori ){

		$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE id = '$idsubkategori'");
		$result = mysql_fetch_object($sql);
		return $result;

}


	function Detail_SubKanalbanner_Publish( $tbl_bannerkategorisub , $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE statustampil='1' AND id='$idkategorisub'");
		$result = mysql_fetch_object($sql);
		return $result;
	}

 
	function bannerSubKanalDiLihat( $tbl_bannerkategorisub, $id ){ /* Hit Counter Sub Kanal banner */
	
			$sql = mysql_query("SELECT * FROM $tbl_bannerkategorisub WHERE id='$id'");
			$databanner = mysql_fetch_array($sql);
			$hit = $databanner ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_bannerkategorisub SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_SubKanalbanner( $tbl_bannerkategorisub ){ /* Cek Jumlah Hits banner Sub Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_bannerkategorisub";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}


?>