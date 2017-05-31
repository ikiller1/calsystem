<?php

ini_set("session.use_trans_sid",1);

ini_set("session.use_only_cookies",0);

ini_set("session.use_cookies",0);

session_start();
$_SESSION['var1']="中华人民共和国";
$url="<a href='s2.php'>下一页</a>";
echo $url;
?>