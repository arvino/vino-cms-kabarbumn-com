<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/contentslider.css"  />

<script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="javascript/jquery.vticker-min.js"></script>
<script language="javascript" src="javascript/contentslider.js" type="text/javascript"></script>

<script>
	
	$(function(){
	$('#box_infokerja_item_preview').vTicker({ 
		speed: 500,
		pause: 3000,
		animation: 'fade',
		mousePause: true,
		showItems: 5
	});
 
});


	$(document).ready(function () {

		$("ul#topnav li").hover(function() { //Hover over event on list item
			$(this).css({ 'background' : '#A39D9D url(topnav_active.gif) repeat-x'}); //Add background color + image on hovered list item
			$(this).find("span").show(); //Show the subnav
		} , function() { //on hover out...
			$(this).css({ 'background' : 'none'}); //Ditch the background
			$(this).find("span").hide(); //Hide the subnav
		});
	
	
		//Tab berita terakhir dibaca dan terpopuler di homepage
		$('.lava_homepage').css({left:$('span.item_homepage:first').position()['left']});
		
		$('.item_homepage').mouseover(function () {
			//scroll the lava to current item position
			$('.lava_homepage').stop().animate({left:$(this).position()['left']}, {duration:200});
			
			//scroll the panel to the correct content
			$('.panel_homepage').stop().animate({left:$(this).position()['left'] * (-2)}, {duration:200});
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


 

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30987626-1']);
  _gaq.push(['_setDomainName', 'kabarbumn.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
