<?php
session_name("CUST");
session_start(); /* CEK SESSION LOGIN */
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];

if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){
header('location:users_login.php?pesan_error=PLEASE LOGIN FIRST.');
}else{

include"kelas_function.php";

/* 

  `tokenid` varchar(255) NOT NULL,
  `tokenname` varchar(255) NOT NULL,

*/


if( $action=="userstokens_tambahdata" ){ 

$id = UsersTokens_CreateID( $tbl_userstokens );

$tokenid = $_POST['tokenid'];
$tokenname = $_POST['tokenname'];

$Cek_Data = Users_Tokens_Periksa_ID( $tbl_usersroles, $tokenid );

if($Cek_Data!=0){
header("location:users_tokens.php?pesan_error=FAILED ! DATA ALREADY EXIST ");
}else{
	UsersTokens_TambahData(
		$tbl_userstokens, $id, 
 		$tokenid , $tokenname 
	);
	header("location:users_tokens.php?pesan_error=SUCCESS ADD DATA !"); 
}
} 

/* ---- */

if( $action=="userstokens_updatedata"){  
$tokenid = $_POST['tokenid'];
$tokenname = $_POST['tokenname'];

 UsersTokens_UpdateData(
		$tbl_userstokens,
		$tokenid ,  $tokenname 
	);

	 	header("location:users_tokens.php?id=$tokenid &action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); 
} 

/* ---- */

if( $action=="userstokens_hapusdata" ){ 
	$id = $_GET['id'];
	Users_Tokens_hapusdata( $tbl_userstokens, $id );
	header("location:users_tokens.php?pesan_error=SUCCESS DELETE DATA."); 
} 



} 
?>