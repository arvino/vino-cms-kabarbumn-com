<?php 
/* FUNCTION AKSES TABEL subscription */
/* 

id
subscribe
firstname
lastname
company
category
jobtitle
address
city
state
zipcode
phone
email
tglpost
jampost
tgltampil
jamtampil
timeunix
idusers
idadmin

*/

	function subscriptionItem_CreateID( $tbl_subscription ){
		$sql = mysql_query("SELECT * FROM $tbl_subscription ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 	/*  periksa email */
	function model_subscription_periksa_email( $tbl_subscription, $email ){
		$sql = mysql_query("SELECT * FROM $tbl_subscription WHERE email = '$email'");
		return $sql;	
	}


	function subscriptionItem_TambahData(
		$tbl_subscription,
		$id,$subscribe,
		$firstname,$lastname,
		$company,$category,
		$jobtitle,$address,
		$city,$state,
		$zipcode,$phone,
		$email,$tglpost,
		$jampost,$tgltampil,
		$jamtampil,$timeunix,
		$idusers,$idadmin
	){
		$sql = mysql_query("INSERT INTO $tbl_subscription
		(

			id,subscribe,
			firstname,lastname,
			company,category,
			jobtitle,address,
			city,state,
			zipcode,phone,
			email,tglpost,
			jampost,tgltampil,
			jamtampil,timeunix,
			idusers,idadmin


		)VALUES(
	
			'$id','$subscribe',
			'$firstname','$lastname',
			'$company','$category',
			'$jobtitle','$address',
			'$city','$state',
			'$zipcode','$phone',
			'$email','$tglpost',
			'$jampost','$tgltampil',
			'$jamtampil','$timeunix',
			'$idusers','$idadmin'
  
		)");
		return $sql;
	}
	
 
function subscriptionItem_BacaDataDetil( $tbl_subscription, $id ){
	$sql = mysql_query("SELECT * FROM $tbl_subscription WHERE id = '$id'");
	$result = mysql_fetch_object($sql);
	return $result;
}



function subscriptionItem_UpdateData(
		$tbl_subscription,

		$id,$subscribe,
		$firstname,$lastname,
		$company,$category,
		$jobtitle,$address,
		$city,$state,
		$zipcode,$phone,
		$email,$tglpost,
		$jampost,$tgltampil,
		$jamtampil,$timeunix,
		$idusers,$idadmin
		
		
		){
		$sql = mysql_query(
		"
			UPDATE $tbl_subscription SET 
			
				subscribe = '$subscribe', 
				firstname = '$firstname', lastname = '$lastname',
				company = '$company', category = '$category',
				jobtitle = '$jobtitle', address = '$address',
				city = '$city', state = '$state',
				zipcode = '$zipcode', phone = '$phone',
				email = '$email', tglpost = '$tglpost',
				jampost = '$jampost', tgltampil = '$tgltampil',
				jamtampil = '$jamtampil', timeunix = '$timeunix',
				idusers = '$idusers', idadmin = '$idadmin'
			
			
			WHERE
			
					id ='$id'
	
		");
		
return $sql;
		
}




function  model_subscription_hapus( $tbl_subscription, $id){
		$sql = mysql_query("
			DELETE FROM $tbl_subscription WHERE id='$id'
		");
		return $sql;
}


function model_subscription_list( $tbl_subscription ){ 
		$sql = mysql_query("SELECT * FROM $tbl_subscription ORDER BY id DESC");  
  		return $sql;
}

function model_subscription_list_bypage($tbl_subscription, $offset , $dataPerPage ){ 
		$sql = mysql_query("SELECT * FROM $tbl_subscription ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function model_subscription_count( $tbl_subscription ){ 
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_subscription");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


	

function Search_Item_subscription_ALL($tbl_subscription, $cari , $offset , $dataPerPage ){ /* subscription Search */
		$sql = mysql_query("SELECT * FROM $tbl_subscription WHERE 
		
			email LIKE '%$cari%' 
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function GetJML_Search_Item_subscription_ALL( $tbl_subscription, $cari ){ /* subscription Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_subscription WHERE 
			email LIKE '%$cari%'  
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

?>