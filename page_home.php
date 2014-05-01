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
include('head.php'); ?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- START BODY WRAPPER -->

<div id="body_wrapper">

<?php include('section_header.php'); ?>
<?php include('menu_navigasi_utama.php');  ?>
<?php include('section_content_body.php'); ?><!-- HOMEPAGE -->
<?php include('section_footer.php'); ?>

</div>
<!--END WRAPPER BODY -->
</body>
</html>