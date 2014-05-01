<?php

 
$server ='localhost';
$db_user ='c9pialangnews';
$db_pass ='arvinozulka';
$db_name ='c9pialangnews';

$dbh=mysql_connect ("$server", "$db_user", "$db_pass") or die ('Cannot connect to database because : ' . mysql_error());
mysql_select_db ("$db_name"); 


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

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> PialangNews.Com | Referensi profesional pasar modal </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" href="css/contentslider.css" type="text/css" />
 


<script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
<script language="javascript" src="javascript/contentslider.js" type="text/javascript"></script>

	<script>
	
	$(document).ready(function () {


	$("ul#topnav li").hover(function() { //Hover over event on list item
		$(this).css({ 'background' : '#A39D9D url(topnav_active.gif) repeat-x'}); //Add background color + image on hovered list item
		$(this).find("span").show(); //Show the subnav
	} , function() { //on hover out...
		$(this).css({ 'background' : 'none'}); //Ditch the background
		$(this).find("span").hide(); //Hide the subnav
	});
	
		//set the default location (fix ie 6 issue)
		$('.lava').css({left:$('span.item:first').position()['left']});
		
		$('.item').mouseover(function () {
			//scroll the lava to current item position
			$('.lava').stop().animate({left:$(this).position()['left']}, {duration:200});
			
			//scroll the panel to the correct content
			$('.panel').stop().animate({left:$(this).position()['left'] * (-2)}, {duration:200});
		});
		
	});
	
	</script>


</head>

<body>
 
<!-- START BODY WRAPPER -->
<div id="body_wrapper">


<!-- HEADER SECTION -->
	<div id="header_wrapper"> 
		<div id="header_side_left"> <img src="images/logo_pialangnews.png"> </div>
		<div id="header_side_center">

<script>
var message="''Referensi profesional pasar modal''"
var neonbasecolor="#F5F5F5"
var neontextcolor="green"
var flashspeed=100
var n=0
if (document.all||document.getElementById){
document.write('')
for (m=0;m<message.length;m++)
document.write('<span id="neonlight'+m+'">'+message.charAt(m)+'</span>')
document.write('')
}
else
document.write(message)
function crossref(number){
var crossobj=document.all? eval("document.all.neonlight"+number) : document.getElementById("neonlight"+number)
return crossobj
}
function neon(){
if (n==0){
for (m=0;m<message.length;m++)
crossref(m).style.color=neonbasecolor
}
crossref(n).style.color=neontextcolor
if (n<message.length-1)
n++
else{
n=0
clearInterval(flashing)
setTimeout("beginneon()",5500)
return
}
}
function beginneon(){
if (document.all||document.getElementById)
flashing=setInterval("neon()",flashspeed)
}
beginneon()
</script>
 
 
		</div>
		<div id="header_side_right"> 
		

<div id="tanggal_header">
	<?php echo hariindo('Y-m-d') . ", " . bulanindo(date('Y-m-d')); ?> | <?php echo date('H:i');?> WIB
</div>
<!-- FORM SEARCH BOX -->
<div id="search_box">
<form target="google_window" action="#" method="get" accept-charset="UTF-8" id="block-search-0">
				<div>
					<!-- google hidden vars -->

					<!-- google hidden vars -->
					<div style="float:left; height:14px; background:#fff; padding:3px;"><img src="images/google_ic_search.png"></div>
					<input type="text" onblur="if (this.value == '') {this.value = 'Keyword...';}" onfocus="if (this.value == 'Keyword...') {this.value = '';}" value="Keyword..." name="q" class="input-text">
					<input type="submit" class="input-submit" value="" title="Search" name="op">
				</div>
</form>
</div>
<!-- END FORM SEARCH BOX -->
<div id="text_mobile_version">
	<div style="float:right;overflow:hidden;margin-right:2px;">
		<div style="float:left;overflow:hidden;margin-top:2px;margin-right:5px;">
		<a href="" style="text-decoration:none;color:#666666"> Versi Mobile </a></div> 
		<div style="float:left;overflow:hidden;"><img src="images/mobile_ic.png"></div>
	</div>
</div>


		 </div>
	</div>
<!-- END HEADER SECTION -->


<!-- MAIN MENU SECTION -->	
	<div id="mainmenu_wrapper">
		 <?php include('mainmenu2.php'); ?> 
	</div>
<!-- END MAIN MENU SECTION -->


<!-- START CONTENT SECTION -->
	<div id="content_wrapper">
		<!-- START CONTENT SIDE LEFT HERE -->
		<div id="content_side_left"> 
				
				<!-- START HEADLINE SIDE LEFT HERE -->
				<div id="content_side_left_headline"> 
