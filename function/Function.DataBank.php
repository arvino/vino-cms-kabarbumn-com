<?php 
/*

Data Bank 


  `id` int(25) NOT NULL,
  `namabank` text NOT NULL,
  `namaakun` text NOT NULL,
  `norekening` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` text NOT NULL,
  `urutan` text NOT NULL,
  `direktorifile` text NOT NULL,
  `gambar` text NOT NULL,
  
 
id
namabank
namaakun
norekening 
keterangan
status
urutan
direktorifile
gambar
  

*/

	function databank_createid( $tbl_databank ){
		$sql = mysql_query("SELECT * FROM $tbl_databank ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 
	

	function databank_periksanama( $tbl_databank, $nama ){
		$sql = mysql_query("SELECT * FROM $tbl_databank WHERE nama = '$nama' ");
		return $sql;	
	}
 

	function databank_tambahdata(
		$tbl_databank,
		$id, $nama, $status,
		$kodeiso, $direktorifile, $gambar
	){
		$sql = mysql_query("INSERT INTO $tbl_databank
		(
			id, nama, status,
			kodeiso, direktorifile, gambar
		)VALUES(
			'$id', '$nama', '$status',
			'$kodeiso', '$direktorifile', '$gambar'
		)");
		return $sql;
	}
	
	

 	function databank_updatedata(
		$tbl_databank,
		$id, $nama,
		$status, $kodeiso,
		$direktorifile, $gambar
	){
	
	$sql = mysql_query("
	UPDATE $tbl_databank SET

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


	function databank_viewdetail( $tbl_databank, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_databank WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}



	function databank_updateimage( $tbl_databank, $id, $direktorifile, $gambar ){
		$sql = mysql_query("
			UPDATE $tbl_databank SET
				direktorifile = '$direktorifile', 
				gambar = '$gambar'
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function databank_statusaktif( $tbl_databank, $statusaktif, $id ){
		$sql = mysql_query("
			UPDATE $tbl_databank SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
	return $sql;
	}



	function  databank_hapusdata( $tbl_databank, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_databank WHERE id='$id'
		");
		return $sql;
	}
	


	function databank_buatdirektori(){
 		$direktoribuat =  "filemodul/databank/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}

 
	function databank_list_statustampil( $tbl_databank ){
		$sql = mysql_query("SELECT * FROM $tbl_databank WHERE statustampil='1' ORDER BY urutan");
		return $sql;

	}
	
	 function databank_list_all( $tbl_databank ){
 		$sql = mysql_query(" SELECT * FROM $tbl_databank ORDER BY id DESC ");
 		return $sql;
	}


	function databank_hitungtotaldata(){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_databank";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}



?>