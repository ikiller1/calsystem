<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include '../system/basicOperation.php';
include 'Common.php';
session_start();
$mode=$_SESSION["mode"];
if($mode!="write")
{
	echo "没有权限进行此操作";
	return;
}

$id=$_GET["id"];
$tableName=$_GET["tableName"];

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
deleteOneData($conn,$tableName,$id);
// ShowDetail($data);

?> 


</body>





