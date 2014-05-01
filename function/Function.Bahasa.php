<?php 
/*
BAHASA
--
id
nama
status
kodeiso
direktorifile
gambar

*/

	function bahasa_createid( $tbl_bahasa ){
		$sql = mysql_query("SELECT * FROM $tbl_bahasa ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	function bahasa_periksanama( $tbl_bahasa, $nama ){
		$sql = mysql_query("SELECT * FROM $tbl_bahasa WHERE nama = '$nama' ");
		return $sql;	
	}
 

	function bahasa_tambahdata(
		$tbl_bahasa,
		$id, $nama, $status,
		$kodeiso, $direktorifile, $gambar
	){
		$sql = mysql_query("INSERT INTO $tbl_bahasa
		(
			id, nama, status,
			kodeiso, direktorifile, gambar
		)VALUES(
			'$id', '$nama', '$status',
			'$kodeiso', '$direktorifile', '$gambar'
		)");
		return $sql;
	}
	
	

 	function bahasa_updatedata(
		$tbl_bahasa,
		$id, $nama,
		$status, $kodeiso,
		$direktorifile, $gambar
	){
	
	$sql = mysql_query("
	UPDATE $tbl_bahasa SET

		nama = '$nama',
		status = '$status', 
		kodeiso = '$kodeiso',
		direktorifile = '$direktorifile', 
		gambar = '$gambar'

	WHERE
		id = '$id'
	");
	return $sql;
	}


	function bahasa_viewdetail( $tbl_bahasa, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_bahasa WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}



	function bahasa_updateimage( $tbl_bahasa, $id, $direktorifile, $gambar ){
		$sql = mysql_query("
			UPDATE $tbl_bahasa SET
				direktorifile = '$direktorifile', 
				gambar = '$gambar'
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function bahasa_statusaktif( $tbl_bahasa, $statusaktif, $id ){
		$sql = mysql_query("
			UPDATE $tbl_bahasa SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function  bahasa_hapusdata( $tbl_bahasa, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_bahasa WHERE id='$id'
		");
		return $sql;
	}
	


	function bahasa_buatdirektori(){
 		$direktoribuat =  "filemodul/bahasa/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
	function bahasa_list_statustampil( $tbl_bahasa ){
		$sql = mysql_query("SELECT * FROM $tbl_bahasa WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}
	
	 function bahasa_list_all( $tbl_bahasa ){
 		$sql = mysql_query(" SELECT * FROM $tbl_bahasa ORDER BY id DESC ");
 		return $sql;
	}


	function bahasa_hitungtotaldata(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_bahasa";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}



?>