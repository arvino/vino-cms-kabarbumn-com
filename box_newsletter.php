<style>
#newsletter_box_wrapper{
    background-image: url("images/newsletter_bg.png");
    border: 1px solid #CCCCCC;
    float: left;
    margin-bottom: 15px;
    overflow: hidden;
    width: 272px;
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
    color: #999999;
    float: left;
    font-size: 11px;
    font-style: italic;
    margin: 5px;
    overflow: hidden;
    padding: 2px;
    text-decoration: none;
    width: 90px;
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