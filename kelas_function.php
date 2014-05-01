<?php 
include"function/config_sys.php";
include"function/Function.Image.php";
include"function/Function.Angka.php";
include"function/Function.File.php";
include"function/Function.FilterKonten.php";
include"function/Function.Halaman.php";
include"function/GoogleTranslate.php"; 

include"function/Function.Counter.php";

include"function/Function.Users_Roles.php";
include"function/Function.Users_Tokens.php";
include"function/Function.Users_Historiakses.php";
include"function/Function.Users_Groups.php";
include"function/Function.Users.php";


/* Function Otherpage */
include"function/Function.Otherpage_Kanal.php";
include"function/Function.Otherpage_SubKanal.php";
include"function/Function.Otherpage_Item.php";
include"function/Function.Otherpage_ItemLampiran.php";

/* Function News */
include"function/Function.News_Kanal.php";
include"function/Function.News_SubKanal.php";
include"function/Function.News_Item.php";
include"function/Function.News_ItemLampiran.php";
include"function/Function.News_Komentar.php";

/* Modelling Guestbook : File PHP Function Guestbook */
include"function/Function.Guestbook_Item.php";

 /* Modelling Banner : File PHP Function Banner */
include"function/Function.Banner_Kanal.php";
include"function/Function.Banner_SubKanal.php";
include"function/Function.Banner_Item.php";

/* Modelling Newsletter : File PHP Function Newsletter */
include"function/Function.Newsletter_Item.php";


/* Modelling Subscription : File PHP Function Subscription */
include"function/Function.Subscription_Item.php";

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

//include"counter.php";

/*
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
				
				setcookie( counterwebsites, $values, $durasiCokies); 
				
				
				updateHitsCounter( $tbl_counter_web, $REMOTE_ADDR, $tanggalhariini, $hits);
				
			}else{
			
				 
			}
	 	
	}
 
/* Function Check Users Status Baru untuk di arahkan ke form ganti password */
/*
$detail_users_check = Users_Select_Detail( $tbl_users, $sesi_id );
$status_baru = $detail_users_check->statusbaru; 
*/



    $isMobile = false;
    $isBot = false;

    $op = strtolower($_SERVER['HTTP_X_OPERAMINI_PHONE']);
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $ac = strtolower($_SERVER['HTTP_ACCEPT']);
    $ip = $_SERVER['REMOTE_ADDR'];

    $isMobile = strpos($ac, 'application/vnd.wap.xhtml+xml') !== false
    || $op != ''
    || strpos($ua, 'sony') !== false
    || strpos($ua, 'symbian') !== false
    || strpos($ua, 'nokia') !== false
    || strpos($ua, 'samsung') !== false
    || strpos($ua, 'mobile') !== false
    || strpos($ua, 'windows ce') !== false
    || strpos($ua, 'epoc') !== false
    || strpos($ua, 'opera mini') !== false
    || strpos($ua, 'nitro') !== false
    || strpos($ua, 'j2me') !== false
    || strpos($ua, 'midp-') !== false
    || strpos($ua, 'cldc-') !== false
    || strpos($ua, 'netfront') !== false
    || strpos($ua, 'mot') !== false
    || strpos($ua, 'up.browser') !== false
    || strpos($ua, 'up.link') !== false
    || strpos($ua, 'audiovox') !== false
    || strpos($ua, 'blackberry') !== false
    || strpos($ua, 'ericsson,') !== false
    || strpos($ua, 'panasonic') !== false
    || strpos($ua, 'philips') !== false
    || strpos($ua, 'sanyo') !== false
    || strpos($ua, 'sharp') !== false
    || strpos($ua, 'sie-') !== false
    || strpos($ua, 'portalmmm') !== false
    || strpos($ua, 'blazer') !== false
    || strpos($ua, 'avantgo') !== false
    || strpos($ua, 'danger') !== false
    || strpos($ua, 'palm') !== false
    || strpos($ua, 'series60') !== false
    || strpos($ua, 'palmsource') !== false
    || strpos($ua, 'pocketpc') !== false
    || strpos($ua, 'smartphone') !== false
    || strpos($ua, 'rover') !== false
    || strpos($ua, 'ipaq') !== false
    || strpos($ua, 'au-mic,') !== false
    || strpos($ua, 'alcatel') !== false
    || strpos($ua, 'ericy') !== false
    || strpos($ua, 'up.link') !== false
    || strpos($ua, 'vodafone/') !== false
    || strpos($ua, 'wap1.') !== false
    || strpos($ua, 'wap2.') !== false;

    $isBot = $ip == '66.249.65.39'
    || strpos($ua, 'googlebot') !== false
    || strpos($ua, 'mediapartners') !== false
    || strpos($ua, 'yahooysmcm') !== false
    || strpos($ua, 'baiduspider') !== false
    || strpos($ua, 'msnbot') !== false
    || strpos($ua, 'slurp') !== false
    || strpos($ua, 'ask') !== false
    || strpos($ua, 'teoma') !== false
    || strpos($ua, 'spider') !== false
    || strpos($ua, 'heritrix') !== false
    || strpos($ua, 'attentio') !== false
    || strpos($ua, 'twiceler') !== false
    || strpos($ua, 'irlbot') !== false
    || strpos($ua, 'fast crawler') !== false
    || strpos($ua, 'fastmobilecrawl') !== false
    || strpos($ua, 'jumpbot') !== false
    || strpos($ua, 'googlebot-mobile') !== false
    || strpos($ua, 'ahooseeker') !== false
    || strpos($ua, 'motionbot') !== false
    || strpos($ua, 'mediobot') !== false
    || strpos($ua, 'chtml generic') !== false
    || strpos($ua, 'nokia6230i/. fast crawler') !== false;

	// Jika pengunjung dari IPAD
	$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
    if($isiPad){
    	$isMobile = false;
    }
	
	// Jika pengunjung dari Android
	$isAndroid = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'android');
    if($isAndroid){
    	$isMobile !== false;
    }
	
 
    if($isMobile){

    header('Location: http://m.'. $Config_Domain.''. $_SERVER['REQUEST_URI']);

    exit();

    }





?>