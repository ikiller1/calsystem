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
deleteOneData($conn,$tableName,$id);
// ShowDetail($data);

?> 


</body>





