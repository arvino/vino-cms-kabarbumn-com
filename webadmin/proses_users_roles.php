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


if( $action=="usersroles_tambahdata" ){ 


$Cek_Data = Users_Roles_Periksa_ID( $tbl_usersroles, $secroleid );
$id = UsersRoles_CreateID( $tbl_usersroles );
if($Cek_Data!=0){
header("location:users_roles.php?pesan_error=FAILED ! DATA ALREADY EXIST");
}else{

UsersRoles_TambahData(
		$tbl_usersroles, $id,
 		$secroleid ,  $secrolename 
		
	);
	header("location:users_roles.php?pesan_error=SUCCESS ADD DATA !"); 
}
} 

/* ---- */

if( $action=="usersroles_updatedata"){  
$id = $_POST['secroleid'];
UsersRoles_UpdateData(
		$tbl_usersroles,
		$secroleid ,  $secrolename 
	);

	 	header("location:users_roles.php?id=$id&action=EditData&pesan_error=UPDATE SUCCESSFULLY... !."); 
} 

/* ---- */

if( $action=="usersroles_hapusdata" ){ 
	$id = $_GET['id'];
	Users_Roles_hapusdata( $tbl_usersroles, $id);
	header("location:users_roles.php?pesan_error=SUCCESS DELETE DATA."); 
} 


} 
?>