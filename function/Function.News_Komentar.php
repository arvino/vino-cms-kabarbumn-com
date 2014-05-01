<?php 
/* LIST FUNCTION UNTUK TABEL downloadarea komentar */
/* 

id
iddownloadarea
idclient
idadmin
judul
pesan
tanggalpost
jampost
tgltampil
jamtampil
statustampil
ipaddress

*/  



function newskomentar_createid($tbl_newskomentar){ /* Fungsi buat id */
	$sql = mysql_query("SELECT * FROM $tbl_newskomentar ");
	return $sql;
}


function newskomentar_tambahdata( $tbl_newskomentar, 
		$id, $iddownloadarea, $idclient,
		$idadmin, $judul, $pesan,
		$tanggalpost, $jampost, $tgltampil,
		$jamtampil, $statustampil, $ipaddress
 ){ /* Fungsi tambah data / Insert Data */
	$sql = mysql_query("INSERT INTO $tbl_newskomentar (
		id, iddownloadarea, idclient,
		idadmin, judul, pesan,
		tanggalpost, jampost, tgltampil,
		jamtampil, statustampil, ipaddress
	) VALUES (
		'$id', '$iddownloadarea', '$idclient',
		'$idadmin', '$judul', '$pesan',
		'$tanggalpost', '$jampost', '$tgltampil',
		'$jamtampil', '$statustampil', '$ipaddress'
	)
	");
	return $sql;
}

function newskomentar_updatedata($tbl_newskomentar, $id){ /* Fungsi update data by id */
	$sql = mysql_query("UPDATE $tbl_newskomentar SET
	 
iddownloadarea = '$iddownloadarea',
idclient = '$idclient',
idadmin = '$idadmin',
judul = '$judul',
pesan = '$pesan',
tanggalpost = '$tanggalpost',
jampost = '$jampost',
tgltampil = '$tgltampil',
jamtampil = '$jamtampil',
statustampil = '$statustampil',
ipaddress = '$ipaddress'

		WHERE id='$id'
	");
	return $sql;
}

function newskomentar_deletedata($tbl_newskomentar, $id){ /* Fungsi delete data by id */
	$sql = mysql_query("DELETE * FROM $tbl_newskomentar WHERE id = '$id'");
	return $sql;
}


function newskomentar_viewdetail($tbl_newskomentar){ /* Fungsi view detail data pada tabel downloadarea komentar */
		$sql = mysql_query("SELECT * FROM $tbl_newskomentar WHERE id='$id'");
		return $sql;
}


function newskomentar_listdata($tbl_newskomentar){ /* Fungsi list detail data pada tabel downloadarea komentar */
		$sql  = mysql_query("SELECT * FROM $tbl_newskomentar");
		return $sql;
}






function newskomentar_searchdata( $tbl_newskomentar, $cari ){ /* Fungsi search data pada tabel downloadarea komentar  */
		$sql = mysql_query("SELECT * FROM $tbl_newskomentar WHERE 
			judul LIKE '$cari' OR
			pesan LIKE '$cari' 
				ORDER BY id ASC  
		");  
  		return $sql;
}

function newskomentar_searchdata_all_bypage( $tbl_newskomentar, $cari, $offset, $dataperPage ){ /* Fungsi search data pada tabel downloadarea komentar  */
		$sql = mysql_query("SELECT * FROM $tbl_newskomentar WHERE 
			judul LIKE '$cari' OR
			pesan LIKE '$cari' 
				ORDER BY id ASC LIMIT $offset, $dataperPage
		");  
  		return $sql;
}



function newskomentar_searchdata_countdata( $tbl_newskomentar , $cari ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_newskomentar WHERE 
			judul LIKE '$cari' OR
			pesan LIKE '$cari' 
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}



?>