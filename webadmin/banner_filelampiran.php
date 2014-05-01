<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];
$id_bannerlog = $_SESSION['id_bannerlog'];
$id_bannerlog_file = $_SESSION['filelampiran_$id_bannerlog'];

?>
<?php 
if( $sesi_id == "" ){
?>
<script>
window.close();
</script>
<?php 
}else{
include"kelas_function.php";
?>
<?php 
bannerlog_updatedata( $tbl_bannerlog, $id_bannerlog, $tanggalhariini, $jamsaatini );
?>
<script>
window.close();
</script>
<?php 
}
?>