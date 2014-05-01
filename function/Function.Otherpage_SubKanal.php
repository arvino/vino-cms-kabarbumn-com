<?php 
/* Fungsi Buat ID Otomatis Untuk otherpage Kategori Sub . */
	function otherpageKategoriSub_CreateID( $tbl_otherpagekategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 
	/*  Fungsi Periksa Judul otherpage Sub Kategori */
	function otherpageKategoriSub_PeriksaJudul( $tbl_otherpagekategorisub, $idkategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE idkategori = '$idkategori' AND 
		keterangan = '$keterangan' AND 
		keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}

	/* Fungsi Tambah Data otherpage Kategori Sub */
	function otherpageKategoriSub_TambahData(
		$tbl_otherpagekategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
		$sql = mysql_query("INSERT INTO $tbl_otherpagekategorisub
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


	function otherpageKategoriSub_UpdateData(
		$tbl_otherpagekategorisub,
		$id, $idupline, $idkategori,
		$keterangan, $keteranganinggris,
		$statustampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $homepagetampil,
		$posisi, $urutan,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword 
	){
	
	$sql = mysql_query("
	UPDATE $tbl_otherpagekategorisub SET
 
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


	function Select_Detail_KategoriSub_otherpage( $tbl_otherpagekategorisub, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}





/* ---------- Start Function Image ------ */

/* Function Hapus Image Location / Path */
	function otherpageKategoriSub_HapusImage( $tbl_otherpagekategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				imagefile = '' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* Function Hapus Image Logo */
	function otherpageKategoriSub_HapusImageLogo( $tbl_otherpagekategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
	
/* Function Hapus Image Header  */
	function otherpageKategoriSub_HapusImageHeader( $tbl_otherpagekategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* Function Hapus Image Background  */
	function otherpageKategoriSub_HapusImageBackground( $tbl_otherpagekategorisub, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
 				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}	
	
/* ---------- End Function Hapus Image */


/* Start status tampil */

	function otherpageKategoriSub_StatusTampil( $tbl_otherpagekategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				statustampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function otherpageKategoriSub_HomepageTampil( $tbl_otherpagekategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				homepagetampil = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


	function otherpageKategoriSub_MenuAtas1Tampil( $tbl_otherpagekategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				menuatas1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function otherpageKategoriSub_MenuAtas2Tampil( $tbl_otherpagekategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				menuatas2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function otherpageKategoriSub_MenuBawah1Tampil( $tbl_otherpagekategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				menubawah1 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}

	function otherpageKategoriSub_MenuBawah2Tampil( $tbl_otherpagekategorisub, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategorisub SET
				menubawah2 = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}


/* End Function tampil */




	/* SUB KANAL otherpage : hapus sub kanal otherpage berdasarkan id terpilih */
	function  otherpageKategoriSub_HapusData( $tbl_otherpagekategorisub, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_otherpagekategorisub WHERE id='$id'
		");
		return $sql;
	}
	

	
	/* Buat Direktori Untuk File Sub Kategori otherpage */
	function otherpageKategoriSub_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/otherpage/" . "subkategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}


 
	
 	function AmbilJumlahTotalotherpageKategoriSub()
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpagekategorisub";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

 	function AmbilJumlahTotalotherpageKategoriSub_ByKategori( $tbl_otherpagekategorisub, $idkategori )
	{
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpagekategorisub WHERE idkategori='$idkategori'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

	function Select_All_Publish_Otherpage_SubKategori_Desc_Urutan( $tbl_otherpagekategorisub , $idkategori){
		 $sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE 
		 	statustampil = '1' AND
		 	idkategori = '$idkategori' 
		 ORDER BY urutan ASC");
		 return $sql;
	}
  
	function Select_All_SubKategori_otherpage_By_Urutan( $tbl_otherpagekategorisub, $idkategori ){
		 $sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}

  
	function Select_All_SubKategori_otherpage_By_NOTIDSUB( $tbl_otherpagekategorisub, $idkategori, $idkategorisub ){
		 $sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE idkategori='$idkategori' ORDER BY id");
		 return $sql;
	}



function Box_Subkanal_otherpage_TampilHomepage($tbl_otherpagekategorisub, $posisi){
$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE homepagetampil='1' AND posisi = '$posisi'");
return $sql;
}



/* TAMPILKAN SUB KATEGORI DI MENU 2 */
function List_MenuTampil2_SubKanalotherpage( $tbl_otherpagekategorisub, $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE idkategori='$idkategori' AND menutampil2 ='1' ORDER BY urutan ");
		return $sql;
}

 

function Select_SubKategori_otherpage_By_Id( $tbl_otherpagekategorisub, $idsubkategori ){

		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE id = '$idsubkategori'");
		$result = mysql_fetch_object($sql);
		return $result;

}


	function Detail_SubKanalotherpage_Publish( $tbl_otherpagekategorisub , $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE statustampil='1' AND id='$idkategorisub'");
		$result = mysql_fetch_object($sql);
		return $result;
	}

 
	function otherpageSubKanalDiLihat( $tbl_otherpagekategorisub, $id ){ /* Hit Counter Sub Kanal otherpage */
	
			$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE id='$id'");
			$dataotherpage = mysql_fetch_array($sql);
			$hit = $dataotherpage ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_otherpagekategorisub SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_SubKanalotherpage( $tbl_otherpagekategorisub ){ /* Cek Jumlah Hits otherpage Sub Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_otherpagekategorisub";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}




/* TAMPILKAN SUB KATEGORI DI MENU 2 */
function List_SubKanalotherpage_Publish( $tbl_otherpagekategorisub , $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategorisub WHERE idkategori='$idkategori' AND statustampil ='1' ORDER BY urutan ");
		return $sql;
}


	function otherpageCount_KategoriSub_ByKategori( $tbl_otherpagekategorisub, $idkategori){
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_otherpagekategorisub WHERE idkategori='$idkategori'";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}


?>