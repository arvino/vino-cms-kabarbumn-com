<?php 
/*

table `usersgroups`
id
 `secroleid` 
  `tokenid` 
  UsersGroups_TambahData

 */
	function UsersGroups_CreateID( $tbl_usersgroups ){
		$sql = mysql_query("SELECT * FROM $tbl_usersgroups ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 


 
 	/*  Tambah Data Users Groups */
	function UsersGroups_TambahData(
		$tbl_usersgroups,
 		$id, $secroleid, $tokenid
	){
		$sql = mysql_query("INSERT INTO $tbl_usersgroups
		(
			secroleid, tokenid
		)VALUES(
  			'$secroleid', '$tokenid'
		)");
		return $sql;
	}

	/*  Detail View Users Groups */
	function UsersGroups_CekRolesToken( $tbl_usersgroups, $secroleid, $tokenid ){
		$sql = mysql_query("SELECT * FROM $tbl_usersgroups WHERE secroleid='$secroleid' AND tokenid = '$tokenid'");
		return $sql;
	}

	/*  Hapus Data Users Groups */
	function  UsersGroups_HapusData( $tbl_usersgroups, $id ){
		$sql = mysql_query("
			DELETE FROM $tbl_usersgroups WHERE id = '$id'
		"); 
		return $sql;
	}
	 
	
	/*  Jumlah Data Users Groups */
	function GetJmlTotalUsersGroups( $tbl_usersgroups, $id, $secroleid, $tokenid ){
  		$sqlText = "SELECT count(secroleid) as jml FROM $tbl_usersgroups";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}

	/* View List Users Groups */
 	function Select_All_Users_Groups_By_Urutan( $tbl_usersgroups, $id, $secroleid, $tokenid ){
 		$sql = mysql_query(" SELECT * FROM $tbl_usersgroups ORDER BY secroleid ");
 		return $sql;
	}


 
 	function Select_All_Users_Groups_By_RolesId( $tbl_usersgroups, $secroleid ){
 		$sql = mysql_query(" SELECT * FROM $tbl_usersgroups WHERE secroleid = '$secroleid' ORDER BY secroleid ");
 		return $sql;
	}

function select_all_usersgroup_by_roleid( $tbl_usersgroups, $sesiakseslevel ){
	$sql = mysql_query("SELECT tokenid FROM $tbl_usersgroups
		WHERE secroleid = '$sesiakseslevel'");
	return $sql;
}



?>