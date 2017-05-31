<?php
session_start();
session_id($_GET["PHPSESSID"]);
echo $_GET["PHPSESSID"];
echo "传递的session变量var1的值为：".$_SESSION['var1'];
?>