<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL KANAL banner */
/* 

id,
idupline,
keterangan,
keteranganinggris,
posisi,
urutan,
homepagetampil,
menuatas1,
menuatas2,
menubawah1,
menubawah2,
statustampil,
imagefile,
imagelogo,
imageheader,
imagebackground,
hit,
linkjudul,
keyword


 

$id,
$idupline,
$keterangan,
$keteranganinggris,
$posisi,
$urutan,
$homepagetampil,
$menuatas1,
$menuatas2,
$menubawah1,
$menubawah2,
$statustampil,
$imagefile,
$imagelogo,
$imageheader,
$imagebackground,
$hit,
$linkjudul,
$keyword




'$id', 
'$idupline',
'$keterangan',
'$keteranganinggris',
'$posisi',
'$urutan',
'$homepagetampil',
'$menuatas1',
'$menuatas2',
'$menubawah1',
'$menubawah2',
'$statustampil',

'$imagefile',
'$imagelogo',
'$imageheader',
'$imagebackground',

'$hit',
'$linkjudul',
'$keyword'





*/
	/* Fungsi Buat ID Otomatis Untuk banner Kategori. */
	function bannerKategori_CreateID( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	/*  Fungsi Periksa Judul banner Kategori */
	function bannerKategori_Periksaketerangan( $tbl_bannerkategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE keterangan = '$keterangan' AND keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}
 
	/* Fungsi Tambah Data banner Kategori */
	function bannerKategori_TambahData(
		$tbl_bannerkategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_bannerkategori
		(
			id, idupline, keterangan, keteranganinggris,
			posisi, urutan,
			homepagetampil, menuatas1, menuatas2,
			menubawah1, menubawah2, statustampil,
			imagefile, imagelogo, imageheader, imagebackground,
			hit, linkjudul, keyword
			
		)VALUES(
			'$id', '$idupline',
			'$keterangan', '$keteranganinggris',
			'$posisi', '$urutan',
			'$homepagetampil', '$menuatas1', '$menuatas2',
			'$menubawah1', '$menubawah2', '$statustampil',
			'$imagefile', '$imagelogo', '$imageheader', '$imagebackground',
			'$hit', '$linkjudul', '$keyword'
		)");
		return $sql;
	}
	
	
	
	
/* Kategori Update data */
 	function bannerKategori_UpdateData(
		$tbl_bannerkategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword
	){
	
	$sql = mysql_query("
	UPDATE $tbl_bannerkategori SET

		idupline = '$idupline',
		keterangan = '$keterangan',
		keteranganinggris = '$keteranganinggris',
		posisi = '$posisi',
		urutan = '$urutan',
		homepagetampil = '$homepagetampil',
		menuatas1 = '$menuatas1',
		menuatas2 = '$menuatas2',
		menubawah1 = '$menubawah1',
		menubawah2 = '$menubawah2',
		statustampil = '$statustampil',
 
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


	/* TAMPILKAN DETAIL KATEGORI banner BERDASARKAN ID */
	function Select_Detail_Kategori_banner( $tbl_bannerkategori, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}




/* Start Update Image */

	function bannerKategori_update_image_logo( $tbl_bannerkategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function bannerKategori_update_image_header( $tbl_bannerkategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function bannerKategori_update_image_background( $tbl_bannerkategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
/* End Update Image */
	
	
	
/* Start Function Update Status Tampil */

	function bannerKategori_StatusTampil( $tbl_bannerkategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function bannerKategori_HomepageTampil( $tbl_bannerkategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				homepagetampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function bannerKategori_menuatas1_tampil( $tbl_bannerkategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				menuatas1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function bannerKategori_menuatas2_tampil( $tbl_bannerkategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				menuatas2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function bannerKategori_menubawah1_tampil( $tbl_bannerkategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				menubawah1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function bannerKategori_menubawah2_tampil( $tbl_bannerkategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bannerkategori SET
				menubawah2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* End Function Update Status Tampil */




	/* KANAL banner : hapus kanal banner berdasarkan id terpilih */
	function  bannerKategori_HapusData( $tbl_bannerkategori, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_bannerkategori WHERE id='$id'
		");
		return $sql;
	}
	
	
	/* Buat Direktori Untuk File Kategori banner */
	function bannerKategori_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/banner/" . "kategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
 	
	/* select kanal banner berdasarkan id terpilih */
	
	
	/* KANAL banner : select kanal banner berdasarkan status tampil = 1 pengurutan berdasarkan field urutan terbesar ( desc )*/	
	function Select_All_Publish_banner_Kategori( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}

 
	/* KANAL banner : */		
	function getJmlTotalbannerKategori(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_bannerkategori";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}

 	
 	function hapusgambarbannerkategori($id){
		$sqlText = "UPDATE $this->tbl_bannerkategori SET imagefile = '', imagelogo='' where id = $id";
		return mysql_query($sqlText);
	}

	
 
 	function Select_All_Kategori_banner_By_Urutan( $tbl_bannerkategori ){
 		$sql = mysql_query(" SELECT * FROM $tbl_bannerkategori ORDER BY urutan ");
 		return $sql;
	}


	/* TAMPILKAN DATA KATEGORI BERDASARKAN ID KATEGORI */
	function Select_Kategori_banner_By_Id( $tbl_bannerkategori, $idkategori ){
		$sql = mysql_query("
			SELECT * FROM $tbl_bannerkategori WHERE id ='$idkategori'
		");
		return $sql;
	}





	/* TAMPILKAN KATEGORI DI MENU ATAS 1 */
	function List_MenuAtas1_Kanalbanner( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE menuatas1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU ATAS 2 */
	function List_MenuAtas2_Kanalbanner( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE menuatas2 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 1 */
	function List_MenuBawah1_Kanalbanner( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE menubawah1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 2 */
	function List_MenuBawah2_Kanalbanner( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE menubawah2 ='1' ORDER BY urutan ");
		return $sql;
	}




	/* TAMPILKAN KATEGORI / KANAL YANG TAMPIL DI HOMEPAGE */
	function Select_Kanalbanner_TampilDiHomepage( $tbl_bannerkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE homepagetampil ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI */
	function Detail_Kanalbanner_Publish( $tbl_bannerkategori , $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE statustampil='1' AND id='$idkategori'");
		$result = mysql_fetch_object($sql);
		return $result;
	}



 
	function bannerKanalDiLihat( $tbl_bannerkategori, $id ){ /* Hit Counter Kanal banner */
	
			$sql = mysql_query("SELECT * FROM $tbl_bannerkategori WHERE id='$id'");
			$databanner = mysql_fetch_array($sql);
			$hit = $databanner ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_bannerkategori SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_Kanalbanner( $tbl_bannerkategori ){ /* Cek Jumlah Hits banner Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_bannerkategori";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}



?>