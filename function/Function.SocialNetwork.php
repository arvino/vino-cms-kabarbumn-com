<?php 
/*

SOCIAL NETWORK
  
id
nama
url
keterangan
status
urutan
direktorifile
gambar
  

*/

	function socialnetwork_createid( $tbl_socialnetwork ){
		$sql = mysql_query("SELECT * FROM $tbl_socialnetwork ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	function socialnetwork_periksanama( $tbl_socialnetwork, $nama ){
		$sql = mysql_query("SELECT * FROM $tbl_socialnetwork WHERE nama = '$nama' ");
		return $sql;	
	}
 

	function socialnetwork_tambahdata(
		$tbl_socialnetwork,
		$id, $nama, $url, $keterangan, 
		$status, $urutan, $direktorifile,
		$gambar
	){
		$sql = mysql_query("INSERT INTO $tbl_socialnetwork
		(
			 
			id, nama, url, keterangan, 
			status, urutan, direktorifile,
			gambar
			
		)VALUES(
			
			'id', 'nama', 'url', 'keterangan', 
			'status, 'urutan', 'direktorifile',
			'gambar'
			
		)");
		return $sql;
	}
	
	

 	function socialnetwork_updatedata(
		$tbl_socialnetwork,
		$id, $nama, $url, $keterangan, 
		$status, $urutan, $direktorifile,
		$gambar
	){
	
	$sql = mysql_query("
	UPDATE $tbl_socialnetwork SET

		nama = '$nama', 
		url = '$url', 
		keterangan = '$keterangan', 
		status = '$status', 
		urutan = '$urutan', 
		direktorifile = '$direktorifile',
		gambar = '$gambar'

	WHERE
		id = '$id'
	");
	return $sql;
	}


	function socialnetwork_viewdetail( $tbl_socialnetwork, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_socialnetwork WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}



	function socialnetwork_updateimage( $tbl_socialnetwork, $id, $direktorifile, $gambar ){
		$sql = mysql_query("
			UPDATE $tbl_socialnetwork SET
				direktorifile = '$direktorifile', 
				gambar = '$gambar'
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function socialnetwork_statusaktif( $tbl_socialnetwork, $statusaktif, $id ){
		$sql = mysql_query("
			UPDATE $tbl_socialnetwork SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function  socialnetwork_hapusdata( $tbl_socialnetwork, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_socialnetwork WHERE id='$id'
		");
		return $sql;
	}
	


	function socialnetwork_buatdirektori(){
 		$direktoribuat =  "filemodul/socialnetwork/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
	function socialnetwork_list_statustampil( $tbl_socialnetwork ){
		$sql = mysql_query("SELECT * FROM $tbl_socialnetwork WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}
	
	 function socialnetwork_list_all( $tbl_socialnetwork ){
 		$sql = mysql_query(" SELECT * FROM $tbl_socialnetwork ORDER BY id DESC ");
 		return $sql;
	}


	function socialnetwork_hitungtotaldata(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_socialnetwork";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}



?>