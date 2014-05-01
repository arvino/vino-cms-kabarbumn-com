<?php 
function lostnumber() {
  $the_char = array(
     "A","B","C","D","E","F","G","H","I","J",
     "K","L","M","N","O","P","Q","R","S","T",
     "U","V","W","X","Y","Z"
  );
  $max_elements = count($the_char) - 1;
  srand((double)microtime()*1000000);
  $c1 = $the_char[rand(0,$max_elements)];
  $c2 = $the_char[rand(0,$max_elements)];
  $c3 = $the_char[rand(0,$max_elements)];
  $c4 = $the_char[rand(0,$max_elements)];
  $c5 = $the_char[rand(0,$max_elements)];
  $c6 = $the_char[rand(0,$max_elements)];
  $c7 = $the_char[rand(0,$max_elements)];
  $c8 = $the_char[rand(0,$max_elements)];
  $c9 = $the_char[rand(0,$max_elements)];
  $c10 = $the_char[rand(0,$max_elements)];
  $c11 = $the_char[rand(0,$max_elements)];
  $c12 = $the_char[rand(0,$max_elements)];
  $c13 = $the_char[rand(0,$max_elements)];
  $c14 = $the_char[rand(0,$max_elements)];
  $c15 = $the_char[rand(0,$max_elements)];
  $c16 = $the_char[rand(0,$max_elements)];
  $c17 = $the_char[rand(0,$max_elements)];
  $c18 = $the_char[rand(0,$max_elements)];
  $c19 = $the_char[rand(0,$max_elements)];
  $c20 = $the_char[rand(0,$max_elements)];
  $c21 = $the_char[rand(0,$max_elements)];
  $c22 = $the_char[rand(0,$max_elements)];
  $c23 = $the_char[rand(0,$max_elements)];
  $c24 = $the_char[rand(0,$max_elements)];
  $c25 = $the_char[rand(0,$max_elements)];
  $c26 = $the_char[rand(0,$max_elements)];
  $c27 = $the_char[rand(0,$max_elements)];
  $c28 = $the_char[rand(0,$max_elements)];
  $c29 = $the_char[rand(0,$max_elements)];
  $c30 = $the_char[rand(0,$max_elements)];

  $ranc = "$c1$c2$c20$c3$c4$c5$c6$c28$c23";
  return $ranc;
}



// Fungsi Titik Pemisahan Angka
function titik($rp){

	$rupiah = "";
	$p = strlen($rp);
	while($p > 3)
	{
		$rupiah = "." . substr($rp,-3) . $rupiah;
		$l 		= strlen($rp) - 3;
		$rp 	= substr($rp,0,$l);
		$p 		= strlen($rp);
	}
	$rupiah = "" . $rp . $rupiah . "";
	return $rupiah;
}


function nomoraktifasi() {
  $the_char = array(
     "A","B","C","D","E","F","G","H","I","J",
     "K","L","M","N","O","P","Q","R","S","T",
     "U","V","W","X","Y","Z",
	 "3","4","5","6","7","9"
  );
  $max_elements = count($the_char) - 1;
  srand((double)microtime()*1000000);
  $c1 = $the_char[rand(0,$max_elements)];
  $c2 = $the_char[rand(0,$max_elements)];
  $c3 = $the_char[rand(0,$max_elements)];
  $c4 = $the_char[rand(0,$max_elements)];
  $c5 = $the_char[rand(0,$max_elements)];
  $c6 = $the_char[rand(0,$max_elements)];
  $c7 = $the_char[rand(0,$max_elements)];
  $c8 = $the_char[rand(0,$max_elements)];
  $c9 = $the_char[rand(0,$max_elements)];
  $c10 = $the_char[rand(0,$max_elements)];
  $c11 = $the_char[rand(0,$max_elements)];
  $c12 = $the_char[rand(0,$max_elements)];
  $c13 = $the_char[rand(0,$max_elements)];
  $c14 = $the_char[rand(0,$max_elements)];
  $c15 = $the_char[rand(0,$max_elements)];
  $c16 = $the_char[rand(0,$max_elements)];
  $c17 = $the_char[rand(0,$max_elements)];
  $c18 = $the_char[rand(0,$max_elements)];
  $c19 = $the_char[rand(0,$max_elements)];
  $c20 = $the_char[rand(0,$max_elements)];
  $c21 = $the_char[rand(0,$max_elements)];
  $c22 = $the_char[rand(0,$max_elements)];
  $c23 = $the_char[rand(0,$max_elements)];
  $c24 = $the_char[rand(0,$max_elements)];
  $c25 = $the_char[rand(0,$max_elements)];
  $c26 = $the_char[rand(0,$max_elements)];
  $c27 = $the_char[rand(0,$max_elements)];
  $c28 = $the_char[rand(0,$max_elements)];
  $c29 = $the_char[rand(0,$max_elements)];
  $c30 = $the_char[rand(0,$max_elements)];

  $ranc = "$c1$c2$c3$c4$c5$c6$c7$c8$c9$c10$c11$c12$c13$c14$c15";
  return $ranc;
}


