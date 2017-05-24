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
//$tableName=$_POST["tableName"];
$id=$_GET["id"];

//$data=array();



SetCustumerData($conn,$id);
Logout($conn);
?> 
</body>
</html>
