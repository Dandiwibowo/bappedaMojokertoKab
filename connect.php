<?php
$host ="localhost"; // Ubah sesuai hostname database
$user ="root";  // Ubah sesuai username database
$pass ="";  // Ubah sesuai password database
$database ="kmkprobolinggo";  // Ubah sesuai nama database
$connect=mysqli_connect($host,$user,$pass,$database) or die ("gagal"); 

if(!$connect)
	echo "Can't Connected";

$URL="http://localhost/kmkprobolinggokab";  // Ubah sesuai domain webiste
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

include "dbFunction.php";
include "token.php";

?>