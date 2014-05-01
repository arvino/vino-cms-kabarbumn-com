<?php 
session_name("CUST");
session_start();
include "sc_session.php";
include("kelas_function.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php 
include('head_meta_tags.php'); ?>
<?php 
include('head.php');?>
</head>

<body>


<?php include('box_banner_msgpopup.php'); ?>
 
<?php 
include('section_header.php');?>
<?php include('menu_navigasi_utama.php');  ?>
<?php 
include('section_content_subscribe.php');?>
<?php 
include('section_footer.php');?>



</body>
</html>
