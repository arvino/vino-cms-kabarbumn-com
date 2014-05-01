<?php 
/*

id,idupline,judul,
deskripsi,tglpost,jampost,
tgltampil,jamtampil,timeunix,
statustampil,urutan,idusers,
idadmin


$id,$idupline,$judul,
$deskripsi,$tglpost,$jampost,
$tgltampil,$jamtampil,$timeunix,
$statustampil,$urutan,$idusers,
$idadmin

*/  

	function modeling_guestbook_item_createid( $tbl_guestbook ){
		$sql = mysql_query("SELECT * FROM $tbl_guestbook ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 


	function modeling_guestbook_item_periksajudul( $tbl_guestbook, $judul ){
		$sql = mysql_query("SELECT * FROM $tbl_guestbook WHERE judul = '$judul'");
		return $sql;	
	}


	function modeling_guestbook_item_tambahdata(
		$tbl_guestbook,
		$id,$idupline,$judul,
		$deskripsi,$tglpost,$jampost,
		$tgltampil,$jamtampil,$timeunix,
		$statustampil,$urutan,$idusers,
		$idadmin
	){
		$sql = mysql_query("INSERT INTO $tbl_guestbook
		(

			id,idupline,judul,
			deskripsi,tglpost,jampost,
			tgltampil,jamtampil,timeunix,
			statustampil,urutan,idusers,
			idadmin

		)VALUES(
	
			'$id','$idupline','$judul',
			'$deskripsi','$tglpost','$jampost',
			'$tgltampil','$jamtampil','$timeunix',
			'$statustampil','$urutan','$idusers',
			'$idadmin'
  
		)");
		return $sql;
	}
	

	function modeling_guestbook_item_lihatdetail( $tbl_guestbook, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_guestbook WHERE id = '$id'");
		$result = mysql_fetch_object($sql);
		return $result;
	}


	function modeling_guestbook_item_updatedata(
			$tbl_guestbook,
			$id,$idupline,$judul,
			$deskripsi, 
			$tgltampil,$jamtampil,$timeunix,
			$statustampil,$urutan,$idusers,
			$idadmin
			){
			$sql = mysql_query(
			"
	UPDATE $tbl_guestbook SET 
	
			idupline = '$idupline', judul = '$judul',
			deskripsi = '$deskripsi',  
			tgltampil = '$tgltampil', jamtampil = '$jamtampil', timeunix = '$timeunix',
			statustampil = '$statustampil', urutan = '$urutan', idusers = '$idusers',
			idadmin = '$idadmin'
	
	
	WHERE
	
		id ='$id'
		
			");
			
	return $sql;
	}


	function modeling_guestbook_item_hapusdata( $tbl_guestbook, $id){  
		$sql = mysql_query("
			DELETE FROM $tbl_guestbook WHERE id='$id'
		");
		return $sql;
	}
	
	function modeling_guestbook_item_statustampil( $tbl_guestbook, $statustampil, $id ){ 
		$sql = mysql_query("
			UPDATE $tbl_guestbook SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function modeling_guestbook_item_all_data( $tbl_guestbook ){
			$sql = mysql_query("SELECT * FROM $tbl_guestbook ORDER BY id DESC");
			return $sql;
	}


	function modeling_guestbook_item_all_data_bypage( $tbl_guestbook , $offset , $dataPerPage){
			$sql = mysql_query("SELECT * FROM $tbl_guestbook ORDER BY id DESC LIMIT $offset, $dataPerPage");
			return $sql;
	}

	function modeling_guestbook_item_all_data_count( $tbl_guestbook ){
			$sql = mysql_query("SELECT count(id) as jml FROM $tbl_guestbook");
			$row = mysql_fetch_object($sql);
			$jml = $row->jml;
			return $jml;	
	}


	 function modeling_guestbook_item_search_all_data($tbl_guestbook, $cari ){ 
		$sql = mysql_query("SELECT * FROM $tbl_guestbook WHERE 
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%'  
		ORDER BY id DESC ");  
  		return $sql;
	}


	function modeling_guestbook_item_search_all_data_bypage($tbl_guestbook, $cari , $offset , $dataPerPage ){  
			$sql = mysql_query("SELECT * FROM $tbl_guestbook WHERE 
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%' 
			ORDER BY id DESC LIMIT $offset, $dataPerPage");  
			return $sql;
	}


	function modeling_guestbook_item_count_all_search_data( $tbl_guestbook, $cari ){ /* guestbook Search Count */
			$sql = mysql_query("SELECT count(id) as jml FROM $tbl_guestbook WHERE 
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%'
			");
			$row = mysql_fetch_object($sql);
			$jml = $row->jml;
			return $jml;	
	}
	

	function modeling_guestbook_item_search_publish_data_bypage($tbl_guestbook, $cari , $offset , $dataPerPage ){  
			$sql = mysql_query("SELECT * FROM $tbl_guestbook WHERE 
				statustampil = '1' AND
				judul LIKE '%$cari%' OR
				deskripsi  LIKE '%$cari%'
			ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
			return $sql;
	}

	function modeling_guestbook_item_search_publish_data($tbl_guestbook, $cari ){  
			$sql = mysql_query("SELECT * FROM $tbl_guestbook WHERE 
				statustampil = '1' AND
				judul LIKE '%$cari%' OR
				deskripsi  LIKE '%$cari%'
			ORDER BY judul ASC ");  
			return $sql;
	}

	function modeling_guestbook_item_search_publish_data_count( $tbl_guestbook, $cari ){ 
			$sql = mysql_query("SELECT count(id) as jml FROM $tbl_guestbook WHERE 
				statustampil = '1' AND
				judul LIKE '%$cari%' OR
				deskripsi  LIKE '%$cari%'
			");
			$row = mysql_fetch_object($sql);
			$jml = $row->jml;
			return $jml;	
	}

 
/* 
Modeling

Viewing
- Form 
- Listing data
- View detail
- Datagrid
- Box view

Controling
*/ 
 	function controling_guestbook_item_createdirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/guestbook/" . "file_item/" . $tanggalhariini . "/";
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
		return $direktoribuat;
	}

?>