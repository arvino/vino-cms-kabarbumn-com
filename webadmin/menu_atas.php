<?php 
if( $sesi_id == "" && $sesi_username == "" && $sesi_email == ""){

?>

<div id='menunavigasi_horisontal' class='menunavigasi_horisontal'>
<ul>
	<li><a href="users_register.php"  title="Users Registration Request." > Request Register </a></li>
	<li><a href="users_login.php"  title="Login | Click here for login" > Login </a></li>
	<li><a href="users_lupa_password.php" title="Reset Password" > Reset Password </a></li>
	<li><a href="users_ganti_password.php"  title="Change Password" > Change password </a></li>
	<li><a href="users_help.php" title="Help & Guide"> Help & Guide for Users </a></li> 
</ul>     
</div>


<?php 
}else{
?>


<?php 
if($status_baru=="0"){

}else{


?>


<div id='menunavigasi_horisontal' class='menunavigasi_horisontal'>
	<ul>
	
<?php 
$KodeKeamananhalaman  = "token_home";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>
		<li><a href="./" title="Homepage Administrator">Home</a></li>
<?php 
} ?>


<?php 
$KodeKeamananhalaman  = "token_usersadmin";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>
		<li><a href="users_main.php" title="Users Administrator Page"> Admin </a></li>
<?php 
} ?>


 

 
<?php 
$KodeKeamananhalaman  = "token_otherpage";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>
		<li><a href="otherpage_main.php" title="Other / Profile / Static Page "> Static Page </a> </li>
<?php 
} ?>

 
<?php 
$KodeKeamananhalaman  = "token_news";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {

}else{
?>
		<li><a href="news_main.php" title="News Article Page"> News Article </a></li>
<?php 
} ?>


 
<?php 
$KodeKeamananhalaman  = "token_banner";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>
		<li><a href="banner_main.php" title="Banner Page"> Banner </a> </li>
<?php 
} ?>


<?php 
$KodeKeamananhalaman  = "token_statistik";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>		
		<li><a href="statistik.php" title="Web Statistic Page">Web Statistic</a></li>  
<?php 
} ?>


<?php 
$KodeKeamananhalaman  = "token_newsletter";  
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
}else{
?>		
		<li><a href="newsletter_main.php" title="Newsletter Page"> Newsletter </a></li>  
<?php 
} ?>

 
 		
		
	</ul>   
</div>

<?php 
} ?>

<?php 
} ?>