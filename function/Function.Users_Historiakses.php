<?php 
/* 
id
userid
email
ip
login
logout
timelogin
timelogout



*/
function usershistoriakses_createid( $tbl_usershistoriakses ){
$sql = mysql_query("SELECT * FROM $tbl_usershistoriakses ORDER BY id DESC");
$result = mysql_fetch_object($sql);
$id = $result->id + 1;
return $id;
}

function TambahData_UsersHistoriAkses(
$tbl_usershistoriakses,
$cr_idhistori, $H_userid, $H_email, $REMOTE_ADDR, $tanggallogin, $jamlogin
){
$sql = mysql_query("
INSERT INTO $tbl_usershistoriakses ( id, userid, email, ip, login, timelogin ) VALUES ( '$cr_idhistori', 			
'$H_userid','$H_email','$REMOTE_ADDR','$tanggallogin','$jamlogin') ");
return $sql;
}

 

function users_historiakses_listall( $tbl_usershistoriakses ){
$sql = mysql_query("SELECT * FROM $tbl_usershistoriakses ORDER BY id DESC ");
return $sql;
}/* Function listing histori akses users */ 

function users_historiakses_listall_by_page( $tbl_usershistoriakses , $offset , $dataPerPage){
	$sql = mysql_query("SELECT * FROM $tbl_usershistoriakses ORDER BY id DESC LIMIT $offset, $dataPerPage");
	return $sql;
}


function users_historiakses_hitungtotal( $tbl_usershistoriakses ){
$sql = mysql_query("SELECT * FROM $tbl_usershistoriakses ORDER BY id DESC");
$result = mysql_num_rows($sql);
return $result;
}


/* 

id
userid
email
ip
login
logout
timelogin
timelogout

*/
?>