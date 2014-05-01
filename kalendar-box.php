<?php 
$year = date('Y');
$month = date('m');
$day	=	date("d");
$bulansekarang = date("m");
function bulanindonesia($bulansekarang)
{
  $array_bulan		=array("Januari","Februari","Maret", "April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
  $bulannya			=$array_bulan[ceil($bulansekarang)-1];
  return $bulannya;
		
}

 
?>

 
	
<table width="100%" align="center" cellpadding=2 cellspacing=1>
<tr valign="top">


<td height="29" bgcolor="#FCFCFC" valign="top" onmouseover="javascript:style.backgroundColor='#FFFFDD'" onmouseout="javascript:style.backgroundColor='#FCFCFC'">


<?php

//cek jumlah hari tahun sekarang
$endDate=date("t",mktime(0,0,0,$month,$day,$year));

$bulannyong = bulanindonesia($month);
?>

 
 
 

<table align='center' border='0' width='100%' cellpadding=2 cellspacing=1 style='border:1px solid #EAEAEA'>
<tr bgcolor='#EFEFEF' height='30' width='12%'>
<td align=center>
<font color='red'>Ming</font>
</td>
<td align=center>Sen</td>
<td align=center>Sel</td>
<td align=center>Rab</td>
<td align=center>Kam</td>
<td align=center>Jum</td>
<td align=center><font color=blue>Sab</font></td>
</tr>

<?php 
/*
mengecek tanggal 1 bulan sekarang ada pada hari ke berapa
kemudian tambahkan cell td sebanyak var $s
*/
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) 
{
?>

<td style='font-family:arial;color:#B3D9FF' width='15%' align=center valign=middle bgcolor='#FFFFFF'>
</td>
<?php 
}

for ($d=1;$d<=$endDate;$d++) 
{

if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
//jika nilai $d (tanggal) adalah hari minggu (0) dibuat baris baru <tr>
//default warna huruf
$fontColor="#000000";
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") 
{ $fontColor="red"; }
//jika tanggal adalah hari minggu warna huruf merah
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") 
{ $fontColor="blue"; }



$dayhariini = date('dmy');
if (date("dmy",mktime (0,0,0,$month,$d,$year)) == $dayhariini) { 
		$fontColor="magenta"; 
		$bgr="#FF0000"; 
		$link="<a href='$link_host". "indeks-news-kategori-11-agenda.html" ."'><b>$d</b></a>";

} else {
		$link="<a href='$link_host". "indeks-news-kategori-11-agenda.html" ."'><b>$d</b></a>";
		$bgr="white"; 
}
		
// Ambil data dari tabel jadwal lelang

$ttanggal	=	date("d");
$tbulan		=	date("m");
$ttahun		=	date("Y");
$tPilih		=	"$ttahun-$tbulan";





// ===========================================================
?>


<td style='font-family:arial;color:#333333' width='15%' align=center valign=middle bgcolor='<?php 
print $bgr ?>' onmouseover="javascript:style.backgroundColor='#BA0808'" onmouseout="javascript:style.backgroundColor='<?php 
print $bgr ?>'"> <span style='color:<?php 
print $fontColor ?>'><?php 
print $link ?></span></td>
<?php 
//jika tanggal adalah hari sabtu (6) akhiri baris </tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}

//akhir table
?>

</table>


  
	</td>
    </tr>
 

</table>
	
	
	
	 