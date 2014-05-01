<?php 
/* 
	token_publicusers
*/
$KodeKeamananhalaman  = "token_publicusers";
$KodeKeamananhalaman_Keterangan = "ACCESS DENIED !.";
if ((!in_array($KodeKeamananhalaman , $halamandiizinkan) OR !isset($KodeKeamananhalaman ))) {
	include"access_denied.php";
}else{

?>
<?php 
$get_id = $_GET['id'];
$detail_publicusers = modeling_PublicUsers_Select_Detail( $tbl_publicusers, $get_id );
?>



<table width='98%' align='center' cellpadding='1' cellspacing='1' class='tabelform'>
    <tr class='judulform' >
      <td width='100%' height='30'>
	  
			FORM CHANGE PASSWORD
	  
	  </td>
    </tr>
    <tr class='kontenform'>
      <td>
	  
	  
	  
	  
	  
<table width='100%'  align='center' cellpadding='1' cellspacing='1' class='tabelform'>
                                 
 <tr class='kontenform' >
   <td width="32%"><div align="right">ID</div></td>
   <td width="2%"> 		
			<div align="center"><strong>:            </strong></div></td>
   <td width="66%"><?php 
echo $detail_publicusers->id ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">IDUPLINE</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->idupline ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">IDFB</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->idfb ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">USER ID </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->userid ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">USERNAME</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->username ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">EMAIL</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->email ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">PASSWORD</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->password ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">NAMA DEPAN</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->namadepan ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">NAMA BELAKANG </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->namabelakang ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">NAMA PANGGILAN </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->namapanggilan ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">JENIS KELAMIN </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->jeniskelamin ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">NO PONSEL </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->noponsel ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">GAMBAR KECIL </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->gambarkecil ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">GAMBAR BESAR </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->gambarbesar ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">NEGARA</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->negara ?></td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">KOTA</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->kota ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">ALAMAT</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->alamat ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">NEWSLETTER</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->newsletter ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">AGREE TOS </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->agreetos ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">IM</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->im ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">AKSES MODUL </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->aksesmodul ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">AKSES PROSES </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->aksesproses ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">STATUS</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->status ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">STATUS BARU </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->statusbaru ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">TANGGAL DAFTAR </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->tanggaldaftar ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">TANGGAL AKTIF </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->tanggalaktif ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">LOGIN TERAKHIR </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->loginterakhir ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">UPDATE TERAKHIR </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->updateterakhir ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">UPDATE USERS </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->updateusers ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">KODE AKTIFASI </div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->kodeaktifasi ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">TERAKTIF</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->teraktif ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">TERPOPULER</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->terpopuler ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">DIREKTORI</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td>     <?php 
echo $detail_publicusers->direktori ?> </td>
 </tr>
 <tr class='kontenform' >
   <td><div align="right">HIT</div></td>
   <td><div align="center"><strong>:</strong></div></td>
   <td><?php 
echo $detail_publicusers->hit ?> &nbsp;</td>
 </tr>
</table>
	  
	  
	  
	  
	  </td>
	</tr>
</table>

 
	 
<?php 
}
?>