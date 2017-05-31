<?php

ini_set("session.use_trans_sid",1);

ini_set("session.use_only_cookies",0);

ini_set("session.use_cookies",1);

session_start(); 
$_SESSION['mode']="default";
$_SESSION['entry']="default";
$sid=session_id();
		echo $sid;
?>

<p><a href="/index.php">RUNOOB.COM</a></p>