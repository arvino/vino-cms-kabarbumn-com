<?php 
date_default_timezone_set('Asia/Jakarta');

$Config_Charset = "utf-8";
$Config_CompanyName = "KABAR BUMN";

$Config_Domain = "kabarbumn.com";

$tagline = "";

if($_SERVER['HTTP_HOST']==$Config_Domain || $_SERVER['HTTP_HOST']=="www." . $Config_Domain )  {
	$link_host = "http://" . $_SERVER['HTTP_HOST'] ."/";
	$server ='localhost';
}else{
	$link_host = "http://" . $_SERVER['HTTP_HOST'] ."/klien/limadaya/kabarbumn.com/";
	$server ='localhost';
}

$Config_SystemUrl = $link_host;


$extention = ".html";
$link_menu = "/";
$dir_admin = "webadmin/";

$db_name ='c12kabarbumn';
$db_user ='root';
$db_pass ='1q2w3e4r5t';


$dbh=mysql_connect ("$server", "$db_user", "$db_pass") or die ('Cannot connect to database because : ' . mysql_error());
mysql_select_db ("$db_name"); 

/* Tabel Users */
$tbl_users = "users";
$tbl_usersgroups = "usersgroups";
$tbl_usershistoriakses = "usershistoriakses";
$tbl_usersroles = "usersroles";
$tbl_userstokens = "userstokens";
$tbl_usersfiles = "usersfiles";

/* Tabel Public Users */
$tbl_publicusers = "publicusers";
$tbl_publicusers_historiakses = "publicusershistoriakses";


/* Tabel Berita */
$tbl_news = "berita";
$tbl_newsfile = "beritafile";
$tbl_newskategori = "beritakategori";
$tbl_newskategorisub = "beritakategorisub";
$tbl_newskomentar = "beritakomentar"; 

/* Tabel Produk */
$tbl_produk = "produk";
$tbl_produkfile = "produkfile";
$tbl_produkkategori = "produkkategori";
$tbl_produkkategorisub = "produkkategorisub";
$tbl_produkkomentar = "produkkomentar";

/* Tabel Booking / Order */
$tbl_booking = "booking";
$tbl_bookingdetail = "bookingdetail"; 
$tbl_bookingstatus = "bookingstatus";
$tbl_bookingkomentar = "bookingkomentar";
$tbl_bookingfileattachement = "bookingfileattachement";

/* Tabel Download Area */
$tbl_downloadarea = "downloadarea";
$tbl_downloadareafile = "downloadareafile";
$tbl_downloadareakategori = "downloadareakategori";
$tbl_downloadareakategorisub = "downloadareakategorisub";
$tbl_downloadareakomentar = "downloadareakomentar"; 

/* Tabel Counter */
$tbl_counter_onlinevisitor = "counter_onlinevisitor";
$tbl_counter_web = "counter_web";

/* Tabel Gallery */
$tbl_gallery = "gallery"; 
$tbl_galleryfile = "galleryfile";  
$tbl_gallerykategori = "gallerykategori"; 
$tbl_gallerykategorisub = "gallerykategorisub"; 
$tbl_gallerykomentar = "gallerykomentar"; 

/* Tabel Newsletter */
$tbl_newsletter = "newsletter"; 

/* Tabel Subscription */
$tbl_subscription = "subscription";
 
/* Tabel Otherpage */
$tbl_otherpage = "otherpage";
$tbl_otherpagefile = "otherpagefile";
$tbl_otherpagekategori = "otherpagekategori";
$tbl_otherpagekategorisub = "otherpagekategorisub";

/* Tabel Banner */
$tbl_banner = "banner";
$tbl_bannerkategori = "bannerkategori";
$tbl_bannerkategorisub = "bannerkategorisub";
$tbl_bannerlog = "bannerlog";

/* Tabel Polling */
$tbl_polling = "polling";
$tbl_pollingvoting = "pollingvoting";
$tbl_pollingfile = "pollingfile";
$tbl_pollingkategori = "pollingkategori";
$tbl_pollingkategorisub = "pollingkategorisub";
$tbl_pollingkomentar = "pollingkomentar";

/* Tabel Tanya Jawab */
$tbl_tanyajawab = "tanyajawab";
$tbl_tanyajawabkategori = "tanyajawabkategori";
$tbl_tanyajawabkategorisub = "tanyajawabkategorisub";

/* Tabel Web Link */
$tbl_weblink = "weblink";
$tbl_weblinkkategori = "weblinkkategori";
$tbl_weblinkkategorisub = "weblinkkategorisub";

/* Tabel Buku Tamu */
$tbl_guestbook = "guestbook";
$tbl_guestbookkategori = "guestbookkategori";
$tbl_guestbookkategorisub = "guestbookkategorisub";

/* Tabel People Directory */
$tbl_peopledirectory = "peopledirectory";
$tbl_peopledirectoryfile = "peopledirectoryfile";
$tbl_peopledirectorykategori = "peopledirectorykategori";
$tbl_peopledirectorykategorisub = "peopledirectorykategorisub";
$tbl_peopledirectorykomentar = "peopledirectorykomentar";

$tglkemarin = date("Y-m-d",mktime (0,0,0, date("m"), date("d")-1, date("Y")));

$tanggalhariini = date('Y-m-d');
$jamsaatini = date('H:i:s');

$skr = 	date("m/d/Y H:i:s"); 
$timestamp = strtotime($skr);
$timestamp = $timestamp+18000;

$time_unix = date("Y-m-d H:i:s");
$time_unix = strtotime($time_unix);
$time_unix = $time_unix-10000;
$time_unix = date("Y-m-d H:i:s",$time_unix);
$time_unixS = strtotime($time_unix);

$time_now = date('YmdHis');

$read_more = "selengkapnya...";

$potong_preview = "100";

$titlewebsites ="KabarBUMN.Com";

$titlewebadmin="KabarBUMN.Com Web Administrator";
 
$footer_copyright = "Copyright &copy; 2012 KabarBUMN.Com ";

$META_CONTENT_TYPE = "text/html; charset=$Config_Charset";

$META_CONTENT_LANGUAGE = "en-us";

$META_PAGE_REFRESH = "";

$META_AUTHOR = "Arvino Zulka Harahap";

$META_DISTRIBUTION = "global";

$META_GENERATOR = "KabarBUMN.Com, Web Developer By Arvino Zulka Harahap";

$META_REVISIT = "1 days";

$META_LANGUAGE = "english";

$META_VERIFY_NAME = "kabarbumn.com";

$META_VERIFY_CONTENT = "kabarbumn.com";

$META_DESCRIPTION = "Berita Seputar BUMN";

$META_KEYWOARD = "kabar bumn, berita bumn, kabarbumn.com, info bumn, info kerja bumn, badan usaha milik negara";

$META_COPYRIGHT = "KabarBUMN.Com";

$META_RATING = "1";

$META_TITLE_ALTERNATE = "$Config_CompanyName";

$META_LINK_ALTERNATE = "$Config_SystemUrl/rss";

$META_IMAGESRC = $link_host . "images/logo_" . $Config_Domain . ".png";
?>