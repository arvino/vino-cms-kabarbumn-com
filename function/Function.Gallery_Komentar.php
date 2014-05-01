<?php 
function gallerykomentar_createid($tbl_gallerykomentar){ /* Fungsi buat id */
		$sql = mysql_query("SELECT * FROM $tbl_gallerykomentar ORDER BY id DESC");
		$data = mysql_fetch_object($sql);
		$id = $data->id + 1;
		return $id;
	}


	function gallerykomentar_create( $tbl_gallerykomentar, 
		$id,$idkonten,$idusers,$fb_id,$fb_email,$fb_pic,$fb_profil, 
		$judul,$pesan, $tglpost,$jampost,$tgltampil,$jamtampil,$statustampil,
		$idadmin,$noaktifasi,$ipaddress
	 ){
		$sql = mysql_query("INSERT INTO $tbl_gallerykomentar (
			id,idkonten,idusers,fb_id,fb_email,fb_pic,fb_profil, 
			judul,pesan,tglpost,jampost,tgltampil,jamtampil,statustampil,
			idadmin,noaktifasi,ipaddress
		) VALUES (
			'$id','$idkonten','$idusers','$fb_id','$fb_email','$fb_pic','$fb_profil', 
			'$judul','$pesan','$tglpost','$jampost','$tgltampil','$jamtampil','$statustampil',
			'$idadmin','$noaktifasi','$ipaddress'
		)
		");
		return $sql;
	}

	function gallerykomentar_updatedata( $tbl_gallerykomentar, 
		$id,$idkonten,$idusers,$fb_id,$fb_email,$fb_pic,$fb_profil, 
		$judul,$pesan, $tglpost,$jampost,$tgltampil,$jamtampil,$statustampil,
		$idadmin,$noaktifasi,$ipaddress
	){ 
		$sql = mysql_query("UPDATE $tbl_gallerykomentar SET

				idkonten = '$idkonten',
				idusers = '$idusers',
				fb_id = '$fb_id',
				fb_email = '$fb_email',
				fb_pic = '$fb_pic',
				fb_profil = '$fb_profil',
				judul = '$judul',
				pesan = '$pesan',
				tglpost = '$tglpost',
				jampost = '$jampost',
				tgltampil = '$tgltampil',
				jamtampil = '$jamtampil',
				statustampil = '$statustampil',
				idadmin = '$idadmin',
				noaktifasi = '$noaktifasi',
				ipaddress = '$ipaddress'

			WHERE 
				
				id='$id'
		");
		return $sql;
	}
	
	function gallerykomentar_update_statustampil( $tbl_gallerykomentar, $id, $statustampil ){
		$sql = mysql_query("UPDATE $tbl_gallerykomentar SET statustampil='$statustampil' WHERE id='$id'");
		return $sql;
	}

	function gallerykomentar_deletedata($tbl_gallerykomentar, $id){ /* Fungsi delete data by id */
		$sql = mysql_query("DELETE FROM $tbl_gallerykomentar WHERE id = '$id'");
		return $sql;
	}
	
	function gallerykomentar_viewdetail($tbl_gallerykomentar){ /* Fungsi view detail data pada tabel polling komentar */
			$sql = mysql_query("SELECT * FROM $tbl_gallerykomentar WHERE id='$id'");
			return $sql;
	}

	function gallerykomentar_listdata($tbl_gallerykomentar){ /* Fungsi list detail data pada tabel polling komentar */
			$sql  = mysql_query("SELECT * FROM $tbl_gallerykomentar");
			return $sql;
	}

	function gallerykomentar_read_list_by_idkonten($tbl_gallerykomentar, $iditem){ 
			$sql  = mysql_query("SELECT * FROM $tbl_gallerykomentar WHERE idkonten = '$iditem'");
			return $sql;
	}


	function gallerykomentar_read_list_by_statustampil($tbl_gallerykomentar, $iditem){ 
			$sql  = mysql_query("SELECT * FROM $tbl_gallerykomentar WHERE statustampil='1' AND idkonten = '$iditem'");
			return $sql;
	}


	function gallerykomentar_read_item_publish_by_page( $tbl_polling, $offset, $dataPerPage ){
		$sql = mysql_query("SELECT * FROM $tbl_polling WHERE statustampil='1' ORDER BY id DESC LIMIT $offset, $dataPerPage");
		return $sql;
	}


	function gallerykomentar_read_count_by_idkonten( $tbl_gallerykomentar , $iditem ){
			$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallerykomentar WHERE 
				idkonten LIKE '$iditem'
			");
			$row = mysql_fetch_object($sql);
			$jml = $row->jml;
			return $jml;	
	}

	function gallerykomentar_searchdata( $tbl_gallerykomentar, $cari ){ /* Fungsi search data pada tabel polling komentar  */
			$sql = mysql_query("SELECT * FROM $tbl_gallerykomentar WHERE 
				judul LIKE '$cari' OR
				pesan LIKE '$cari' 
					ORDER BY id ASC  
			");  
			return $sql;
	}
	

	function gallerykomentar_searchdata_all_bypage( $tbl_gallerykomentar, $cari, $offset, $dataperPage ){ /* Fungsi search data pada tabel polling komentar  */
			$sql = mysql_query("SELECT * FROM $tbl_gallerykomentar WHERE 
				judul LIKE '$cari' OR
				pesan LIKE '$cari' 
					ORDER BY id ASC LIMIT $offset, $dataperPage
			");  
			return $sql;
	}
	
	function gallerykomentar_searchdata_countdata( $tbl_gallerykomentar , $cari ){
			$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallerykomentar WHERE 
				judul LIKE '$cari' OR
				pesan LIKE '$cari' 
			");
			$row = mysql_fetch_object($sql);
			$jml = $row->jml;
			return $jml;	
	}



?>