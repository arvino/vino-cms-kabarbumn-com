<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL SUB KANAL gallery */
 	/* Fungsi Buat ID Otomatis Untuk gallery Kategori Sub . */
	function galleryKategoriSub_CreateID( $tbl_gallerykategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 
	/*  Fungsi Periksa Judul gallery Sub Kategori */
	function galleryKategoriSub_PeriksaJudul( $tbl_gallerykategorisub, $idkategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE idkategori = '$idkategori' AND 
		keterangan = '$keterangan' AND 
		keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}

	/* Fungsi Tambah Data gallery Kategori Sub */
	function galleryKategoriSub_TambahData(
		$tbl_gallerykategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
		$sql = mysql_query("INSERT INTO $tbl_gallerykategorisub
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


	function galleryKategoriSub_UpdateData(
		$tbl_gallerykategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
	
	$sql = mysql_query("
	UPDATE $tbl_gallerykategorisub SET
 
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


	function Select_Detail_KategoriSub_gallery( $tbl_gallerykategorisub, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}





/* ---------- Start Function Image ------ */

/* Function Hapus Image Location / Path */
	function galleryKategoriSub_HapusImage( $tbl_gallerykategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				imagefile = '' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* Function Hapus Image Logo */
	function galleryKategoriSub_HapusImageLogo( $tbl_gallerykategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
	
/* Function Hapus Image Header  */
	function galleryKategoriSub_HapusImageHeader( $tbl_gallerykategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* Function Hapus Image Background  */
	function galleryKategoriSub_HapusImageBackground( $tbl_gallerykategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
 				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* ---------- End Function Hapus Image */


/* Start status tampil */

	function galleryKategoriSub_StatusTampil( $tbl_gallerykategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				statustampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function galleryKategoriSub_HomepageTampil( $tbl_gallerykategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				homepagetampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function galleryKategoriSub_MenuAtas1Tampil( $tbl_gallerykategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				menuatas1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}
	
	

	function galleryKategoriSub_MenuAtas2Tampil( $tbl_gallerykategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				menuatas2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function galleryKategoriSub_MenuBawah1Tampil( $tbl_gallerykategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				menubawah1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function galleryKategoriSub_MenuBawah2Tampil( $tbl_gallerykategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategorisub SET
				menubawah2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


/* End Function tampil */




	/* SUB KANAL gallery : hapus sub kanal gallery berdasarkan id terpilih */
	function  galleryKategoriSub_HapusData( $tbl_gallerykategorisub, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_gallerykategorisub WHERE id='$id'
		");
		return $sql;
	}
	

	
	/* Buat Direktori Untuk File Sub Kategori gallery */
	function galleryKategoriSub_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/gallery/" . "subkategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}


 
	
 	function AmbilJumlahTotalgalleryKategoriSub()
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_gallerykategorisub";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

 	function AmbilJumlahTotalgalleryKategoriSub_ByKategori( $tbl_gallerykategorisub, $idkategori )
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_gallerykategorisub WHERE idkategori='$idkategori'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	


  
	function Select_All_SubKategori_gallery_By_Urutan( $tbl_gallerykategorisub, $idkategori ){
		 $sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}

  
	function Select_All_SubKategori_gallery_By_NOTIDSUB( $tbl_gallerykategorisub, $idkategori, $idkategorisub ){
		 $sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}



function Box_Subkanal_gallery_TampilHomepage($tbl_gallerykategorisub, $posisi){
$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE homepagetampil='1' AND posisi = '$posisi'");
return $sql;
}



/* TAMPILKAN SUB KATEGORI DI MENU 2 */
function List_MenuTampil2_SubKanalgallery( $tbl_gallerykategorisub, $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE idkategori='$idkategori' AND menutampil2 ='1' ORDER BY urutan ");
		return $sql;
}

 

function Select_SubKategori_gallery_By_Id( $tbl_gallerykategorisub, $idsubkategori ){

		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE id = '$idsubkategori'");
		$result = mysql_fetch_object($sql);
		return $result;

}


	function Detail_SubKanalgallery_Publish( $tbl_gallerykategorisub , $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE statustampil='1' AND id='$idkategorisub'");
		$result = mysql_fetch_object($sql);
		return $result;
	}

 
	function gallerySubKanalDiLihat( $tbl_gallerykategorisub, $id ){ /* Hit Counter Sub Kanal gallery */
	
			$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE id='$id'");
			$datagallery = mysql_fetch_array($sql);
			$hit = $datagallery ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_gallerykategorisub SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_SubKanalgallery( $tbl_gallerykategorisub ){ /* Cek Jumlah Hits gallery Sub Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_gallerykategorisub";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}

	function List_SubKanalgallery_Publish( $tbl_gallerykategorisub , $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE idkategori='$idkategori' 
		AND statustampil ='1' ORDER BY urutan ");
		return $sql;
	}

	function Select_All_Publish_gallery_SubKategori_Desc_Urutan( $tbl_gallerykategorisub , $idkategori){
		 $sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE 
		 	statustampil = '1' AND
		 	idkategori = '$idkategori' 
		 ORDER BY urutan DESC");
		 return $sql;
	}
	
	/* List gallery subkanal tampil di homepage */
  
	function Select_All_Publish_gallery_SubKategori_Desc_Homepage( $tbl_gallerykategorisub , $idkategori, $dataperpage){
		 $sql = mysql_query("SELECT * FROM $tbl_gallerykategorisub WHERE 
		 	statustampil = '1' AND
			keterangan NOT LIKE '%china%'  AND
		 	idkategori = '$idkategori' 
		 ORDER BY hit DESC LIMIT $dataperpage");
		 return $sql;
	}

?>