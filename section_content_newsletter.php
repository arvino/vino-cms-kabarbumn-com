
 
	<div id="content_wrapper">
		 
		<div id="content_side_center_subrubrik"> 
			 
				
<?php 
include('pesan_error.php'); ?>
		
 
 
 <h2 class="sectionTitle"> 
			SUBSCRIBE OUR NEWSLETTER			<br><img src="images/separatorportfolio.png"></h2>
            


<style>
#newsletter_box_wrapper{
    background-image: url("images/newsletter_bg.png");
    border: 1px solid #CCCCCC;
    float: right;
    margin: 10px;
    overflow: hidden;
    width: 295px;
}

#newsletter_text{
    float: left;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-top: 5px;
    text-decoration: none;
    width: 300px;
}

.input_newsletter{
    border: 1px solid #B0AFAF;
    float: left;
    font-size: 11px;
    margin: 5px;
    overflow: hidden;
    padding: 2px;
    width: 105px;
	text-decoration:none;
	font-style:italic;
	color:#999;
}

.submit_newsletter{
    background-color: #999999;
    border: 1px solid #CCCCCC;
    color: #FFFFFF;
    float: left;
	font-style:italic;
    margin-top: 4px;
	
}
</style>

<div id="newsletter_box_wrapper">
<div id="newsletter_text">SIGNUP FOR NEWSLETTER</div>
  <form method="post" action="proses_newsletter.php">
    <input type="text" name="namadepan" id="namadepan" onblur="if (this.value == '') {this.value = 'Name...';}" onfocus="if (this.value == 'Name...') {this.value = '';}" value="Name..." class="input_newsletter">
    
    <input type="text" name="email" id="email" onblur="if (this.value == '') {this.value = 'Email...';}" onfocus="if (this.value == 'Email...') {this.value = '';}" value="Email..." class="input_newsletter">
    <input type="submit" name="submit_newsletter" id="submit_newsletter" value="OK"  class="submit_newsletter">
  </form>
</div>


   

By subscribing to newsletters on this page you may receive commercial messages from <?php 
echo $Config_CompanyName ?>. 

Commercial messages may be promoting services, events or new products targeting the executives in the region at the discretion of <?php 
echo $Config_CompanyName ?>.

<br />
<br />

Commercial messages will however always be from reputed companies and only offering services that have been verified to actually exist by <?php 
echo $Config_CompanyName ?> at the time of sending the message.

<br />
<br />

Your contact details or your email address will not be made available to any third party, please consult our Privacy Policy for additional information. 

<br />
<br />
If you wish to unsubscribe please contact us on our contact page, please include your reasons.



</div>
 
 
		<div id="content_side_right">
		

			<?php include('box_news_mostread_homepage.php');?>
			
            <?php include('box_banner_right_sidebar1.php');?>

			<?php include('box_banner_right_sidebar2.php');?>
			
            <?php include('box_socialmedia.php');?>	
     
            
		</div>
 


	</div>
	

	