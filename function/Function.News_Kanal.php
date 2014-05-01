<?php 
/* Fungsi Buat ID Otomatis Untuk news Kategori. */
	function newsKategori_CreateID( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	/*  Fungsi Periksa Judul news Kategori */
	function newsKategori_Periksaketerangan( $tbl_newskategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE keterangan = '$keterangan' AND keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}
 
	/* Fungsi Tambah Data news Kategori */
	function newsKategori_TambahData(
		$tbl_newskategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_newskategori
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
 	function newsKategori_UpdateData(
		$tbl_newskategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword
	){
	
	$sql = mysql_query("
	UPDATE $tbl_newskategori SET

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


	/* TAMPILKAN DETAIL KATEGORI news BERDASARKAN ID */
	function Select_Detail_Kategori_news( $tbl_newskategori, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}




/* Start Update Image */

	function newsKategori_update_image_logo( $tbl_newskategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function newsKategori_update_image_header( $tbl_newskategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function newsKategori_update_image_background( $tbl_newskategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
/* End Update Image */
	
	
	
/* Start Function Update Status Tampil */

	function newsKategori_StatusTampil( $tbl_newskategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function newsKategori_HomepageTampil( $tbl_newskategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				homepagetampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function newsKategori_menuatas1_tampil( $tbl_newskategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				menuatas1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function newsKategori_menuatas2_tampil( $tbl_newskategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				menuatas2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function newsKategori_menubawah1_tampil( $tbl_newskategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				menubawah1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function newsKategori_menubawah2_tampil( $tbl_newskategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_newskategori SET
				menubawah2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* End Function Update Status Tampil */




	/* KANAL news : hapus kanal news berdasarkan id terpilih */
	function  newsKategori_HapusData( $tbl_newskategori, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_newskategori WHERE id='$id'
		");
		return $sql;
	}
	
	
	/* Buat Direktori Untuk File Kategori news */
	function newsKategori_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/news/" . "kategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
 	
	/* select kanal news berdasarkan id terpilih */
	
	
	/* KANAL news : select kanal news berdasarkan status tampil = 1 pengurutan berdasarkan field urutan terbesar ( desc )*/	
	function Select_All_Publish_news_Kategori( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}

 	
 
 	function Select_All_Kategori_news_By_Urutan( $tbl_newskategori ){
 		$sql = mysql_query(" SELECT * FROM $tbl_newskategori ORDER BY urutan ");
 		return $sql;
	}


	/* TAMPILKAN DATA KATEGORI BERDASARKAN ID KATEGORI */
	function Select_Kategori_news_By_Id( $tbl_newskategori, $idkategori ){
		$sql = mysql_query("
			SELECT * FROM $tbl_newskategori WHERE id ='$idkategori'
		");
		return $sql;
	}



 

	/* TAMPILKAN KATEGORI DI MENU ATAS 1 */
	function List_MenuAtas1_Kanalnews( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE menuatas1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU ATAS 2 */
	function List_MenuAtas2_Kanalnews( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE menuatas2 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 1 */
	function List_MenuBawah1_Kanalnews( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE menubawah1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 2 */
	function List_MenuBawah2_Kanalnews( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE menubawah2 ='1' ORDER BY urutan ");
		return $sql;
	}




	/* TAMPILKAN KATEGORI / KANAL YANG TAMPIL DI HOMEPAGE */
	function Select_Kanalnews_TampilDiHomepage( $tbl_newskategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE homepagetampil ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI */
	function Detail_Kanalnews_Publish( $tbl_newskategori , $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE statustampil='1' AND id='$idkategori'");
		$result = mysql_fetch_object($sql);
		return $result;
	}



 
	function newsKanalDiLihat( $tbl_newskategori, $id ){ /* Hit Counter Kanal news */
	
			$sql = mysql_query("SELECT * FROM $tbl_newskategori WHERE id='$id'");
			$datanews = mysql_fetch_array($sql);
			$hit = $datanews ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_newskategori SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_Kanalnews( $tbl_newskategori ){ /* Cek Jumlah Hits news Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_newskategori";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}




?>