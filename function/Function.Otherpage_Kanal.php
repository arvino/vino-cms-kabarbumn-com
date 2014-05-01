<?php 
/* Fungsi Buat ID Otomatis Untuk otherpage Kategori. */
	function otherpageKategori_CreateID( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	/*  Fungsi Periksa Judul otherpage Kategori */
	function otherpageKategori_Periksaketerangan( $tbl_otherpagekategori, $keterangan, $keteranganinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE keterangan = '$keterangan' AND keteranganinggris = '$keteranganinggris'");
		return $sql;	
	}
 
	/* Fungsi Tambah Data otherpage Kategori */
	function otherpageKategori_TambahData(
		$tbl_otherpagekategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_otherpagekategori
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
 	function otherpageKategori_UpdateData(
		$tbl_otherpagekategori,
		$id, $idupline, $keterangan, $keteranganinggris,
		$posisi, $urutan,
		$homepagetampil, $menuatas1, $menuatas2,
		$menubawah1, $menubawah2, $statustampil,
		$imagefile, $imagelogo, $imageheader, $imagebackground,
		$hit, $linkjudul, $keyword
	){
	
	$sql = mysql_query("
	UPDATE $tbl_otherpagekategori SET

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


	/* TAMPILKAN DETAIL KATEGORI otherpage BERDASARKAN ID */
	function Select_Detail_Kategori_otherpage( $tbl_otherpagekategori, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}




/* Start Update Image */

	function otherpageKategori_update_image_logo( $tbl_otherpagekategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				imagelogo = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function otherpageKategori_update_image_header( $tbl_otherpagekategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				imageheader = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function otherpageKategori_update_image_background( $tbl_otherpagekategori, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				imagebackground = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}
/* End Update Image */
	
	
	
/* Start Function Update Status Tampil */

	function otherpageKategori_StatusTampil( $tbl_otherpagekategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function otherpageKategori_HomepageTampil( $tbl_otherpagekategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				homepagetampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function otherpageKategori_menuatas1_tampil( $tbl_otherpagekategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				menuatas1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


	function otherpageKategori_menuatas2_tampil( $tbl_otherpagekategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				menuatas2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function otherpageKategori_menubawah1_tampil( $tbl_otherpagekategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				menubawah1 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function otherpageKategori_menubawah2_tampil( $tbl_otherpagekategori, $statustampil, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpagekategori SET
				menubawah2 = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}


/* End Function Update Status Tampil */




	/* KANAL otherpage : hapus kanal otherpage berdasarkan id terpilih */
	function  otherpageKategori_HapusData( $tbl_otherpagekategori, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_otherpagekategori WHERE id='$id'
		");
		return $sql;
	}
	
	
	/* Buat Direktori Untuk File Kategori otherpage */
	function otherpageKategori_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/otherpage/" . "kategoriimage/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
 	
	/* select kanal otherpage berdasarkan id terpilih */
	
	
	/* KANAL otherpage : select kanal otherpage berdasarkan status tampil = 1 pengurutan berdasarkan field urutan terbesar ( desc )*/	
	function Select_All_Publish_otherpage_Kategori( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}

 
	/* KANAL otherpage : */		
	function getJmlTotalotherpageKategori(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpagekategori";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}

 	
 	function hapusgambarotherpagekategori($id){
		$sqlText = "UPDATE $this->tbl_otherpagekategori SET imagefile = '', imagelogo='' where id = $id";
		return mysql_query($sqlText);
	}

	
 
 	function Select_All_Kategori_otherpage_By_Urutan( $tbl_otherpagekategori ){
 		$sql = mysql_query(" SELECT * FROM $tbl_otherpagekategori ORDER BY urutan ");
 		return $sql;
	}


	/* TAMPILKAN DATA KATEGORI BERDASARKAN ID KATEGORI */
	function Select_Kategori_otherpage_By_Id( $tbl_otherpagekategori, $idkategori ){
		$sql = mysql_query("
			SELECT * FROM $tbl_otherpagekategori WHERE id ='$idkategori'
		");
		return $sql;
	}





	/* TAMPILKAN KATEGORI DI MENU ATAS 1 */
	function List_MenuAtas1_Kanalotherpage( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE menuatas1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU ATAS 2 */
	function List_MenuAtas2_Kanalotherpage( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE menuatas2 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 1 */
	function List_MenuBawah1_Kanalotherpage( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE menubawah1 ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI DI MENU BAWAH 2 */
	function List_MenuBawah2_Kanalotherpage( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE menubawah2 ='1' ORDER BY urutan ");
		return $sql;
	}




	/* TAMPILKAN KATEGORI / KANAL YANG TAMPIL DI HOMEPAGE */
	function Select_Kanalotherpage_TampilDiHomepage( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE homepagetampil ='1' ORDER BY urutan ");
		return $sql;
	}

	/* TAMPILKAN KATEGORI */
	function Detail_Kanalotherpage_Publish( $tbl_otherpagekategori , $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE statustampil='1' AND id='$idkategori'");
		$result = mysql_fetch_object($sql);
		return $result;
	}



 
	function otherpageKanalDiLihat( $tbl_otherpagekategori, $id ){ /* Hit Counter Kanal otherpage */
	
			$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE id='$id'");
			$dataotherpage = mysql_fetch_array($sql);
			$hit = $dataotherpage ['hit'];
			$hit = $hit+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_otherpagekategori SET hit='$hit' WHERE id='$id'");
			
			return $sqlupdate;
	}


	function cekJmlHits_Kanalotherpage( $tbl_otherpagekategori ){ /* Cek Jumlah Hits otherpage Kanal */
		$sqlText = "SELECT sum(hit) as jml FROM $tbl_otherpagekategori";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}




	/* TAMPILKAN OTHER PAGE UNTUK MENU FOOTER - MENU UTAMA  *//* 22 Maret 2011 */
	function View_Kanalotherpage_Publish_MenuAtas1( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE 
			homepagetampil = '1' AND
			statustampil='1' AND 
			menuatas1 = '1'
		ORDER BY urutan ASC
		");
	 
		return $sql;
	}

	/* TAMPILKAN OTHER PAGE UNTUK MENU FOOTER - MENU BAWAH 1 *//* 22 Maret 2011 */
	function View_Kanalotherpage_Publish_MenuBawah1( $tbl_otherpagekategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagekategori WHERE 
			homepagetampil = '1' AND
			statustampil='1' AND 
			menubawah1 = '1'
		ORDER BY urutan ASC
		");
	 
		return $sql;
	}


?>