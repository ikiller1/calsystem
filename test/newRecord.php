<?php
include 'Common.php';
$id=$_GET["id"];
$tableName=$_GET["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
// CreateTestData($conn);
$data="";
SetOneData($conn,$tableName,$data,$id);
echo "<br>"."<br>";
echo "<a href=\"print.php?tableName=".$tableName."\">点击返回</a> ";
?>
