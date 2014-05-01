<?php
session_name("CUST");
session_start();
 
$bahasa =  $_GET["bahasa"];

if($bahasa == "indonesia"){
 $_SESSION['sesi_bahasa'] = "indonesia";
 header("location:index.php");
}


if($bahasa == "english"){
 $_SESSION['sesi_bahasa'] = "english";
 header("location:index.php");
}

?>