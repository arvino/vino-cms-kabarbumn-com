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

 
if( $action=="usersgroups_tambahdata" ){  

$id = UsersGroups_CreateID( $tbl_usersgroups );
$secroleid = $_POST['secroleid'];
$tokenid = $_POST['tokenid'];
	
if( $secroleid=="0" && $tokenid=="0" ){

	header("location:users_groups.php?pesan_error=GAGAL TAMBAH DATA !. HARAP PILIH TOKEN DAN ROLES !."); /* Kembali ke halaman  sebelumnya */

}else{
	
$sql_tokenroles = UsersGroups_CekRolesToken( $tbl_usersgroups, $secroleid, $tokenid );
$hitung_rolestoken = mysql_num_rows($sql_tokenroles);
if($hitung_rolestoken != 0 ){
	header("location:users_groups.php?pesan_error=FAILED! DATA ALREADY EXIST"); /* Kembali ke halaman  sebelumnya */
}else{

	UsersGroups_TambahData(
		$tbl_usersgroups,
 		$id, $secroleid, $tokenid
	);
	header("location:users_groups.php?pesan_error=SUCCESS ADD DATA !"); /* Kembali ke halaman  sebelumnya */
}}}

  
if( $action=="usersgroups_hapusdata" ){ 
	$id = $_GET['id'];
	UsersGroups_hapusdata( $tbl_usersgroups, $id );
	header("location:users_groups.php?pesan_error=SUCCESS DELETE DATA."); /* Kembali ke halaman  sebelumnya */
} 

} 
?>