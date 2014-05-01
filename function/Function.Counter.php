<?php

function insert_counter_onlinevisitor( 
$tbl_counter_onlinevisitor, 
$t_stamp,$REMOTE_ADDR,$PHP_SELF,$BROWSER_UO,$REFERER_UO,$NAMAHOST_UO,$PORT_UO ){ /* */

$sql = mysql_query("INSERT INTO $tbl_counter_onlinevisitor (timestamp,ip_a,file,browser,referer,host,port) VALUES ('$t_stamp','$REMOTE_ADDR','$PHP_SELF','$BROWSER_UO','$REFERER_UO','$NAMAHOST_UO','$PORT_UO')");

return $sql;
}
		
function delete_counter_onlinevisitor( $tbl_counter_onlinevisitor , $timeout){ /* */
$result = mysql_query("DELETE FROM $tbl_counter_onlinevisitor WHERE timestamp<$timeout");
return $result;
}

function distinct_ip_counter_onlinevisitor( $tbl_counter_onlinevisitor ){ /* */
$result = mysql_query("SELECT DISTINCT ip_a FROM $tbl_counter_onlinevisitor");
return $result;
}		

function check_users_online( $tbl_counter_onlinevisitor, $link_host){ /* */
	$sql = mysql_query("SELECT DISTINCT ip_a FROM $tbl_counter_onlinevisitor");
	$data = mysql_fetch_array($sql);
	$akses= $data['file'] ;
	$user = mysql_num_rows($sql);
	if($online=="") session_register("online_users");
	if ($user == 1) $online_users = "<b>$user</b>";
	if ($user == 2) $online_users = "<b>$user</b>";
	if ($user > 2) $online_users = "<b>$user</b>";
	return $online_users;
}




	function BuatIDCounter( $tbl_counter_web ){
		$sql = mysql_query("SELECT * FROM $tbl_counter_web ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;

	}
 

function addHitsCounter(
	$tbl_counter_web,
	$id, $ipaddr, $tanggal,
	$jam, $browser, $referal,
	$file, $hit
){

 		$sqlText = mysql_query("INSERT INTO $tbl_counter_web
		(
		
			id,ipaddr,tanggal,
			jam,browser,referal,
			fileakses, hit
		
		)VALUES(
		
			'$id', '$ipaddr', '$tanggal',
			'$jam', '$browser', '$referal',
			'$file','$hit'
		
		)");
		return $sqlText;
	}
	
	function listAllDataCounter( $tbl_counter_web ){
		$sqlText = "SELECT * FROM $tbl_counter_web ORDER BY id DESC";
		return mysql_query($sqlText);
	}
	
	function updateHitsCounter( $tbl_counter_web, $ipaddr, $tanggalhariini, $hits){
		$sqlText = mysql_query("UPDATE $tbl_counter_web SET hit = '$hits' WHERE ipaddr = '$ipaddr' AND tanggal='$tanggalhariini'");
		return $sqlText;
	}
	
	function cekHitsCounter( $tbl_counter_web, $ipaddr, $tanggalhariini ){
		$sqlText = mysql_query("SELECT * FROM $tbl_counter_web WHERE ipaddr = '$ipaddr' AND tanggal='$tanggalhariini'");
		$result = mysql_num_rows($sqlText);
		return $result;
	}
	
	function cekJmlHitsCounter( $tbl_counter_web ){
		$sqlText = "SELECT count(id) as jml FROM $tbl_counter_web";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}
	
  
 
 	function viewdetail_counterweb( $tbl_counter_web, $ipddr, $tanggalhariini ){
		$sqlText = "SELECT * FROM $tbl_counter_web WHERE ipaddr = '$ipddr' AND tanggal = '$tanggalhariini'";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		return $row;
	}
	



?>