function  htgHari($tgl_awal, $tgl_akhir)
{
$hari_awal			=substr($tgl_awal,3,2);
$bln_awal			=substr($tgl_awal,0,2);
$thn_awal			=substr($tgl_awal,6,4);
$hari_akhir			=substr($tgl_akhir,3,2);
$bln_akhir			=substr($tgl_akhir,0,2);
$thn_akhir			=substr($tgl_akhir,6,4);

$tgl_awal			=mktime(0,0,0,$hari_awal, $bln_awal, $thn_awal);
$tgl_akhir			=mktime(0,0,0,$hari_akhir, $bln_akhir, $thn_akhir);

$awltimestamp=$tgl_awal;

for($hr=$tgl_awal; $hr<= $tgl_akhir; $hr+=86400) 
       {  
	    if ($awltimestamp==" ") { $awltimestamp=$hr; }
		}
$akhtimestamp=$hr;

$jml=($akhtimestamp-$awltimestamp)/86400;

return $jml;
}


function check_email($email){

        if (!preg_match('/^[0-9a-zA-Z\.\-\_]+\@[0-9a-zA-Z\.\-]+$/', $email))
            return false;
        if (preg_match('/^[^0-9a-zA-Z]|[^0-9a-zA-Z]$/', $email))
            return false;
        if (!preg_match('/([0-9a-zA-Z_]{1})\@./', $email) )
            return false;
        if (!preg_match('/.\@([0-9a-zA-Z_]{1})/', $email) )
            return false;
        if (preg_match('/.\.\-.|.\-\..|.\.\..|.\-\-./', $email) )
            return false;
        if (preg_match('/.\.\_.|.\-\_.|.\_\..|.\_\-.|.\_\_./', $email) )
            return false;
        if (!preg_match('/\.([a-zA-Z]{2,5})$/', $email) )
            return false;
			
		if (!preg_match('/\.(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum
		|co.id|com.sg|.sg|co.uk|net.id|go.id|mil.id|web.id|ac.id|sch.id|or.id|com.sg|ws|mobi|asia|us|info)$/', $email) )
        return false;

        return true;
		
}
	

function check_email_arvinozulka($email){
        if (!preg_match('/^[0-9a-zA-Z\.\-\_]+\@[0-9a-zA-Z\.\-]+$/', $email))
            return false;
        if (preg_match('/^[^0-9a-zA-Z]|[^0-9a-zA-Z]$/', $email))
            return false;
        if (!preg_match('/([0-9a-zA-Z_]{1})\@./', $email) )
            return false;
        if (!preg_match('/.\@arvinozulka/', $email) )
            return false;
        if (preg_match('/.\.\-.|.\-\..|.\.\..|.\-\-./', $email) )
            return false;
        if (preg_match('/.\.\_.|.\-\_.|.\_\..|.\_\-.|.\_\_./', $email) )
            return false;
        if (!preg_match('/\.([a-zA-Z]{2,5})$/', $email) )
            return false;
			
		if (!preg_match('/\.(com)$/', $email) )
        return false;

        return true;
}
	
	
function rupiah($rp)
{
	$rupiah = "";
	$p = strlen($rp);
	while($p > 3)
	{
		$rupiah = "." . substr($rp,-3) . $rupiah;
		$l = strlen($rp) - 3;
		$rp = substr($rp,0,$l);
		$p = strlen($rp);
	}
	$rupiah = "Rp." . $rp . $rupiah . ",-";
	return $rupiah;
}

function Dollar($rp)
{
	$rupiah = "";
	$p = strlen($rp);
	while($p > 3){
	
		$rupiah = "." . substr($rp,-3) . $rupiah;
		$l = strlen($rp) - 3;
		$rp = substr($rp,0,$l);
		$p = strlen($rp);
	}
	$rupiah = "USD $ " . $rp . $rupiah . ",-";
	return $rupiah;
}


	function bulanindo($tanggal){
		$array_bulan		=array("Januari","Februari","Maret", "April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
		$tanggalnya			=substr($tanggal,8,2);
		$bulannya			=$array_bulan[ceil(substr($tanggal,5,2))-1];
		$tahunnya			=substr($tanggal,0,4);
		$jamnya				=substr($tanggal,11,2);
		$menitnya			=substr($tanggal,14,2);
		$detiknya			=substr($tanggal,17,2);
		$tglsekarang 		= "$tanggalnya $bulannya $tahunnya";
		return $tglsekarang;
		
	}

	function hariindo($tanggal){
		$sqlText = "SELECT datediff('$tanggal', CURDATE()) as selisih";
		$hasil = mysql_query($sqlText);
		$data  = mysql_fetch_array($hasil);

		$selisih = $data['selisih'];

		$x  = mktime(0, 0, 0, date("m"), date("d")+$selisih, date("Y"));
		$namahari = date("l", $x);

		if ($namahari == "Sunday") $namahari = "Minggu";
		else if ($namahari == "Monday") $namahari = "Senin";
		else if ($namahari == "Tuesday") $namahari = "Selasa";
		else if ($namahari == "Wednesday") $namahari = "Rabu";
		else if ($namahari == "Thursday") $namahari = "Kamis";
		else if ($namahari == "Friday") $namahari = "Jumat";
		else if ($namahari == "Saturday") $namahari = "Sabtu";
		return $namahari;

	}
	
	function bulanenglish($tanggal){
		$array_bulan		=array("January","February","March", "April","May","June","July","August","September","October","November","December");
		$tanggalnya			=substr($tanggal,8,2);
		$bulannya			=$array_bulan[ceil(substr($tanggal,5,2))-1];
		$tahunnya			=substr($tanggal,0,4);
		$jamnya				=substr($tanggal,11,2);
		$menitnya			=substr($tanggal,14,2);
		$detiknya			=substr($tanggal,17,2);
		$tglsekarang 		= "$tanggalnya $bulannya $tahunnya";
		return $tglsekarang;
		
	}

	function harienglish($tanggal){
		$sqlText = "SELECT datediff('$tanggal', CURDATE()) as selisih";
		$hasil = mysql_query($sqlText);
		$data  = mysql_fetch_array($hasil);

		$selisih = $data['selisih'];

		$x  = mktime(0, 0, 0, date("m"), date("d")+$selisih, date("Y"));
		$namahari = date("l", $x);

		return $namahari;

	}


	function bulan($tanggal){
		$array_bulan = array("January","February","March", "April","May","June","July","August","September","October","November","December");
		$bulannya = $array_bulan[ceil($tanggal)-1];
		return $bulannya;
		
	}
	
	/* Hitung durasi hari */
	function DurasiHari($parambegindate, $paramenddate) {
		$begindate = strtotime($parambegindate);
		$enddate = strtotime($paramenddate);
		$diff = intval($enddate) - intval($begindate);                 
		$diffday = intval(floor($diff/86400));
		$modday = ($diff%86400);
		$diffhour = intval(floor($modday/3600));
		$diffminute = intval(floor(($modday%3600)/60));
		$diffsecond = ($modday%60);
		return round($diffday,0);
  	}
	
	
	/* Hitung durasi jam */
	function DurasiJam($parambegindate, $paramenddate) {
		$begindate = strtotime($parambegindate);
		$enddate = strtotime($paramenddate);
		$diff = intval($enddate) - intval($begindate);                 
		$diffday = intval(floor($diff/86400));
		$modday = ($diff%86400);
		$diffhour = intval(floor($modday/3600));
		$diffminute = intval(floor(($modday%3600)/60));
		$diffsecond = ($modday%60);
		return round($diffhour,0);
  	}

	/* Hitung durasi menit */
	function DurasiMenit($parambegindate, $paramenddate) {
		$begindate = strtotime($parambegindate);
		$enddate = strtotime($paramenddate);
		$diff = intval($enddate) - intval($begindate);                 
		$diffday = intval(floor($diff/86400));
		$modday = ($diff%86400);
		$diffhour = intval(floor($modday/3600));
		$diffminute = intval(floor(($modday%3600)/60));
		$diffsecond = ($modday%60);
		return round($diffminute,0);
  	}

	/* Hitung durasi detik */
	function DurasiDetik($parambegindate, $paramenddate) {
		$begindate = strtotime($parambegindate);
		$enddate = strtotime($paramenddate);
		$diff = intval($enddate) - intval($begindate);                 
		$diffday = intval(floor($diff/86400));
		$modday = ($diff%86400);
		$diffhour = intval(floor($modday/3600));
		$diffminute = intval(floor(($modday%3600)/60));
		$diffsecond = ($modday%60);
		return round($diffsecond,0);
  	}

?>