<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];
$id_newslog = $_SESSION['id_newslog'];
$id_newslog_file = $_SESSION['filelampiran_$id_newslog'];

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
newslog_updatedata( $tbl_newslog, $id_newslog, $tanggalhariini, $jamsaatini );
?>
<script>
window.close();
</script>
<?php 
}
?>