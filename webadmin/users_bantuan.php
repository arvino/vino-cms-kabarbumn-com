<?php
session_name("CUST");
session_start();
$sesi_id = $_SESSION['users_id'];
$sesi_idpegawai = $_SESSION['users_idpegawai'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
?>

<?php 
include"kelas_function.php";
?>
<html>
<head>

<?php 
include"head.php"; ?>
</head>
 
<body leftmargin="0" topmargin="0" bottommargin="0"  rightmargin="0"   
style="background-image: url(images/bghalaman.png);background-repeat:no-repeat;
background-position:top;background-attachment:fixed;">
 <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td width="11"><img name="frame_vinocms_r2_c2" src="images/templates/frame_vinocms_r2_c2.png" width="11" height="11" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r2_c4.png" width="949" height="11"> </td>
   <td width="10"><img name="frame_vinocms_r2_c6" src="images/templates/frame_vinocms_r2_c6.png" width="10" height="11" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/templates/frame_vinocms_r3_c2.png" width="11" height="103"> </td>
   <td background="images/templates/frame_vinocms_r3_c4.png">  
   
   
   
     <?php 
include"header.php";?></td>
   <td background="images/templates/frame_vinocms_r3_c6.png" width="10" height="103"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r4_c2" src="images/templates/frame_vinocms_r4_c2.png" width="11" height="8" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r4_c4.png" width="10" height="8"> </td>
   <td><img name="frame_vinocms_r4_c6" src="images/templates/frame_vinocms_r4_c6.png" width="10" height="8" border="0" alt=""></td>
  </tr>
  <tr valign="top">
   <td background="images/templates/frame_vinocms_r5_c2.png" width="11" height="36"> </td>
   <td background="images/templates/frame_vinocms_r5_c4.png"> 
 <?php 
include"menu_atas.php";?>
 <br>   </td>
   <td background="images/templates/frame_vinocms_r5_c6.png" width="10" height="36"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r6_c2" src="images/templates/frame_vinocms_r6_c2.png" width="11" height="7" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r6_c4.png" width="10" height="7"> </td>
   <td><img name="frame_vinocms_r6_c6" src="images/templates/frame_vinocms_r6_c6.png" width="10" height="7" border="0" alt=""></td>
  </tr>
  <tr valign="top">
   <td background="images/templates/frame_vinocms_r9_c2.png" width="11" height="19"> </td>
   <td background="images/templates/frame_vinocms_r9_c4.png">     
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
       <tr valign="top">
         <td width="25%"><table width="250" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
               <td background="images/box/B2_Batas_Atas.png"> </td>
               <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
             </tr>
             <tr valign="top">
               <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
               <td background="images/box/B2_Latar.png">
                 <table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
                   <tr class='kontenform'>
                     <td>
                       <div align='center'> <br>
                           <b>BANTUAN TEKNIS</b> <br>
                    Silahkan chat atau tinggalkan pesan pthere is masing masing anggota layanan teknis. <br>
                    <br>
                     </div></td>
                   </tr>
               </table></td>
               <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
             </tr>
             <tr>
               <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
               <td background="images/box/B2_Batas_Bawah.png"> </td>
               <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
             </tr>
         </table></td>
         <td width="75%"><div align="center">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="9" height="8"><img name="B2_Sudut_KiriAtas" src="images/box/B2_Sudut_KiriAtas.png" width="9" height="8" border="0" alt=""></td>
                 <td background="images/box/B2_Batas_Atas.png"> </td>
                 <td width="8" height="8"><img name="B2_Sudut_KananAtas" src="images/box/B2_Sudut_KananAtas.png" width="8" height="8" border="0" alt=""></td>
               </tr>
               <tr valign="top">
                 <td background="images/box/B2_Batas_Kiri.png" width="9"> </td>
                 <td background="images/box/B2_Latar.png"> <span class="JudulKanal_box1">HELP DESK</span>
                     <hr class='line_box'>
                     
					 
					 
					 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="31%"> 
                   
<div align="center">			
<b>Web Designer</b>
<br>   
<a href="ymsgr:sendIM?zulka_1345">
<img src="http://opi.yahoo.com/online?u=zulka_1345&amp;m=g&amp;t=18&amp;l=us" alt="Web Designer" border="0">
</a>
</div> 
				   
				   
				   </td>
                  <td width="36%">
				  
				  
<div align="center">				
<b>Web Programmer</b>
<br>     
<a href="ymsgr:sendIM?arvinozulka@ymail.com">
<img src="http://opi.yahoo.com/online?u=arvinozulka@ymail.com&amp;m=g&amp;t=22&amp;l=us" alt="Web Programmer" border="0">
</a>
</div> 
				  
				  
				  
				  
				  </td>
                  <td width="33%">
				  
<div align="center">
<b>Web Master</b>
<br>
<a href="ymsgr:sendIM?temankomputer">
<img src="http://opi.yahoo.com/online?u=temankomputer&amp;m=g&amp;t=20&amp;l=us" alt="Web Master" border="0">
</a>
</div>  
				  
				  
				  </td>
                </tr>
              </table>
					 
					 
					 
					 
					 
					 
					 
					 
					 </td>
                 <td background="images/box/B2_Batas_Kanan.png" width="8"> </td>
               </tr>
               <tr>
                 <td width="9" height="8"><img name="B2_Sudut_KiriBawah" src="images/box/B2_Sudut_KiriBawah.png" width="9" height="8" border="0" alt=""></td>
                 <td background="images/box/B2_Batas_Bawah.png"> </td>
                 <td width="8" height="8"><img name="B2_Sudut_KananBawah" src="images/box/B2_Sudut_KananBawah.png" width="8" height="8" border="0" alt=""></td>
               </tr>
             </table>
         </div></td>
       </tr>
     </table></td>
   <td background="images/templates/frame_vinocms_r9_c6.png" width="10" height="19"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r11_c2" src="images/templates/frame_vinocms_r11_c2.png" width="11" height="9" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r11_c4.png" width="10" height="9"> </td>
   <td><img name="frame_vinocms_r11_c6" src="images/templates/frame_vinocms_r11_c6.png" width="10" height="9" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/templates/frame_vinocms_r12_c2.png" width="11" height="19"> </td>
   <td background="images/templates/frame_vinocms_r12_c4.png" width="10" height="19">&nbsp;</td>
   <td background="images/templates/frame_vinocms_r12_c6.png" width="10" height="19"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r13_c2" src="images/templates/frame_vinocms_r13_c2.png" width="11" height="9" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r13_c4.png" width="10" height="9"> </td>
   <td><img name="frame_vinocms_r13_c6" src="images/templates/frame_vinocms_r13_c6.png" width="10" height="9" border="0" alt=""></td>
  </tr>
  <tr>
   <td background="images/templates/frame_vinocms_r14_c2.png" width="11" height="19"> </td>
   <td background="images/templates/frame_vinocms_r14_c4.png" width="10" height="19"><?php 
include"footer.php"; ?></td>
   <td background="images/templates/frame_vinocms_r14_c6.png" width="10" height="19"> </td>
  </tr>
  <tr>
   <td><img name="frame_vinocms_r15_c2" src="images/templates/frame_vinocms_r15_c2.png" width="11" height="7" border="0" alt=""></td>
   <td background="images/templates/frame_vinocms_r15_c4.png" width="10" height="7"> </td>
   <td><img name="frame_vinocms_r15_c6" src="images/templates/frame_vinocms_r15_c6.png" width="10" height="7" border="0" alt=""></td>
  </tr>
</table>


</body>
</html>
