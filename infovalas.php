 <?php
 function bacaHTML($url){
 // inisialisasi CURL
 $data = curl_init();
 // setting CURL
 curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($data, CURLOPT_URL, $url);
 // menjalankan CURL untuk membaca isi file
 $hasil = curl_exec($data);
 curl_close($data);
 return $hasil;
 }


if($_SERVER['HTTP_HOST']=="pialangnews.com" || $_SERVER['HTTP_HOST']=="www.pialangnews.com")  {
	$kodeHTML =  bacaHTML('http://www.klikbca.com');
}else{
	$kodeHTML =  "";
}

 $pecah = explode('<table width="139" border="0" cellspacing="0" cellpadding="0">', $kodeHTML);
 
 $pecahLagi = explode('</table>', $pecah[2]);
  
 echo "<table border='0' cellspacing='2' cellpadding='2' width='100%'>";
 echo "<tr ><td align='left'>KURS</td> <td align='center'> JUAL </td><td align='center'>BELI</td></tr>";
 echo $pecahLagi[0];
 echo "</table>";
 ?>