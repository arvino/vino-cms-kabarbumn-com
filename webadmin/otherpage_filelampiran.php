<?php
session_start(); 
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];
$id_otherpagelog = $_SESSION['id_otherpagelog'];
$id_otherpagelog_file = $_SESSION['filelampiran_$id_otherpagelog'];

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
otherpagelog_updatedata( $tbl_otherpagelog, $id_otherpagelog, $tanggalhariini, $jamsaatini );
?>
<script>
window.close();
</script>
<?php 
}
?>