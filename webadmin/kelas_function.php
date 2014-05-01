<?php 
include"../function/config_sys.php";
include"../function/Function.Image.php";
include"../function/Function.Angka.php";
include"../function/Function.File.php";
include"../function/Function.FilterKonten.php";
include"../function/Function.Halaman.php";

include"../function/Function.Counter.php";

/* Function Users */
include"../function/Function.Users_Roles.php";
include"../function/Function.Users_Tokens.php";
include"../function/Function.Users_Historiakses.php";
include"../function/Function.Users_Groups.php";
include"../function/Function.Users.php";


/* Function otherpage */
include"../function/Function.Otherpage_Kanal.php";
include"../function/Function.Otherpage_SubKanal.php";
include"../function/Function.Otherpage_Item.php";
include"../function/Function.Otherpage_ItemLampiran.php";

 /* Function News */
include"../function/Function.News_Kanal.php";
include"../function/Function.News_SubKanal.php";
include"../function/Function.News_Item.php";
include"../function/Function.News_ItemLampiran.php";
include"../function/Function.News_Komentar.php";

/* Modelling Banner : File PHP Function Banner */
include"../function/Function.Banner_Kanal.php";
include"../function/Function.Banner_SubKanal.php";
include"../function/Function.Banner_Item.php";

/* Modelling Guestbook : File PHP Function Guestbook */
include"../function/Function.Guestbook_Item.php";

/* Modelling Newsletter : File PHP Function Newsletter */
include"../function/Function.Newsletter_Item.php";

/* Modelling Subscription : File PHP Function Subscription */
include"../function/Function.Subscription_Item.php";



/* ************************* */

$BROWSER_UO =	$_SERVER['HTTP_USER_AGENT'];
$REFERER_UO =	$_SERVER['HTTP_REFERER'];
$NAMAHOST_UO =	$_SERVER['HTTP_HOST'];
$PORT_UO =	$_SERVER['REMOTE_PORT'];
$KONEKSI_UO =	$_SERVER['HTTP_CONNECTION'];
$TGLSTSKRESELLER_UO =	date('dmy');
$fileygdiakses = $PHP_SELF;

$to_secs = 920;		// time to reset IP address's value in seconds, default here is 120 (2 minutes)
$t_stamp = time();                                                                                            
$timeout = $t_stamp - $to_secs; 

include"counter.php";

$hitung_web_counter = cekHitsCounter( $tbl_counter_web, $REMOTE_ADDR, $tanggalhariini );

 	if( $hitung_web_counter == 0){
		$id = BuatIDCounter( $tbl_counter_web );

		$hit = 1;
		addHitsCounter(
			$tbl_counter_web,
			$id, $REMOTE_ADDR, $tanggalhariini,
			$jamsaatini, $BROWSER_UO, $REFERER_UO,
			$fileygdiakses, $hit );
 
 		}else{
		
 			 
			if ( $_COOKIE["counterwebsites"] == "" ) {
			
			$detail_counter = viewdetail_counterweb( $tbl_counter_web, $REMOTE_ADDR, $tanggalhariini );
			
				$durasiCokies = 50 + time(); // 5000 Detik
				$hits = $detail_counter->hit + 1;
				$values = "COUNTER_WEB_1". $hits;
				
				//setcookie( counterwebsites, $values, $durasiCokies); 
				
				
				updateHitsCounter( $tbl_counter_web, $REMOTE_ADDR, $tanggalhariini, $hits);
				
			}else{
			
				 
			}
	 	
	}
 
/* Function Check Users Status Baru untuk di arahkan ke form ganti password */
$detail_users_check = Users_Select_Detail( $tbl_users, $sesi_id );
$status_baru = $detail_users_check->statusbaru; 



$language="enus";
include_once("plugin/".$language.".php");
function getLabel($key,$language){
   global $label;
   return $label[$language][$key];
}
?>