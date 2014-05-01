<?php 
include('box_banner_header.php');?>
<!-- HEADER SECTION -->
	<div id="header_wrapper"> 
		<div id="header_side_left"> <a href="<?php echo $link_host?>homepage<?php echo $extention?>"> 
        <img src="<?php echo $link_host?>images/<?php echo $Config_Domain?>-logo-fixed-header.jpg" border="0" > </a></div>
		<div id="header_side_center">

<script>
var message=""
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
<form action="<?php 
echo $link_host ?>search-data<?php 
echo $extention ?>" method="post"  id="block-search-0">
				<div>
 
					<div style="float:left; height:14px; background:#fff; padding:3px;"><img src="images/google_ic_search.png"></div>
					<input type="text" onblur="if (this.value == '') {this.value = 'Keyword...';}" onfocus="if (this.value == 'Keyword...') {this.value = '';}" value="Keyword..." name="form_search"  class="input-text">
					<input type="submit" class="input-submit" value="" title="Search" name="op">
				</div>
</form>
</div>
<!-- END FORM SEARCH BOX -->
<div id="text_mobile_version">
	<div style="float:right;overflow:hidden;margin-right:2px;">
		<div style="float:left;overflow:hidden;margin-top:2px;margin-right:5px;">
		<a href="<?php echo $link_host?>mobile" style="text-decoration:none;color:#666666"> Versi Mobile </a></div> 
		<div style="float:left;overflow:hidden;"><img src="images/mobile_ic.png"></div>
	</div>
</div>


		 </div>
	</div>
<!-- END HEADER SECTION -->