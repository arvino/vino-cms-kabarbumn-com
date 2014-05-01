
 
	<div id="content_wrapper">
 
 
		<div id="content_side_center_subrubrik">  

<h2 class="sectionTitle"> 
Search Result 
<br />



<?php 
if(!isset($form_search)){
	$form_search = $_GET['cari'];
}else{
	$form_search = $_POST['form_search'];
}


 
?>

  
  
 
<br>

 

<?php 
include('box_pencarian_news.php');
 
?>
 				
<br>
<br>


        
        </div>
 
		<div id="content_side_right">


			<?php include('box_news_infokerja.php');?>

			<?php include('box_news_mostread_homepage.php');?>

			
            <?php include('box_banner_right_sidebar1.php');?>
            
            <?php include('box_news_kolompakar.php');?> 
            
            <?php include('box_newsletter.php');?> 

			<?php include('box_banner_right_sidebar2.php');?>
			
            <?php include('box_socialmedia.php');?>	


		</div>
		 
		
	</div>
 
