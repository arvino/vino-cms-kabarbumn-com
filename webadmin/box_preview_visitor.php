<table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
               <td background="images/box/B2_Batas_Atas.png"> </td>
               <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
             </tr>
             <tr valign="top">
               <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
               <td background="images/box/B2_Latar.png">
                  
<span class="JudulKanal_box1"> LAST VISITOR </span>


<hr class='line_box'>
<?php 
$dataPerhalaman = 5;
$offset = 1;

$result = users_historiakses_listAll_By_page( $tbl_usershistoriakses , $offset , $dataPerhalaman);
$hitungdata = users_historiakses_listAll_By_page( $tbl_usershistoriakses , $offset , $dataPerhalaman);
?>
<?php 
if($hitungdata == 0){
?>

NO VISITORS

<?php 
}else{
?>
<?php 
$no = 1;
while( $row_visitor = mysql_fetch_object($result) ){
if( $no % 2 ) $BG = "#EEEEEE"; else $BG = "#F7F7F7";
$detail_user = Users_Select_Detail( $tbl_users, $row_visitor->userid );

?>

<?php 
echo $no ?>. <?php 
echo $detail_user->username ?> from <?php 
echo $row_visitor->ip ?> 
<br>
<?php 
echo harienglish($row_visitor->login) ?>, <?php 
echo bulanenglish($row_visitor->login) ?> | <?php 
echo $row_visitor->timelogin ?>
<br>
<hr class='line_box'>
<?php 
$no++;
}
}
?>
               </td>
               <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
             </tr>
             <tr>
               <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
               <td background="images/box/B2_Batas_Bawah.png"> </td>
               <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
             </tr>
         </table>