<?php 
/*
matauang
--
id
nama
kode
kodeiso
sign
blank
rate
status
urutan
direktorifile
gambar  

$id
$nama
$kode
$kodeiso
$sign
$blank
$rate
$status
$urutan
$direktorifile
$gambar  
*/

	function matauang_createid( $tbl_matauang ){
		$sql = mysql_query("SELECT * FROM $tbl_matauang ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	function matauang_periksanama( $tbl_matauang, $nama ){
		$sql = mysql_query("SELECT * FROM $tbl_matauang WHERE nama = '$nama' ");
		return $sql;	
	}
 

	function matauang_tambahdata(
		$tbl_matauang,
		$id, $nama, $kode,
		$kodeiso, $sign, $blank,
		$rate, $status, $urutan,
		$direktorifile, $gambar
	){
		$sql = mysql_query("INSERT INTO $tbl_matauang
		(
			id, nama,
			kode, kodeiso,
			sign, blanks,
			rate, status, urutan,
			direktorifile, gambar
			
		)VALUES(
		
			'$id', '$nama',
			'$kode', '$kodeiso',
			'$sign', '$blanks',
			'$rate', '$status', '$urutan',
			'$direktorifile', '$gambar'
			
		)");
		return $sql;
	}

 	function matauang_updatedata( /* Update data mata uang */
		$tbl_matauang,
		$id, $nama, $kode,
		$kodeiso, $sign, $blank,
		$rate, $status, $urutan,
		$direktorifile, $gambar
	){
	$sql = mysql_query("
	UPDATE $tbl_matauang SET
	
			nama = '$nama',
			kode = '$kode', 
			kodeiso = '$kodeiso',
			sign = '$sign', 
			blanks = '$blanks',
			rate = '$rate', 
			status = '$status',
			urutan = '$urutan',
			direktorifile = '$direktorifile', 
			gambar = '$gambar'

	WHERE
			id = '$id'
	");
	return $sql;
	}


	function matauang_viewdetail( $tbl_matauang, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_matauang WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}



	function matauang_updateimage( $tbl_matauang, $id, $direktorifile, $gambar ){
		$sql = mysql_query("
			UPDATE $tbl_matauang SET
				direktorifile = '$direktorifile', 
				gambar = '$gambar'
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function matauang_statusaktif( $tbl_matauang, $statusaktif, $id ){
		$sql = mysql_query("
			UPDATE $tbl_matauang SET
				status = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function  matauang_hapusdata( $tbl_matauang, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_matauang WHERE id='$id'
		");
		return $sql;
	}
	


	function matauang_buatdirektori(){
 		$direktoribuat =  "filemodul/matauang/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
	function matauang_list_statustampil( $tbl_matauang ){
		$sql = mysql_query("SELECT * FROM $tbl_matauang WHERE status = '1' ORDER BY urutan");
		return $sql;
	}
	
	
	 function matauang_list_all( $tbl_matauang ){
 		$sql = mysql_query(" SELECT * FROM $tbl_matauang ORDER BY id DESC ");
 		return $sql;
	}


	function matauang_hitungtotaldata(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_matauang";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}



?>