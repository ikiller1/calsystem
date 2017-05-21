<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include 'Common.php';

$id=$_GET["id"];
$tableName=$_GET["tableName"];

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=GetOneCustumer($conn,$tableName,$id);
// ShowDetail($data);
echo $data["name"]."<br>";
echo $data["address"]."<br>";
echo $data["_50A"]."<br>";
?> 


</body>