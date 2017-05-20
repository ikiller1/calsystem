<!DOCTYPE HTML><html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Tuesday 2014-10-16" />
	<title>INSERT</title>
</head>

<body>

<?php
include 'Common.php';
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$tableName="t_201705";
$id=1;

$data=array();
$data["_1A"]=$_POST["_1A"];
// echo  $data["_1A"];
SetOneData($conn,$tableName,$data,$id);
Logout($conn);
?> 
</body>
</html>