<?php include('headline_slider.php'); ?>
				</div>
				<!-- END HEADLINE -->
				
				<!-- START CONTENT AFTER HEADLINE HERE -->
 
					<div id="content_side_left_1"> 
 
 
 			<div id="content_side_left_1_newschannel_itembox_wrapper">
			
				<div id="content_side_left_1_newschannel_item_title_box">
					<div id="content_side_left_1_newschannel_item_titlekanal"> RUMOR'S </div>  <div id="content_side_left_1_newschannel_item_indeks"> Indeks </div>
				</div>
				
				<div id="content_side_left_1_newschannel_item_box1">

						  <img id="content_side_left_1_newschannel_item_image" src="images/no_image.png"> 
						 <div id="content_side_left_1_newschannel_item_tanggal"> Senin, 01/01/2012 | 12:00 WIB </div>
						 <h2 id="content_side_left_1_newschannel_item_judul"> Lorem ipsum lorem ipsum lorem ipsum </h2>
				</div>
				
			</div>
<br>
<br>




<!-- START INFO VALAS -->
						<div id="content_side_left_1_kursvalas"> 
						<div id="content_side_left_1_kursvalas_title"> INFO VALAS </div>
						<div id="content_side_left_1_kursvalas_content">
							<?php include('infovalas.php'); ?>
						</div>
						</div>
<!-- END VALAS -->
						
						<div id="content_side_left_1_forumpasamodal"> 
						
							FORUM PASAR MODAL
						
						</div>
						
						
						<div id="content_side_left_1_newschannel_wrapper"> 
						
						
						
			<div id="content_side_left_1_newschannel_itembox_wrapper">
			
				<div id="content_side_left_1_newschannel_item_title_box">
					<div id="content_side_left_1_newschannel_item_titlekanal"> INSPIRASI </div>  <div id="content_side_left_1_newschannel_item_indeks"> Indeks </div>
				</div>
				
				<div id="content_side_left_1_newschannel_item_box1">

						  <img id="content_side_left_1_newschannel_item_image" src="images/no_image.png"> 
						 <div id="content_side_left_1_newschannel_item_tanggal"> Senin, 01/01/2012 | 12:00 WIB </div>
						 <h2 id="content_side_left_1_newschannel_item_judul"> Lorem ipsum lorem ipsum lorem ipsum </h2>
				</div>



							 <div id="content_side_left_1_newschannel_row2_description"> 
							 <ul>
							 	<li> 
									<div id="content_side_left_1_newschannel_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_1_newschannel_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>

							 	<li> 
									<div id="content_side_left_1_newschannel_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_1_newschannel_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>

							</ul>
							</div>
			</div>



						</div>
						
						
						
						<div id="content_side_left_1_newscalendar"> <!-- START KALENDAR -->
							<?php include('kalendar-box.php'); ?>
						</div> <!-- END KALENDAR -->
 
					</div>
					
					
					<!-- START CONTENT SIDE LEFT 2 -->
					<div id="content_side_left_2"> 
					
					
					<img src="images/banner_content_center_375x80pixel.png" style="margin-bottom:10px;">

						 <div id="content_side_left_2_row1_wrapper"> 
							 <div id="content_side_left_2_row1_title">  Terkini </div>
							 <div id="content_side_left_2_row1_description"> 
							 
								 <ul>
									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>
									
									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>

									
									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>

	
									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>

									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>
									
									
									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>

									<li> 
										<div id="content_side_left_2_row1_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
										<div id="content_side_left_2_row1_item_title"> Lorem ipsum lorem ipsum lorem ipsum </div>
										
										<div id="content_side_left_2_row1_item_preview">    <img id="content_side_left_2_row1_item_image" src="images/no_image.png"> Lorem ipsum dolor sit amet, eu usu meliore ceteros antiopam, ad veritus facilisis sit. Et has liber albucius. Prima iisque ei his... </div>
									</li>


 

 


								 </ul>
							 
							 </div>
						 </div>

 
						 <div id="content_side_left_2_row2_wrapper"> 
							 <div id="content_side_left_2_row2_title"> <img src="images/ic_arrow_prev.png" > Berita sebelumnya </div>
							 <div id="content_side_left_2_row2_description"> 
							 <ul>
							 	<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>
							 	
								<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>
								
								<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . "," . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>

								<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . "," . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>


								<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . "," . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>



								<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . "," . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>


								<li> 
									<div id="content_side_left_2_row2_item_tanggal"> <?php echo hariindo(date('Y-m-d')) . "," . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
									<div id="content_side_left_2_row2_item_title"> Lorem ipsum lorem ipsum lorem ipsum...</div>
								</li>

 

							 </ul>
							 
							 </div>
						 </div>





					</div>
					<!-- END CONTENT SIDE LEFT 2 -->
					
 
				<!-- END CONTENT AFTER HEADLINE HERE -->


		</div>
		<!-- END CONTENT SIDE LEFT HERE -->
		
		<!-- SPARATOR CONTENT HERE -->
		<div id="content_side_center"> </div>
		<!-- END SPARATOR CONTENT -->
		
		
		<!-- START CONTENT SIDE RIGHT -->
		<div id="content_side_right">
		
			<div id="content_side_right_banner"><!-- START SIDE RIGHT BANNER -->
				<img src="images/banner_siderbar_right_275x300pixel.png" width="100%">
			</div><!-- END SIDE RIGHT BANNER -->
				
			<div id="content_side_right_statistikpasar"><!-- START SIDE RIGHT STATISTIK PASA -->
				<?php include('iframe-aktifitas-pasar.php'); ?>
			</div> <!-- END STATISTIK PASAR -->
			
			<div id="content_side_right_subscribe_magazine"><!-- START CONTENT SIDE RIGHT - SUBSCRIBE MAGAZINE -->
				 
				<div id="content_side_right_subscribe_image"> <img src="images/cover_majalah1.png"></div>
				<div id="content_side_right_subscribe_text">
					<div id="content_side_right_subscribe_judul"> Langganan Majalah Pialang Edisi XXX </div>
					<a href="#" id="content_side_right_subscribe_button"> Berlangganan </a>
				</div>
			</div>	
				

			
			<!-- START CONTENT SIDE RIGHT - MOST READ / TERPOPULER -->
			<div id="content_side_rigth_tab_terpopuler">
				<div id="moving_tab">
					<div class="tabs">
						<div class="lava"></div>
						<span class="item"> Baru dibaca </span>
						<span class="item"> Terpopuler </span>
				 
				
					</div>
									
					<div class="content">						
						<div class="panel">						
							<ul>
								<li><a href='#'>Panel 01 Item 01</a></li>
								<li><a href='#'>Panel 01 Item 02</a></li>
								<li><a href='#'>Panel 01 Item 03</a></li>
								<li><a href='#'>Panel 01 Item 04</a></li>
								<li><a href='#'>Panel 01 Item 05</a></li>
								<li><a href='#'>Panel 01 Item 06</a></li>
								<li><a href='#'>Panel 01 Item 07</a></li>
								<li><a href='#'>Panel 01 Item 08</a></li>
				 
				
							</ul>
							<ul>
								<li><a href='#'>Panel 02 Item 01</a></li>
								<li><a href='#'>Panel 02 Item 02</a></li>
								<li><a href='#'>Panel 02 Item 03</a></li>
								<li><a href='#'>Panel 02 Item 04</a></li>
								<li><a href='#'>Panel 02 Item 05</a></li>			
							</ul>
							
										
						</div>
				
					</div>	
				</div>
			</div>
			<!-- END CONTENT SIDE RIGHT - MOST READ - TERPOPULER -->


			<!-- START CONTENT SIDE RIGHT - KOLUMNIS PHOTO GALLERY -->
			<div id="content_side_right_kolumnis_wrapper">
				<div id="content_side_right_innerbox">
					 <div id="content_side_right_kolumnis_judul"> KOLUMNIS </div>
					 <div id="content_side_right_kolumnis_image"> <img src="images/img_kolumnis.png"> </div>
					 <div id="content_side_right_kolumnis_description"> Lorem ipsum lorem ipsum lorem ipsum </div>
				 </div>
				 <div id="content_side_right_kolumnis_preview_innerbox">
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
					 <a href="#" id="content_side_right_kolumnis_preview_image"> <img src="images/img_kolumnis_small.png" width="32px"> </a>
				 </div>
			</div>
			<!-- END START CONTENT SIDE RIGHT -- KOLUMNIS - PHOTO GALLERY -->


		</div>
		<!-- END CONTENT SIDE RIGHT -->
		
	</div>
