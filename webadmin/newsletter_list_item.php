<?php 
/*
token_home
token_konfigurasi
token_usersadmin
token_usersgroup
token_produk
token_publicusers
token_newsletter
token_news
token_gallery
token_newsletter
token_statistik
token_frontpage
token_help
*/

$KodeKeamananhalaman  = "token_newsletter";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	
	include"access_denied.php";
	
}else{

?>

<?php 
if( isset($_POST['newsletter_search']) ){
	$cari = $_POST['newsletter_search'];
}else{
	$cari = $_GET['cari'];
}
?>

 


<?php 
if($action=="search"){
$Hitung_Pencariannewsletter =  GetJML_Search_Item_newsletter_ALL( $tbl_newsletter, $cari ); /* Hitung Data Item */
?>
<div class='text_pencarian'> Found 
<?php 
echo $Hitung_Pencariannewsletter ?> item with keyword "<?php 
echo $cari ?>" .
</div>
<br>
<?php 
}
?>




<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "search" ){
	$List_JumlahDatanewsletter =  GetJML_Search_Item_newsletter_ALL( $tbl_newsletter, $cari ); /* Hitung Data Item */
}

if( $action == "FormEntry" ){
	$QryNumItemnewsletter = model_newsletter_list_bypage($tbl_newsletter, $offset , $dataPerhalaman );
	$List_JumlahDatanewsletter = model_newsletter_count( $tbl_newsletter );
}

if( !isset($action)){ 
	$QryNumItemnewsletter = model_newsletter_list_bypage($tbl_newsletter, $offset , $dataPerhalaman );
	$List_JumlahDatanewsletter = model_newsletter_count( $tbl_newsletter );
}
 
?>

<?php 
if($List_JumlahDatanewsletter == 0){
?>

<?php 
}else{
?>


 
<table class='tabelform' align='center' width='100%' cellpadding='1' cellspacing='1'>
<tr class='judulform'>
  	  <td width="100%" height='35' align='center'> 
	  
	  LIST DATA 
	    NEWSLETTER
	  
	  
</td>
</tr>




<tr class='kontenform'>
  <td height='35' align='center'>
  
<?php 
$_SESSION['item_data_perhalaman'] = $_GET['data_perhalaman'];
		if( $_SESSION['item_data_perhalaman'] == ''){
			$dataPerhalaman = 10;
			$_SESSION['item_data_perhalaman']	= "10";
		}else{
			$dataPerhalaman = $_SESSION['item_data_perhalaman'];
		}

if(isset($_GET['data_perhalaman'])){
 	$nohalaman = $_GET['data_perhalaman'];
 	$dataperhalaman_x = "data_perhalaman=" . $_GET['data_perhalaman'];
}else{
 	$nohalaman = 1;
 	$dataperhalaman_x = "";
}
$offset = ($nohalaman - 1) * $dataPerhalaman;



if( $action == "search" ){ 
	$QryNumItemnewsletter = Search_Item_newsletter_All_data($tbl_newsletter, $cari );
} 

if( $action == "FormEntry" ){ 
	$QryNumItemnewsletter = model_newsletter_list( $tbl_newsletter );
}

if( !isset($action)){
	$QryNumItemnewsletter = model_newsletter_list( $tbl_newsletter );
	
}
		
		$HitungJumlahItemnewsletter  = mysql_num_rows($QryNumItemnewsletter);
		$opsetr = offsethalaman ($halaman ,$dataPerhalaman);
		$offset = $opsetr[0];
		$nohalaman = $opsetr[1];
		
		$no = $offset + 1;

if($action == "search" ){
	$posisihalaman  = "newsletter_main.php?cari=$cari&action=search&$dataperhalaman_x";
}

if($action == "FormEntry" ){
	$posisihalaman  = "newsletter_main.php?action=FormEntry&$dataperhalaman_x";
}

if( !isset($action) ){
	$posisihalaman  = "newsletter_main.php?$dataperhalaman_x";
}


$tampilkanhalamannya = tampilkanhalaman ($posisihalaman , $HitungJumlahItemnewsletter ,$dataPerhalaman, $nohalaman, $halaman );


?>


<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
$action = $_GET['action'];

if( $action == "search" ){
	$Qry_ListData_newsletter = Search_Item_newsletter_ALL($tbl_newsletter, $cari , $offset , $dataPerhalaman );
	$List_JumlahDatanewsletter =  GetJML_Search_Item_newsletter_ALL( $tbl_newsletter, $cari ); /* Hitung Data Item */
}

if( $action == "FormEntry" ){
	$Qry_ListData_newsletter = model_newsletter_list_bypage($tbl_newsletter, $offset , $dataPerhalaman ); 
	$List_JumlahDatanewsletter = model_newsletter_count( $tbl_newsletter );
}

if( !isset($action)){  
	$Qry_ListData_newsletter = model_newsletter_list_bypage($tbl_newsletter, $offset , $dataPerhalaman ); 
	$List_JumlahDatanewsletter = model_newsletter_count( $tbl_newsletter );
}

?>

<?php 
if($List_JumlahDatanewsletter == 0){
?>

<?php 
}else{
?>
 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
                     <tr>
                       <td width="1%">&nbsp;</td>
                       <td width="10%"><span class="style9">page </span></td>
                       <td width="3%"><div align="center"><span class="style9">:</span></div></td>
                       <td width="86%">
					   
<div class="pagination"><?php 
echo $tampilkanhalamannya?>  </div>

					   </td>
                     </tr>
      </table>

<table width='100%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>

<tr class='judulform'>
	<td width='5%' height='35' class='judulform'>  <div align="center">NO. </div></td>
		
	<td colspan='2' class='judulform'> <div align="center">DESCRIPTION</div> 
	  <div align="center"></div></td>
  </tr>
<?php 
while( $row = mysql_fetch_object($Qry_ListData_newsletter)){
 
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";

?>

<tr  valign='top' bgcolor='<?php 
echo $BG ?>' onmouseover="this.bgColor='#FFFFD7'" onmouseout="this.bgColor='<?php 
echo $BG ?>'">

<td width='5%'>   
 <div align="center"><?php 
echo $no  ?>.
</div></td>
 
<td width="0%"> </td>


<td width="95%"> 

 
<div class="Font_Item_Judul">
	<?php 
echo $row->email ?>
</div>
 
<?php 
echo harienglish($row->tglpost) ?>, <?php 
echo bulanenglish($row->tglpost) ?> | <?php 
echo $row->jampost ?>
 
<br>
  
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="82%">
	
<div  id='link_action' class='link_action'>
<ul>
	<li> <a href='newsletter_main.php?id=<?php 
echo $row->id ?>&action=EditData'> Edit Item </a> </li>
</ul>	 
</div>


</td>
<td width="18%">


<span class="link_delete" align="center">
<ul class='link_delete'>
	<li class='link_delete'>
		<a href='#' onClick="JavaScript_Konfirmasi_Item( <?php 
echo $row->id ?> )" class="link_delete"> Delete </a>
	</li>
</ul>	 
</span>


	
	</td>
  </tr>
</table>
<br>
<br>

</td>
<?php 
/* */		  
?>
</tr>
<?php 
$no ++;
}
?>

</table>
  
  
  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1%">&nbsp;</td>
      <td width="10%"><span class="style9">page</span></td>
      <td width="3%"><div align="center"><span class="style9">:</span></div></td>
      <td width="86%">
        <div class="pagination"><?php 
echo $tampilkanhalamannya?> </div></td>
    </tr>
  </table>
  
  
  <?php 
} ?>
   
  </td>
</tr>
</table>

<?php 
} ?>
<?php 
} ?>