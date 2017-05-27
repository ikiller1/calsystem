<?php
include 'Common.php';
$id=$_POST["id"];
$tableName=$_POST["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
// CreateTestData($conn);
$data="";
SetOneData($conn,$tableName,$data,$id);
Logout($conn);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>
