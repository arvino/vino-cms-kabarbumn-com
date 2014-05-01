<?php 
/* FUNCTION AKSES TABEL NEWSLETTER */


	function newsletterItem_CreateID( $tbl_newsletter ){
		$sql = mysql_query("SELECT * FROM $tbl_newsletter ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 	/*  periksa email */
	function model_newsletter_periksa_email( $tbl_newsletter, $email ){
		$sql = mysql_query("SELECT * FROM $tbl_newsletter WHERE email = '$email'");
		return $sql;	
	}


	function newsletterItem_TambahData(
		$tbl_newsletter,
		$id,$email,
		$tglpost,$jampost,
		$tgltampil,$jamtampil,
		$timeunix,$idusers,
		$idadmin
	){
		$sql = mysql_query("INSERT INTO $tbl_newsletter
		(

			id,email,
			tglpost,jampost,
			tgltampil,jamtampil,
			timeunix,idusers,
			idadmin

		)VALUES(
	
			'$id','$email',
			'$tglpost','$jampost',
			'$tgltampil','$jamtampil',
			'$timeunix','$idusers',
			'$idadmin'
  
		)");
		return $sql;
	}
	
 
function newsletterItem_BacaDataDetil( $tbl_newsletter, $id ){
	$sql = mysql_query("SELECT * FROM $tbl_newsletter WHERE id = '$id'");
	$result = mysql_fetch_object($sql);
	return $result;
}



function newsletterItem_UpdateData(
		$tbl_newsletter,
		$id,$email 
		){
		$sql = mysql_query(
		"
UPDATE $tbl_newsletter SET 

		email = '$email',

WHERE

	id ='$id'
	
		");
		
return $sql;
		
}


function  model_newsletter_hapus( $tbl_newsletter, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_newsletter WHERE id='$id'
		");
		return $sql;
}


function model_newsletter_list( $tbl_newsletter ){ 
		$sql = mysql_query("SELECT * FROM $tbl_newsletter ORDER BY id DESC");  
  		return $sql;
}

function model_newsletter_list_bypage($tbl_newsletter, $offset , $dataPerPage ){ 
		$sql = mysql_query("SELECT * FROM $tbl_newsletter ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function model_newsletter_count( $tbl_newsletter ){ 
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_newsletter");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}
	

function Search_Item_newsletter_ALL($tbl_newsletter, $cari , $offset , $dataPerPage ){ /* newsletter Search */
		$sql = mysql_query("SELECT * FROM $tbl_newsletter WHERE 
		
			email LIKE '%$cari%'  
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function GetJML_Search_Item_newsletter_ALL( $tbl_newsletter, $cari ){ /* newsletter Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_newsletter WHERE 
			email LIKE '%$cari%'  
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

?>