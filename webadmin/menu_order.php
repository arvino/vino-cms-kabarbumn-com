<?php 
include"order_form_search.php";?>
<br>
<br>
<?php 
$KodeKeamananhalaman  = "token_order";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
		
}else{

?>
<table class='tabelform' width='100%' cellspacing='1' cellpadding='1'>
  <tr>
    <td>
	
	<div id='menunavigasi_vertikal' class='menunavigasi_vertikal'>
	<ul>
		<li><a href='order_list.php'> LIST ORDER </a></li>
	</ul>
	</div>
	
	</td>
  </tr>
</table>


<br>
<br>


<?php 
} 
?>
