<?php 
/*


table `usersroles`

 secroleid 
 secrolename 


 */
	
	function UsersRoles_CreateID( $tbl_usersroles ){
		$sql = mysql_query("SELECT * FROM $tbl_usersroles ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

	
	

	/*  Periksa Nama Users Roles */
	function Users_Roles_Name( $tbl_usersroles, $secrolename ){
		$sql = mysql_query("SELECT * FROM $tbl_usersroles WHERE secrolename = '$secrolename' ");
		return $sql;	
	}
 
 	/*  Tambah Data Users Roles */
	function UsersRoles_TambahData(
		$tbl_usersroles, $id, 
 		$secroleid ,  $secrolename 
		
	){
		$sql = mysql_query("INSERT INTO $tbl_usersroles
		(
			id, secroleid ,  secrolename 
		)VALUES(
  			'$id', '$secroleid' ,  '$secrolename' 
		)");
		return $sql;
	}

	/*  Update Data Users Roles */
 	function UsersRoles_UpdateData(
		$tbl_usersroles,
		$secroleid ,  $secrolename 
	){
	
	$sql = mysql_query("
	UPDATE $tbl_usersroles SET
		secrolename  = '$secrolename'
	WHERE
		secroleid = '$secroleid'
	");
	return $sql;
	}

	/*  Detail View Users Roles */
	function Select_Detail_Users_Roles( $tbl_usersroles, $secroleid ){
		$sql = mysql_query("SELECT * FROM $tbl_usersroles WHERE secroleid = '$secroleid'");
		return mysql_fetch_object($sql);
	}

	/*  Hapus Data Users Roles */
	function  Users_Roles_HapusData( $tbl_usersroles, $id ){
		$sql = mysql_query("DELETE FROM $tbl_usersroles WHERE id = '$id'"); 
		return $sql;
	}
	
	
	/*  Jumlah Data Users Roles */
	function GetJmlTotalUsersRoles(){
  		$sqlText = "SELECT count(secroleid) as jml FROM $tbl_usersroles";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}

	/* View List Users Roles */
 	function Select_All_Users_Roles_By_Urutan( $tbl_usersroles ){
 		$sql = mysql_query(" SELECT * FROM $tbl_usersroles ORDER BY secroleid DESC");
 		return $sql;
	}



	function Users_Roles_Periksa_ID( $tbl_usersroles, $secroleid ){
		$sql = mysql_query("SELECT * FROM $tbl_usersroles WHERE secroleid = '$secroleid'");
		$hitung = mysql_num_rows($sql);
		return $hitung;	
	}

?>