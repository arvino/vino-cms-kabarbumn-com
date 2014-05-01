<?php 
/*

table `userstokens`

  `tokenid` varchar(255) NOT NULL,
  `tokenname` varchar(255) NOT NULL,


 */

	function UsersTokens_CreateID( $tbl_userstokens ){
		$sql = mysql_query("SELECT * FROM $tbl_userstokens ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 


 
 	/*  Tambah Data Users Tokens */
	function UsersTokens_TambahData(
		$tbl_userstokens, $id, 
 		$tokenid ,  $tokenname 
		
	){
		$sql = mysql_query("INSERT INTO $tbl_userstokens ( id, tokenid ,  tokenname )VALUES( '$id', '$tokenid' ,  '$tokenname' )");
		return $sql;
	}

	/*  Update Data Users Tokens */
 	function UsersTokens_UpdateData(
		$tbl_userstokens,
		$tokenid ,  $tokenname 
	){
	
	$sql = mysql_query("
	UPDATE $tbl_userstokens SET
		tokenname  = '$tokenname'
	WHERE
		tokenid = '$tokenid'
	");
	return $sql;
	}

	/*  Detail View Users Tokens */
	function Select_Detail_Users_Tokens( $tbl_userstokens, $tokenid ){
		$sql = mysql_query("SELECT * FROM $tbl_userstokens WHERE tokenid = '$tokenid'");
		return mysql_fetch_object($sql);
	}

	/*  Hapus Data Users Tokens */
	function  Users_Tokens_HapusData( $tbl_userstokens, $id ){
		$sql = mysql_query("
			DELETE FROM $tbl_userstokens WHERE id = '$id'
		"); 
		return $sql;
	}
	
	
	/*  Jumlah Data Users Tokens */
	function GetJmlTotalUsersTokens(){
  		$sqlText = "SELECT count(tokenid) as jml FROM $tbl_userstokens";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}

	/* View List Users Tokens */
 	function Select_All_Users_Tokens_By_Urutan( $tbl_userstokens ){
 		$sql = mysql_query(" SELECT * FROM $tbl_userstokens ORDER BY tokenid ");
 		return $sql;
	}
	
	
	function Users_Tokens_Periksa_ID( $tbl_usersroles, $tokenid ){
		$sql = mysql_query("SELECT * FROM $tbl_userstokens WHERE tokenid = '$tokenid'");
		$hitung = mysql_num_rows($sql);
		return $hitung;	
	}


?>