 

<div class="sliderwrapper" id="slider1">
			
		
		<div class="contentdiv">
					<div class="slide-thumbnail">
						<img src="images/SLIDe_002.jpg" alt="photo"/>
					</div>
						<div class="slide-details">
							<div id="slider_headline_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
							<h7><a href="#">In Profile: Jiang Qiong Er</a></h7>
							<p>Michele Koh Morollo speaks to Jiang Qiong Er, CEO of China's first homegrown luxury brand at Business of Design Week.</p>
							 
						 </div>


						<div id="slider-berita-terkait-wrapper">
							<div id="slider-berita-terkait-title"> Terkait :</div>
							<ul>
								<li> Lorem ipsum lorem ipsum lorem ipsum In Profile: Jiang Qiong Er </li>
								<li> Lorem ipsum lorem ipsum lorem ipsum In Profile: Jiang Qiong Er </li>
								<li> Lorem ipsum lorem ipsum lorem ipsum In Profile: Jiang Qiong Er</li>
							</ul>
						</div>
					<div class="clear"></div>
		</div>

		<div class="contentdiv">
					<div class="slide-thumbnail">
						<img src="images/SLIDE.jpg" alt="photo"/>
					</div>
                	<div class="slide-details">
						<div id="slider_headline_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
						<h7><a href="#">Spa at Mission Hills</a></h7>
						<p>Located on China's Hainan Island, the recently completed Mission Hills Volcanic Mineral Springs and Spa by SB Architects stands as one of the largest spa destinations in the world.</p>
						 
                    </div>

						<div id="slider-berita-terkait-wrapper">
							<div id="slider-berita-terkait-title"> Terkait :</div>
							<ul>
								<li> Lorem ipsum lorem Spa at Mission Hills </li>
								<li> Lorem ipsum lorem Spa at Mission Hills </li>
								<li> Lorem ipsum lorem Spa at Mission Hills </li>
							</ul>
						</div>
											<div class="clear"></div>
		</div>

		<div class="contentdiv">
					<div class="slide-thumbnail">
						<img src="images/SLIDe_004.jpg" alt="photo"/>
					</div>
                	<div class="slide-details">
						<div id="slider_headline_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
						<h7><a href="#">Zumtobel Lights Up Urban Spaces</a></h7>
						<p>Zumtobel is behind some of the most fascinating urban facade lighting projects around the world. Here we spotlight some of them!</p>

						 
                    </div>

						<div id="slider-berita-terkait-wrapper">
							<div id="slider-berita-terkait-title"> Terkait :</div>
							<ul>
								<li> Lorem ipsum lorem Zumtobel Lights Up Urban Spaces </li>
								<li> Lorem ipsum lorem Zumtobel Lights Up Urban Spaces </li>
								<li> Lorem ipsum lorem Zumtobel Lights Up Urban Spaces </li>
							</ul>
						</div>
						
					<div class="clear"></div>
				
           </div>
                
	<div class="contentdiv">
					<div class="slide-thumbnail">
					<img src="images/SLIDe_003.jpg" alt="photo"/>
					</div>
                	<div class="slide-details">
					<div id="slider_headline_tanggal"> <?php echo hariindo(date('Y-m-d')) . ", " . bulanindo(date('Y-m-d'));?> | <?php echo date('H:i');?> WIB </div>
					<h7><a href="#">Poliform Villa-Style Home at Space</a></h7>
					<p>Poliform presents its idea of luxury living in a villa setting at the Space Asia Hub.</p>
					 

					</div>
						<div id="slider-berita-terkait-wrapper">
							<div id="slider-berita-terkait-title"> Terkait :</div>
							<ul>
								<li> Lorem ipsum lorem Poliform Villa-Style Home at Space </li>
								<li> Lorem ipsum lorem Poliform Villa-Style Home at Space </li>
								<li> Lorem ipsum lorem Poliform Villa-Style Home at Space </li>
							</ul>
						</div>
					<div class="clear"></div>
</div>

</div>

<div class="pagination" id="paginate-slider1"><a class="prev" href="#prev">Previous</a> <a class="toc" href="#1" rel="1">1</a> <a class="toc" href="#2" rel="2">2</a> <a class="toc" href="#3" rel="3">3</a> <a class="toc selected" href="#4" rel="4">4</a> <a class="next" href="#next">Next</a></div>

<script type="text/javascript">

featuredcontentslider.init({
	id: "slider1",  //id of main slider DIV
	contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
	toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
	nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
	revealtype: "mouseover", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
	enablefade: [true, 0.2],  //[true/false, fadedegree]
	autorotate: [true, 3000],  //[true/false, pausetime]
	onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
		//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
		//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
	}
})

</script>

 
 