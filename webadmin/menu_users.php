<?php 
if($status_baru=="0"){

}else{

?>
 
<?php 
include"users_form_search.php"; ?>
 
<?php 
} ?>
<br>
<br>

<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	
	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
		<ul>
			<li><a href='users_account.php?action=Users_UpdatePassword'> CHANGE PASSWORD </a></li>
            
			<li><a href='users_account.php?action=Users_UpdateProfile'> EDIT  PROFILE </a></li>     
		</ul>
	</div>
	
	</td>
  </tr>
</table>
 
<br>

<?php 
/*
token_usersadmin
token_usersgroup
*/
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
		
}else{

?>

<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	 


	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
		<li><a href='users_list.php?action=Users_ViewList'> LIST USERS </a></li>
		<li><a href='users_account.php'>USERS REGISTER </a></li>
		<li><a href='users_akseslog.php'> USERS AKSES LOG </a></li>
	</ul>
	</div>


	</td>
  </tr>
</table>
 
 <?php 
} ?>	
 
 <br>

<?php 
/*
token_usersadmin
token_usersgroup
*/
$KodeKeamananhalaman  = "token_usersgroup";
$KodeKeamananhalaman_Keterangan = "<font color='red'> ACCESS DENIED ! </font>";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
		
}else{

?>

 
 <table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td>

	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
	
			<li> <a href="users_roles.php" target="_self"> ROLES </a> </li>
			<li> <a href="users_tokens.php" target="_self"> TOKENS </a> </li>
			<li> <a href="users_groups.php" target="_self"> GROUPS </a> </li>
	</ul>
	</div>


	</td>
  </tr>
</table>
 
 
 <?php 
} ?>