<!-- END CONTENT SECTION -->

<!-- START CONTENT BOTTOM SECTION -->	
	<div id="content_bottom_wrapper1">
		<div id="content_bottom_wrapper1_title">
			<div id="content_bottom1_item_titlekanal"> KANAL RUBRIK PILIHAN </div><div id="content_bottom1_item_indeks"> Indeks </div>
		</div> 
		

			<?php include('content_bottom1_item.php'); ?>	
			
			<?php include('content_bottom1_item.php'); ?>	
			
			<?php include('content_bottom1_item.php'); ?>	

			<?php include('content_bottom1_item.php'); ?>	
			
	</div>
	
	
	
	
	
	<div id="content_bottom_wrapper2">
 
		<?php include('content_bottom2_item.php'); ?>			
		
		<?php include('content_bottom2_item.php'); ?>			
		
		<?php include('content_bottom2_item.php'); ?>			
			
		 
	</div>
<!-- END CONTENT BOTTOM SECTION -->
<!-- END CONTENT BODY -->


	
<!-- FOOTER SECTION -->
	<div id="footer_wrapper">
		<?php include('menu_footer.php'); ?>
	</div>
<!-- END FOOTER SECTION -->
	
	
</div>
<!--END WRAPPER BODY -->



</body>
</html>
