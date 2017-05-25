<?php
include 'Common.php';
//$id=$_GET["id"];
//$tableName=$_GET["tableName"];
//echo $_POST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
AddCustumerData($conn);
Logout($conn);
// CreateTestData($conn);
//$data="";
//SetOneData($conn,$tableName,$data,$id);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>
