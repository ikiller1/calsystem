<?php
include 'Common.php';
session_start();
$mode=$_SESSION["mode"];
if($mode!="write")
{
	echo "没有权限进行此操作";
	return;
}
//$id=$_GET["id"];
$tableName=$_POST["tableName"];
//echo $_POST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
CreateOrderTable($conn,$tableName);
Logout($conn);
// CreateTestData($conn);
//$data="";
//SetOneData($conn,$tableName,$data,$id);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>
