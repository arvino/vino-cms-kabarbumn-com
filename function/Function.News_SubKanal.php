<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL SUB KANAL news */

 	/* Fungsi Buat ID Otomatis Untuk news Kategori Sub . */
	function newsKategoriSub_CreateID( $tbl_newskategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategorisub ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 
	/*  Fungsi Periksa Judul news Sub Kategori */
	function newsKategoriSub_PeriksaJudul( $tbl_newskategorisub, $idkategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE idkategori = '$idkategori' AND 
		keterangan = '$keterangan' AND 
		keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}

	/* Fungsi Tambah Data news Kategori Sub */
	function newsKategoriSub_TambahData(
		$tbl_newskategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
		$sql = mysql_query("INSERT INTO $tbl_newskategorisub
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


	function newsKategoriSub_UpdateData(
		$tbl_newskategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
	
	$sql = mysql_query("
	UPDATE $tbl_newskategorisub SET
 
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


	function Select_Detail_KategoriSub_news( $tbl_newskategorisub, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}





/* ---------- Start Function Image ------ */

/* Function Hapus Image Location / Path */
	function newsKategoriSub_HapusImage( $tbl_newskategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				imagefile = '' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* Function Hapus Image Logo */
	function newsKategoriSub_HapusImageLogo( $tbl_newskategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
	
/* Function Hapus Image Header  */
	function newsKategoriSub_HapusImageHeader( $tbl_newskategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* Function Hapus Image Background  */
	function newsKategoriSub_HapusImageBackground( $tbl_newskategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
 				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* ---------- End Function Hapus Image */


/* Start status tampil */

	function newsKategoriSub_StatusTampil( $tbl_newskategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				statustampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function newsKategoriSub_HomepageTampil( $tbl_newskategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				homepagetampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function newsKategoriSub_MenuAtas1Tampil( $tbl_newskategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				menuatas1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function newsKategoriSub_MenuAtas2Tampil( $tbl_newskategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				menuatas2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function newsKategoriSub_MenuBawah1Tampil( $tbl_newskategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				menubawah1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function newsKategoriSub_MenuBawah2Tampil( $tbl_newskategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategorisub SET
				menubawah2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


/* End Function tampil */




	/* SUB KANAL news : hapus sub kanal news berdasarkan id terpilih */
	function  newsKategoriSub_HapusData( $tbl_newskategorisub, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_newskategorisub WHERE id='$id'
		");
		return $sql;
	}
	

	
	/* Buat Direktori Untuk File Sub Kategori news */
	function newsKategoriSub_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/news/" . "subkategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}


 
	
 	function AmbilJumlahTotalnewsKategoriSub()
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_newskategorisub";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

 	function AmbilJumlahTotalnewsKategoriSub_ByKategori( $tbl_newskategorisub, $idkategori ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_newskategorisub WHERE idkategori='$idkategori'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	


  
	function Select_All_SubKategori_news_By_Urutan( $tbl_newskategorisub, $idkategori ){
		 $sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}

	function Select_All_SubKategori_news_By_Kategori( $tbl_newskategorisub, $idkategori ){
		 $sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE idkategori='$idkategori' ORDER BY urutan");
		 return $sql;
	}


  
	function Select_All_SubKategori_news_By_NOTIDSUB( $tbl_newskategorisub, $idkategori, $idkategorisub ){
		 $sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}



function Box_Subkanal_news_TampilHomepage($tbl_newskategorisub, $posisi){
$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE homepagetampil='1' AND posisi = '$posisi'");
return $sql;
}



/* TAMPILKAN SUB KATEGORI DI MENU 2 */
function List_MenuTampil2_SubKanalnews( $tbl_newskategorisub, $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE idkategori='$idkategori' AND menutampil2 ='1' ORDER BY urutan ");
		return $sql;
}

 

function Select_SubKategori_news_By_Id( $tbl_newskategorisub, $idsubkategori ){

		$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE id = '$idsubkategori'");
		$result = mysql_fetch_object($sql);
		return $result;

}


	function Detail_SubKanalnews_Publish( $tbl_newskategorisub , $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE statustampil='1' AND id='$idkategorisub'");
		$result = mysql_fetch_object($sql);
		return $result;
	}

 
	function newsSubKanalDiLihat( $tbl_newskategorisub, $id ){ /* Hit Counter Sub Kanal news */
	
			$sql = mysql_query("SELECT * FROM $tbl_newskategorisub WHERE id='$id'");
			$datanews = mysql_fetch_array($sql);
			$hit = $datanews ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_newskategorisub SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_SubKanalnews( $tbl_newskategorisub ){ /* Cek Jumlah Hits news Sub Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_newskategorisub";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}


	function newsCount_KategoriSub_ByKategori( $tbl_newskategorisub, $idkategori){
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_newskategorisub WHERE idkategori='$idkategori'";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}



?>