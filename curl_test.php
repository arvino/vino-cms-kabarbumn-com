<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>


<?php

phpinfo();

?>




<?php 
$ch = curl_init();   
 curl_setopt ($ch, CURLOPT_URL, "http://www.yahoo.com/"); 
 curl_setopt ($ch, CURLOPT_HEADER, 0);   
 curl_exec ($ch);   
 curl_close ($ch);
 exit; 
?>  
</body>
</html>
