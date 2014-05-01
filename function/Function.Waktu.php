<?php 
/*
waktudunia
--
id
nama
status
kodeiso
direktorifile
gambar

*/

	function waktudunia_createid( $tbl_waktudunia ){
		$sql = mysql_query("SELECT * FROM $tbl_waktudunia ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	function waktudunia_periksanama( $tbl_waktudunia, $nama ){
		$sql = mysql_query("SELECT * FROM $tbl_waktudunia WHERE nama = '$nama' ");
		return $sql;	
	}
 

	function waktudunia_tambahdata(
		$tbl_waktudunia,
		$id, $nama, $status,
		$kodeiso, $direktorifile, $gambar
	){
		$sql = mysql_query("INSERT INTO $tbl_waktudunia
		(
			id, nama, status,
			kodeiso, direktorifile, gambar
		)VALUES(
			'$id', '$nama', '$status',
			'$kodeiso', '$direktorifile', '$gambar'
		)");
		return $sql;
	}
	
	

 	function waktudunia_updatedata(
		$tbl_waktudunia,
		$id, $nama,
		$status, $kodeiso,
		$direktorifile, $gambar
	){
	
	$sql = mysql_query("
	UPDATE $tbl_waktudunia SET

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


	function waktudunia_viewdetail( $tbl_waktudunia, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_waktudunia WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}



	function waktudunia_updateimage( $tbl_waktudunia, $id, $direktorifile, $gambar ){
		$sql = mysql_query("
			UPDATE $tbl_waktudunia SET
				direktorifile = '$direktorifile', 
				gambar = '$gambar'
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function waktudunia_statusaktif( $tbl_waktudunia, $statusaktif, $id ){
		$sql = mysql_query("
			UPDATE $tbl_waktudunia SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function  waktudunia_hapusdata( $tbl_waktudunia, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_waktudunia WHERE id='$id'
		");
		return $sql;
	}
	


	function waktudunia_buatdirektori(){
 		$direktoribuat =  "filemodul/waktudunia/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
	function waktudunia_list_statustampil( $tbl_waktudunia ){
		$sql = mysql_query("SELECT * FROM $tbl_waktudunia WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}
	
	 function waktudunia_list_all( $tbl_waktudunia ){
 		$sql = mysql_query(" SELECT * FROM $tbl_waktudunia ORDER BY id DESC ");
 		return $sql;
	}


	function waktudunia_hitungtotaldata(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_waktudunia";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}



?>