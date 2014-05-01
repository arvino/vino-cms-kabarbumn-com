<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL KANAL gallery */
	/* Fungsi Buat ID Otomatis Untuk gallery Kategori. */
	function galleryKategori_CreateID( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	/*  Fungsi Periksa Judul gallery Kategori */
	function galleryKategori_Periksaketerangan( $tbl_gallerykategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE keterangan = '$keterangan' AND keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}
 
	/* Fungsi Tambah Data gallery Kategori */
	function galleryKategori_TambahData(
		$tbl_gallerykategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_gallerykategori
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
 	function galleryKategori_UpdateData(
		$tbl_gallerykategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword
	){
	
	$sql = mysql_query("
	UPDATE $tbl_gallerykategori SET

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


	/* TAMPILKAN DETAIL KATEGORI gallery BERDASARKAN ID */
	function Select_Detail_Kategori_gallery( $tbl_gallerykategori, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}




/* Start Update Image */

	function galleryKategori_update_image_logo( $tbl_gallerykategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function galleryKategori_update_image_header( $tbl_gallerykategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function galleryKategori_update_image_background( $tbl_gallerykategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
/* End Update Image */
	
	
	
/* Start Function Update Status Tampil */

	function galleryKategori_StatusTampil( $tbl_gallerykategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function galleryKategori_HomepageTampil( $tbl_gallerykategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				homepagetampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function View_Kanalgallery_Publish_MenuAtas1( $tbl_gallerykategori ){ /* menu tampil di atas */
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE 
			homepagetampil = '1' AND
			statustampil='1' AND 
			menuatas1 = '1'
		ORDER BY urutan ASC
		");
	 
		return $sql;
	}


	function galleryKategori_menuatas1_tampil( $tbl_gallerykategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				menuatas1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function galleryKategori_menuatas2_tampil( $tbl_gallerykategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				menuatas2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function galleryKategori_menubawah1_tampil( $tbl_gallerykategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				menubawah1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function galleryKategori_menubawah2_tampil( $tbl_gallerykategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallerykategori SET
				menubawah2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* End Function Update Status Tampil */




	/* KANAL gallery : hapus kanal gallery berdasarkan id terpilih */
	function  galleryKategori_HapusData( $tbl_gallerykategori, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_gallerykategori WHERE id='$id'
		");
		return $sql;
	}
	
	
	/* Buat Direktori Untuk File Kategori gallery */
	function galleryKategori_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/gallery/" . "kategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
 	
	/* select kanal gallery berdasarkan id terpilih */
	
	
	/* KANAL gallery : select kanal gallery berdasarkan status tampil = 1 pengurutan berdasarkan field urutan terbesar ( desc )*/	
	function Select_All_Publish_gallery_Kategori( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}

 
	/* KANAL gallery : */		
	function getJmlTotalgalleryKategori(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_gallerykategori";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}

 	
 	function hapusgambargallerykategori($id){
		$sqlText = "UPDATE $this->tbl_gallerykategori SET imagefile = '', imagelogo='' where id = $id";
		return mysql_query($sqlText);
	}

	
 
 	function Select_All_Kategori_gallery_By_Urutan( $tbl_gallerykategori ){
 		$sql = mysql_query(" SELECT * FROM $tbl_gallerykategori ORDER BY urutan ");
 		return $sql;
	}


	/* TAMPILKAN DATA KATEGORI BERDASARKAN ID KATEGORI */
	function Select_Kategori_gallery_By_Id( $tbl_gallerykategori, $idkategori ){
		$sql = mysql_query("
			SELECT * FROM $tbl_gallerykategori WHERE id ='$idkategori'
		");
		return $sql;
	}





	/* TAMPILKAN KATEGORI DI MENU ATAS 1 */
	function List_MenuAtas1_Kanalgallery( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE menuatas1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU ATAS 2 */
	function List_MenuAtas2_Kanalgallery( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE menuatas2 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 1 */
	function List_MenuBawah1_Kanalgallery( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE menubawah1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 2 */
	function List_MenuBawah2_Kanalgallery( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE menubawah2 ='1' ORDER BY urutan ");
		return $sql;
	}




	/* TAMPILKAN KATEGORI / KANAL YANG TAMPIL DI HOMEPAGE */
	function Select_Kanalgallery_TampilDiHomepage( $tbl_gallerykategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE homepagetampil ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI */
	function Detail_Kanalgallery_Publish( $tbl_gallerykategori , $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE statustampil='1' AND id='$idkategori'");
		$result = mysql_fetch_object($sql);
		return $result;
	}



 
	function galleryKanalDiLihat( $tbl_gallerykategori, $id ){ /* Hit Counter Kanal gallery */
	
			$sql = mysql_query("SELECT * FROM $tbl_gallerykategori WHERE id='$id'");
			$datagallery = mysql_fetch_array($sql);
			$hit = $datagallery ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_gallerykategori SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_Kanalgallery( $tbl_gallerykategori ){ /* Cek Jumlah Hits gallery Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_gallerykategori";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}



?>